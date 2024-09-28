<?php
session_start();
include "config.php";
if(isset($_POST['set'])){
   $name = mysqli_real_escape_string($conn,$_POST['n']);
    $email = mysqli_real_escape_string($conn,$_POST['e']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $pass = mysqli_real_escape_string($conn,md5($_POST['p']));
   $sql1 = "SELECT id FROM user_form WHERE email = '{$email}'";
   $result1 = mysqli_query($conn,$sql1) or die("query failed");
   if(mysqli_num_rows($result1)>0){
     $message = "email already exist!!";
   }else{
     $sql2 = "INSERT INTO user_form(name,email,password,phone) VALUES('{$name}','{$email}','{$pass}','{$phone}')";
     $result2 = mysqli_query($conn,$sql2) or die("query failed");
     header("location: http://localhost/ecommerece/login.php");
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    .container form h2{
      color:white;
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
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    
<body style=" background-image: url('assets/images/register.jpg');
    background-repeat: no-repeat;
    /* background-position: ; */
    background-size: cover;
    overflow-y:hidden;
   ">  <?php
    include "include/header.php";
  ?>
   
    <div class="container">
    <form class="col-md-5" style="margin-top:85px; margin-left:300px;" method="post" >

        <h2>REGISTER NOW</h2>
        <div class="form-group mt-2">
            <input type="text" id="n" name="n" class="form-control" style="height:35px;" placeholder="Enter Username" required autocomplete="off"/>
        </div>
        <div class="form-group">
            <input type="email" id="e" name="e" class="form-control"  style="height:35px;" placeholder="Enter email" required autocomplete/>
        </div>
        <div class="form-group">
            <input type="password" id="p" name="p" class="form-control"  style="height:35px;" placeholder="Enter Password" requirr autocomplete/>
        </div>
        <div class="form-group">
            <input type="password" id="cp" name="cp" class="form-control" style="height:35px;" onkeyup="checkpwd();" placeholder="Confirm Password" required autocomplete/>
        </div>
        <div class="form-group">
            <input type="text" id="phone" name="phone" class="form-control" style="height:35px;" placeholder="Enter phone No." required autocomplete/>
        </div>
        <div id="pass_status"></div>
        <?php
           if(isset($message)){
                echo"<div id='alert_msg' style='color:red'>$message</div>";
            }
        ?>
        <center><input type="submit" class="btn btn-dark mb-3" name="set" id="set" value="Register Now" style="margin-top:0px;"/></center>
        <p style="margin-top:0px;">already have an account?<a href="login.php">login_now</a></p>
    </form>
    </div>

    <script>
    // $(document).ready(function(e){
    //     $("#set").on("click",function(){
    //         e.preventDefault();
            
    //           var pwd = $("#p").val();
    //           var pwdc = $("#cp").val();
    //           console.log(pwd);
    //           console.log(pwdc);
    //           if(pwd != pwdc){
    //             console.log("not");
    //             $(".pass_status").html("password not match");
    //           }else{
    //             console.log("yes");
    //           }
    //         });
    //     });
    // $(document).ready(function(){
    //     $("#set").click(function(){
    //         $("#alert_msg").show();
    //     });
    // });
    // function head(){
    //     var h = document.getElementById('alert_msg');
    //     h.style="color:red";
    //     h.style="display:block";
    // }
    function checkpwd(){
        var pwd = document.getElementById('p').value;
        var pwdc = document.getElementById('cp').value;
        console.log(pwd);
        console.log(pwdc);
        if(pwd != pwdc){
            console.log("not match");
            document.getElementById('pass_status').style="color:red";
            document.getElementById('pass_status').innerHTML = "Password does not match.";
        }else{
        document.getElementById('pass_status').innerHTML = " ";
        console.log("matched");
        }
    }
    </script>    
</body>
</html>