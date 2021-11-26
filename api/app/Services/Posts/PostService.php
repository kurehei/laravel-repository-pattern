<?php

namespace App\Services\Posts;

use DB;
use App\Repositories\Post\PostDataAccessRepositoryInterface AS PostDataAccess;
use \App\Repositories\Tag\TagDataAccessRepositoryInterface AS TagDataAccess;

class PostService implements PostServiceInterface
{
    /**
     * @var $Post
     */
    protected $post;

    protected $tag;
    /**
     *
     * @param PostDataAccess $postDataAccess
     */
    public function __construct(
    PostDataAccess $postDataAccess,
    TagDataAccess $tagDataAccess
    )
    {
        $this->post = $postDataAccess;
        $this->tag = $tagDataAccess;
    }

    public function savePost($post, $tags) {
      DB::beginTransaction();
      try {
        $this->post->createPostData($post);
        $latestPostData = $this->post->getLatestPostData();

        foreach($tags as $tag) {
          $this->tag->create($tag["name"], $latestPostData->id);
        }

        DB::commit();
      } catch (\Exception $e) {
        DB::rollback();
        return $e->getMessage();
      }
      return $message = "保存しました";
    }

    public function updatePost($post, $tags) {
      DB::beginTransaction();
      try {
        $this->post->updatePostData($post);
        $latestPostData = $this->post->getLatestPostData();

        foreach($tags as $tag) {
          $this->tag->update($tag["name"], $latestPostData->id);
        }

        DB::commit();
      } catch (\Exception $e) {
        DB::rollback();
        return $e->getMessage();
      }
      return $message = "更新しました";
    }

    public function getPostDataWithTagList($id): array {
      $post = $this->post->getPostById($id);
      return [$post, "tags" => $this->tag->getTagListByPostId($post->getId())];
    }

    public function getAllPostWithTagList() {
      return $this->post->getAll()->map(function($post) {
        return [$post, "tags" => $this->tag->getTagListByPostId($post->getId())];
      });
    }
}
