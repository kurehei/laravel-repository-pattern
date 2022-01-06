<?php

namespace App\Services\Tags;

use \App\Repositories\Tag\TagDataAccessRepositoryInterface AS TagDataAccess;

class TagService implements TagServiceInterface
{
    protected $tag;
    /**
     *
     * @param TagDataAccess $tagDataAccess
     */
    public function __construct(TagDataAccess $tagDataAccess) {
      $this->tag = $tagDataAccess;
    }

    public function saveTag(array $tags) {
      try {
        foreach($tags as $tag) {
          $this->tag->create($tag["name"]);
        }
      } catch (\Exception $e) {
        return $e->getMessage();
      }
      return $message = "保存しました";
    }
}
