<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

<!-- Bootstrap -->
<link type="text/css" rel="stylesheet" href="FrontEnd_Template/css/bootstrap.min.css"/>

<!-- Slick -->
<link type="text/css" rel="stylesheet" href="FrontEnd_Template/css/slick.css"/>
<link type="text/css" rel="stylesheet" href="FrontEnd_Template/css/slick-theme.css"/>

<!-- nouislider -->
<link type="text/css" rel="stylesheet" href="FrontEnd_Template/css/nouislider.min.css"/>

<!-- Font Awesome Icon -->
<link rel="stylesheet" href="FrontEnd_Template/css/font-awesome.min.css">

<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="FrontEnd_Template/css/style.css"/>


</head>
<body>

<header>
			<!-- TOP HEADER -->
			<div id="top-header" style="background-color:#ff7f50;">
				<div class="container">
					<ul class="header-links pull-right">
						<li><?php
						session_start();
							include "dbconnection.php";


							if(isset($_SESSION['UserName']))
							{
							// 	$Query = "SELECT Cus_Name FROM customer WHERE Cus_Name='$_SESSION[UserName]'";
                            //    $Row = mysqli_query($con,$Query);
                            //     $Data=mysqli_fetch_array($Row);

								echo '
                                  <li><a href="#"><i class="fas fa-user"></i> Welcome - '. $_SESSION['UserName'].'</a></li> 
                                  <li><a href="LogoutCus.php"><i class="fas fa-sign-out-alt" ></i>Log out</a></li>     
							';
							}
							else
							{
								echo '
								<li><a href="CustomerLogin.php"><i class="fas fa-sign-in"></i> Login/Register</a></li>
								<li><a href="login.php"><i class="fas fa-sign-in"></i> Admin Login</a></li>';
							}
						?>
						</li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header" style="background-color:#ff7f50;">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="Index.php" class="logo">
									<img src="./img/logo01.png" style="width: 200px;">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<!-- <div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select" style="width: 190px;">
										<option value="">All Categories</option>
										<?php 
                    					include("dbconnection.php");
                   						$q="select * from categories";
                    					$cmd=mysqli_query($con,$q);
                    					while ($r=mysqli_fetch_assoc($cmd))
                     					{
                    
                   						?>
                   						<option value="?id=<?= $r["Cat_Id"] ?>"><?= $r["Cat_Name"] ?></option>
                						
                						<?php } ?>
									 </select>
									<input class="input" placeholder="Search here" style="width: 150px;">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>  -->
						<!-- /SEARCH BAR -->

<!-- cart code -->
						<?php
						include "dbconnection.php";
						if(isset($_SESSION['UserName']))
						{
							?>
						<div class="col-md-09 clearfix">
							<div class="header-ctn">
								<!-- Cart -->

								<div>
									<a href="Cart.php">
										<i class="fas fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty"></div>
									</a>
									
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fas fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
							<?php
							
						}
						?>

						
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation" style="background-color:black;">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav section-tab-nav tab-nav">
						<li class="active" ><a href="Index.php" style="color:white">Home</a></li>
						<?php 
                    include("dbconnection.php");
                    $Query="select * from categories";
                    $Row=mysqli_query($con,$Query);
                    while ($Data=mysqli_fetch_assoc($Row))
                     {
                    
                   ?>

                <li><a href="Books.php?id=<?php echo $Data["Cat_Id"] ?>" style="color:white"><?php echo $Data["Cat_Name"] ?></a></li>
				<?php
			 } 
			 ?>

                <?php
                include("dbconnection.php");
                if(isset($_SESSION['C_ID']))
                {
                	echo '<li><a href="Competition.php" style="color:white">Competitions</a></li>';
                }
                ?>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->



</body>
</html>