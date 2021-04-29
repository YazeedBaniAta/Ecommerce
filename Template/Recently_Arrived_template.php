<?php

/** @var TYPE_NAME $Recently_Arrived_products_shuffle */
$brand = array_map(function ($pro){ return $pro['category']; }, $Recently_Arrived_products_shuffle);
    $unique = array_unique($brand);
    sort($unique);
    shuffle($Recently_Arrived_products_shuffle);

    // request method post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['Recently_Arrived_submit'])){
            // call method addToCart
            /** @var TYPE_NAME $Cart */
            $Cart->addToCart($_POST['user_id'], $_POST['product_id']);
        }
        
        if (isset($_POST['Wishlist_submit'])){
            // call method addToWishlist
            /** @var TYPE_NAME $Wishlist */
            $Wishlist->addToWishlist($_POST['user_id'], $_POST['product_id']);

        }
    }


/** @var TYPE_NAME $Proudects */
$in_cart = $Cart->getCartId($Proudects->getData('cart'));
    $in_Wishlist = $Wishlist->getWishlistId($Proudects->getData('wishlist'));
    
?>

<!-- Recently Arrived -->
   <section id="Recently-Arrived">
      <div class="container" >
        <h3 class="jumbotron font-weight-bold text-center">Recently Arrived</h3>
        <hr>
        <div id="filters" class="button-groub text-left font-size-17 py-1" style="font-family: 'Libre Baskerville', serif;">
          <button class="btn btn-outline-info is-checked filter_btn" data-filter="*">ALL Category</button>
          <?php
                array_map(function ($brand){
                    printf('<button class="btn btn-outline-info ml-1 filter_btn" data-filter=".%s">%s</button>', $brand, $brand);
                }, $unique);
            ?>
        </div>
        
       <div class="grid">
       <?php array_map(function ($item) use($in_cart,$in_Wishlist) { ?>
         <div class="grid-item border-0 <?php echo $item['category'] ?? "Brand" ; ?>">
            <div class="item py-2" style="width:200px;">
            <div class="product font-rale">
             <div class="product-Recently-Arrived">
             <img src="<?php echo $item['product_image'] ?? "img/products/1.png"; ?>" alt="product1" class="img-fluid">
               <div class="overlay-right">
                <button type="button" class="btn btn-secondary btn-QuickView" title="Quick View" data-toggle="modal" data-target="#<?php echo $item['for_Model']; ?>">
                 <i class="fa fa-eye"></i>
                </button>
                    
                <form method="post">
                    <input type="hidden" name="product_id" value="<?php echo $item['product_id'] ?? '1'; ?>">
                    <input type="hidden" name="user_id" value="<?php echo getUserId() ?? '0'; ?>">
                    <?php
                    if (in_array($item['product_id'], $in_Wishlist  ?? [])){
                        echo '<button type="submit" disabled class="btn btn-inWishlist" title="In The Wishlist"><i class="fa fa-heart"></i></button>';
                    }else{
                         echo '<button type="submit" name="Wishlist_submit" class="btn btn-secondary btn-Wishlist" title="Add to Wishlist"><i class="fa fa-heart"></i></button>';
                    }
                     ?>
                </form>
                
                <form method="post">
                    <input type="hidden" name="product_id" value="<?php echo $item['product_id'] ?? '1'; ?>">
                    <input type="hidden" name="user_id" value="<?php echo getUserId() ?? '0'; ?>">
                    <?php
                    if (in_array($item['product_id'], $in_cart  ?? [])){
                        echo '<button type="submit" disabled class="btn btn-inCart" title="In The Cart"><i class="fa fa-shopping-cart"></i></button>';
                    }else{
                         echo '<button type="submit" name="Recently_Arrived_submit" class="btn btn-secondary btn-Cart" title="Add to Cart"> <i class="fa fa-shopping-cart"></i></button>';
                    }
                     ?>
                </form>
               </div>
              </div>
              <div class="text-center">
                <h6><?php echo $item['product_name'] ?? "Unknown"; ?></h6>
                <div class="rating text-warning font-size-12">
                 <span><i class="fas fa-star"></i></span>
                 <span><i class="fas fa-star"></i></span>
                 <span><i class="fas fa-star"></i></span>
                 <span><i class="fas fa-star"></i></span>
                 <span><i class="fas fa-star-half-alt"></i></span>
                </div>
                <div class="price py-2">
                  <span class="text-danger">$<?php echo $item['product_new_price'] ?? 0 ?></span>
                </div> 
              </div> 
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
                          <?php
                          if (in_array($item['product_id'], $in_cart  ?? [])){
                             echo '<button type="submit" disabled class="btn btn-success form-control">In The Cart</button>';
                         }else{
                            echo '<button type="submit" name="Recently_Arrived_submit" class="btn btn-warning form-control" title="Add to Cart">Add to Cart</button>';
                        }
                         ?>
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
         
         
         
         
         
         
        
        
        
        <?php }, $Recently_Arrived_products_shuffle) ?>  
       </div>  
     </div>  
    </section>
<!-- /End Recently Arrived -->
<!-- *********************************************************************************************** -->