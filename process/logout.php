<?php
session_start();
if(isset($_GET["logout"])){
    session_destroy();
    header("location:../pages/signin.php");
}
if(isset($_GET["Adminlogout"])){
    session_destroy();
    header("location:../pages/admin_signin.php");
}


?>