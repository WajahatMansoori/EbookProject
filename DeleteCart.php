<?php
include('dbconnection.php');
$CartItemId=$_GET['Getid'];
$Query="DELETE from cart where Book_Id='$CartItemId'";
$Run=mysqli_query($con,$Query);
if($Run==true)
{
    echo "<script>
    alert('Item Remove From Cart Successfully');
    window.location.href='Cart.php';
    </script>";
}
else
{
    echo "<script>
    alert('Item Not Remove From Cart Successfully');
    </script>";   
}
?>