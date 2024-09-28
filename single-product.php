<?php
session_start();
if(isset($_SESSION['id'])){
    include "config.php";
$pid = $_GET['id']; 
$q = "";
$sql="SELECT * FROM product WHERE id = {$pid}"; 
$result= mysqli_query($conn,$sql);  
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
        
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
    <script src="jquery-3.7.1.js"></script>
</head>
<body>
    <!-- ***** Preloader Start ***** -->
    <!-- <div id="preloader"> 
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>   -->
    <!-- ***** Preloader End ***** -->
   <?php
    include "include/header.php";
    ?> 
    <!-- header -->
    
    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Single Product Page</h2>
                        <span>View your interested product in detailed to Purchase</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Product Area Starts ***** -->
    <?php
     $row = mysqli_fetch_assoc($result);
    ?>
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                <div class="left-images">
                    <img src="uploads/<?= $row['img']?>" height="400px" width="200px" alt="">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="right-content">
                    <h4><?= $row['name']?></h4>
                    <h4>&#8377;</h4><h4 class="price"><?= $row['prize']?></h4>
                    <ul class="stars">
                        <?php
                        for($i = 1; $i<=$row['stars']; $i++){
                            echo "<li><i class='fa fa-star'></i></li>";
                        }
                        ?>
                    </ul>
                    <span><?php echo $row['content']?></span>
                    <div class="quote">
                        <i class="fa fa-quote-left"></i><p><?php echo $row['content']?></p>
                    </div>
                    <div class="quantity-content">
                        <div class="left-content">
                            <h6>No. of Orders</h6>
                        </div>
                        <div class="right-content">
                            <div class="quantity buttons_added">
                                <form action="cart.php" method="get">
                                    <input type="button" value="-" class="minus">
                                    <input type="hidden" name="p_id" value="<?= $pid?>">
                                    <input type="number" name="quantity" id="quantity" value="1" class="input-text qty text">
                                   <input type="button" value="+" class="plus">
                            </div>
                        </div>
                        <div class="total">
                            <h4>Total Amount: &nbsp;&nbsp;<h4>&#8377;</h4><h4 id="total"><?= $row['prize']?></h4>
                            <!-- <div class="main-border-button"><a href="cart.php">Add To Cart</a></div> -->
                            <input type="submit" class= "btn btn-dark ml-5 mt-3" value="Add To Cart"/>
                        </div>       
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
        <!-- ***** Product Area Ends ***** -->
    
    <!-- ***** Footer Start ***** -->
    <?php  
      include "include/footer.php";
    ?>
    
    <script>
        $(document).ready(function(){
            
            var i = $("#quantity").val();
            $(".minus").on("click",function(){
                if(i>1){
                // console.log(i);
                var t1 = --i;
                $("#quantity").val(t1);
                var p = $('.price').html();
                var t = $("#quantity").val();
                var tp = p*t;
                $("#total").html(tp);
                // alert($("#total").html());
                }
            });
    
            $(".plus").click(function(){
            if(i<10){
                    // console.log(i);
                    var t2 = ++i;
                    $("#quantity").val(t2);
                    var p = $(".price").html();
                    var t = $("#quantity").val();
                    var tp = p * t;
                    $("#total").html(tp);
                } 
            });
            
        });
        
        </script>
    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    <script src="assets/js/quantity.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>


       

  </body>

</html>
<?php

}else{
    header("location: http://localhost/ecommerece/login.php");
}
?>
