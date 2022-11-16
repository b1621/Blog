<?php

include_once './db_connection.php';

//  change the error type into object and assign every error to its key which is the name
$error = [];
$name = $_POST['name'];
$email = $_POST['email'];
$date = date('y-m-d');
$password = $_POST['password'];
$encPass = md5($password);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!$_POST['name']){
        $error[] = 'Name is required';
    }
    if(!$_POST['password']){
        $error[] = 'Email is required';
    }
    if(!$_POST['email']){
        $error[] = 'Email is required';
    }
    if(!$_POST['password']){
        $error[] = 'confirm-password is required';
    }
    if(empty($error)){
        $statment = $pdo->prepare('INSERT INTO user_security (User_name, Email, Password, Date) VALUES(:User_name, :Email, :Password, :date)');
        $statment->bindValue(':User_name',$name);
        $statment->bindValue(':Email',$email);
        $statment->bindValue(':Password',$encPass);
        $statment->bindValue(':date',$date);
        $statment->execute();

        header('Location: ../pages/signin.php?Success = Account Created Successfully');
        exit();
    }
}
