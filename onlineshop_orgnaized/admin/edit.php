<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="../css/style_index.css">
</head>
<body>

    <?php
    // Edit Product Page
    
    include('db.php');
    $id = $_GET['id'];
    $update = mysqli_query($conn, "SELECT * FROM prod WHERE id='$id'");
    $data = mysqli_fetch_array($update);
    ?>
    <center>
        <div class="main">
            <form action="update.php" method="post" enctype="multipart/form-data">
                <h2>Edit Product</h2>
                <br>
                <input type="text" name="id" value="<?php echo $data['id']?>">
                <br>
                <input type="text" name="name" value="<?php echo $data['name']?>">
                <br>
                <input type="text" name="price" value="<?php echo $data['price']?>">
                <br>
                <input type="file" name="image" id="file" style="display:none;">
                <label for="file">Update product image</label>
                <button name="edit" type="submit">Edit Product</button>
                <br><br>
                <a href="../products.php">Show all Products</a> 
            </form>
        </div>

        <p>Designed by HASG</p>
    </center>
</body>
</html>