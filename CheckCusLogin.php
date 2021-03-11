<?php
include('dbconnection.php');
session_start();
if(isset($_POST['LoginBtn']))
{
    
    $Name=$_POST['UserName'];
    $Password=$_POST['password'];

    $Query="SELECT *from customer where Cus_Name='$Name' and Pass='$Password'";
    $Run=mysqli_query($con,$Query);
    $TotalRows=mysqli_num_rows($Run);
    $Data=mysqli_fetch_array($Run);
    if($TotalRows==1)
    {
        $_SESSION['C_ID']=$Data['Cus_Id'];
        $_SESSION['UserName']=$Name;

        echo "<script>
        alert('Login Successfully');
        window.location.href='index.php';    
        </script>";
    }
    else
    {
        echo "<script>
        alert('Unauthorize User Kindly First Registered your Account');
        window.location.href='Registered.php';    
        </script>";
    }
}
?>