<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'project_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
           'user_id' => [
            'type'       => 'INT',
            'constraint' => 11,
            'unsigned'   => true,
            'null'       => false,
        ],
            'project_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'unit' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'location' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'subject' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'subject_other' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'institutions' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'target_audience' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'purpose' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'topic' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'summary' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'activity_description' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'expected_results' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'why_implement' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'documentation' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                // dosya yolu ya da dosya adı saklanabilir
            ],
            'start_date' => [
                'type'       => 'DATE',
                'null'       => false,
            ],
            'end_date' => [
                'type'       => 'DATE',
                'null'       => false,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        $this->forge->addKey('project_id', true);
        $this->forge->createTable('project');
    }

    public function down()
    {
        $this->forge->dropTable('project');
    }
}
