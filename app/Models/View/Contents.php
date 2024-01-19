<?php

namespace App\Models\View;
use CodeIgniter\Model;


class Contents extends Model
{  
    protected $table;
    protected $db;
    protected $builder;
    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('contents');
    }

    public function select(){
        $query = $this->builder->get();
        return $query->getResult();
    }

    public function select_with_datas($dil){
        $this->select('*');
        $this->join('categories as c', 'c.category_id = contents.category_id');
        $this->where('in_header_menu',1);
        $this->where('language_id',$dil);
        $this->orderBy('category_sort_order','asc');
        return $this->findAll();
    }

    public function get_where($where = array()){
        $query = $this->builder->getWhere($where);
        return $query->getResult();
    }


    public function get_where_first($where = array()){
        $query = $this->builder->getWhere($where);
        return $query->getRow();
    }
    
}
