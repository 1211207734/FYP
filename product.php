<!DOCTYPE html>
<html lang="en">
<header>
        <div class="logo">
            <h1>JBP<span>STORE</span></h1>
        </div>      
</header>
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
            include('database.php');
            // Fetch products from the database
            $query = "SELECT Product_name,Product_price FROM products";
            $result = mysqli_query($connect, $query);

            // Display products
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='product'>";
                echo "<h3>{$row['Product_name']}</h3>";
                echo "<p>Price: {$row['Product_price']}</p>";
                echo "</div>";
            }

            // Close database connection
            mysqli_close($connect);
            ?>
        </div>
    </div>
</body>
<footer>
        <p>&copy; 2024 JBPSTORE - Your Mobile Gadgets Shop. All rights reserved.</p>
</footer>
</html>
