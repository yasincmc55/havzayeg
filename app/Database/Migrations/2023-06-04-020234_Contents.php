<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Contents extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'content_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'content_parent_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'category_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 11,
            ],
            'designer_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'language_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 11,
            ],
            'content_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'content_sort_order' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' =>1,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
            ],
            'status' => [
                'type' => 'BOOLEAN',
                'default' => 1,
            ],
            'show_place' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'content_data' => [
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

        $this->forge->addPrimaryKey('content_id');
        $this->forge->addForeignKey('category_id', 'categories', 'category_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('language_id', 'languages', 'language_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('contents');
    }

    public function down()
    {
        $this->forge->dropTable('contents');
    }
}
