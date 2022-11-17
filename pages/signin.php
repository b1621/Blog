<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link href="css/styles2.css" rel="stylesheet" />
</head>

<body >

  <form action="../process/signin_process.php" method="POST">

    <div class="container" style="margin-top: 10%;">


      <div class="row justify-content-center">

        <div class="col-md-5">
          <div class="card">

            <h2 class="card-title text-center my-3">Login </h2>
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
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                </div>


                <div class="form-group">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>

                <div class="d-flex flex-row align-items-center justify-content-between">
                  <a href="signup.php">Create Account</a>
                  <button class="btn btn-primary" value="Login" name="Login">Login</button>
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