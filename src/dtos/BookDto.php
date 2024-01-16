<?php
class Book {
  public $id;
  public $name;
  public $description;
  public $isRead;

  public function __construct($id, $name, $description, $isRead) {
    $this->id = $id;
    $this->name = $name;
    $this->description = $description;
    $this->isRead = $isRead;
  }
}
?>
