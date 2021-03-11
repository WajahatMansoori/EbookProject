`<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Panda Login</title>
  <link rel="stylesheet" href="panda-login/css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<?php
include('dbconnection.php');
?>
<div class="panda">
  <div class="ear"></div>
  <div class="face">
    <div class="eye-shade"></div>
    <div class="eye-white">
      <div class="eye-ball"></div>
    </div>
    <div class="eye-shade rgt"></div>
    <div class="eye-white rgt">
      <div class="eye-ball"></div>
    </div>
    <div class="nose"></div>
    <div class="mouth"></div>
  </div>
  <div class="body"> </div>
  <div class="foot">
    <div class="finger"></div>
  </div>
  <div class="foot rgt">
    <div class="finger"></div>
  </div>
</div>
<form action="" method="post" class="wrong-entry">
  <div class="hand"></div>
  <div class="hand rgt"></div>
  <h1>Admin Login</h1>
  <div class="form-group">
    <input required="required" class="form-control" name="UserName"/>
    <label class="form-label">Username    </label>
  </div>
  <div class="form-group">
    <input id="password" type="password" required="required" name="Password" class="form-control"/>
    <label class="form-label">Password</label>
    <!-- <p class="alert">Invalid Credentials..!!</p> -->
    <button class="btn" name="LoginBtn">Login </button>
  </div>
</form>

<?php
if(isset($_POST['LoginBtn']))
{
    $UserName=$_POST['UserName'];
    $Password=$_POST['Password'];

    $Query="select *from Admin where UserName='$UserName' and Password='$Password'";

    $Run=mysqli_query($con,$Query) or die("Query Unsuccessful: ".mysqli_error($con));

    $Total=mysqli_num_rows($Run);

    session_start();
    if($Total==1)
    {
        $_SESSION['UserName']=$UserName;
        header('location:categories.php');
    }
    else
    {
        // echo "<p class='alert'>Invalid Credentials..!!</p>";
        echo "<script>
        alert('Incorrect Username or Password');
        window.location.href='login.php';
        </script>";
    }
}
?>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="panda-login/js/script.js"></script>
  

</body>
</html>
