<?php

namespace App\Controllers;

use App\Models\WheelModel;
use App\Models\WheelFXModel;

class WheelController extends BaseController
{
    protected $wheelModel;

    public function __construct()
    {
        $this->wheelModel = new WheelModel();
        $this->wheelFXModel = new WheelFXModel();
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
        $segments = $this->wheelModel->where('stock >', 0)->findAll();;
        
        // Log the fetched segments for debugging
        log_message('debug', 'Fetched Segments: ' . print_r($segments, true));
        
        // Check if segments are returned
        if (!$segments) {
            return $this->response->setJSON([]);
        }
        
        // Ensure that the segments data is in the correct format (array of objects)
        return $this->response->setJSON($segments);
    }
    
    public function rollPrize($id)
    {
        // Fetch the segment by ID
        $segment = $this->wheelModel->find($id);
    
        // Check if segment exists and if stock is greater than 0
        if ($segment && $segment['stock'] > 0) {
            // Decrease the stock by 1
            $segment['stock'] -= 1;
    
            // Update the segment in the database
            $this->wheelModel->update($id, ['stock' => $segment['stock']]);
    
            // Log the updated stock for debugging
            log_message('debug', 'Updated Stock for Segment ID ' . $id . ': ' . $segment['stock']);
            
            // Return a success response with the updated segment data
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Prize Rolled',
                'segment' => $segment
            ]);
        } else {
            // Return an error response if segment doesn't exist or is out of stock
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Segment not found or out of stock'
            ]);
        }
    }
    
    // Add or Update a Segment
    public function saveSegment()
    {
        $image = $this->request->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move('uploads/images', $newName);
        }

        $modal_img = $this->request->getFile('modal_img');
        if ($modal_img->isValid() && !$modal_img->hasMoved()) {
            $newName = $modal_img->getRandomName();
            $modal_img->move('uploads/images', $newName);
        }
    
        $data = [
            'label' => $this->request->getPost('label'),
            'odds' => $this->request->getPost('odds'),
            'stock' => $this->request->getPost('stock'),
            'jackpot' => $this->request->getPost('jackpot'),
            'image' => isset($newName) ? $newName : '', // Store the image filename
            'modal_img' => isset($newName) ? $newName : '', // Store the image filename
        ];
    
        // Save to the database
        $this->wheelModel->insert($data);
    
        return redirect()->to('/admin/wheel');
    }
    

    // Update a Segment
    public function updateSegment($id)
    {
        $image = $this->request->getFile('image');
        $modal_img = $this->request->getFile('modal_img');
        
        // Check if a new image was uploaded
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move('uploads/images', $newName);
        
            // Optionally, delete the old image if updating
            $segment = $this->wheelModel->find($id);
            $imagePath = 'uploads/images/' . $segment['image'];
        
            // Check if the file exists and is a file (not a directory)
            if (file_exists($imagePath) && is_file($imagePath)) {
                unlink($imagePath); // Delete the old image
            }
        
            // Set the new image name
            $imageName = $newName;
        } else {
            // Use the existing image name if no new image is uploaded
            $segment = $this->wheelModel->find($id);
            $imageName = $segment['image'];  // Keep the existing image name
        }
        
        if ($modal_img->isValid() && !$modal_img->hasMoved()) {
            $newName = $modal_img->getRandomName();
            $modal_img->move('uploads/images', $newName);
        
            // Optionally, delete the old image if updating
            $segment = $this->wheelModel->find($id);
            $imagePath = 'uploads/images/' . $segment['modal_img'];
        
            // Check if the file exists and is a file (not a directory)
            if (file_exists($imagePath) && is_file($imagePath)) {
                unlink($imagePath); // Delete the old image
            }
        
            // Set the new image name
            $modalImgName = $newName;
        } else {
            // Use the existing image name if no new image is uploaded
            $segment = $this->wheelModel->find($id);
            $modalImgName = $segment['modal_img'];  // Keep the existing image name
        }
        // Prepare the data for updating the segment
        $data = [
            'label' => $this->request->getPost('label'),
            'odds' => $this->request->getPost('odds'),
            'stock' => $this->request->getPost('stock'),
            'jackpot' => $this->request->getPost('jackpot'),
            'image' => $imageName,  // Use either new image or existing image
            'modal_img' => $modalImgName,
        ];
        
        // Update in the database
        $this->wheelModel->update($id, $data);
        
        // Redirect to the wheel page
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
        $segments = $this->wheelModel->findAll();
        return view('wheel/spin-1', ['segments' => $segments]);
    }

    public function getCsrfToken()
    {
        return $this->response->setJSON([
            'csrfName' => csrf_token(),
            'csrfHash' => csrf_hash(),
        ]);
    }
    
    public function Setting()
    {
        $settings = $this->wheelFXModel->findAll(); // Assuming ID 1 for settings
        return view('wheel/settings', ['settings' => $settings]);
    }   

    public function getSettings()
    {
        $settings = $this->wheelFXModel->find(1); // Assuming ID 1 for settings
        return $this->response->setJSON($settings);
    }

    public function UpdateSettings($id)
    {
        $fileSpinSFX = $this->request->getFile('spin_sfx');
        $filePrizeSFX = $this->request->getFile('prize_sfx');
        $fileJPSFX = $this->request->getFile('jp_sfx');
        $fileCDSFX = $this->request->getFile('cd_sfx');
        $fileJackpotVid = $this->request->getFile('jackpot_vid');
        $fileJackpotBG = $this->request->getFile('jackpot_bg');
        
        // Retrieve the current settings from the database
        $currentSettings = $this->wheelFXModel->find($id);
    
        // Handle spin_sfx file
        if ($fileSpinSFX && $fileSpinSFX->isValid() && !$fileSpinSFX->hasMoved()) {
            // Check if the file already exists and delete it if so
            $existingFile = FCPATH . 'audio/' . $currentSettings['spin_sfx'];
            if (file_exists($existingFile)) {
                unlink($existingFile); // Delete the old file
            }
    
            // Move the new file and set the value
            $fileSpinSFX->move(FCPATH . 'audio/', $fileSpinSFX->getName());
            $data['spin_sfx'] = $fileSpinSFX->getName();  // Update the spin_sfx with new file name
        } else {
            // Keep the existing spin_sfx if no new file is provided
            $data['spin_sfx'] = $currentSettings['spin_sfx'];
        }
    
        // Handle prize_sfx file
        if ($filePrizeSFX && $filePrizeSFX->isValid() && !$filePrizeSFX->hasMoved()) {
            // Check if the file already exists and delete it if so
            $existingFile = FCPATH . 'audio/' . $currentSettings['prize_sfx'];
            if (file_exists($existingFile)) {
                unlink($existingFile); // Delete the old file
            }
    
            // Move the new file and set the value
            $filePrizeSFX->move(FCPATH . 'audio/', $filePrizeSFX->getName());
            $data['prize_sfx'] = $filePrizeSFX->getName();  // Update the prize_sfx with new file name
        } else {
            // Keep the existing prize_sfx if no new file is provided
            $data['prize_sfx'] = $currentSettings['prize_sfx'];
        }

        if ($fileJPSFX && $fileJPSFX->isValid() && !$fileJPSFX->hasMoved()) {
            // Check if the file already exists and delete it if so
            $existingFile = FCPATH . 'audio/' . $currentSettings['jp_sfx'];
            if (file_exists($existingFile)) {
                unlink($existingFile); // Delete the old file
            }
    
            // Move the new file and set the value
            $fileJPSFX->move(FCPATH . 'audio/', $fileJPSFX->getName());
            $data['jp_sfx'] = $filePrizeSFX->getName();  // Update the prize_sfx with new file name
        } else {
            // Keep the existing prize_sfx if no new file is provided
            $data['jp_sfx'] = $currentSettings['jp_sfx'];
        }
    
        if ($fileCDSFX && $fileCDSFX->isValid() && !$fileCDSFX->hasMoved()) {
            // Check if the file already exists and delete it if so
            $existingFile = FCPATH . 'audio/' . $currentSettings['cd_sfx'];
            if (file_exists($existingFile)) {
                unlink($existingFile); // Delete the old file
            }
    
            // Move the new file and set the value
            $fileCDSFX->move(FCPATH . 'audio/', $fileCDSFX->getName());
            $data['cd_sfx'] = $fileCDSFX->getName();  // Update the prize_sfx with new file name
        } else {
            // Keep the existing prize_sfx if no new file is provided
            $data['cd_sfx'] = $currentSettings['cd_sfx'];
        }
        // Handle jackpot_vid file
        if ($fileJackpotVid && $fileJackpotVid->isValid() && !$fileJackpotVid->hasMoved()) {
            // Check if the file already exists and delete it if so
            $existingFile = FCPATH . 'video/' . $currentSettings['jackpot_vid'];
            if (file_exists($existingFile)) {
                unlink($existingFile); // Delete the old file
            }
    
            // Move the new file and set the value
            $fileJackpotVid->move(FCPATH . 'video/', $fileJackpotVid->getName());
            $data['jackpot_vid'] = $fileJackpotVid->getName();  // Update the jackpot_vid with new file name
        } else {
            // Keep the existing jackpot_vid if no new file is provided
            $data['jackpot_vid'] = $currentSettings['jackpot_vid'];
        }
    
                // Handle jackpot_vid file
                if ($fileJackpotBG && $fileJackpotBG->isValid() && !$fileJackpotBG->hasMoved()) {
                    // Check if the file already exists and delete it if so
                    $existingFile = FCPATH . 'images/' . $currentSettings['jackpot_bg'];
                    if (file_exists($existingFile)) {
                        unlink($existingFile); // Delete the old file
                    }
            
                    // Move the new file and set the value
                    $fileJackpotBG->move(FCPATH . 'images/', $fileJackpotBG->getName());
                    $data['jackpot_bg'] = $fileJackpotBG->getName();  // Update the jackpot_vid with new file name
                } else {
                    // Keep the existing jackpot_vid if no new file is provided
                    $data['jackpot_bg'] = $currentSettings['jackpot_bg'];
                }
            
        // Update the database with the new values
        $this->wheelFXModel->update($id, $data);
        
        // Redirect back with a success message
        return redirect()->to('/admin/wheel/setting')->with('status', 'Settings updated successfully.');
    }    

}
