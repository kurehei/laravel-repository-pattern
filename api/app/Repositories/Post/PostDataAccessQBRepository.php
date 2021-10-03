<?php

namespace App\Repositories\Post;
use DB;
use App\Entities\Post;

class PostDataAccessQBRepository implements PostDataAccessRepositoryInterface{

  protected $table = 'users';

  public function getAll() {
    return DB::table('posts')->get()->map(function($post) {
      return new Post($post->id, $post->name, $post->detail);
    });
  }
}
