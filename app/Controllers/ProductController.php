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
use App\Models\ProsModel;
use App\Models\UploadsModel;  // Add Pros model for step 3
use App\Models\ConfirmationModel; 
use App\Models\UkuranModel; 
use App\Models\GaransiPanelModel;
use App\Models\GaransiMotorModel;
use App\Models\GaransiSemuaServiceModel;
use App\Models\GaransiElemenPanasModel;

class ProductController extends BaseController
{
    protected $productModel;  // Define productModel as a property

    public function __construct()
    {
        // Instantiate the product model in the constructor
        $this->productModel = new ProductModel();
        $this->confirmationModel = new ConfirmationModel();
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
            ->where('products.status', 'confirmed')
            ->findAll();
    
        // Pass data to the view
        return view('product/list_product', $data);
    }

    public function approved()
    {
        if (session()->get('role') !== 'superadmin') {
            return redirect()->to('/no-access');
        }
    
        $product_model = new ProductModel();
    
        $data['products'] = $product_model->select('products.id, products.color, products.product_type, brands.name as brand_name, categories.name as category_name, subcategories.name as subcategory_name, capacities.value as capacity, compressor_warranties.value as compressor_warranty, sparepart_warranties.value as sparepart_warranty')
            ->join('brands', 'brands.id = products.brand_id')
            ->join('categories', 'categories.id = products.category_id')
            ->join('subcategories', 'subcategories.id = products.subcategory_id')
            ->join('capacities', 'capacities.id = products.capacity_id')
            ->join('compressor_warranties', 'compressor_warranties.id = products.compressor_warranty_id')
            ->join('sparepart_warranties', 'sparepart_warranties.id = products.sparepart_warranty_id')
            ->where('products.status', 'approved')  // Ensure 'approved' filter
            ->findAll();
    
        return view('product/approved_product', $data);
    }
    
    public function rejected()
    {
        if (session()->get('role') !== 'superadmin') {
            return redirect()->to('/no-access');
        }
    
        $product_model = new ProductModel();
    
        $data['products'] = $product_model->select('products.id, products.color, products.product_type, brands.name as brand_name, categories.name as category_name, subcategories.name as subcategory_name, capacities.value as capacity, compressor_warranties.value as compressor_warranty, sparepart_warranties.value as sparepart_warranty')
            ->join('brands', 'brands.id = products.brand_id')
            ->join('categories', 'categories.id = products.category_id')
            ->join('subcategories', 'subcategories.id = products.subcategory_id')
            ->join('capacities', 'capacities.id = products.capacity_id')
            ->join('compressor_warranties', 'compressor_warranties.id = products.compressor_warranty_id')
            ->join('sparepart_warranties', 'sparepart_warranties.id = products.sparepart_warranty_id')
            ->where('products.status', 'rejected')  // Ensure 'rejected' filter
            ->findAll();
    
        return view('product/rejected_product', $data);
    }    

    public function getSubcategories($categoryId)
    {
        $subcategoryModel = new SubcategoryModel();
    
        // Fetch subcategories based on categoryId
        $subcategories = $subcategoryModel->where('category_id', $categoryId)->findAll();
    
        // Return as JSON
        return $this->response->setJSON($subcategories);
    }

    public function getUkuranTv($subcategoryId) {
        {
            $ukuranModel = new UkuranModel();
    
            // Fetch the data based on the subcategory ID
            $ukuran = $ukuranModel->where('subcategory_id', $subcategoryId)->findAll();
    
            if ($ukuran) {
                return $this->response->setJSON($ukuran);
            } else {
                return $this->response->setStatusCode(ResponseInterface::HTTP_NOT_FOUND)
                                      ->setBody('No data found');
            }
        }
    }

    public function getCompressorWarranties()
    {
        $model = new CompressorWarrantyModel();
        $warranties = $model->findAll();

        return $this->response->setJSON($warranties);
    }
     public function getGaransiPanel()
     {
         $garansiPanelModel = new GaransiPanelModel();
         $data = $garansiPanelModel->findAll();
         return $this->response->setJSON($data);
     }
     // Fetch Garansi Motor data
     public function getPanelWarranties()
     {
         $model = new GaransiPanelModel();
         $warranties = $model->findAll();
 
         return $this->response->setJSON($warranties);
     }
 
     public function getMotorWarranties()
     {
         $model = new GaransiMotorModel();
         $warranties = $model->findAll();
 
         return $this->response->setJSON($warranties);
     }

     public function getHeatWarranties()
     {
         $model = new GaransiElemenPanasModel();
         $warranties = $model->findAll();
 
         return $this->response->setJSON($warranties);
     }
     // Fetch Garansi Semua Service data
     public function getGaransiSemuaService()
     {
         $model = new GaransiSemuaServiceModel();
         $warranties = $model->findAll();
         return $this->response->setJSON($warranties);
     }

      // Fetch Ukuran TV data
      public function getCapacities($subcategoryId) {
        log_message('info', 'getCapacities called with ID: ' . $subcategoryId);
    
        try {
            $capacityModel = new CapacityModel();
            $capacities = $capacityModel->where('subcategory_id', $subcategoryId)->findAll();
    
            return $this->response->setJSON($capacities);
        } catch (\Exception $e) {
            log_message('error', 'Error in getCapacities: ' . $e->getMessage());
            return $this->response->setJSON(['error' => 'An error occurred: ' . $e->getMessage()])->setStatusCode(500);
        }
    }

    public function step1()
    {
        $brandModel = new BrandModel();
        $categoryModel = new CategoryModel();
        $subcategoryModel = new SubcategoryModel();
        $capacityModel = new CapacityModel();
        $compressorwarrantyModel = new CompressorwarrantyModel();
        $sparepartwarrantyModel = new SparepartwarrantyModel();
        $garansiEPModel = new GaransiElemenPanasModel();
        $garansimotorModel = new GaransiMotorModel();
        $garansipanelModel = new GaransiPanelModel();
        $garansiserviceModel = new GaransiSemuaServiceModel();
        $ukuranModel = new UkuranModel();
        
        $data['brands'] = $brandModel->findAll();
        $data['categories'] = $categoryModel->findAll();
        $data['subcategories'] = $subcategoryModel->findAll();
        $data['capacities'] = $capacityModel->findAll();
        $data['compressor_warranties'] = $compressorwarrantyModel->findAll();
        $data['sparepart_warranties'] = $sparepartwarrantyModel->findAll();
        $data['garansi_elemen_panas'] = $garansiEPModel->findAll();
        $data['garansi_motor'] = $garansimotorModel->findAll();
        $data['garansi_panel'] = $garansipanelModel->findAll();
        $data['garansi_semua_service'] = $garansiserviceModel->findAll();
        $data['ukuran'] = $ukuranModel->findAll();

        return view('product/product_registration', $data);
    }

    public function saveStep1()
    {
        // Get all POST data
        $step1Data = $this->request->getPost();
        dd($step1Data);
    
        // Basic validation rules
        $validationRules = [
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'product_type' => 'required',
            'color' => 'required',
        ];
    
        // Additional rules for dynamic fields based on category and subcategory
        $category = $step1Data['category_id'];
        $subcategory = $step1Data['subcategory_id'];
    
        // Validation rules based on category and subcategory
        if ($category == '9') { // TV
            $validationRules['garansi_panel_id'] = 'required';  // Correct field name
            $validationRules['sparepart_warranty_id'] = 'required'; // Ensure this is present
            $validationRules['ukuran_size'] = 'required'; // Adjusted field name
        } elseif (in_array($category, ['3', '4', '5', '7'])) {
            $validationRules['compressor_warranty_id'] = 'required';  // Corrected field name
            $validationRules['sparepart_warranty_id'] = 'required';
            $validationRules['capacity_id'] = 'required';        
        } elseif ($category == '6') {
            $validationRules['garansi_motor_id'] = 'required'; // Ensure this matches your form
            $validationRules['sparepart_warranty_id'] = 'required';
            $validationRules['capacity'] = 'required';
        } elseif ($subcategory == '31') {
            $validationRules['garansi_semua_service'] = 'required';
            $validationRules['ukuran'] = 'required';
        } elseif (in_array($subcategory, ['35', '36'])) {
            // Only validate if these fields should be visible
            if (isset($step1Data['kapasitas_air_panas']) && $step1Data['kapasitas_air_panas'] !== '') {
                $validationRules['kapasitas_air_panas'] = 'required';
            }
            if (isset($step1Data['kapasitas_air_dingin']) && $step1Data['kapasitas_air_dingin'] !== '') {
                $validationRules['kapasitas_air_dingin'] = 'required';
            }
            $validationRules['compressor_warranty_id'] = 'required'; // Assuming you still want this
        } elseif ($subcategory == '37') {
            $validationRules['sparepart_warranty_id'] = 'required';
            $validationRules['capacity'] = 'required';
            $validationRules['garansi_elemen_panas'] = 'required';
        }
    
        // Apply validation
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        // If validation passes, save the product data
        $productData = [
            'brand_id' => $step1Data['brand_id'], // Corrected from 'brand'
            'category_id' => $step1Data['category_id'], // Corrected from 'category'
            'subcategory_id' => $step1Data['subcategory_id'], // Corrected from 'subcategory'
            'tipe_produk' => $step1Data['product_type'], // Corrected from 'tipe_produk'
            'warna' => $step1Data['color'], // Corrected from 'warna'
            
            // Dynamic fields based on conditions
            'garansi_panel_id' => ($category == '9') ? $step1Data['garansi_panel_id'] : null,
            'compressor_warranty_id' => in_array($category, ['3', '4', '5', '7', '9']) ? $step1Data['compressor_warranty_id'] : null,
            'capacity_id' => in_array($category, ['3', '4', '5', '7']) ? $step1Data['capacity_id'] : null,
            'garansi_motor_id' => ($category == '6') ? $step1Data['garansi_motor_id'] : null,
            'garansi_semua_service_id' => ($subcategory == '31') ? $step1Data['garansi_semua_service_id'] : null,
    
            // Only include air capacities if they are intended to be filled
            'kapasitas_air_panas' => in_array($subcategory, ['35', '36']) && !empty($step1Data['kapasitas_air_panas']) ? $step1Data['kapasitas_air_panas'] : null,
            'kapasitas_air_dingin' => in_array($subcategory, ['35', '36']) && !empty($step1Data['kapasitas_air_dingin']) ? $step1Data['kapasitas_air_dingin'] : null,
    
            // Extra dynamic warranties or other fields
            'sparepart_warranty_id' => (in_array($category, ['3', '4', '5', '6', '7', '9']) || $subcategory == '37') ? $step1Data['sparepart_warranty_id'] : null,
            'garansi_elemen_panas_id' => ($subcategory == '37') ? $step1Data['garansi_elemen_panas'] : null,
        ];
    
        // Insert the data into the database
        $productId = $this->productModel->insert($productData);
    
        // Store product ID and step1 data in session for future steps
        session()->set('product_id', $productId);
        session()->set('step1', $step1Data);
    
        // Redirect to step 2
        return redirect()->to('/product/step2');
    }    

    // Step 2: Product Specifications
    public function step2()
    {
        return view('product/product_specification');
    }

    public function saveStep2()
    {
        $rules = [
            'produk_p' => 'required|decimal',
            // add validation rules for other fields
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save step 2 data in the session
        $step2Data = $this->request->getPost();
        session()->set('step2', $step2Data);

        return redirect()->to('/product/step3');
    }

    // Step 3: Product Advantages
    public function step3()
    {
        return view('product/product_pros');
    }

    public function saveStep3()
    {
        $advantages = $this->request->getPost();
        session()->set('step3', $advantages);

        return redirect()->to('/product/step4');
    }

    // Step 4: Upload Images
    public function step4()
    {
        return view('product/product_uploads');
    }

    public function saveStep4()
    {
        // Define the directory for uploads
        $uploadPath = WRITEPATH . 'uploads/';
    
        // Initialize variables for file names
        $gambarUtamaName = null;
        $gambarSampingKiriName = null;
        $gambarSampingKananName = null;
        $videoProdukName = null;
    
        // Handle Gambar Utama
        $gambarUtama = $this->request->getFile('gambar_utama');
        if ($gambarUtama && $gambarUtama->isValid()) {
            $gambarUtamaName = $gambarUtama->getRandomName();
            $gambarUtama->move($uploadPath, $gambarUtamaName);
        }
    
        // Handle Gambar Samping Kiri
        $gambarSampingKiri = $this->request->getFile('gambar_samping_kiri');
        if ($gambarSampingKiri && $gambarSampingKiri->isValid()) {
            $gambarSampingKiriName = $gambarSampingKiri->getRandomName();
            $gambarSampingKiri->move($uploadPath, $gambarSampingKiriName);
        }
    
        // Handle Gambar Samping Kanan
        $gambarSampingKanan = $this->request->getFile('gambar_samping_kanan');
        if ($gambarSampingKanan && $gambarSampingKanan->isValid()) {
            $gambarSampingKananName = $gambarSampingKanan->getRandomName();
            $gambarSampingKanan->move($uploadPath, $gambarSampingKananName);
        }
    
        // Handle Video Produk
        $videoProduk = $this->request->getFile('video_produk');
        if ($videoProduk && $videoProduk->isValid()) {
            $videoProdukName = $videoProduk->getRandomName();
            $videoProduk->move($uploadPath, $videoProdukName);
        }
    
        // Save the file paths into the session for step 4
        $step4Data = [
            'gambar_utama' => $gambarUtamaName,
            'gambar_samping_kiri' => $gambarSampingKiriName,
            'gambar_samping_kanan' => $gambarSampingKananName,
            'video_produk' => $videoProdukName,
        ];
    
        // Store the step 4 data in the session
        session()->set('step4', $step4Data);
    
        // Redirect to the confirmation page
        return redirect()->to('/product/confirm');
    }
    
    public function saveProductSubmission($data)
{
    // Use the product model to save the submission data
    $this->productModel->insert($data);
}

    // Final Step: Confirmation
    public function confirm()
    {
        $productId = session()->get('product_id');
    
        if (!$productId) {
            return redirect()->to('/product/step1');  // Redirect to step 1 if no product ID
        }
    
        $productData = $this->productModel->getProductData($productId);
        // Fetch step data from the session
        $step1 = session()->get('step1') ?? [];
        $step2 = session()->get('step2') ?? [];
        $step3 = session()->get('step3') ?? [];
        $step4 = session()->get('step4') ?? [];
    
        // Combine all the step data
        $finalData = array_merge($productData, $step1, $step2, $step3, $step4);
    
        // Get the logged-in user's name from the session
        $submittedBy = session()->get('name');  // Assuming the session contains 'name'
        $finalData['submitted_by'] = $submittedBy;
        // Prepare the data for insertion
        $dataToInsert = [
            'product_id' => $productId,
            'brand' => $finalData['brand'],
            'category' => $finalData['category'],
            'subcategory' => $finalData['subcategory'],
            'product_type' => $finalData['product_type'],
            'color' => $finalData['color'],
            'capacity' => $finalData['capacity_id'],
            'daya' => $finalData['daya'],
            'product_dimensions' => $finalData['produk_p'] . ' x ' . $finalData['produk_l'] . ' x ' . $finalData['produk_t'],
            'packaging_dimensions' => $finalData['kemasan_p'] . ' x ' . $finalData['kemasan_l'] . ' x ' . $finalData['kemasan_t'],
            'berat' => $finalData['berat'],
            'refrigant' => $finalData['refrigant'],
            'compressor_warranty' => $finalData['compressor_warranty_id'],
            'sparepart_warranty' => $finalData['sparepart_warranty_id'],
            'cspf' => $finalData['cspf'],
            'gambar_utama' => $finalData['gambar_utama'],
            'gambar_samping_kiri' => $finalData['gambar_samping_kiri'],
            'gambar_samping_kanan' => $finalData['gambar_samping_kanan'],
            'video_produk' => $finalData['video_produk'],
            'status' => 'pending',  // Set status as 'pending'
            'submitted_by' => $finalData['submitted_by'],
        ];

        $this->confirmationModel->insert($dataToInsert);
        // Insert into the product_submissions table
        //$this->productModel->insert($dataToInsert);
        //$ProductId = $this->productModel->InsertID();
        //$finalData =
       // $this->table('products')
          //          ->join('brands', 'brand.id = products.brand_id')
           //         ->join('categories', 'category.id = categories.category_id')
             //       ->where('products.id', $ProductId)
               //     ->first();
        // Redirect to a confirmation page or admin page
        return view('/product/product_confirmation', ['data' => $finalData]);
    }    

    // Cancel and clear session
    public function cancel()
    {
        session()->remove(['product_id', 'step1', 'step2', 'step3', 'step4']);
        return redirect()->to('/product/step1');
    }

    public function deleteProduct($id)
    {
        $productModel = new ProductModel();
        $productModel->delete($id);
        return redirect()->to('/product');
    }

    public function finalizeProductSubmission()
{
    // Fetch data from session
    $productsData = session()->get('finalData');
    
    // Fetch the current logged-in user's name or ID
    $submittedBy = session()->get('name'); // Assuming session holds the logged-in user's name
    
    // Get the current date
    $currentDate = date('Y-m-d');
    
    // Prepare the data to insert into the final products table
    $dataToInsert = [
        'brand' => $productsData['brand'],
        'product_type' => $productsData['product_type'],
        'submitted_by' => $submittedBy,
        'confirmed_at' => $currentDate,
        'other_data' => $productsData['other_data'], // All other product fields
        'status' => 'confirmed', // You can track the status in the table
    ];
    
    // Insert into the products table
    $this->productModel->insert($dataToInsert);
    
    // Redirect to success page or admin dashboard
    return redirect()->to('/')->with('success', 'Product has been successfully confirmed.');
}

}
