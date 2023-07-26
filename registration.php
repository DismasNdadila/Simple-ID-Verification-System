<?php 
include('./connect.php');
if (isset($_POST['submit'])) {

    $username= $_POST['username'];
    $payment=$_POST['payment'];
   

   $sql="INSERT INTO student(username,payment) VALUES ('$username','$payment')";
   $data=mysqli_query($conn,$sql);
if (!$data) {
    echo 'there is error with your connection'.mysqli_error($conn);
}
else {
    echo 'data entere successful';
}
}





?>



































<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./style.css" rel="stylesheet">
</head>
<body>
    <h3>STUDENTs PAYMENT STATUS</h3>
    <div class="king">
    <label for="enter username">enter username</label>
    <input type="text" value="username"><br>
    <label for="pay info">payment information</label>
    <input type="text" value="payment"><br>
    <input type="submit" value="submit">
</div>
</body>
</html>