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
use App\Models\RefrigrantModel;

class ProductController extends BaseController
{
    protected $productModel;  // Define productModel as a property

    public function __construct()
    {
        // Instantiate the product model in the constructor
        $this->productModel = new ProductModel();
        $this->brandModel = new BrandModel();
        $this->categoryModel = new CategoryModel();
        $this->capacityModel = new CapacityModel();
        $this->ukuranModel = new UkuranModel();
        $this->subcategoryModel = new SubcategoryModel();
        $this->compressorwarrantyModel = new CompressorWarrantyModel();
        $this->sparepartwarrantyModel = new SparepartWarrantyModel();
        $this->garansipanasModel = new GaransiElemenPanasModel();
        $this->garansimotorModel = new GaransiMotorModel();
        $this->garansipanelModel = new GaransiPanelModel();
        $this->garansiserviceModel = new GaransiSemuaServiceModel();
        $this->refrigrantModel = new RefrigrantModel();
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

        return view('layout/product/main', $data);
    }

    public function saveStep1()
    {
        // Get all POST data
        $step1Data = $this->request->getPost();
    
            // Convert 'color' and 'product_type' to uppercase
        $step1Data['color'] = strtoupper($step1Data['color']);
        $step1Data['product_type'] = strtoupper($step1Data['product_type']);

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
            $validationRules['ukuran_id'] = 'required'; // Adjusted field name
        } elseif (in_array($category, ['3', '4', '5', '7'])) {
            $validationRules['compressor_warranty_id'] = 'required';  // Corrected field name
            $validationRules['sparepart_warranty_id'] = 'required';
            $validationRules['capacity_id'] = 'required';        
        } elseif ($category == '6') {
            $validationRules['garansi_motor_id'] = 'required'; // Ensure this matches your form
            $validationRules['sparepart_warranty_id'] = 'required';
            $validationRules['capacity_id'] = 'required';
        } elseif ($subcategory == '31') {
            $validationRules['garansi_semua_service_id'] = 'required';
            $validationRules['ukuran_id'] = 'required';
        } elseif ($subcategory == '32') {
            $validationRules['garansi_motor_id'] = 'required';
            $validationRules['ukuran_id'] = 'required';
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
            $validationRules['capacity_id'] = 'required';
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
            'product_type' => $step1Data['product_type'], // Corrected from 'tipe_produk'
            'color' => $step1Data['color'], // Corrected from 'warna'
            
            // Dynamic fields based on conditions
            'ukuran_id' => ($category == '9' || in_array($subcategory, ['31', '32'])) ? $step1Data['ukuran_id'] : null, 
            'garansi_panel_id' => ($category == '9') ? $step1Data['garansi_panel_id'] : null,
            'capacity_id' => in_array($category, ['3', '4', '5', '7']) ? $step1Data['capacity_id'] : null,
            'garansi_motor_id' => ($category == '6' || $subcategory == '32') ? $step1Data['garansi_motor_id'] : null,
            'garansi_semua_service_id' => ($subcategory == '31') ? $step1Data['garansi_semua_service_id'] : null,
    
            // Only include air capacities if they are intended to be filled
            'kapasitas_air_panas' => in_array($subcategory, ['35', '36']) && !empty($step1Data['kapasitas_air_panas']) ? $step1Data['kapasitas_air_panas'] : null,
            'kapasitas_air_dingin' => in_array($subcategory, ['35', '36']) && !empty($step1Data['kapasitas_air_dingin']) ? $step1Data['kapasitas_air_dingin'] : null,
    
            // Extra dynamic warranties or other fields
            'compressor_warranty_id' => (in_array($category, ['3', '4', '5', '7']) || in_array($subcategory, ['35', '36'])) ? $step1Data['compressor_warranty_id'] : null,
            'sparepart_warranty_id' => (in_array($category, ['3', '4', '5', '6', '7', '9']) || in_array($subcategory, ['37', '38'])) ? $step1Data['sparepart_warranty_id'] : null,
            'garansi_elemen_panas_id' => (in_array($subcategory, ['37', '38'])) ? $step1Data['garansi_elemen_panas_id'] : null,
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
        $refrigrantModel = new RefrigrantModel();

        $data['refrigrant'] = $refrigrantModel->findAll();
        return view('product/product_specification', $data);
    }

    public function saveStep2()
    {
        // Get category_id from the session (set in step 1)
        $category_id = session()->get('step1')['category_id'];
    
        // Get all POST data
        $step2Data = $this->request->getPost();
    
        // Convert 'pembuat' to uppercase
        if (isset($step2Data['pembuat'])) {
            $step2Data['pembuat'] = strtoupper($step2Data['pembuat']);
        }
    
        // Start with the required fields for all categories
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
        ];
    
        // Add conditional validation rules based on category_id
        if ($category_id == 9) { // Example: For category ID 9
            $rules['pstand_p'] = 'required|decimal'; // product with stand
            $rules['pstand_l'] = 'required|decimal';
            $rules['pstand_t'] = 'required|decimal';
            $rules['resolusi_x'] = 'required|decimal'; // panel resolution
            $rules['resolusi_y'] = 'required|decimal';
        }
    
        if ($category_id == 3) { // Example: For category ID 3
            $rules['cooling_capacity'] = 'required|decimal';
            $rules['refigrant_id'] = 'required|integer'; // refrigerant type
            $rules['cspf'] = 'required|decimal|min:1|max:5';
        }
    
        // Validate based on the dynamically built rules
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        // If validation passes, save step 2 data in the session
        session()->set('step2', $step2Data);
    
        // Redirect to step 3
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
        $uploadPath = FCPATH . 'uploads/';
        
        // Initialize variables for file names
        $gambarDepanName = null;
        $gambarBelakangName = null;
        $gambarAtasName = null;
        $gambarBawahName = null;
        $gambarSampingKiriName = null;
        $gambarSampingKananName = null;
        $videoProdukLink = null;
    
        // Handle Gambar Tampak Depan
        $gambarDepan = $this->request->getFile('gambar_depan');
        if ($gambarDepan && $gambarDepan->isValid()) {
            $gambarDepanName = $gambarDepan->getRandomName();
            $gambarDepan->move($uploadPath, $gambarDepanName);
        }
    
        // Handle Gambar Tampak Belakang
        $gambarBelakang = $this->request->getFile('gambar_belakang');
        if ($gambarBelakang && $gambarBelakang->isValid()) {
            $gambarBelakangName = $gambarBelakang->getRandomName();
            $gambarBelakang->move($uploadPath, $gambarBelakangName);
        }
    
        // Handle Gambar Tampak Atas
        $gambarAtas = $this->request->getFile('gambar_atas');
        if ($gambarAtas && $gambarAtas->isValid()) {
            $gambarAtasName = $gambarAtas->getRandomName();
            $gambarAtas->move($uploadPath, $gambarAtasName);
        }
    
        // Handle Gambar Tampak Bawah
        $gambarBawah = $this->request->getFile('gambar_bawah');
        if ($gambarBawah && $gambarBawah->isValid()) {
            $gambarBawahName = $gambarBawah->getRandomName();
            $gambarBawah->move($uploadPath, $gambarBawahName);
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
    
        // Handle Video Produk (YouTube link)
        $videoProduk = $this->request->getPost('video_produk'); // Change this to getPost as we're dealing with links
        if ($videoProduk && $this->isValidYouTubeUrl($videoProduk)) {
            $videoProdukLink = $videoProduk; // Store the valid YouTube link
        } else {
            // Handle the case where the link is invalid
            return redirect()->back()->with('error', 'Invalid YouTube link provided.');
        }
    
        // Save the file paths into the session for step 4
        $step4Data = [
            'gambar_depan' => $gambarDepanName,
            'gambar_belakang' => $gambarBelakangName,
            'gambar_atas' => $gambarAtasName,
            'gambar_bawah' => $gambarBawahName,
            'gambar_samping_kiri' => $gambarSampingKiriName,
            'gambar_samping_kanan' => $gambarSampingKananName,
            'video_produk' => $videoProdukLink,
        ];
    
        // Store the step 4 data in the session
        session()->set('step4', $step4Data);
    
        // Redirect to the confirmation page
        return redirect()->to('/product/confirm');
    }
    
    // Function to validate YouTube URLs
    private function isValidYouTubeUrl($url)
    {
        $pattern = '/^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/.+$/';
        return preg_match($pattern, $url);
    }
    

    public function confirm()
    {
        $productId = session()->get('product_id');
    
        if (!$productId) {
            return redirect()->to('/product/step1');  // Redirect to step 1 if no product ID
        }
    
        // Fetch product data, ensure it's an array
        $productData = $this->productModel->getProductData($productId) ?? [];
    
        // Fetch step data from the session, ensure they are arrays
        $step1 = session()->get('step1') ?? [];
        $step2 = session()->get('step2') ?? [];
        $step3 = session()->get('step3') ?? [];
        $step4 = session()->get('step4') ?? [];
    
        // Combine all step data
        $finalData = array_merge($productData, $step1, $step2, $step3, $step4);
    
        // Get the logged-in user's name
        $submittedBy = session()->get('name');
        $finalData['submitted_by'] = $submittedBy;
    
        // Fetch category, subcategory, and warranty names by their IDs

        if (isset($finalData['brand_id'])) {
            $brand = $this->brandModel->find($finalData['brand_id']);
            $finalData['brand_name'] = $brand ? $brand['name'] : 'Unknown Brand';
        }

        if (isset($finalData['category_id'])) {
            $category = $this->categoryModel->find($finalData['category_id']);
            $finalData['category_name'] = $category ? $category['name'] : 'Unknown Category';
        }
    
        if (isset($finalData['subcategory_id'])) {
            $subcategory = $this->subcategoryModel->find($finalData['subcategory_id']);
            $finalData['subcategory_name'] = $subcategory ? $subcategory['name'] : 'Unknown Subcategory';
        }
    
        if (isset($finalData['capacity_id'])) {
            $capacity = $this->capacityModel->find($finalData['capacity_id']);
            $finalData['capacity_value'] = $capacity ? $capacity['value'] : 'Unknown';
        }

        if (isset($finalData['ukuran_id'])) {
            $ukuran = $this->ukuranModel->find($finalData['ukuran_id']);
            $finalData['ukuran_size'] = $ukuran ? $ukuran['size'] : 'Unknown';
        }

        if (isset($finalData['refrigrant_id'])) {
            $refrigrant = $this->refrigrantModel->find($finalData['refrigrant_id']);
            $finalData['refrigrant_type'] = $refrigrant ? $refrigrant['type'] : 'Unknown';
        }

        if (isset($finalData['compressor_warranty_id'])) {
            $compressorWarranty = $this->compressorwarrantyModel->find($finalData['compressor_warranty_id']);
            $finalData['compressor_warranty_value'] = $compressorWarranty ? $compressorWarranty['value'] : 'No Warranty';
        }

        if (isset($finalData['sparepart_warranty_id'])) {
            $sparepartWarranty = $this->sparepartwarrantyModel->find($finalData['sparepart_warranty_id']);
            $finalData['sparepart_warranty_value'] = $sparepartWarranty ? $sparepartWarranty['value'] : 'Unknown';
        }

        if (isset($finalData['garansi_elemen_panas_id'])) {
            $garansipanas = $this->garansipanasModel->find($finalData['garansi_elemen_panas_id']);
            $finalData['garansi_elemen_panas_value'] = $garansipanas ? $garansipanas['value'] : 'Unknown';
        }

        if (isset($finalData['garansi_motor_id'])) {
            $garansimotor = $this->garansimotorModel->find($finalData['garansi_motor_id']);
            $finalData['garansi_motor_value'] = $garansimotor ? $garansimotor['value'] : 'Unknown';
        }

        if (isset($finalData['garansi_panel_id'])) {
            $garansipanel = $this->garansipanelModel->find($finalData['garansi_panel_id']);
            $finalData['garansi_panel_value'] = $garansipanel ? $garansipanel['value'] : 'Unknown';
        }

        if (isset($finalData['garansi_semua_service_id'])) {
            $garansiservice = $this->garansiserviceModel->find($finalData['garansi_semua_service_id']);
            $finalData['garansi_semua_service_value'] = $garansiservice ? $garansiservice['value'] : 'Unknown';
        }


        // Repeat for other foreign keys like 'sparepart_warranty_id', 'garansi_panel', etc.
    
        // Group dimensions and panel resolution
        if (isset($finalData['produk_p'], $finalData['produk_l'], $finalData['produk_t'])) {
            $finalData['product_dimensions'] = $finalData['produk_p'] . ' x ' . $finalData['produk_l'] . ' x ' . $finalData['produk_t'] . ' cm';
        }
    
        if (isset($finalData['kemasan_p'], $finalData['kemasan_l'], $finalData['kemasan_t'])) {
            $finalData['packaging_dimensions'] = $finalData['kemasan_p'] . ' x ' . $finalData['kemasan_l'] . ' x ' . $finalData['kemasan_t'] . ' cm';
        }
    
        if (isset($finalData['pstand_p'], $finalData['pstand_l'], $finalData['pstand_t'])) {
            $finalData['pstand_dimension'] = $finalData['pstand_p'] . ' x ' . $finalData['pstand_l'] . ' x ' . $finalData['pstand_t'] . ' cm';
        }
    
        if (isset($finalData['resolusi_x'], $finalData['resolusi_y'])) {
            $finalData['panel_resolution'] = $finalData['resolusi_x'] . ' x ' . $finalData['resolusi_y'];
        }
    
        // Filter out null or empty values from the final data
        $finalData = array_filter($finalData, function($value) {
            return !is_null($value) && $value !== '';  // Keep only non-null, non-empty values
        });
    
        // Prepare data for insertion, only including keys with non-null values
        $dataToInsert = [
            'product_id' => $productId,
            'status' => 'pending',
            'submitted_by' => $finalData['submitted_by'],
            'brand' => $finalData['brand_name'],
            'category' => $finalData['category_name'],  // Use names instead of IDs
            'subcategory' => $finalData['subcategory_name'],  // Use names instead of IDs
            'capacity' => $finalData['capacity_value'] ?? '',
            'ukuran' => $finalData['ukuran_size'] ?? '',
            'refrigrant' => $finalData['refrigrant_type'] ?? '',
            'compressor_warranty' => $finalData['compressor_warranty_value'] ?? '',  // Default value if not set
            'sparepart_warranty' => $finalData['sparepart_warranty_value'] ?? '',
            'garansi_elemen_panas' => $finalData['garansi_elemen_panas_value'] ?? '',
            'garansi_motor' => $finalData['garansi_motor_value'] ?? '',
            'garansi_panel' => $finalData['garansi_paneel_value'] ?? '',
            'garansi_semua_service' => $finalData['garansi_semua_service_value'] ?? '',
            'kapasitas_air_panas' => $finalData['kapasitas_air_panas'] ?? '',
            'kapasitas_air_dingin' => $finalData['kapasitas_air_dingin'] ?? '',
            'product_dimensions' => $finalData['product_dimensions'],
            'packaging_dimensions' => $finalData['packaging_dimensions'],
            'pstand_dimension' => $finalData['pstand_dimension'] ?? '',
            'panel_resolution' => $finalData['panel_resolution'] ?? '',
            // Add other fields as needed
        ];
        // Define all fields that may exist
        $fields = [
            'brand', 'category', 'subcategory', 'product_type', 'color', 'capacity', 'ukuran',
            'compressor_warranty_id', 'sparepart_warranty_id', 'garansi_elemen_panas', 'garansi_motor',
            'garansi_panel', 'garansi_semua_service', 'produk_p', 'produk_l', 'produk_t', 'kemasan_p',
            'kemasan_l', 'kemasan_t', 'pstand_p', 'pstand_l', 'pstand_t', 'resolution_x', 'resolution_y',
            'daya', 'berat', 'refigrant', 'cspf', 'pembuat', 'cooling_capacity', 'advantage1',
            'advantage2', 'advantage3', 'advantage4', 'advantage5', 'advantage6', 'gambar_depan',
            'gambar_belakang', 'gambar_atas', 'gambar_bawah', 'gambar_samping_kiri', 'gambar_samping_kanan',
            'video_produk', 'kapasitas_air_panas', 'kapasitas_air_dingin',
        ];
    
        // Add each field only if it exists in $finalData
        foreach ($fields as $field) {
            if (isset($finalData[$field])) {
                $dataToInsert[$field] = $finalData[$field];
            }
        }
    
        // Insert the final data into the confirmation model
        $this->confirmationModel->insert($dataToInsert);
        session()->set('confirm', $finalData);

        // Return the confirmation view with the filtered final data
        return view('/product/product_confirmation', ['data' => $finalData]);
    }
    

    // Cancel and clear session
    public function cancel()
    {
        // Redirect to step 1 without losing the step 1 data
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
        $productsData = session()->get('confirm');
        
        // Fetch the current logged-in user's name or ID
        $submittedBy = session()->get('name'); // Assuming session holds the logged-in user's username
        
        // Get the current date
        $currentDate = date('Y-m-d H:i:s'); // Use standard format for the date
        
        // Prepare the data to update the confirmation table
        $dataToUpdate = [
            'status' => 'confirmed', // Change the status to confirmed
            'confirmed_at' => $currentDate, // Set the confirmation date
        ];

        $productId = $productsData['id'];

        // Update the confirmation model using the ID
        $this->confirmationModel->where('product_id', $productId)->set($dataToUpdate)->update();

        // Optionally, you might want to add a session flash message for user feedback
        session()->setFlashdata('success', 'Product has been successfully confirmed.');
    
        // Instead of redirecting to a thank you page, stay on the current page
        return redirect()->to('/product/confirm'); // Redirect back to the confirmation page
    }    
}
