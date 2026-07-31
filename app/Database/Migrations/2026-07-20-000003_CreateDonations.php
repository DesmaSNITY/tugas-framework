<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDonations extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'program_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'donor_name'     => ['type' => 'VARCHAR', 'constraint' => 150],
            'donor_email'    => ['type' => 'VARCHAR', 'constraint' => 150],
            'donor_phone'    => ['type' => 'VARCHAR', 'constraint' => 30],
            'donor_city'     => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'amount'         => ['type' => 'DECIMAL', 'constraint' => '15,2'],
            'admin_fee'      => ['type' => 'DECIMAL', 'constraint' => '15,2', 'default' => 0],
            'message'        => ['type' => 'VARCHAR', 'constraint' => 200, 'null' => true],
            'show_name'      => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'payment_method' => ['type' => 'VARCHAR', 'constraint' => 30, 'null' => true],
            'status'         => ['type' => 'ENUM', 'constraint' => ['pending', 'paid', 'failed'], 'default' => 'pending'],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('program_id', 'programs', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('donations');
    }

    public function down()
    {
        $this->forge->dropTable('donations');
    }
}
