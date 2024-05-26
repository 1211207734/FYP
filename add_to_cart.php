<?php

// Include database connection file
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
// Check if the required POST parameters are set
if (isset($_POST["id"]) && isset($_POST["action"])) {
    $product_id = $_POST["id"];
        $action = $_POST["action"];
        $customer_id = $_POST["eml"];
// Prepare a response array
$response = array("success" => false, "message" => "An error occurred.");
$sql = "SELECT * FROM cart WHERE Customer_ID = $customer_id and Product_ID = $product_id";
$rr = mysqli_query($connect, $sql); 
        if ($action === "add") {
            // Perform the SQL update operation based on the action
           if($rr->num_rows == 0){
            $query = "INSERT INTO cart (Customer_ID, Product_ID,quantity) VALUES (?, ?,1)";
           } else {
            $query = "UPDATE cart SET quantity = quantity + 1 WHERE Customer_ID = ? AND Product_ID = ?";
           }
            
    
            // Prepare the SQL statement
            $stmt = $connect->prepare($query);

            if ($stmt) {
                // Bind the product ID parameter
                $stmt->bind_param("ii", $customer_id, $product_id);
                // Execute the SQL statement
                if ($stmt->execute()) {
                    $response["success"] = true;
                    $response["message"] = ucfirst($action) . "d successfully.";
                } else {
                    $response["message"] = "Error while trying to " . $action . " product.";
                }

                // Close the statement
                $stmt->close();
            } else {
                $response["message"] = "Failed to prepare SQL statement.";
            }   
        } else {
            $response["message"] = "Invalid action.";
        } 
 

        
    

    // Close the database connection
    $connect->close();
    header("Content-type: application/json");
    echo json_encode($response);
} else {
    // Required parameters are missing
    echo json_encode(array("success" => false, "message" => "Missing parameters."));
}
} else {
    // Invalid request method
    echo json_encode(array("success" => false, "message" => "Invalid request method."));
}
?>
