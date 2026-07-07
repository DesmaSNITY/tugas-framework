<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransactions extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id'=>[
                'type'=>'BIGINT',
                'constraint'=>'20',
                'unsigned'=>'true'

            ],
            'user_id'=>[
                'type'=>'BIGINT',
                'constraint'=>'20',
                'unsigned'=>'true'
            ],
            'donationpost_id'=>[
                'type'=>'BIGINT',
                'constraint'=>'20',
                'unsigned'=>'true'
            ],
            'amount'=>[
                'type'=>'BIGINT',
                'constraint'=>'20',
                'unsigned'=>'true'
            ],
            'message'=>[
                'type'=>'TEXT',
                'null'=>true
            ],
            'payment_method'=>[
                'type'=>'VARCHAR',
                'constraint'=>50
            ],
            'status'=>[
                'type' => 'ENUM',
                'constraint' => [
                    'pending',
                    'paid',
                    'failed',
                    'expired',
                    'cancelled',
                    'refunded'
                ],
                'default' => 'pending',
            ],
            'created_at'=>[
                'type'=>'DATETIME',
                'null'=>true
            ],
            'updated_at'=>[
                'type'=>'DATETIME',
                'null'=>true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('transactions', false);
    }

    public function down()
    {
        $this->forge->dropTable('transactions');
    }
}
