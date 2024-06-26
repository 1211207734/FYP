<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - JBPSTORE</title>
    <link rel="stylesheet" href="css/about.css">
     <script>
        function disableBack() { window.history.forward(); }
setTimeout("disableBack()", 0);
window.onunload = function () { null };
    </script>
</head>
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
            <li><a href="home.php?eml=<?php echo $emml?>" >Home</a></li>
            <li><a href="shop.php?eml=<?php echo $emml?>">Shop</a></li>
            <li><a href="orderhis.php?eml=<?php echo $emml?>">Order History</a></li>
            <li><a href="p.php?eml=<?php echo $emml?>">My Account</a></li>
            <li><a href="cart.php?eml=<?php echo $emml?>">My Cart</a></li>
            <li><a href="FAQ.php?eml=<?php echo $emml?>">FAQs</a></li>
            <li><a href="about.php?eml=<?php echo $emml?>">About Us</a></li>
            <li><a href="loginregister.php">Log out</a></li>
        </ul>
    </div>
</header>
<body>
    <div class="container">
        <h1>About Us - JBPSTORE</h1>
        
        
        <!-- Founders -->
        <div class="founders">
            <!-- Founder 1 -->
            <div class="founder">
                <img src="images/brandon_tan.jpg" alt="Brandon Tan">
                <h2>Brandon Tan</h2>
                <p>Co-founder & CEO</p>
                <p>Brandon Tan is a visionary entrepreneur with a passion for technology.</p>
            </div>
            <!-- Founder 2 -->
            <div class="founder">
                <img src="images/phiz.jpg" alt="Phiz Lee">
                <h2>Phiz Lee</h2>
                <p>Co-founder & COO</p>
                <p>Phiz Lee is an experienced operations executive with a focus on customer satisfaction.</p>
            </div>
            <!-- Founder 3 -->
            <div class="founder">
                <img src="images/jeremy.jpg" alt="Jeremy">
                <h2>Jeremy</h2>
                <p>Co-founder & CTO</p>
                <p>Jeremy is a technology expert with a knack for innovation and problem-solving.</p>
            </div>
        </div>
        <!-- Shop Description -->
        <div class="shop-description">
            <h2>Shop Description</h2>
            <p>Welcome to JBPSTORE, your one-stop shop for the latest mobile gadgets and accessories. We're dedicated to providing high-quality products and exceptional customer service.</p>
        </div>
        <!-- Contact Information -->
        <div class="contact-info">
            <h2>Contact Us</h2>
            <div class="contact-method">
                <a href="mailto:contact@jbpstore.com"><img src="images/email_icon.png" alt="Email"></a>
            </div>
            <div class="contact-method">
                <a href="tel:+6012-3456789"><img src="images/phone_icon.jpeg" alt="Phone"></a>
            </div>
            <div class="contact-method">
                <a href="https://instagram.com/jbpstore"><img src="images/instagram_icon.png" alt="Instagram"></a>
            </div>
            <div class="contact-method">
                <a href="https://www.facebook.com/profile.php?id=100067679114376"><img src="images/facebook.png" alt="Facebook"></a>
            </div>
        </div>
        
        
    </div>
</body>
<footer>
    <p>&copy; 2024 JBPSTORE - Your Mobile Gadgets Shop. All rights reserved.</p>
</footer>
</html>
