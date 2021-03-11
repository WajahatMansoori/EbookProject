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
    <h3 class="text-center" style="font-size:45px;font-family:timesnewroman;background-color:black;color:white;font-weight:bold;">Essay List</a></h3><br />
			<br />
			<div align="right" style="margin-bottom:5px;">
			<button type="button" name="add" id="add_Essay" class="btn btn-success btn-xs">Add</button>
			</div>
			<div class="" id="user_data">
				
			</div>
			<br />
		<!-- </div> -->
		
		<div id="user_dialog" title="Add Data">
			<form method="post" id="user_form">
				<div class="form-group">
					<label>Essay Topic</label>
					<input type="text" name="essay_topic" id="essay_topic" class="form-control" />
					<span id="error_essay_topic" class="text-danger"></span>
				</div>

                <div class="form-group">
					<label>Essay Description</label>
					<input type="text" name="essay_description" id="essay_description" class="form-control" />
					<span id="error_essay_description" class="text-danger"></span>
				</div>
			
				<div class="form-group">
					<input type="hidden" name="action" id="action" value="insert" />
					<input type="hidden" name="hidden_id" id="hidden_id" />
					<input type="submit" name="form_action" id="form_action" class="btn btn-info col-md-offset-4" value="Insert" />
				</div>
			</form>
		</div>
		
		<div id="action_alert" title="Action">
			
		</div>
		
		<div id="delete_confirmation" title="Confirmation">
		<p>Are you sure you want to Delete this data?</p>
		</div>

    </div>
</div

</body>
</html>

<script>  
$(document).ready(function(){  

	load_data();
    
	function load_data()
	{
		$.ajax({
			url:"fetchEssay.php",
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
	
	$('#add_Essay').click(function(){
		$('#user_dialog').attr('title', 'Add Data');
        $('#user_dialog').css('background-color','aqua');
        $('#form_action').css('background-color','black');
        $('#form_action').css('width','100px')
        $('#error_essay_topic').css('font-weight','bold');
        $('#error_essay_description').css('font-weight','bold');
		$('#action').val('insert_essay');
		$('#form_action').val('Insert');
		$('#user_form')[0].reset();
		$('#form_action').attr('disabled', false);
		$("#user_dialog").dialog('open');
	});
	
	$('#user_form').on('submit', function(event){
		event.preventDefault();
		var error_essay_topic = '';
        var error_essay_description = '';
		if($('#essay_topic').val() == '')
		{
			error_essay_topic = '*This Feild is Required';
			$('#error_essay_topic').text(error_essay_topic);
			$('#essay_topic').css('border-color', '#cc0000');
		}
		else
		{
			error_essay_topic = '';
			$('#error_essay_topic').text(error_essay_topic);
			$('#essay_topic').css('border-color', '');
		}

        if($('#essay_description').val() == '')
		{
			error_essay_description = '*This Feild is Required';
			$('#error_essay_description').text(error_essay_description);
			$('#essay_description').css('border-color', '#cc0000');
		}
		else
		{
			error_essay_description = '';
			$('#error_essay_description').text(error_essay_description);
			$('#essay_description').css('border-color', '');
		}
	
		
		if(error_essay_topic != '' || error_essay_description!='')
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
		var action = 'fetch_single_Essay';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#essay_topic').val(data.Essay_Topic);
				$('#essay_description').val(data.Essay_Description);
				$('#user_dialog').attr('title', 'Edit Data');
                $('#user_dialog').css('background-color','aqua');
                $('#form_action').css('background-color','black');
				$('#action').val('update_Essay');
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
				var action = 'delete_essay';
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