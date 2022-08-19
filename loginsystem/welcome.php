<?php
    session_start();
    if(!isset($_SESSION['login']) || $_SESSION['login'] != true )
    {
        header('location: login.php');
        exit;

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

    <title>Welcome - <?php echo $_SESSION['username']; ?></title>
  </head>
  <body>

    <?php
        require 'partials/_nav.php'
    ?>
    <div class="container d-flex flex-column text-center align-items-center my-8">  
      <h1 class="text-center my-4">Welcome - <?php echo $_SESSION['username'];?></h1>
      <p>Here you are logged in our website.</p>
      <p>Please click on the 'LogOut' button tto logout from this weebsite</p>
      <a href="/loginsystem/logout.php"><button class="btn btn-primary " >LogOut</button></a>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <!-- <script>
      logout = document.getElementsByClassName('log');
      l1 = document.getElementsByClassName('l1');
      console.log(l1);
      console.log(logout);
      logout.style.display = "inline-block";
      l1.style.display = "none";
    </script> -->
  </body>
</html>
