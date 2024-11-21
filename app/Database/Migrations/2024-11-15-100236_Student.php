<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Student extends Migration
{
    public function up()
    {
       
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'unique' => true,
            ],
            'phone' => [
                'type' => 'varchar',
                'constraint' => 11,
                
            ],
        ]);
        
        // Set primary key
        $this->forge->addKey('id', true);
        
        // Create the table
        $this->forge->createTable('students');
    }

    public function down()
    {
        // Drop the table if it exists
        $this->forge->dropTable('students');
    }
 }

   

