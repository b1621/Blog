<?php

include_once './db_connection.php';

//  change the error type into object and assign every error to its key which is the name
$error = [];
$name = $_POST['name'];
$email = $_POST['email'];
$date = date('y-m-d');
$con_pass = $_POST['confirm-password'];
$password = $_POST['password'];

$encPass = md5($password);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $query = "SELECT * FROM user_security WHERE Email = '" . $_POST['email'] . "' ";
    $result = mysqli_query($con, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $error[] = 'Already have an account';
        header('Location: ../pages/signin.php?error= Already have an account');
    } elseif ($password != $con_pass) {
        header('Location: ../pages/signin.php?error= password doesnot match');
        // echo 'password not equal';
    } else {
        $statment = $pdo->prepare('INSERT INTO user_security (User_name, Email, Password, Date) VALUES(:User_name, :Email, :Password, :date)');
        $statment->bindValue(':User_name', $name);
        $statment->bindValue(':Email', $email);
        $statment->bindValue(':Password', $encPass);
        $statment->bindValue(':date', $date);
        $statment->execute();

        header('Location: ../pages/signin.php?success= Account Created Successfully');
        exit();
    }
}
