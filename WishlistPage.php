<?php

ob_start();


// require functions.php file
require ('functions.php');


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

    <!--Style sheet-->
    <link rel="stylesheet" href="Style/StyleCss.css">

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

<div class="loader">
   <img src="https://media1.tenor.com/images/d6cd5151c04765d1992edfde14483068/tenor.gif?itemid=5662595" alt="Loading..." />
</div>
    


<!-- Start header -->
<header id="header">
 <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
 <p class="text-black-50" style="font-size:14px;margin:0px;" >irbid-jordan Alhoson Street </p>


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
        <li class="nav-item sub-menu-parent">
            <a class="nav-link dropdown-toggle" href="" id="navbar_drop">Shop</a>
            <div class="sub-menu" style="background-color: #66BFBF;">

                <a class="nav-link cool-Link font-weight-bold text-light" href="LaptopPage.php">Laptop</a>
                <a class="nav-link cool-Link font-weight-bold text-light" href="MobilePage.php">Mobile</a>
                <a class="nav-link cool-Link font-weight-bold text-light" href="WatchesPage.php">Watches</a>

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


<?php

//include washlest items if it is not empty
count($Proudects->getData('wishlist')) ?  include 'Template/wishilist_template.php' : include "Template/wishilistnotFound.php";

?>

 

<?php

 //include footer.php
  include 'footer.php';

?>



