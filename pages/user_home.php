<?php

session_start();


if(isset($_SESSION['ID'])){
    echo 'welcome' . $_SESSION['ID'].'<br/>';
    echo ' <a href = "../process/logout.php?logout">Logout</a>';
}
else{
    header("location:signin.php");
}
?>