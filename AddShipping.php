<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="js/jquery.min.js"></script>  
	<script src="js/jquery-ui.js"></script>

    <title>Document</title>
</head>
<body>
<?php
    include('AdminHeader.php');
 ?>
    

    <div id="page-wrapper" >
<div id="page-inner">
    <!-- <div class="row"> -->
        <!-- <div class="col-md-12"> -->

        <!-- <div class="container">  -->
			<br />
			
			<h3 class="text-center" style="font-size:45px;font-family:timesnewroman;background-color:black;color:white;font-weight:bold;">Shipment Price List</a></h3><br />
			<br />
			<div align="right" style="margin-bottom:5px;">
			<button type="button" name="add" id="add_Shipment" class="btn btn-success btn-xs">Add</button>
			</div>
			<div class="" id="user_data">
				
			</div>
			<br />
		<!-- </div> -->
		
		<div id="user_dialog" title="Add Data">
			<form method="post" id="user_form">
				<div class="form-group">
					<label>Shipping Price</label>
					<input type="text" name="shipping_price" id="shipping_price" class="form-control" />
					<span id="error_shipping_price" class="text-danger"></span>
				</div>
			
				<div class="form-group">
					<input type="hidden" name="action" id="action" value="insert" />
					<input type="hidden" name="hidden_id" id="hidden_id" />
					<input type="submit" name="form_action" id="form_action" class="btn btn-info" value="Insert" />
				</div>
			</form>
		</div>
		
		<div id="action_alert" title="Action">
			
		</div>
		
		<div id="delete_confirmation" title="Confirmation">
		<p>Are you sure you want to Delete this data?</p>
		</div>

</div>		
</div>

</body>
</html>

<script>  
$(document).ready(function(){  

	load_data();
    
	function load_data()
	{
		$.ajax({
			url:"fetchshipment.php",
			method:"POST",
			success:function(data)
			{
				$('#user_data').html(data);
			}
		});
	}
	
	$("#user_dialog").dialog({
		autoOpen:false,
		width:400
	});
	
	$('#add_Shipment').click(function(){
		$('#user_dialog').attr('title', 'Add Data');
		$('#action').val('insert_shipment');
		$('#user_dialog').css('background-color','aqua');
        $('#form_action').css('background-color','black');
        $('#form_action').css('width','100px')
        $('#error_shipping_price').css('font-weight','bold');
		$('#form_action').val('Insert');
		$('#user_form')[0].reset();
		$('#form_action').attr('disabled', false);
		$("#user_dialog").dialog('open');
	});
	
	$('#user_form').on('submit', function(event){
		event.preventDefault();
		var error_shipping_price = '';
		if($('#shipping_price').val() == '')
		{
			error_shipping_price = '*Shipment Price is required';
			$('#error_shipping_price').text(error_shipping_price);
			$('#shipping_price').css('border-color', '#cc0000');
		}
		else
		{
			error_shipping_price = '';
			$('#error_shipping_price').text(error_shipping_price);
			$('#shipping_price').css('border-color', '');
		}
	
		
		if(error_shipping_price != '')
		{
			return false;
		}
		else
		{
			$('#form_action').attr('disabled', 'disabled');
			var form_data = $(this).serialize();
			$.ajax({
				url:"action.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					$('#user_dialog').dialog('close');
					$('#action_alert').html(data);
					$('#action_alert').dialog('open');
					$('#action_alert').css('background-color','#ADFF2F');
                    $('#action_alert').css('color','black');
                    $('#action_alert').css('font-weight','bold');
					load_data();
					$('#form_action').attr('disabled', false);
				}
			});
		}
		
	});
	
	$('#action_alert').dialog({
		autoOpen:false
	});
	
	
    $(document).on('click', '.edit', function(){
		var id = $(this).attr('id');
		var action = 'fetch_single_Shipment';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#shipping_price').val(data.Shipping_Charges);
				$('#user_dialog').attr('title', 'Edit Data');
				$('#user_dialog').css('background-color','aqua');
                $('#form_action').css('background-color','black');
				$('#action').val('update_Shipment');
				$('#hidden_id').val(id);
				$('#form_action').val('Update');
				$('#user_dialog').dialog('open');
			}
		});
	});
	$('#delete_confirmation').dialog({
		autoOpen:false,
		modal: true,
		buttons:{
			Ok : function(){
				var id = $(this).data('id');
				var action = 'delete_shipment';
				$.ajax({
					url:"action.php",
					method:"POST",
					data:{id:id, action:action},
					success:function(data)
					{
						$('#delete_confirmation').dialog('close');
						$('#action_alert').html(data);
						$('#action_alert').css('background-color','red');
                        $('#action_alert').css('color','white');
                        $('#action_alert').css('font-weight','bold');
						$('#action_alert').dialog('open');
						load_data();
					}
				});
			},
			Cancel : function(){
				$(this).dialog('close');
			}
		}	
	});
	
	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		$('#delete_confirmation').data('id', id).dialog('open');
		$('#delete_confirmation').css('background-color','red');
        $('#delete_confirmation').css('color','white');
        $('#delete_confirmation').css('font-weight','bold');
	});
	
});  
</script>