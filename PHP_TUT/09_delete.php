<?php

    // connecting databse
    $servename = "localhost";
    $username = "root";
    $password = "";
    $database = "contact";

    // conecting
    $connection = mysqli_connect($servename , $username , $password , $database);

    // updating 
    $sql = "DELETE FROM `contact_us` WHERE `Sr No`=2;";
    $result = mysqli_query($connection , $sql);

    if($result)
    {
        echo "Successfully Deleted";
    }

    else
    {
        $err = mysqli_error($connection);
        echo "Not deleted succesfully due to this $err";
    }
?>