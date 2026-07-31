<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePrograms extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'title'            => ['type' => 'VARCHAR', 'constraint' => 200],
            'category'         => ['type' => 'VARCHAR', 'constraint' => 100],
            'description'      => ['type' => 'TEXT'],
            'organizer'        => ['type' => 'VARCHAR', 'constraint' => 150],
            'target_amount'    => ['type' => 'DECIMAL', 'constraint' => '15,2', 'default' => 0],
            'collected_amount' => ['type' => 'DECIMAL', 'constraint' => '15,2', 'default' => 0],
            'donor_count'      => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'days_left'        => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'is_active'        => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'created_at'       => ['type' => 'DATETIME', 'null' => true],
            'updated_at'       => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('programs');
    }

    public function down()
    {
        $this->forge->dropTable('programs');
    }
}
