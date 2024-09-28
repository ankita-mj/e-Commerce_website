<?php
if(isset($_FILES['file'])){
    echo $_FILES['file']['erorr'];
 echo"<pre>";
   print_r($_FILES);
 echo"</pre>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input type="file" name="file" id="file"/>
    <input type="submit"/>
</body>
</html>