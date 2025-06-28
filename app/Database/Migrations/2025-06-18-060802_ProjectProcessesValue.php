<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProjectProcessesValue extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'project_books_processes_id' => [
                'type' => 'INT',
                'null' => true,
            ],
            'project_id' => [
                'type' => 'INT',
                'null' => true,
            ],
            'processes_value' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'null' => true,
            ],
            'admin_id' => [
                'type' => 'INT',
                'null' => true,
            ],
            'file_path' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'INT',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'INT',
                'null' => true,
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('project_processes_value');
    }

    public function down()
    {
        $this->forge->dropTable('project_processes_value');
    }
}
