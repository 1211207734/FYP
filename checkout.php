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

    if (isset($_GET['pm'])) {
        $payment = $_GET['pm'];
    }

    if (isset($_GET['tt'])) {
        $np = $_GET['tt'];
    }

    $co= isset($_GET['cod']) ? $_GET['cod'] : null;
    if($np==null){
        $prop = "";
        $pop = "hidden";
    }
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
    <main class="page">
        <section class="shopping-cart dark">
            <div class="container">
                <div class="block-heading">
                    <h2>Checkout Summary</h2>
                    <p>Last Check Before Payment Done</p>
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
                                        <img src="images/<?php echo $row['Product_name']?>.jpg" style="display: block; width: 150px; height: 150px; margin:auto;">
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
                                                <?php $total += $st ?>
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
                            <div class="summary-item" <?php echo $prop ?>><span class="text">Discount</span><span class="price" style="color:red;">RM <?php echo $total-$np ?></span></div>
                            <div class="summary-item" <?php echo $pop ?>><span class="text">Discount</span><span class="price" style="color:red;">No Voucher is applied</span></div>
                            <div class="summary-item"><span class="text">Total</span><span class="price">RM <?php echo $np?></span></div>
                            <div class="summary-item"><span class="text">Payment Method</span><span class="price">By <?php echo $payment?></span></div>
                            <button type="submit" class="btn btn-primary btn-lg" style="width:100%;" name="check">Checkout</button>
                        </div>
                        </form>
                    <?php 
                    if (isset($_POST['check'])){
                        $nb = $obal - $total;
                        $sql1="INSERT INTO ooder (Customer_ID,Order_date,Order_time,Total_price) values ('$emml',CURRENT_DATE,CURRENT_TIME,'$total')";                       
                        $sq="UPDATE promotion SET valid=valid-1 WHERE code='$co'";
                        $sqlll="UPDATE tng SET Balance='$nb' WHERE Customer_ID='$emml'";
                        $sqll="INSERT INTO payment (Payment_method,Payment_total,Payment_date) values ('$payment','$total',CURRENT_DATE)";
                        $sql="DELETE FROM cart WHERE Customer_ID='$emml'";
                        
                        mysqli_query($connect,$sq);
                        mysqli_query($connect,$sql1);
                        mysqli_query($connect,$sqlll);
                        mysqli_query($connect,$sqll); 
                        $sql2="SELECT Order_ID,Payment_ID FROM ooder,payment WHERE Order_date=Payment_date=CURRENT_DATE and Customer_ID=$emml";
                        $result = mysqli_query($connect, $sql2);
                        $row1 = mysqli_fetch_assoc($result);
                        $sql3="INSERT INTO transaction_report (Order_ID,Payment_ID,Customer_ID,status) values ('$row1[Order_ID]','$row[Payment_ID]','$emml','Paid')";
                        mysqli_query($connect,$sql3);
                        $sql4="SELECT * FROM cart WHERE Customer_ID='$emml'";
                        $result = mysqli_query($connect, $sql4);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $sql5="INSERT INTO orderdetail (Order_ID,Product_ID,Quantity) values ('$row1[Order_ID]','$row[Product_ID]','$row[quantity]')";
                            mysqli_query($connect,$sql5);
                        }



                        mysqli_query($connect,$sql);        
                        
                            echo '<script>';
                            echo 'window.location.href = "orderhis.php?eml='.$emml.'";';
			                echo 'alert("Done Check Out!");';
                            echo '</script>';

                    }
                            else {
							echo '<script type="text/javascript">';
		                    echo 'alert("Error executing SQL statement:".mysqli_error($connect));';
		                    echo '</script>';                      
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

