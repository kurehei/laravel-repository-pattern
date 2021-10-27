<?php

namespace App\Repositories\Post;

use App\Models\Post;

class PostDataAccessEQRepository implements PostDataAccessRepositoryInterface{
  public function getAll() {
    return Post::get();
  }

  public function getPostById(int $id): Post {
    return Post::find($id);
  }
}
