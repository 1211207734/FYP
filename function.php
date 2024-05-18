<html>

<head>
    <title>Update Profile</title>
    <link rel="stylesheet" href="css/account.css">
</head>
<header>
    <div class="logo">
        <h1>JBP<span>STORE</span></h1>
    </div>
</header>

<body>
    <form method="post">    <button type="submit" name="ss">hehe</button>
</form>
</body>

<?php
include('database.php');

if(isset($_POST['ss'])){
    $query = "SELECT * FROM products";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_array($result)){
    $na = $row['Product_name'];
    $id = $row['Product_ID'];
    $sql = 'UPDATE `products` SET `img`= "images/'.$na.'.jpg" where Product_ID = '.$id.'';
    mysqli_query($connect, $sql);
}
    
    
}