
<?php
require_once('db_connection.php');
session_start();

if(isset($_POST['Login']))
{
    echo 'working';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(!$_POST['email']){
            $error[] = 'Email is required';
            
        }
        if(!$_POST['password']){
            $error[] = 'Password is required';
        }
        if(empty($error)){

            $userPassword = md5($_POST['password']);

            $query = "SELECT * FROM user_security WHERE Email = '".$_POST['email']."' ";
            $result=mysqli_query($con, $query);

            if($row = mysqli_fetch_assoc($result)){
                $db_password = $row['Password'];
                if($userPassword == $db_password){
                    $_SESSION["A"] = $_POST['email'];
                    $_SESSION["ID"] = $row['Id'];
                    $_SESSION["name"] = $row['User_name'];

                    header("location:../pages/user_home.php");
                }
                else{
                    header("location:../pages/signin.php?Invalid = Please Enter correct email and password");
                }

            }
            else{
                header("location:../pages/signin.php?NotUser = Please Create Account First");
            }
        }
        else{
            // Send the error to the signin Page
            header("location:../pages/signin.php?Empty = Please Fill All Fields");
        }
    }
} 
else{
    echo 'not working';

}
?>