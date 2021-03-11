<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="CountdownLibrary/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="CountdownLibrary/TimeCircles/TimeCircles.js"></script>
    <link rel="stylesheet" type="text/css" href="CountdownLibrary/TimeCircles/TimeCircles.css">

    <title>Document</title>
</head>
<body>
    <?php
        include('Header.php');
        include('dbconnection.php');
        
    ?>

<script type="text/javascript">
    $(function () {  
//     $("#count-down").TimeCircles();
	//	$("#count-down").TimeCircles().end().fadeOut(); 
		
		
$(".example.stopwatch").TimeCircles();
// $(".start").click(function(){ $(".example.stopwatch").TimeCircles().start(); });
// $(".stop").click(function(){ $(".example.stopwatch").TimeCircles().stop(); });
// $(".restart").click(function(){ $(".example.stopwatch").TimeCircles().restart(); });
    });
</script>

    <?php
        $Query="SELECT *from timer";
        $Run=mysqli_query($con,$Query);
        $Data=mysqli_fetch_array($Run);
        $record=$Data[1];
?>
<div class="container example stopwatch" data-timer="<?php echo $record?>"></div>

<?php

if(isset($_SESSION['UserName']))
{
    ?>
<div class="section">
	<div class="container">
		<div class="section-title" style="text-align: center;">
			<h1 class="title"style="background-color:Black;color:white;text-decoration:underline;">Essay Competition</h1>
		</div>

		<div class="row">
			<div class="col-lg-1"></div>

			<div class="col-lg-5">
				<table class="table table-striped table-bordered dataTable no-footer" style="background-color:#99ffeb">
					<thead>
					<tr>
						<th class="title sorting_asc" style="text-align: center; color: #D10024; font-size:35px;text-decoration:underline" >Rules & Regulations</th>
					</tr>
				</thead>

				<tbody style="color:blue;font-weight:bold;font-family:timesnewroman">
					<tr>
						<td>1. Your essay should be between the word limit given.</td>
					</tr>
					<tr>
						<td>2. Your essay should be from the topics listed.</td>
					</tr>
					<tr>
						<td>3. You should upload your essay either as a PDF file or a word document. No other format will be accepted.</td>
					</tr>
					<tr>
						<td>4. You will only have 3 hours to upload your essay once you are on the competition page.</td>
					</tr>
					<tr>
						<td>5. Each participants essay will be judged on the basis of the clarity of writing, quality of thinking and ideas incorporated.</td>
					</tr>
				</tbody>
				</table>
			</div>

			<div class="col-lg-5">
				<table class="table table-striped table-bordered dataTable no-footer" style="background-color:#99ffeb">
					<thead>
					<tr>
						<th class="title sorting_asc" style="text-align: center; color: #D10024;font-size:35px;text-decoration:underline">Prizes</th>
					</tr>
				</thead>

				<tbody style="color:blue;font-weight:bold;font-family:timesnewroman">
					<tr>
						<td>1. Certificate of participation. (All participants)</td>
					</tr>
					<tr>
						<td>2. Winner: Fully funded trip to Thailand.</td>
					</tr>
					<tr>
						<td>3. First Runner Up: Laptop.</td>
					</tr>
					<tr>
						<td>4. Second Runner Up: Rs 5000.</td>
					</tr>
				</tbody>
				</table>
			</div>

			<div class="col-lg-1"></div>
		</div>
	</div>
</div>

<div class="section">
<div class="container">
	<table class="table  table-bordered dataTable no-footer" style="background-color:#ddccff;">
		<div class="section-title" style="text-align: center;">
			<h5 class="title">Please choose any of the topics given below and upload your essay to take part in the competition.</h5>
		</div>
		<thead>
			<tr>
				<th colspan="2" style="text-align: center;font-size:35px;text-decoration:underline;font-family:timesnewroman">Topics & Description</th>
			</tr>
		</thead>
		<tbody>
	
			<?php  
                include("dbconnection.php");
                $Query="SELECT *from essaytbl";
                $Run=mysqli_query($con,$Query);
                //$cmd=mysqli_query($con,"select * from essaytbl");
                while ($Data=mysqli_fetch_array($Run))
                    { ?>
                    <tr style="font-weight:bold;color:blue;">
                        <td style="text-align: center;"><?php echo $Data["Essay_Topic"]; ?></td>
                        <td style="text-align: center;"><?php echo $Data["Essay_Description"]; ?></td>
                    </tr>    
            <?php } ?>
		</tbody>
	</table>
</div>
</div>

    <?php
	
}
?>

<?php

if(isset($_POST["btnUpload"]))
{
  include ("dbconnection.php");

  $topic = $_POST["topic"];

  $essay = $_FILES["essay"]["name"];
  $Folder = "Essay/". $essay;

  $query = "insert into uploaded_essay (Topic, Essay) value ('$topic', '$Folder')";
  $Run = mysqli_query($con,$query);

  if ($Run==true)
   {
        echo "<script>
        alert('Essay Submitted Successfully');
        </script>" ;
   }
  else 
  {
        echo "<script>
        alert('Essay Not Submitted Successfully');
        </script>" ;
  }
}
?>

<div class="section">
	<div class="">

		<div class="section-body" >
			<div class="card"  >
              <div class="card-body col-md-8 col-md-offset-2" style="border:4px groove blue" >
                  <!-- Credit Card -->
                  <div id="pay-invoice">
                      <div class="card-body" style="margin:20px;">
                          <div class="card-title" >
                            <form method="post" enctype="multipart/form-data" >
                            <h1 class="text-center" style="background-color:blue;color:white">Essay Submission Form</h1>                             
                            </div>

                                 <div class="form-group">
                                    <label class="control-label mb-1" style="color:blue">Topic</label>
                                    <select name="topic" id="select" class="form-control">
                                        <option value="">--Select--</option>
                                            <?php 
                                                include("dbconnection.php");
                                                $q="select * from essaytbl";
                                                $cmd=mysqli_query($con,$q);
                                                while ($r=mysqli_fetch_assoc($cmd))
                                                {
                                                
                                            ?>
                                        <option value="<?php echo $r["Essay_Id"] ?>"><?php echo $r["Essay_Topic"] ?></option>

                                            <?php 
                                                }
                                            ?>
                                    </select>
                                            </div>


                                    <div class="form-group">
                                        <label class="control-label mb-1" style="color:blue">Essay</label>
                                        <input type="file" name="essay" required class="form-control" id="essay" style="height: 100px;" >
                                    </div>
                                  
                                    <div>
                                        <button name="btnUpload" type="submit" class="btn btn-lg btn-danger btn-block">
                                        <i class="fas fa-arrow-up fa-sm"></i>&nbsp;
                                        <span id="payment-button-amount">Upload</span>
                                        </button>
                                    </div>
                            </form>
                      </div>
                  </div>

              </div>
          </div>
		</div>
		
	</div>
</div>


</body>
</html>