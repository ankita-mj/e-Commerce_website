<?php
session_start();
if(isset($_SESSION['password']) && $_SESSION['password']=="1138dd6fdda5d617dfe218898ee02077"){

$conn = mysqli_connect("localhost","root","","shop_db");
if(isset($_POST['set'])){
    $name = mysqli_real_escape_string($conn,$_POST['n']);
    $prize = mysqli_real_escape_string($conn,$_POST['p']);
    $content = mysqli_real_escape_string($conn,$_POST['con']);
    $image = mysqli_real_escape_string($conn,$_FILES['fileToUpload']['name']);
    $type = mysqli_real_escape_string($conn,$_POST['type']);
    $file_name = $_FILES['fileToUpload']['name'];
    $tmp_name = $_FILES['fileToUpload']['tmp_name'];
    $sql2 = "INSERT INTO product(name,prize,stars,content,img,type) VALUES('{$name}','{$prize}',3,'{$content}','{$image}','{$type}')";
    $result2 = mysqli_query($conn,$sql2) or die("query failed");
    move_uploaded_file($tmp_name,"../uploads/".$file_name);
    header("location: http://localhost/ecommerece/admin.php");
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .container button{
            margin-bottom:0px;
            margin-left:200px;
            margin-top:10px;
            height:40px;
            width:100px;
        background-color:orange; 
        border:none; 
        border-radius:10px;
        }
        .container button a{
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
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    
<body>

   
    <div class="container">
    <form class="col-md-5" style="margin-top:80spx; margin-left:300px;" method="post" enctype="multipart/form-data">
        <button><a href="../admin.php">Back</a></button>

        <h2>Add Product</h2>
        <div class="form-group mt-2">
            <label for="name"> Product Name</label>
            <input type="text" id="n" name="n" class="form-control" style="height:35px;" required autocomplete="off"/>
        </div>
        <div class="form-group">
            <label for="prize">Prize</label>
            <input type="text" id="p" name="p" class="form-control"  style="height:35px;" required autocomplete/>
        </div>
        <div class="form-group mt-2">
            <label for="type">type</label>
            <!-- <input type="text" id="n" name="n" class="form-control" style="height:35px;" required autocomplete="off"/> -->
            <select name="type" id="type" class="form-control">
                <option value="men">Men</option>
                <option value="women">Women</option>
                <option value="kids">Kids</option>
            </select>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <input type="text" id="con" name="con" class="form-control"  style="height:35px;" requirr autocomplete/>
        </div>
        <div class="form-group">
            <label for="img">Image</label>
            
            <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" style="height:35px;" required autocomplete/>
        </div>
        
        <center><input type="submit" class="btn btn-dark mb-3" name="set" id="set" value="ADD Product" style="margin-top:5px;"/></center>
    </form>
    </div>    
</body>
</html>
<?php
}
?>