<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include('Header.php');
    ?>

    
      <div class="container mainn-raised" style="width:100%;">
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
 

  <!-- Wrapper for slides -->
  <div class="carousel-inner">

    <div class="item active">
      <img src="img/ebooks.jpg" style="width:100%;">      
    </div>

    <div class="item">
      <img src="img/banner1.jpg" style="width:100%;">
    </div>

  </div>

</div>
</div>


<div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">

          <!-- section title -->
          <div class="col-md-12">
            <div class="section-title">
              <h3 class="text-center" style="background-color:black;color:white;font-size:40px;font-family:timesnewroman;">New Books</h3>
              
            </div>
          </div>
          <!-- /section title -->

          <!-- Products tab & slick -->
          <div class="col-md-12 mainn mainn-raised">
            <div class="row">
              <div class="products-tabs">
                <!-- tab -->
                <div id="tab1" class="tab-pane active">
                  <div class="products-slick" data-nav="#slick-nav-1" >
                  
                  <?php
                    include 'dbconnection.php';
                
                    
          $books_query = "SELECT * FROM books,categories WHERE Book_Category=Cat_Name AND Book_Id BETWEEN 13 AND 24";
                $run_query = mysqli_query($con,$books_query);
                if(mysqli_num_rows($run_query) > 0){

                    while($row = mysqli_fetch_array($run_query)){
                        $book_id    = $row['Book_Id'];
                        $book_cat   = $row['Book_Category'];
                        $book_title = $row['Book_Title'];
                        $book_price = $row['Book_Price'];
                        $book_img = $row['Book_Image'];

                        $cat_name = $row["Cat_Name"];

                        echo "
              <div class='product'>
                  <a href='BookCat.php?b=$book_id'><div class='product-img'>
                    <img src='$row[4]' style='max-height: 170px;' alt=''>
                  </div></a>
                  <div class='product-body'>
                    <p class='product-category'>$cat_name</p>
                    <h4 class='product-name header-cart-item-name'><a href='BookCat.php?b=$book_id'>$book_title</a></h4>
                    <h5 class='product-price header-cart-item-info'>$book_price</h5>
                    
                  </div>
                  <div class='add-to-cart'>
                    <button bid='$book_id' class='add-to-cart-btn block2-btn-towishlist' name='addCart' type='submit'><i class='fas fa-eye'></i>Quick View</button>
                  </div>
                </div>
                               
      ";
    }
        ;
      
}
?>
                    <!-- product -->
                    
  
                    <!-- /product -->
                    
                    
                    <!-- /product -->
                  </div>
                  <div id="slick-nav-1" class="products-slick-nav"></div>
                </div>
                <!-- /tab -->
              </div>
            </div>
          </div>
          <!-- Products tab & slick -->

        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /SECTION -->


<!-- SECTION -->
<div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">

          <!-- section title -->
          <div class="col-md-12">
            <div class="section-title">
              <h3 class="text-center" style="background-color:black;color:white;font-size:40px;font-family:timesnewroman;">High Rates Books</h3>
            </div>
          </div>
          <!-- /section title -->

          <!-- Products tab & slick -->
          <div class="col-md-12 mainn mainn-raised">
            <div class="row">
              <div class="products-tabs">
                <!-- tab -->
                <div id="tab2" class="tab-pane fade in active">
                  <div class="products-slick" data-nav="#slick-nav-2">
                    <!-- product -->
                    <?php
                    include 'dbconnection.php';
                
                    
          $books_query = "SELECT * FROM books,categories WHERE Book_Category=Cat_Name AND Book_Price BETWEEN 1200 AND 2200 AND Book_Id != 14";
                $run_query = mysqli_query($con,$books_query);
                if(mysqli_num_rows($run_query) > 0){

                    while($row = mysqli_fetch_array($run_query)){
                        $book_id    = $row['Book_Id'];
                        $book_cat   = $row['Book_Category'];
                        $book_title = $row['Book_Title'];
                        $book_price = $row['Book_Price'];
                        $book_img = $row['Book_Image'];

                        $cat_name = $row["Cat_Name"];

                        echo "
        
                        
                                
                <div class='product'>
                  <a href='BookCat.php?b=$book_id'><div class='product-img'>
                    <img src='$row[4]' style='max-height: 170px;' alt=''>
                  </div></a>
                  <div class='product-body'>
                    <p class='product-category'>$cat_name</p>
                    <h3 class='product-name header-cart-item-name'><a href='BookCat.php?b=$book_id'>$book_title</a></h3>
                    <h4 class='product-price header-cart-item-info'>$book_price</h4>
                    
                  </div>
                  <div class='add-to-cart'>
                    <button bid='$book_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fas fa-eye'></i>Quick View</button>
                  </div>
                </div>
                               
              
                        
      ";
    }
        ;
      
}
?>
                    
                    <!-- /product -->
                  </div>
                  <div id="slick-nav-2" class="products-slick-nav"></div>
                </div>
                <!-- /tab -->
              </div>
            </div>
          </div>
          <!-- /Products tab & slick -->
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /SECTION -->

   
<!-- SECTION -->
<div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <div class="col-md-4 col-xs-6">
            <div class="section-title">
              <h4 class="title">Competitions Held</h4>
            </div>
            

            <div class="products-widget-slick" data-nav="#slick-nav-3">
              

              <div id="get_product_home2">
                <!-- product widget -->
                <div class="product-widget">
                  <div class="product-img">
                    <img src="./img/punctuality.jpg" alt="">
                  </div>
                  <div class="product-body">
                    <p class="product-category"><a href="#">Why Punctuality is important?</a></p>
                    <h3 class="product-name">Date Held: 15th Feb 2020</h3>
                    <h4 class="product-name">Winner: Ayesha Khan</h4>
                    <h5 class="product-price">Prize: Rs.2500</h5>
                  </div>
                </div>
                <!-- /product widget -->

                <!-- product widget -->
                <div class="product-widget">
                  <div class="product-img">
                    <img src="./img/dangerous.jpg" alt="">
                  </div>
                  <div class="product-body">
                    <p class="product-category"><a href="#">A dangerous experience</a></p>
                    <h3 class="product-name">Date Held: 15th Feb 2020</h3>
                    <h4 class="product-name">Winner: Wania Ali</h4>
                    <h5 class="product-price">Prize: Rs.2500</h5>
                  </div>
                </div>
                <!-- /product widget -->

                <!-- product widget -->
                <div class="product-widget">
                  <div class="product-img">
                    <img src="./img/kind.jpg" alt="">
                  </div>
                  <div class="product-body">
                    <p class="product-category"><a href="#">A random act of kindness</a></p>
                    <h3 class="product-name">Date Held: 15th Feb 2020</h3>
                    <h4 class="product-name">Winner: Ali Siddiqui</h4>
                    <h5 class="product-price">Prize: Rs.2500</h5>
                  </div>
                </div>
                <!-- product widget -->
              </div>
            </div>
          </div>

          <div class="col-md-4 col-xs-6">
            <div class="section-title">
              <h4 class="title">Competitions Held</h4>
            </div>
            

            <div class="products-widget-slick" data-nav="#slick-nav-3">
              

              <div id="get_product_home2">
                <!-- product widget -->
                <div class="product-widget">
                  <div class="product-img">
                    <img src="./img/memory.jpg" alt="">
                  </div>
                  <div class="product-body">
                    <p class="product-category"><a href="#">Describe your oldest memory</a></p>
                    <h3 class="product-name">Date Held: 20th Feb 2020</h3>
                    <h4 class="product-name">Winner: Arwa Saleem</h4>
                    <h5 class="product-price">Prize: Rs.1500</h5>
                  </div>
                </div>
                <!-- /product widget -->

                <!-- product widget -->
                <div class="product-widget">
                  <div class="product-img">
                    <img src="./img/dangerous.jpg" alt="">
                  </div>
                  <div class="product-body">
                    <p class="product-category"><a href="#">Is it better to be a night owl or an early bird?</a></p>
                    <h3 class="product-name">Date Held: 25th Feb 2020</h3>
                    <h4 class="product-name">Winner: Saleha Khan</h4>
                    <h5 class="product-price">Prize: Rs.1500</h5>
                  </div>
                </div>
                <!-- /product widget -->

                <!-- product widget -->
                <div class="product-widget">
                  <div class="product-img">
                    <img src="./img/kind.jpg" alt="">
                  </div>
                  <div class="product-body">
                    <p class="product-category"><a href="#">Do opposites really attract?</a></p>
                    <h3 class="product-name">Date Held: 2nd March 2020</h3>
                    <h4 class="product-name">Winner: Saim Qureshi</h4>
                    <h5 class="product-price">Prize: Rs.1500</h5>
                  </div>
                </div>
                <!-- product widget -->
              </div>
            </div>
          </div>

          

          <div class="clearfix visible-sm visible-xs">
              
          </div>

          <div class="col-md-4 col-xs-6">
            <div class="section-title">
              <h4 class="title">Upcoming Competitions</h4>
            </div>
            

            <div class="products-widget-slick" data-nav="#slick-nav-3">
              

              <div id="get_product_home2">
                <!-- product widget -->
                <div class="product-widget">
                  <div class="product-img">
                    <img src="./img/info.jpg" alt="">
                  </div>
                  <div class="product-body">
                    <p class="product-category"><a href="#">What is information technology?</a></p>
                    <h3 class="product-name">Date Commencing: 20th March 2020</h3>
                    <h4 class="product-name">Word Limit: 3000</h4>
                    <h5 class="product-price">Prize: Rs.3000</h5>
                  </div>
                </div>
                <!-- /product widget -->

                <!-- product widget -->
                <div class="product-widget">
                  <div class="product-img">
                    <img src="./img/Honesty.png" alt="">
                  </div>
                  <div class="product-body">
                    <p class="product-category"><a href="#">Importance of Honesty in Life</a></p>
                    <h3 class="product-name">Date Commencing: 20th March 2020</h3>
                    <h4 class="product-name">Word Limit: 3000</h4>
                    <h5 class="product-price">Prize: Rs.3000</h5>
                  </div>
                </div>
                <!-- /product widget -->

                <!-- product widget -->
                <div class="product-widget">
                  <div class="product-img">
                    <img src="./img/kind.jpg" alt="">
                  </div>
                  <div class="product-body">
                    <p class="product-category"><a href="#">What causes climate change?</a></p>
                    <h3 class="product-name">Date Commencing: 20th March 2020</h3>
                    <h4 class="product-name">Word Limit: 2500</h4>
                    <h5 class="product-price">Prize: Rs.2000</h5>
                  </div>
                </div>
                <!-- product widget -->
              </div>
            </div>
          </div>
          

        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /SECTION -->


    <?php
    include('Footer.php');
    ?>
</body>
</html>