<?php

session_start();

include_once "../process/db_connection.php";

$blogid = $_POST['blogid'];

$title = $_POST['title'];
$author = $_POST['author'];
$article = nl2br($_POST['article']);

$sql = "UPDATE blog SET Title = :title, Author = :author, Article = :article where Blog_id = :blogid";
$statment = $pdo->prepare($sql);
$statment->bindValue(':blogid', $blogid);
$statment->bindValue(':title', $title);
$statment->bindValue(':author', $author);
$statment->bindValue(':article', $article);
$statment->execute();
header('Location: ../pages/admin_home.php');
exit();
