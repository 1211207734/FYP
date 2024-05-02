<?php 
include('database.php');

$error_message = ''; // Define error message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Corrected SQL query syntax and added prepared statement
    $query = "SELECT Customer_email, Customer_password FROM customer WHERE Customer_email = ?";
    
    
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if($email == "admin1@example.com" && $password == "password1"){
        header("Location: /FYP/admin/index.html");
        exit();
    }

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $ppassword = $row['Customer_password'];
        if ($password == $ppassword) {
            // Login successful
            // Redirect to home page or perform other actions
            header("Location: index.html");
            $userac++;
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
    // Establish connection to the database
    $servername = "localhost";
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "jbp"; // Replace with your database name
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO Customer (Customer_name, Customer_email, Customer_password, Customer_HP, Customer_address) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $fullname, $email, $npassword, $phone, $address);

    // Set parameters and execute
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['npassword'];
    // Hash password for security
    $password = password_hash($npassword, PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $address = $_POST['address']; // Make sure to add 'name' attribute to address input field in your HTML

    $stmt->execute();

    echo "Registration successful";

    // Close statement and connection
    $stmt->close();
    $conn->close();
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
                                            <button type="submit" class="btn mt-4">Login</button>
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
                                            <!-- Removed redirecting back to index.html -->
                                            <p class="mb-0 mt-4 text-center"><a href="https://www.web-leb.com/code" class="link">Forgot your password?</a></p>
                                        </form>
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
                                        <form method="post" action="">
                                            <div class="form-group">
                                                <input type="text" class="form-style" placeholder="Full Name" name="fullname" required>
                                                <i class="input-icon uil uil-user"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="email" class="form-style" placeholder="Email" name="email" required>
                                                <i class="input-icon uil uil-at"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="text" class="form-style" placeholder="Phone Number" name="phone" required>
                                                <i class="input-icon uil uil-phone"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="text" class="form-style" placeholder="Address" name="address" required>
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
