<?php

$message='';
if (isset($_POST['email']) && isset($_POST["name"]) && isset($_POST["Password"])) {
    $User_Name = $_POST["name"];
    $Email = $_POST["email"];
    $Password = $_POST["Password"];
	$salt = "codeflix";
	$Password_encrypted = sha1($Password,$salt);
	


    if(!empty($User_Name) and !empty($Email) and !empty($Password)){
        if(filter_var($Email,FILTER_VALIDATE_EMAIL) !== false ) {
            if (!preg_match("#[a-zA-Z]+#",$Password)) {

                $servername = "localhost";
                $username = "root";
                $dbPassword = "";
                $dbname = "online_shope";
                //create connection
                $connect = new mysqli($servername, $username, $dbPassword,$dbname);
                if (mysqli_connect_error()) {
                    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
                }else{
                    $SELECT = "SELECT user_email From register_user Where user_email = ? Limit 1";
                    $INSERT = "INSERT Into register_user (user_name, user_email, user_password) values(?, ?, ?)";
                    //Prepare statement
                    $stmt = $connect->prepare($SELECT);
                    $stmt->bind_param("s", $Email);
                    $stmt->execute();
                    $stmt->bind_result($Email);
                    $stmt->store_result();
                    $num_Row = $stmt->num_rows;
                    if ($num_Row == 0) {
                        $stmt->close();

//                        $to      = $Email;
//                        $subject = 'Verification code for Verify Your Email Address';
//                        $body = 'hello sire we need to Verification your email';
//                        $headers = "From: sender email";
//
//                        if (mail($to, $subject, $body, $headers)) {
//                            echo "<script>alert('send mail successful');</script>";
//                        } else {
//                            echo "<script>alert('Email sending failed...');</script>";
//                        }


                        $stmt = $connect->prepare($INSERT);
                        $stmt->bind_param("sss", $User_Name, $Email, $Password_encrypted);
                        $stmt->execute();
                        echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'You are register successful',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        </script>";

                    }else{
                        $message = "Email Already Register";
                    }
                }
            } else {
                $message = "Password must be number";
            }
        }else{
            $message = "Input Valid Email";
        }
    } else{
        $message = "Fill The filed first";
    }

    echo $message;

}

