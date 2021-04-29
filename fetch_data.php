<?php
require_once ("functions.php");


//To get information of client
require_once("UserLogIn/userInfo.php");



//To Macke Coonection
$conn = new mysqli("localhost", "root", "","online_shope");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

 ?>
 <?php 
//To fetch Data (Filter) Mobile Page
if(isset($_POST["action"])){
    $query = "SELECT * FROM all_products WHERE product_type = 'M' ";
    
    
    if(isset($_POST["brand"])){
        $brand_filter = implode("','", $_POST["brand"]);
        $query .= "AND product_brand IN('".$brand_filter."')";
    }
    
    if(isset($_POST["ram"])){
        $ram_filter = implode("','", $_POST["ram"]);
        $query .= "AND product_ram IN('".$ram_filter."')";
    }
    
    if(isset($_POST["storage"])){
        $storage_filter = implode("','", $_POST["storage"]);
        $query .= "AND product_storage IN('".$storage_filter."')";
    }

    $statement = $conn->query($query);
    $total_row = $statement->num_rows;  
    $output = '';
  
    if($total_row > 0){
        while ($row=$statement->fetch_assoc()){
            /** @var TYPE_NAME $Proudects */
            /** @var TYPE_NAME $Cart */
            $output .=
            '<div class="col-md-3 mb-2">
			     <div class="item border border-success bg-light rounded">
			      <div class="product">
			        <img alt="img" src="'.$row['product_image'] .'" class="card-img-top"> 
			        <div class="text-center">
			         <h6 class="text-light text-center p-1 rounded bg-info">'. $row['product_name'].'</h6>
			        </div>
			        <div class="mt-2 ml-2">
			         <h4 class="text-danger">Price :'.$row['product_new_price'].' </h4>
			         <p>
			           Ram :  '.$row['product_ram'].' GB <br>
			           Storage : '.$row['product_storage'].'  GB <br>
			         </p>
			        </div>
			        
			        <div class="text-center mb-2">
			        <form method="post">
                            <input type="hidden" name="product_id" value='.$row['product_id'].'>
                            <input type="hidden" name="user_id" value='.getUserId().' >
                           ';
                            if (in_array($row['product_id'], $Cart->getCartId($Proudects->getData('cart')) ?? [])){
                          $output.=     ' <button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                            }else{
                           $output.=    ' <button type="submit" name="MobileDevice_submit" class="btn btn-warning font-size-12 add_to_cart">Add to Cart</button>';
                            }

            $output .='     
                        </form>
			        </div>
			      </div>  
			     </div>
			   </div>
              ';
        }
    }else {
        $output = '<img class="img-fluid" src="img/products/no-pro.jpg">';
    }
    echo $output; 
}


//To fetch Data (Filter) in WatchesPage
if(isset($_POST["action_W"])){
    $query = "SELECT * FROM all_products WHERE product_type = 'W' ";
    
    
    if(isset($_POST["brand"])){
        $brand_filter = implode("','", $_POST["brand"]);
        $query .= "AND product_brand IN('".$brand_filter."')";
    }
    
    
    $statement = $conn->query($query);
    $total_row = $statement->num_rows;
    $output = '';
    
    if($total_row > 0){
        while ($row=$statement->fetch_assoc()){
            $output .=
            '<div class="col-md-3 mb-2">
			     <div class="item border border-success bg-light rounded">
			      <div class="product">
			        <img alt="img" src="'.$row['product_image'] .'" class="card-img-top">
			        <div class="text-center">
			         <h6 class="text-light text-center p-1 rounded bg-info">'. $row['product_name'].'</h6>
			        </div>
			        <div class="mt-2 ml-2">
			         <h4 class="text-danger">Price :'.$row['product_new_price'].' </h4>
			        </div>
			        <div class="text-center mb-2">
			            <form method="post">
                            <input type="hidden" name="product_id" value='.$row['product_id'].'>
                            <input type="hidden" name="user_id" value='.getUserId().'>
                           ';
                               if (in_array($row['product_id'], $Cart->getCartId($Proudects->getData('cart')) ?? [])){
                                    $output.=     ' <button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                               }else{
                                    $output.=    ' <button type="submit" name="LaptopDevice_submit" class="btn btn-warning font-size-12 add_to_cart">Add to Cart</button>';
                               }

                        $output .=
                           '</form>
			     
			             </div>
			           </div>
			        </div>
			      </div>
                ';
        }
    }else {
        $output = '<img class="img-fluid" src="img/products/no-pro.jpg">';
    }
    echo $output;
}


//To fetch Data (Filter) Laptop Page
if(isset($_POST["action_L"])){
    $query = "SELECT * FROM all_products WHERE product_type = 'L' ";


    if(isset($_POST["Price_L"])){
        $Price_filter = implode("','",$_POST["Price_L"]);
        $query .= "AND product_new_price IN('".$Price_filter."')";
    }
    
    if(isset($_POST["brand_L"])){
        $brand_filter = implode("','", $_POST["brand_L"]);
        $query .= "AND product_brand IN('".$brand_filter."')";
    }
    
    if(isset($_POST["ram_L"])){
        $ram_filter = implode("','", $_POST["ram_L"]);
        $query .= "AND product_ram IN('".$ram_filter."')";
    }
    
    if(isset($_POST["storage_L"])){
        $storage_filter = implode("','", $_POST["storage_L"]);
        $query .= "AND product_storage IN('".$storage_filter."')";
    }
    
    $statement = $conn->query($query);
    $total_row = $statement->num_rows;
    $output = '';
    
    if($total_row > 0){
        while ($row=$statement->fetch_assoc()){
            $output .=
            '<div class="col-md-3 mb-2">
			     <div class="item border border-success bg-light rounded">
			      <div class="product">
			        <img alt="img" src="'.$row['product_image'] .'" class="card-img-top">
			        <div class="text-center">
			         <h6 class="text-light text-center p-1 rounded bg-info">'. $row['product_name'].'</h6>
			        </div>
			        <div class="mt-2 ml-2">
			         <h4 class="text-danger">Price :'.$row['product_new_price'].' </h4>
			         <p>
			           Ram :  '.$row['product_ram'].' GB <br>
			           Storage : '.$row['product_storage'].'  GB <br>
                       product_processor : '.$row['product_processor'].' <br>
			           product_screen_size : '.$row['product_screen_size'].' <br>
			         </p>
			        </div>
			        <div class="text-center mb-2">
			            <form method="post">
                            <input type="hidden" name="product_id" value='.$row['product_id'].'>
                            <input type="hidden" name="user_id" value='.getUserId().'>
                           ';
            if (in_array($row['product_id'], $Cart->getCartId($Proudects->getData('cart')) ?? [])){
                $output.=     ' <button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
            }else{
                $output.=    ' <button type="submit" name="LaptopDevice_submit" class="btn btn-warning font-size-12 add_to_cart">Add to Cart</button>';
            }

            $output .=
                '</form>
			        </div>
			      </div>
			     </div>
			   </div>
              ';
        }
    }else {
        $output = '<img class="img-fluid" src="img/products/no-pro.jpg">';
    }
    echo $output;
}

?>