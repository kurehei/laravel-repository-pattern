<?php

namespace App\Repositories\Tag;
use Illuminate\Support\Collection;

interface TagDataAccessRepositoryInterface {
  /**
   *
   * @return void
   */
  public function create($tag): void;
}
