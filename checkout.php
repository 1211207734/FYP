<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - JBPSTORE</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>JBPSTORE - Checkout</h1>
        <div class="checkout">
            <?php
            // Display selected products for checkout
            if (isset($_POST['selected_products'])) {
                $selectedProducts = $_POST['selected_products'];
                echo "<h2>Selected Products:</h2>";
                echo "<ul>";
                foreach ($selectedProducts as $productId) {
                    // Fetch product details from the database
                    $query = "SELECT * FROM products WHERE id = $productId";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    echo "<li>{$row['name']} - {$row['price']}</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No products selected for checkout.</p>";
            }
            ?>
            <form action="place_order.php" method="post">
                <button type="submit">Place Order</button>
            </form>
        </div>
    </div>
</body>
</html>
