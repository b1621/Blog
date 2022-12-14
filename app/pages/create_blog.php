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

<body style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.9) 75%, #000 100%),url('../assets/img/wh.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  background-position: center;">

    <div class="container ">
        <div class="border p-5" style="width: 60%; margin:4% auto;">
            <div>
                <a href="../pages/admin_home.php" style="float:right;" type="button" class="btn-close" aria-label="Close"></a>
            </div>
            <div class="mb-4">
                <h3>Create a Blog</h3>
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
            <form action="../process/create_blog.inc.php" method="post">
                <!-- Title input -->
                <div class="form-outline mb-4">
                    <input type="text" id="form4Example1" name="title" class="form-control" style="background-color: lightgrey;" placeholder="Title" required />

                </div>
                <!-- Author input -->
                <div class="form-outline mb-4">
                    <input type="text" id="form4Example1" name="author" class="form-control" placeholder="Author" style="background-color: lightgrey;" required />

                </div>

                <!-- Article input -->
                <div class="form-outline mb-5">
                    <textarea class="form-control" id="form4Example3" name="article" rows="10" style="background-color: lightgrey;" placeholder="Article" required></textarea>

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