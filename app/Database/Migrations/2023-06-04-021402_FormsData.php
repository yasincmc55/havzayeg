<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FormsData extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'form_data_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'form_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'language_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'form_title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'form_list_labels' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'designer_data' => [
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

        $this->forge->addKey('form_data_id', true);
        $this->forge->addForeignKey('form_id', 'forms', 'form_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('forms_data');
    }

    public function down()
    {
        $this->forge->dropTable('forms_data');
    }
}

