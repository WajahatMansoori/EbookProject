<?php
//include('dbconnection.php');
include("database_connection.php");

if(isset($_POST['action']))
{
	//category insertion
	if($_POST['action']=='insert_cat')
	{
		$Query="INSERT into categories (Cat_Name) values ('". $_POST["category_name"]."')";
		$Run=$con->prepare($Query);
		$Run->execute();
		echo "<p>Data Inserted</p>";
	}
	if($_POST['action']=='delete_Cat')
	{
		$Query="DELETE FROM categories where Cat_Id='". $_POST["id"]."'";
		$Run=$con->prepare($Query);
		$Run->execute();
	}


	if($_POST["action"] == "fetch_single")
	{
		$query = "
		SELECT * FROM categories WHERE Cat_Id = '".$_POST["id"]."'
		";
		$statement = $con->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['Cat_Name'] = $row['Cat_Name'];	
		}
		echo json_encode($output);
	}

	if($_POST["action"] == "update")
	{
		$Query="UPDATE categories set Cat_Name='". $_POST["category_name"]."' where Cat_Id='". $_POST["hidden_id"]."'";
		$Run = $con->prepare($Query);
		$Run->execute();
		echo '<p>Data Updated</p>';
	}

	if($_POST["action"]=="fetch_single_Cus")
	{
		$Query="SELECT * from customer where Cus_Id='". $_POST["id"]."'";
		$Row=$con->prepare($Query);
		$Row->execute();
		$result=$Row->fetchAll();
		foreach($result as $data)
		{
			$output['Cus_Name']=$data['Cus_Name'];
			$output['Email']=$data['Email'];
			$output['Pass']=$data['Pass'];
			$output['Phone']=$data['Phone'];
			$output['Cus_Address']=$data['Cus_Address'];
			$output['City']=$data['City'];
		}
		echo json_encode($output);
	}

	if($_POST["action"]=="update_cus")
	{
		$Query="UPDATE customer set Cus_Name='". $_POST["name"]."', Email='". $_POST["email"]."', Pass='". $_POST["password"]."', Phone='". $_POST["phone"]."', Cus_Address='". $_POST["address"]."', City='". $_POST["city"]."'";
		$Run=$con->prepare($Query);
		$Run->execute();
		echo '<p>Data Updated</p>';
	}

	if($_POST["action"]=="delete_Cus")
	{
		$Query="DELETE from customer where Cus_Id='". $_POST["id"]."'";
		$Run=$con->prepare($Query);
		$Run->execute();
		echo '<p>Data Deleted</p>';
	}

	if($_POST['action']=='insert_cus')
	{
		$Query="INSERT into customer (Cus_Name,Email,Pass,Phone,Cus_Address,City) values ('". $_POST["name"]."','". $_POST["email"]."','". $_POST["password"]."','". $_POST["phone"]."','". $_POST["address"]."','". $_POST["city"]."')";;
		$Run=$con->prepare($Query);
		$Run->execute();
		echo "<p>Data Inserted</p>";
	}

	if($_POST['action']=='insert_shipment')
	{
		$Query="INSERT into shipping (Shipping_Charges) values ('". $_POST["shipping_price"]."')";
		$Run=$con->prepare($Query);
		$Run->execute();
		echo '<p>Shipment Price Added Successfully</p>';
	}

	if($_POST['action']=='delete_shipment')
	{
		$Query="DELETE from shipping where shipping_Id='". $_POST["id"]."'";
		$Run=$con->prepare($Query);
		$Run->execute();
		echo '<p>Data Deleted</p>';
	}

	if($_POST['action']=='fetch_single_Shipment')
	{
		$Query="SELECT *from shipping where Shipping_Id='". $_POST["id"]."'";
		$Row=$con->prepare($Query);
		$Row->execute();
		$Result=$Row->fetchAll();
		foreach($Result as $data)
		{
			$output['Shipping_Charges']=$data['Shipping_Charges'];
		}
		echo json_encode($output);
	}

	if($_POST['action']=='update_Shipment')
	{
		$Query="UPDATE shipping set Shipping_Charges='". $_POST["shipping_price"]."' where Shipping_Id='". $_POST["hidden_id"]."'";
		$Run=$con->prepare($Query);
		$Run->execute();
		echo '<p>Data Updated!!</p>';
	}

	if($_POST['action']=='insert_essay')
	{
		$Query="INSERT into essaytbl (Essay_Topic,Essay_Description) values ('". $_POST["essay_topic"]."','". $_POST["essay_description"]."')";
		$Run=$con->prepare($Query);
		$Run->execute();
		echo '<p>Essay Topic Added Successfully</p>';
	}

	if($_POST['action']=='delete_essay')
	{
		$Query="DELETE from essaytbl where Essay_Id='". $_POST["id"]."'";
		$Run=$con->prepare($Query);
		$Run->execute();
		echo '<p>Data Delete!!</p>';
	}

	if($_POST['action']=='fetch_single_Essay')
	{
		$Query="SELECT *from essaytbl where Essay_Id='". $_POST["id"]."'";
		$Row=$con->prepare($Query);
		$Row->execute();
		$Result=$Row->fetchAll();
		foreach($Result as $Data)
		{
			$Output['Essay_Topic']=$Data['Essay_Topic'];
			$Output['Essay_Description']=$Data['Essay_Description'];
		}
		echo json_encode($Output);
	}
	if($_POST['action']=='update_Essay')
	{
		$Query="UPDATE essaytbl set Essay_Topic='". $_POST["essay_topic"]."',Essay_Description='". $_POST["essay_description"]."' where Essay_Id='". $_POST["hidden_id"]."'";
		$Run=$con->prepare($Query);
		$Run->execute();
		echo '<p>Data Updated!!</p>';
	}

}


?>