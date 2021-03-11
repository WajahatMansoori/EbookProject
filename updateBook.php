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
    
    $ID=$_GET['id'];
    $Query="SELECT *from books where Book_Id='$ID'";
    $Row=mysqli_query($con,$Query);
    $Data=mysqli_fetch_array($Row);

?>

<div id="page-wrapper" >
    <div id="page-inner">
        <h1 class="text-center" style="font-size:40px;background-color:black;color:white;">Add Book</h1>
        <form action="InsertBook.php" method="post" enctype="multipart/form-data">
            <table class="table">
            
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $Data[0];?>">
                        <input type="text" name="book_title" id="" value="<?php echo $Data[1];?>" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>Category</td>
                    <td>
                        <select name="book_category" id="" class="form-control">
                            <option value="">--Select Category--</option>
                            
                            
                            <?php
                                $Query="SELECT * from categories";
                                $Row=mysqli_query($con,$Query);
                                while($Data1=mysqli_fetch_array($Row))
                                {
                                    ?>
                                
                                <option value="<?php echo $Data1["Cat_Id"] ?>"
                                <?php
                                if($Data1['Cat_Name']=='Novels')
                                {
                                    echo "Selected";
                                }
                                ?>
                                >
                                    
                                </option>
                                    <?php
                                }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Author Name</td>
                    <td>
                        <input type="text" name="author_name" id="" value="<?php echo $Data[3];?>" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>Book Image</td>
                    <td>
                        <input type="file" name="book_image" id="" class="form-control">
                        <img src="<?php echo $Data[4]?>" width="80" height="90" alt="">
                    </td>
                </tr>

                <tr>
                    <td>Book PDF</td>
                    <td>
                        <input type="file" name="book_pdf" id="" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>Book Description</td>
                    <td>
                        <textarea name="book_description" value="<?php echo $Data[6];?>"> id="" cols="30" rows="10" class="form-control"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Book Price</td>
                    <td>
                        <input type="number" name="book_price" value="<?php echo $Data[7];?>"> id="" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>Shipping</td>
                    <td>
                        <select name="book_shipping" id="" class="form-control">
                            <option value="">--Select Shipping--</option>
                            <?php
                                $Query="SELECT *from shipping";
                                $Row=mysqli_query($con,$Query);
                                while($Data=mysqli_fetch_array($Row))
                                {
                                    ?>
                                    <option value="<?php echo $Data["Shipping_Id"]?>">
                                        <?php echo $Data["Shipping_Charges"]?>
                                    </option>
                                    <?php
                                }
                            ?>
                        </select>

                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="btnAddBook" value="Add" class="btn btn-dark col-md-offset-5" style="width:100px;background-color:red;color:white">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

</body>
</html>