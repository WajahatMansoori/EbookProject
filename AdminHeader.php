<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        	<!-- BOOTSTRAP STYLES-->
            <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   
</head>
<body>
<div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Panel</a> 
                
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        
   
    </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center" style="background-color:black">
                    <img src="assets/img/wajahat.jpg" class="user-image img-responsive"/>
					</li>
				
                <li style="background-color:white; font-weight:bold; font-size:20px;" class="text-center">
                <?php
    session_start();
    if(isset($_SESSION['UserName']))
    {
        echo  $_SESSION['UserName'];
    }
    else
    {
        header('location:login.php');
    }
    ?>
                </li>	
                    <li>
                        <a class="active-menu"  href="index.html"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a  href="categories.php"><i class="fa fa-plus-square fa-3x"></i> Add Category</a>
                    </li>
                    <li>
                        <a  href="fetchBook.php"><i class="fa fa-book fa-3x"></i> Add Book</a>
                    </li>
						   <li  >
                        <a   href="AddEssay.php"><i class="fa fa-plus-square fa-3x"></i> Add Essay</a>
                    </li>	
                      <li  >
                        <a  href="AddShipping.php"><i class="fa fa-truck fa-3x"></i> Add Shippment</a>
                    </li>
                    <li  >
                        <a  href="CustomerViewAjax.php"><i class="fa fa-edit fa-3x"></i> Registered Customer </a>
                    </li>				
					
                    <li  >
                        <a  href="ViewOrder.php"><i class="fa fa-edit fa-3x"></i> Order List </a>
                    </li>	
					                   
                  
                 
                </ul>
               
            </div>
            
        </nav>  

</body>
</html>