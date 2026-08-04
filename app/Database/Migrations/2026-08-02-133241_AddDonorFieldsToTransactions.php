<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDonorFieldsToTransactions extends Migration
{
    public function up()
    {
        $this->forge->addColumn('transactions', [
            'donor_city' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'show_name' => [
                'type'       => 'SMALLINT', // Postgres has no native TINYINT; INT(1) doesn't mean "1 digit" like MySQL
                'default'    => 1,
                'null'       => false,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('transactions', ['donor_city', 'show_name']);
    }
}