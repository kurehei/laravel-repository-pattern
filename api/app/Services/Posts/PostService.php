<?php

namespace App\Services\Posts;

use App\Repositories\Post\PostDataAccessRepositoryInterface AS PostDataAccess;

class PostService implements PostServiceInterface
{
    /**
     * @var $Post
     */
    protected $post;
    /**
     *
     * @param PostDataAccess $PostDataAccess
     */
    public function __construct(PostDataAccess $postDataAccess)
    {
        $this->post = $postDataAccess;
    }

    public function savePost($post) {
      try {
        $this->post->createPostData($post);
      } catch (\Exception $e) {
        return $e->getMessage();
      }
      return $message = "保存しました";
    }
}
