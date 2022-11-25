<?php

include_once './db_connection.php';

$name = $_POST['name'];
$email = $_POST['email'];
$date = date('y-m-d');
$password = $_POST['password'];
$con_pass = $_POST['confirm-password'];
$encPass = md5($password);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $stm = $pdo->prepare('SELECT * FROM admin_security WHERE Email = :email');
    $stm->bindValue(':email', $email);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);

    if ($result) {

        header('Location: ../pages/admin_signup.php?user= Already have an account');
    } elseif ($password != $con_pass) {
        header('Location: ../pages/admin_signup.php?error= password doesnot match');
        // echo 'password not equal';
    } else {
        $statment = $pdo->prepare('INSERT INTO admin_security (User_name, Email, Password, Date) VALUES(:User_name, :Email, :Password, :date)');
        $statment->bindValue(':User_name', $name);
        $statment->bindValue(':Email', $email);
        $statment->bindValue(':Password', $encPass);
        $statment->bindValue(':date', $date);
        $statment->execute();

        header('Location: ../pages/admin_signin.php?success= Account Created Successfully');
        exit();
    }
}
