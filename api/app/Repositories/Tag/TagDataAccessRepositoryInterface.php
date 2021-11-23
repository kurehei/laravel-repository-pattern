<?php

namespace App\Repositories\Tag;
use Illuminate\Support\Collection;

interface TagDataAccessRepositoryInterface {
  /**
   *
   * @return void
   */
  public function create($tagName, $postId);
  public function update($tagName, $postId);
  public function getTagListByPostId(int $postId);
}
