<?php

declare(strict_types=1);

namespace App\Entities;

class Post {
  private $id;
  private $name;
  private $detail;

  public function __construct(int $id, string $name, string $detail)
  {
      $this->id     = $id;
      $this->name  = $name;
      $this->detail = $detail;
  }

  public function getId() :int {
    return $this->id;
  }

  public function getName() :string {
    return $this->name;
  }

  public function getDetail() :string {
    return $this->detail;
  }

}
