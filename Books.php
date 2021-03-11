<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="js/jquery.min.js"></script>
	<title>Document</title>
</head>

<body>
<?php
include('Header.php');
?>

   <form action="Search.php" method="get" class="col-md-12 " style="background-color:#ff7f50" >
    <!-- <label for="">Search By Name</label> -->
	<h1 class="text-center">Search Your Book Here</h1>
    <div class="form-group">
    <select name="SearchList" class="form-control" >
    <option value="select">Select your Search Method</option>
    <option value="Id">ID</option>
    <option value="Name">Name</option>
    <!-- <option value="Address">Address</option> -->
    
    </select>

    </div>

    <div class="form-group">
    <input type="text" name="search" class="form-control" placeholder="Enter Input to Search" >
    </div>

    <div class="form-group">
    <input type="submit" value="Search" name="SearchBtn" id="clickSeach" class="btn btn-light btn-block"  style="background-color:black;color:white">
    
    
    </div>

    </form>


<div class="main main-raised" id="main"> 
        
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					
					<!-- STORE -->
					
						<!-- store products -->
						<div class="row" id="product-row">
						<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
							<!-- product -->
							<div id="get_product">
								    <?php 
								    if(isset($_SESSION['C_ID']))
								    {
              					include("dbconnection.php");

              					if (isset($_GET["id"]))
                 				{
                  					$cid=$_GET["id"];
                  
									  $query="SELECT * from books b inner join categories c on b.Book_Category=c.Cat_Name where Cat_Id='$cid'" ;
									  //$query="SELECT *from books,categories where Cat_Id='$cid'";
                 				}

                 				$cmd=mysqli_query($con,$query);

              					while ($data=mysqli_fetch_array($cmd))
               					{
                 
               					?>


              <div class="col-md-4 col-xs-6" >
              	<a href='BookCat.php?b=<?php echo $data["Book_Id"]?>'>
              		<div class='block-4 product'>
              		<div class='product-img text-center'>
              			<figure class="block-4-image">
              				<img src='<?php echo $data["Book_Image"] ?>' style='max-height: 150px;' alt='' class="img-fluid">
              			</figure>
					</div></a>
					<div class='product-body'>
						<p class='product-category'><?php echo $data["Cat_Name"]?></p>
						<h3 class='product-name header-cart-item-name'><?php echo $data["Book_Title"]?></h3>
						<h4 class='product-price header-cart-item-info'><?php echo $data["Book_Price"]?></h4>
						<div class='product-btns'>
							<button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
						</div>
					</div>
					<a href='BookCat.php?b=<?php echo $data["Book_Id"]?>'>
					<div class='add-to-cart'>
						<button bid='<?php echo $data["Book_Id"]?>' id='product' class='add-to-cart-btn block2-btn-towishlist' name='addToCart' type='submit'><i class='fa fa-eye'></i> Quick View</button>
					</div>
				</a>
				</div>
			</div>

                  <?php
                   }
                }
                else
                {
                    echo "<script>
                    alert('For Purchasing purpose u have to first Login yourself!!');
                    window.location.href='CustomerLogin.php';
                    </script>";
                } 
                ?>
           </div>
          </div>

							<!--Here we get product jquery Ajax Request-->
						</div>
							
							<!-- /product -->
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
</div>

<?php
include('Footer.php');
?>


</body>
</html>

