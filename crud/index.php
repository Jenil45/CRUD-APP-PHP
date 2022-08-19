<?php

      $inserted = false;
      $updated = false;
      $deleted = false;
// INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES ('', 'Player', 'MY favourite player is Rohit Sharma.', current_timestamp());
      // connecting databse
      $servename = "localhost";
      $username = "root";
      $password = "";
      $database = "inote";
  
      // conecting
      $connection = mysqli_connect($servename , $username , $password , $database);

      if(!$connection)
      {
        echo "We fail to connect : " . mysqli_query($connection);
      }

      // else
      // {
      //   echo "Connection is established";
      // }

      if(isset($_GET['delete']))
      {
        $sno = $_GET['delete'];
        // echo "Deleted $sno";
        $sql = "DELETE FROM `notes` WHERE `sno`=$sno;";
        $result = mysqli_query($connection , $sql);
        if($result)
        {
          $deleted=true;
        }

        else
        {
          $err = mysqli_error($connection);
          echo "Not deleted succesfully due to this $err";
        }
      }

      if($_SERVER['REQUEST_METHOD'] == 'POST')
      {

        //updating the record
        if(isset($_POST['snoEdit']))
        {
          // echo "yes";
          $title = $_POST["titleEdit"];
          $description = $_POST["descEdit"];
          $sno = $_POST["snoEdit"];
          $sql = "UPDATE `notes` SET `title` = '$title', `description` = '$description' WHERE `notes`.`sno` = $sno;";
          $result = mysqli_query($connection , $sql);
          if($result)
          {
            // echo "Data inserted successfully";
            $updated=true;
          }
          else
          {
            echo mysqli_error($connection);
          }
        }

        else
        {
        $title = $_POST['title'];
        $description = $_POST['desc'];

        // inserted
        $sql = "INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES ('', '$title' , ' $description', current_timestamp());";
        $result = mysqli_query($connection , $sql);

        if($result)
        {
          // echo "Data inserted successfully";
          $inserted = true;
        }
        else
        {
          echo mysqli_error($connection);
          echo mysqli_error($connection);
        }
      }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <title>PHP CRUD</title>
  </head>
  <body>

  <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
      Launch demo modal
    </button> -->

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action = "/crud/index.php" method = "post">
            <div class="modal-body">
              <input type="hidden" name="snoEdit" id="snoEdit">
              <div class="mb-3">
                <label for="title" class="form-label">Note Title</label>
                <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                  <label for="desc" class="form-label">Note Description</label>
                  <textarea class="form-control" id="descEdit" name="descEdit" rows="3"></textarea>
                </div>
              <!-- <button type="submit" class="btn btn-primary">Update Note</button> -->
            </div>
            <div class="modal-footer d-block mr-auto">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Starting navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">PHP CRUD</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Functions
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Insert</a></li>
                  <li><a class="dropdown-item" href="#">Update</a></li>
                  <li><a class="dropdown-item" href="#">Delete</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Some other functions....</a></li>
                </ul>
              </li>
              
            </ul>

    <!-- Starting form -->

            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

      <?php
        if($inserted)
        {
          echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Success : </strong> Your data is inserted successfully.
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        }
      ?>
      <?php
        if($updated)
        {
          echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
          <strong>Success : </strong> Your data is updated successfully.
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        }
      ?>
      <?php
        if($deleted)
        {
          echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
          <strong>Success : </strong> Your data is deleted successfully.
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        }
      ?>
      <div class="container my-4">
        <h2>Add a Note</h2>
        <form action = "/crud/index.php" method = "post">
            <div class="mb-3">
              <label for="title" class="form-label">Note</label>
              <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Note Description</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
              </div>
            <button type="submit" class="btn btn-primary">Add Note</button>
          </form>
      </div>

      <!-- Alerting on inserting data -->
    <!-- Starting php -->

    <div class="container">
  
        <table class="table" id = "myTable">
        <thead>
         <tr>
            <th scope="col">Sr No.</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
          <?php

            // fetching data
            $sql = "SELECT * FROM `notes`;";
            $result = mysqli_query($connection , $sql);
            $sno=0;
            while($fetch = mysqli_fetch_assoc($result))
            {
                // print_r($fetch);
                $sno = $sno + 1;
                echo "<tr>
                <th scope='row'>". $sno."</th>
                <td>". $fetch['title']."</td>
                <td>". $fetch['description']."</td>
                <td><button class='edit btn btn-sm btn-primary' id=".$fetch['sno'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$fetch['sno'].">Delete</button></td>
              </tr>";
            }
            ?>
                
  </tbody>
</table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- JQuery -->
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
    <script>
      edits = document.getElementsByClassName('edit');
      Array.from(edits).forEach((element)=>{
        element.addEventListener("click" , (e)=>{
          console.log("edit" , );
          tr = e.target.parentNode.parentNode;
          title = tr.getElementsByTagName("td")[0].innerText;
          description = tr.getElementsByTagName("td")[1].innerText;
          console.log(title , description);
          snoEdit = document.getElementById('snoEdit');
          snoEdit.value = e.target.id;
          titleEdit.value = title;
          descEdit.value = description;
          // console.log(e.target.id);
          $('#editModal').modal('toggle');

        })
      });

      deletes = document.getElementsByClassName('delete');
      Array.from(deletes).forEach((element)=>{
          element.addEventListener("click" , (e)=>{
          console.log("edit" , );
          sno=e.target.id.substr(1,);
          
          if(confirm("Are you sure you want to delete this"))
          {
            console.log("Yes");
            window.location=`/crud/index.php?delete=${sno}`;
          }
          else
          {
            console.log("no");
          }
        })
      });
    </script>
  </body>
</html>
