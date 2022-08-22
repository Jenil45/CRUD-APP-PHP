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
      include 'partials/dbconnect.php';
      include 'partials/header.php';
    ?>
    <!-- Aleart box  -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="false"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="false"></span>
            <span class="sr-only">Next</span>
        </button>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="image/bg1.jpeg" class="d-block w-100" alt="error">
            </div>
            <div class="carousel-item">
                <img src="image/bg5.jpg" class="d-block w-100" alt="error">
            </div>
            <div class="carousel-item">
                <img src="image/bg6.jpg" class="d-block w-100" overflow-hidden alt="error">
            </div>
        </div>
    </div>
    <div>
        <div class="container my-4 seth">
            <h1 class="text-center">Quera - Categories</h1>

            <!-- use for loop to iterate categories -->
            <div class="row d-flex flex-row justify-content-center">
                <?php
    
                    $sql = "SELECT * FROM `quera` ";
                    $result = mysqli_query( $connection ,$sql);
                    while($title = mysqli_fetch_assoc($result))
                    {

                        echo'
                        <div class="card m-4" style="width: 18rem;">
                        <img src="https://source.unsplash.com/200x100/?'.$title['category_name'].',coding" class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column justify-content-between ">
                        <div>
                                  <h5 class="card-title"><a href="threads.php?id='.$title['category_id'].'"> '.$title['category_name']
                                  .'</a></h5>
                                  <p class="card-text"> '.substr($title['category_desc'] , 0 , 60)
                                  .'... </p>
                              </div>    
                                <center>
                                <div class=" mt-2 "><a href="threads.php?id='.$title['category_id'].'" class="btn btn-primary ">Explore it</a></div>
                                </center>
                                </div>
                                </div>';
                    }
                ?>
            </div>
        </div>
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
