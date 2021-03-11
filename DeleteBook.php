<?php
include('dbconnection.php');
$Id=$_GET['id'];
$Query="DELETE from books where Book_Id='$Id'";
$Run=mysqli_query($con,$Query);
if($Run==true)
{
    echo "<script>
    alert('Data Deleted Successfully');
    window.location.href='fetchBook.php';
    </script>";
}
else
{
    echo "<script>
    alert('Data Not Deleted Successfully');
    window.location.href='fetchBook.php';
    </script>";
}
?>