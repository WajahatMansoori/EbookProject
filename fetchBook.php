<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .fixed-table{
            table-layout:fixed;
        }
    </style>
</head>
<body>
<?php
    include('AdminHeader.php');
include("dbconnection.php");
$query = "SELECT * FROM books";
$Row=mysqli_query($con,$query);
$TotalRow=mysqli_num_rows($Row);

?>

<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    <a href="AddBook.php" class="btn btn-primary">Add Book</a> <br><br>
    <table class="table table-bordered table-condensed ">
        <tr style="background-color:Black;color:white;">
            <th>Book Id</th>
            <th>Title</th>
            <th>Book Category</th>
            <th>Author</th>
            <th>Image</th>
            <th>PDF</th>
            <th>Description</th>
            <th>Price</th>
            <th>Shipping Id</th>
            <th>Delete</th>
        </tr>


    <?php
    if($TotalRow > 0)
    {
        while($data=mysqli_fetch_array($Row))
        {
        
            echo "<tr>
            <td>".$data[0]."</td>
            <td>".$data[1]."</td>
            <td>".$data[2]."</td>
            <td>".$data[3]."</td>
            <td>
            <img src='$data[4]' width='80' height='90' class=''>
            </td>
            <td>".$data[5]."</td>
            <td>".$data[6]."</td>
            <td>".$data[7]."</td>
            <td>".$data[8]."</td>
            <td width='10%'>
            <a href='DeleteBook.php?id=$data[0]' class='btn btn-danger btn-xs'>Delete</a> 
            </td>
            </tr>";
        }
    }
    else
    {
        echo "<tr>
        <td>No Rows Found</td>
        </tr>";
    }

    ?>
    </table>    
    </div>
</div>
</div>
</div>
</body>
</html>
