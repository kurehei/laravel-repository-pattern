<?php

namespace App\Repositories\Tag;
use App\Models\Tag;

class TagDataAccessEQRepository implements TagDataAccessRepositoryInterface {

  public function create($tagName, $postId) {
    Tag::create([
      'name' => $tagName,
      'post_id' => $postId
    ]);
  }

  public function update($tagName, $postId) {
    Tag::update([
      'name' => $tagName,
      'post_id' => $postId
    ]);
  }
}
