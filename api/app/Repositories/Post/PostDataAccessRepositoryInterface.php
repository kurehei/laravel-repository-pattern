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
  public function getPostById(int $id): Post;
}
