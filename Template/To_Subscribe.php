<?php


$Subscribe_message = '';
if (isset($_POST['email_Subscribe'])) {

    $email_Subscribe = $_POST["email_Subscribe"];



    if (!empty($email_Subscribe)) {
        if (filter_var($email_Subscribe, FILTER_VALIDATE_EMAIL) !== false) {

                $server_name = "localhost";
                $username = "root";
                $dbPassword = "";
                $dbname = "online_shope";
                //create connection
                $connect = new mysqli($server_name, $username, $dbPassword, $dbname);
                if (mysqli_connect_error()) {
                    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
                } else {
                    $SELECT = "SELECT email From subscribe Where email = ? Limit 1";
                    $INSERT = "INSERT Into subscribe (email) values(?)";
                    //Prepare statement
                    $stmt = $connect->prepare($SELECT);
                    $stmt->bind_param("s", $email_Subscribe);
                    $stmt->execute();
                    $stmt->bind_result($email_Subscribe);
                    $stmt->store_result();
                    $num_Row = $stmt->num_rows;
                    if ($num_Row == 0) {
                        $stmt->close();
                        $stmt = $connect->prepare($INSERT);
                        $stmt->bind_param("s", $email_Subscribe);
                        $stmt->execute();
                        echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Tanks for Subscribe',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        </script>";

                    } else {
                        $Subscribe_message = "Email Already Subscribe";
                    }
                }

        } else {
            $Subscribe_message = "Input Valid Email";
        }
    } else {
        $Subscribe_message = "Fill The filed first";
    }

    echo $Subscribe_message;

}


