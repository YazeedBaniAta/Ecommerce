<?php
  use DataBase\dbController;
  use DataBase\All_Proudects;
  use DataBase\Cart;
use DataBase\Wishlist;

  // require dbController.php file
  require ('DataBase/dbController.php');
  
  
  // require All Product Class
  require ('DataBase/All_Proudects.php');
  
  // require Cart Class
  require ('DataBase/Cart.php');
  
  // require Wishlist Class
  require ('DataBase/Wishlist.php');
  
  
  // DBController object
  $db = new dbController();
  
  
  // All products object
  $Proudects = new All_Proudects($db);
  
  
  // Top Sale Products object
  $Top_Sale_Products_shuffle = $Proudects->getTopSaleData();
  
  
  // Recently Arrived products object
  $Recently_Arrived_products_shuffle = $Proudects->getRecentlyArrivedData();
  
  // Recently OFFER products object
  $OFFER_products = $Proudects->getOfferData();

  
  // Cart object
  $Cart = new Cart($db);
  
  // Cart Wishlist
  $Wishlist = new Wishlist($db);
  $W= $Wishlist->getWishlistId();
  
?>