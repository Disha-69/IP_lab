<!DOCTYPE html>

<html lang="en">
<head>
  <title>Student registration form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  "stylesheet" href="https:<link rel=//maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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

                    $insert_query = "INSERT INTO student(name,roll,mail,contact) values('$studentName','$roll','$mail','$contact')";

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
<table class="data">
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
                        </tr>

                    </tbody>

                <?php
                }
                ?>
                <table>


</body>
</html>