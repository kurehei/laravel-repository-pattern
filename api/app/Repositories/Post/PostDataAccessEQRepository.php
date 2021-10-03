<?php

namespace App\Repositories\Post;

use App\Models\Post;

class PostDataAccessEQRepository implements PostDataAccessRepositoryInterface{
  public function getAll() {
    return Post::all();
  }
}
