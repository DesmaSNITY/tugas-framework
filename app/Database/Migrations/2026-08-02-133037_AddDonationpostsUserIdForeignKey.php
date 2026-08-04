<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDonationpostsUserIdForeignKey extends Migration
{
    public function up()
    {
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'SET NULL', 'donationposts');
    }

    public function down()
    {
        $this->forge->dropForeignKey('donationposts', 'donationposts_user_id_foreign');
    }
}
