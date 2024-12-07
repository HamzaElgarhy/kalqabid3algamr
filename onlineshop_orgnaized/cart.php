<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <style>
        h3 {
    font-family: 'Cairo', sans-serif;
    font-weight: bold;
    margin-top: 20px;
    color: #333;
}

main {
    width: 80%;
    margin: 30px auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

thead {
    background-color: #007bff;
    color: #fff;
}

thead th {
    padding: 15px;
    font-size: 1rem;
    text-transform: uppercase;
}

tbody td {
    padding: 10px;
    font-size: 1rem;
    color: #555;
}

tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
}

tbody tr:nth-child(even) {
    background-color: #fff;
}

.btn-danger {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 0.9rem;
    transition: background-color 0.3s ease;
}

.btn-danger:hover {
    background-color: #c82333;
}

a {
    font-family: 'Cairo', sans-serif;
    font-size: 1rem;
    color: #007bff;
    text-decoration: none;
    margin-top: 10px;
}

a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
    <center>
        <h3>Your Products</h3>
    </center> 
    <main>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('admin/db.php');
                $result = mysqli_query($conn, "SELECT * FROM addcart");
                while ($row = mysqli_fetch_array($result)) {
                    echo "
                        <tr>
                            <td>$row[name]</td>
                            <td>$row[price]</td>
                            <td><a href='del_cart.php?id=$row[id]' class='btn btn-danger'>Delete</a></td>
                        </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </main>
    <center>
        <a href="shop.php">Return To Products</a>
    </center>
</body>
</html>
