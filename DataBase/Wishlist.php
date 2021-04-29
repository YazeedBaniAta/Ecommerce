<?php
namespace DataBase;

class Wishlist{
    public $db = null;
    
    public function __construct(dbController $db){
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    
    
    public  function insertIntoWishlist($params = null, $table = "wishlist"){
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
    
    
    // to get user_id and item_id and insert into Wishlist table
    public  function addToWishlist($userid, $productid){
        if (isset($userid) && isset($productid)){
            $params = array(
                "user_id" => $userid,
                "product_id" => $productid
            );
            
            // insert data into cart
            $result = $this->insertIntoWishlist($params);
            if ($result){
                // Reload Page
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }
    
    // get products_id of shopping Wishlist
    public function getWishlistId($cartArray = null, $key = "product_id"){
        if ($cartArray != null){
            $wishlist_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $cartArray);
                return $wishlist_id;
        }
    }
    
    // delete from wshlist
    public function deleteWishlist($product_id = null, $table = 'wishlist'){
        if($product_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE product_id={$product_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
    
    
    
}

