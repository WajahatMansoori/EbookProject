<?php
include('dbconnection.php');
if(isset($_POST['RegBtn']))
{
    $Name=$_POST['name'];
    $Email=$_POST['email'];
    $Password=$_POST['password'];
    $Phone=$_POST['phone'];
    $Address=$_POST['address'];
    $City=$_POST['city'];

    $Query="insert into customer (Cus_Name,Email,Pass,Phone,Cus_Address,City) values('$Name','$Email','$Password','$Phone','$Address','$City')";
    $Run=mysqli_query($con,$Query);
    if($Run==true)
    {
        echo "<script>
        alert('Registered Successfully');
        window.location.href='CustomerLogin.php';
        </script>";
    }
}
?>