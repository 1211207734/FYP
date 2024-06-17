<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>
    <?php
    include('database.php');

    if (isset($_GET['eml'])) {
        $emml = $_GET['eml'];
    }
    $co= isset($_GET['cod']) ? $_GET['cod'] : null;
    $np= isset($_GET['nt']) ? $_GET['nt'] : null;
    $prop = "";
    $pop = "hidden";
    if($np==null){
        $prop = "";
        $pop = "hidden";}
    else{
        $prop = "hidden";
        $pop = "";
    }
    $connect = mysqli_connect("localhost", "root", "", "jbp");

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT products.Product_name, products.Product_price, products.Product_stock, products.Product_details ,cart.quantity
        FROM products 
        INNER JOIN cart ON products.Product_ID = cart.Product_ID
        WHERE cart.Customer_ID = '$emml'";

    $result = mysqli_query($connect, $sql);
    ?>

    <header>
        <div class="logo">
            <h1>JBP<span>STORE</span></h1>
        </div> 
    </header>     

    <div class="topnav" id="myTopnav">
        <a href="home.php?eml=<?php echo $emml?>" >Home</a>
        <a href="shoptry.php?eml=<?php echo $emml?>&cid=1">Shop</a>
        <a href="orderhis.php?eml=<?php echo $emml?>">Order History</a>
        <a href="myaccount.php?eml=<?php echo $emml?>">My Account</a>
        <a href="cart.php?eml=<?php echo $emml?>"class="active">My Cart</a>
        <a href="FAQ.php">FAQs</a>
        <a href="about.html">About Us</a>
        <a href="loginregister.php">Log out</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <main class="page">
        <section class="shopping-cart dark">
            <div class="container">
                <div class="block-heading">
                    <h2>Shopping Cart</h2>
                    <p>The Price Below is Included Shipping Fees</p>
                </div>
                <div class="content">
                    <div class="row">
                        <?php
                        $total = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="items">
                            <div class="product">
                                <div class="row">
                                    <div>
                                        <img src="images/<?php echo $row['Product_name']?>.jpg" style="display: block; width: 150px; height: 150px;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-md-5 product-name">
                                                    <div class="product-name">
                                                        <a><?php echo $row['Product_name']?></a>
                                                        <div class="product-info">
                                                            <div>Details:</div>
                                                            <div><?php echo $row['Product_details'];?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 quantity">
                                                    <label for="quantity">Quantity:</label>
                                                    <input id="quantity" type="number" value="<?php echo $row['quantity'] ?>" class="form-control quantity-input">
                                                </div>
                                                <div class="col-md-3 price">
                                                    <?php echo $st=$row['Product_price']*$row['quantity'];?>
                                                </div>
                                                <?php $total += $st?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <form method="post">
                        <div class="summary">
                            <h3>Summary</h3>
                            <div class="summary-item"><span class="text">Subtotal</span><span class="price">RM <?php echo $total?></span></div>
                            <div class="summary-item" <?php echo $prop ?>><span class="text">Discount</span><span class="price"><a href="promo.php?eml=<?php echo $emml?>&tt=<?php echo $total?>" >Do you have voucher?</a></span></div>
                            <div class="summary-item" <?php echo $pop ?>><span class="text">Discount</span><span class="price">Voucher Applied!!!</span></div>
                            <div class="summary-item" <?php echo $prop ?>><span class="text">Total</span><span class="price">RM <?php echo $total?></span></div>
                            <div class="summary-item" <?php echo $pop ?>><span class="text">Total</span><span class="price">RM <?php echo $np?></span></div>
                            <h3>Proceed Payment With:</h3>
                            <button type="submit" class="btn btn-primary btn-lg" style="width:49%; margin-right: 2%;" name="card">Debit/Credit Card</button><button type="submit" class="btn btn-primary btn-lg" style="width:49%;" name="tng">E-Wallet</button>
                        </div>
                    </form>
                    

                    <?php 
                    if (isset($_POST['card']) || isset($_POST['tng'])) {
                           if (isset($_POST['card'])) {
                            
                            if($np==null){
                                $np=$total;
                                }
                            echo '<script>';
                            echo 'window.location.href = "payment.php?eml=' . $emml . '&tt='.$np.'&cod='.$co.'";';
                            echo '</script>';
                        } else {
							echo '<script>';
                            echo 'window.location.href = "tng.php?eml=' . $emml . '&tt='.$np.'";';
                            echo '</script>';                        }
                    } 
                    ?>

                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 JBPSTORE - Your Mobile Gadgets Shop. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
