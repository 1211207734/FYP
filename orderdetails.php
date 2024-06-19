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
        <a href="orderhis.php?eml=<?php echo $emml?>">Back</a>
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
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Quantity</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php
            include('database.php');
            $sql = "SELECT products.Product_name,products.img,ooder.Order_date,ooder.Order_time,orderdetail.Quantity,products.Product_price,ooder.Total_price,transaction_report.status FROM products,orderdetail,ooder,transaction_report WHERE transaction_report.Order_ID=ooder.Order_ID and ooder.Order_ID=orderdetail.Order_ID and orderdetail.Product_ID=products.Product_ID and ooder.Customer_ID='$emml' and ooder.Order_ID='$oid'";
            $result = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $tt=$row['Total_price'];
                $od=$row['Order_date'];
                $ot=$row['Order_time'];
                $st=$row['status'];?>
                <tr>
                    <td style="align-item: centre;"><img src="<?php echo $row['img']; ?>" style="height: 75px; width: 75px;" alt="<?php echo htmlspecialchars($row['Product_name']); ?>" class="product-image"></td>
                    <td><?php echo $row['Product_name'] ?></td>
                    <td>RM <?php echo $row['Product_price'] ?></td>
                    <td><?php echo $row['Quantity'] ?></td>
                </tr>
               <?php }?>
            </tbody>
            <div display="block" style=""><span style="float:left; margin-left: 10px;">Order date : <?php echo $od?><br>Order time : <?php echo $ot?><br>Order status : <?php echo $st?></span>
            <span style="float:right; margin-right: 10px;">Total Amount: RM <?php echo $tt ?></span></div>
        </table>
    </div>

</body>
<footer>
	<p>&copy; 2024 JBPSTORE - Your Mobile Gadgets Shop. All rights reserved.</p>
</footer>
</html>