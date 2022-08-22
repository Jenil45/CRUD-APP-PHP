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
        $id = $_GET['threadid'];
        $id1 = $_GET['threadcatid'];
        $sql = "SELECT * FROM `thread` WHERE thread_id=$id AND thread_cat_id=$id1";
        $result = mysqli_query( $connection ,$sql);
        while($title = mysqli_fetch_assoc($result))
        {
            $title_name = $title['thread_title'];
            $title_desc = $title['thread_desc'];
        }
    ?>
    <!-- form php -->
    <?php
    $commentinserted = false;
    
    if(array_key_exists('comment' , $_POST)){
        //Insert into comment db
        $comment = $_POST['comment']; 
        // $comment = str_replace("<", "&lt;", $comment);
        // $comment = str_replace(">", "&gt;", $comment); 
        $sno = $_POST['sno'];
        $sql = "INSERT INTO `comment` ( `comment_desc`, `thread_id`, `comment_by`, `comment_date`) VALUES ('$comment', $id, $sno, current_timestamp())";
        $result = mysqli_query($connection, $sql);
        if($result)
        {
            $showAlert = true;
        }
        else
        {
            echo mysqli_error($connection);
        }
        if($commentinserted){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your comment has been added!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                  </div>';
        } 
    }
    ?>
    <center>
        <div class="bg-light p-5 rounded-lg ">
            <h1 class="display-4"><?php echo $title_name; ?></h1>
            <p class="lead"><?php echo $title_desc; ?></p>
            <hr class="my-4">
            <p>|| This is very useful forum for getting your answers |
                Do not post copyright-infringing material |
                Do not post “offensive” posts, links or images |
                Do not PM users asking for help |
                Remain respectful of other members at all time ||
            </p>
            <p><b>Post by : <?php 
            $id = $_GET['threadid'];
            $sql5 = "SELECT * FROM `thread` WHERE thread_id=$id ";
            $result3 = mysqli_query( $connection ,$sql5);
            $slectuser = mysqli_fetch_assoc($result3);
            $uid = $slectuser['thread_user_id'];
            $sql3 = "SELECT * FROM `user` WHERE srno = $uid";
            $result4 = mysqli_query($connection , $sql3);
            $userpost = mysqli_fetch_assoc($result4);
            echo $userpost['user_name']; ?></b></p>
        </div>
    </center>

 
    <?php 
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
    echo '<div class="container">
        <h1 class="py-2">Post a Comment</h1>'; 
        // echo $_SERVER['REQUEST_URI'];
        echo '<form action= "'.$_SERVER['REQUEST_URI'] . '" method="post"> 
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Enter your Comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
            </div>
            <button type="submit" class="btn btn-success">Post Comment</button>
        </form> 
    </div>';
    }
    else{
        echo '
        
        <div class="container">
        <h1 class="py-2">Post a Comment</h1> 
           <p class="lead">Please login to be able to post comments.</p>
        </div>
        ';
    }

    ?>
    <div class="container seth">
        <h1>Discussion</h1>

        <?php
            $id = $_GET['threadid'];
            $sql = "SELECT * FROM `comment` WHERE thread_id='$id' ";
            $result = mysqli_query( $connection ,$sql);
            $noResult=true;
            while($title = mysqli_fetch_assoc($result))
            {
                $userid = $title['comment_by'];
                $sql2="SELECT * FROM `user` WHERE srno=$userid ";
                $result2 = mysqli_query($connection , $sql2);
                $users = mysqli_fetch_assoc($result2);
                $noResult=false;
                echo '<div class="media my-3 bg-">
                    <img src="image/user2.png" width="54px" class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0">'. $users['user_name'].'</a></h5>
                        '.$title['comment_desc'].'
                    </div>
                    <div class="text-grey">Date : '.$title['comment_date'].'</div>
                </div>';
            }
            if($noResult)
            {
                echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-4">Discussion isn\'t start yet</h1>
                  <p class="lead">Give your solution firstly.</p>
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
