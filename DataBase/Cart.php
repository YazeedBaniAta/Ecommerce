<?php
namespace DataBase;

class Cart
{
    public $db = null;
    
    public function __construct(dbController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    
    
    public  function insertIntoCart($params = null, $table = "cart"){
        if ($this->db->con != null){
            if ($params != null){
             
                // get table columns
                $columns = implode(',', array_keys($params));
                
                $values = implode(',' , array_values($params));
                
                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);
                
                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }
    
    
    // to get user_id and item_id and insert into cart table
    public  function addToCart($userid, $productid){
        if (isset($userid) && isset($productid)){
            $params = array(
                "user_id" => $userid,
                "product_id" => $productid  
            );
            
            // insert data into cart
            $result = $this->insertIntoCart($params);
            if ($result){
                // Reload Page
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }
    
    
    // delete cart item using cart item id
    public function deleteCart($product_id = null, $table = 'cart'){
        if($product_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE product_id={$product_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
    
    // calculate sub total
    public function getSum($arr){
        if(isset($arr)){
            $sum = 0.0;
            foreach ($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f' , $sum);
        }
    }
    
    // get products_id of shopping cart list
    public function getCartId($cartArray = null, $key = "product_id"){
        if ($cartArray != null){
            $cart_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $cartArray);
                return $cart_id;
        }
    }
    
    
    
    
    
    
    
    
}

