<?php

include_once '../process/db_connection.php';

$statment = $pdo->prepare('SELECT * FROM admin_security');
$statment->execute();
$result = $statment->fetchall(PDO::FETCH_ASSOC);

if (!empty($result)) {
    header('Location: admin_signin.php?error=Already have admin');
    // echo 'empty database';
} else {

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/signup.css?ver=<?php echo rand(111, 999) ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.7) 75%, #000 100%),url('../assets/img/bg-masthead.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  background-position: center;">

    <form action="../process/admin_signup_process.php" method="POST">
        <div class="container" style="margin-top: 10%; ">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card" style="background-color: rgb(0,0,0,0.3);">
                        <div>

                            <a href="../index.html" style="float:right;" type="button" class="btn-close mx-3 mt-3" aria-label="Close"></a>
                        </div>
                        <h2 class="card-title text-center my-3" style="color:white;">Register </h2>
                        <?php if (!empty($_GET)) :
                        ?>
                            <?php if (array_key_exists('error', $_GET)) : ?>
                                <div style="color: red;" class="ml-4">


                                    <?php echo $_GET['error'];
                                    ?>
                                </div>
                            <?php else :
                            ?>
                                <div style="color: green;" class="ml-4">
                                    <?php echo $_GET['success']
                                    ?>
                                </div>
                            <?php endif
                            ?>

                        <?php endif
                        ?>
                        <div class="card-body py-md-4">
                            <form _lpchecked="1">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                </div>


                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="confirm-password">
                                </div>
                                <div class="d-flex flex-row align-items-center justify-content-between">

                                    <button class="btn btn-primary" value="SignUp" name="SignUp">Create Account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


</body>

</html>
<?php
}
?>