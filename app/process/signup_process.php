<?php

include_once './db_connection.php';

//  change the error type into object and assign every error to its key which is the name
$error = [];
$name = $_POST['name'];
$email = $_POST['email'];
$date = date('y-m-d');
$password = $_POST['password'];
$confirmpassword = $_POST['confirm-password'];

function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$code= generateRandomString();



$encPass = password_hash($password, PASSWORD_DEFAULT);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!$_POST['name']) {
        $error[] = 'Name is required';
    }
    if (!$_POST['password']) {
        $error[] = 'Email is required';
    }
    if (!$_POST['email']) {
        $error[] = 'Email is required';
    }
    if (!$_POST['password']) {
        $error[] = 'confirm-password is required';
    }
    if (empty($error)) {
        if($password == $confirmpassword){

        $query = "SELECT * FROM user_security WHERE Email = '" . $_POST['email'] . "' ";
        $result = mysqli_query($con, $query);

        if ($row = mysqli_fetch_assoc($result)) {
            $error[] = 'Already have an account';
            header('Location: ../pages/signin.php?user= Already have an account'.$code);
            echo $code;
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
    else{
        $error[] = 'Password not match';
        header('Location: ../pages/signup.php?error= Password not match');
    }

    }
}
