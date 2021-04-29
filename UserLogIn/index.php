<?php
ob_start();
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Shopping Store</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Sweet Alert  -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />


    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300&display=swap" rel="stylesheet">

</head>
<style>

    * {
        box-sizing: border-box;
        font-family: 'Dela Gothic One', cursive;
    }

    body {
        background: #f6f5f7;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        font-family: 'Montserrat', sans-serif;
        height: 100vh;
        margin: -20px 0 50px;
    }

    h1 {
        font-weight: bold;
        margin: 0;
    }

    h2 {
        text-align: center;
    }

    p {
        font-size: 14px;
        font-weight: 100;
        line-height: 20px;
        letter-spacing: 0.5px;
        margin: 20px 0 30px;
    }

    span {
        font-size: 12px;
    }

    button  {
        border-radius: 20px;
        border: 1px solid #FF4B2B;
        background-color: #FF4B2B;
        color: #FFFFFF;
        font-size: 12px;
        font-weight: bold;
        padding: 12px 45px;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: transform 80ms ease-in;
    }

    button:active {
        transform: scale(0.95);
    }

    button:focus {
        outline: none;
    }
    .Sing:hover{
        background-color: #FFFFFF;
        color: #FF4B2B;
    }

    button.ghost {
        background-color: transparent;
        border-color: #FFFFFF;
    }
    .ghost:hover{
        color: #FF4B2B;
        background-color: #FFFFFF;
    }

    form {
        background-color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 50px;
        height: 100%;
        text-align: center;
    }

    input {
        background-color: #eee;
        border: none;
        padding: 12px 15px;
        margin: 8px 0;
        width: 100%;
    }

    .container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 14px 28px rgba(0,0,0,0.25),
        0 10px 10px rgba(0,0,0,0.22);
        position: relative;
        overflow: hidden;
        width: 768px;
        max-width: 100%;
        min-height: 480px;
    }

    .form-container {
        position: absolute;
        top: 0;
        height: 100%;
        transition: all 0.6s ease-in-out;
    }

    .sign-in-container {
        left: 0;
        width: 50%;
        z-index: 2;
    }

    .container.right-panel-active .sign-in-container {
        transform: translateX(100%);
    }

    .sign-up-container {
        left: 0;
        width: 50%;
        opacity: 0;
        z-index: 1;
    }

    .container.right-panel-active .sign-up-container {
        transform: translateX(100%);
        opacity: 1;
        z-index: 5;
        animation: show 0.6s;
    }

    @keyframes show {
        0%, 49.99% {
            opacity: 0;
            z-index: 1;
        }

        50%, 100% {
            opacity: 1;
            z-index: 5;
        }
    }

    .overlay-container {
        position: absolute;
        top: 0;
        left: 50%;
        width: 50%;
        height: 100%;
        overflow: hidden;
        transition: transform 0.6s ease-in-out;
        z-index: 100;
    }

    .container.right-panel-active .overlay-container{
        transform: translateX(-100%);
    }

    .overlay {
        background: #FF416C;
        background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
        background: linear-gradient(to right, #FF4B2B, #FF416C);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 0 0;
        color: #FFFFFF;
        position: relative;
        left: -100%;
        height: 100%;
        width: 200%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }

    .container.right-panel-active .overlay {
        transform: translateX(50%);
    }

    .overlay-panel {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 40px;
        text-align: center;
        top: 0;
        height: 100%;
        width: 50%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }

    .overlay-left {
        transform: translateX(-20%);
    }

    .container.right-panel-active .overlay-left {
        transform: translateX(0);
    }

    .overlay-right {
        right: 0;
        transform: translateX(0);
    }

    .container.right-panel-active .overlay-right {
        transform: translateX(20%);
    }


</style>

<body>

<?php
$error='';

if(isset($_POST["LogIn_submit"])){
    $LogIn_Email = $_POST["LogIn_Email"];
    $LogIn_password = $_POST["LogIn_password"];

    if(!empty($LogIn_Email) && !empty($LogIn_password)){
        if(filter_var($LogIn_Email,FILTER_VALIDATE_EMAIL) !== false ){
            $servername = "localhost";
            $username = "root";
            $dbPassword = "";
            $dbname = "online_shope";
            //create connection
            $connect = new mysqli($servername, $username, $dbPassword,$dbname);
            if (mysqli_connect_error()) {
                die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
            }else{
                $stat = "SELECT * From register_user Where user_email = '$LogIn_Email'";
                $result=$connect->query($stat);
                $row = $result->fetch_assoc();

                if($row["user_email"] == $LogIn_Email && $row["user_password"] == $LogIn_password){
                    $_SESSION['login_user'] = $LogIn_Email;
					if(isset($_SESSION["login_user"])){
						header("location:../index.php");
					}
                    exit();

                }else{
                    $error = ' Warning: No match for E-Mail Address and/or Password.';
                }

            }
        }else{
            $error = 'Input Valid Email';
        }
    }else{
        $error = 'Fill The form below first';
    }
}


?>


<div class="container" id="container">

<!--    to mack SingUp form (Creat Account)-->
    <div class="form-container sign-up-container">
        <form id="submitForm">
            <p id="SingUp_Result" class="text-danger"></p>
            <h1>Create Account</h1>
            <br>
            <input id="myInput" type="text" name="name" placeholder="Name" class="form-control" />
            <input id="myInput" type="text" name="email" placeholder="Email" class="form-control"/>
            <input id="myInput" type="password" name="Password" placeholder="Password" class="form-control"/>
            <button type="submit" class="Sing">Sign Up</button>
        </form>
    </div>

    <!--    to mack LogIn form-->
    <div class="form-container sign-in-container">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" >
            <p class="text-danger"><?php echo $error;?></p>
            <h1>Sign in</h1>
            <br>
            <input type="email" name="LogIn_Email" placeholder="Email" class="form-control"/>
            <input type="password" name="LogIn_password" placeholder="Password" class="form-control"/>
            <button type="submit" name="LogIn_submit" class="Sing">Sign In</button>
        </form>
    </div>

<!--  To change between creat account and login  -->
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start journey with us</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>

</div>





<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<!-- JS  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>



<script>



    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });

    $(document).ready(function(){
        $("#submitForm").on("submit", function(e){
            e.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                url  : 'signup.php',
                type : 'POST',
                cache:false,
                data : formData,
                success:function(result){
                    if(result){
                        $("#SingUp_Result").html(result);
						$('#submitForm')[0].reset();
                        
                    }else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong! Pleas try later',
                        })
                    }
                }
            });
        });
    });

</script>

</body>
</html>