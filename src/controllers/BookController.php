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

  public static function update($book) {
    Book::update($book);
  }

  public static function find($id) {
    $book = Book::find($id);
    return $book;
  }

  public static function check($id) {
    $book = Book::find($id);
    $book->setIsRead(true);
    Book::update($book);
  }

  public static function uncheck($id) {
    $book = Book::find($id);
    $book->setIsRead(false);
    Book::update($book);
  }

  public static function delete($id) {
    Book::delete($id);
  }
}
