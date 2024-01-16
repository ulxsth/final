<?php
require_once __DIR__ . '/../models/Book.php';

class BookController {
  public static function all($limit=50) {
    $books = Book::all($limit);
    return $books;
  }

  public static function create($name, $description) {
    $id = Book::create($name, $description);
    return $id;
  }
}
?>
