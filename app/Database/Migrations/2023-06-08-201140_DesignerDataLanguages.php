<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DesignerDataLanguages extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'designer_data_languages_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'designer_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'language_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'language_data' =>[
                'type' => 'text',
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

        $this->forge->addPrimaryKey('designer_data_languages_id');
        $this->forge->addForeignKey('designer_id', 'designers', 'designer_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('language_id', 'languages', 'language_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('designer_data_languages');
    }

    public function down()
    {
        $this->forge->dropTable('designer_data_languages');
    }
}
