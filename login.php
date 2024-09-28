<?php
session_start();
$conn = mysqli_connect("localhost","root","","shop_db");
if(isset($_POST['set'])){
  $email = mysqli_real_escape_string($conn,$_POST['e']);
  $pass = mysqli_real_escape_string($conn,md5($_POST['pwd']));
  $sql = "SELECT * FROM user_form WHERE email = '{$email}' AND password = '{$pass}'";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['item'] = 0;

    header("location: http://localhost/ecommerece/index.php");
}else{
      $message = "user not exist create a new account!!";
   
  }
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <style>
 body {
    background-image: url('assets/images/loginback.jpg');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
}
.container form p{
    color:black;
    background-color:white;
}


    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <title></title>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
</head>
<body style=" background-image: url('assets/images/loginback.jpg');
    background-repeat: no-repeat;
    /* background-position: ; */
    background-size: cover;
    overflow-y:hidden;
   
   ">
<?php
   include "include/header.php";
?>
    <div class="container" style=" height:390px;">
        <form class="col-md-5" style= "margin-top:100px;  bottom-margin:5px; margin-left:300px; padding:20px 50px 10px 50px; border-radius:30px" method="post">
            <h2>Login</h2>
                <div class="form-group mt-2">
                    <input class="form-control" type="email" name="e" id="e" placeholder="Enter Email" required/>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="pwd" id="pwd" placeholder="Enter Password" required/>
                </div>
                <?php
                if(isset($message)){
                   echo"<div id='alert_msg' style='color:red'>$message</div>";
                }
                ?>
                    <center><input type="submit" class="btn btn-dark mb-3" name="set" id="set" value="Login Now"/></center>
                    <p>don't have any account? <a href="register.php">Register_now</a></p>
        </form>
    </div>
<script>
  
</script>
</body>
</html>