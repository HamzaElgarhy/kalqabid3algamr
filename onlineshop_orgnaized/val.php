<?php

// Adding item to cart page
include('admin/db.php');

$id = $_GET['id'];
$up = mysqli_query($conn, "SELECT * FROM prod WHERE id=$id");
$data = mysqli_fetch_array($up);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Out</title>
    <style>
        input{
            display: none;
        }
        .main{
            width: 30%;
            padding: 20px;
            box-shadow: 1px 1xp 10px silver;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <center>
        <div class="main">
            <form action="insert_cart.php" method="post">
                <h2>Are you want to buy</h2>
                <input type="text" name="id" value="<?php echo $data['id']?>">
                <input type="text" name="name" value="<?php echo $data['name']?>">
                <input type="text" name="price" value="<?php echo $data['price']?>">
                <button name="add" type="submit" class="btn btn-warning">Add Product to cart</button>
                <br>
                <a href="shop.php">Return to all Products</a>
            </form>
        </div>
    </center>
</body>
</html>