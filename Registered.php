<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--===============================================================================================-->	
<link rel="icon" type="FEndRegistration/image/png" href="FEndRegistration/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="FEndRegistration/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="FEndRegistration/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="FEndRegistration/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="FEndRegistration/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="FEndRegistration/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="FEndRegistration/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="FEndRegistration/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="FEndRegistration/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="FEndRegistration/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="FEndRegistration/css/util.css">
	<link rel="stylesheet" type="text/css" href="FEndRegistration/css/main.css">

    <title>Document</title>
</head>
<body style="background-color: #999999;">

<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('FEndRegistration/images/bg-01.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form action="insertCustomerRecord.php" method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-59">
						Sign Up
					</span>

					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">Name</span>
						<input class="input100" type="text" name="name" placeholder="Enter Your Name">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="someoe@gmail.com...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="*************">
						<span class="focus-input100"></span>
					</div>
	
					<div class="wrap-input100 validate-input" data-validate="Phone Number is required">
						<span class="label-input100">Phone Number</span>
						<input class="input100" type="text" name="phone" placeholder="Phone Number...">
						<span class="focus-input100"></span>
					</div>


					
					<div class="wrap-input100 validate-input" data-validate="Address is required">
						<span class="label-input100">Address</span>
						<input class="input100" type="text" name="address" placeholder="Address...">
						<span class="focus-input100"></span>
					</div>

					
					<div class="wrap-input100 validate-input" data-validate="City is required">
						<span class="label-input100">City</span>
						<input class="input100" type="text" name="city" placeholder="City...">
						<span class="focus-input100"></span>
					</div>

					

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="RegBtn">
								Sign Up
							</button>
						</div>

						<a href="#" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign in
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="FEndRegistration/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="FEndRegistration/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="FEndRegistration/vendor/bootstrap/js/popper.js"></script>
	<script src="FEndRegistration/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="FEndRegistration/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="FEndRegistration/vendor/daterangepicker/moment.min.js"></script>
	<script src="FEndRegistration/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="FEndRegistration/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="FEndRegistration/js/main.js"></script>


<!-- <form action="insertStudent.php" method="post">
    <table class="table table-striped text-primary font-weight-bold">
        <tr>
            <th colspan="2" class="text-center bg-danger text-white" style="font-size:40px;text-decoration:underline;">Registration Form</th>
        </tr>
        
        <tr>
            <td>Name</td>
            <td>
            <input type="text" name="name" id="" class="form-control" placeholder="Enter Your Name">
            </td>
        </tr>

        <tr>
            <td>Password</td>
            <td>
            <input type="password" name="password" id="" class="form-control" placeholder="Enter Your Password">
            </td>
        </tr>

        <tr>
            <td colspan="2">
            <input type="submit" value="Sign Up" class="btn btn-outline-success offset-5 w-25" name="SubmitBtn">
            </td>
        </tr>
    </table>
    </form> -->


</body>
</html>