<?php
  $login = false;
if(isset($_SESSION['login']))
{
  $login = true;
}
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">I-secure</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/loginsystem/welcome.php">Home</a>
        </li>';

        if($login == false)
        {

         echo ' <li class="nav-item l1">
          <a class="nav-link" href="/loginsystem/login.php">LogIn</a>
          </li>
          <li class="nav-item l1">
          <a class="nav-link" href="/loginsystem/signup.php">SignUp</a>
          </li>';
        }

        else
        {

         echo' <li class="nav-item">
          <a class="nav-link" href="/loginsystem/logout.php">LogOut</a>
          </li>';
        }
      echo '</ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>';
?>
