<?php

// include_once './db_connection.php';
include_once '../process/db_connection.php';
//  change the error type into object and assign every error to its key which is the name
$error = [];
$title = $_POST['title'];
$author = $_POST['author'];
$date = date('y-m-d');
$article = nl2br($_POST['article']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!$_POST['title']) {
        $error['title'] = 'title is required';
    }
    if (!$_POST['author']) {
        $error['author'] = 'author is required';
    }
    if (!$_POST['article']) {
        $error['article'] = 'article is required';
    }
    if (empty($error)) {
        $statment = $pdo->prepare('INSERT INTO blog (Title, Author, Article, Date) VALUES(:title, :author, :article, :date)');
        $statment->bindValue(':title', $title);
        $statment->bindValue(':article', $article);
        $statment->bindValue(':author', $author);
        $statment->bindValue(':date', $date);
        $statment->execute();
        header('Location: ../pages/blogs.php');
        exit();
    }
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
                <a href="../pages/blogs.php" style="float:right;" type="button" class="btn-close" aria-label="Close"></a>
            </div>
            <div class="mb-4">
                <h3>Create a Blog</h3>
            </div>
            <?php
            echo sizeof($error);
            print_r($error);
            if (!empty($error)) :
            ?>
                <div class="alert alert-danger">
                    <?php // foreach $err in $error 
                    ?>
                    <p>$err</p>

                    <?php // endforeach;
                    ?>
                    there is error
                </div>
            <?php endif; ?>
            <!-- <form action="../process/create_blog.inc.php" method="post"> -->
            <form action="" method="post">
                <!-- Title input -->
                <div class="form-outline mb-4">
                    <input type="text" id="form4Example1" name="title" class="form-control" placeholder="Title" />

                </div>
                <!-- Author input -->
                <div class="form-outline mb-4">
                    <input type="text" id="form4Example1" name="author" class="form-control" placeholder="Author" />

                </div>

                <!-- Article input -->
                <div class="form-outline mb-5">
                    <textarea class="form-control" id="form4Example3" name="article" rows="10" placeholder="Article"></textarea>

                </div>

                <!-- Submit button -->
                <div class="">
                    <button type="submit" class="btn btn-primary btn-block  mb-4" style="width: 70%;margin:0 15%;">Publish</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>