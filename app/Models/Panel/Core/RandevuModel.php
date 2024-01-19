<?php
namespace App\Models\Panel\Core;
use CodeIgniter\Model;

class RandevuModel extends Model
{
    protected $table = 'randevu';
    protected $DBGroup          = 'default';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $useAutoIncrement = true;

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'status',
        'location',
        'iso_code', 
        'phone',
        'email',
        'department',
        'video_photo',
        'message',
        'gorusme_durumu',
        'is_customer_from_panel',
        'acil_durumu',
        'tarih',
        'saat',
        'ileri_tarih',
        'ileri_saat',
        'ileri_aciklama',
        'created_at',
        'updated_at',
    ];


    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

   
}





