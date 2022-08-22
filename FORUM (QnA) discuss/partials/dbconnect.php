<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "forum";               // we only use this database

// create a connection
$connection = mysqli_connect($servername , $username , $password , $database);


// die if connection is not succesfull
// if(!$connection)
// {
//     die("Sorry we fail to connect".mysqli_error($connection));
// }

// else
// {
//     echo "Connection is successful"."<br>";
// }
?>
