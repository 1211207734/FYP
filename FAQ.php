<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - JBPSTORE</title>
    <link rel="stylesheet" href="css/FAQ.css">
</head>
<?php
			if (isset($_GET['eml'])) {
				$emml = $_GET['eml'];}
				?>
<header>
	<div class="logo">
		<h1>JBP<span>STORE</span></h1>
	</div>      
	<div class="group">
        <ul class="navigation">
        <a href="home.php?eml=<?php echo $emml?>" >Home</a>
        <a href="shoptry.php?eml=<?php echo $emml?>">Shop</a>
        <a href="orderhis.php?eml=<?php echo $emml?>">Order History</a>
        <a href="myaccount.php?eml=<?php echo $emml?>">My Account</a>
        <a href="cart.php?eml=<?php echo $emml?>">My Cart</a>
        <a href="FAQ.php?eml=<?php echo $emml?>">FAQs</a>
        <a href="about.php?eml=<?php echo $emml?>">About Us</a>
        <a href="loginregister.php">Log out</a>
        </ul>
    </div>
</header>
<body>
    <div class="container">
        <h1>Frequently Asked Questions</h1>
        
        <!-- FAQ List -->
        <div class="faq-list">
            <!-- FAQ Item 1 -->
            <div class="faq-item">
                <h2>ORDER</h2>
                <p>Regret to inform you that cancelling an order is unavailable once payment and the order is made and created.</p>
                <p>If you would like to add on items to your order after you checked out, you will need to make a separate order altogether. We will pack the orders separately but send them out together under normal circumstances.</p>
            </div>
            <!-- FAQ Item 2 -->
            <div class="faq-item">
                <h2>SHIPPING</h2>
                <p>Items purchased from JBPSTORE will be delivered to your doorstep within 3-5 working days (Malaysia). Do take note that the date provided is only an estimate date, the exact delivery date is subject to different areas from the courier service.</p>
                <p>If we are unable to meet the estimated delivery date we shall not be liable for any losses, liabilities, costs, damages, charges or expenses arising out of late delivery.</p>
                <P>If your item has a defect or is missing from your order <br>Please contact Customer Service at Whatsapp: +60123456789</P>
            </div>
            <div class="faq-item">
                <h2>SHIPPING ADDRESS</h2>
                <p>Once your order has been placed and confirmed, you will not be able to change the shipping address.</p>
                <p>Please fill in your final shipping address to avoid any inconveniences.</p>
            </div>     
            <div class="faq-item">
                <h2>RETURN</h2>
                <p>Once goods are sold, they are strictly non-refundable or exchangeable. If you received defect or wrong item(s), kindly contact us at Whatsapp (+60123456789) for the returns.</p>
            </div>               
        </div>
    </div>
</body>
<footer>
	<p>&copy; 2024 JBPSTORE - Your Mobile Gadgets Shop. All rights reserved.</p>
</footer>
</html>
