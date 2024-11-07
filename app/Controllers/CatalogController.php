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
        $data['isCatalog'] = true; // Set a flag for the catalog page
        // Get only confirmed products
        $data['products'] = $this->confirmationModel->where('status', 'approved')->findAll();

        // Get unique filter options
        $data['category'] = $this->categoryModel->findAll();
        $data['categories'] = $this->confirmationModel->distinct()->select('category')->findAll();
        $data['subcategories'] = $this->confirmationModel->distinct()->select('subcategory')->findAll();
        $data['capacities'] = $this->confirmationModel->distinct()->select('capacity')->findAll();
        $data['ukuran'] = $this->confirmationModel->distinct()->select('ukuran')->findAll();

        return view('catalog', $data);
    }

    public function filterProducts()
    {
        $categoryName = $this->request->getGet('category');
        $subcategory = $this->request->getGet('subcategory');
        $capacity = $this->request->getGet('capacity');

        // Map category name to category_id
        $categoryId = $categoryName ? $this->getCategoryIdByName($categoryName) : null;

        $query = $this->confirmationModel->where('status', 'confirmed');

        if ($categoryName) $query->where('category', $categoryName); // Use category_id for filtering
        if ($subcategory) $query->where('subcategory', $subcategory);
        if ($capacity) $query->where('capacity', $capacity);

        $data['products'] = $query->findAll();
        return view('partials/product_grid', $data);
    }

    // For dynamically updating subcategory options
    public function getSubcategories()
    {
        $categoryName = $this->request->getGet('category');  // Category name from the filter

        // Get category_id based on the category name
        $categoryId = $this->getCategoryIdByName($categoryName);

        if ($categoryId) {
            // Fetch subcategories using category_id
            $subcategories = $this->subcategoryModel->where('category_id', $categoryId)->findAll();
            return $this->response->setJSON($subcategories);
        } else {
            // Return an empty array if the category name doesn't exist
            return $this->response->setJSON([]);
        }
    }

    private function getCategoryIdByName($categoryName)
    {
        $category = $this->categoryModel->where('name', $categoryName)->first();
        return $category ? $category['id'] : null;
    }

    public function getCapacities()
    {
        $subcategory = $this->request->getGet('subcategory');
        $capacities = $this->capacityModel->where('subcategory_name', $subcategory)->findAll();

        return $this->response->setJSON($capacities);
    }

    public function detail($id)
    {
        $model = new ConfirmationModel();
        $data['product'] = $model->find($id);

        // Mengambil produk berikutnya
        $nextProduct = $model->getNextProduct($id);
        $data['nextProduct'] = $nextProduct;

        return view('product/detail', $data);
    }
}
