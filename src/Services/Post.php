<?php

namespace src\Services;

include_once __DIR__ . '/../Repositories/PostRepository.php';

use mysqli_result;
use src\Repositories\PostRepository;

class Post
{
    private PostRepository $postRepository;

    public function __construct()
    {
        $this->postRepository = new PostRepository();
    }

    public function create(array $data)
    {
        $emptyFields = 0;
        foreach ($data as $value) {
            if (empty($value)) {
                $emptyFields ++;
            }
        }
        if ($emptyFields === 0) {
            $data['created_at'] = date('Y-m-d H:i:s', time());
            $this->postRepository->createPost($data);
        } else {
            throw new \Exception('Некоторые поля пустые');
        }
    }

    public function getOne(int $postId): mysqli_result
    {
        return $this->postRepository->getPostById($postId);
    }

    public function get(): mysqli_result
    {
        return $this->postRepository->getPosts();
    }

}