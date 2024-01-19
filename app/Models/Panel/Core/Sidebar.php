<?php
namespace App\Models\Panel\Core;
use CodeIgniter\Model;
use App\Models\Panel\Core\Categories;

class Sidebar extends Model
{
    public function generateSidebar()
    {
      $db   =  new Categories();
      $data = $db->where('in_panel_menu', 1)->orderBy('category_sort_order', 'ASC')->get();
      return ($data);
    }
}
