<?php
namespace App\Controllers\Admin;

use App\Models\CategoryModel;
use App\Models\SubcategoryModel;
use App\Controllers\BaseController;

class SubkategoriController extends BaseController
{
    // Dashboard view
    public function index()
    {
        $subcategoryModel = new SubcategoryModel();
        $categoryModel = new CategoryModel();
        
        $data['subkategori'] = $subcategoryModel->getSubcategoriesWithCategory(); // Get subcategories with category data
        $data['categories'] = $categoryModel->getCategories(); // Fetch categories for the dropdown
    
        return view('subkategori/subkategori', $data); // Pass the data to the view
    }

    public function saveSubkategori()
    {
        $subcategoryModel = new SubcategoryModel();
        
        // Validate input
        $this->validate([
            'name' => 'required',
            'category_id' => 'required|is_not_unique[categories.id]', // Check if category_id exists
        ]);
    
        // Save subcategory with the category_id
        $data = [
            'name' => $this->request->getPost('name'),
            'category_id' => $this->request->getPost('category_id'), // Get category_id from the form
        ];
        
        $subcategoryModel->save($data);
        
        return redirect()->to('/admin/subkategori')->with('success', 'Subcategory added successfully.');
    }
    
    public function updateSubkategori($id)
    {
        $subcategoryModel = new SubcategoryModel();
    
        // Validate input
        $this->validate([
            'name' => 'required',
            'category_id' => 'required|is_not_unique[categories.id]', // Check if category_id exists
        ]);
    
        $data = [
            'name' => $this->request->getPost('name'),
            'category_id' => $this->request->getPost('category_id'), // Update category_id
        ];
    
        // Update the Subkategori in the database
        if (!$subcategoryModel->update($id, $data)) {
            return redirect()->back()->with('error', 'Failed to update Subkategori.');
        }
    
        return redirect()->to('/admin/subkategori')->with('success', 'Subcategory updated successfully.');
    }
    

    public function deleteSubkategori($id)
    {
        $subcategoryModel = new SubcategoryModel();
        
        if (!$subcategoryModel->find($id)) {
            return redirect()->to('/admin/subkategori')->with('error', 'Subcategory not found.');
        }
        
        $subcategoryModel->delete($id);
        
        return redirect()->to('/admin/subkategori')->with('success', 'Subcategory deleted successfully.');
    }
    
}
