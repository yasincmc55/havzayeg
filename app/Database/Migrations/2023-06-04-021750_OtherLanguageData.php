<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OtherLanguageData extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'other_language_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'language_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'language_text' => [
                'type' => 'TEXT',
            ],
            'language_link' => [
                'type' => 'TEXT',
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

        $this->forge->addKey('other_language_id', true);
        $this->forge->addForeignKey('language_id', 'languages', 'language_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('other_language_data');
    }

    public function down()
    {
        $this->forge->dropTable('other_language_data');
    }
}
