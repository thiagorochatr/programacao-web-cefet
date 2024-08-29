<?php

class Task {
  public int $id;
  public string $description;
  public bool $done;
  public DateTime $created_at;
  public DateTime $updated_at;

  public function __construct(
    int $id,
    string $description,
    bool $done = false,
    DateTime $created_at = new DateTime(),
    DateTime $updated_at = new DateTime(),
  ) {
    $this->id = $id;
    $this->description = $description;
    $this->done = $done;
    $this->created_at = $created_at;
    $this->updated_at = $updated_at;
  }
}

?>