<?php
$db = mysqli_connect('localhost', 'root', '', 'notes') or die("Could not connect to Database");
$insert = false;
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css.css"> -->

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet">

  <style>
    body {
      /* font-family: 'Merriweather', serif; */
      font-size: 17px;
    }
  </style>
  <title>iNotes - The notes taking app</title>
</head>

<body>







  <!-- Modal start -->

  <!-- Button trigger modal
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Launch demo modal
    </button> -->

  <!-- Modal -->
  <div class="modal fade" id="edit_modal_id" role="dialog" tabindex="-1" aria-labelledby="edit_modal_idLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Note</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="" method="post">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Title</label>
              <input type="text" class="form-control" id="title_edit_id" placeholder="Title" name="title_edit_name">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Description</label>
              <textarea class="form-control" id="desc_edit_id" rows="3" placeholder="Description" name="desc_edit_name"></textarea>
            </div>
            <input type="submit" name="update_note_name" class="btn btn-primary" value="Update note"></input>
          </form>
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
      </div>
    </div>
  </div>
  <!-- Modal end -->

  <!-- navbar start -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">iNotes</a>
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
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
        </ul>
        <!-- Search bar start -->
        <form class="d-flex" action="" method="post">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchitems_name" autocomplete="off">
          <button class="btn btn-outline-success" type="submit" name="search_name">Search</button>
        </form>
        <!-- Search bar end -->
      </div>
    </div>
  </nav>
  <!-- navbar end -->
  <div class="container my-4">
    <h2 class="my-3">Add Notes Here</h2>
    <!-- input area start -->
    <form action="" method="post">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" name="title_name">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description" name="desc_name"></textarea>
      </div>
      <input type="submit" name="add_note_name" class="btn btn-primary" value="Add note"></input>
    </form>
    <!-- input area end -->
  </div>
  <div class="container my-4">
    <!-- table start -->
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Sl no.</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Action</th>
        </tr>
      </thead>

      <?php
      // Inserting into database table start
      if (isset($_POST['add_note_name'])) {
        $a = $_POST['title_name'];
        $b = $_POST['desc_name'];
        $query = "INSERT into note_s(title, description) VALUES('$a', '$b')";
        $result = mysqli_query($db, $query) or die("Could not execute querry");
        if ($result) {
          $insert = true;
        }
        // else{
        //   echo("Could not insert");
        // }
      }
      // Inserting into database table end

      //update data inserting to database start
      if (isset($_POST['update_note_name'])) {
        $a = $_POST['title_edit_name'];
        $b = $_POST['desc_edit_name'];
        $c = $_POST['snoEdit'];
        $query = "UPDATE note_s SET title = '$a', description = '$b' WHERE sl_no = $c";
        $result = mysqli_query($db, $query) or die("Could not execute querry");
        if ($result) {
          $insert = true;
        }
      }
      //update data inserting to database end

      $v = 1;
      //display on search start
      if (isset($_POST['search_name'])) {
        $c = $_POST['searchitems_name'];
        $query = "SELECT * FROM note_s WHERE title like '%" . $c . "%' OR description like '%" . $c . "%'";
        $result = mysqli_query($db, $query) or die("Cannot find any matches");
        while ($row = mysqli_fetch_row($result)) {
          echo ("<tbody>
            <tr>
            <th scope='row'>$v</th>
            <td>$row[1]</td>
            <td>$row[2]</td>
            <td><button class='edit btn btn-sm btn-danger' id='$v' name='edit_name'>Edit</button> &nbsp;&nbsp; 
            <button class='btn btn-sm btn-success my-1' onclick='deleteit(" . $row[0] . ")'>Delete</button></td>
            </tr>
            </tbody>");
          $v++;
        }
      }
      //display on search end

      $v = 1;
      //displaying into table start
      if (!(isset($_POST['search_name']))) {
        $query = "SELECT * FROM note_s";
        $result = mysqli_query($db, $query) or die("Could not execute querry");
        while ($row = mysqli_fetch_row($result)) {
          echo ("<tbody>
            <tr>
            <th scope='row'>$v</th>
            <td>$row[1]</td>
            <td>$row[2]</td>
            <td><button class='edit btn btn-sm btn-danger' id='$v' name='edit_name'>Edit</button>&nbsp;&nbsp; 
            <button class='btn btn-sm btn-success my-1' onclick='deleteit(" . $row[0] . ")'>Delete</button></td>
            </tr>
            </tbody>");
          $v++;
        }
      }

      //displaying into table end
      ?>


    </table>
    <!-- table end -->
  </div>
  <script src="notes.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <!-- <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->

  <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
</body>

</html>