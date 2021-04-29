<?php
namespace DataBase;

class All_Proudects
{
    public $db = null;
    
    public function __construct(dbController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    
    // fetch product data using getData Method
    public function getData($table = 'all_products'){
        $result = $this->db->con->query("SELECT * FROM {$table}");
        
        $resultArray = array();
        
        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        
        return $resultArray;
    }
    
    // fetch Top Sale product data using getTopSaleData Method
    public function getTopSaleData($table = 'all_products'){
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE product_position='T_S'");
        
        $resultArray = array();
        
        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        
        return $resultArray;
    }
    
    // fetch Recently Arrived Products data using getTopSaleData Method
    public function getRecentlyArrivedData($table = 'all_products'){
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE product_position='R_A'");
        
        $resultArray = array();
        
        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        
        return $resultArray;
    }
    
    // fetch OFFER Products data using getOfferData Method
    public function getOfferData($table = 'all_products'){
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE product_position='O_P'");
        
        $resultArray = array();
        
        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        
        return $resultArray;
    }
    
    
    
    // get product using item id
    public function getProduct($product_id = null, $table= 'all_products'){
        if (isset($product_id)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE product_id={$product_id}");
            
            $resultArray = array();
            
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            
            return $resultArray;
        }
    }
    
}

