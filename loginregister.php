<?php 
include('database.php');

$error_message = ''; // Define error message variable
$success_message = ''; // Define success message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Corrected SQL query syntax and added prepared statement
    $query = "SELECT Customer_email, Customer_password FROM customer WHERE Customer_email = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if($email == "admin1@gmail.com" && $password == "admin1"){
        header("Location: /FYP/admin/home.php?eml=".$email);
        exit();
    }

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $ppassword = $row['Customer_password'];
        if (password_verify($password, $ppassword)) {
            // Login successful
            // Redirect to home page or perform other actions
            header("Location: home.php?eml=".$email);
            exit();
        } else {
            $error_message = "Invalid password";
        }
    } else {
        $error_message = "Invalid email or password";
    }
}

// Registration form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Establish connection to the database (Not needed here since it's already included)

    // Prepare and bind parameters
    $stmt = $connect->prepare("INSERT INTO Customer (Customer_name, Customer_email, Customer_password, Customer_HP, Customer_address_1, Customer_address_2, Customer_postcode) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $fullname, $email, $npassword, $phone, $address1, $address2, $postcode);

    // Set parameters and execute
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $npassword = $_POST['password']; // Use $npassword instead of $password
    // Hash password for security
    $npassword = password_hash($npassword, PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $address1 = $_POST['address1']; // Address Line 1
    $address2 = $_POST['address2']; // Address Line 2
    $postcode = $_POST['postcode']; // Postcode

    $stmt->execute();

    // Set the success message
    $success_message = "Registration successful!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center">Login/Register</h2>
                <?php
                if (!empty($error_message)) {
                    echo '<div class="alert alert-danger">' . $error_message . '</div>';
                }
                if (!empty($success_message)) {
                    echo '<div class="alert alert-success">' . $success_message . '</div>';
                }
                ?>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <br>
                <h5 class="text-center">OR</h5>
                <h2 class="text-center">Sign Up</h2>
                <form method="post" action="">
                    <!-- Registration form fields here -->
                </form>
            </div>
        </div>
    </div>
</body>
</html>
