<?php

namespace src\Repositories;

include_once __DIR__ . '/../../config/MysqlConfig.php';

use config\MysqlConfig;
use mysqli;
use mysqli_result;

class PostRepository
{

    private mysqli $mysql;

    public function __construct()
    {
        $this->mysql = mysqli_connect(
            MysqlConfig::getHost(),
            MysqlConfig::getUsername(),
            MysqlConfig::getPassword(),
            MysqlConfig::getDataBase()
        );
    }

    public function createPost(array $data)
    {
        $values = '';
        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= "$key,";
            $values .= "'$value',";
        }
        $fields = rtrim($fields, ',');
        $values = rtrim($values, ',');

        $this->mysql->query(sprintf('INSERT INTO posts (%s) VALUES (%s)', $fields, $values));
    }

    public function getPostById(int $id): mysqli_result
    {
        return $this->mysql->query(sprintf("SELECT * FROM posts WHERE id = '%s'", $id));
    }

    public function getPosts(): mysqli_result
    {
        return $this->mysql->query('SELECT * FROM posts WHERE 1');
    }

}