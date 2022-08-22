
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <?php
        include 'partials/header.php';
    ?>
    <!-- <div class="container my-4">
        <h1>Search results for <em>"<?php echo $_GET['search']?>"</em></h1>
    </div> -->
<div class="container">

    <?php
        $noresult = true;
        include 'partials/dbconnect.php';
        $searching = $_GET['search'];
        $sql = "SELECT * FROM `thread` WHERE MATCH (thread_title , thread_desc) against ('$searching');";
        $result = mysqli_query($connection , $sql);
        while($row = mysqli_fetch_assoc($result))
        {
            $noresult = false;
            $threadid =  $row['thread_id'];
            $threadcatid =  $row['thread_cat_id'];
            $threadtitle = $row['thread_title'];
            $threaddesc = $row['thread_desc'];
            $url = "thread_content.php?threadid=".$threadid."&threadcatid=".$threadcatid;

            echo '
            <div class="container my-4">
            <h1>Search results for <em>'.$_GET['search'].'</em></h1>
            <div class="result">
            <a href="'.$url.'"><h4 class="text-success">'.$threadtitle.'</h4></a>
            <p>'.$threaddesc.'</p>
        </div></div>';
        }

        if($noresult)
        {
            echo '
                <div class="container my-4">
                  <h3 class="display-4"><b>No result found</b></h3>
                  <p class="blackquote ">Your search - <b>'.$searching.'</b> - did not match any documents.
                  <br>
                  <br>
                  <b>Suggestions:</b>
                  <br>
                  Make sure that all words are spelled correctly.
                  <br>
                  Try different keywords.
                  <br>
                  Try more general keywords.</p>
                  </div>
                  ';
        }
    ?>    
</div>
    
<?php
        include 'partials/footer.php';
    ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
