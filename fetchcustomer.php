<?php



include("dbconnection.php");
$query = "SELECT * FROM customer";
$Row=mysqli_query($con,$query);
$TotalRow=mysqli_num_rows($Row);

?>
<table class="table">
    <tr>
        <th>Customer Id</th>
        <th>Customer Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Phone</th>
        <th>Address</th>
        <th>City</th>
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
        <td>".$data[2]."</td>
        <td>".$data[3]."</td>
        <td>".$data[4]."</td>
        <td>".$data[5]."</td>
        <td>".$data[6]."</td>
        <td width='10%'>
        <button type='button' name='edit' class='btn btn-primary btn-xs edit' id='".$data["Cus_Id"]."'>Edit</button>
		</td>
		<td width='10%''>
				<button type='button' name='delete' class='btn btn-danger btn-xs delete' id='".$data["Cus_Id"]."'>Delete</button>
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