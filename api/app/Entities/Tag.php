<?php

declare(strict_types=1);

namespace App\Entities;

class Tag {
  private $id;
  private $name;
  private $postId;

  public function __construct(int $id, string $name, int $postId)
  {
      $this->id = $id;
      $this->name  = $name;
      $this->postId = $postId;
  }

  public function getId() :int {
    return $this->id;
  }

  public function getName() :string {
    return $this->name;
  }

  public function getPostId() :int {
    return $this->postId;
  }

}
