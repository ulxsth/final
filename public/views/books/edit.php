<?php
require_once __DIR__ . '/../../../src/controllers/BookController.php';

$book = BookController::find($_GET['id']);
$id = $book == null ? -1 : $book->getId();
$name = $book == null ? 'Not Found' : $book->getName();
$description = $book == null ? 'This book has been deleted' : $book->getDescription();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>edit: <?php echo $name ?></title>
</head>

<body>
  <?php require_once __DIR__ . "/../header.php" ?>
  <form action="/final/books/<?php echo $id ?>/update" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" value="<?php echo $name ?>">
    <label for="description">Description</label>
    <input type="text" name="description" value="<?php echo $description ?>">
    <input type="submit" value="submit">
  </form>
</body>

</html>
