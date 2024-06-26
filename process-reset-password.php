<?php

// Check if the token is set
if (!isset($_GET['token'])) {
    die("Token not provided.");
}

$token = $_GET["token"];
$token_hash = $_GET["token"];

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM Customer
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $token_hash);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Check if the user was found
if ($user === null) {
    die("Token not found.");
}

// Check if the token has expired
if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("Token has expired.");
}

// Validate the password
if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters.");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter.");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number.");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match.");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

// Update the user's password
$sql = "UPDATE Customer
        SET Customer_password = ?,
            reset_token_hash = NULL,
            reset_token_expires_at = NULL
        WHERE Customer_ID = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("si", $password_hash, $user["Customer_ID"]);
$stmt->execute();

echo "Password updated. You can now login.";
?>
