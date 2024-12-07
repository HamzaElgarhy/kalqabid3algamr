<?php

//Update data in Database

include('db.php');

if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $img = $_FILES['image'];
    $img_location = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_up = "../Images/" . $img_name;
    $update = "UPDATE prod SET name='$name', price='$price', image='$img_up' WHERE id='$id'";
    mysqli_query($conn, $update);

    if(move_uploaded_file($img_location, 'Images/'.$img_name)){
        echo "<script>alert('Product Updated Successfully')</script>";
    } else {
        echo "There's Something Wrong";
    }

    header('location: products.php');
}

?>