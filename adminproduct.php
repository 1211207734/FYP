<?php include('database.php');?>

<html>
<head>
<title>Oder Manage</title>
<style>
body{
  background-image: url("./photo/bg2.jpg");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  vertical-align: bottom;
}

</style>

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
            <th>Order ID</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
            <th>Customer Name</th>
            <th>Customer Email</th>
            <th>Customer Phone</th>
            <th>Customer Address</th>
            <th>Order Date</th>
        </tr>
        <?php
        $query = "SELECT * FROM product";
        $result = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['product_id']}</td>";
            echo "<td>{$row['product_name']}</td>";
            echo "<td>{$row['product_price']}</td>";
            echo "<td>{$row['product_quantity']}</td>";
            echo "<td>{$row['customer_name']}</td>";
            echo "<td>{$row['customer_email']}</td>";
            echo "<td>{$row['customer_phone']}</td>";
            echo "<td>{$row['customer_address']}</td>";
            echo "<td>{$row['order_date']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>