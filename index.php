<?php

include_once 'src/Services/Post.php';

use src\Services\Post;

$posts = (new Post())
    ->get();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Мини блог</title>
</head>
<body>
    <form class="form" method="post" action="src/Handlers/PostHandler.php">
        <input style="margin: 3px" type="text" name="title" placeholder="Заголовок">
        <textarea rows="5" style="margin: 3px" name="content" placeholder="Тело поста"></textarea>
        <input style="margin: 3px" type="submit" value="Отправить">
    </form>
    <?php
        foreach ($posts as $post) {
            echo sprintf(
    "<a href='src/Pages/PostPage.php?id=%s' style='text-decoration: none'>
                <div class='post'>
                    <span class='title'>%s</span>
                    <span class='time'>%s</span>
                    <span class='time'>%s</span>
                </div>
            </a>",
                $post['id'],
                $post['created_at'],
                $post['title'],
                $post['content']
            );
        }
    ?>
</body>
</html>

