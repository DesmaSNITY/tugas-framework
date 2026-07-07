<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SetupForeignKeys extends Migration
{
    public function up()
    {
        $this->forge->addForeignKey(
            'foundation_id',
            'foundations',
            'id',
            'CASCADE',
            'CASCADE',
            'fk_donationposts_foundations'
        );

        $this->forge->processIndexes('donationposts');

        $this->forge->addForeignKey(
            'donationpost_id',
            'donationposts',
            'id',
            'CASCADE',
            'CASCADE',
            'fk_donationposts_expenses'
        );

        $this->forge->processIndexes('expenses');

        $this->forge->addForeignKey(
            'donationpost_id',
            'donationposts',
            'id',
            'CASCADE',
            'CASCADE',
            'fk_donationposts_transactions'
        );

        $this->forge->addForeignKey(
            'user_id',
            'users',
            'id',
            'CASCADE',
            'CASCADE',
            'fk_users_transactions'
        );

        $this->forge->processIndexes('transactions');
    }

    public function down()
    {
        $this->forge->dropForeignKey('donationposts','fk_donationposts_foundations');
        $this->forge->dropForeignKey('expenses','fk_donationposts_expenses');
        $this->forge->dropForeignKey('transactions', 'fk_donationposts_transactions');
        $this->forge->dropForeignKey('transactions','fk_users_transactions');
    }
}
