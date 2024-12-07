<?php
include('admin/db.php');

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $insert = "INSERT INTO addcart (name, price) VALUES ('$name', '$price')";
    mysqli_query($conn, $insert);
    header('location: cart.php');
}
?>