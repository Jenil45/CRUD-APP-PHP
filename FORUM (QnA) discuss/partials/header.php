<?php

include 'partials/handlerlogin.php';    
include 'partials/handlersignup.php';    

if(!isset($_SESSION))
{
  session_start();
}

echo ' <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex align-items-center justify-content-around">
<div class="container-fluid">
  <a class="navbar-brand" href="/FORUM">Quera</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/FORUM">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
          $sql = "SELECT category_id , category_name FROM `quera` LIMIT 5;";
          $resultCat = mysqli_query($connection , $sql);
          while($row = mysqli_fetch_assoc($resultCat))
          {
            echo '<a class="dropdown-item" href="threads.php?id='.$row['category_id'].'">'.$row['category_name'].'</a>';
          }
        echo '</div>
      </li>

 
      <li class="nav-item">
        <a class="nav-link " href="contact.php" tabindex="-1" aria-disabled="true">Contact Us</a>
      </li>
    </ul>';

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
    {
        echo '<div class="text-white"> <h4>'.$_SESSION['username'].'</h4></div> ';
    }

    echo '<div class="d-flex flex-row mx-2"><form class="d-flex flex-row mx-2 " action="search.php" action="get">
      <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
      </form>';
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
      { 
        echo '<div class="d-flex"><button class="btn btn-success mx-2" ><a class="text-white" href="/forum/logout.php">LogOut</a></button>
        </div>';
      }
      else
      {
        echo '<button class="btn btn-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">LogIn</button>
        <button class="btn btn-success mr-2" data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</button>';
      }
      echo '</div>';
    
  echo '</div>
</div>
</nav>';
if($login)
{
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> You are logged in successfully
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
}
if($invalid)
{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Invalid credential
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
}
if($useralert)
{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Note : </strong> This username alrerady exits 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
}
if($passwordcheck)
{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Alert </strong> check your password and confime password 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
}
if($signup)
{
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your account created succesfully
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
}


include 'partials/loginmodal.php';
include 'partials/signupmodal.php';
?>
