<?php
        include 'partials/header.php';
        include 'partials/dbconnect.php';
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Hello, world!</title>
</head>

<body>


    <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM `quera` WHERE `category_id`= $id ";
        $result = mysqli_query( $connection ,$sql);
        while($title = mysqli_fetch_assoc($result))
        {
            $title_name = $title['category_name'];
            $title_desc = $title['category_desc'];
        }
        // print_r($_SERVER);
    ?>
    <!-- form php -->
    <?php
        $showalert=false;
        if(array_key_exists('question' , $_POST))
        {
            $sno = $_POST['sno'];
            $threadtitle = $_POST['question'];
            $threaddesc = $_POST['about'];
            $sql = "INSERT INTO `thread` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( '$threadtitle', '$threaddesc', $id, $sno , current_timestamp());";
            $result = mysqli_query($connection , $sql);

            if($result)
            {
                $showalert = true;
            }
            else
            {
                mysqli_error($connection);
            }
            if($showalert)
            {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your question inserted succcessfully
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
            }
        }
    ?>
    <center>
        <div class="bg-light p-5 rounded-lg ">
            <h1 class="display-4">Welcome to <?php echo $title_name; ?></h1>
            <p class="lead"><?php echo $title_desc; ?></p>
            <hr class="my-4">
            <p>|| This is very useful forum for getting your answers |
                Do not post copyright-infringing material |
                Do not post “offensive” posts, links or images |
                Do not PM users asking for help |
                Remain respectful of other members at all time ||
            </p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </center>

    
    <?php 
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
    echo '<div class="container">
            <h1 class="py-2">Start a Discussion</h1> 
            <form action="'. $_SERVER["REQUEST_URI"] . '" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Problem Title</label>
                    <input type="text" class="form-control" id="question" name="question" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">Keep your title as short and crisp as
                        possible</small>
                </div>
                <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Ellaborate Your Concern</label>
                    <textarea class="form-control" id="about" name="about" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>';
    }
    else{
        echo '
        <div class="container">
        <h1 class="py-2">Start a Discussion</h1> 
           <p class="lead">You are not logged in. Please login to be able to start a Discussion</p>
        </div>
        ';
    }

    ?>

    <div class="container seth">
        <h1>Browse Questions</h1>

        <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM `thread` WHERE `thread_cat_id`= $id ";
            $result = mysqli_query( $connection ,$sql);
            $noResult=true;
            while($title = mysqli_fetch_assoc($result))
            {
                $userid = $title['thread_user_id'];
                $sql2="SELECT * FROM `user` WHERE srno=$userid ";
                $result2 = mysqli_query($connection , $sql2);
                $users = mysqli_fetch_assoc($result2);
                $noResult=false;
                echo '<div class="media my-3">
                    <img src="image/user2.png" width="54px" class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0">  <a  class="text-success" href="thread_content.php?threadid='.$title['thread_id'].'&&threadcatid='.$title['thread_cat_id'].'">'. $title['thread_title'].'</a></h5>
                        '.$title['thread_desc'].'
                    </div>
                    <div>Post by : '.$users['user_name'].'</div>
                </div>';
            }
            if($noResult)
            {
                echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-4">No result found</h1>
                  <p class="lead">Add your question firstly.</p>
                </div>
              </div>';
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
