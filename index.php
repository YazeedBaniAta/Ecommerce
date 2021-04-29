<?php

//To get information of client
  require ("UserLogIn/userInfo.php");
 ?>

<?php
ob_start();

  //include header.php
  include 'header.php'
?>


<?php 

  // Photo_Slider
  include 'Template/Photo_Slider_template.php';
  
  //Category
  include 'Template/Category_template.php';
  
  //Top_Sale
  include 'Template/Top_Sale_template.php';
  
  //Recently_Arrived
  include 'Template/Recently_Arrived_template.php';
  
  //BannerAdd
  include 'Template/BannerAdd_template.php';
  
  //Offer_template
  include 'Template/Offer_template.php';
  
  //Testimonial
  include 'Template/Testimonial_template.php';
  
  //Brande
  include 'Template/Brande_template.php';
  
  ?>
  

<?php 
 //include footer.php
 include 'footer.php';
?>

