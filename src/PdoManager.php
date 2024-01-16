<?php
class PdoManager {
  private static $pdo;

  public function __construct() {}

  public static function getPdo() {
    if(self::$pdo == null) {
      $config = parse_ini_file('../env.ini');
      $host = $config['host'];
      $dbname = $config['dbname'];
      $user = $config['user'];
      $password = $config['password'];

      self::$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
      self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    return self::$pdo;
  }
}
?>
