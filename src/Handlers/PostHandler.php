<?php

include_once __DIR__ . '/../Services/Post.php';

use src\Services\Post;

try{
    (new Post())->create($_REQUEST);
    header('location: ../../index.php');
} catch (Exception $e) {
    echo $e->getMessage();
}

