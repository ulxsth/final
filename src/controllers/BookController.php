<?php
require_once __DIR__ . '/../models/Book.php';

class BookController {
  public static function all($limit=50) {
    $books = Book::all($limit);
    return $books;
  }
}
?>
