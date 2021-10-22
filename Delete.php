<?php
$id=$_REQUEST['id'];
include 'Connection.php';
$delete_query="DELETE FROM student WHERE id='$id'";
if(mysqli_query($connection,$delete_query))
{
    echo 'Data has been deleted successfully';
}else
{
    echo 'Failed!';
}
header('Location:index.php');