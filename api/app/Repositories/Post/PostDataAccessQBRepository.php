<?php

namespace App\Repositories\Post;
use DB;
use App\Entities\Post;

class PostDataAccessQBRepository implements PostDataAccessRepositoryInterface{

  public function getAll() {
    return DB::table('posts')->get()->map(function($post) {
      return new Post($post->id, $post->name, $post->detail);
    });
  }

  public function getPostById(int $id) {
    $post = DB::table('posts')->where('id', $id)->first();
    return new Post($post->id, $post->name, $post->detail);
  }

  public function createPostData($post): void {
    DB::table('posts')->insert([
      'name' => $post["name"],
      'detail' => $post["detail"]
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

  public function getLatestPostData() {
    return DB::table('posts')->orderBy('id', 'desc')->first();
  }
}
