<?php
    include 'partials/dbconnect.php';
    $invalid=false;
    $login = false;
    if(array_key_exists('uname1',$_POST))
    {       
        $username = $_POST['uname1'];
        $loginpassword = $_POST['password1'];
        $sql1 = "SELECT * FROM `user` WHERE `user_name`= '$username' AND `password`='$loginpassword'";
        $result1=mysqli_query($connection , $sql1);
        $num1=mysqli_num_rows($result1);
        $row = mysqli_fetch_assoc($result1);
        if($num1>0)
        {
            $login = true;
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['username']= $username;
            $_SESSION['sno']= $row['srno'];
        }
        else
        {
            // header("Location: /forum/index.php"); 
            $invalid=true;
        }
        // header('location: /forum/index.php'); 
    }
?>
