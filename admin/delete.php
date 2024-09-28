<?php
session_start();
if(isset($_SESSION['password']) && $_SESSION['password']=="1138dd6fdda5d617dfe218898ee02077"){
    include "../config.php";
    $sql1 = "SELECT img FROM product WHERE id = {$_GET['id']}";
    $result1 = mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_assoc($result1);
    unlink("../uploads/{$row1['img']}");

    $sql = "DELETE FROM product WHERE id = {$_GET['id']}";
    mysqli_query($conn,$sql);
    header("location: http://localhost//ecommerece/admin.php");

}
?>