<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Investorpreftable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'investor_id' => [
                'type'           => 'INT',
                'null' => FALSE,
                'comment' => 'Investor id' ,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'Name of investor' ,
            ],
            'key_terms' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'summary of interests' ,
            ],
            'expires_on' => [
                'type'       => 'DATETIME',
                'default' =>new RawSql('CURRENT_TIMESTAMP'),
                'null' => FALSE,
                'comment' => 'expiry date' ,
            ],
            'preferences' => [
                'type'       => 'VARCHAR',
                'constraint' => '5000',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'detailed description of preferences' ,
            ],
            'risk' => [
                'type'       => 'INT',
                'null' => FALSE,
                'constraint' => 2,
                'unsigned' => TRUE,
                'default' => 0,
                'comment' => 'risk rating ' ,
            ],
            'product_type' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'product type' ,
            ],
            'instruments' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'instruments' ,
            ],
            'currency' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'currency' ,
            ],
            'major_sector' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'major sector' ,
            ],
            'minor_sector' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'minor sector' ,
            ],
            'region' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'region' ,
            ],
            'country' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'country' ,
            ],
            
        ]);
        
        $this->forge->addKey('investor_id', true);
        $this->forge->addForeignKey('investor_id', 'user_login', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('investorprefs',true);
        $this->db->query('ALTER TABLE investorprefs ADD CONSTRAINT risk_pref CHECK (risk >= 0 AND risk <= 10)');
    
        $data = array(
                    'investor_id' => "3",
                    'name' =>"Gamma" ,
                    'key_terms' =>"Low risk stuff pls",
                    'expires_on' =>"2024-05-18 13:15:15" ,
                    'preferences' =>"
                    Very deep stuff
                    ",
                    'risk' =>"1", 
                    'product_type' =>"Equity", 
                    'instruments' =>"IBM", 
                    'currency' =>"", 
                    'major_sector' =>"Technology",
                    'minor_sector' =>"Software & IT Services" , 
                    'region' =>"Asia" , 
                    'country' =>" India" 
        );
        $this->db->table('investorprefs')->insertbatch($data);
    
    
    }
    
    public function down()
    {
        $this->forge->dropTable('investorprefs');
    }
}