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
  <h1>一覧</h1>
  <a href="/views/books/create.php">新規作成</a>
  <table>
    <thead>
      <tr>
        <th>名前</th>
        <th>説明</th>
        <th>既読</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($books as $book) { ?>
        <tr>
          <td><?php echo $book->getName() ?></td>
          <td><?php echo $book->getDescription() ?></td>
          <td><?php echo $book->getIsRead() ? '既読' : '未読' ?></td>
          <td>
            <a href="/views/books/edit.php?id=<?php echo $book->id ?>">編集</a>
            <a href="/views/books/delete.php?id=<?php echo $book->id ?>">削除</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>
