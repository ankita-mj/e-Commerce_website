<?php
  session_start();
  if(isset($_SESSION['id'])){
  $conn = mysqli_connect("localhost","root","","shop_db") or die("connection failed");
  $sql = "SELECT * FROM user_form WHERE id = {$_SESSION['id']}";
  $result = mysqli_query($conn,$sql) or die("query failed");
  $row = mysqli_fetch_assoc($result);
  $id = $row['id'];
  $name = $row['name'];
  $email = $row['email'];
  $phone = $row['phone'];
  $item = $row['purchased_item'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    
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
<body>
    <center>
    <?php
    include "include/header.php";
    ?>
    
    <div class="container" style="margin-top:55px; margin-left:125px padding:0px;">
            <div class="col-md-5">
                <div class="card shadow">
                    <center>
                      <img src="assets/images/user-tie-solid.svg" style="margin-top:15px;" height="90px" width="90px" alt="img1"/>
                    </center>
                    <div class="card-body p-2">
                        <h5 class="card-title"><h5>
                        <h6>
                            User Id: <?php echo $id?>
                        </h6>
                        <h6>
                            <?php echo $name?>
                        </h6>
                        <p class="card-text">
                           <?= $email?>
                        </p>
                        <p class="card-text"><big><b>Mobile:</big></b><?php echo $phone?></p>
                        <p class="card-text"><big><b>Purchased Item:</big></b><?php echo $item?></p>
                    </div>
                </div>  
            </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</center>
  
</body>
</html>
<?php 
}else{
    header("location: http://localhost/ecommerece/login.php");
}
?>