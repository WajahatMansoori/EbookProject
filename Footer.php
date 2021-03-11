<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<footer id="footer" style="background-color:#ff7f50">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-4 col-xs-6">
							<div class="footer">
								<img src="img/logo01.png" style="width: 200px; margin-top: 30%;">
							</div>
						</div>

						<div class="col-md-4 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<?php 
                    include("dbconnection.php");
                    $Query="select * from categories";
                    $Row=mysqli_query($con,$Query);
                    while ($Data=mysqli_fetch_assoc($Row))
                     {
                    
                   ?>

                <li><a href="Books.php?id=<?php echo $Data["Cat_Id"] ?>" style="color:blue;font-weight:bold;"><?php echo $Data["Cat_Name"] ?></a></li>
                <?php } ?>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-4 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Services</h3>
								<ul class="footer-links">
									<li><a href="#" style="color:blue;font-weight:bold;">My Account</a></li>
									<li><a href="#" style="color:blue;font-weight:bold;">View Cart</a></li>
									<li><a href="#" style="color:blue;font-weight:bold;">Wishlist</a></li>
									<li><a href="#" style="color:blue;font-weight:bold;">Track My Order</a></li>
									<li><a href="#" style="color:blue;font-weight:bold;">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section" style="background-color:#ff7f50">
				<div class="container">
					<!-- row -->
					<div class="row" >
						<div class="col-md-12 text-center" >
						
							<span class="copyright" style="color:black; font-weight:bold">
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | E-BOOKS
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="FrontEnd_Template/js/jquery.min.js"></script>
		<script src="FrontEnd_Template/js/bootstrap.min.js"></script>
		<script src="FrontEnd_Template/js/slick.min.js"></script>
		<script src="FrontEnd_Template/js/nouislider.min.js"></script>
		<script src="FrontEnd_Template/js/jquery.zoom.min.js"></script>
		<script src="FrontEnd_Template/js/main.js"></script>
</body>
</html>