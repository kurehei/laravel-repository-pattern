<?php

namespace App\Repositories\Tag;

use App\Models\Tag;
use Illuminate\Support\Collection;
use App\Entities\Tag as TagEntity;

class TagDataAccessEQRepository implements TagDataAccessRepositoryInterface {

  public function create($tagName, $postId = 0) {
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

  public function getTagListByPostId(int $postId): Collection {
    $tagList = Tag::where('post_id', $postId)->get();
    return $tagList->map(function ($tag) {
      return new TagEntity($tag->id, $tag->name, $tag->post_id);
    });
  }
}
