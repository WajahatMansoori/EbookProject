<?php
include('dbconnection.php');
if(isset($_POST['btnAddBook']))
{
    $Title=$_POST['book_title'];
    $Category=$_POST['book_category'];
    $Author_Name=$_POST['author_name'];
    
    $Image_Name=$_FILES['book_image']['name'];
    $Image_Tmp_Name=$_FILES['book_image']['tmp_name'];
    $Image_Folder="BookImage/". $Image_Name;
    
    $PDF_Name=$_FILES['book_pdf']['name'];
    $PDF_Tmp_Name=$_FILES['book_pdf']['tmp_name'];
    $PDF_Folder="PDF/". $PDF_Name;
    
    $Book_Description=$_POST['book_description'];
    $Book_Price=$_POST['book_price'];
    $Book_Shipping=$_POST['book_shipping'];

    $Category_Name=$_POST['book_category'];
    $Query2="SELECT Cat_Name from categories where Cat_Id=$Category_Name";
    $Run2=mysqli_query($con,$Query2);
    while($data=mysqli_fetch_array($Run2))
    {
        $Cat=$data['Cat_Name'];
    }

    $Query="INSERT into books (Book_Title,Book_Category,Book_Author,Book_Image,Book_PDF,Book_Description,Book_Price,Book_Shipping) values ('$Title','$Cat','$Author_Name','$Image_Folder','$PDF_Folder','$Book_Description','$Book_Price','$Book_Shipping')";
    $Run=mysqli_query($con,$Query) or die("Query Failed: ".mysqli_error($con));
    if($Run==true)
    {
        echo "<script>
        alert('Book Added Successfully');
        window.location.href='fetchBook.php';
        </script>";
        move_uploaded_file($Image_Tmp_Name,$Image_Folder);
        move_uploaded_file($PDF_Tmp_Name,$PDF_Folder);
    }
    else
    {
        echo "<script>
        alert('Unfortunately Fail to Add a Book');
        
        </script>";
    }
}
?>