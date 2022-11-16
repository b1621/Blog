<?php

include_once './db_connection.php';

$blogid = $_POST['blogid'];


$statment = $pdo->prepare('DELETE FROM favorite WHERE Blog_id = :blogid');
$statment->bindValue(':blogid', $blogid);
$statment->execute();

header('Location: ../pages/user_favorite.php');
exit();
