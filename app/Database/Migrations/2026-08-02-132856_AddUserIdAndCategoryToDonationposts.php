<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserIdAndCategoryToDonationposts extends Migration
{
    public function up()
    {
        $this->forge->addColumn('donationposts', [
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'category' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('donationposts', ['user_id', 'category']);
    }
}