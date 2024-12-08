<?php

namespace App\Controllers;

use App\Models\WheelModel;

class WheelController extends BaseController
{
    protected $wheelModel;

    public function __construct()
    {
        $this->wheelModel = new WheelModel();
    }

    // Load Wheel Management Page
    public function index()
    {
        $segments = $this->wheelModel->findAll();
        return view('wheel/manage', ['segments' => $segments]);
    }

    // API to fetch all wheel segments
    public function getSegments()
    {
        // Fetch segments from the model
        $segments = $this->wheelModel->findAll();
        
        // Log the fetched segments for debugging
        log_message('debug', 'Fetched Segments: ' . print_r($segments, true));
        
        // Check if segments are returned
        if (!$segments) {
            return $this->response->setJSON([]);
        }
        
        // Ensure that the segments data is in the correct format (array of objects)
        return $this->response->setJSON($segments);
    }
    

    // Add or Update a Segment
    public function saveSegment()
    {
        $image = $this->request->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move('uploads/images', $newName);
        }
    
        $data = [
            'label' => $this->request->getPost('label'),
            'odds' => $this->request->getPost('odds'),
            'image' => isset($newName) ? $newName : '', // Store the image filename
        ];
    
        // Save to the database
        $this->wheelModel->insert($data);
    
        return redirect()->to('/admin/wheel');
    }
    

    // Update a Segment
    public function updateSegment($id)
    {
        $image = $this->request->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move('uploads/images', $newName);
    
          // Optionally, delete the old image if updating
$segment = $this->wheelModel->find($id);
$imagePath = 'uploads/images/' . $segment['image'];

// Check if the file exists and is a file (not a directory)
if (file_exists($imagePath) && is_file($imagePath)) {
    unlink($imagePath);
}

        }
    
        $data = [
            'label' => $this->request->getPost('label'),
            'odds' => $this->request->getPost('odds'),
            'image' => isset($newName) ? $newName : $this->request->getPost('existing_image'),
        ];
    
        // Update in the database
        $this->wheelModel->update($id, $data);
    
        return redirect()->to('/admin/wheel');
    }
    
    // Delete a Segment
    public function deleteSegment($id)
    {
        $this->wheelModel->delete($id);
        return redirect()->to('/admin/wheel');
    }

    // Spin the Wheel (API)
    public function spinWheel() {
        $segments = $this->wheelModel->findAll(); // Assuming segments are retrieved here
        $totalOdds = array_sum(array_column($segments, 'odds'));
    
        $random = mt_rand(1, $totalOdds * 100) / 100;  // Random number based on odds
        $cumulative = 0;
    
        foreach ($segments as $segment) {
            $cumulative += $segment['odds'];
            if ($random <= $cumulative) {
                // Send the selected segment and its cumulative angle to the frontend
                return $this->response->setJSON([
                    'segment' => $segment,
                    'angle' => $cumulative // Send cumulative angle for correct alignment
                ]);
            }
        }
    }
    
    
    // Render Spin the Wheel View
    public function wheel()
    {
        return view('wheel/spin');
    }
}
