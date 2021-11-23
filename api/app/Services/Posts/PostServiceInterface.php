<?php

namespace App\Services\Posts;

interface PostServiceInterface
{
    public function savePost($post, $tags);
    public function updatePost($post, $tags);
    public function getPostDataWithTagList($id): array;
}
