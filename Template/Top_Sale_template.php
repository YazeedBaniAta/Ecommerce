  <?php

  shuffle($Top_Sale_Products_shuffle);
  
  // request method post
  if($_SERVER['REQUEST_METHOD'] == "POST"){
      if (isset($_POST['top_sale_submit'])){
          // call method addToCart
          /** @var TYPE_NAME $Cart */
          $Cart->addToCart($_POST['user_id'], $_POST['product_id']);

      }
      if (isset($_POST['WISHLIst_submit'])){
          // call method addToWishlist
          /** @var TYPE_NAME $Wishlist */
          $Wishlist->addToWishlist($_POST['user_id'], $_POST['product_id']);

      }
  }
  /** @var TYPE_NAME $Wishlist */
  /** @var TYPE_NAME $Proudects */
  $in_Wishlist = $Wishlist->getWishlistId($Proudects->getData('wishlist'));
  ?>
  
  <!-- Top Sale -->
    <section id="top-sale">
      <div class="container py-5">
        <h2 class="jumbotron font-weight-bold text-center" >Top Sale</h2>
        <hr>
       <!-- Owl carousel for top-sale -->
         <div class="owl-carousel owl-theme">
         <?php foreach ($Top_Sale_Products_shuffle as $item) { ?>
           <div class="item py-2">
            <div class="product font-rale">
              <button type="button" class="btn btn-light" title="Quick View" data-toggle="modal" data-target="#<?php echo $item['for_Model']; ?>" style="background-color: #F2F3F4; border: none;">
                   <img src="<?php echo $item['product_image'] ?? "img/products/1.png";?>" alt="product1" class="img-fluid">
              </button>
              <div class="text-center">
                <h6><?php echo  $item['product_name'] ?? "Unknown";  ?></h6>
                <div class="rating text-warning font-size-12">
                 <span><i class="fas fa-star"></i></span>
                 <span><i class="fas fa-star"></i></span>
                 <span><i class="fas fa-star"></i></span>
                 <span><i class="fas fa-star"></i></span>
                 <span><i class="far fa-star"></i></span>
                </div>
                <div class="price py-2">
                <del><span>$<?php echo $item['product_old_price'] ?? '0' ; ?></span></del>
                <span class="text-danger">$<?php echo $item['product_new_price'] ?? '0' ; ?></span>
                </div>
                <form method="post">
                    <input type="hidden" name="product_id" value="<?php echo $item['product_id'] ?? '1'; ?>"> 
                    <input type="hidden" name="user_id" value="<?php echo getUserId() ?? '0'; ?>">
                 
                    <?php
                    /** @var TYPE_NAME $Proudects */
                    if (in_array($item['product_id'], $Cart->getCartId($Proudects->getData('cart')) ?? [])){
                        echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                    }else{
                        echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12 add_to_cart">Add to Cart</button>';
                    }
                     ?>

                </form>
              </div> 
            </div>
           </div>
           <?php } // closing foreach function ?>
         </div>
          <?php foreach ($Top_Sale_Products_shuffle as $item_1) { ?>
          <!-- Modal For qiuik View -->
          <div class="modal fade" id="<?php echo $item_1['for_Model']; ?>" role="dialog">
              <div class="modal-dialog modal-lg">
                  <!-- Modal content-->
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" style="font-family:baloo;"><?php echo $item_1['product_name'] ?? "Unknown"; ?></h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="container">
                          <div class="row">
                              <div class="col-sm-6">
                                  <img src="<?php echo $item_1['product_image'] ?? "img/products/2.png"; ?>" alt="product1" class="img-fluid">
                                  <div class="form-row font-size-16" style="font-family:baloo;">
                                      <div class="col"><button type="submit" class="btn btn-danger form-control">Proceed To Buy</button></div>
                                      <div class="col">
                                          <form method="post">
                                              <input type="hidden" name="product_id" value="<?php echo $item_1['product_id'] ?? '1'; ?>">
                                              <input type="hidden" name="user_id" value="<?php echo getUserId() ?? '0'; ?>">
                                              <?php
                                              if (in_array($item_1['product_id'], $in_Wishlist  ?? [])){
                                                  echo '<button type="submit" disabled class="btn btn-success font-size-12">Save For Later</button>';
                                              }else{
                                                  echo '<button type="submit" name="WISHLIst_submit" class="btn btn-warning font-size-12">Add to Save Later</button>';
                                              }
                                              ?>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-6 py-5">
                                  <h5 style="font-family:baloo;">Some Detailes</h5>
                                  <small>By <?php echo $item_1['product_brand']; ?></small>
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
                                          <td class="text-danger">$<?php echo $item_1['product_new_price'] ?? 0 ?></td>
                                      </tr>

                                      <tr class="font-rale font-size-14">
                                          <td>Processor :</td>
                                          <td><?php echo $item_1['product_processor'] ?? 0 ?></td>
                                      </tr>
                                      <tr class="font-rale font-size-14">
                                          <td>Storage :</td>
                                          <td><?php echo $item_1['product_storage'] ?? 0 ?> GB</td>
                                      </tr>
                                      <tr class="font-rale font-size-14">
                                          <td>Camera :</td>
                                          <td><?php echo $item_1['product_camera'] ?? 0 ?> MP</td>
                                      </tr>
                                      <tr class="font-rale font-size-14">
                                          <td>Display :</td>
                                          <td><?php echo $item_1['product_screen_size'] ?? 0 ?></td>
                                      </tr>
                                      <tr class="font-rale font-size-14">
                                          <td>Ram :</td>
                                          <td><?php echo $item_1['product_ram'] ?? 0 ?> GB</td>
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

          <?php } // closing foreach function ?>




          <!-- /Owl carousel -->
      </div>
    </section>
  <!-- /End Top Sale --> 
<!-- *********************************************************************************************** -->