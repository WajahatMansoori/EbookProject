<?php
include "Header.php";
?>


<section class="section">
<div class="container-fluid">	
    <div id="cart_checkout">
    	<?php
    	if(isset($_SESSION["UserName"]))
    	{
			?>
		<div class="main">
    	
        <div class="table-responsive">
          <form method="post">
            <table id="cart" class="table table-hover table-condensed" id="">
            <thead>
            <tr>
              <th style="width:50%">Book</th>
              <th style="width:8%">Price</th>
              <th style="width:7%" class="text-center">Quantity</th>
              <th style="width:7%" class="text-center">SubTotal</th>
              <th style="width:10%"></th>
            </tr>
          </thead>
          <tbody>
			<?php
    		
      }
   

			$c_name = $_SESSION['UserName'];
			$Query = "Select * from cart where Cus_Name='$c_name'";

			$Row = $con->query($Query);
	  		$TotalRows=mysqli_num_rows($Row);
			if($TotalRows>0) 
			{
				$n=0;
				$total_price=0;
			while($Data=mysqli_fetch_array($Row))
			{
				$n++;
				$product_id = $Data["Book_Id"];
				$GetCartId=$Data["Cart_Id"];
				$product_title = $Data["Book_Title"];
				$product_price = $Data["Book_Price"];
				$product_image = $Data["Book_Image"];
				$cart_item_id = $Data["Cart_Id"];
				$qty = $Data["Quantity"];
				$SubTotal=$product_price*$qty;
				$total_price=$total_price+$SubTotal;
    
    echo '
      <tr>
      	<td data-th="Product" >
								<div class="row">
								
									<div class="col-sm-4 "><img src="'.$product_image.'" style="height: 70px;width:75px;"/>
									<br><br>
									<h4 class="nomargin product-name header-cart-item-name"><a href="BookCat.php?b='.$product_id.'">'.$product_title.'</a></h4>
									</div>
									
							</td>
							<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
				            <input type="hidden" name="" value="'.$cart_item_id.'"/>
							<td data-th="Price"><input type="text" class="form-control price" value="'.$product_price.'" readonly="readonly"></td>
							<td data-th="Quantity">
								<input type="text" class="form-control qty" value="'.$qty.'" >
							</td>
							<td data-th="Subtotal" class="text-center"><input type="text" class="form-control total" value="'.$SubTotal.'" readonly="readonly"></td>
							<td class="actions" data-th="">
							<div class="btn-group">
								<a href="UpdateCart.php?Getid='.$GetCartId.'" class="btn btn-success btn-sm update" update_id="'.$product_id.'"><i class="fas fa-refresh"></i></a>
								
								<a href="DeleteCart.php?Getid='.$product_id.'" rid="'.$product_id.'" class="btn btn-danger btn-sm remove"><i class="fas fa-trash"></i></a>		
							</div>							
							</td>
							</tr>
							';
						}
						echo '</tbody>
						<tfoot>
					
					<tr>
						<td><a href="Books.php" class="btn btn-success"><i class="fas fa-angle-left"></i> Continue Shopping</a></td>
						<td colspan="2" class="hidden-xs"></td>
						<td class="hidden-xs text-center"><b class="net_total" >Total: Rs '.$total_price.' </b></td>
						<div id="issessionset"></div>
                        <td>
							
							';
							if (!isset($_SESSION["UserName"])) {
					echo '
					
							<a href="" data-toggle="modal" data-target="#Modal_register" class="btn btn-success">Ready to Checkout</a></td>
								</tr>
							</tfoot>
				
							</table></div></div>';
                }else if(isset($_SESSION["UserName"])){
                	echo '
					</form>
					<form method="post" action="Checkout.php">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="business" value="auzahmansoor33@gmail.com">
							<input type="hidden" name="upload" value="1">';
							  
							$x=0;
							$sql = "SELECT a.Book_Id,a.Book_Title,a.Book_Price,a.Book_Image,b.Cart_Id,b.Quantity FROM books a,cart b WHERE a.Book_Id=b.Book_Id AND b.Cus_Name='$_SESSION[UserName]'";
							$query = mysqli_query($con,$sql);
							while($row=mysqli_fetch_array($query)){
								$x++; //x is serial no 
								// echo "<h1>".$x."</h1>";
								echo  	

									'<input type="hidden" name="total_count" value="'.$x.'">
									<input type="hidden" name="item_name_'.$x.'" value="'.$row["Book_Title"].'">
								  	 <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
								     <input type="hidden" name="amount_'.$x.'" value="'.$row["Book_Price"].'">
								     <input type="hidden" name="quantity_'.$x.'" value="'.$row["Quantity"].'">';
								}
							  
							echo   
								'
									<input type="hidden" name="currency_code" value="PKR"/>
									<input type="hidden" name="custom" value="'.$_SESSION["UserName"].'"/>
									<input type="submit" id="submit" name="checkout" class="btn btn-success" value="Ready to Checkout">
									</form></td>
									
									</tr>
									
									</tfoot>
									
							</table></div></div>    
								';
							}
						}


?> 

        </div>
      </div>

    </div>
</div>
</section>



<?php
include('Footer.php');
?>