<?php include('database.php');?>

<html>
<head>
<title>Order Manage</title>
<style>
    body{
    background-image: url("./photo/bg2.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    vertical-align: bottom;
    }

    header {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
    }

    .logo h1 {
        font-size: 32px;
        margin: 0;
    }

    .logo h1 span {
        color: #f00; /* Change color as needed */
        font-weight: bold;
    }

</style>
<header>
        <div class="logo">
            <h1>JBP<span>STORE</span>admin</h1>
        </div>
       
</header>
</head>
<body>
    <div class="group">
        <header>
            <ul>
                <li><a href="adminproduct.php">Product</a></li>
                <li><a href="oder_manage.php">Oder Manage</a></li>
                <li><a href="user_manage.php">User Manage</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </header>
    </div>
    <table>
        <tr>
            <th>Customer_email</th>
            <th>Customer_password</th>
        </tr>
        <?php
        $query = "SELECT Customer_email,Customer_password FROM customer";
        $result = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['Customer_email']}</td>";
            echo "<td>{$row['Customer_password']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
<footer>
        <p>&copy; 2024 JBPSTORE - Your Mobile Gadgets Shop. All rights reserved.</p>
</footer>
</html>