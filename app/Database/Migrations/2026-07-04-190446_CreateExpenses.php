<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateExpenses extends Migration
{
    public function up()
    {
    
        
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'donationpost_id' => [
                'type'       => 'BIGINT',
                'constraint' => 20,
                'unsigned'   => true,
            ],

            'amount' => [
                'type'       => 'BIGINT',
                'constraint' => 20,
                'unsigned'   => true,
            ],
            // use benificiary or use fondation 
            // 'beneficiary' => [
            //     'type'       => 'VARCHAR',
            //     'constraint' => 255,
            // ],

            'status' => [
                'type' => 'ENUM',
                'constraint' => [
                    'pending',
                    'approved',
                    'paid',
                    'rejected',
                ],
                'default' => 'pending',
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

        $this->forge->createTable('expenses',false);
    }

    public function down()
    {
        $this->forge->dropTable('expenses');
    }
}
