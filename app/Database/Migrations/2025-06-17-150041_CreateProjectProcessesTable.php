<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProjectProcessesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'project_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false,
            ],
            'proccesses_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'action_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => true,
            ],
            'admin_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => true,
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

        $this->forge->addKey('id', true); // primary key

        // Eğer project_id, user_id ve admin_id için foreign key tanımı yapacaksan:
        // $this->forge->addForeignKey('project_id', 'projects', 'id', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('user_id', 'users', 'id', 'SET NULL', 'CASCADE');
        // $this->forge->addForeignKey('admin_id', 'admins', 'id', 'SET NULL', 'CASCADE');

        $this->forge->createTable('project_processes');
    }

    public function down()
    {
        $this->forge->dropTable('project_processes');
    }
}
