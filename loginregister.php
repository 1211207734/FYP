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
                            div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-3 pb-3">Sign Up</h4>
											<div class="form-group">
												<input type="text" class="form-style" placeholder="Full Name">
												<i class="input-icon uil uil-user"></i>
											</div>
                                            <div class="form-group mt-2">
												<input type="email" class="form-style" placeholder="Email">
												<i class="input-icon uil uil-at"></i>
											</div>
											<div class="form-group mt-2">
												<input type="text" class="form-style" placeholder="Username">
												<i class="input-icon uil uil-user"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" class="form-style" placeholder="Password">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
                                            <div class="form-group mt-2">
												<input type="confirm_password" class="form-style" placeholder="Confirm Password">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<a href="index.html" class="btn mt-4">Register</a><br>
                                            <a href="index.html" class="btn mt-4">Back to home</a>
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