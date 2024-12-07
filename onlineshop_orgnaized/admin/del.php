<?php

// Delete Prouct from Datebase
include('db.php');

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM prod WHERE id='$id'");
header('location: products.php');


?>