<?php

namespace App\Controllers;

use App\Models\BrandModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\SubcategoryModel;
use App\Models\CapacityModel;
use App\Models\CompressorwarrantyModel;
use App\Models\SparepartwarrantyModel;
use App\Models\SpecificationModel;  // Add Specification model for step 2
use App\Models\ProsModel;  // Add Pros model for step 3

class ProductController extends BaseController
{
    protected $productModel;  // Define productModel as a property

    public function __construct()
    {
        // Instantiate the product model in the constructor
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        // Check if the user has the required role (admin or superadmin)
        if (session()->get('role') !== 'admin' && session()->get('role') !== 'superadmin') {
            return redirect()->to('/no-access'); // Redirect if unauthorized
        }
    
        // Authorized users (admins and superadmins) proceed with fetching the data
        $product_model = new ProductModel();
    
        // Fetch products with joins to related tables (brands, categories, etc.)
        $data['products'] = $product_model->select('products.id, products.color, products.product_type, brands.name as brand_name, categories.name as category_name, subcategories.name as subcategory_name, capacities.value as capacity, compressor_warranties.value as compressor_warranty, sparepart_warranties.value as sparepart_warranty')
            ->join('brands', 'brands.id = products.brand_id')
            ->join('categories', 'categories.id = products.category_id')
            ->join('subcategories', 'subcategories.id = products.subcategory_id')
            ->join('capacities', 'capacities.id = products.capacity_id')
            ->join('compressor_warranties', 'compressor_warranties.id = products.compressor_warranty_id')
            ->join('sparepart_warranties', 'sparepart_warranties.id = products.sparepart_warranty_id')
            ->findAll();
    
        // Pass data to the view
        return view('product/list_product', $data);
    }

    public function approved()
    {
        if (session()->get('role') !== 'superadmin') {
            return redirect()->to('/no-access');
        } // Close the if statement properly here
    
        $product_model = new ProductModel();
    
        // Fetch products with joins to related tables (brands, categories, etc.)
        $data['products'] = $product_model->select('products.id, products.color, products.product_type, brands.name as brand_name, categories.name as category_name, subcategories.name as subcategory_name, capacities.value as capacity, compressor_warranties.value as compressor_warranty, sparepart_warranties.value as sparepart_warranty')
            ->join('brands', 'brands.id = products.brand_id')
            ->join('categories', 'categories.id = products.category_id')
            ->join('subcategories', 'subcategories.id = products.subcategory_id')
            ->join('capacities', 'capacities.id = products.capacity_id')
            ->join('compressor_warranties', 'compressor_warranties.id = products.compressor_warranty_id')
            ->join('sparepart_warranties', 'sparepart_warranties.id = products.sparepart_warranty_id') // Add condition to fetch only approved products
            ->findAll();
    
        return view('product/approved_product', $data); // Ensure the view path is correct
    }
    
    public function rejected()
    {
        if (session()->get('role') !== 'superadmin') {
            return redirect()->to('/no-access');
        } // Close the if statement properly here
    
        $product_model = new ProductModel();
    
        // Fetch products with joins to related tables (brands, categories, etc.)
        $data['products'] = $product_model->select('products.id, products.color, products.product_type, brands.name as brand_name, categories.name as category_name, subcategories.name as subcategory_name, capacities.value as capacity, compressor_warranties.value as compressor_warranty, sparepart_warranties.value as sparepart_warranty')
            ->join('brands', 'brands.id = products.brand_id')
            ->join('categories', 'categories.id = products.category_id')
            ->join('subcategories', 'subcategories.id = products.subcategory_id')
            ->join('capacities', 'capacities.id = products.capacity_id')
            ->join('compressor_warranties', 'compressor_warranties.id = products.compressor_warranty_id')
            ->join('sparepart_warranties', 'sparepart_warranties.id = products.sparepart_warranty_id')
            ->findAll();
    
        return view('product/rejected_product', $data); // Ensure the view path is correct
    }
    

    public function getSubcategories($categoryId)
    {
        $subcategoryModel = new SubcategoryModel();
    
        // Fetch subcategories based on categoryId
        $subcategories = $subcategoryModel->where('category_id', $categoryId)->findAll();
    
        // Return as JSON
        return $this->response->setJSON($subcategories);
    }
    

    public function step1()  // Step 1: General Data
    {
        $brandModel = new BrandModel();
        $categoryModel = new CategoryModel();
        $subcategoryModel = new SubcategoryModel();
        $capacityModel = new CapacityModel();
        $compressorwarrantyModel = new CompressorwarrantyModel();
        $sparepartwarrantyModel = new SparepartwarrantyModel();

        // Load brand, category, etc., data for the form
        $data['brands'] = $brandModel->findAll();
        $data['categories'] = $categoryModel->findAll();
        $data['subcategories'] = $subcategoryModel->findAll();
        $data['capacities'] = $capacityModel->findAll();
        $data['compressor_warranties'] = $compressorwarrantyModel->findAll();
        $data['sparepart_warranties'] = $sparepartwarrantyModel->findAll();

        return view('product/product_registration', $data);
    }

    public function saveStep1()
    {
        // Save the step 1 data to session or database
        $step1Data = $this->request->getPost();
        session()->set('step1', $step1Data);
        print_r($step1Data);
        
        // Create the product in Step 1 and get the new product ID
        $product_id = $this->productModel->insert($step1Data);  // Ensure $step1Data has valid product data

        // Store the product_id in the session
        $_SESSION['step1']['product_id'] = $product_id;  // Save the product ID for future steps

        // Redirect to Step 2
        return redirect()->to('product/step2');
    }

    public function step2()  // Step 2: Product Specifications
    {
        return view('product/product_specification');  // Load the form for product specifications
    }

    public function saveStep2()
    {
        $rules = [
            'produk_p' => 'required|decimal',
            'produk_l' => 'required|decimal',
            'produk_t' => 'required|decimal',
            'kemasan_p' => 'required|decimal',
            'kemasan_l' => 'required|decimal',
            'kemasan_t' => 'required|decimal',
            'berat' => 'required|decimal',
            'daya' => 'required|decimal',
            'pembuat' => 'required|string',
            'refrigant' => 'required|string',
            'cspf' => 'required|decimal',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Get the product ID from the session
        $productId = session()->get('step1')['product_id'];

        // Save step 2 data in the SpecificationModel
        $specificationModel = new SpecificationModel();
        $specificationData = [
            'product_id' => $productId,  // Associate the product ID with the specifications
            'produk_p' => $this->request->getPost('produk_p'),
            'produk_l' => $this->request->getPost('produk_l'),
            'produk_t' => $this->request->getPost('produk_t'),
            'kemasan_p' => $this->request->getPost('kemasan_p'),
            'kemasan_l' => $this->request->getPost('kemasan_l'),
            'kemasan_t' => $this->request->getPost('kemasan_t'),
            'berat' => $this->request->getPost('berat'),
            'daya' => $this->request->getPost('daya'),
            'pembuat' => $this->request->getPost('pembuat'),
            'refrigant' => $this->request->getPost('refrigant'),
            'cspf' => $this->request->getPost('cspf'),
        ];

        $specificationModel->save($specificationData);

        // Proceed to step 3
        return redirect()->to('/product/step3');
    }

    public function step3()  // Step 3: Product Advantages
    {
        return view('product/product_pros');  // Load the form for product advantages
    }

    public function saveStep3()
    {
        $rules = [
            'advantage1' => 'required|string',
            'advantage2' => 'string',
            'advantage3' => 'string',
            'advantage4' => 'string',
            'advantage5' => 'string',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Get the product ID from the session
        $productId = session()->get('step1')['product_id'];

        // Save step 3 data in the ProsModel
        $prosModel = new ProsModel();
        $prosData = [
            'product_id' => $productId,  // Associate the product ID with the pros
            'advantage1' => $this->request->getPost('advantage1'),
            'advantage2' => $this->request->getPost('advantage2'),
            'advantage3' => $this->request->getPost('advantage3'),
            'advantage4' => $this->request->getPost('advantage4'),
            'advantage5' => $this->request->getPost('advantage5'),
        ];

        $prosModel->save($prosData);

        // Clear session data
        session()->remove('product_id');

        // Redirect to a success page
        return redirect()->to('/success')->with('message', 'Product successfully registered');
    }

    public function deleteProduct($id)
    {
        $productModel = new ProductModel();
        $productModel->delete($id);
        return redirect()->to('/product');
    }
}
