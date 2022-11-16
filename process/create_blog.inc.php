<?php

include_once './db_connection.php';

//  change the error type into object and assign every error to its key which is the name
$error = [];
$title = $_POST['title'];
$author = $_POST['author'];
$date = date('y-m-d');
$article = nl2br($_POST['article']);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!$_POST['title']){
        $error['title'] = 'title is required';
    }
    if(!$_POST['author']){
        $error['author'] = 'author is required';
    }
    if(!$_POST['article']){
        $error['article'] = 'article is required';
    }
    if(empty($error)){
        $statment = $pdo->prepare('INSERT INTO blog (Title, Author, Article, Date) VALUES(:title, :author, :article, :date)');
        $statment->bindValue(':title',$title);
        $statment->bindValue(':article',$article);
        $statment->bindValue(':author',$author);
        $statment->bindValue(':date',$date);
        $statment->execute();
        header('Location: ../pages/blogs.php');
        exit();
    }
}

