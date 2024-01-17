<?php
require_once __DIR__ . '/../../../src/controllers/BookController.php';

$id = $_GET['id'];
$book = BookController::find($id);

$book->setName($_POST['name']);
$book->setDescription($_POST['description']);

BookController::update($book);

header('Location: /final/books/' . $id);
