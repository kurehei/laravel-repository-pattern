<?php

namespace App\Repositories\Post;
use App\Models\Tag;

class TagDataAccessEQRepository implements TagDataAccessRepositoryInterface {
 
  public function create($tag): void {
    Tag::create([
      'name' => $tag->name,
      'post_id' => $tag->post_id
    ]);
  }
}
