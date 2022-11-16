<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/signup.css?ver=<?php echo rand(111,999)?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>

<form  action="../process/signup_process.php" method="POST">
<div class="container">
  <div class="row justify-content-center">
  <div class="col-md-5">
   <div class="card">
     <h2 class="card-title text-center">Register </h2>
      <div class="card-body py-md-4">
       <form _lpchecked="1">
          <div class="form-group">
             <input type="text" class="form-control" name ="name" id="name" placeholder="Name">
        </div>
        <div class="form-group">
             <input type="email" class="form-control" name ="email" id="email" placeholder="Email">
                            </div>
                            
                          
   <div class="form-group">
     <input type="password" class="form-control" name ="password" id="password" placeholder="Password">
   </div>
   <div class="form-group">
      <input type="password" class="form-control" name ="confirm-password" id="confirm-password" placeholder="confirm-password">
   </div>
   <div class="d-flex flex-row align-items-center justify-content-between">
      <a href="signin.php">Login</a>
        <button  class="btn btn-primary" value = "SignUp" name="SignUp">Create Account</button>
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