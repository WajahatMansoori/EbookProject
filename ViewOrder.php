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
        include('AdminHeader.php');
        include('dbconnection.php');
        $Query="SELECT *from orders";
        $Row=mysqli_query($con,$Query);
        $TotalRow=mysqli_fetch_array($Row);
?>
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

<?php
        if($TotalRow>0)
        {
            ?>
        <table class="table">
            <tr>
                <th colspan="10" class="text-center" style="font-size:30px;background-color:black;color:white;">Order Records</th>
            </tr>
            <tr>
                <th>Order Id</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>City</th>
                <th>Method</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
                while($data=mysqli_fetch_array($Row))
                {
                    echo "<tr>
                    <td>". $data[0]."</td>
                    <td>". $data[1]."</td>
                    <td>". $data[2]."</td>
                    <td>". $data[3]."</td>
                    <td>". $data[4]."</td>
                    <td>". $data[5]."</td>
                    <td>". $data[6]."</td>
                    <td>". $data[7]."</td>
                    
                    <td width='10%''>
                            <a href='OrderDelete.php?id=$data[0]'  name='deleteOrder' class='btn btn-danger btn-xs delete' >Delete</a>
                    </td>
        
                    </tr>";
                }
            ?>

        </table>
            <?php
        }
    ?>
                    </div>
                </div>
        </div>
</div>
    
  
</body>
</html>
