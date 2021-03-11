<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <title>Document</title>
</head>
<body>
<?php



include("dbconnection.php");
$query = "SELECT * FROM categories";
$Row=mysqli_query($con,$query);
$TotalRow=mysqli_num_rows($Row);

?>
<table class="table" id="myTable">
    <tr>
        <th>Category Id</th>
        <th>Category Name</th>
    	<th>Edit</th>
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
        <td width='10%'>
        <button type='button' name='edit' class='btn btn-primary btn-xs edit' id='".$data[0]."'>Edit</button>
		</td>
		<td width='10%''>
				<button type='button' name='delete' class='btn btn-danger btn-xs delete' id='".$data["Cat_Id"]."'>Delete</button>
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

<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>
</html>
