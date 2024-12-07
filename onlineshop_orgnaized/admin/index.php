<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="../css/style_index.css">
</head>
<body>
    <center>
        <div class="main">
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <h2>Online Shop</h2>
                <img src="../Logo/logo.png" alt="logo" width="350px">
                <input type="text" name="name" placeholder="Product Name">
                <br>
                <input type="text" name="price" placeholder="Product Price">
                <br>
                <input type="file" name="image" id="file" style="display:none;">
                <label for="file">Select product image</label>
                <button name="upload">Upload Product</button>
                <br><br>
                <a href="products.php" target="_blank">Show all Products</a> 
            </form>
        </div>

        <p>Designed by HASG</p>
    </center>
</body>
</html>