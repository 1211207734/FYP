<?php
// database.php - Include your database connection script here
require_once "database.php";
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the necessary data (product ID and action) are present in the request
    if (isset($_POST["id"]) && isset($_POST["action"])) {
        // Extract the product ID and action from the POST data
        $product_id = $_POST["id"];
        $action = $_POST["action"];

        // Prepare a response array
        $response = array("success" => false, "message" => "An error occurred.");

        // Perform the necessary action based on the provided action
        if ($action === "activate" || $action === "delete") {
            // Perform the SQL update operation based on the action
            $sql = ($action === "activate")
                ? "UPDATE products SET status = 'active' WHERE Product_ID = ?"
                : "UPDATE products SET status = 'inactive' WHERE Product_ID = ?";

            // Prepare the SQL statement
            $stmt = $connect->prepare($sql);

            if ($stmt) {
                // Bind the product ID parameter
                $stmt->bind_param("i", $product_id);

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
        
        // Send the JSON response
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
