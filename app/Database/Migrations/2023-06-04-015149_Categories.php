<?php 

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'category_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'parent_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'designer_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'content_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'category_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'category_sort_order' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'in_header_menu' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],
            'in_footer_menu' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],
            'in_panel_menu' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],
            'icon' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'status' => [
                'type' => 'BOOLEAN',
                'default' => 1,
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

        $this->forge->addPrimaryKey('category_id');
        $this->forge->createTable('categories');
    
        
        $this->forge->modifyColumn('categories', [
            'parent_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
        ]);
        $this->forge->addForeignKey('parent_id', 'categories', 'category_id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropTable('categories');
    }
}
