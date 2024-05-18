<?php
// Start the session
session_start();

// Include database connection file
include('database.php');

// Check if the required POST parameters are set
if (isset($_POST['eml']) && isset($_POST['product_id'])) {
    $eml = $_POST['eml'];
    $product_id = $_POST['product_id'];

    // Prepare to retrieve the Customer_ID based on the email
    
        $customer_id = $eml;

        // Prepare SQL statement to insert into cart
        $query = "INSERT INTO cart (Customer_ID, Product_ID) VALUES (?, ?)";
        $stmt = $connect->prepare($query);
        $stmt->bind_param("ii", $customer_id, $product_id);

        if ($stmt->execute()) {
            // Successfully added to cart
            echo '<script type="text/javascript">';
            echo 'alert("Product added to cart successfully!");';
            echo 'window.location.href = "shoptry.php?eml='. $emml .'&cid='.$cc.'";';
            echo '</script>';
        } else {
            // Error adding to cart
            echo '<script type="text/javascript">';
            echo 'alert("Error adding product to cart: ' . $stmt->error . '");';
            echo 'window.location.href = "shoptry.php?eml='. $eml .'&cid='. $_GET['cid'] .'";';
            echo '</script>';
        }

        $stmt->close();
    

    // Close the database connection
    $connect->close();
} else {
    // Required POST parameters not set
    echo '<script type="text/javascript">';
    echo 'alert("Invalid request.");';
    echo 'window.location.href = "home.php";';
    echo '</script>';
}
?>
