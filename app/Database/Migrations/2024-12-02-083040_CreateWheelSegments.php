<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWheelSegments extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'label' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'odds' => [
                'type'       => 'FLOAT',
                'constraint' => '5,2', // Up to 2 decimal places
                'default'    => 0.0,   // Default odds if not set
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

        $this->forge->addKey('id', true); // Primary Key
        $this->forge->createTable('wheel_segments');
    }

    public function down()
    {
        $this->forge->dropTable('wheel_segments');
    }
}
