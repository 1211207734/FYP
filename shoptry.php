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
                            <div class="group">
                                <ul class="navigation">
                                    <li><a href="shoptry.php?cid=1">Smartphones</a></li>
                                    <li><a href="shoptry.php?cid=2">Tablets</a></li>
                                    <li><a href="shoptry.php?cid=3">Accessories</a></li>
                                    <li><a href="shoptry.php?cid=4">Wearables</a></li>
                                    <li><a href="shoptry.php?cid=5">Earphones</a></li>
                                    <li><a href="shoptry.php?cid=6">Powerbanks</a></li>
                                    <li><a href="shoptry.php?cid=7">Speakers</a></li>
                                    <li><a href="shoptry.php?cid=8">Phone stands</a></li>
                                    <li><a href="shoptry.php?cid=9">Storage extender</a></li>
                                    <li><a href="shoptry.php?cid=10">Mobile Photography accessories</a></li>
                                </ul>
                            </div>
                            <br>
                            <h2><u><?php echo htmlspecialchars($category['Category_name']); ?></u></h2>
                        </div>
                    </div>
                </div>
                <div class="product-grid">
                    <!-- Fetch and display products based on category ID -->
                    <?php
                    $query = "SELECT Product_ID, Product_name, Product_details, Product_price FROM products WHERE Category_ID = ? AND status = 'active'";
                    $stmt = $connect->prepare($query);
                    $stmt->bind_param("i", $cc);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while ($row = $result->fetch_assoc()) { ?>
                        <div class="product">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Product Details -->
                                    <img src="images/<?php echo htmlspecialchars($row['Product_name']); ?>.jpg" alt="<?php echo htmlspecialchars($row['Product_name']); ?>" class="product-image">
                                    <h3 class="product-title"><?php echo htmlspecialchars($row['Product_name']); ?></h3>
                                    <p class="product-details"><?php echo htmlspecialchars($row['Product_details']); ?></p>
                                    <p class="product-price">RM <?php echo htmlspecialchars($row['Product_price']); ?></p>
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['Product_ID']); ?>">
                                    <button class="button-2" role="button" name="add">Add to Cart</button>
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
    <?php
    if (isset($_POST['add'])) {
        // Retrieve form data
        $n = $_POST['id'];

        // Prepare SQL statement
        $connect = new mysqli("localhost", "root", "", "jbp");
        $sql = "INSERT INTO cart (cp_ID) VALUES (?)";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("i", $n);

        if ($stmt->execute()) {
            echo '<script type="text/javascript">';
            echo 'alert("Product Added to Cart Successfully!");';
            echo 'window.location.href = "shop.php?eml=' . $emml . '";';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Error adding product to cart: ' . $stmt->error . '");';
            echo '</script>';
        }

        $stmt->close();
        $connect->close();
    }
    ?>
    <footer>
        <p>&copy; 2024 JBPSTORE - Your Mobile Gadgets Shop. All rights reserved.</p>
    </footer>
</body>
</html>
