<?php

$email = $_POST["email"];

$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);
$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

$connect = require __DIR__ . "/database.php";

// Debugging the database connection
if (!$connect) {
    die('Failed to connect to the database.');
}

$sql = "UPDATE Customer
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE Customer_email = ?";

$stmt = $connect->prepare($sql);

// Check if the statement was prepared successfully
if (!$stmt) {
    die('Prepare failed: (' . $connect->errno . ') ' . $connect->error);
}

$stmt->bind_param("sss", $token_hash, $expiry, $email);
$stmt->execute();

// Check if the query was executed successfully
if ($stmt->affected_rows) {
    $mail = require __DIR__ . "/mailer.php";

    $mail->setFrom("noreply@example.com");
    $mail->addAddress($email);
    $mail->Subject = "Password Reset";
    $mail->Body = <<<END
    Click <a href="http://example.com/reset-password.php?token=$token">here</a> 
    to reset your password.
    END;

    try {
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
    }
}

echo "Message sent, please check your inbox.";

