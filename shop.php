<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JBPSTORE - Your Mobile Gadgets Shop</title>
    <link rel="stylesheet" href="/css/shop.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>JBP<span>STORE</span></h1>
        </div>
    </header>
    
    <nav>
        <a href="index.html">Home</a> | 
        <a href="about.html">About Us</a> | 
        <a href="about.html">Contact Us</a>
    </nav>
    <section id="featured-products">
    <h2>Featured Products</h2>
    <?php
        // Database connection
        include('database.php');
        // Fetch featured products from the database
        $query = "SELECT Product_name, Product_details, Product_price FROM Products";
        $result = mysqli_query($connect, $query);

        // Display featured products
        while ($row = mysqli_fetch_assoc($result)) {?>
            <div class="product">
            <img src="images/<?php echo $row['Product_name']?>.jpg" alt="<?php echo $row['Product_name']?>" width="100" height="30">
            <?php
            echo "<h3>{$row['Product_name']}</h3>";
            echo "<p>{$row['Product_details']}</p>";
            echo "<p><b>Price: </b>RM {$row['Product_price']}</p>";?>
            <button>Add to Cart</button><br>
            </div>
       <?php }

        // Close database connection
        mysqli_close($connect);
    ?>
</section>

    <footer>
        <p>&copy; 2024 JBPSTORE - Your Mobile Gadgets Shop. All rights reserved.</p>
    </footer>
</body>
</html>
