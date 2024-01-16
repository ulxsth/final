<?php
class PdoManager {
  private static $pdo;

  public function __construct() {}

  public static function getPdo() {
    if(self::$pdo == null) {
      $config = parse_ini_file(__DIR__ . '/../env.ini');
      $host = $config['HOST'];
      $dbname = $config['DBNAME'];
      $user = $config['USER'];
      $password = $config['PASSWORD'];

      self::$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
      self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    return self::$pdo;
  }
}
?>
