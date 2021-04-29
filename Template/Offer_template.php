<?php

// request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['Offer_submit'])){
        // call method addToCart
        /** @var TYPE_NAME $Cart */
        $Cart->addToCart($_POST['user_id'], $_POST['product_id']);
    }
}

/** @var TYPE_NAME $Proudects */
$in_cart = $Cart->getCartId($Proudects->getData('cart'));
?>

<!-- OFFER -->
<section id="OFFER">
  <div class="offer">
  <?php array_map(function ($item) use($in_cart){ ?>
    <div class="container">
      <div class="row-offer">
        <div class="col-2">
         <img alt="Offer" src="<?php echo $item['product_image'] ?? "img/products/exculusiv.png"; ?>" class="offer-img" style="width:100%; ">
        </div>
        <div class="col-2">
         <p>Exclusively Available on RADMY Store</p>
         <h1><?php echo $item['product_name'] ?? "Unknown"; ?></h1>
         <small>The MI smart Band 4 features a 39.8% larger 
         (Than Mi Band 3) Amoled color full-Touch display with
         adjustable brightness, so evreything is clear as can
         be.</small>
         <hr>
         <form method="post">	 
         <button type="button" class="offer-btn btn btn-outline-info" data-toggle="modal" data-target="#<?php echo $item['for_Model']; ?>">Quik View</button>
         <input type="hidden" name="product_id" value="<?php echo $item['product_id'] ?? '1'; ?>">
         <input type="hidden" name="user_id" value="<?php echo getUserId() ?? '0'; ?>">
         <?php
            if (in_array($item['product_id'], $in_cart  ?? [])){
                 echo '<button type="submit" disabled class="offer-btn btn btn-success font-size-12">IN The Cart</button>';
           }else{
                 echo '<button type="submit" name="Offer_submit" class="offer-btn btn btn-warning font-size-12">Add To Cart &#8594;</button>';
           }
          ?>
          </form>
        </div>
      </div>
    </div>
    
              <!-- Modal For Qiuk View -->      
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
             		    <div class="col py-4"><button type="submit" class="btn btn-danger form-control">Proceed To Buy</button></div>
                        <div class="col py-4">
                            <form method="post">
                                <input type="hidden" name="product_id" value="<?php echo $item['product_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                <?php
                                if (in_array($item['product_id'], $in_cart  ?? [])){
                                    echo '<button type="submit" disabled class="btn btn-success font-size-12">IN The Cart</button>';
                                }else{
                                    echo '<button type="submit" name="Offer_submit" class="btn btn-warning font-size-12">Add To Cart</button>';
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
                		  <td>Color :</td>
                		  <td>Bink</td>
               		 </tr>
                 </table>
               </div>
             </div>
           </div>
          <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-top:5%; ">Close</button>
        </div>   
      </div>
     </div>
   <!-- /Modal For Qiuk View -->
    <?php }, $OFFER_products) ?>  
  </div>
</section>  
<!-- /End OFFER -->
<!-- *********************************************************************************************** -->