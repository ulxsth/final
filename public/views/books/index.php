<?php
require_once __DIR__ . '/../../../src/controllers/BookController.php';

$books = BookController::all();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>一覧</title>
</head>

<body>
  <?php require_once __DIR__ . "/../header.php" ?>
  <h1>一覧</h1>
  <table>
    <thead>
      <tr>
        <th>名前</th>
        <th>説明</th>
        <th>既読</th>
        <th colspan="1"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($books as $book) { ?>
        <tr>
          <td><?php echo $book->getName() ?></td>
          <td><?php echo $book->getDescription() ?></td>
          <td><?php echo $book->getIsRead() ? '既読' : '未読' ?></td>
          <td>
            <?php if ($book->getIsRead()) : ?>
              <a href="/final/books/<?php echo $book->getId() ?>/uncheck">未読にする</a>
            <?php else : ?>
              <a href="/final/books/<?php echo $book->getId() ?>/check">既読にする</a>
            <?php endif ?>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>

</html>
