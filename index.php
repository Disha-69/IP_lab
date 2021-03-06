<!DOCTYPE html>

<html lang="en">

<head>
  <title>Student registration form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="col-lg-5">
      <h2>Student Registration Form</h2>
      <form action="" name="reg_form" method="post">
        <div class="form-group">
          <label for="name">Student name:</label>
          <input type="text" class="form-control" id="name" placeholder="Enter student name" name="name">
        </div>
        <div class="form-group">
          <label for="roll">Roll</label>
          <input type="int" class="form-control" id="roll" placeholder="Enter Roll Number" name="roll">
        </div>
        <div class="form-group">
          <label for="mail">Email</label>
          <input type="varchar" class="form-control" id="mail" placeholder="Enter Email" name="mail">
        </div>
        <div class="form-group">
          <label for="contact">Contact Number</label>
          <input type="int" class="form-control" id="contact" placeholder="Enter Contact Number" name="contact">
        </div>

        <button type="submit" name="insert" class="btn btn-default">Insert</button>
        <button type="submit" name="update" class="btn btn-default">Update</button>
        <button type="submit" name="delete" class="btn btn-default">Delete</button>
        <?php
        include 'Connection.php';
        if (isset($_POST['insert'])) {
          //  print_r($_POST);
          $studentName = $_POST['name'];
          $roll = $_POST['roll'];
          $email = $_POST['mail'];
          $contact = $_POST['contact'];

          $insert_query = "INSERT INTO student(name,roll,mail,contact) values('$studentName','$roll','$email','$contact')";

          $result = mysqli_query($connection, $insert_query);
          if ($result) {
            echo "Data Inserted Successfullly";
          } else {
            echo "Data Insertion failed!!!";
          }
        ?>
        <?php

        }

        $select_query = "SELECT * FROM student";
        $result = mysqli_query($connection, $select_query);
        $serial = 1;
        ?>
      </form>
    </div>
  </div>
  <br>
  <br>
  <table class="data" style="margin-left: 100px">
    <h1 class="Heading">Information</h1>
    <thead>
      <tr>
        <!--  <th>Serial</th>-->
        <th>Student Name</th>
        <th>Roll</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>

    <?php
    while ($row = mysqli_fetch_array($result)) {
    ?>
      <tbody>
        <tr>
          <!--   <td><?php echo $serial++; ?></td>-->
          <td><?php echo $row['name'] ?></td>
          <td><?php echo $row['roll'] ?></td>
          <td><?php echo $row['mail'] ?></td>
          <td><?php echo $row['contact'] ?></td>
          <td>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $row['id'] ?>">
              Edit
            </button>
          </td>

          <td>
            <a onclick="confirm('Do you want to delete?')" class="btn btn-danger" href="Delete.php? id=<?php echo $row['id'] ?>">Delete</a>
          </td>
        </tr>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Edit</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form action="edit.php" method="post" enctype="multipart/form-data">
                  <?php
                  include 'Connection.php';
                  $id = $row['id'];
                  $select_query = "SELECT * FROM student where id='$id'";
                  $result_edit = mysqli_query($connection, $select_query);
                  $result_edit_row = mysqli_fetch_row($result_edit);
                  ?>
                  <input id="id" type="hidden" name="id" value="<?php echo $result_edit_row[0] ?>">
                  <div class="form-group">
                    <label class="lbel">Student Name</label>
                    <input class="in" name="name" required id="name" value="<?php echo $result_edit_row[1] ?>" placeholder="Enter Student Name">
                    <br>
                    <label class="lbel">Roll</label> <br>
                    <input class="in" type="int" value="<?php echo $result_edit_row[2] ?>" required name="roll" id="roll" placeholder="191200">
                    <br>
                    <label class="lbel">Email</label>
                    <input class="in" type="varchar" value="<?php echo $result_edit_row[3] ?>" name="mail" id="mail" required pattern=".{8,}" placeholder="Enter the Email">
                    <br>
                    <label class="lbel">Contact Number</label>
                    <input class="in" name="contact" value="<?php echo $result_edit_row[4] ?>" id="contact" type="int">
                    <br>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button onclick="confirm('Do you want to save changes?')" type="submit" class="btn btn-primary">Save changes</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </tbody>
    <?php
    }
    ?>
  </table>


</body>

</html>