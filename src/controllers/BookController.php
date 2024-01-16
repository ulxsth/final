<?php
require_once __DIR__ . '/../models/Book.php';

class BookController {
  public static function index() {
    $books = Book::all();
    require_once __DIR__ . '/../../public/views/books/index.php';
  }
}
?>
