<?php

namespace App\Controllers;

use App\Models\ConfirmationModel;
use App\Models\CategoryModel;
use App\Models\SubcategoryModel;
use App\Models\CapacityModel;
use App\Models\UkuranModel;
use App\Models\ProductModel;
use App\Models\MarketplaceModel;

class CatalogController extends BaseController
{
    protected $categoryModel;
    protected $subcategoryModel;
    protected $capacityModel;
    protected $ukuranModel;
    protected $confirmationModel;
    protected $productModel;
    protected $marketplaceModel;

    public function __construct()
    {
        // Instantiate the product model in the constructor
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->capacityModel = new CapacityModel();
        $this->ukuranModel = new UkuranModel();
        $this->subcategoryModel = new SubcategoryModel();
        $this->confirmationModel = new ConfirmationModel();
        $this->marketplaceModel = new MarketplaceModel();
    }

    public function catalog()
    {
        // Get query parameters
        $category = $this->request->getGet('category');
        $subcategory = $this->request->getGet('subcategory');
        $capacity = $this->request->getGet('capacity');
        $search = $this->request->getGet('search') ?? '';
        $sort = $this->request->getGet('sort') ?? 'id_asc';
    
        // Start building the query
        $query = $this->confirmationModel->where('status', 'approved');
    
        // Apply category filter
        if (!empty($category)) {
            $query->where('category', $category);
        }
    
        // Apply subcategory filter
        if (!empty($subcategory)) {
            $query->where('subcategory', $subcategory);
        }
    
        // Apply capacity filter
        if (!empty($capacity)) {
            $query->where('capacity', $capacity);
        }
    
        // Apply search filter (for product_type, brand, or capacity)
        if (!empty($search)) {
            $query->groupStart()
                ->like('product_type', $search)
                ->orLike('brand', $search)
                ->orLike('category', $search)
                ->orLike('subcategory', $search)
                ->orLike('capacity', $search)
                ->orLike('ukuran', $search)
                ->groupEnd();
        }
    
        // Apply sorting
        switch ($sort) {
            case 'name_asc':
                $query->orderBy('product_type', 'ASC');
                break;
            case 'name_desc':
                $query->orderBy('product_type', 'DESC');
                break;
            case 'capacity_asc':
                $query->orderBy('capacity', 'ASC');
                break;
            case 'capacity_desc':
                $query->orderBy('capacity', 'DESC');
                break;
            case 'date_asc':
                $query->orderBy('approved_at', 'ASC');
                break;
            case 'date_desc':
                $query->orderBy('approved_at', 'DESC');
                break;
            default:
                $query->orderBy('product_type', 'ASC'); // Default sorting
                break;
        }
    
        // Pagination
        $perPage = 15;
        $currentPage = $this->request->getGet('page') ?? 1;
        $products = $query->paginate($perPage, 'default', $currentPage);
    
        // Fetch distinct filter options
        $categories = $this->confirmationModel->distinct()->select('category')->findAll();
        $subcategories = $this->confirmationModel->distinct()->select('subcategory')->findAll();
        $capacities = $this->confirmationModel->distinct()->select('capacity')->findAll();
        $ukuran = $this->confirmationModel->distinct()->select('ukuran')->findAll();
        // Return the view
        // Sort categories alphabetically
usort($categories, function ($a, $b) {
    return strcmp($a['category'], $b['category']);
});

// Sort subcategories alphabetically
usort($subcategories, function ($a, $b) {
    return strcmp($a['subcategory'], $b['subcategory']);
});

// Sort capacities alphabetically
usort($capacities, function ($a, $b) {
    return strcmp($a['capacity'], $b['capacity']);
});

// Sort ukuran alphabetically
usort($ukuran, function ($a, $b) {
    return strcmp($a['ukuran'], $b['ukuran']);
});

// Format the 'harga' field to remove ",00" if it's a whole number
// Format the 'harga' field to remove ",00" if it's a whole number
// Format the 'harga' field to remove ",00" at the end
foreach ($products as &$product) {
    // Check if the price ends with ',00'
    if (substr($product['harga'], -3) === ',00') {
        // Remove ',00' only from the end of the string
        $product['harga'] = substr($product['harga'], 0, -3);
    }
}


// Pass the sorted arrays to the view
$data['categories'] = $categories;
$data['subcategories'] = $subcategories;
$data['capacities'] = $capacities;
$data['ukuran'] = $ukuran;

        log_message('info', 'Category: ' . $category);
log_message('info', 'Subcategory: ' . $subcategory);
log_message('info', 'Capacity: ' . $capacity);
log_message('info', 'Search: ' . $search);
log_message('info', 'Sort: ' . $sort);

        return view('catalog/catalog', [
            'products' => $products,
            'pager' => $this->confirmationModel->pager,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'capacities' => $capacities,
            'search' => $search,
            'sort' => $sort,
            'ukuran' => $ukuran,
            'category' => $category,
            'subcategory' => $subcategory,
            'capacity' => $capacity,
        ]);
    }
    
    public function CompareDetails()
    {
        $productIds = $this->request->getGet('products');
        if (empty($productIds)) {
            return redirect()->to('/catalog');
        }
    
        $products = $this->confirmationModel->whereIn('id', $productIds)->findAll();
        foreach ($products as &$product) {
            // Check if the price ends with ',00'
            if (substr($product['harga'], -3) === ',00') {
                // Remove ',00' only from the end of the string
                $product['harga'] = substr($product['harga'], 0, -3);
            }
        }
        return view('catalog/comparison_details', ['products' => $products]);
    }

    public function filterProducts()
    {
        // Get all query parameters
        $categoryName = $this->request->getGet('category');
        $subcategoryName = $this->request->getGet('subcategory');
        $capacity = $this->request->getGet('capacity');
        $search = $this->request->getGet('search') ?? '';  // Default to empty if no search
        $sort = $this->request->getGet('sort') ?? 'id_asc'; // Default to 'id_asc' if no sort
    
        // Map category and subcategory names to IDs (optional, if required)
        $categoryId = $categoryName ? $this->getCategoryIdByName($categoryName) : null;
        $subcategoryId = $subcategoryName ? $this->getSubcategoryIdByName($subcategoryName) : null;
    
        // Build the query
        $query = $this->confirmationModel->where('status', 'approved');
    
        // Apply category filter
        if (!empty($categoryName)) {
            $query->where('category', $categoryName);
        }
    
        // Apply subcategory filter
        if (!empty($subcategoryName)) {
            $query->where('subcategory', $subcategoryName); // Use subcategory_id if needed
        }
    
        // Apply capacity or ukuran filter
        if (!empty($capacity)) {
            // Determine filter type based on category and subcategory
            $filterType = $this->getFilterType($categoryId, $subcategoryId);
    
            log_message('debug', 'Filter Type: ' . $filterType);
    
            if ($filterType === 'capacity') {
                $query->where('capacity', $capacity);
            } elseif ($filterType === 'ukuran') {
                $query->where('ukuran', $capacity); // Compare ukuran directly as a string
            }
        }
    
        // Apply search filter (respecting existing filters)
        if (!empty($search)) {
            $query->groupStart()
                ->like('product_type', $search)
                ->orLike('brand', $search)
                ->orLike('category', $search)
                ->orLike('subcategory', $search)
                ->orLike('capacity', $search)
                ->orLike('ukuran', $search)
                ->groupEnd();
        }
    
        // Apply sorting based on the selected sort option
        switch ($sort) {
            case 'name_asc':
                $query->orderBy('product_type', 'ASC');
                break;
            case 'name_desc':
                $query->orderBy('product_type', 'DESC');
                break;
            case 'capacity_asc':
                $query->orderBy('capacity', 'ASC');
                break;
            case 'capacity_desc':
                $query->orderBy('capacity', 'DESC');
                break;
            case 'date_asc':
                $query->orderBy('approved_at', 'ASC');
                break;
            case 'date_desc':
                $query->orderBy('approved_at', 'DESC');
                break;
            default:
                $query->orderBy('id', 'ASC'); // Default sorting
                break;
        }
    
        // Fetch the filtered products
        $data['products'] = $query->findAll();
    
        // Apply 'harga' deformatting
        foreach ($data['products'] as &$product) {
            // Check if the 'harga' value is in the correct format, like 'Rp. 2.000.000,00'
            if (isset($product['harga']) && is_string($product['harga'])) {
                // Remove the currency symbol 'Rp. ' and any commas or periods
                $product['harga'] = str_replace([',00'], [''], $product['harga']);
            }
        }
    
        // Log the filter values and the resulting query data
        log_message('debug', 'Filter - Category: ' . $categoryName);
        log_message('debug', 'Filter - Subcategory: ' . $subcategoryName);
        log_message('debug', 'Filter - Capacity/Ukuran: ' . $capacity);
        log_message('debug', 'Filter - Search: ' . $search);
        log_message('debug', 'Query Result: ' . print_r($data['products'], true));
    
        // Return the view with filtered products
        return view('partials/product_grid', $data);
    }
    

    
public function getSubcategories()
{
    $categoryName = $this->request->getGet('category');  // Get category name from the filter

    // Get category_id based on the category name
    $categoryId = $this->getCategoryIdByName($categoryName);

    if ($categoryId) {
        // Fetch subcategories that belong to this category_id and sort them alphabetically by name
        $subcategories = $this->subcategoryModel
            ->where('category_id', $categoryId)
            ->orderBy('name', 'ASC')  // Replace 'name' with the actual field used for subcategory names
            ->findAll();
        
        // Prepare the response format expected by the JavaScript
        $response = [];
        foreach ($subcategories as $subcategory) {
            $response[] = [
                'subcategory_id' => $subcategory['id'],  // Replace 'id' with the actual primary key field
                'subcategory_name' => $subcategory['name'],  // Replace 'name' with the actual name field
            ];
        }
        
        return $this->response->setJSON($response);
    } else {
        // Return an empty array if no subcategories are found
        return $this->response->setJSON([]);
    }
}


private function getCategoryIdByName($categoryName)
{
    $category = $this->categoryModel->where('name', $categoryName)->first();
    return $category ? $category['id'] : null;
}

private function getSubcategoryIdByName($subcategoryName)
{
    $subcategory = $this->subcategoryModel->where('name', $subcategoryName)->first();
    return $subcategory ? $subcategory['id'] : null;
}

private function getFilterType($categoryId, $subcategoryId = null)
{
    $categoriesWithCapacity = [3, 4, 5, 6, 7];
    $categoriesWithUkuran = [9];
    
    // Define the subcategory requirements for category 10
    $subcategoryRequirements = [
        37 => 'capacity',
        38 => 'capacity',
        31 => 'ukuran',
        32 => 'ukuran',
        35 => 'none',
        36 => 'none',
    ];

    if (in_array($categoryId, $categoriesWithCapacity)) {
        log_message('debug', 'Filter Type: Capacity');
        return 'capacity';
    } elseif (in_array($categoryId, $categoriesWithUkuran)) {
        log_message('debug', 'Filter Type: Ukuran');
        return 'ukuran';
    } elseif ($categoryId == 10 && $subcategoryId !== null) {
        // Check the subcategory requirement for category 10
        if (array_key_exists($subcategoryId, $subcategoryRequirements)) {
            $filterType = $subcategoryRequirements[$subcategoryId];
            log_message('debug', 'Filter Type for Category 10: ' . $filterType);
            return $filterType;
        } else {
            log_message('debug', 'Subcategory ID not found in requirements for Category 10.');
        }
    }

    log_message('debug', 'Category ID: ' . $categoryId . ', Subcategory ID: ' . $subcategoryId);

    log_message('debug', 'Filter Type: None');
    return null;
}


public function getCapacities()
{
    $subcategoryName = $this->request->getGet('subcategory');
    log_message('debug', 'Received Subcategory Name: ' . $subcategoryName);

    $subcategoryId = $this->getSubcategoryIdByName($subcategoryName);

    if ($subcategoryId) {
        log_message('debug', 'Found Subcategory ID: ' . $subcategoryId);

        $categoryId = $this->getCategoryIdBySubcategoryId($subcategoryId);
        $filterType = $this->getFilterType($categoryId, $subcategoryId);

        $showCapacity = !in_array($subcategoryId, [35, 36, 42, 52, 66, 67, 70, 73, 74]);

        if ($filterType === 'capacity') {
            $capacities = $this->capacityModel->where('subcategory_id', $subcategoryId)->findAll();
        } elseif ($filterType === 'ukuran') {
            $capacities = $this->ukuranModel->where('subcategory_id', $subcategoryId)->findAll();
        } else {
            $capacities = [];
        }

        log_message('debug', 'Capacities Retrieved: ' . print_r($capacities, true));

        // Sort the capacities
        $sortedCapacities = $this->sortCapacities($capacities);

        return $this->response->setJSON(['capacities' => $sortedCapacities, 'showCapacity' => $showCapacity]);
    } else {
        log_message('debug', 'No valid subcategory ID found for subcategory: ' . $subcategoryName);
        return $this->response->setJSON(['capacities' => [], 'showCapacity' => false]);
    }
}

private function sortCapacities($capacities)
{
    // Predefined order for descriptive sizes
    $sizeOrder = ['-', 'kecil', 'sedang', 'besar'];

    usort($capacities, function ($a, $b) use ($sizeOrder) {
        // Check for the correct key (value or size)
        $aValue = strtolower($a['value'] ?? $a['size']); // Use 'size' if 'value' doesn't exist
        $bValue = strtolower($b['value'] ?? $b['size']);

        // Rule 1: Place "-" at the top
        if ($aValue === '-') return -1;
        if ($bValue === '-') return 1;

        // Rule 2: Check for predefined descriptive sizes
        $aIndex = array_search($aValue, $sizeOrder);
        $bIndex = array_search($bValue, $sizeOrder);

        if ($aIndex !== false && $bIndex !== false) {
            return $aIndex <=> $bIndex;
        }

        // Rule 3: Sort numeric values with units
        $aNumeric = $this->extractNumericValue($aValue);
        $bNumeric = $this->extractNumericValue($bValue);

        if ($aNumeric !== null && $bNumeric !== null) {
            return $aNumeric <=> $bNumeric;
        }

        // Rule 4: Default to alphabetical order
        return strcmp($aValue, $bValue);
    });

    return $capacities;
}


private function extractNumericValue($value)
{
    // Extract the numeric part from a string (e.g., "10 L" -> 10)
    if (preg_match('/^\d+/', $value, $matches)) {
        return (int)$matches[0];
    }
    return null; // Return null if no numeric value is found
}



private function getCategoryIdBySubcategoryId($subcategoryId)
{
    $subcategory = $this->subcategoryModel->where('id', $subcategoryId)->first();
    if ($subcategory) {
        log_message('debug', 'Category ID: ' . $subcategory['category_id']);
        return $subcategory['category_id'];
    } else {
        log_message('debug', 'Subcategory not found.');
        return null;
    }
}

private function getCategoryIdBySubcategory($subcategoryName)
{
    $subcategory = $this->subcategoryModel->where('name', $subcategoryName)->first();

    if ($subcategory) {
        // Log category_id for debugging
        log_message('debug', 'Category ID: ' . $subcategory['category_id']);
        return $subcategory['category_id'];
    } else {
        log_message('debug', 'Subcategory not found.');
        return null;
    }
}

public function details($id)
{
    $model = new ConfirmationModel();
    $marketplacemodel = new MarketplaceModel();
    $marketplace = $marketplacemodel->findAll();
    $product = $model->find($id);

    if (!$product) {
        show_404();
    }

    // Fetch related products based on category and capacity/ukuran, excluding the current product
    $relatedProducts = $model->getRelatedProducts(
        $product['category'],
        $product['capacity'],
        $product['ukuran'],
        $id
    );

    // Special logic for 'SMALL APPLIANCES' category to include subcategory in related products
    if ($product['category'] == "SMALL APPLIANCES") {
        $relatedProducts = $model->getRelatedSmallApp(
            $product['subcategory'], // Check by subcategory for this category
            $product['capacity'],
            $product['ukuran'],
            $id
        );
    }

    if ($product['subcategory'] == "DISPENSER GALON ATAS" || $product['subcategory'] == "DISPENSER GALON BAWAH" || $product['subcategory'] == "SETRIKA" || $product['subcategory'] == "AIR PURIFIER" || $product['subcategory'] == "HAIR DRYER"|| $product['subcategory'] == "HAND MIXER"|| $product['subcategory'] == "MIXER"|| $product['subcategory'] == "SMART DOOR LOCK"|| $product['subcategory'] == "SMART LED") {
        $relatedProducts = $model->getRelatedProductsBySubcategoryOnly(
            $product['subcategory'], // Check by subcategory for this category
            $id // Pass only the product ID to exclude the current product
        );
    }
    
    // Check if there's a video link, and extract the video ID if it exists
   // Check if there's a video link, and extract the video ID if it exists
   $videoId = '';
   $embedUrl = '';
   $thumbnailUrl = '';
   
   if (!empty($product['video_produk'])) {
       // Display the video link for debugging
       log_message('debug', 'Video link: ' . $product['video_produk']);
   
       // Use regex to extract only the video ID, ignoring any additional parameters
       if (preg_match('/(?:youtube\.com\/.*v=|youtu\.be\/)([^&?]+)/', $product['video_produk'], $matches)) {
           $videoId = $matches[1];
       }

       if ($videoId) {
           // Create YouTube embed and thumbnail URLs
           $embedUrl = "https://www.youtube.com/embed/{$videoId}";
           $thumbnailUrl = "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg";
       }
   }

   usort($marketplace, function ($a, $b) {
    return strcmp($a['location'], $b['location']);
});

if (isset($product['harga']) && substr($product['harga'], -3) === ',00') {
    // Remove ',00' only from the end of the string
    $product['harga'] = substr($product['harga'], 0, -3);
}

   // Pass the data to the view
   return view('catalog/details', [
       'product' => $product,
       'marketplace' => $marketplace,
       'relatedProducts' => $relatedProducts,
       'videoId' => $videoId,
       'embedUrl' => $embedUrl,
       'thumbnailUrl' => $thumbnailUrl,
   ]);
   
}
}