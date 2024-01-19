<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Folder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'folder_name' => 'uploads',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            // Diğer örnek verileri buraya ekleyebilirsiniz
        ];

        $this->db->table('folders')->insertBatch($data);
    }
}
