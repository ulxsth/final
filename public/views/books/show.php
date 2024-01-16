<?php
require_once __DIR__ . '/../../../src/controllers/BookController.php';

$book = BookController::find($_GET['id']);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $book->getName(); ?></title>
</head>
<body>
  <h1><?php echo $book->getName(); ?></h1>
  <p><?php echo $book->getDescription(); ?></p>
  <a href="/books/<?php echo $book->getId(); ?>/edit">編集</a>
  <a href="/books/<?php echo $book->getId(); ?>/delete">削除</a>
</body>
</html>
