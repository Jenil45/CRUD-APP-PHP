<?php
$useralert=false;
$passwordcheck=false;
$signup=false;
    include 'partials/dbconnect.php';
    if(array_key_exists('uname',$_POST)){
      
        $uname=$_POST['uname'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $sql="SELECT * FROM `user` WHERE `user_name`='$uname'";
        $result=mysqli_query($connection,$sql);
        $num = mysqli_num_rows($result);
        if($num > 0){
            $useralert=true;
        }
        else{
            if($password == $cpassword){

                $sql="INSERT INTO `user` ( `user_name`, `password`) VALUES ('$uname', '$password')";
                $result=mysqli_query($connection,$sql);
                $signup=true;
            }
            else
            {
                $passwordcheck=true;
            }
        }
    }
?>
