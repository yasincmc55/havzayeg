<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Languages extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'language_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'language_code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'language_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'language_sort_order' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 9,
            ],
            'default_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 1,
            ],
            'default_front' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 1,
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

        $this->forge->addKey('language_id', true);
        $this->forge->createTable('languages');
    }

    public function down()
    {
        $this->forge->dropTable('languages');
    }
}
