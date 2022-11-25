<?php

include_once '../process/db_connection.php';

$statment = $pdo->prepare('SELECT * FROM admin_security');
$statment->execute();
$result = $statment->fetchall(PDO::FETCH_ASSOC);

if (empty($result)) {
    header('Location: admin_signup.php');
    // echo 'empty database';
} else {

    header('Location: admin_signin.php');
}
