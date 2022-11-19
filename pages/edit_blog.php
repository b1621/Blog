<?php

session_start();

include_once "../process/db_connection.php";

$blogid = $_POST['blogid'];
if (isset($_SESSION['ID'])) {


    $statement = $pdo->prepare('SELECT * from blog WHERE Blog_id = :blogid');
    $statement->bindValue(':blogid', $blogid);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Create</title>
</head>

<body>

    <div class="container ">
        <div class="border p-5" style="width: 60%; margin:4% auto;">
            <div>
                <a href="../pages/admin_home.php" style="float:right;" type="button" class="btn-close" aria-label="Close"></a>
            </div>
            <div class="mb-4">
                <h3>Edit Blog</h3>
            </div>
            <?php
            //     echo sizeof($error);
            //   print_r($error);
            if (!empty($_GET['success'])) :
            ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_GET['success']; ?>
                </div>
            <?php endif; ?>
            <!-- <form action="../process/create_blog.inc.php" method="post"> -->
            <form action="../process/edit_blog.php" method="post">
                <!-- Title input -->
                <div class="form-outline mb-4">
                    <input type="text" id="form4Example1" name="title" class="form-control" value="<?php echo $result['Title'] ?>" placeholder="Title" required />

                </div>
                <!-- Author input -->
                <div class="form-outline mb-4">
                    <input type="text" id="form4Example1" name="author" class="form-control" placeholder="Author" value="<?php echo $result['Author'] ?>" required />

                </div>

                <!-- Article input -->
                <div class="form-outline mb-5">
                    <textarea class="form-control" id="form4Example3" name="article" rows="10" placeholder="Article" required><?php echo $result['Article'] ?></textarea>

                </div>

                <!-- Submit button -->
                <div class="">
                    <input type="hidden" name="blogid" value="<?php echo $result['Blog_id'] ?>">
                    <button type="submit" value="submit" name="submit" class="btn btn-primary btn-block  mb-4" style="width: 70%;margin:0 15%;">Publish</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>