<?php

session_start();
    function getUserId(){
        if(isset($_SESSION["login_user"])){


        $servername = "localhost";
        $username = "root";
        $dbPassword = "";
        $dbname = "online_shope";


        $user_check = $_SESSION['login_user'];

        $query = "SELECT * from register_user where user_email = '$user_check'";

// Create connection
        $conn = new mysqli($servername, $username, $dbPassword,$dbname);

// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
//echo "Connected successfully";

//$conn->close();
        $ses_sql = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($ses_sql);
        return $row['register_user_id'];

    }

}


function getUserName(){
    if(isset($_SESSION["login_user"])){


        $servername = "localhost";
        $username = "root";
        $dbPassword = "";
        $dbname = "online_shope";


        $user_check = $_SESSION['login_user'];

        $query = "SELECT * from register_user where user_email = '$user_check'";

// Create connection
        $conn = new mysqli($servername, $username, $dbPassword,$dbname);

// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
//echo "Connected successfully";

//$conn->close();
        $ses_sql = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($ses_sql);
        return $row['user_name'];

    }

}


