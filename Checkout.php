<?php
include('dbconnection.php');
include('Header.php')                ;
?>

<style>

.row-checkout {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container-checkout {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.checkout-btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.checkout-btn:hover {
  background-color: #45a049;
}



hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row-checkout {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
				
<section class="section">       
	<div class="container-fluid">
		<div class="row-checkout">
		<?php
//        session_start();
        if(isset($_SESSION["UserName"]))
        {
			$Query = "SELECT * FROM customer WHERE Cus_Name='$_SESSION[UserName]'";
			$Run = mysqli_query($con,$Query);
			$data=mysqli_fetch_array($Run);
?>
<?php
?>
<div class="col-50">
			<div class="container-checkout">
				    <form id="checkout_form" action="Checkout_Process.php" method="POST" class="was-validated">

					<br>
					<div class="row-checkout">
					
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <label for="fname"><i class="fas fa-user" ></i> Full Name</label>
                            <input type="text" id="fname" class="form-control" name="firstname" pattern="^[a-zA-Z ]+$"  value="<?php echo $data["Cus_Name"]?>">
                            <label for="email"><i class="fas fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" class="form-control" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$" value="<?php echo $data["Email"]?>" required>
                            <label for="adr"><i class="fas fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" class="form-control" value="<?php echo $data["Cus_Address"]?>" required>
                            <label for="city"><i class="fas fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" class="form-control" value="<?php echo $data["City"]?>" pattern="^[a-zA-Z ]+$" required>

                        </div>
                        
					

					<div class="col-50">
						<h3>Payment Methods</h3>

						<label for="fname">Accepted Cards</label>

						<div class="icon-container">
						<i class="fab fa-cc-visa" style="color:navy;"></i>
						<i class="fab fa-cc-amex" style="color:blue;"></i>
						<i class="fab fa-cc-mastercard" style="color:red;"></i>
						<i class="fab fa-cc-discover" style="color:orange;"></i>
						</div>

						<div class="row">

						<div class="col-md-12">
						<label><input type="radio" name="card" value="Credit Card"> Credit Card
						</label>
						</div>

						<div class="col-md-12">
						<label><input type="radio" name="card" value="DD"> DD
						</label>
						</div>

						<div class="col-md-12">
						<label><input type="radio" name="card" value="Cheque"> Cheque
						</label>
						</div>

						<div class="col-md-12">
						<label><input type="radio" name="card" value="VPP"> VPP
						</label>
						</div>

					</div>
						
						
				</div>
                <!-- main div -->
			</div>
					<label><input type="CHECKBOX" name="q" class="roomselect" value="conform" required> Shipping address same as billing
					</label>
<?php

					$i=1;
					$total=0;
					$total_count=$_POST['total_count'];
					while($i<=$total_count){
						$book_name_ = $_POST['item_name_'.$i];
						$amount_ = $_POST['amount_'.$i];
						$quantity_ = $_POST['quantity_'.$i];
						//$total=$total+$amount_ ;
						$SubTotal=$amount_ * $quantity_;						
						$total =$total+$SubTotal;
						$sql = "SELECT Book_Id FROM books WHERE Book_Title='$book_name_'";
						$query = mysqli_query($con,$sql);
						$row=mysqli_fetch_array($query);
						$product_id=$row["Book_Id"];
						echo "	
						<input type='hidden' name='prod_id_$i' value='$product_id'>
						<input type='hidden' name='prod_price_$i' value='$amount_'>
						<input type='hidden' name='prod_qty_$i' value='$quantity_'>
						";
						$i++;
						// echo "<h1>".$i."</h1>";
					}
					
				echo'	
				<input type="hidden" name="total_count" value="'.$total_count.'">
					<input type="hidden" name="total_price" value="'.$total.'">
					
					<button class="checkout-btn" id="submit" name="btnCheckOut" type="submit">Continue to checkout</button>
				</form>
				</div>
			</div>
            ';
            ?>
    <?php
        }

        else{
			echo"<script>window.location.href = 'Cart.php'</script>";
		}
		?>

			<div class="col-25">
				<div class="container-checkout">
				
				<?php
				if (isset($_POST["cmd"])) {
				
					$user_id = $_POST['custom'];
                    $i=1;
                    ?>
        		<h4 style="background-color:blue;font-size:30px;color:white">Cart 
				<span class='price' style='color:white'>
				<i class='fas fa-shopping-cart'></i> 
				<b><?php echo $total_count?></b>
				</span>
				</h4>

				<table class='table table-condensed'>
					<thead>
                        <tr>
                            <th >No</th>
                            <th >Books</th>
                            <th >Quantity</th>
                            <th >Amount</th>
                        </tr>
					</thead>

					<tbody>
                
                    <?php					
					$total=0;
					while($i<=$total_count){
						$book_name_ = $_POST['item_name_'.$i];
						
						$item_number_ = $_POST['item_number_'.$i];
						
						$amount_ = $_POST['amount_'.$i];
						
						$quantity_ = $_POST['quantity_'.$i];
						$SubTotal=$amount_ *$quantity_;						
						$total =$total+$SubTotal;
						$sql = "SELECT Book_Id FROM books WHERE Book_Title='$book_name_'";
						$query = mysqli_query($con,$sql);
						$row=mysqli_fetch_array($query);
						$product_id=$row["Book_Id"];
					
						echo "	

						<tr style='color:blue;font-weight:bold'>
						<td><p>$item_number_</p></td>
						<td><p>$book_name_</p></td>
						<td ><p>$quantity_</p></td>
						<td ><p>$SubTotal</p></td>
						</tr>";
						
						$i++;
					}

				echo"

				</tbody>
				</table>
				<hr>
				
				<h3>Total<span class='price' style='color:black'><b>Rs $total</b></span></h3>";
					
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