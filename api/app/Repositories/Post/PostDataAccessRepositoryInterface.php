<?php

namespace App\Repositories\Post;
use Illuminate\Support\Collection;

interface PostDataAccessRepositoryInterface {
  /**
   *
   * @return void
   */
  public function getAll();

  /**
   *
   * @param integer $id
   * @return Post
   */
  public function getPostById(int $id);
  /**
   *
   * @param [type] $post
   * @return void
   */
  public function createPostData($post): void;

  /**
   *
   */
  public function updatePostData($post): void;
  public function deletePostData($post): void;
  public function getLatestPostData();
}
