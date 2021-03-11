<?php
include "Header.php";
?>
	<!-- SECTION -->
    <div class="section main main-raised">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					
					<?php 
								if(isset($_SESSION['UserName']))
								{
								include 'dbconnection.php';
								$book_id = $_GET['b'];
								$ship = "";
								
								$sql = " SELECT * FROM books";
								$sql = " SELECT * FROM books b inner join categories c on b.Book_Category=c.Cat_Name inner join shipping s on b.Book_Shipping=s.Shipping_Id  WHERE Book_Id = $book_id";
								if (!$con) {
									die("Connection failed: " . mysqli_connect_error());
								}
								$result = mysqli_query($con, $sql);
								if (mysqli_num_rows($result) > 0) 
								{
									while($row = mysqli_fetch_assoc($result)) 
									{
                                        ?>
									
									
                                    
                            <form action="" method="post"> 
                                
                                <div class="col-md-5">
                                <div id="product-main-img">
                                    <div >
                                        <img src="<?php echo $row['Book_Image']; ?>" class="img-thumbnail" alt="">
                                    </div>
                             </div>
                            </div>                                                                          
                    <div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name" style="color:Blue;"><?php echo $row['Book_Title'];?></h2>
							<h5 style="color:Blue;"> By <?php echo $row['Book_Author'];?></h5>
							<div>
                                
								<h3 class="product-price"><?php echo $row['Book_Price'];?>
								<span class="product-available" style="color:green;">In Stock</span>
							</div>
							<h6><?php echo $row['Book_Description'];?></h6>

							<div class="add-to-cart">
								<div class="qty-label">
									<b style="color:blue;">Qty</b>
									<div class="input-number">
										
									<input type="number" min="1" max="3"  name="qty" value="1">
                                        <span class="qty-up" style="color:red;">+</span>
                                        <span class="qty-down"style="color:red" >-</span>
									</div>
								</div>
							</div>
							<div class="add-to-cart btn-group" style="margin-top: 15px">
								<button class="add-to-cart-btn" b="<?php echo $row['Book_Id'];?>"  id="product"  name="addtocart" type="submit"><i class="fas fa-shopping-cart"></i> add to cart</button>
                                </div>
							

						</div>
					</div>
						</form>	

<?php
$msg="";
if(isset($_SESSION['C_ID']))
{
   if(isset($_POST['addtocart']))
   {
       
       $Query1 = "SELECT * from books where Book_Id = '$book_id'";
       $Run2=mysqli_query($con,$Query1);       
       $Data=mysqli_fetch_array($Run2);		  
    
       //fetching books Details          
       $Title = $Data['Book_Title'];
       $Price = $Data['Book_Price'];
       $Image = $Data['Book_Image'];
	   
       $c_name=$_SESSION['UserName'];
       $qty= $_POST['qty'];
       
       $Query = "Insert into cart(Cus_Name, Book_Id, Book_Title, Book_Price, Book_Image, Quantity) values('$c_name','$book_id', '$Title','$Price','$Image','$qty')";
       $run=mysqli_query($con,$Query);

       if($run==true)
        {
            echo "<script>
            alert('Added To Cart!');
            </script>";
        }
        else
        {
            echo "<script>
            alert('Error!');
            window.location.href='BookCat.php';
            </script>";
        }
       
   }  
}


?>
	
                    <div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<li><a data-toggle="tab" href="#tab2">Details</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p><?php echo $row['Book_Description']?></p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
											<p style="font-weight:bold"><b style="color:blue">Category:</b> <?php echo $row['Cat_Name']?></p>
											<p style="font-weight:bold"><b style="color:blue">Author:</b> <?php echo $row['Book_Author']?></p>
											<p style="font-weight:bold"><b style="color:blue">Availability:</b> In Stock</p>
											<p style="font-weight:bold"><b style="color:blue">Shipping:</b> <?php echo $row['Shipping_Charges']?></p>
										</div>
									</div>
								</div>
								<!-- /tab2  -->

							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

<?php
        }
    } 
}
?>	
				</div>
				<!-- /row -->
                
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->

<?php
include('Footer.php');
?>