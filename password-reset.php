<!DOCTYPE html>
<?php require_once("config.php");
if(isset($_SESSION["login_sess"])) {
    header("location:account.php");
}
?>
<html>
<head>
    <title>Password Reset - Techno Smarter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <?php
            if(isset($_GET['token'])) {
                $token = $_GET['token'];
            }
            if(isset($_POST['sub_set'])){
                extract($_POST);
                $errors = [];
                if($password == ''){
                    $errors[] = 'Please enter the password.';
                }
                if($passwordConfirm == ''){
                    $errors[] = 'Please confirm the password.';
                }
                if($password != $passwordConfirm){
                    $errors[] = 'Passwords do not match.';
                }
                if(strlen($password)<6){
                    $errors[] = 'The password should be at least 6 characters long.';
                }
                if(strlen($password)>50){
                    $errors[] = 'Password: Max length 50 Characters Not allowed';
                }
                $stmt = $conn->prepare("SELECT email FROM pass_reset WHERE token=:token");
                $stmt->bindParam(':token', $token);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if($result) {
                    $email = $result['email'];
                } else {
                    $errors[] = 'Link has expired or something is missing.';
                    $hide = 1;
                }
                if(empty($errors)){
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $stmt = $conn->prepare("UPDATE users SET password=:password WHERE email=:email");
                    $stmt->bindParam(':password', $password);
                    $stmt->bindParam(':email', $email);
                    if($stmt->execute()) {
                        $success = "<div class='successmsg'><span style='font-size:100px;'>&#9989;</span> <br> Your password has been updated successfully. <br> <a href='login.php' style='color:#fff;'>Login here...</a> </div>";
                        $stmt = $conn->prepare("DELETE FROM pass_reset WHERE token=:token");
                        $stmt->bindParam(':token', $token);
                        $stmt->execute();
                        $hide = 1;
                    }
                }
            }
            ?>
            <div class="login_form">
                <form action="" method="POST">
                    <div class="form-group">
                        <img src="https://technosmarter.com/assets/images/logo.png" alt
