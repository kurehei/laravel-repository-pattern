<?php

namespace App\Repositories\Post;
use DB;
use App\Entities\Post;

class PostDataAccessQBRepository implements PostDataAccessRepositoryInterface{

  public function getAll() {
    return DB::table('posts')->get();
  }

  public function getPostById(int $id): object {
    return DB::table('posts')->where('id', $id)->first();
  }

  public function createPostData($post): void {
    DB::table('posts')->insert([
      'name' => $post->name,
      'detail' => $post->detail
    ]);
  }

  public function updatePostData($post): void {
    DB::table('posts')
      ->where('id', $post->id)
      ->update([
      'name' => $post->name,
      'detail' => $post->detail
    ]);
  }

  public function deletePostData($post): void {
    DB::table('posts')
      ->where('id', $post->id)
      ->delete();
  }
}
