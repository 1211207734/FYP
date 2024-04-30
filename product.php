<!DOCTYPE html>
<html lang="en">
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    text-align:center;
}

nav {
    background-color: #444;
    color: #fff;
    padding: 10px;
    text-align: center;
}

header {
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align: center;
}

.logo h1 {
    font-size: 32px;
    margin: 0;
}

.logo h1 span {
    color: #f00; /* Change color as needed */
    font-weight: bold;
}

footer {
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align: center;
}

</style>


<header>
        <div class="logo">
            <h1>JBP<span>STORE</span></h1>
        </div>      
</header>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
</head>
<body>
    <nav>
        <h1>Products</h1>
    </nav>
    
    <div class="container">
    
        <div class="products">
            <?php
            // Database connection
            include('database.php');
            // Fetch products from the database
            $query = "SELECT Product_name,Product_price FROM products";
            $result = mysqli_query($connect, $query);

            // Display products
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='products'>";
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
