<?php 
include('database.php');

$error_message = ''; // Define error message variable

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Corrected SQL query syntax and added prepared statement
    $query = "SELECT Customer_ID, Customer_email, Customer_password FROM customer WHERE Customer_email = ?";
    $q="SELECT id, email, np, status FROM admin WHERE email = ? AND status = 'active'";
    
    $stmt_admin = mysqli_prepare($connect, $q);
    mysqli_stmt_bind_param($stmt_admin, "s", $email);
    mysqli_stmt_execute($stmt_admin);
    $result_admin = mysqli_stmt_get_result($stmt_admin);
    $row_admin = mysqli_fetch_assoc($result_admin);
    
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row_admin) {
        $admin_id = $row_admin['id'];
        $admin_password = $row_admin['np'];
        if ($password == $admin_password) {
            // Login successful
            echo '<script type="text/javascript">
                alert("Login successfully.");
                </script>';
            header("Location: /FYP/admin/index.php?eml=" . $admin_id);
            exit();
        } else if ($email == "admin@gmail.com" && $password == "admin") {
            echo '<script type="text/javascript">
                alert("Login successfully.");
                </script>';
            header("Location: /FYP/admin/index.php?eml=" . $admin_id);
            exit();
        } else {
            $error_message = "Invalid password";
        }
    }

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $customer_password = $row['Customer_password'];
        $customer_id = $row['Customer_ID'];
        if ($password == $customer_password) {
            // Login successful
            echo '<script type="text/javascript">
                alert("Login successfully.");
                </script>';
            header("Location: home.php?eml=" . $customer_id);
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
    include('database.php'); // Include your database connection file here

    // Prepare and bind parameters
    $stmt = $connect->prepare("INSERT INTO Customer (Customer_name, Customer_email, Customer_password, Customer_HP, Customer_address_1, Customer_address_2, Customer_postcode) VALUES (?, concat(?,'@gmail.com'), ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $fullname, $email, $npassword, $phone, $address1, $address2, $postcode);

    // Set parameters and execute
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $npassword = $_POST['password'];
    $cpassword = $_POST['confirm_password'];
    $phone = $_POST['phone'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $postcode = $_POST['postcode'];

    // Validate email
    if (strpos($email, '@') !== false) {
        $error_message = "Email should not include '@' symbol.";
    } elseif ($npassword != $cpassword) {
        $error_message = "Passwords do not match";
    } else {
        $stmt->execute();
        echo '<script type="text/javascript">
        alert("Register successfully.");
        // Redirect to the login page after 3 seconds
        setTimeout(function(){
            window.location.href = "loginregister.php";
        }, 3000);
        </script>';
    
        // Close statement and connection
        $stmt->close();
        $connect->close();
    
        // Prevent further execution
        exit();
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <title>Login/Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <script>
        function disableBack() { window.history.forward(); }
setTimeout("disableBack()", 0);
window.onunload = function () { null };
        function validateRegistrationForm() {
            var email = document.forms["registrationForm"]["email"].value;
            if (email.includes("@")) {
                alert("Email should not include '@' symbol.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<div class="section">
    <div class="container">
        <div class="row full-height justify-content-center">
            <div class="col-12 text-center align-self-center py-5">
                <div class="section pb-5 pt-5 pt-sm-2 text-center">
                    <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
                    <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
                    <label for="reg-log"></label>
                    <div class="card-3d-wrap mx-auto">
                        <div class="card-3d-wrapper">
                            <div class="card-front">
                                <div class="center-wrap">
                                    <div class="section text-center">
                                        <h4 class="mb-4 pb-3">Log In</h4>
                                        <form method="post" action="">
                                            <div class="form-group">
                                                <input type="email" class="form-style" placeholder="Email" name="email" required>
                                                <i class="input-icon uil uil-at"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" class="form-style" placeholder="Password" name="password" required>
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <button type="submit" name="login" class="btn mt-4">Login</button>
                                            <script>
                                                document.getElementById("loginButton").addEventListener("click", function(event) {
                                                    // Prevent the default form submission behavior
                                                    event.preventDefault();
                                                    
                                                    // Perform your login process, for example, sending an AJAX request to the server
                                                    // Assume login is successful for demonstration purposes
                                                    var useraccount = 1;
                                                    
                                                    // Store the useraccount value in session storage
                                                    sessionStorage.setItem('useraccount', useraccount);
                                                    
                                                    // Redirect to the menu page or perform any other actions
                                                    window.location.href = "menu.html";
                                                });
                                            </script>
                                            <br>
                                            <!-- Removed redirecting back to index.php -->
                                        </form>
                                        <a href="index.php"><button name="home" class="btn mt-4">Back</button></a>
                                        <a hidden href="forgot-password.php"><button name="home" class="btn mt-4">Forgot Password?</button></a>
                                        <?php
                                        if (!empty($error_message)) {
                                            echo '<p class="text-danger">' . $error_message . '</p>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Rest of your HTML code for sign up section -->
                            <div class="card-back">
                                <div class="center-wrap">
                                    <div class="section text-center">
                                        <h4 class="mb-3 pb-3">Sign Up</h4>
                                        <!-- Sign Up section -->
                                        <form method="post" action="" name="registrationForm" onsubmit="return validateRegistrationForm()">
                                            <div class="form-group">
                                                <input type="text" class="form-style" placeholder="Full Name" name="fullname" required>
                                                <i class="input-icon uil uil-user"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input style="width:45%" type="text" class="form-style" placeholder="Email" name="email" required><span class="form-style" style="align-content:left">@gmail.com</span>
                                                <i class="input-icon uil uil-at"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="int" class="form-style" placeholder="Phone Number" name="phone" required>
                                                <i class="input-icon uil uil-phone"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="text" class="form-style" placeholder="Address Line 1" name="address1" required>
                                                <i class="input-icon uil uil-location-point"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="text" class="form-style" placeholder="Address Line 2" name="address2" required>
                                                <i class="input-icon uil uil-location-point"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="text" class="form-style" placeholder="Postcode" name="postcode" required>
                                                <i class="input-icon uil uil-location-point"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" class="form-style" placeholder="Password" name="password" required>
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" class="form-style" placeholder="Confirm Password" name="confirm_password" required>
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <button type="submit" class="btn mt-4" name="register">Register</button>
                                        </form>
                                        <?php
                                        if (!empty($error_message)) {
                                            echo '<p class="text-danger">' . $error_message . '</p>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
