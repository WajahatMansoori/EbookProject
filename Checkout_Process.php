<?php
include('dbconnection.php');
include("Mail.php");
session_start();
if(isset($_SESSION["UserName"]))
    {    
        $f_name = $_POST["firstname"];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $payment = $_POST['card'];
        $total_count=$_POST['total_count'];
        $prod_total = $_POST['total_price'];

        $Query = "INSERT INTO orders (Cus_Name, Email,Cus_Address,City, Payment, Prod_Count,Total_Amount) VALUES ('$f_name','$email', '$address','$city', '$payment', '$total_count','$prod_total')";
        $Run=mysqli_query($con,$Query);
        if($Run==true)
        {
            echo "<script>
            alert('Thankyou For Shopping Please Check Your Mail');
            window.location.href='index.php';
            </script>";
        }
        else
        {
            echo "<script>
           
            window.location.href='Checkout_Process.php';
            </script>";
        }
    
 



$from="ammw2021@gmail.com";
$pass="admin0315";
$to= $email;
$sub="Order Coonfirmation";
$body="Your order has been received..";
$host="smtp.gmail.com";
$port=25;

$header=array("to"=>$to,"from"=>$from,"subject"=>$sub);


$mail=Mail::factory("smtp",array("host"=>$host,"port"=>$port,"auth"=>true,"username"=>$from,"password"=>$pass));


$send=$mail->send($to,$header,$body);

if(PEAR::IsError($send))
{
	
	echo "<p>".$send->getMessage()."</p>";
	
	}
	else
	{
		echo "Mail sent Successfully";
		}

}





else
{
    echo "<script>
        alert('Unauthorize');
        window.location.href='login.php';
        </script>";
}



?>