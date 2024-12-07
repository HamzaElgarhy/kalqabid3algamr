<?php

include('admin/db.php');
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM addcart WHERE id='$id'");
header('location: cart.php');
?>