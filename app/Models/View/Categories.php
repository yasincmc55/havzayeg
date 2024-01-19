<?php

namespace App\Models\View;
use CodeIgniter\Model;


class Categories extends Model
{  

    protected $table;
    protected $db;
    protected $builder;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('categories');
    }

    public function select(){
        $query = $this->builder->get();
        return $query->getResult();
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
