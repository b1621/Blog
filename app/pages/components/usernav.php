
<nav class="navbar navbar-expand-lg navbar-light bg-light" >
  <div class="container-fluid" >
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./user_home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./user_favorite.php">Favorite</a>
        </li>

        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <h5 style="
  color: #04AA6D;
  padding: 2px;
  text-align: center;
  height:50;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin: 4px 10px  ;"> <?php  echo 'welcome  ' . $_SESSION['name'] . '  ';?></h5>
        <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
        <button class="btn btn-outline-danger" type="submit"> <a style="color: black;text-decoration: none; font-size: 16px;" href = "../process/logout.php?logout">Logout</a></button>
        
      </form>
    </div>
  </div>
</nav>