<?php


// Insert a new product in Database
include('db.php');

if(isset($_POST['upload'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $img = $_FILES['image'];
    $img_location = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_up = "../Images/" . $img_name;
    $insert = "INSERT INTO prod (name, price, image) VALUES ('$name', '$price', '$img_up')";
    mysqli_query($conn, $insert);

    if(move_uploaded_file($img_location, '../Images/'.$img_name)){
        echo "<script>alert('Product Uploaded Successfully')</script>";
    } else {
        echo "There's Something Wrong";
    }

    header('location: index.php');
}

?>