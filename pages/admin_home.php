<?php

session_start();

include_once "../process/db_connection.php";

if (isset($_SESSION['ID'])) {


    $statement = $pdo->prepare('SELECT * from blog');
    $statement->execute();
    $result = $statement->fetchall(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // echo $_POST['blogid'];
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
        <?php include_once './components/adminnav.php' ?>
        <div class="container border pt-4" style="">

            <?php if (empty($result)) : ?>
                <div>
                    <h3>No blog yet!!!</h3>
                </div>
            <?php else : ?>
                <?php foreach ($result as $i => $blog) : ?>
                    <div class="card mb-3" style="width :60%; margin:0 auto;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $blog['Title'];  ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $blog['Author'];  ?></h6>
                            <p class="card-text"><small class="text-muted"><?php echo $blog['Date'];  ?></small></p>
                            <p class="card-text"><?php echo $blog['Article'];  ?></p>
                            <form action="./view.php" method="post" style="display: inline;">
                                <input type="hidden" name="blogid" value="<?php echo $blog['Blog_id'] ?>">
                                <button type="submit" class="btn">View </button>
                            </form>
                            <form action="" method="post" style="display: inline;">
                                <input type="hidden" name="blogid" value="<?php echo $blog['Blog_id'] ?>">
                                <button type="submit" class="btn">Edit</button>
                            </form>
                            <form action="" method="post" style="display: inline;">
                                <input type="hidden" name="blogid" value="<?php echo $blog['Blog_id'] ?>">
                                <button type="submit" class="btn">Delete</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </body>

    </html>
<?php

} else {
    header("location:signin.php");
}
?>