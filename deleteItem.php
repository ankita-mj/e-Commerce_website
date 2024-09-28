<?php
session_start();
--$_SESSION['item'];
$conn = mysqli_connect("localhost","root","","shop_db");
$sql = "DELETE FROM user_account WHERE product_id = {$_POST['p_id']};
       UPDATE user_form SET purchased_item = purchased_item - 1 WHERE id = {$_POST['u_id']};";
mysqli_multi_query($conn,$sql);
echo 1;
?>