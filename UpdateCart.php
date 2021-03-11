<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>
		
<?php
include('Header.php');
include('dbconnection.php');
$CartItemId=$_GET['Getid']??"";
$Query="SELECT *from cart where Cart_Id='$CartItemId'";
$Row=mysqli_query($con,$Query);
$Data=mysqli_fetch_array($Row);
?>

<div class="container">
    <div class="" style="background-color:#ffc299;border-radius: 29px 20px;border:4px groove blue;">
        <form action="" method="post">
            <table class="table">
                <tr>
                    <th colspan="2" class="text-center" style="font-size:30px;font-family:timesnewroman">Update Quantity</th>
                </tr>

                <tr>
                <input type="hidden" name="CartItemId" value="<?php echo $Data["Cart_Id"]?>">
                    <td>Quanity</td>
                    <td>
                        <input type="number" name="Quantity" value="<?php echo $Data["Quantity"]?>" id="" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                            <input type="submit" value="Update" name="BtnCartUpdate" class="btn btn-danger col-md-offset-5" style="border-radius: 50px 20px; width:150px; background-color:black;">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
if(isset($_POST['BtnCartUpdate']))
    {
        $ItemUpdateId=$_POST['CartItemId'];
        $Quantity=$_POST['Quantity'];
        $Query="UPDATE cart set Quantity='$Quantity' where Cart_Id='$ItemUpdateId'";
        $Run=mysqli_query($con,$Query);
        if($Run==true)
        {
        echo "<script>
        alert('Item Updated From Cart Successfully');
        window.location.href='Cart.php';
        </script>";
        }
        else
        {
            echo "<script>
            alert('Item Not Updated From Cart Successfully');
            </script>";     
        }
}
?>
<?php
include('Footer.php');
?>
</body>
</html>