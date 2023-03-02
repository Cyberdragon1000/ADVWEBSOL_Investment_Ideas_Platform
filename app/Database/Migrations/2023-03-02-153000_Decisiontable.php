<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Decisiontable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idea_id' => [
                'type'           => 'INT',
                'null' => FALSE,
                'comment' => 'Investor id' ,
            ],
            'investor_id' => [
                'type'           => 'INT',
                'null' => FALSE,
                'comment' => 'Investor id' ,
            ],
            'decision' => [
                'type'           => 'ENUM("A","R","P")',
                'default' => 'P',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'decision on the idea' ,
            ],
            'decision_on' => [
                'type'       => 'DATETIME',
                'default' =>new RawSql('CURRENT_TIMESTAMP'),
                'null' => FALSE,
                'comment' => 'expiry date' ,
            ],
        ]);
        
        $this->forge->addKey(['idea_id','investor_id'], true,true,'decision_id');
        $this->forge->addForeignKey('investor_id', 'investorprefs', 'investor_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('idea_id', 'ideas', 'idea_number', 'CASCADE', 'CASCADE');
        $this->forge->createTable('decision',true);

        $data = array(
            'idea_id' => "1",
            'investor_id' =>"3" ,
            'decision' =>"A",
            'decision_on' =>"2023-05-18 13:15:15"
            );
            $this->db->table('decision')->insertbatch($data);
    }
    
    public function down()
    {
        $this->forge->dropTable('decision');
    }
}