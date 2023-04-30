<?php
require_once "config.php";

$book_code = $_GET['book_code'];

$delete_stmt = $database->prepare("DELETE FROM booking WHERE book_code = :book_code");
$delete_stmt->bindParam(':book_code', $book_code);
$delete_stmt->execute();

header("Location: order.php");
?>
