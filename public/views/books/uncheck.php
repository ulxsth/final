<?php
require_once __DIR__ . '/../../../src/controllers/BookController.php';

$id = $_GET['id'];
BookController::uncheck($id);

header('Location: /final/books');
