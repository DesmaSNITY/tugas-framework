<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDonationPosts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'BIGINT',
                'constraint'=>20,
                'unsigned'=>true,
                'auto_increment'=>true
            ],
            'foundation_id'=>[
                'type'=>'BIGINT',
                'constraint'=>20,
                'unsigned'=>true,
            ],
            'title'=>[
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],
            'description'=>[            
                'type'=>'TEXT'
            ],
            'deadline'=>[
                'type'=>'DATETIME'
            ],
            'target_amount' => [
                'type'       => 'BIGINT',
                'constraint' => 20,
                'unsigned'   => true,
            ],
            'current_amount' => [
                'type'       => 'BIGINT',
                'constraint' => 20,
                'unsigned'   => true,
                'default'    => 0,
            ],
            'status' => [
               'type' => 'ENUM',
               'constraint' => [
                   'draft',
                   'active',
                   'completed',
                   'cancelled',
               ],
               'default' => 'draft',
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
        $this->forge->createTable('donationposts',false);
    }

    public function down()
    {
        $this->forge->dropTable('donationposts');
    }
}
