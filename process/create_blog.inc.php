<?php

include_once './db_connection.php';

//  change the error type into object and assign every error to its key which is the name

$title = $_POST['title'];
$author = $_POST['author'];
$date = date('y-m-d');
$article = nl2br($_POST['article']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!$_POST['title']) {
        header('Location: ../pages/admin_home.php?error=title is required');
    }
    if (!$_POST['author']) {
        header('Location: ../pages/admin_home.php?author is required');
    }
    if (!$_POST['article']) {
        header('Location: ../pages/admin_home.php?article is required');
    }

    $statment = $pdo->prepare('INSERT INTO blog (Title, Author, Article, Date) VALUES(:title, :author, :article, :date)');
    $statment->bindValue(':title', $title);
    $statment->bindValue(':article', $article);
    $statment->bindValue(':author', $author);
    $statment->bindValue(':date', $date);
    $statment->execute();
    header('Location: ../pages/create_blog.php?success= Blog created succefully !!!');
    exit();
}
