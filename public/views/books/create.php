<?php
require_once __DIR__ . '/../../../src/controllers/BookController.php';

$name = $_POST['name'];
$description = $_POST['description'];

$id = BookController::create($name, $description);
header('Location: /books/' . $id);
?>
