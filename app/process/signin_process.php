<?php
require_once('db_connection.php');
session_start();

if (isset($_POST['Login'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!$_POST['email']) {
            $error[] = 'Email is required';
        }
        if (!$_POST['password']) {
            $error[] = 'Password is required';
        }
        if (empty($error)) {

            $userPassword = $_POST['password'];
            
            $query = "SELECT * FROM user_security WHERE Email = '" . $_POST['email'] . "' ";
            // $statment = $pdo->prepare('SELECT * FROM user_security WHERE Email = :email');
            // $statment->bindValue(':email', $_POST['email']);

            $result = mysqli_query($con, $query);

            if ($row = mysqli_fetch_assoc($result)) {
                $db_password = $row['Password'];
               // if ($userPassword == $db_password)
               
                if (password_verify( $userPassword, $db_password)) {

                    $_SESSION["ID"] = $row['Id'];
                    $_SESSION["name"] = $row['User_name'];
                    $_SESSION["email"] = $row['Email'];
                    $_SESSION['role'] = 'user';

                    header("location:../pages/user_home.php");
                } else {
                    header("location:../pages/signin.php?error= Please Enter correct email and password");
                }
            } else {
                header("location:../pages/signin.php?error= Please Create Account First");
            }
        } else {
            // Send the error to the signin Page
            header("location:../pages/signin.php?error= Please Fill All Fields");
        }
    }
} else {
    echo 'not working';
}
?>