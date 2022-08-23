<?php

    if(isset($_FILES['image']))
    {
        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
    }

/*  Output will be
    Array
(
    [image] => Array
        (
            [name] => ideation_1.png
            [type] => image/png
            [tmp_name] => C:\xampp\tmp\php911A.tmp
            [error] => 0
            [size] => 294274
        )

)
*/

// uploading file to host's computer for that we use move_uploaded_file() function
move_uploaded_file($file_tmp ,"uploaded_content/" . $file_name );                       // file is uploaded  to the uploaded_content folder

?>

<html>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="image">
            <br>
            <br>
            <input type="submit">
        </form>
    </body>
</html>