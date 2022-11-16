<?php

require_once('db_connection.php');
session_start();

if(isset($_POST['Login']))
{
    echo 'working';
    if(empty($_POST['email']) || empty($_POST['password']) ){
        header("location:../pages/signin.php?Empty = Please Fill All Fields");
    }
    else{
        $query = "Select * from user_security where Email = '".$_POST['email']."' and Password  = '".$_POST['password']."'";
        $result=mysqli_query($con, $query);
        if($row = mysqli_fetch_assoc($result)){

            $_SESSION["A"] = $_POST['email'];
            $_SESSION["ID"] = $row['Id'];

            header("location:../pages/user_home.php");
            
        }
        else{
            header("location:../pages/signin.php?Invalid = Please Enter correct email and password");

        }

    }
}
else{
    echo 'not working';
}

?>