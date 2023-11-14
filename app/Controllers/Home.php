<?php

namespace App\Controllers;

use CodeIgniter\Database\RawSql;

class Home extends BaseController
{
    public function index(): string
    {
        $db = \Config\Database::connect();
        $builder = $db->table('authors');

        // $query = $builder->get(); //SELECT * FROM authors;

        // $query = $builder->getWhere(['id' => 1]); //SELECT * FROM authors WHERE id = 1;

        // $builder->select('id, first_name');
        // $query = $builder->get();

        // $sql = $builder->getCompiledSelect(); //SELECT * FROM authors;

        // $builder->select('CONCAT(first_name, " ", last_name) as full_name');
        // $query = $builder->get();

        // $sql = "CONCAT(first_name, ' ', last_name) as full_name";
        // $builder->select(new RawSql($sql));
        // $query = $builder->get();

        // $query = $builder->selectMax('id');
        // $query = $builder->selectMin('id');
        // $query = $builder->selectAvg('id');
        // $query = $builder->selectSum('id');
        // $query = $builder->selectCount('id');
        // $query = $builder->get();

        // $builder->select("id as authorid");
        // $query = $builder->get();

        // $builder->select("*");
        // $builder->join('posts', 'posts.author_id = authors.id');
        // // inner join posts on posts.author_id = authors.id
        // $builder->where("authors.id", 1);

        // $query = $builder->get();

        // $builder->select("*");
        // $builder->where("first_name", "Althea");
        // $builder->where("last_name", "McKenzie");
        // // first_name = 'Althea' AND last_name = 'McKenzie'

        // $query = $builder->get();

        // $builder->select("*");
        // $builder->where("id", "1");
        // $builder->orWhere("id", "2");
        // // id = 1 OR id = 2

        // $query = $builder->get();

        // $builder->select("*");
        // $builder->where("id !=",1);
        // id != 1
        // $builder->where("id >",1);
        // id > 1
        // $builder->where("id >=", 1);
        // id >= 1

        // $query = $builder->get();

        // $builder->select("*");
        // $builder->whereIn("id", [1,2,3]);
        // // id IN (1,2,3)

        // $query = $builder->get();

        // $builder->select("*");
        // $builder->like("first_name", "the");
        // // first_name LIKE '%the%'

        // $query = $builder->get();


        // $builder->select("*");
        // $builder->like("first_name", "the");
        // $builder->orLike("last_name", "the");
        // // first_name LIKE '%the%' OR last_name LIKE '%the%'

        // $query = $builder->get();

        // $builder->select("*");
        // // $builder->orderBy("id", "DESC");
        // // $builder->orderBy("id", "ASC");
        // $builder->groupBy("first_name");

        // $query = $builder->get();

        // $data = [
        //     'first_name' => 'RUFINO JOHN',
        //     'last_name' => 'AGUILAR',
        //     'email' => 'aguilar@gmail.com',
        //     'birthdate' => '1990-01-01',
        //     'added' => date('Y-m-d H:i:s')
        // ];

        // $builder->insert($data);

        // $builder->select("*");
        // $builder->where("first_name", 'RUFINO JOHN');
        // $query = $builder->get();


        // $data = [
        //     'first_name' => 'RUFINO',
        //     'last_name' => 'AGUILAR',
        //     'email' => 'aguilar@gmail.com',
        //     'birthdate' => '1990-01-01',
        //     'added' => date('Y-m-d H:i:s')
        // ];

        // $builder->where("id", 101);
        // $builder->update($data);

        // $builder->select("*");
        // $builder->where("id", 101);
        // $query = $builder->get();


        // $builder->where("id", 101);
        // $builder->delete();

        // $builder->select("*");
        // $builder->where("id", 101);
        // $query = $builder->get();


        // $json = new \stdClass();
        // // $json->sql = $sql;
        // $json->data = $query->getResult();

        // return json_encode($json);


        return view('welcome_message');
    }
}
