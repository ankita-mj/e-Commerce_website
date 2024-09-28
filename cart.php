<?php
session_start();
if(isset($_SESSION['id'])){
$conn = mysqli_connect("localhost","root","","shop_db");
$sql2 = "";
if(isset($_GET['p_id'])){
  $uid = $_SESSION['id'];
  $pid = $_GET['p_id'];
  $q = $_GET['quantity'];
  $_SESSION['item']++;
  $sql1 = "INSERT INTO user_account(user_id,product_id,quantity) VALUES('{$uid}','{$pid}','{$q}');";
  $sql1 .= "UPDATE user_form SET purchased_item = purchased_item + 1 WHERE id = {$uid};";
  if ($conn->multi_query($sql1)) {
    do {
        // Check if the query produced a result set
        if ($result1 = $conn->store_result()) {
            // Free the result set if it exists
            $result1->free();
        } else {
            // Check if the error is not due to the absence of a result set
            if ($conn->errno) {
                echo "Store result error: " . $conn->error;
            }
            // No result set means it's a non-SELECT query (like INSERT, UPDATE)
        }
    } while ($conn->next_result()); // Move to the next query result
} else {
    // Handle error in multi_query
    echo "Error with multi_query: " . $conn->error;
}
}
$sql2 = "SELECT user_id,product_id,product.name as pname,product.prize as prize,stars,product.img as img, user_account.quantity as q FROM user_account,product,user_form WHERE user_account.product_id = product.id AND user_account.user_id = user_form.id and user_form.id = {$_SESSION['id']}";
$result2 = mysqli_query($conn,$sql2);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <style>
    
    .row{
      display:block;

    }
      .col-md-9{
        left:0;
        margin-top:60px;
        margin-left:0px;
        padding-top:10px;
        border-radius:15px;
        background-color:white;
      }
      .col-md-3{
        margin-top:60px;
        line-height:30px;
        background-color:rgb(67, 79, 94);
        color:white;
        border-radius:15px;
        border:7px solid rgb(234, 237, 237);
        height:250px;
        width:200px;

      }
      .col-md-3 span{
        color:white;
      }
      .col-md-3 h4{
        border-bottom:2px solid white;
      }
      .col-md-3 .pay{
        margin-top:50px;
        background-color:gold;
        border-radius:20px;
        text-align:center;
        border:none;
        width:230px;
      }
      ul.stars{
        display:inline-flex;
      }
      ul li i.fa-star{
        color:gold;
      }
        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        
        <title>Ecommerce </title>
        
        
        <!-- Additional CSS Files -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
        
        <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">
        
        <link rel="stylesheet" href="assets/css/owl-carousel.css">
        
        <link rel="stylesheet" href="assets/css/lightbox.css">
        <script src="jquery-3.7.1.js"></script>
  </head>
      <body style="background-color:rgb(234, 237, 237);  overflow-x:hidden;">
        <?php
          include "include/header.php";
        ?>
        
        <div class="container ">
          <div class="row">
            <div class="col-md-9">
              <h4>Shopping Cart</h4>
              <hr/>
              <?php
                if(mysqli_num_rows($result2)>0){
                  $num = mysqli_num_rows($result2);
              ?>
              <div class="container">
                <?php

                  while($row = mysqli_fetch_assoc($result2)){
                  
                ?>
                <div class="row mt-2">
                  <div class="col-md-6">
                    <div class="left-image">                  
                      <img src="uploads/<?=$row['img']?>" height="200px" width="200px"/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="right-content">
                      <div class="right-content">
                        <h5 style="margin-bottom:15px;">
                              <?php echo $row['pname']?> 
                              <form class="cartform" onsubmit="return someFunction(e)">
                              <input type="hidden" name="pid" id="pid" value="<?= $row['product_id']?>"/>
                              <input type="hidden" name="uid" id="uid" value="<?= $row['user_id']?>"/>
                              <button class="btn btn-dark ml-4 remove">Remove</button>
                  </form>
                        </h5>
                        <?php
                        // (isset($_GET['quantity']))?$q =$_GET['quantity'] :$q=1;
                        ?>
                        <b> &#8377;<span class="price"><?= $row['prize']?></span></b><br/>
                        <ul class="stars">
                          <?php
                          for($i = 1; $i<=$row['stars']; $i++){
                              echo "<li><i class='fa fa-star'></i></li>";
                          } 
                          ?>
                        </ul>
                        <div class="left-content">
                            <h6>No. of Orders</h6>
                        </div>
                        <div class="right-content">
                            <div class="quantity buttons_added">
                                <form action="" method="post" class="cartform">
                                    <input type="button" value="-" onclick="decrement(this)"; class="minus" id="minus">
                                    <input type="number" name="quantity"  id="quantity" value="<?= $row['q']?>" class="input-text qty text">
                                    <input type="button" value="+" class="plus" onclick="increment(this)" id="plus">
                                    <input type="hidden" name="pid" id="pid" value="<?= $row['product_id']?>"/>
                                    <input type="hidden" name="uid" id="uid" value="<?= $row['user_id']?>"/>
                            </div>
                        </div>
                        <div class="total">
                            <?php
                              $tp = $row['q'] * $row['prize'];
                            ?>
                            <h4>Total Amount: &nbsp;&nbsp;<h4>&#8377;</h4><h4 id="total"><?= $tp?></h4>
                            
                        </div> 
                      </div> 
                    </div>                   
                  </div>
                </div>
                <?php
                  }
                ?>
              </div>
              <?php
               }else{
                echo"<h5>No Item in cart</h5>";
               }
              ?>
            </div>
            <div class="col-md-3 pl-3 pt-3" style="position:fixed; margin-left:870px;">
              <h4>Proceed To Pay</h4>
              <hr/>
              <?php

               $sql3 = "SELECT sum(quantity) FROM user_account WHERE user_id = {$_SESSION['id']}";
               $result3 = mysqli_query($conn,$sql3); 
               $row3 = mysqli_fetch_assoc($result3);

               $sql4 = "SELECT sum(prize * quantity) AS tp from user_account inner join product on product.id = user_account.product_id and user_id = {$_SESSION['id']}";              
               $result4 = mysqli_query($conn,$sql4); 
               $row4 = mysqli_fetch_assoc($result4);
              ?>
              Total ( item<?= " <span>".$row3['sum(quantity)']."</span>"?>):<br/><b>&nbsp;&nbsp;&nbsp;&#8377;<?= " ".$row4['tp'].".00"?></b>
              <input type="button" class="pay" value="Proceed To Pay"/>
            </div>
          </div>
          <center><a href="index.php"><div class= "btn btn-dark mt-3 mb-3">Continue To Shopping</div></a></center>
        </div>
        <script>
         

  
  function decrement(obj){
    var q = obj.nextElementSibling.value;
  console.log(q);
  if(q>1){
    obj.nextElementSibling.value = parseInt(obj.nextElementSibling.value) - 1;
     $(document).ready(function(){
      var opp = $(obj);
      console.log(opp);
      var p = $(".price").html();
      var t = opp.next().val();
      console.log(opp.next());
      var tp = p*t;
      opp.closest(".row").find("#total").html(tp);
      // ("#total").html(tp);
     });
    }
  }
  function increment(obj){
    var q = obj.previousElementSibling.value;
  console.log(q);
  if(q<10){
    obj.previousElementSibling.value = parseInt(obj.previousElementSibling.value) + 1
    var opp = $(obj);
    var pid = opp.closest(".row").find("#pid").val();
    var uid = opp.closest(".row").find("#uid").val();
    $(document).ready(function(){
      console.log(pid);
      console.log(uid);
      $.ajax({
        url:"cartItem.php",
        type:"get",
        data:{p_id: pid,u_id: uid}
      });
      
      console.log(opp);
      var p = $(".price").html();
      var t = opp.prev().val();
      var tp = p*t;
      opp.closest(".row").find("#total").html(tp);
      
    });
  }
 }

          
            $(document).on("click",".remove",function(){
              //  $(".remove").html("jiii");
                  var pid = $(this).closest(".row").find("#pid").val();
                  var uid = $(this).closest(".row").find("#uid").val();
                  console.log("pid is "+pid);
                  console.log("pid is "+uid);
                  var row = $(this).closest(".row");
                  console.log("row is "+row);

                  $.ajax({
                      url:"deleteItem.php",
                      type: "POST",
                      data: {p_id: pid,u_id: uid},
                      success:function(data){
                        if(data == 1){
                           console.log(row);
                           // $(".remove").closest("tr").fadeOut();
                           row.fadeOut(); 
                        }
                      }
                    });
            });


            // $("#remove").on("click",function(){
            //   
            // });
        
          
</script>   
</body>
</html>
<?php
}else{
  header("location: http://localhost/ecommerece/login.php");
}
?>