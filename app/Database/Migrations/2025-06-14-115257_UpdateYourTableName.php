<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateYourTableName extends Migration
{
     public function up()
    {
        // 'project' tablosuna 'template_code' adlı VARCHAR(50) alan ekle
        $fields = [
            'template_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
                'default'    => 'default',  // istersen varsayılan değer ver
            ]
        ];
        $this->forge->addColumn('project', $fields);
    }

    public function down()
    {
        // rollback için kolonu sil
        $this->forge->dropColumn('project', 'template_code');
    }
}
