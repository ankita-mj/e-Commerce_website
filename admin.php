<?php
session_start();
if(isset($_SESSION['password']) && $_SESSION['password']=="1138dd6fdda5d617dfe218898ee02077"){
$conn = mysqli_connect("localhost","root","","shop_db");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        button{
            border:none; 
            border-radius:10px;
            background-color:orange;
        }
        button a{
            color:white;
            text-decoration: none;

        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title></title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="style.css"/>

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
    <div class="container">
    <div class="col-md-11" style="margin-top:60px ">
    <button><a href="admin/add.php">ADD PRODUCT</a></button>
    <h1>All Products</h1>
            <hr/>
            <table border="2px" cellpadding="15px">
                <thead>
                    <th>id</th>
                    <th>product name</th>
                    <th>Prize</th>
                    <th>Rates</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Type</th>
                </thead>
                <?php
                $sql = "select* from product";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['prize']?></td>
                    <td><?php echo $row['stars']?></td>
                    <td><?php echo $row['content']?></td>
                    <td><?php echo $row['img']?></td>
                    <td><?php echo $row['type']?></td>
                    <td id="box">
                        <button><a href="admin/edit.php?id=<?php echo $row['id']?>">edit</a></button>
                        <button><a href="admin/delete.php?id=<?php echo $row['id']?>">delete</a></button>
                    </td>
                </tr>
                <?php }} ?>
            </table>
        </div>
    </div>
</center>
</body>
</html>
<?php
}else{
    header("location: http://localhost/ecommerece/index.php");
}
?>