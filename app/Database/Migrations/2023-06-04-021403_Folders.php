<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Folders extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'folder_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'folder_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'parent_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true, // Parent folder olmayanlar için NULL
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

        $this->forge->addPrimaryKey('folder_id');
        $this->forge->addForeignKey('parent_id', 'folders', 'folder_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('folders');
    }

    public function down()
    {
        $this->forge->dropTable('folders');
    }
}
