<?php

echo "We are connecting a database to php"."<br>";
/*  Ways to connect MySQL database with php

(1) MySQLi extension       (we can use it by procedural way or object oriented way)
(2) PDO                    (php data object)

*/

// connecting to the database we need below 3 things
$servername = "localhost";
$username = "root";
$password = "";
$database = "jenildemo";               // we only use this database

// create a connection
$connection = mysqli_connect($servername , $username , $password , $database);


// die if connection is not succesfull
if(!$connection)
{
    die("Sorry we fail to connect".mysqli_error($connection));
}

else
{
    echo "Connection is successful"."<br>";
}

//  creting a db
$sql = "CREATE DATABASE jenildemo";
$result = mysqli_query($connection , $sql);

// check for db creation success
if($result)
{
    echo "Database is creted succesfully";
}

else
{
    echo "DB is failed to crete because of this error -----> ". mysqli_error($connection);
}

// create a table in db
$sql = "CREATE TABLE `mytable` ( `Sr` INT(11) NOT NULL , `Name` VARCHAR(11) NOT NULL , `Age` INT(11) NOT NULL , `DOB` DATE NOT NULL );";
$result = mysqli_query($connection , $sql);

// check for table cretion
if($result)
{
    echo "<br>"."table created succesfully";
}

else
{
    echo  "<br> the error has occured in cretion of table duee to -----> ".mysqli_error($connection);
}
?>