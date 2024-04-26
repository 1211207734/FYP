<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Products</h1>
        <div class="products">
            <?php
            // Database connection
            include
            // Fetch products from the database
            $query = "SELECT * FROM products";
            $result = mysqli_query($conn, $query);

            // Display products
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='product'>";
                echo "<h3>{$row['name']}</h3>";
                echo "<p>Price: {$row['price']}</p>";
                echo "</div>";
            }

            // Close database connection
            mysqli_close($conn);
            ?>
        </div>
    </div>
</body>
</html>
