<?php
$id = $_GET['id'];
BookController::delete($id);

header('Location: /final/books');
