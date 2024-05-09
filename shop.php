<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JBPSTORE - Your Mobile Gadgets Shop</title>
    <link rel="stylesheet" href="css/shop1.css">
    <style>
        /* CSS code to style the <hr> element */
        hr {
            border: none; /* Remove default border */
            height: 1px; /* Set height of the line */
            background-color: black; /* Set background color */
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <h1>JBP<span>STORE</span></h1>
        </div>
    </header>
<form method="post"> 
    <section class="section-products">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-8 col-lg-6">
                    <div class="header">
                        <h3>Featured Product</h3>
                        <h2>Popular Products</h2>
                        <br>
                        <h2><u>SmartPhones</u></h2>
                    </div>
                </div>
            </div>
            <div class="product-grid">
                <!-- Category ID=1-->
                <?php
                    include('database.php');
                    $query = "SELECT Product_ID, Product_name, Product_details, Product_price FROM Products WHERE category_id = 1";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) {?>
                        <div class="product">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Product Details -->
                                    <img src="images/<?php echo $row['Product_name']?>.jpg" alt="<?php echo $row['Product_name']?>" class="product-image">
                                    <h3 class="product-title"><?php echo $row['Product_name']?></h3>
                                    <p class="product-details"><?php echo $row['Product_details']?></p>
                                    <p class="product-price">RM <?php echo $row['Product_price']?></p>
                                    <input type='hidden' name='id' value='<?php echo $row['Product_ID']; ?>'>
                                    <button class="button-2" role="button" name="add" >Add to Cart</button>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    <?php }
                    mysqli_close($connect);
                ?>
            </div>
            <br>
            <hr>
            <br>
                        <h2><u>Tablets</u></h2>
            <div class="product-grid">
                <!-- Category ID=2-->
                <br>
                <?php
                    include('database.php');
                    $query = "SELECT Product_name, Product_details, Product_price FROM Products WHERE category_id = 2";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) {?>
                        <div class="product">
                            <div class="card">
                                <div class="card-body">
                                    <form method="post">
                                    <!-- Product Details -->
                                    <img src="images/<?php echo $row['Product_name']?>.jpg" alt="<?php echo $row['Product_name']?>" class="product-image"name="na">
                                    <h3 class="product-title"><?php echo $row['Product_name']?></h3>
                                    <p class="product-details"><?php echo $row['Product_details']?></p>
                                    <p class="product-price">RM <?php echo $row['Product_price']?></p>
                                    <button class="button-2" role="button" name="add" >Add to Cart</button>
                                    </form>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    <?php }
                    mysqli_close($connect);
                ?>
            </div>
            <br>
            <hr>
            <br>
                        <h2><u>Accessories</u></h2>
            <div class="product-grid">
                <!-- Category ID=3-->
                <br>
                <?php
                    include('database.php');
                    $query = "SELECT Product_name, Product_details, Product_price FROM Products WHERE category_id = 3";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) {?>
                        <div class="product">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Product Details -->
                                    <img src="images/<?php echo $row['Product_name']?>.jpg" alt="<?php echo $row['Product_name']?>" class="product-image"name="na">
                                    <h3 class="product-title"><?php echo $row['Product_name']?></h3>
                                    <p class="product-details"><?php echo $row['Product_details']?></p>
                                    <p class="product-price">RM <?php echo $row['Product_price']?></p>
                                    <button class="button-2" role="button" name="add" >Add to Cart</button>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    <?php }
                    mysqli_close($connect);
                ?>
            </div>
            <br>
            <hr>
            <br>
                        <h2><u>Wearables</u></h2>
            <div class="product-grid">
                <!-- Category ID=4-->
                <br>
                <?php
                    include('database.php');
                    $query = "SELECT Product_name, Product_details, Product_price FROM Products WHERE category_id = 4";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) {?>
                        <div class="product">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Product Details -->
                                    <img src="images/<?php echo $row['Product_name']?>.jpg" alt="<?php echo $row['Product_name']?>" class="product-image"name="na">
                                    <h3 class="product-title"><?php echo $row['Product_name']?></h3>
                                    <p class="product-details"><?php echo $row['Product_details']?></p>
                                    <p class="product-price">RM <?php echo $row['Product_price']?></p>
                                    <button class="button-2" role="button">Add to Cart</button>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    <?php }
                    mysqli_close($connect);
                ?>
            </div>
            <br>
            <hr>
            <br>
                        <h2><u>Earphones</u></h2>
            <div class="product-grid">
                <!-- Category ID=5-->
                <br>
                <?php
                    include('database.php');
                    $query = "SELECT Product_name, Product_details, Product_price FROM Products WHERE category_id = 5";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) {?>
                        <div class="product">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Product Details -->
                                    <img src="images/<?php echo $row['Product_name']?>.jpg" alt="<?php echo $row['Product_name']?>" class="product-image">
                                    <h3 class="product-title"><?php echo $row['Product_name']?></h3>
                                    <p class="product-details"><?php echo $row['Product_details']?></p>
                                    <p class="product-price">RM <?php echo $row['Product_price']?></p>
                                    <button class="button-2" role="button" name="add" >Add to Cart</button>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    <?php }
                    mysqli_close($connect);
                ?>
            </div>
            <br>
            <hr>
            <br>
                        <h2><u>Powerbanks</u></h2>
            <div class="product-grid">
                <!-- Category ID=6-->
                <br>
                <?php
                    include('database.php');
                    $query = "SELECT Product_name, Product_details, Product_price FROM Products WHERE category_id = 6";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) {?>
                        <div class="product">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Product Details -->
                                    <img src="images/<?php echo $row['Product_name']?>.jpg" alt="<?php echo $row['Product_name']?>" class="product-image">
                                    <h3 class="product-title"><?php echo $row['Product_name']?></h3>
                                    <p class="product-details"><?php echo $row['Product_details']?></p>
                                    <p class="product-price">RM <?php echo $row['Product_price']?></p>
                                    <button class="button-2" role="button" name="add" >Add to Cart</button>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    <?php }
                    mysqli_close($connect);
                ?>
            </div>
            <br>
            <hr>
            <br>
                        <h2><u>Speakers</u></h2>
            <div class="product-grid">
                <!-- Category ID=7-->
                <br>
                <?php
                    include('database.php');
                    $query = "SELECT Product_name, Product_details, Product_price FROM Products WHERE category_id = 7";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) {?>
                        <div class="product">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Product Details -->
                                    <img src="images/<?php echo $row['Product_name']?>.jpg" alt="<?php echo $row['Product_name']?>" class="product-image">
                                    <h3 class="product-title"><?php echo $row['Product_name']?></h3>
                                    <p class="product-details"><?php echo $row['Product_details']?></p>
                                    <p class="product-price">RM <?php echo $row['Product_price']?></p>
                                    <button class="button-2" role="button" name="add" >Add to Cart</button>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    <?php }
                    mysqli_close($connect);
                ?>
            </div>
            <br>
            <hr>
            <br>
                        <h2><u>Phone stands</u></h2>
            <div class="product-grid">
                <!-- Category ID=8-->
                <br>
                <?php
                    include('database.php');
                    $query = "SELECT Product_name, Product_details, Product_price FROM Products WHERE category_id = 8";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) {?>
                        <div class="product">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Product Details -->
                                    <img src="images/<?php echo $row['Product_name']?>.jpg" alt="<?php echo $row['Product_name']?>" class="product-image">
                                    <h3 class="product-title"><?php echo $row['Product_name']?></h3>
                                    <p class="product-details"><?php echo $row['Product_details']?></p>
                                    <p class="product-price">RM <?php echo $row['Product_price']?></p>
                                    <button class="button-2" role="button" name="add" >Add to Cart</button>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    <?php }
                    mysqli_close($connect);
                ?>
            </div>
            <br>
            <hr>
            <br>
                        <h2><u>Storage extender</u></h2>
            <div class="product-grid">
                <!-- Category ID=9-->
                <br>
                <?php
                    include('database.php');
                    $query = "SELECT Product_name, Product_details, Product_price FROM Products WHERE category_id = 9";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) {?>
                        <div class="product">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Product Details -->
                                    <img src="images/<?php echo $row['Product_name']?>.jpg" alt="<?php echo $row['Product_name']?>" class="product-image">
                                    <h3 class="product-title"><?php echo $row['Product_name']?></h3>
                                    <p class="product-details"><?php echo $row['Product_details']?></p>
                                    <p class="product-price">RM <?php echo $row['Product_price']?></p>
                                    <button class="button-2" role="button" name="add" >Add to Cart</button>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    <?php }
                    mysqli_close($connect);
                ?>
            </div>
            <br>
            <hr>
            <br>
                        <h2><u>Mobile Photography accessories</u></h2>
            <div class="product-grid">
                <!-- Category ID=10-->
                <br>
                <?php
                    include('database.php');
                    $query = "SELECT Product_name, Product_details, Product_price FROM Products WHERE category_id = 10";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) {?>
                        <div class="product">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Product Details -->
                                    <img src="images/<?php echo $row['Product_name']?>.jpg" alt="<?php echo $row['Product_name']?>" class="product-image">
                                    <h3 class="product-title"><?php echo $row['Product_name']?></h3>
                                    <p class="product-details"><?php echo $row['Product_details']?></p>
                                    <p class="product-price">RM <?php echo $row['Product_price']?></p>
                                    <button class="button-2" name="add" role="button">Add to Cart</button>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    <?php }
                    mysqli_close($connect);
                ?>
            </div>
        </div>
        <br>
            <hr>
            <br>
    </section>
</form>
    <?php

if (isset($_GET['eml'])) {
	$emml = $_GET['eml'];}
$connect= mysqli_connect("localhost","root","","jbp");
if(isset($_POST['add'])) {
	// Retrieve form data
	$n = $_POST['id'];

	// Prepare SQL statement
	$sql = "INSERT INTO cart (cp_ID) values ('$n')";
	
	if (mysqli_query($connect, $sql))
	{
	
		echo '<script type="text/javascript">';
		echo 'alert("Product Added to Cart Succesfully!");';
        echo 'window.location.href = "shop.php?eml='.$emml.'";';
        echo '</script>';
		
	
	} else {
	echo '<script type="text/javascript">';
	echo 'alert("Error executing SQL statement:".mysqli_error($connect));';
	echo '</script>';
	}	
	
		
} ?>						
    <footer>
        <p>&copy; 2024 JBPSTORE - Your Mobile Gadgets Shop. All rights reserved.</p>
    </footer>
</body>
</html>
