<?php
include('dbconnection.php');
include('Header.php');
$Query="select *from books";
if(isset($_GET['SearchBtn']))
{
    $SearchBy=$_GET['SearchList'];
    $SearchText=$_GET['search'];

    if($SearchBy=="Id")
    {
        $Query="select * from books where Std_Id = '$SearchText'";
    }

    else if($SearchBy=="Name")
    {
        $Query="select * from books where Book_Title = '$SearchText'";
    }
    // else if($SearchBy=="Address")
    // {
    //     $Query="select * from books where Address = '$SearchText'";
    // }
    else{
        echo "<script>
        alert('Please Select Any Feild');
        window.location.href='view.php';
        </script>";
    }


$row=mysqli_query($con,$Query);
$TotalRows=mysqli_num_rows($row);

if($TotalRows!=0){
?>

<table id="MyTbl" class="table table-bordered table-striped" style="color:black;font-weight:bold;">
    
    <tr>
    <th colspan=6 class="text-center bg-danger text-white" style="font-size:30px; background-color:black;color:white">Search </th>
    
    </tr>
    <tr>
		<?php 
                    include("dbconnection.php");
                    $Query="select * from categories";
                    $Row=mysqli_query($con,$Query);
                    $Data=mysqli_fetch_assoc($Row)
                     
                    
                   ?>
    <td colspan="6"><a href="index.php" style="font-size:20px;"> <div class="form-group">  <a href="Books.php?id=<?php echo $Data["Cat_Id"] ?>" class="float-right btn btn-success">Back To Previous Page</a> </div></a>
 
    </td>
    </tr>
    <tr class="text-center">
    <!-- <th class="text-center">ID</th> -->
    <th class="text-center">Book Title</th>
    <th class="text-center">Category</th>
    <th class="text-center">Book Image</th>
    <th class="text-center">Price</th>
    
    </tr>
    

    <?php
    while($data=mysqli_fetch_array($row)){
       echo "<tr class='text-center' style='color:Blue' >
       
       <td>". $data[1]."</td>
       <td>". $data[2]."</td>
       <td>
        <img src='$data[4]' width='120' height='120' class='img-thumbnail'>
       </td>
	   <td>". $data[7]."</td>

       
       </tr>";
       
    }
    
}


 
else{
    echo "<script>
    alert('No Rows Found!!');
    </script>";
}

}
?>
</table>
<?php
include('Footer.php');
?>