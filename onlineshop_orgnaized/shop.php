<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="css/style_shop.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark">
        <a id="car" class="navbar-brand" href="cart.php">My Cart</a>
    </nav>

    <!-- Heading -->
    <h3>Available Products</h3>

    <!-- Products Section -->
    <main>
        <?php
        include('admin/db.php');
        $result = mysqli_query($conn, "SELECT * FROM prod");
        

        while ($row = mysqli_fetch_array($result)) {
            $image_path = "Images/" . $row['image'];
            echo "
                <div class='card'>
                    <img src='$image_path' class='card-img-top' alt='Product Image'>
                    <div class='card-body'>
                        <h5 class='card-title'>$row[name]</h5>
                        <p class='card-text'>$row[price]</p>
                        <a href='val.php?id=$row[id]' class='btn btn-success'>Add to cart</a>
                    </div>
                </div>
            ";
        }
        ?>
    </main>

</body>
</html>
