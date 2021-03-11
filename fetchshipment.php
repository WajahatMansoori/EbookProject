<?php

include("dbconnection.php");
$query = "SELECT * FROM shipping";
$Row=mysqli_query($con,$query);
$TotalRow=mysqli_num_rows($Row);

?>
<table class="table">
    <tr>
        <th>Shipment Id</th>
        <th>Shipment Price</th>
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
				<button type='button' name='delete' class='btn btn-danger btn-xs delete' id='".$data[0]."'>Delete</button>
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