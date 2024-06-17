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
				?>
<header>
	<div class="logo">
		<h1>JBP<span>STORE</span></h1>
	</div>      
</header>
<div class="topnav" id="myTopnav">
        <a href="home.php?eml=<?php echo $emml?>" >Home</a>
        <a href="shoptry.php?eml=<?php echo $emml?>">Shop</a>
        <a href="orderhis.php?eml=<?php echo $emml?>"class="active">Order History</a>
        <a href="p.php?eml=<?php echo $emml?>">My Account</a>
        <a href="cart.php?eml=<?php echo $emml?>">My Cart</a>
        <a href="FAQ.php?eml=<?php echo $emml?>">FAQs</a>
        <a href="about.php?eml=<?php echo $emml?>">About Us</a>
        <a href="loginregister.php">Log out</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
</div>
<body>
    <div class="container">
        <h2>Order History</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order Date</th>
                    <th>Order Status</th>
                    <th>Total Amount</th>
                    <th>Method</th>
                    <th>View Details</th>
                </tr>
            </thead>
            <tbody>
            <?php
            include('database.php');
            $sql = "SELECT ooder.Order_date,ooder.Total_price,payment.Payment_method,transaction_report.status,ooder.Order_ID FROM transaction_report,ooder,payment WHERE transaction_report.Order_ID=ooder.Order_ID and transaction_report.Payment_ID=payment.Payment_ID and transaction_report.Customer_ID = '$emml'";
            $result = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_assoc($result)) {?>
                <tr>
                    <td><?php echo $row['Order_date']?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td>RM <?php echo $row['Total_price'] ?></td>
                    <td><?php echo $row['Payment_method'] ?></td>
                    <td><a href="orderdetails.php?eml=<?php echo $emml?>&oid=<?php echo $row['Order_ID'] ?>">View</a></td>
                </tr>
               <?php }?>
            </tbody>
        </table>
    </div>


<footer>
	<p>&copy; 2024 JBPSTORE - Your Mobile Gadgets Shop. All rights reserved.</p>
</footer>
</html>