<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include('AdminHeader.php');
    include('dbconnection.php');
    ?>

<div id="page-wrapper" >
    <div id="page-inner">
        <h1 class="text-center" style="font-size:40px;background-color:black;color:white;">Add Book</h1>
        <form action="InsertBook.php" method="post" enctype="multipart/form-data">
            <table class="table">
            
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="book_title" id="" class="form-control">
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
                                while($Data=mysqli_fetch_array($Row))
                                {
                                    ?>
                                
                                <option value="<?php echo $Data["Cat_Id"] ?>">
                                    <?php echo $Data[1]?>
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
                        <input type="text" name="author_name" id="" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>Book Image</td>
                    <td>
                        <input type="file" name="book_image" id="" class="form-control">
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
                        <textarea name="book_description" id="" cols="30" rows="10" class="form-control"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Book Price</td>
                    <td>
                        <input type="number" name="book_price" id="" class="form-control">
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