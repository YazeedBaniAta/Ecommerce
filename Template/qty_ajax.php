<?php
use DataBase\dbController;
use DataBase\All_Proudects;

// require dbController.php file
require ('../DataBase/dbController.php');


// require All Product Class
require ('../DataBase/All_Proudects.php');

// DBController object
$db = new dbController();


// All products object
$Proudects = new All_Proudects($db);



if (isset($_POST['itemid'])){
    $Result = $Proudects->getProduct($_POST['itemid']);
    echo json_encode($Result);
}
