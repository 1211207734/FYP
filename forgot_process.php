<?php 
require_once("config.php");

if(isset($_POST['subforgot'])) { 
    $login = $_REQUEST['login_var'];
    $query = "SELECT * FROM users WHERE (username=:login OR email=:login)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':login', $login);
    $stmt->execute();
    
    if($stmt->rowCount() == 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $email = $user['email'];  
        $token = bin2hex(random_bytes(50));
        $insert = "INSERT INTO pass_reset (email, token) VALUES (:email, :token)";
        $stmt = $conn->prepare($insert);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':token', $token);
        
        if ($stmt->execute()) {
            $fromName = "Techno Smarter";
            $fromEmail = "no_reply@technosmarter.com";
            $replyTo = "technosmarterinfo@gmail.com";
            $credits = "All rights are reserved | Techno Smarter"; 
            $headers  = "MIME-Version: 1.0\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\n";
            $headers .= "From: ".$fromName." <".$fromEmail.">\n";
            $headers .= "Reply-To: ".$replyTo."\n";
            $headers .= "X-Sender: <".$fromEmail.">\n";
            $headers .= "X-Mailer: PHP\n"; 
            $headers .= "X-Priority: 1\n"; 
            $headers .= "Return-Path: <".$fromEmail.">\n"; 
            $subject = "You have received a password reset email"; 
            $msg = "Your password reset link <br> http://localhost:8081/php/form/password-reset.php?token=".$token." <br> Reset your password with this link. Click or open in new tab<br><br><br><br> <center>".$credits."</center>"; 
            if(mail($email, $subject, $msg, $headers,'-f'.$fromEmail)){
                header("location:forgot-password.php?sent=1"); 
            } else {
                header("location:forgot-password.php?servererr=1"); 
            } 
        } else {
            header("location:forgot-password.php?somethingwrong=1"); 
        }
    } else {
        header("location:forgot-password.php?err=".$login); 
    }
}
?>
