<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JBPSTORE - Your Mobile Gadgets Shop</title>
    <link rel="stylesheet" href="css/shop1.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>JBP<span>STORE</span></h1>
        </div>
    </header>
    
    <section class="section-products">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-8 col-lg-6">
                    <div class="header">
                        <h3>Featured Product</h3>
                        <h2>Popular Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Category ID=1-->
                <?php
                    include('database.php');
                    $query = "SELECT Product_name, Product_details, Product_price FROM Products WHERE category_id = 1";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) {?>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="single-product">
                                <div class="part-1">
                                    <!-- Icons -->
                                    <ul>
                                        <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                        <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                        <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                    </ul>
                                </div>
                                <div class="part-2">
                                    <!-- Product Details -->
                                    <img src="images/<?php echo $row['Product_name']?>.jpg" alt="<?php echo $row['Product_name']?>" class="product-image">
                                    <h3 class="product-title"><?php echo $row['Product_name']?></h3>
                                    <p class="product-details"><?php echo $row['Product_details']?></p>
                                    <p class="product-price">RM <?php echo $row['Product_price']?></p>
                                    <button>Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    <?php }
                    mysqli_close($connect);
                ?>
            </div>
            <div class="row">
                <!-- Category ID=1-->
                <?php
                    include('database.php');
                    $query = "SELECT Product_name, Product_details, Product_price FROM Products WHERE category_id = 1";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) {?>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="single-product">
                                <div class="part-1">
                                    <!-- Icons -->
                                    <ul>
                                        <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                        <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                        <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                    </ul>
                                </div>
                                <div class="part-2">
                                    <!-- Product Details -->
                                    <h3 class="product-title"><?php echo $row['Product_name']?></h3>
                                    <p class="product-details"><?php echo $row['Product_details']?></p>
                                    <p class="product-price">RM <?php echo $row['Product_price']?></p>
                                    <button>Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    <?php }
                    mysqli_close($connect);
                ?>
            </div>
            
        </div>
    </section>

    <footer>
        <p>&copy; 2024 JBPSTORE - Your Mobile Gadgets Shop. All rights reserved.</p>
    </footer>
</body>
</html>
