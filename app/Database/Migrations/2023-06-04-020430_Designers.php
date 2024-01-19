<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Designers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'designer_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'designer_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'view_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'designer_sort_order' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 9999,
            ],
            'designer_data' => [
                'type' => 'LONGTEXT',
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('designer_id');
        $this->forge->createTable('designers');
    }

    public function down()
    {
        $this->forge->dropTable('designers');
    }
}

