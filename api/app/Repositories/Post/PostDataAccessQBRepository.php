<?php

namespace App\Repositories\Post;
use DB;

class PostDataAccessQBRepository implements PostDataAccessRepositoryInterface{

  protected $table = 'users';

  public function getAll() {
    return DB::table('posts')->get();
  }
}
