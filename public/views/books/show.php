<?php
require_once __DIR__ . '/../../src/controllers/BookController.php';

$book = BookController::find($_GET['id']);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php $book->name; ?></title>
</head>
<body>
  <h1><?php $book->name; ?></h1>
  <p><?php $book->description; ?></p>
  <a href="/books/<?php $book->id; ?>/edit">編集</a>
  <a href="/books/<?php $book->id; ?>/delete">削除</a>
</body>
</html>
