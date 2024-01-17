<?php
class BookDto {
  private $id;
  private $name;
  private $description;
  private $isRead;

  public function __construct($id, $name, $description, $isRead) {
    $this->id = $id;
    $this->name = $name;
    $this->description = $description;
    $this->isRead = $isRead;
  }

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getDescription() {
    return $this->description;
  }

  public function getIsRead() {
    return $this->isRead;
  }

  public function setIsRead($isRead) {
    $this->isRead = $isRead;
  }
}
