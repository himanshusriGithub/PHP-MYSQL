<?php
  include('connection.php');
if(isset($_GET['page']))
{
  $page=$_GET['page'];

}else {
  $page=1;
}

$num_per_page=04;
$start_from=($page-1)*04;


$query="select * from tbl_record limit $start_from.$num_per_page";
$result=mysqli_query($conn,$query);
$num_per_page=05;



  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Practical </title>
</head>

<body>


<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="" target="_blank" >User Registration Form</a>
    </div>
  </nav>
  <br><br><br>

  <div class="container">
    <div class="row">
      <div class="col-md-12 card">
        <div>
          <div class="head-title">
            <h2 class="text-center"><b>Details of User</b></h2>
            <hr>
          </div>
          <div class="col-md-3 float-left add-new-button">
            <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addModal">
              <i class="fas fa-plus"></i> Add New Record
            </a>
          </div>

          <br><br><br>
          <table class="table table-striped">
            <thead class="bg-secondary text-white">
              <tr>
                <th>#</th>
                <th>UserName</th>
                <th>Email Id</th>
                <th>Address</th>
                <th>Date of Birth</th>
                <th>Upload your pic</th>
                <th>View</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
          </tbody>


            <?php

              $sql = "SELECT * FROM tbl_record";
              $result = mysqli_query($conn, $sql);

            if($result)
            {
              while($row = mysqli_fetch_assoc($result)){
            ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['emailid']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['dateofbirth']; ?></td>
                <td><?php echo $row['uploadyourpic']; ?></td>
                <td>
                  <button type="button" class="btn btn-info viewBtn"> <i class="fas fa-eye"></i> View </button>
                </td>
                <td>
                  <button type="button" class="btn btn-warning updateBtn"> <i class="fas fa-edit"></i> Update </button>
                </td>
                <td>
                  <button type="button" class="btn btn-danger deleteBtn"> <i class="fas fa-trash-alt"></i> Delete </button>
                </td>
              </tr>
            <?php
              }
            }else{
              echo "<script> alert('No Record Found');</script>";
            }
          ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


  <!-- changes -->
    <?php
   $query="select * from tbl_record";
  $pr_result = mysqli_query($conn,$query);
  $totalrecord = mysqli_num_rows($pr_result);
  //echo $totalrecord;
  $totalpages=ceil($totalrecord/$num_per_page);
  //echo $totalpages;
  echo '<center>';

  echo '<br>';
  for($i=1;$i<=$totalpages;$i++)
  {

    echo"<a href='index.php?page=".$i." 'class='btn  btn-success'>$i</a>";
  }

  echo '</center>';  echo '</br>';
   ?>
  <!-- MODALS -->

  <!-- ADD RECORD MODAL -->
  <div class="modal fade" id="addModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Add New Record</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="insert.php" method="POST">
            <div class="form-group">

              <label for="title">UserName</label>
              <input type="text" name="username" class="form-control" placeholder="Enter UserName" maxlength="50"
                required>
            </div>
            <div class="form-group">
              <label for="title">Email Id</label>
              <input type="email" name="emailid" class="form-control" placeholder="Enter emailid" maxlength="50"
                required>
            </div>
            <div class="form-group">
              <label for="title">Address</label>
              <input type="text" name="address" class="form-control" placeholder="Enter address" maxlength="50"
                required>
            </div>
            <div class="form-group">
              <label for="title">Date of Birth</label>
              <input type="date" name="dateofbirth" class="form-control" placeholder="Enter Date of Birth" maxlength="50" required>
            </div>
            <div class="form-group">
                <form action="upload.php" method="POST">
              <label for="title">Upload your pic</label>
              <input type="file" name="uploadyourpic" class="form-control" placeholder="Upload your pic" maxlength="50"
                required>

            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="insertData">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- VIEW MODAL -->
  <div class="modal fade" id="viewModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-info text-white">
          <h5 class="modal-title">View Record Information</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>UserName:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewusername"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Email Id:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewemailid"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Address:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewAddress"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Date of Birth:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewdateofbirth"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Upload your pic:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewuploadyourpic"></div>
            </div>
          </div>
          <br>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- UPDATE MODAL -->
  <div class="modal fade" id="updateModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
          <h5 class="modal-title">Edit Record</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="update.php" method="POST">
            <input type="hidden" name="updateId" id="updateId">
            <div class="form-group">
              <label for="title">UserName</label>
              <input type="text" name="updateusername" id="updateusername" class="form-control" placeholder="Enter username" maxlength="50"
                required>
            </div>
            <div class="form-group">
              <label for="title">Email Id</label>
              <input type="text" name="updateemailid" id="updateemailid" class="form-control" placeholder="Enter emailid" maxlength="50"
                required>
            </div>
            <div class="form-group">
              <label for="title">Address</label>
              <input type="text" name="updateAddress" id="updateAddress" class="form-control" placeholder="Enter address" maxlength="50"
                required>
            </div>
            <div class="form-group">
              <label for="title">Date of Birth</label>
              <input type="text" name="updatedateofbirth" id="updatedateofbirth" class="form-control" placeholder="Enter date of birth" maxlength="50" required>
            </div>
            <div class="form-group">
              <label for="title">upload your pic</label>
              <input type="file" name="updateuploadyourpic" id="updateuploadyourpic" class="form-control" placeholder="Upload your pic" maxlength="50"
                required>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="updateData">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- DELETE MODAL -->
  <div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="delete.php" method="POST">

          <div class="modal-body">

            <input type="hidden" name="deleteId" id="deleteId">

            <h4>Are you sure want to delete?</h4>

          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary" name="deleteData">Yes</button>
        </div>

        </form>
      </div>
    </div>
  </div>

  <script src="http://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
    integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

  <script>
    $(document).ready(function () {
      $('.updateBtn').on('click', function(){

        $('#updateModal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#updateId').val(data[0]);
        $('#updateusername').val(data[1]);
        $('#updateemailid').val(data[2]);
        $('#updateAddress').val(data[3]);
        $('#updatedateofbirth').val(data[4]);
        $('#updateuploadyourpic').val(data[5]);

        });

    });
  </script>

  <script>
    $(document).ready(function () {
      $('.viewBtn').on('click', function(){

        $('#viewModal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#viewusername').text(data[1]);
        $('#viewemailid').text(data[2]);
        $('#viewAddress').text(data[3]);
        $('#viewdateofbirth').text(data[4]);
        $('#viewuploadyourpic').text(data[5]);

        });

    });
  </script>

  <script>
    $(document).ready(function () {
      $('.deleteBtn').on('click', function(){

        $('#deleteModal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#deleteId').val(data[0]);

        });

    });
  </script>
</body>
</html>
