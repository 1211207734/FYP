<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Order History</title>
    <link rel="stylesheet" href="css/oh.css">
</head>

<?php
			if (isset($_GET['eml'])) {
				$emml = $_GET['eml'];}
				
            if (isset($_GET['oid'])) {
				$oid = $_GET['oid'];}
				?>
<header>
	<div class="logo">
		<h1>JBP<span>STORE</span></h1>
	</div>      
</header>
<div class="topnav" id="myTopnav">
        <a href="home.php?eml=<?php echo $emml?>" >Home</a>
        <a href="shoptry.php?eml=<?php echo $emml?>&cid=1">Shop</a>
        <a href="orderhis.php?eml=<?php echo $emml?>"class="active">Order History</a>
        <a href="p.php?eml=<?php echo $emml?>">My Account</a>
        <a href="cart.php?eml=<?php echo $emml?>">My Cart</a>
        <a href="FAQ.html">FAQs</a>
        <a href="about.html">About Us</a>
        <a href="loginregister.php">Log out</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
</div>
<body>
    <div class="container">
        <h2>Order Details</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order Date</th>
                    <th>Order Time</th>
                    <th>Order Status</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Quantity</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php
            include('database.php');
            $sql = "SELECT products.Product_name,ooder.Order_date,ooder.Order_time,orderdetail.Quantity,products.Product_price,ooder.Total_price,transaction_report.status FROM products,orderdetail,ooder,transaction_report WHERE transaction_report.Order_ID=ooder.Order_ID and ooder.Order_ID=orderdetail.Order_ID and orderdetail.Product_ID=products.Product_ID and ooder.Customer_ID='$emml'";
            $result = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $tt=$row['Total_price'];?>
                <tr>
                    <td><?php echo $row['Order_date']?></td>
                    <td><?php echo $row['Order_time']?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td><?php echo $row['Product_name'] ?></td>
                    <td>RM <?php echo $row['Product_price'] ?></td>
                    <td><?php echo $row['Quantity'] ?></td>
                </tr>
               <?php }?>
            </tbody>
            <div display="block" style=""><span style="float:right; margin-right: 10px;">Total Amount: RM <?php echo $tt ?></span></div>
        </table>
    </div>

</body>
<footer>
	<p>&copy; 2024 JBPSTORE - Your Mobile Gadgets Shop. All rights reserved.</p>
</footer>
</html>