<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "users";

$connection = mysqli_connect($server , $username , $password , $database);
if(!$connection)
{
    echo "success";
    die(mysqli_connect_error($connection));
}
?>
