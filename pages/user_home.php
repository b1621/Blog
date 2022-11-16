<?php

// session_start();


// if(isset($_SESSION['ID'])){
// echo 'welcome' . $_SESSION['ID'].'<br/>';
// echo ' <a href = "../process/logout.php?logout">Logout</a>';
// }
// else{
// header("location:signin.php");
// }
?>
<?php
include_once "../process/db_connection.php";
$statement = $pdo->prepare('SELECT * from blog');
$statement->execute();
$result = $statement->fetchall(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo $_POST['blogid'];
    // $blogid = $_POST['blogid'];
    // echo $blogid;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
<?php include_once './usernav.php' ?>
    <div class="container border pt-4" style="">

        <?php foreach ($result as $i => $blog) : ?>
            <div class="card mb-3" style="width :60%; margin:0 auto;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $blog['Title'];  ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $blog['Author'];  ?></h6>
                    <p class="card-text"><?php echo $blog['Article'];  ?></p>
                    <p class="card-text"><small class="text-muted"><?php echo $blog['Date'];  ?></small></p>
                    <a href="#" class="card-link">Card link</a>
                    <form action="" method="post" style="display: inline;">
                        <input type="hidden" name="blogid" value="<?php echo $blog['Blog_id'] ?>">
                        <button type="submit" class="btn">Add Favorite</button>
                    </form>

                </div>
            </div>
        <?php endforeach ?>
    </div>
</body>

</html>