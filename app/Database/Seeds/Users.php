<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Users extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Super Admin',
                'mail' => 'info@arnoma.com.tr',
                'password' => password_hash('Gelecek2050', PASSWORD_DEFAULT),
                'authority' => 1,
                'status' => 1,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
                
            ],
            // Ekleme yapmak istediğiniz diğer kullanıcılar...
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
