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
    <link rel="stylesheet" href="../css/style_prod.css">
</head>

<body>

    <h3>All Products | Admin Panel</h3>

    <?php

    // Products Page for admin

    include('db.php');

    $result = mysqli_query($conn, "SELECT * FROM prod");
    echo "<main>";  // Start the main wrapper here
    while ($row = mysqli_fetch_array($result)) {
        echo "
            <div class='card'>
                <img src='$row[image]' class='card-img-top' alt='Product Image'>
                <div class='card-body'>
                    <h5 class='card-title'>$row[name]</h5>
                    <p class='card-text'>$row[price]</p>
                    <a href='del.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>
                    <a href='edit.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a>
                </div>
            </div>
        ";
    }
    echo "</main>";  // Close the main wrapper here

    ?>

</body>

</html>
