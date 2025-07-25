<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFormDataTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'auto_increment' => true, 'unsigned' => true],
            'project_id'    => ['type' => 'INT', 'unsigned' => true],
            'template_code' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true], // yeni alan
            'name'          => ['type' => 'VARCHAR', 'constraint' => 255],
            'type'          => ['type' => 'VARCHAR', 'constraint' => 50],
            'value'         => ['type' => 'TEXT', 'null' => true],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('form_data');
    }

    public function down()
    {
        $this->forge->dropTable('form_data');
    }
}
