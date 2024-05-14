<?php
// Database configuration
$host = 'localhost'; // Your database host (usually localhost)
$db = 'jbp'; // Your database name
$user = 'Customer_name'; // Your database username
$pass = 'Customer_password'; // Your database password

// Create a connection using mysqli
$dbc = new mysqli($host, $user, $pass, $db);

// Check the connection
if ($dbc->connect_error) {
    die("Database connection failed: " . $dbc->connect_error);
}

// Start session
session_start();
?>
<FilesMatch "config.php">
    Order Allow,Deny
    Deny from all
</FilesMatch>