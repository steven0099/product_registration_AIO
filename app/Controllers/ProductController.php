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
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class ProductController extends BaseController
{
    protected $productModel;  // Define productModel as a property
    protected $brandModel;
    protected $categoryModel;
    protected $subcategoryModel;
    protected $capacityModel;
    protected $ukuranModel;
    protected $confirmationModel;

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
        $confirmation_model = new ConfirmationModel();
    
        // Fetch only records where status is "confirmed"
        $confirmedData = $confirmation_model->where('status', 'confirmed')->findAll();
    
        // Pass the confirmed data to the view
        return view('product/list_product', ['data' => $confirmedData]);
    }


    public function approved()
    {
          // Check if the user has the required role (admin or superadmin)
          if (session()->get('role') !== 'superadmin') {
            return redirect()->to('/no-access'); // Redirect if unauthorized
        }
    
    // Authorized users (admins and superadmins) proceed with fetching the data
    $confirmation_model = new ConfirmationModel();

    // Fetch only records where status is "confirmed"
    $data['approved_products'] = $confirmation_model->where('status', 'approved')->findAll();

        // Pass data to the view
        return view('product/approved_product', $data);
    }
    
    public function rejected(){
          // Check if the user has the required role (admin or superadmin)
          if (session()->get('role') !== 'superadmin') {
            return redirect()->to('/no-access'); // Redirect if unauthorized
        }
    
    // Authorized users (admins and superadmins) proceed with fetching the data
    $confirmation_model = new ConfirmationModel();

    // Fetch only records where status is "confirmed"
    $data['rejected_products'] = $confirmation_model->where('status', 'rejected')->findAll();

        // Pass data to the view
        return view('product/rejected_product', $data);
    }    

    public function productDetails($productId)
    {
        // Fetch product details based on productId
        $product = $this->confirmationModel->find($productId);
    
        if (!$product) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Product with ID $productId not found");
        }
    
        return view('product/details', [
            'product' => $product
        ]);
    }

public function approveProduct($productId)
{
    $this->confirmationModel->update($productId, [
        'status' => 'approved',
        'approved_at' => date('Y-m-d H:i:s')
    ]);
    return redirect()->to('/superadmin/product')->with('message', 'Product approved successfully');
}

public function rejectProduct($productId)
{
    $this->confirmationModel->update($productId, [
        'status' => 'rejected',
        'rejected_at' => date('Y-m-d H:i:s')
    ]);
    return redirect()->to('/superadmin/product')->with('message', 'Product rejected successfully');
}

public function reports()
{
    return view('reports');
}

public function generateReport()
{
    $db = \Config\Database::connect();
    $builder = $db->table('product_submissions');

    // Only include approved and rejected products
    $builder->whereIn('status', ['approved', 'rejected']);

    // Retrieve filters from form submission
    $status = $this->request->getPost('status');
    $startDate = $this->request->getPost('start_date');
    $endDate = $this->request->getPost('end_date');

    // Apply date range filter if set
    if ($startDate && $endDate) {
        $start = date('Y-m-d H:i:s', strtotime($startDate));
        $end = date('Y-m-d H:i:s', strtotime($endDate . ' 23:59:59'));
        $builder->groupStart()
                ->where('approved_at >=', $start)
                ->where('approved_at <=', $end)
                ->orWhere('rejected_at >=', $start)
                ->where('rejected_at <=', $end)
                ->groupEnd();
    }

    // Apply status filter if not 'all'
    if ($status !== 'all') {
        $builder->where('status', $status);
    }

    $products = $builder->get()->getResultArray();

    // Initialize Spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setTitle('Product Report');

    // Define ordered headers
    $headers = [
        'A' => 'Brand', 'B' => 'Kategori', 'C' => 'Subkategori', 'D' => 'Tipe Produk', 'E' => 'Warna',
        'F' => 'Garansi Motor', 'G' => 'Garansi Semua Service', 'H' => 'Garansi Elemen Panas',
        'I' => 'Garansi Panel', 'J' => 'Garansi Kompresor ', 'K' => 'Garansi Sparepart',
        'L' => 'Capacity', 'M' => 'Ukuran', 'N' => 'Kapasitas Air Panas', 'O' => 'Kapasitas Air Dingin',
        'P' => 'Dimensi Produk', 'Q' => 'Dimensi Kemasan','R'=> 'Konsumsi Daya', 'S'=> 'Berat Produk',
        'T' => 'Negara Pembuat','U' => 'Dimensi Produk Dengan Stand', 'V' => 'Resolusi Panel',
        'W' => 'Kapasitas Pendinginan', 'X' => 'CSPF', 'Y' => 'Tipe Refrigrant', 'Z' => 'Keunggulan 1',
        'AA' => 'Keunggulan 2', 'AB' => 'Keunggulan 3', 'AC' => 'Keunggulan 4', 'AD' => 'Keunggulan 5', 'AE' => 'Keunggulan 6',
        'AF' => 'Gambar Depan', 'AG' => 'Gambar Belakang', 'AH' => 'Gambar Samping Kiri', 
        'AI' => 'Gambar Samping Kanan', 'AJ' => 'Gambar Atas', 'AK' => 'Gambar Bawah',
        'AL' => 'Link Video Produk', 'AM' => 'Diajukan Oleh', 'AN' => 'Status', 'AO' => 'Tanggal Disetujui',
        'AP' => 'Tanggal Ditolak', 'AQ' => 'Tanggal Pengajuan'
    ];

    // Set headers
    foreach ($headers as $col => $header) {
        $sheet->setCellValue($col . '1', $header);
    }

    // Populate data rows
    $row = 2;
    foreach ($products as $product) {
        $sheet->setCellValue('A' . $row, $product['brand'])
              ->setCellValue('B' . $row, $product['category'])
              ->setCellValue('C' . $row, $product['subcategory'])
              ->setCellValue('D' . $row, $product['product_type'])
              ->setCellValue('E' . $row, $product['color'])
              ->setCellValue('F' . $row, (!empty($product['garansi_motor']) ? $product['garansi_motor'] . ' Tahun' : ''))
              ->setCellValue('G' . $row, (!empty($product['garansi_semua_service']) ? $product['garansi_semua_service'] . ' Tahun' : ''))
              ->setCellValue('H' . $row, (!empty($product['garansi_elemen_panas']) ? $product['garansi_elemen_panas'] . ' Tahun' : ''))
              ->setCellValue('I' . $row, (!empty($product['garansi_panel']) ? $product['garansi_panel'] . ' Tahun' : ''))
              ->setCellValue('J' . $row, (!empty($product['compressor_warranty']) ? $product['compressor_warranty'] . ' Tahun' : ''))
              ->setCellValue('K' . $row, (!empty($product['sparepart_warranty']) ? $product['sparepart_warranty'] . ' Tahun' : ''))              
              ->setCellValue('L' . $row, $product['capacity'] ?? '')
              ->setCellValue('M' . $row, $product['ukuran'] ?? '')
              ->setCellValue('N' . $row, (!empty($product['kapasitas_air_panas']) ? $product['kapasitas_air_panas'].' Liter' : ''))
              ->setCellValue('O' . $row, (!empty($product['kapasitas_air_dingin']) ? $product['kapasitas_air_dingin'].' Liter' : ''))
              ->setCellValue('P' . $row, $product['product_dimensions'] ?? '')
              ->setCellValue('Q' . $row, $product['packaging_dimensions'] ?? '')
              ->setCellValue('R' . $row, $product['daya'].' Watt' ?? '')
              ->setCellValue('S' . $row, $product['berat'].' Kg' ?? '')
              ->setCellValue('T' . $row, $product['pembuat'] ?? '')
              ->setCellValue('U' . $row, $product['pstand_dimensions'] ?? '')
              ->setCellValue('V' . $row, (!empty($product['panel_resolution']) ? $product['panel_resolution'].' Pixel' : ''))
              ->setCellValue('W' . $row, (!empty($product['cooling_capacity']) ? $product['cooling_capacity'].' BTU/H' : ''))
              ->setCellValue('X' . $row, $product['cspf'] ?? '')
              ->setCellValue('Y' . $row, (!empty($product['refrigrant']) ? $product['cspf'].'/5' : ''))
              ->setCellValue('Z' . $row, $product['advantage1'] ?? '')
              ->setCellValue('AA' . $row, $product['advantage2'] ?? '')
              ->setCellValue('AB' . $row, $product['advantage3'] ?? '')
              ->setCellValue('AC' . $row, $product['advantage4'] ?? '')
              ->setCellValue('AD' . $row, $product['advantage5'] ?? '')
              ->setCellValue('AE' . $row, $product['advantage6'] ?? '')
              ->setCellValue('AF' . $row, base_url('uploads/' . esc($product['gambar_depan'])))
              ->setCellValue('AG' . $row, base_url('uploads/' . esc($product['gambar_belakang'])) ?? '')
              ->setCellValue('AH' . $row, base_url('uploads/' . esc($product['gambar_samping_kiri'])) ?? '')
              ->setCellValue('AI' . $row, base_url('uploads/' . esc($product['gambar_samping_kanan'])) ?? '')
              ->setCellValue('AJ' . $row, base_url('uploads/' . esc($product['gambar_atas'])) ?? '')
              ->setCellValue('AK' . $row, base_url('uploads/' . esc($product['gambar_bawah'])) ?? '');


        // Populate remaining fields
        $sheet->setCellValue('AL' . $row, $product['video_produk'] ?? '')
              ->setCellValue('AM' . $row, $product['submitted_by'] ?? '');
              
        if ($product['status'] === 'approved') {
            $sheet->setCellValue('AN' . $row, 'Disetujui');
        } elseif ($product['status'] === 'rejected') {
            $sheet->setCellValue('AN' . $row, 'Ditolak');
        }

        // Conditionally set approved or rejected dates
        if ($product['status'] === 'approved') {
            $sheet->setCellValue('AO' . $row, $product['approved_at']);
        } elseif ($product['status'] === 'rejected') {
            $sheet->setCellValue('AP' . $row, $product['rejected_at']);
        }
        $sheet->setCellValue('AQ' . $row, $product['confirmed_at'] ?? '');
        $row++;
    }
    // Hide columns that are entirely empty
    foreach ($headers as $col => $header) {
        $columnData = $sheet->rangeToArray($col . '2:' . $col . ($row - 1), null, true, true, true);
        $allEmpty = true;
        foreach ($columnData as $cell) {
            if (!empty($cell[$col])) {
                $allEmpty = false;
                break;
            }
        }
        if ($allEmpty) {
            $sheet->getColumnDimension($col)->setVisible(false);
        }
    }
// Apply autoSize to non-image columns only
foreach (array_keys($headers) as $col) {
    if (!in_array($col, ['AC', 'AD', 'AE', 'AF', 'AG', 'AH'])) { // Non-image columns
        $sheet->getColumnDimension($col)->setAutoSize(true);
    } else {
        // Set a wider width for image columns
        $sheet->getColumnDimension($col)->setWidth(30); // or adjust as needed
    }
}

    // Download as Excel
    $fileName = "product_report_" . date('Ymd_His') . ".xlsx";
    $writer = new Xlsx($spreadsheet);

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=\"$fileName\"");
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    exit;
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
        $ukuranModel = new UkuranModel();
    
        // Fetch the data based on the subcategory ID
        $ukuran = $ukuranModel->where('subcategory_id', $subcategoryId)->findAll();
    
        // Log the received data
        log_message('info', 'getUkuranTv called with ID: ' . $subcategoryId . ' - Result: ' . json_encode($ukuran));
    
        if ($ukuran) {
            return $this->response->setJSON($ukuran);
        } else {
            return $this->response->setStatusCode(ResponseInterface::HTTP_NOT_FOUND)
                                  ->setBody('No data found');
        }
    }

    public function fetchWarrantyOptions()
    {
        $type = $this->request->getGet('type');
        log_message('info', 'fetchWarrantyOptions type: ' . $type); // Debug log
        
        $model = null;
        switch ($type) {
            case 'garansi_panel':
                $model = new GaransiPanelModel();
                break;
            case 'garansi_motor':
                $model = new GaransiMotorModel();
                break;
            case 'garansi_kompresor':
                $model = new CompressorWarrantyModel();
                break;
            case 'garansi_elemen_panas':
                $model = new GaransiElemenPanasModel();
                break;
            case 'garansi_semua_service':
                $model = new GaransiSemuaServiceModel();
                break;
            default:
                return $this->response->setJSON(['error' => 'Invalid warranty type']);
        }
    
        if ($model) {
            $warranties = $model->findAll();
            return $this->response->setJSON($warranties);
        } else {
            return $this->response->setJSON(['error' => 'Model not found']);
        }
    }
    
    
    public function getCapacities($subcategoryId) {
        log_message('info', 'getCapacities called with ID: ' . $subcategoryId);
    
        try {
            $capacityModel = new CapacityModel();
            $capacities = $capacityModel->where('subcategory_id', $subcategoryId)->findAll();
    
            // Log the retrieved capacities
            log_message('info', 'Capacities fetched: ' . json_encode($capacities));
    
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

        return view('layout/product/product_regis_step1', $data);
//        $data['previousData'] = session()->get('step1');
//
//        return view('product/product_registration', $data);
    }

    public function saveStep1()
    {
        // Get all POST data
        $step1Data = $this->request->getPost();
    
            // Convert 'color' and 'product_type' to uppercase
        $step1Data['color'] = strtoupper($step1Data['color']);
        $step1Data['product_type'] = strtoupper(preg_replace('/[-\/]/', '', $_POST['product_type']));


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
        } elseif ($category == '6' || $subcategory == '49') {
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
        } elseif ($subcategory == ['33','34','37','38','41','44']) {
            $validationRules['sparepart_warranty_id'] = 'required';
            $validationRules['capacity_id'] = 'required';
            $validationRules['garansi_elemen_panas_id'] = 'required';
    } elseif ($subcategory == '42') {
        $validationRules['sparepart_warranty_id'] = 'required';
        $validationRules['garansi_elemen_panas_id'] = 'required';
    } elseif ($subcategory == '43' || $subcategory == '48') {
        $validationRules['capacity_id'] = 'required';
        $validationRules['sparepart_warranty_id'] = 'required';
        $validationRules['garansi_elemen_panas_id'] = 'required';
    } elseif ($subcategory == '45' || $subcategory == '46') {
        $validationRules['capacity_id'] = 'required';
        $validationRules['sparepart_warranty_id'] = 'required';
        $validationRules['garansi_semua_service_id'] = 'required';
    } elseif ($subcategory == '47' || $subcategory == '50' || $subcategory == '51') {
        $validationRules['ukuran_id'] = 'required';
        $validationRules['sparepart_warranty_id'] = 'required';
        $validationRules['garansi_semua_service_id'] = 'required';
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
            'ukuran_id' => ($category == '9' || in_array($subcategory, ['31', '32','47','50','51'])) ? $step1Data['ukuran_id'] : null, 
            'garansi_panel_id' => ($category == '9') ? $step1Data['garansi_panel_id'] : null,
            'capacity_id' => (in_array($category, ['3', '4', '5', '6', '7']) || in_array($subcategory, ['33', '34', '37', '38', '41', '43', '44', '45', '46', '48', '49'])) ? $step1Data['capacity_id'] : null,
            'garansi_motor_id' => ($category == '6' || in_array($subcategory, ['32','49'])) ? $step1Data['garansi_motor_id'] : null,
            'garansi_semua_service_id' => (in_array($subcategory, ['31', '45', '46','47','50','51'])) ? $step1Data['garansi_semua_service_id'] : null,
    
            // Only include air capacities if they are intended to be filled
            'kapasitas_air_panas' => in_array($subcategory, ['35', '36']) && !empty($step1Data['kapasitas_air_panas']) ? $step1Data['kapasitas_air_panas'] : null,
            'kapasitas_air_dingin' => in_array($subcategory, ['35', '36']) && !empty($step1Data['kapasitas_air_dingin']) ? $step1Data['kapasitas_air_dingin'] : null,
    
            // Extra dynamic warranties or other fields
            'compressor_warranty_id' => (in_array($category, ['3', '4', '5', '7']) || in_array($subcategory, ['35', '36'])) ? $step1Data['compressor_warranty_id'] : null,
            'sparepart_warranty_id' => (in_array($category, ['3', '4', '5', '6', '7', '9']) || in_array($subcategory, ['33','34','37', '38','41','42','43','44','45','46','47','48', '49','50','51'])) ? $step1Data['sparepart_warranty_id'] : null,
            'garansi_elemen_panas_id' => (in_array($subcategory, ['33','34','37', '38','41','42','43','44','48'])) ? $step1Data['garansi_elemen_panas_id'] : null,
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
        return view('layout/product/product_regis_step2', $data);
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
    
        if ($category_id == 5) { // Example: For category ID 3
            $rules['cooling_capacity'] = 'required|decimal';
            $rules['refrigrant_id'] = 'required|integer'; // refrigerant type
            $rules['cspf'] = 'required|decimal';
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
        return view('layout/product/product_regis_step3');
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
        return view('layout/product/product_regis_step4');
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
    
        // Handle Gambar Tampak Depan (Required)
        $gambarDepan = $this->request->getFile('gambar_depan');
        if ($gambarDepan && $gambarDepan->isValid()) {
            $gambarDepanName = $gambarDepan->getRandomName();
            $gambarDepan->move($uploadPath, $gambarDepanName);
        } else {
            return redirect()->back()->with('error', 'Gambar Tampak Depan is required.');
        }
    
        // Handle Gambar Tampak Belakang (Optional)
        $gambarBelakang = $this->request->getFile('gambar_belakang');
        if ($gambarBelakang && $gambarBelakang->isValid()) {
            $gambarBelakangName = $gambarBelakang->getRandomName();
            $gambarBelakang->move($uploadPath, $gambarBelakangName);
        }
    
        // Handle Gambar Tampak Atas (Optional)
        $gambarAtas = $this->request->getFile('gambar_atas');
        if ($gambarAtas && $gambarAtas->isValid()) {
            $gambarAtasName = $gambarAtas->getRandomName();
            $gambarAtas->move($uploadPath, $gambarAtasName);
        }
    
        // Handle Gambar Tampak Bawah (Optional)
        $gambarBawah = $this->request->getFile('gambar_bawah');
        if ($gambarBawah && $gambarBawah->isValid()) {
            $gambarBawahName = $gambarBawah->getRandomName();
            $gambarBawah->move($uploadPath, $gambarBawahName);
        }
    
        // Handle Gambar Samping Kiri (Optional)
        $gambarSampingKiri = $this->request->getFile('gambar_samping_kiri');
        if ($gambarSampingKiri && $gambarSampingKiri->isValid()) {
            $gambarSampingKiriName = $gambarSampingKiri->getRandomName();
            $gambarSampingKiri->move($uploadPath, $gambarSampingKiriName);
        }
    
        // Handle Gambar Samping Kanan (Optional)
        $gambarSampingKanan = $this->request->getFile('gambar_samping_kanan');
        if ($gambarSampingKanan && $gambarSampingKanan->isValid()) {
            $gambarSampingKananName = $gambarSampingKanan->getRandomName();
            $gambarSampingKanan->move($uploadPath, $gambarSampingKananName);
        }
    
        // Handle Video Produk (YouTube link, optional)
        $videoProduk = $this->request->getPost('video_produk');
        if ($videoProduk && !$this->isValidYouTubeUrl($videoProduk)) {
            return redirect()->back()->with('error', 'Invalid YouTube link provided.');
        }
        $videoProdukLink = $videoProduk;
    
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
    
        // Check if a confirmation entry already exists for this product
        $existingConfirmation = $this->confirmationModel->where('product_id', $productId)->first();
    
        // Fetch product data and step data from the session
        $productData = $this->productModel->getProductData($productId) ?? [];
    // Retrieve all the session data from previous steps
    $step1Data = session()->get('step1');
    $step2Data = session()->get('step2');
    $step3Data = session()->get('step3');
    $step4Data = session()->get('step4');
    
    $finalData = array_merge($step1Data, $step2Data, $step3Data, $step4Data);
        // Get the logged-in user's name
        $submittedBy = session()->get('name');
        $finalData['submitted_by'] = $submittedBy;
    
        // Prepare foreign keys and names
        $finalData['product_id'] = $productId;
    
        $finalData = array_merge($finalData, [
            'brand_name' => $this->getNameById($this->brandModel, $finalData['brand_id'], 'name', 'Unknown Brand'),
            'category_name' => $this->getNameById($this->categoryModel, $finalData['category_id'], 'name', 'Unknown Category'),
            'subcategory_name' => $this->getNameById($this->subcategoryModel, $finalData['subcategory_id'], 'name', 'Unknown Subcategory'),
            'capacity_value' => isset($finalData['capacity_id']) 
            ? $this->getNameById($this->capacityModel, $finalData['capacity_id'], 'value', 'Unknown') 
            : '',
            'ukuran_size' => isset($finalData['ukuran_id']) 
            ? $this->getNameById($this->ukuranModel, $finalData['ukuran_id'], 'size', 'Unknown') 
            : '',
            'refrigrant_type' => isset($finalData['refrigrant_id'])
            ? $this->getNameById($this->refrigrantModel, $finalData['refrigrant_id'], 'type', 'Unknown')
            : '',
            'compressor_warranty_value' => isset($finalData['compressor_warranty_id'])
            ? $this->getNameById($this->compressorwarrantyModel, $finalData['compressor_warranty_id'], 'value', 'Unknown')
            : '',
            'sparepart_warranty_value' => isset($finalData['sparepart_warranty_id'])
            ? $this->getNameById($this->sparepartwarrantyModel, $finalData['sparepart_warranty_id'], 'value', 'Unknown')
            : '',
            'garansi_elemen_panas_value' => isset($finalData['garansi_elemen_panas_id'])
            ? $this->getNameById($this->garansipanasModel, $finalData['garansi_elemen_panas_id'], 'value', 'Unknown')
            : '',
            'garansi_motor_value' => isset($finalData['garansi_motor_id'])
            ? $this->getNameById($this->garansimotorModel, $finalData['garansi_motor_id'], 'value', 'Unknown')
            : '',
            'garansi_panel_value' => isset($finalData['garansi_panel_id'])
            ? $this->getNameById($this->garansipanelModel, $finalData['garansi_panel_id'], 'value', 'Unknown')
            : '',
            'garansi_semua_service_value' => isset($finalData['garansi_semua_service_id'])
            ? $this->getNameById($this->garansiserviceModel, $finalData['garansi_semua_service_id'], 'value', 'Unknown')
            : '',
        ]);
    
        // Group dimensions and panel resolution
        $finalData['product_dimensions'] = $this->formatDimensions($finalData, 'produk_p', 'produk_l', 'produk_t');
        $finalData['packaging_dimensions'] = $this->formatDimensions($finalData, 'kemasan_p', 'kemasan_l', 'kemasan_t');
        $finalData['pstand_dimension'] = $this->formatStandDimensions($finalData, 'pstand_p', 'pstand_l', 'pstand_t');
        $finalData['panel_resolution'] = $this->formatResolution($finalData, 'resolusi_x', 'resolusi_y');
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
            'product_type' => $finalData['product_type'],
            'color' => $finalData['color'],
            'subcategory' => $finalData['subcategory_name'],  // Use names instead of IDs
            'capacity' => $finalData['capacity_value'] ?? '',
            'ukuran' => $finalData['ukuran_size'] ?? '',
            'berat' => $finalData['berat'],
            'daya' => $finalData['daya'],
            'pembuat' => $finalData['pembuat'],
            'refrigrant' => $finalData['refrigrant_type'] ?? '',
            'compressor_warranty' => $finalData['compressor_warranty_value'] ?? '',
            'sparepart_warranty' => $finalData['sparepart_warranty_value'] ?? '',
            'garansi_elemen_panas' => $finalData['garansi_elemen_panas_value'] ?? '',
            'garansi_motor' => $finalData['garansi_motor_value'] ?? '',
            'garansi_panel' => $finalData['garansi_panel_value'] ?? '',
            'garansi_semua_service' => $finalData['garansi_semua_service_value'] ?? '',
            'kapasitas_air_panas' => $finalData['kapasitas_air_panas'] ?? '',
            'kapasitas_air_dingin' => $finalData['kapasitas_air_dingin'] ?? '',
            'product_dimensions' => $finalData['product_dimensions'] ?? '',
            'packaging_dimensions' => $finalData['packaging_dimensions'] ?? '',
            'pstand_dimensions' => $finalData['pstand_dimension'] ?? '',
            'panel_resolution' => $finalData['panel_resolution'] ?? '',
            'cooling_capacity' => $finalData['cooling_capacity'] ?? '',
            'cspf' => $finalData['cspf'] ?? '',
            'advantage1' => $finalData['advantage1'],
            'advantage2' => $finalData['advantage2'],
            'advantage3' => $finalData['advantage3'],
            'advantage4' => $finalData['advantage4'] ?? '',
            'advantage5' => $finalData['advantage5'] ?? '',
            'advantage6' => $finalData['advantage6'] ?? '',
            'gambar_depan' => $finalData['gambar_depan'],
            'gambar_belakang' => $finalData['gambar_belakang'] ?? '',
            'gambar_samping_kiri' => $finalData['gambar_samping_kiri'] ?? '',
            'gambar_samping_kanan' => $finalData['gambar_samping_kanan'] ?? '',
            'gambar_atas' => $finalData['gambar_atas'] ?? '',
            'gambar_bawah' => $finalData['gambar_bawah'] ?? '',
            'video_produk' => $finalData['video_produk'] ?? '',
        ];
    
        $data = [
            'productId' => $productId,
            'step1' => $step1Data,
            'step2' => $step2Data,
            'step3' => $step3Data,
            'step4' => $step4Data,
            'productData' => $productData, // This can include the original product data if necessary
        ];

        // Check if confirmation already exists and insert or update accordingly
        if ($existingConfirmation) {
            $this->confirmationModel->update($existingConfirmation['id'], $dataToInsert);
            log_message('debug', 'Updated confirmation: ' . print_r($dataToInsert, true));
        } else {
            $this->confirmationModel->insert($dataToInsert);
            log_message('debug', 'Inserted new confirmation: ' . print_r($dataToInsert, true));
        }

        session()->set('confirm', $dataToInsert);
    
        // Return the confirmation view with the filtered final data
        return view('/layout/product/step5', [
            'data' => $finalData,
        ]);
    }
    
    private function getNameById($model, $id, $nameField, $default)
    {
        return $id ? ($model->find($id)[$nameField] ?? $default) : $default;
    }
    

        private function formatDimensions($data, $lengthKey, $widthKey, $heightKey)
    {
        return isset($data[$lengthKey], $data[$widthKey], $data[$heightKey])
            ? "{$data[$lengthKey]} x {$data[$widthKey]} x {$data[$heightKey]} cm"
            : '';
    }
    
private function formatStandDimensions($data, $lengthKey, $widthKey, $heightKey)
{
    if ($data['category_id'] != '9') {
        return null; // Only format if category ID is '9'
    }
    return isset($data[$lengthKey], $data[$widthKey], $data[$heightKey])
        ? "{$data[$lengthKey]} x {$data[$widthKey]} x {$data[$heightKey]} cm"
        : null;
}

private function formatResolution($data, $xKey, $yKey)
{
    if ($data['category_id'] != '9') {
        return null; // Only format if category ID is '9'
    }
    return isset($data[$xKey], $data[$yKey])
        ? "{$data[$xKey]} x {$data[$yKey]}"
        : null;
}
    
    // Cancel and clear session
    public function back()
    {
        // Redirect to step 1 without losing the step 1 data
        return redirect()->to('/product/step1');
    }
    

    public function deleteProduct($id)
    {
        $confirmationModel = new ConfirmationModel();
        $confirmationModel->delete($id);
        return redirect()->to('/superadmin/product/rejected');
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
        
        // Assuming the confirmation ID is available in the session or passed as hidden input
        $productId = [
            'product_id' => $productsData['product_id'] // Adjust as necessary
        ];
        // Update the confirmation model using the ID
        $this->confirmationModel->where('product_id', $productId)->set($dataToUpdate)->update();
    
        // Optionally, you might want to add a session flash message for user feedback
        session()->setFlashdata('success', 'Product has been successfully confirmed.');
    
        // Instead of redirecting to a thank you page, stay on the current page
        return redirect()->to('product/thank_you'); // Redirect back to the confirmation page
    }    

    public function thank_you()
    {
        session()->remove('step1');
        session()->remove('step2');
        session()->remove('step3');
        session()->remove('step4');
        session()->remove('confirm');
        
    return view ('layout/product/thankyou');
    }   

    public function updateColor()
    {
        $id = $this->request->getPost('id'); // Get the product ID from the form
        $color = $this->request->getPost('color'); // Get the updated color value

        // Validation (optional)
        if (empty($id) || empty($color)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid input provided.', 'csrf_token' => csrf_hash()]);
        }
        $color = strtoupper($color);
        // Update the database
        if ($this->confirmationModel->update($id, ['color' => $color])) {
            return $this->response->setJSON(['success' => true, 'message' => 'Warna Berhasil Diubah.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update color.']);
        }
    }
 
    public function updatePower()
    {
        $id = $this->request->getPost('id'); // Get the product ID from the form
        $power = $this->request->getPost('daya'); // Get the updated color value
    
        // Validation (optional)
        if (empty($id) || empty($power)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid input provided.', 'csrf_token' => csrf_hash()]);
        }
    
        // Update the database
        if ($this->confirmationModel->update($id, ['daya' => $power])) {
            return $this->response->setJSON(['success' => true, 'message' => 'Konsumsi Daya Berhasil Diubah.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update color.']);
        }
    }

    public function updateWeight()
    {
        $id = $this->request->getPost('id'); // Get the product ID from the form
        $weight = $this->request->getPost('berat'); // Get the updated color value
    
        // Validation (optional)
        if (empty($id) || empty($weight)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid input provided.', 'csrf_token' => csrf_hash()]);
        }
    
        // Update the database
        if ($this->confirmationModel->update($id, ['berat' => $weight])) {
            return $this->response->setJSON(['success' => true, 'message' => 'Berat Produk Berhasil Diubah.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update color.']);
        }
    }

    public function updateColdCap()
    {
        $id = $this->request->getPost('id'); // Get the product ID from the form
        $coldcap = $this->request->getPost('kapasitas_air_dingin'); // Get the updated color value
    
        // Validation (optional)
        if (empty($id) || empty($coldcap)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid input provided.', 'csrf_token' => csrf_hash()]);
        }
    
        // Update the database
        if ($this->confirmationModel->update($id, ['kapasitas_air_dingin' => $coldcap])) {
            return $this->response->setJSON(['success' => true, 'message' => 'Kapasitas Air Dingin Berhasil Diubah.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update color.']);
        }
    }

    public function updateHotCap()
    {
        $id = $this->request->getPost('id'); // Get the product ID from the form
        $hotcap = $this->request->getPost('kapasitas_air_panas'); // Get the updated color value
    
        // Validation (optional)
        if (empty($id) || empty($hotcap)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid input provided.', 'csrf_token' => csrf_hash()]);
        }
    
        // Update the database
        if ($this->confirmationModel->update($id, ['kapasitas_air_panas' => $hotcap])) {
            return $this->response->setJSON(['success' => true, 'message' => 'Kapasitas Air Panas Berhasil Diubah.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update color.']);
        }
    }

    public function updateCooling()
    {
        $id = $this->request->getPost('id'); // Get the product ID from the form
        $cooling = $this->request->getPost('cooling_capacity'); // Get the updated color value
    
        // Validation (optional)
        if (empty($id) || empty($cooling)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid input provided.', 'csrf_token' => csrf_hash()]);
        }
    
        // Update the database
        if ($this->confirmationModel->update($id, ['cooling_capacity' => $cooling])) {
            return $this->response->setJSON(['success' => true, 'message' => 'Kapasitas Pendinginan Berhasil Diubah.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update color.']);
        }
    }

    public function updateCspf()
    {
        $id = $this->request->getPost('id'); // Get the product ID from the form
        $cspf = $this->request->getPost('cspf'); // Get the updated color value
    
        // Validation (optional)
        if (empty($id) || empty($cspf)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid input provided.', 'csrf_token' => csrf_hash()]);
        }

        if ($cspf > 5 || $cspf < 1) {
            return $this->response->setJSON(['success' => false, 'message' => 'Rating CSPF Harus Lebih dari 1 dan kurang dari 5.']);
        }
    
        // Update the database
        if ($this->confirmationModel->update($id, ['cspf' => $cspf])) {
            return $this->response->setJSON(['success' => true, 'message' => 'Rating CSPF Berhasil Diubah.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update color.']);
        }
    }

    public function updateManufacturer()
    {
        $id = $this->request->getPost('id'); // Get the product ID from the form
        $manufacturer = $this->request->getPost('pembuat'); // Get the updated color value
    
        // Validation (optional)
        if (empty($id) || empty($manufacturer)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid input provided.', 'csrf_token' => csrf_hash()]);
        }
        $manufacturer = strtoupper($manufacturer);
        // Update the database
        if ($this->confirmationModel->update($id, ['pembuat' => $manufacturer])) {
            return $this->response->setJSON(['success' => true, 'message' => 'Negara Pembuat Berhasil Diubah.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update color.']);
        }
    }

    public function updateHarga()
    {
        $id = $this->request->getPost('id'); // Get the product ID from the form
        $harga = $this->request->getPost('harga'); // Get the updated price value
        
        // Validation: Check if ID and harga are provided and if harga is a valid number
        if (empty($id) || empty($harga) || !is_numeric(str_replace('.', '', $harga))) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid input provided. Please enter a numeric value.', 'csrf_token' => csrf_hash()]);
        }
    
        // Convert harga to a numeric value (remove any existing formatting if it's already partially formatted)
        $harga = str_replace(['Rp', '.', ',00'], '', $harga); // Remove existing formatting elements
        $harga = (float) $harga; // Convert to a float or integer if it's a whole number
    
        // Format harga in the "Rp X.000.000,00" format
        $formattedHarga = 'Rp ' . number_format($harga, 2, ',', '.'); // Add Rp. prefix, 2 decimal places with comma, thousands separator with dot
    
        // Update the database
        if ($this->confirmationModel->update($id, ['harga' => $formattedHarga])) {
            return $this->response->setJSON(['success' => true, 'message' => 'Harga Berhasil Diubah.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update price.']);
        }
    }
    

    public function updateProductType()
    {
        $id = $this->request->getPost('id'); // Get the product ID from the form
        $producttype = $this->request->getPost('product_type'); // Get the updated color value
    
        // Validation (optional)
        if (empty($id) || empty($producttype)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid input provided.', 'csrf_token' => csrf_hash()]);
        }
        $producttype = strtoupper(preg_replace('/[-\/]/', '', $producttype));
        // Update the database
        if ($this->confirmationModel->update($id, ['product_type' => $producttype])) {
            return $this->response->setJSON(['success' => true, 'message' => 'Tipe Produk Berhasil Diubah.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update color.']);
        }
    }

    public function updateProductDimensions()
{
    $id = $this->request->getPost('id');
    $dimensions = $this->request->getPost('product_dimensions');

    // Validate inputs
    if (empty($id) || empty($dimensions)) {
        return $this->response->setJSON(['success' => false, 'message' => 'Invalid input provided.']);
    }

    // Update in the database
    $updated = $this->confirmationModel->update($id, ['product_dimensions' => $dimensions]);

    return $this->response->setJSON([
        'success' => $updated,
        'message' => $updated ? 'Dimensi Produk Berhasil Diubah.' : 'Failed to update product dimensions.'
    ]);
}

public function updatePackagingDimensions()
{
    $id = $this->request->getPost('id');
    $pdimensions = $this->request->getPost('packaging_dimensions');

    // Validate inputs
    if (empty($id) || empty($pdimensions)) {
        return $this->response->setJSON(['success' => false, 'message' => 'Invalid input provided.']);
    }

    // Update in the database
    $updated = $this->confirmationModel->update($id, ['packaging_dimensions' => $pdimensions]);

    return $this->response->setJSON([
        'success' => $updated,
        'message' => $updated ? 'Dimensi Kemasan Berhasil Diubah.' : 'Failed to update product dimensions.'
    ]);
}

public function updateStandDimensions()
{
    $id = $this->request->getPost('id');
    $sdimensions = $this->request->getPost('pstand_dimensions');

    // Validate inputs
    if (empty($id) || empty($sdimensions)) {
        return $this->response->setJSON(['success' => false, 'message' => 'Invalid input provided.']);
    }

    // Update in the database
    $updated = $this->confirmationModel->update($id, ['pstand_dimensions' => $sdimensions]);

    return $this->response->setJSON([
        'success' => $updated,
        'message' => $updated ? 'Dimensi Produk (Dengan Stand) Berhasil Diubah.' : 'Failed to update product dimensions.'
    ]);
}

public function updateResolution()
{
    $id = $this->request->getPost('id');
    $resolution = $this->request->getPost('panel_resolution');

    // Validate inputs
    if (empty($id) || empty($resolution)) {
        return $this->response->setJSON(['success' => false, 'message' => 'Invalid input provided.']);
    }

    // Update in the database
    $updated = $this->confirmationModel->update($id, ['panel_resolution' => $resolution]);

    return $this->response->setJSON([
        'success' => $updated,
        'message' => $updated ? 'Resolusi Panel Berhasil Diubah.' : 'Failed to update product dimensions.'
    ]);
}

public function updateAdvantages() {
    $id = $this->request->getPost('id');
    $adv1 = $this->request->getPost('advantage1');
    $adv2 = $this->request->getPost('advantage2');
    $adv3 = $this->request->getPost('advantage3');
    $adv4 = $this->request->getPost('advantage4') ?? '';
    $adv5 = $this->request->getPost('advantage5') ?? '';
    $adv6 = $this->request->getPost('advantage6') ?? '';

    // Validate required fields
    if (empty($id) || empty($adv1) || empty($adv2) || empty($adv3)) {
        return $this->response->setJSON(['success' => false, 'message' => '3 Keunggulan Pertama Harus Diisi.']);
    }

    // Prepare data for update
    $data = [
        'advantage1' => $adv1,
        'advantage2' => $adv2,
        'advantage3' => $adv3,
        'advantage4' => $adv4,
        'advantage5' => $adv5,
        'advantage6' => $adv6
    ];

    // Update the database
    if ($this->confirmationModel->update($id, $data)) {
        return $this->response->setJSON(['success' => true, 'message' => 'Keunggulan Berhasil Diubah.']);
    } else {
        return $this->response->setJSON(['success' => false, 'message' => 'Failed to update advantages.']);
    }
}

}