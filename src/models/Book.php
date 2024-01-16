<?php
require_once __DIR__ . '/../PdoManager.php';
require_once __DIR__ . '/../dtos/BookDto.php';

class Book {
  /**
   * 小説を登録する。
   * @param string $name 小説の名前
   * @param string $description 小説の説明
   * @return int 登録した小説のID
   */
  public static function create($name, $description)
  {
    $pdo = PdoManager::getPdo();
    $statement = $pdo->prepare('INSERT INTO books (name, description) VALUES (:name, :description)');
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->execute();
    $id = $pdo->lastInsertId();
    return $id;
  }

  /**
   * すべての小説を取得する。
   * @param mixed $limit 取得する小説の上限数
   * @return array[BookDto] 該当する小説の配列
   */
  public static function all($limit=50) {
    $pdo = PdoManager::getPdo();
    $statement = $pdo->prepare('SELECT * FROM books LIMIT :limit');
    $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
    $statement->execute();
    $books = $statement->fetchAll(PDO::FETCH_ASSOC);
    return self::toDtos($books);
  }

  /**
   * IDから小説を取得する。
   * @param int $id 小説のID
   * @return BookDto|null 該当する小説
   */
  public static function find($id)
  {
    $pdo = PdoManager::getPdo();
    $statement = $pdo->prepare('SELECT * FROM books WHERE id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $book = $statement->fetch(PDO::FETCH_ASSOC);

    if ($book === false) {
      return null;
    }

    return self::toDto($book);
  }

  /**
   * 小説名からあいまい検索をかける。
   * @param string $name 小説名
   * @return array[BookDto] 該当する小説の配列
   */
  public static function findByName($name) {
    $pdo = PdoManager::getPdo();
    $statement = $pdo->prepare('SELECT * FROM books WHERE name LIKE :name');
    $statement->bindValue(':name', "%$name%", PDO::PARAM_STR);
    $statement->execute();
    $books = $statement->fetchAll(PDO::FETCH_ASSOC);
    return self::toDtos($books);
  }

  /**
   * 小説情報を更新する。
   * @param BookDto $book 更新する小説
   * @return bool 更新に成功したかどうか
   */
  public static function update($book) {
    $pdo = PdoManager::getPdo();
    $statement = $pdo->prepare('UPDATE books SET name = :name, description = :description, is_read = :is_read WHERE id = :id');
    $statement->bindParam(':name', $book->getName(), PDO::PARAM_STR);
    $statement->bindParam(':description', $book->getDescription(), PDO::PARAM_STR);
    $statement->bindParam(':is_read', $book->getIsRead(), PDO::PARAM_BOOL);
    $statement->bindParam(':id', $book->getId(), PDO::PARAM_INT);
    return $statement->execute();
  }

  /**
   * 小説を削除する。
   * @param int $id 削除する小説のID
   * @return bool 削除に成功したかどうか
   */
  public static function delete($id) {
    $pdo = PdoManager::getPdo();
    $statement = $pdo->prepare('DELETE FROM books WHERE id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    return $statement->execute();
  }

  /**
   * 単一の検索結果をDtoに詰め替える。
   * @param array $book 検索結果（単一）
   * @return BookDto|null 詰め替えた結果
   */
  private static function toDto($book)
  {
    if ($book === false) {
      return null;
    }

    return new BookDto($book['id'], $book['name'], $book['description'], $book['is_read']);
  }

  /**
   * 複数の検索結果をDtoに詰め替える。
   * @param array $books 検索結果（複数）
   * @return array[BookDto] 詰め替えた結果
   */
  private static function toDtos($books) {
    $dtos = [];
    foreach ($books as $book) {
      $dtos[] = self::toDto($book);
    }
    return $dtos;
  }
}
?>
