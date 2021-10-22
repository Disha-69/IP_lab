<?php
include 'Connection.php';

$id = $_REQUEST['id'];
$name = $_POST['name'];
$roll = $_POST['roll'];
$email = $_POST['mail'];
$contact = $_POST['contact'];


$update_query = "UPDATE student set name='$name',roll='$roll',mail='$email',contact='$contact' WHERE id='$id'";

$result = mysqli_query($connection, $update_query);

if ($result) {
    echo 'Data has been updated successfully';
} else {
    echo 'Update faiiled!!';
}
header('Location:index.php');
