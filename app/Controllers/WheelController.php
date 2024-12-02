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
        $id = $this->request->getPost('id');
        $data = [
            'label' => $this->request->getPost('label'),
            'odds'  => $this->request->getPost('odds'),
        ];

        if ($id) {
            $this->wheelModel->update($id, $data);
        } else {
            $this->wheelModel->insert($data);
        }

        return redirect()->to('/admin/wheel');
    }

    // Update a Segment
    public function updateSegment($id)
    {
        $data = [
            'label' => $this->request->getPost('label'),
            'odds' => $this->request->getPost('odds'),
        ];

        if (!$this->wheelModel->update($id, $data)) {
            return redirect()->back()->with('error', 'Failed to update Segment.');
        }

        return redirect()->to('/admin/wheel')->with('success', 'Segment updated successfully.');
    }

    // Delete a Segment
    public function deleteSegment($id)
    {
        $this->wheelModel->delete($id);
        return redirect()->to('/admin/wheel');
    }

    // Spin the Wheel (API)
    public function spinWheel()
    {
        $segments = $this->wheelModel->findAll();

        // Calculate total odds
        $totalOdds = array_sum(array_column($segments, 'odds'));

        // Generate a random number
        $random = mt_rand(1, $totalOdds * 100) / 100;

        $cumulative = 0;
        foreach ($segments as $segment) {
            $cumulative += $segment['odds'];
            if ($random <= $cumulative) {
                return $this->response->setJSON($segment); // Return the winning segment
            }
        }
    }

    // Render Spin the Wheel View
    public function wheel()
    {
        return view('wheel/spin');
    }
}
