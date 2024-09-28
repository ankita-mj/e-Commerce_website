<?php
$conn = mysqli_connect("localhost","root","","shop_db");
$sql = "UPDATE user_account set quantity = quantity + 1 where user_id = {$_GET['u_id']} and product_id = {$_GET['p_id']};";
$mysqli_query($conn,$sql);
?>