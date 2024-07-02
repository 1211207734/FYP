<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
 <script>
        function disableBack() { window.history.forward(); }
setTimeout("disableBack()", 0);
window.onunload = function () { null };
    </script>
</head>
<?php

$email = $_POST["email"];

$token = bin2hex(random_bytes(16));

$token_hash ="pwrsjbp789";

$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

$mysqli = require __DIR__ . "/database.php";

$sql = "UPDATE Customer
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE Customer_email = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("sss", $token_hash, $expiry, $email);

$stmt->execute();

if ($mysqli->affected_rows) {

    if (!file_exists(__DIR__ . "/mailer.php")) {
        die("mailer.php file not found");
    }

    $mail = require __DIR__ . "/mailer.php";

    $mail->setFrom("noreply@example.com");
    $mail->addAddress($email);
    $mail->Subject = "Password Reset";
    $mail->Body = <<<END

    Click <a href="http://localhost/FYP/reset-password.php?token=pwrsjbp789">here</a> to reset your password.


    END;

    try {
        $mail->send();
        echo "Message sent, please check your inbox.";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
    }

} else {
    echo "No rows were updated. Possibly the email does not exist in the database.";
}

// Add a button to go back to loginregister.php
echo '<br><br><a href="loginregister.php"><button>Back to Login/Register</button></a>';

?>
