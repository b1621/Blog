<?php

session_start();

include_once "../process/db_connection.php";

$blogid = $_POST['blogid'];

$title = $_POST['title'];
$author = $_POST['author'];
$article = $_POST['article'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $statment = $pdo->prepare('UPDATE blog SET Title = :title, Author = :author, Article = :article WHERE Blog_id = :blogid');
    $statment->bindValue(':title', $title);
    $statment->bindValue(':author', $author);
    $statment->bindValue(':article', $article);
    $statment->execute();

    header('Location: ../pages/edit_blog.php?sucess= edited sucessfully !!!');
    exit();
}
