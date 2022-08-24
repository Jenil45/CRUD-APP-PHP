<?php

    // connecting databse
    $servename = "localhost";
    $username = "root";
    $password = "";
    $database = "contact";

    // conecting
    $connection = mysqli_connect($servename , $username , $password , $database);

    // fetching data
    // $sql = "SELECT * FROM `contact_us`;";
    $sql = "SELECT * FROM `contact_us` WHERE `Name`='Jenil Thako';";
    $result = mysqli_query($connection , $sql);

    // calculating how many rows are fetched
    $num = mysqli_num_rows($result);
    echo $num."<br>";

    // To fetch data one by one
    if($num > 0)
    {
        // $fetch = mysqli_fetch_assoc($result);                     // This will fetch data one by one
        // echo var_dump($fetch);
        // echo "<br>";
        // $fetch = mysqli_fetch_assoc($result);                     // This will fetch data one by one
        // echo var_dump($fetch);
        // echo "<br>";
        // $fetch = mysqli_fetch_assoc($result);                     // This will fetch data one by one
        // echo var_dump($fetch);
        // echo "<br>";
        // $fetch = mysqli_fetch_assoc($result);                     // This will fetch data one by one
        // echo var_dump($fetch);
        // echo "<br>";
        // $fetch = mysqli_fetch_assoc($result);                     // This will fetch data one by one
        // echo var_dump($fetch);
        // echo "<br>";
        // $fetch = mysqli_fetch_assoc($result);                     // This will fetch data one by one
        // echo var_dump($fetch);
        // echo "<br>";
        // $fetch = mysqli_fetch_assoc($result);                     // This will fetch data one by one
        // echo var_dump($fetch);
        // echo "<br>";
        // $fetch = mysqli_fetch_assoc($result);                     // This will fetch data one by one
        // echo var_dump($fetch);
        // echo "<br>";

        while($fetch = mysqli_fetch_assoc($result))
        {
            echo "Sr No : ". $fetch['Sr No'] . "|| Name : ". $fetch["Name"] . "|| Email : ". $fetch['Email'] . "|| Description : ". $fetch['Description'];
            echo "<br>";
        }

    }
        // updating 
    $sql = "UPDATE  `contact_us` SET `Name`='Jay' WHERE `Name`='Jenil Thako';";
    $result = mysqli_query($connection , $sql);

    if($result)
    {
        echo "Successfully updated";
    }

    // mysqli_affected_rows($connection);       ----> gives the no of affected rows
?>