<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PostTable extends Migration
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
            'author_id' =>
            [
                'type' => 'INT',
                'constraint' => 5, //INT(5)
                'null' => false,
            ],
            'title' =>
            [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'description' =>
            [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'content' =>
            [
                'type' => 'TEXT',
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
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('author_id', 'authors', 'id');
        $this->forge->createTable('posts');
    }

    public function down()
    {
        $this->forge->dropTable('posts');
    }
}
