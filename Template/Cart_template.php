

<?php

require ("UserLogIn/userInfo.php");


//session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['delete-cart-submit'])){
        /** @var TYPE_NAME $Cart */
        $deletedrecord = $Cart->deleteCart($_POST['product_id']);
    }
    
    // save for later
    if (isset($_POST['WISHLIST-Submit'])){
        /** @var TYPE_NAME $Wishlist */
        $Wishlist->addToWishlist($_POST['user_id'], $_POST['product_id']);
        $deletedrecord = $Cart->deleteCart($_POST['product_id']);
    }
}
   

  
?>


<!-- Shopping cart section  -->

 <section id="cart" class="py-3">
   <div class="container-fluid w-75">
     <h2 class="jumbotron text-info text-center font-weight-bold" style="font-family: 'Dela Gothic One', cursive;">Shopping Cart</h2>
    <!--  shopping cart items   -->
     <div class="row">
        <div class="col-sm-9">
          <?php
          /** @var TYPE_NAME $Proudects */
          foreach ($Proudects->getData('cart') as $item) :
                 $cart = $Proudects->getProduct($item['product_id']);
                 $subTotal[] = array_map(function ($item){  
            ?>
           <!-- cart item -->
             <div class="row border-top py-3 mt-3">
                <div class="col-sm-2">
                   <img src="<?php echo $item['product_image'] ?? "img/products/1.png"; ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                </div>
                <div class="col-sm-8">
                  <h5 class="font-baloo font-size-20"><?php echo $item['product_name'] ?? "Unknown"; ?></h5>
                     <small>by <?php echo $item['product_brand']; ?></small>
              <!-- product rating -->
                         <div class="d-flex">
                           <div class="rating text-warning font-size-12">
                              <span><i class="fas fa-star"></i></span>
                              <span><i class="fas fa-star"></i></span>
                              <span><i class="fas fa-star"></i></span>
                              <span><i class="fas fa-star"></i></span>
                              <span><i class="far fa-star"></i></span>
                            </div>
                             <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                          </div>
                    <!-- product qty -->
                         <div class="qty d-flex pt-2">
                            <div class="d-flex font-rale w-25">
                               <button class="qty-up border bg-light" data-id="<?php echo $item['product_id'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
                               <input type="text" data-id="<?php echo $item['product_id'] ?? '0'; ?>" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                               <button data-id="<?php echo $item['product_id'] ?? '0'; ?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                             </div>
                                 <form method="post">
                                    <input type="hidden" value="<?php echo $item['product_id'] ?? 0; ?>" name="product_id">
                                    <button type="submit" name="delete-cart-submit" class="btn btn-light font-baloo text-danger px-3 border-right">Delete</button>
                                 </form>
                             <form method="post">
                                 <input type="hidden" name="product_id" value="<?php echo $item['product_id'] ?? '1'; ?>">
                                 <input type="hidden" name="user_id" value="<?php echo getUserId() ?? '0'; ?>">
                                 <button type="submit" name="WISHLIST-Submit" class="btn btn-light font-baloo text-danger">Save For Later</button>
                             </form>
                           </div>
                     </div>
                           <div class="col-sm-2 text-right">
                             <div class="font-size-20 text-danger font-baloo">
                                     <span class="product_price" data-id="<?php echo $item['product_id'] ?? '0'; ?>">$<?php echo $item['product_new_price'] ?? 0 ?></span>
                               </div>
                             </div>
                </div>
                <?php
                   return $item['product_new_price'];
                        }, $cart); // closing array_map function
                   endforeach;  
                ?>
                
                
              </div>
                            
          <!-- subtotal section-->
                   <div class="col-sm-3">
                      <div class="sub-total border text-center mt-2">
                         <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                            <div class="border-top py-4">
                                <h5 class="font-baloo font-size-20">Subtotal ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span> </span> </h5>
                                 <?php
                                   if(isset($_SESSION["login_user"])){
                                       echo 'good';
                                   }else{
                                       echo '<form action="UserLogIn/index.php">
                                                <button type="submit" class="btn btn-danger mt-3">Check Out</button>
                                             </form>
                                             ';
                                   }

                                 ?>


                             </div>
                        </div>
                     </div>       
     </div>        
  </div>
 </section>
<!-- /End Shopping cart section  -->
<!-- *********************************************************************************************** -->


