<?php 
include ('database.php');
if (isset($_GET['eml'])) {
    $emml = $_GET['eml'];}

if(isset($_GET['token'])){
    $token = $_GET['token'];  



    $sqll = "UPDATE admin
            SET token = NULL, np = 0000
            WHERE email = '$emml'";
    if(mysqli_query($connect, $sqll)){
        echo '<script type="text/javascript">';
		echo 'window.location.href = "index.php?eml='. $emml . '";';
		echo 'alert("Password Reset To 0000 Successfully!");';
		echo '</script>';
    } else {
        echo '<script type="text/javascript">';
		echo 'window.location.href = "index.php?eml='. $emml . '";';
		echo 'alert("Password Reset Unsuccessfully!");';
		echo '</script>';
    }
}