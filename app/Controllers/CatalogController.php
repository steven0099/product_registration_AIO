<?php

namespace App\Controllers;

use App\Models\ConfirmationModel;
use App\Models\CategoryModel;
use App\Models\SubcategoryModel;
use App\Models\CapacityModel;
use App\Models\UkuranModel;
use App\Models\ProductModel;

class CatalogController extends BaseController
{
    protected $categoryModel;
    protected $subcategoryModel;
    protected $capacityModel;
    protected $ukuranModel;
    protected $confirmationModel;
    protected $productModel;

    public function __construct()
    {
        // Instantiate the product model in the constructor
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->capacityModel = new CapacityModel();
        $this->ukuranModel = new UkuranModel();
        $this->subcategoryModel = new SubcategoryModel();
        $this->confirmationModel = new ConfirmationModel();
    }

    public function catalog()
    {
        // Get GET parameters
        $search = $this->request->getGet('search') ?? '';
        $sort = $this->request->getGet('sort') ?? 'name_asc';
        $page = $this->request->getGet('page') ?? 1;
    
        // Start the query on confirmationModel
        $query = $this->confirmationModel->where('status', 'approved');
    
        // Apply search filter for product_type and brand
        if ($search) {
            $query->groupStart()  // Start of the OR condition group
                ->like('product_type', $search)
                ->orLike('brand', $search)  // Searching both product_type and brand
                ->groupEnd();  // End of the OR condition group
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
            default:
                $query->orderBy('id', 'ASC');
                break;
        }
        
        // Pagination
        $perPage = 15;
        $totalProducts = $query->countAllResults(false);  // Get the total count after applying filters
    
        $pager = \Config\Services::pager();
        $products = $query->paginate($perPage, 'default', $page);
    
        // Get unique filter options
        $categories = $this->confirmationModel->distinct()->select('category')->findAll();
        $subcategories = $this->confirmationModel->distinct()->select('subcategory')->findAll();
        $capacities = $this->confirmationModel->distinct()->select('capacity')->findAll();
        $ukuran = $this->confirmationModel->distinct()->select('ukuran')->findAll();
    
        // Pass data to the view
        return view('catalog/catalog', [
            'products' => $products,
            'pager' => $pager,
            'search' => $search,
            'sort' => $sort,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'capacities' => $capacities,
            'ukuran' => $ukuran
        ]);
    }
    

public function filterProducts()
{
    $categoryName = $this->request->getGet('category');
    $subcategoryName = $this->request->getGet('subcategory'); // Updated variable name for clarity
    $capacity = $this->request->getGet('capacity');

    // Map category name to category_id
    $categoryId = $categoryName ? $this->getCategoryIdByName($categoryName) : null;

    // Retrieve the subcategory ID based on the selected name
    $subcategoryId = $subcategoryName ? $this->getSubcategoryIdByName($subcategoryName) : null;

    $query = $this->confirmationModel->where('status', 'approved');

    // Apply filters based on category and subcategory
    if ($categoryName) $query->where('category', $categoryName);
    if ($subcategoryName) $query->where('subcategory', $subcategoryName); // Ensure you're using subcategory_id

    // Check if the capacity or ukuran filter should be applied
    if ($capacity) {
        $filterType = $this->getFilterType($categoryId, $subcategoryId);
        if ($filterType === 'capacity') {
            $query->where('capacity', $capacity);
        } elseif ($filterType === 'ukuran') {
            $query->where('ukuran', $capacity); // Use `capacity` from the select field but match against `ukuran`
        }
    }

    $data['products'] = $query->findAll();

    // Log the filter values and the resulting query data
    log_message('debug', 'Filter - Category: ' . $categoryName);
    log_message('debug', 'Filter - Subcategory: ' . $subcategoryName);
    log_message('debug', 'Filter - Capacity/Ukuran: ' . $capacity);
    log_message('debug', 'Query Result: ' . print_r($data['products'], true));

    return view('partials/product_grid', $data);
}


// For dynamically updating subcategory options
public function getSubcategories()
{
    $categoryName = $this->request->getGet('category');  // Get category name from the filter

    // Get category_id based on the category name
    $categoryId = $this->getCategoryIdByName($categoryName);

    if ($categoryId) {
        // Fetch subcategories that belong to this category_id
        $subcategories = $this->subcategoryModel->where('category_id', $categoryId)->findAll();
        
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

    // Retrieve subcategory ID from name
    $subcategoryId = $this->getSubcategoryIdByName($subcategoryName);

    if ($subcategoryId) {
        $categoryId = $this->getCategoryIdBySubcategoryId($subcategoryId);
        $filterType = $this->getFilterType($categoryId, $subcategoryId);

        // Determine if the capacity dropdown should be shown
        $showCapacity = !in_array($subcategoryId, [35, 36]);

        if ($filterType === 'capacity') {
            $capacities = $this->capacityModel->where('subcategory_id', $subcategoryId)->findAll();
        } elseif ($filterType === 'ukuran') {
            $capacities = $this->ukuranModel->where('subcategory_id', $subcategoryId)->findAll();
        } else {
            $capacities = [];
        }

        // Log the retrieved capacities for debugging
        log_message('debug', 'Capacities Retrieved: ' . print_r($capacities, true));

        // Return the response including the showCapacity flag
        return $this->response->setJSON(['capacities' => $capacities, 'showCapacity' => $showCapacity]);
    } else {
        log_message('debug', 'No valid subcategory ID found.');
        $capacities = [];
        return $this->response->setJSON(['capacities' => $capacities, 'showCapacity' => false]);
    }
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

}