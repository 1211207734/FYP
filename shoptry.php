<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JBPSTORE - Your Mobile Gadgets Shop</title>
    <link href="css/shop1.css" rel="stylesheet">
    <style>
        hr {
            border: none;
            height: 1px;
            background-color: black;
        }
        h2 {
            font-size: 1.5em;
            font-weight: bold;
            color: #333;
            text-align: left;
        }
        .product-image {
            width: 150px;
            height: 150px;
        }
        .group {
            margin-top: 15pt;
            background-color: #333;
            display: flex;
            align-items: center;
            z-index: 10;
        }
        ul {
            position: relative;
            display: flex;
            gap: 30px;
        }
        li {
            list-style: none;
        }
        li a {
            text-decoration: none;
            color: #ffffff;
            font-size: 1em;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }
        li a::before {
            position: absolute;
            content: '';
            width: 100%;
            height: 2px;
            background: #a7abce;
            bottom: -2px;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.5s ease-in-out;
        }
        li a:hover::before {
            transform: scaleX(1);
            transform-origin: left;
        }
    </style>
</head>
<body>
    <?php
    // Database connection
    include('database.php');
    
    // Retrieve category ID and email from GET parameters
    $cc = isset($_GET['cid']) ? $_GET['cid'] : null;
    $emml = isset($_GET['eml']) ? $_GET['eml'] : null;

    if (!$cc) {
        echo '<p>Invalid category selected.</p>';
        exit();
    }

    // Fetch category name
    $query = "SELECT Category_name FROM categories WHERE Category_ID = ?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("i", $cc);
    $stmt->execute();
    $result = $stmt->get_result();
    $category = $result->fetch_assoc();
    $stmt->close();
    ?>
    <header>
        <div class="logo">
            <a href="home.php?eml=<?php echo $emml ?>"><h1>JBP<span>STORE</span></h1></a>
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
                            <div class="group">
                                <ul>
                                    <li><a href="shoptry.php?eml=<?php echo $emml ?>&cid=1">Smartphones</a></li>
                                    <li><a href="shoptry.php?eml=<?php echo $emml ?>&cid=2">Tablets</a></li>
                                    <li><a href="shoptry.php?eml=<?php echo $emml ?>&cid=3">Accessories</a></li>
                                    <li><a href="shoptry.php?eml=<?php echo $emml ?>&cid=4">Wearables</a></li>
                                    <li><a href="shoptry.php?eml=<?php echo $emml ?>&cid=5">Earphones</a></li>
                                    <li><a href="shoptry.php?eml=<?php echo $emml ?>&cid=6">Powerbanks</a></li>
                                    <li><a href="shoptry.php?eml=<?php echo $emml ?>&cid=7">Speakers</a></li>
                                    <li><a href="shoptry.php?eml=<?php echo $emml ?>&cid=8">Phone stands</a></li>
                                    <li><a href="shoptry.php?eml=<?php echo $emml ?>&cid=9">Storage extender</a></li>
                                    <li><a href="shoptry.php?eml=<?php echo $emml ?>&cid=10">Mobile Photography accessories</a></li>
                                </ul>
                            </div>
                            <br>
                        </div>
                        <h2><u><?php echo htmlspecialchars($category['Category_name']); ?></u></h2>
                    </div>
                </div>
                <div class="product-grid">
                    <!-- Fetch and display products based on category ID -->
                    <?php
                    $query = "SELECT Product_ID, Product_name, Product_details, Product_price, img FROM products WHERE Category_ID = ? AND status = 'active'";
                    $stmt = $connect->prepare($query);
                    $stmt->bind_param("i", $cc);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) { 
                        ?>
                        <div class="product">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Product Details -->
                                    <img src="<?php echo $row['img']; ?>" alt="<?php echo htmlspecialchars($row['Product_name']); ?>" class="product-image">
                                    <h3 class="product-title"><?php echo htmlspecialchars($row['Product_name']); ?></h3>
                                    <p class="product-details"><?php echo htmlspecialchars($row['Product_details']); ?></p>
                                    <p class="product-price">RM <?php echo htmlspecialchars($row['Product_price']); ?></p>
                                    <a class="button-2" href="#" onclick="addcart(<?php echo $row['Product_ID'] ?>)">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    <?php } 
                    $stmt->close();
                    $connect->close();
                    ?>
                </div>
            </div>
        </section>
    </form>
    <script type="text/javascript">
        function addcart(productId) {
            if (confirm("Add this product to cart?")) {
                var emml = "<?php echo $emml; ?>";
                var categoryId = "<?php echo $cc; ?>";
                
                // Create a form to submit the cart addition
                var form = document.createElement("form");
                form.setAttribute("method", "post");
                form.setAttribute("action", "add_to_cart.php");
                
                var emailField = document.createElement("input");
                emailField.setAttribute("type", "hidden");
                emailField.setAttribute("name", "eml");
                emailField.setAttribute("value", emml);
                form.appendChild(emailField);
                
                var productField = document.createElement("input");
                productField.setAttribute("type", "hidden");
                productField.setAttribute("name", "product_id");
                productField.setAttribute("value", productId);
                form.appendChild(productField);
                
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
    
    <footer>
        <p>&copy; 2024 JBPSTORE - Your Mobile Gadgets Shop. All rights reserved.</p>
    </footer>
</body>
</html>