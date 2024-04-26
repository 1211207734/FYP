<?php 
include('database.php');

$error_message = ''; // Define error message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['register'])) {
        // Retrieve form data
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $phone_num = $_POST['phone_num'];
        $newPassword = $_POST['newPassword'];
        $conPassword = $_POST['conPassword'];

        // Check if passwords match
        if ($newPassword !== $conPassword) {
            $error_message = "Passwords do not match";
        } else {
            // Hash the password before storing it in the database
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Insert user data into the database
            $query = "INSERT INTO customer (Customer_name, Customer_email, Customer_phone, Customer_password) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($connect, $query);
            mysqli_stmt_bind_param($stmt, "ssss", $userName, $email, $phone_num, $hashedPassword);

            if (mysqli_stmt_execute($stmt)) {
                // Registration successful
                // Redirect or perform other actions
                header("Location: index.html");
                exit();
            } else {
                $error_message = "Registration failed";
            }
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Login/Register</title>
    <!-- Include your CSS and other meta tags -->
</head>
<body>
<!-- Registration form -->
<div class="section">
    <!-- Your HTML structure -->
    <div class="card-back">
        <div class="center-wrap">
            <div class="section text-center">
                <h4 class="mb-3 pb-3">Sign Up</h4>
                <form method="post" action="">
                    <div class="form-group">
                        <input type="text" class="form-style" placeholder="Username" name="userName" required>
                        <i class="input-icon uil uil-user"></i>
                    </div>
                    <div class="form-group mt-2">
                        <input type="email" class="form-style" placeholder="Email" name="email" required>
                        <i class="input-icon uil uil-at"></i>
                    </div>
                    <div class="form-group mt-2">
                        <input type="text" class="form-style" placeholder="Phone Number" name="phone_num" required>
                        <i class="input-icon uil uil-phone"></i>
                    </div>
                    <div class="form-group mt-2">
                        <input type="password" class="form-style" placeholder="Password" name="newPassword" required>
                        <i class="input-icon uil uil-lock-alt"></i>
                    </div>
                    <div class="form-group mt-2">
                        <input type="password" class="form-style" placeholder="Confirm Password" name="conPassword" required>
                        <i class="input-icon uil uil-lock-alt"></i>
                    </div>
                    <button type="submit" class="btn mt-4" name="register">Register</button>
                    <br>
                    <?php
                    if (!empty($error_message)) {
                        echo '<p class="text-danger">' . $error_message . '</p>';
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
