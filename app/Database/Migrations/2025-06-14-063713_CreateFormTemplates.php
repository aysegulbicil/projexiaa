<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFormTemplates extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'formtemplate_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'project_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'values' => [
                'type' => 'JSON',
                'null' => false,
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

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('formtemplate_id', 'formtemplate', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('project_id', 'projects', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('formtemplate_values');
    }

    public function down()
    {
        $this->forge->dropTable('formtemplate_values');
    }
}
