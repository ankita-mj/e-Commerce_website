<?php
 $conn = mysqli_connect("localhost","root","","shop_db");
 $sql = "UPDATE product SET stars = stars + 1 WHERE id={$_GET['id']}";
 mysqli_query($conn,$sql);
 header("location: http://localhost/ecommerece/index.php");
?>