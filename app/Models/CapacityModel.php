<?php
namespace App\Models;

use CodeIgniter\Model;

class CapacityModel extends Model
{
    protected $table = 'capacities'; // Assuming 'capacities' is your table
    protected $primaryKey = 'id';
    protected $allowedFields = ['value', 'subcategory_id'];

    // Fetch capacities with their related categories
    public function getCapacitiesWithSubcategory()
    {
        return $this->select('capacities.*, capacities.value as capacity_value, subcategories.name as subcategory_name, subcategories.id as subcategory_id, categories.name AS category_name')
                    ->join('subcategories', 'subcategories.id = capacities.subcategory_id')
                    ->join('categories', 'categories.id = subcategories.category_id') // Join with categories to get category name
                    ->findAll();
    }


        public function getBySubcategory($subcategoryId)
        {
            // Example query
            $this->db->where('subcategory_id', $subcategoryId);
            $query = $this->db->get('capacities'); // Ensure the table name is correct
    
            return $query->result(); // This returns an array of objects
        }
    
}
