<?php
error_reporting(E_ERROR | E_PARSE);

//To get information of client
require("UserLogIn/userInfo.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Sopping Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Owlcarousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />

    <!-- slick Slider -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <!-- font awosme -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300&display=swap" rel="stylesheet">

    <!--Style sheet-->
    <link rel="stylesheet" href="Style/StyleCss.css">

<?php
ob_start();
// require functions.php file
require_once ('functions.php');


$conn = new mysqli("localhost", "root", "","online_shope");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['WatchesDevice_submit'])) {
        // call method addToCart
        /** @var TYPE_NAME $Cart */
        $Cart->addToCart($_POST['user_id'], $_POST['product_id']);

    }
}
?>



</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

<!-- For Loding Page -->
<div id="demo-content">
  <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>

<!-- Start header -->
<header id="header">
 <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
 <p class="text-black-50" style="font-size:14px;margin:0px;" >irbid-jordan Alhoson Street </p>


     <?php
     $result = '';
     /** @var TYPE_NAME $Proudects */

     if(isset($_SESSION["login_user"])){
         $result .= '
                <div class="sub-menu-parent mr-5">
                   <span class="px-3 font-weight-bold text-info" style="cursor: pointer;"><i class="fa fa-user lazyloaded"></i>&nbsp; Welcome/'.getUserName().'</span>
                   <div class="sub-menu bg-light" style="width: 135%;">
                       <div> <a href="UserLogIn/LogOut.php" class="px-3  font-weight-bold text-info"><i class="fas fa-sign-out-alt"></i> &nbsp;LogOut</a></div>
                       <div> <a href="WishlistPage.php" class="px-3  font-weight-bold text-info"><i class="fas fa-heart"></i> &nbsp;Favorite('.count($Proudects->getData('wishlist')).')</a></div>
                   </div>
               </div>
         ';
     }else{
         $result .= '
               <div class="sub-menu-parent mr-3">
                   <span class="px-3 font-weight-bold text-info" style="cursor: pointer;"><i class="fa fa-user lazyloaded"></i>&nbsp; Sign In</span>
                   <div class="sub-menu bg-light" style="width: 135%;">
                       <div> <a href="UserLogIn/index.php" class="font-weight-bold text-info"><i class="fas fa-sign-in-alt"></i>&nbsp;LogIn/Register</a></div>
                       <div> <a href="WishlistPage.php" class="px-3 font-weight-bold text-info"><i class="fas fa-heart"></i> &nbsp;Favorite('.count($Proudects->getData('wishlist')).')</a></div>
                   </div>
               </div>
         ';
     }

     echo $result;
     ?>

</div>

<!-- NavBar -->	
<section id="nav-bar">
<nav id="navbar_top" class="navbar navbar-inverse navbar-expand-lg navbar-dark" style="background-color:#66BFBF;" >
  <a class="navbar-brand font-weight-bold" style="font-family:Rubik;" href="index.php" >RADMY SHOP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav m-auto" style="font-family:Rubik;" >
      <li class="nav-item active">
        <a class="nav-link cool-Link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link cool-Link" href="#top-sale">Top Sale</a>
      </li>
        <li class="nav-item sub-menu-parent">
            <a class="nav-link dropdown-toggle" href="" id="navbar_drop">Shop</a>
            <div class="sub-menu" style="background-color: #66BFBF;">
                <a class="nav-link cool-Link font-weight-bold text-light" href="LaptopPage.php">LapTop</a>
                <a class="nav-link cool-Link font-weight-bold text-light" href="MobilePage.php">Mobile</a>
            </div>
        </li>
      <li class="nav-item">
        <a class="nav-link cool-Link" href="#footer">Contact</a>
      </li>
    </ul>

    <!-- For Shopping cart Icon -->
      <form action="#" class="font-size-14 font-rale">
      <a href="CartPage.php" class="py-2 rounded-pill" style="background-color:#003859;" >
      <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
      <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($Proudects->getData('cart')); ?></span>
      </a>
      </form>
      
  </div>
</nav>
</section>
<!-- /NavBar -->

</header>
<!-- /End header -->
<!-- *********************************************************************************************** -->


<!-- Start main -->
<main>
  <!-- Photo slider -->

    <?php include ("Template/Photo_Slider_template.php");?>

  <!-- /Photo slider -->
<!-- *********************************************************************************************** -->

<!-- Start Filter Mobile Products -->
<div class="container-fluid mb-5 mt-3">
     <div class="row">
         <div class="col-lg-3">                				
			 <h4 class="text-secondary font-weight-bold" style="text-size:1.6rem; font-family: 'Lobster', cursive;">Filter Products</h4>
			 <hr>

          <!-- For display all Brand from DataBase -->
            <h5 class="text-secondary font-weight-bold" style="font-size: 1.2rem; font-family: 'Bebas Neue', cursive;">Brand</h5>
               <ul class="list-group">
				 <?php
				    $statement = "SELECT DISTINCT(product_brand) FROM all_products WHERE product_type = 'W' ORDER BY product_brand DESC";
				    $result = $conn->query($statement);
				    while ($row=$result->fetch_assoc()){
                  ?>  
                   <li class="list-group-item">
                     <div class="form-check">
                        <label >
                        <input type="checkbox" class="brand product_check_W" value="<?php echo $row['product_brand']; ?>" > <?php echo $row['product_brand']; ?>
                        </label>
                     </div>
                    </li>
                  <?php }?>
               </ul>               
          </div>
          				
          <div class="col-lg-9">
            <h4 class="text-info font-weight-bold" style="font-family: 'Dela Gothic One', cursive;">Watches</h4>
            <hr>
			 <div class="text-center">
			   <img class="img-fluid mt-5" alt="loder" src="img/products/Spinner.gif" id="loder_P" style="height: 150px; display:none;">
			 </div> 
			 <div class="row" id="result_W">
			   <?php 
			     $statement = "SELECT * FROM all_products WHERE product_type = 'W'";
			     $result = $conn->query($statement);
			     while ($row=$result->fetch_assoc()){
			   ?>
			   <div class="col-md-3 mb-2">
			     <div class="item border border-success bg-light rounded">
			      <div class="product">
			        <img alt="img" src="<?php echo $row['product_image'] ?? "img/products/1.png";?>" class="card-img-top"> 
			        <div class="text-center">
			         <h6 class="text-light text-center p-1 rounded bg-info"><?php echo $row['product_name'];?></h6>
			        </div>
			        <div class="mt-2 ml-2">
			         <h4 class="text-danger">Price :<?php echo $row['product_new_price'];?></h4> 
			        </div>
			        <div class="text-center mb-2">
                        <form method="post">
                            <input type="hidden" name="product_id" value="<?php echo $row['product_id'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo getUserId() ?? '0'; ?>">

                            <?php
                            /** @var TYPE_NAME $Proudects */
                            if (in_array($row['product_id'], $Cart->getCartId($Proudects->getData('cart')) ?? [])){
                                echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                            }else{
                                echo '<button type="submit" name="WatchesDevice_submit" class="btn btn-warning font-size-12 add_to_cart">Add to Cart</button>';
                            }
                            ?>

                        </form>

                    </div>
			      </div>  
			     </div>
			   </div>
			   <?php }?>
			 </div>     
          </div> 
           
        </div>
    </div>


<!-- /End Filter Mobile Products -->
<!-- ********************************************************************************** --> 



<?php 
//Footer
  include 'footer.php';  
?>

</div>
<!-- End Loding Page -->

