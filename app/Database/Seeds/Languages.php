<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Languages extends Seeder
{
    public function run()
    {
        $data = [
            [
                'language_code' => 'tr',
                'language_name' => 'Türkçe',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            // Diğer örnek verileri buraya ekleyebilirsiniz
        ];

        $this->db->table('languages')->insertBatch($data);
    }
}

