<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Forms extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'form_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'form_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('form_id', true);
        $this->forge->createTable('forms');
    }

    public function down()
    {
        $this->forge->dropTable('forms');
    }
}
