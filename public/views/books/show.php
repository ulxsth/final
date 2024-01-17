<?php
require_once __DIR__ . '/../../../src/controllers/BookController.php';

$book = BookController::find($_GET['id']);
$id = $book == null ? -1 : $book->getId();
$name = $book == null ? 'Not Found' : $book->getName();
$description = $book == null ? 'This book has been deleted' : $book->getDescription();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $name ?></title>
</head>

<body>
  <?php require_once __DIR__ . "/../header.php" ?>
  <h1><?php echo $name; ?></h1>
  <p><?php echo $description ?></p>
  <?php if ($book != null) : ?>
    <a href="/final/books/<?php echo $id; ?>/edit">編集</a>
    <a href="/final/books/<?php echo $id; ?>/delete">削除</a>
  <?php endif; ?>

</body>

</html>
