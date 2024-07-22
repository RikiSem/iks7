<?php

include_once __DIR__ . '/../Services/Post.php';

use src\Services\Post;

$posts = (new Post())
    ->getOne($_REQUEST['id']);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../style.css">
    <title>Document</title>
</head>
<body>
<?php
    foreach ($posts as $post) {
        echo sprintf("<div class='post'>
                <div class='title'>%s</div>
                <div class='time'>%s</div>
                <div class='content'>%s</div>
                </div>",
            $post['created_at'],
            $post['title'],
            $post['content']) ;
    }
?>
</body>
</html>
