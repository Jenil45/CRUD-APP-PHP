<?php

$alreadyexists = false;
$created = false;
$donotmatch = false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include 'partials/_dbconnect.php';
    $username = $_POST['username'];
    $checkUnamesql = "SELECT * FROM `users` WHERE username = '$username';";
    $result = mysqli_query($connection , $checkUnamesql);
    $numberOfRowMatch = mysqli_num_rows($result);
    if($numberOfRowMatch > 0)
    {
        
        $alreadyexists = true;
    }
        
    else
    {
        $alreadyexists = false;
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        if(($password == $cpassword ) && $alreadyexists==false)
        {
            $hash = password_hash($password , PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`username`, `password`, `date`) VALUES ('$username', '$hash', current_timestamp());";
            $result = mysqli_query($connection , $sql);
            
            if($result)
            {
                $created = true;
            }
            
            else
            {
                echo mysqli_error($connection);
            }
        }
        
        else
        {
            $donotmatch = true;
        }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>SignUp</title>
</head>

<body>

    <?php
        require 'partials/_nav.php';
        if($alreadyexists)
        {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '.$username .'already exist
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }

        if($created)
        {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your account is created successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        if($donotmatch)
        {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> password donot match
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    ?>
    <div class="container">
        <h1 class="text-center my-4">SignUp to our Website</h1>
        <form action="/loginsystem/signup.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" maxlength = "11" id="username" name="username" aria-describedby="emailHelp">
            </div>
            
            <div class="mb-3" >
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" maxlength = "23" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                <div id="emailHelp" class="form-text">*Make sure to type the same password</div>
            </div>
    
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
