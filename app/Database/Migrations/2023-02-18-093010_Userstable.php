<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Userstable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true,
                'null' => FALSE,
                'comment' => 'Identification number' ,
            ],
            'user_type' => [
                'type'           => 'ENUM("IG","RM","C")',
                'default' => 'IG',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'Role type' ,
            ],
            'first_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'First name' ,
            ],
            'last_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'Last name' ,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'email id' ,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'collation' => 'utf8mb4_general_ci',
                'null' => FALSE,
                'comment' => 'the password' ,
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'default' => new RawSql('CURRENT_TIMESTAMP'),//needs to be escaped apparently
                'null' => FALSE,
                'comment' => 'created date' ,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'default' =>new RawSql('CURRENT_TIMESTAMP'),
                'null' => FALSE,
                'comment' => 'details updated date' ,
            ],
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user_login',true);

        $data = array(
            array('id' => "1", 'user_type' =>"RM" , 'first_name' =>"Tester",'last_name' =>"Alpha" , 'email' =>"tester1@email.com" , 'password' =>"$2y$10$.NEeimnC82WGg0822dYq.eyYjQu4ocMXedPVaIGXoFuNWokVmdICi",'created_at' =>"2023-02-18 13:15:15",'updated_at' =>"2023-02-18 13:15:15"),//password
            array('id' => "2", 'user_type' =>"IG" , 'first_name' =>"Tester",'last_name' =>"Beta" , 'email' =>"tester2@email.com" , 'password' =>"$2y$10\$Ypq1v88iIpL0YUS6ohLSmeXauetxqcW4GEnIHolBVlgxdcNFZwBLC",'created_at' =>"2023-02-18 13:15:48",'updated_at' =>"2023-02-18 13:15:48"),//password2
            array('id' => "3", 'user_type' =>"C" , 'first_name' =>"Tester",'last_name' =>"Gamma" , 'email' =>"tester3@email.com" , 'password' =>"$2y$10\$hx/.7iotMTN1Q2UNrbAdk.PLZo63/mEtN9cA9jIvGh.d0uesw0RAOpassword3",'created_at' =>"2023-02-18 13:16:18",'updated_at' =>"2023-02-18 13:16:18")//password3
         );
        $this->db->table('user_login')->insertbatch($data);
    }

    public function down()
    {
        $this->forge->dropTable('user_login');
    }
}