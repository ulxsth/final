<?php
require_once __DIR__ . '/../../../src/controllers/BookController.php';

$id = $_GET['id'];
BookController::delete($id);

header('Location: /final/books');
