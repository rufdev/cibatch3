<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AuthorTable extends Migration
{
    public function up()
    {
        $fields = [
            'id' =>
            [
                'type' => 'INT',
                'constraint' => 5, //INT(5)
                'auto_increment' => true,
                'null' => false,
            ],
            'first_name' =>
            [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'last_name' =>
            [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'email' =>
            [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'birthdate' =>
            [
                'type' => 'DATE',
                'null' => false,
            ],
            'created_at' =>
            [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' =>
            [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ];

        $this->forge->addField($fields);
        $this->forge->addUniqueKey('email');
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('authors');
    }

    public function down()
    {
        $this->forge->dropTable('authors');
    }
}
