
<?php
require ("UserLogIn/userInfo.php");

//session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['delete-Wishlist-submit'])){
        /** @var TYPE_NAME $Wishlist */
        $deletedrecord = $Wishlist->deleteWishlist($_POST['product_id']);
    }
    
    if(isset($_POST['cart-submit'])){
        /** @var TYPE_NAME $Cart */
        $Cart->addToCart($_POST['user_id'], $_POST['product_id']);
        /** @var TYPE_NAME $Wishlist */
        $deletedrecord = $Wishlist->deleteWishlist($_POST['product_id']);
    }
}

?>


<!-- Shopping cart section  -->

 <section id="cart" class="py-3">
   <div class="container-fluid w-75">
     <h2 class="jumbotron font-weight-bold text-center">Wishlist</h2>

    <!--  shopping cart items   -->
     <div class="row">
        <div class="col-sm-9">
        <?php
        /** @var TYPE_NAME $Proudects */
        foreach ($Proudects->getData('wishlist') as $item) :
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
                                 <form method="post">
                                    <input type="hidden" value="<?php echo $item['product_id'] ?? 0; ?>" name="product_id">
                                    <button type="submit" name="delete-Wishlist-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                                 </form>
                                <button type="button" class="btn font-baloo text-danger px-3" data-toggle="modal" data-target="#<?php echo $item['for_Model']; ?>">Quick View</button>
                                   
                           </div>
                     </div>
                           <div class="col-sm-2 text-right">
                             <div class="font-size-20 text-danger font-baloo">
                                     <span class="product_price" data-id="<?php echo $item['product_id'] ?? '0'; ?>">$<?php echo $item['product_new_price'] ?? 0 ?></span>
                               </div>
                             </div>
                             
                  <!-- Modal For qiuik View -->      
         	 <div class="modal fade" id="<?php echo $item['for_Model']; ?>" role="dialog">
  			  <div class="modal-dialog modal-lg">
   			   <!-- Modal content-->
     			 <div class="modal-content">
     			   <div class="modal-header"> 
      			    <h4 class="modal-title" style="font-family:baloo;"><?php echo $item['product_name'] ?? "Unknown"; ?></h4>
      			    <button type="button" class="close" data-dismiss="modal">&times;</button>
      			  </div>
       		  <div class="container">
        	   <div class="row">
          		   <div class="col-sm-6">
 					  <img src="<?php echo $item['product_image'] ?? "img/products/2.png"; ?>" alt="product1" class="img-fluid">
            		  <div class="form-row font-size-16" style="font-family:baloo;">
             		    <div class="col"><button type="submit" class="btn btn-danger form-control">Proceed To Buy</button></div>
                	       
                	    <div class="col">

                	    <form method="post">
                            <input type="hidden" name="product_id" value="<?php echo $item['product_id'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo getUserId() ?? '0'; ?>">
                            <button type="submit" name="cart-submit" class="btn btn-warning form-control">Add to Cart</button>
                        </form>
              </div>
                	    
               	     </div>
                 </div>
                 <div class="col-sm-6 py-5">
             	  <h5 style="font-family:baloo;">Some Detailes</h5>
                  <small>By <?php echo $item['product_brand']; ?></small>
              	   <div class="d-flex">
              		   <div class="rating text-warning font-size-4">
                 		  <span><i class="fas fa-star"></i></span>
                 		  <span><i class="fas fa-star"></i></span>
                 		  <span><i class="fas fa-star"></i></span>
                  		 <span><i class="fas fa-star"></i></span>
                  		 <span><i class="fas fa-star-half-alt"></i></span>
               		 </div>
              	     <a href="#" class="px-2 font-rale font-size-1">20,463 rating</a>
                 </div>
                 <hr class="m-0">
                 <table class="my-3">
                 	 <tr class="font-rale font-size-14">
                	  <td>Price In Jordan :</td>
                 	  <td class="text-danger">$<?php echo $item['product_new_price'] ?? 0 ?></td>
               		 </tr>
      	
               		 <tr class="font-rale font-size-14">
               		   <td>Processor :</td>
                	   <td><?php echo $item['product_processor'] ?? 0 ?></td>
               		 </tr>
              	     <tr class="font-rale font-size-14">
               		   <td>Storage :</td>
               		   <td><?php echo $item['product_storage'] ?? 0 ?> GB</td>
               		 </tr>
               		 <tr class="font-rale font-size-14">
               		   <td>Camera :</td>
               		   <td><?php echo $item['product_camera'] ?? 0 ?> MP</td>
              	     </tr>
               		 <tr class="font-rale font-size-14">
                		  <td>Display :</td>
                		  <td><?php echo $item['product_screen_size'] ?? 0 ?></td>
               		 </tr>
               		 <tr class="font-rale font-size-14">
               		   <td>Ram :</td>
                	   <td><?php echo $item['product_ram'] ?? 0 ?> GB</td>
               		 </tr>
               		
               		 <tr class="font-rale font-size-14">
                		  <td>Color :</td>
                		  <td>Black</td>
               		 </tr>
                 </table>
               </div>
             </div>
           </div>
          <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-top:5%; ">Close</button>
        </div>   
      </div>
     </div>
   <!-- /Modal For Mobile-S-Q -->
                  
                             
                </div>
               <?php  
                  
                        }, $cart); // closing array_map function
                   endforeach; 
                   
                   ?> 
                
                
              </div>
              
                            
     </div>        
  </div>
 </section>
<!-- /End Shopping cart section  -->
<!-- *********************************************************************************************** -->


