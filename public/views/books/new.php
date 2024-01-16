<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規登録</title>
</head>
<body>
  <h1>新規登録</h1>
  <form action="/views/books/create.php" method="post">
    <div>
      <label for="name">名前</label>
      <input type="text" name="name" id="name">
    </div>
    <div>
      <label for="description">説明</label>
      <textarea name="description" id="description" cols="30" rows="10"></textarea>
    </div>
    <button type="submit">登録</button>
  </form>
</body>
</html>
