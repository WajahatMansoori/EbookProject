<?php
include('dbconnection.php');
$ID=$_GET['id'];
$Query="DELETE from Orders where Order_Id='$ID'";
$Run=mysqli_query($con,$Query);
if($Run==true)
{
    echo "<script>
    alert('Data Deleted Successfully');
    window.location.href='ViewOrder.php';
    </script>";
}
else
{
    echo "<script>
    alert('Data Not Deleted Successfully');
    window.location.href='ViewOrder.php';
    </script>";
}
?>