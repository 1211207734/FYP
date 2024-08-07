<!DOCTYPE html>
<?php if (isset($_GET['eml'])) {
					$emml = $_GET['eml'];}
          ?>
  

<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title> JBPstore  </title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link href="plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="plugins/simplebar/simplebar.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="plugins/nprogress/nprogress.css" rel="stylesheet" />
  
  
  <link href="plugins/prism/prism.css" rel="stylesheet" />
  <link href="plugins/toaster/toastr.min.css" rel="stylesheet" />

  
  
  <link href="plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css" rel="stylesheet" />
  
  
  
  
  <!--  JBPstore CSS -->
  <link id="main-css-href" rel="stylesheet" href="css/style.css" />

  


  <!-- jbplogo -->
  <link href="images/jbplogo.png" rel="shortcut icon" />

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="plugins/nprogress/nprogress.js"></script>
 <script>
        function disableBack() { window.history.forward(); }
setTimeout("disableBack()", 0);
window.onunload = function () { null };
    </script>
</head>


  <body class="navbar-fixed sidebar-fixed" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>


    

    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">
      
      
        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="/FYP/admin/index.php?eml=<?php echo $emml ?>">
                <img src="images/jbplogo.png" alt=" JBPstore">
                <span class="brand-name"> JBPstore</span>
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-left" data-simplebar style="height: 100%;">
              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
                

                
                  <li>
                    <a class="sidenav-item-link" href="index.php?eml=<?php echo $emml ?>">
                      <i class="mdi mdi-briefcase-account-outline"></i>
                      <span class="nav-text">Business Dashboard</span>
                    </a>
                  </li>

                
                  <li class="section-title">
                    Pages
                  </li>
 
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#users"
                      aria-expanded="false" aria-controls="users">
                      <i class="mdi mdi-image-filter-none"></i>
                      <span class="nav-text">User</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="users"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="user-profile-settings.php?eml=<?php echo $emml ?>">
                                <span class="nav-text">User Profile Settings</span>
                                
                              </a>
                            </li>
                          
                            <li >
                              <a class="sidenav-item-link" href="user-account-settings.php?eml=<?php echo $emml ?>">
                                <span class="nav-text">User Account Settings</span>
                                
                              </a>
                            </li>             
                      </div>
                    </ul>
                  </li>
                

                

                
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#authentication"
                      aria-expanded="false" aria-controls="authentication">
                      <i class="mdi mdi-account"></i>
                      <span class="nav-text">Authentication</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="authentication"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        
                          
                             <li >
                              <a class="sidenav-item-link" href="/FYP/loginregister.php" onclick="log()">
                                <span class="nav-text">Sign Out</span>
                                
                              </a>
                            </li>
                          <script type="text/javascript">
                            function log(){
                            alert("You have logout!");
                            }
                          </script>  
                              <li >
                              <a class="sidenav-item-link" href="changepw.php?eml=<?php echo $emml ?>">
                                <span class="nav-text">Change Password</span>
                                
                              </a>
                            </li>

                            <?php if($emml == 1){
                              $o="";}
                              else{
                                $o="hidden";
                              }
                               ?>
                            <li <?php echo $o ?> >
                              <a class="sidenav-item-link" href="newstaff.php?eml=<?php echo $emml ?>">
                                <span class="nav-text">New Staff</span>
                                
                              </a>
                            </li>
                          
                        

                        
                      </div>
                    </ul>
                  </li>
                

                

                
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#other-page"
                      aria-expanded="false" aria-controls="other-page">
                      <i class="mdi mdi-file-multiple"></i>
                      <span class="nav-text">Data pages</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="other-page"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                             <li>
                              <a class="sidenav-item-link" href="viewproduct.php?eml=<?php echo $emml?>">
                                <span class="nav-text">Product</span>
                                
                              </a>
                            </li>
                            <li>
                              <a class="sidenav-item-link" href="viewcustomer.php?eml=<?php echo $emml?>">
                                <span class="nav-text">Customer</span>
                                
                              </a>
                            </li>
                            <li>
                              <a class="sidenav-item-link" href="viewstaff.php?eml=<?php echo $emml?>">
                                <span class="nav-text">Staff</span>
                                
                              </a>
                            </li>
                              <li>
                              <a class="sidenav-item-link" href="vieworder.php?eml=<?php echo $emml?>">
                                <span class="nav-text">Order</span>
                                
                              </a>
                            </li>
                            <li>
                              <a class="sidenav-item-link" href="viewpromo.php?eml=<?php echo $emml?>">
                                <span class="nav-text">Promotion</span>
                                
                              </a>
                            </li>
                            <li >
                              <a class="sidenav-item-link" href="salesreport.php?eml=<?php echo $emml?>">
                                <span class="nav-text">Sales Report</span>
                                
                              </a>
                            </li>
                        
                        

                        
                      </div>
                    </ul>
                  </li>
                

                
              </ul>

            </div>

            <div class="sidebar-footer">
              <div class="sidebar-footer-content">
                <ul class="d-flex">
                  <li>
                    <a href="user-account-settings.php?eml=<?php echo $emml ?>" data-toggle="tooltip" title="Profile settings"><i class="mdi mdi-settings"></i></a></li>
                  
                </ul>
              </div>
            </div>
          </div>
        </aside>
      

      <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
      <div class="page-wrapper">
        
          <!-- Header -->
          <header class="main-header" id="header">
            <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>

              <span class="page-title">Product</span>

              <div class="navbar-right ">

                <!-- search form -->
             

                <ul class="nav navbar-nav">
                  <!-- Offcanvas -->
                 
                  <!-- User Account -->
                  <?php				
                  
                      $connect= mysqli_connect("localhost","root","","jbp");
                      $ll="SELECT * from admin WHERE id = '$emml'";
                      $result = mysqli_query($connect, $ll);
                      $r=mysqli_fetch_assoc($result);
                      ?>
                  <li class="dropdown user-menu">
                    <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                      <img src="<?php echo $r['img'] ?>" class="user-image rounded-circle" alt="User Image" />
                      <span class="d-none d-lg-inline-block">  <?php echo $r['Un'];?></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                         
                         <li>
                        <a class="dropdown-link-item" href="user-account-settings.php?eml=<?php echo $emml ?>">
                          <i class="mdi mdi-settings"></i>
                          <span class="nav-text">Account Setting</span>
                        </a>
                      </li>
                     

                      <li class="dropdown-footer">
                        <a class="dropdown-link-item" href="/FYP/loginregister.php" onclick="log()" > <i class="mdi mdi-logout"></i> Log Out </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>


          </header>

        <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
        <div class="content-wrapper">
          <div class="content"><!-- For Components documentaion -->


<!-- Products Inventory -->
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h2>Products Inventory</h2>
                <a href="#" class="btn btn-primary btn-pill" data-toggle="modal" data-target="#modal-stock">Add Stock</a>
            </div>
            <div class="card-footer card-profile-footer">
                <ul class="nav nav-border-top justify-content-center">
                  <li class="nav-item">
                    <a class="nav-link active" href="viewproduct.php?eml=<?php echo $emml ?>">Active Products</a>
                  </li>
                    
                  <li class="nav-item">
                    <a class="nav-link " href="iviewproduct.php?eml=<?php echo $emml ?>&sta=inactive">Inactive Products</a>
                  </li>

                </ul>
            </div>
  <br>
            <table id="productsTable" class="table table-hover table-product" style="width:100%">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th hidden>id</th>
                        <th>Price</th>
                        <th>Net Price</th>
                        <th>In Stock</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT Product_ID, Product_name, Product_price,Product_netprice, Product_stock, Category_name,status,img FROM products 
                        INNER JOIN categories ON products.Category_ID = categories.Category_ID where status='active'";
                $result = mysqli_query($connect, $sql);
                while($row = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                      <?php $selectedid = $row['Product_ID']; ?>
                        <td class="py-0">
                            <img src="<?php echo $row['img'] ?>" width="100px" height="100px" alt="<?php echo $row['img'] ?>">
                        </td>
                        <td><?php echo $row['Product_name'];?></td>
                        <td hidden><?php echo $row['Product_ID'] ?></tdhidden>
                        <td><?php echo number_format($row['Product_price'], 2);?></td>
                        <td><?php echo number_format($row['Product_netprice'], 2);?></td>
                        <td><?php echo $row['Product_stock'];?></td>
                        <td><?php echo $row['Category_name'];?></td>
                        <td><?php echo $row['status'];?></td>
                        <td>
                            <div class="dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="productedit.php?eml=<?php echo $emml?>&try=<?php echo $row['Product_ID'] ?>">Edit</a>   
                                    <a class="dropdown-item" href="#" onclick="return manageProduct(<?php echo $row['Product_ID']; ?>, 'inactivate')">Inactivate Product</a>
                                    <a class="dropdown-item" href="#" onclick="return manageProduct(<?php echo $row['Product_ID']; ?>, 'delete')">Delete Product</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php }?>
                <script type="text/javascript">
    function manageProduct(id, action) {
        var confirmationMessage = action === 'delete' ? "Are you sure you want to delete this product?" : "Are you sure you want to inactivate this product?";
        if (confirm(confirmationMessage)) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "manage_product.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    alert(response.message);
                    if (response.success) {
                        window.location.href = "viewproduct.php?eml=<?php echo $emml; ?>";
                    }
                }
            };
            xhr.send("id=" + id + "&action=" + action);
        }
        return false;
    }
</script>
                </tbody>
            </table>
            
            <!-- Stock Modal -->
            <div class="modal fade modal-stock" id="modal-stock" aria-labelledby="modal-stock" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <form method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header align-items-center p3 p-md-5">
                    <h2 class="modal-title" id="exampleModalGridTitle">Add Stock</h2>
                    <div>
                        <button type="button" class="btn btn-light btn-pill mr-1 mr-md-2" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="svbt" class="btn btn-primary btn-pill">Save</button>
                    </div>
                </div>
                <div class="modal-body p3 p-md-5">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="h5 mb-5">Product Information</h3>
                            <div class="form-group mb-5">
                                <label for="new-product">Product Title</label>
                                <input type="text" class="form-control" id="new-product" name="pn" placeholder="Add Product" required>
                            </div>
                            <div class="form-group mb-5">
                                <label for="stock">Product Stock</label>
                                <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock" required>
                            </div>
                            <div class="form-group mb-5">
                                <label for="quantity">Product Quantity</label>
                                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col">
                                    <label for="price">Price</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">$</span>
                                        </div>
                                        <input type="text" class="form-control" id="price" name="netprice" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="sale-price">Sale Price</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">$</span>
                                        </div>
                                        <input type="text" class="form-control" id="sale-price" name="price" placeholder="Sale Price" aria-label="SalePrice" aria-describedby="basic-addon2">
                                    </div>
                                </div>
                            </div>
                            <div class="product-type mb-3">
                                <label class="d-block">Product Type <i class="mdi mdi-help-circle-outline"></i> </label>
                                <div>
                                <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" value="1" checked="checked">
                                                    <label class="custom-control-label" for="customRadio1">Smartphones</label>
                                                </div>
                                                <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" value="2">
                                                    <label class="custom-control-label" for="customRadio2">Tablets</label>
                                                </div>
                                                <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                                    <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input" value="3">
                                                    <label class="custom-control-label" for="customRadio3">Accessories</label>
                                                </div>
                                                <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                                    <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input" value="4">
                                                    <label class="custom-control-label" for="customRadio4">Wearables</label>
                                                </div>
                                                <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                                    <input type="radio" id="customRadio5" name="customRadio" class="custom-control-input" value="5">
                                                    <label class="custom-control-label" for="customRadio5">Earphones</label>
                                                </div>
                                                <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                                    <input type="radio" id="customRadio6" name="customRadio" class="custom-control-input" value="6">
                                                    <label class="custom-control-label" for="customRadio6">Powerbank</label>
                                                </div>
                                                <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                                    <input type="radio" id="customRadio7" name="customRadio" class="custom-control-input" value="7">
                                                    <label class="custom-control-label" for="customRadio7">Speakers</label>
                                                </div>
                                                <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                                    <input type="radio" id="customRadio8" name="customRadio" class="custom-control-input" value="8">
                                                    <label class="custom-control-label" for="customRadio8">Phone stands</label>
                                                </div>
                                                <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                                    <input type="radio" id="customRadio9" name="customRadio" class="custom-control-input" value="9">
                                                    <label class="custom-control-label" for="customRadio9">Storage extender</label>
                                                </div>
                                                <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                                    <input type="radio" id="customRadio10" name="customRadio" class="custom-control-input" value="10">
                                                    <label class="custom-control-label" for="customRadio10">Mobile Photography Accessories</label>
                                                </div>
                                </div>
                            </div>
                            <div class="editor">
                                <label class="d-block">Description <i class="mdi mdi-help-circle-outline"></i></label>
                                <textarea class="form-control" id="description" name="description" placeholder="Add Description" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="custom-file mt-4">
                                <input type="file" class="custom-file-input" id="customFile" name="customFile" required>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

                    <?php
$con = mysqli_connect("localhost", "root", "", "jbp");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['svbt'])) {
    $n = mysqli_real_escape_string($con, $_POST['pn']);
    $s = mysqli_real_escape_string($con, $_POST['stock']);
    $q = mysqli_real_escape_string($con, $_POST['quantity']);
    $np = mysqli_real_escape_string($con, $_POST['netprice']);
    $p = mysqli_real_escape_string($con, $_POST['price']);
    $c = mysqli_real_escape_string($con, $_POST['customRadio']);
    $d = mysqli_real_escape_string($con, $_POST['description']);
    $fn = basename($_FILES['customFile']['name']);
    $ft = $_FILES['customFile']['tmp_name'];
    $folder = "images/pro/" . $fn;
    $ffold = "\FYP/images/" . $fn;

    // Validate inputs
    if (!is_numeric($np) || $np <= 0) {
        echo "<script>alert('Net price must be a positive number');</script>";
    } elseif (!is_numeric($p) || $p <= 0) {
        echo "<script>alert('Price must be a positive number');</script>";
    } elseif (!is_numeric($s) || $s < 0) {
        echo "<script>alert('Stock must be a non-negative number');</script>";
    } else {
        // Upload file
        if (move_uploaded_file($ft, $folder)) {
          move_uploaded_file($ft, $ffold);
            // Insert into database
            $sql = "INSERT INTO products (Product_name, Product_details, Product_stock, Product_quantity, Product_netprice, Product_price, Category_ID, img) 
                    VALUES ('$n', '$d', '$s', '$q', '$np', '$p', '$c', '$folder')";

            if (mysqli_query($con, $sql)) {
                echo "<script>alert('New product added successfully');";
                echo 'window.location.href = "viewproduct.php?eml='.$emml.'";</script>';
            } else {
                echo "<script>alert('Failed to add new product');</script>";
            }
        } else {
            echo "<script>alert('Failed to upload file');</script>";
        }
    }
}

mysqli_close($con);
?>

                </div>
            </div>
        </div>
    </div>
</div>


          
        </div>
        
          <!-- Footer -->
          <footer class="footer mt-auto">
            <div class="copyright bg-white">
              <p>
                &copy; <span id="copy-year"></span> Copyright  JBPstore   </a>.
              </p>
            </div>
            <script>
                var d = new Date();
                var year = d.getFullYear();
                document.getElementById("copy-year").innerHTML = year;
            </script>
          </footer>

      </div>
    </div>
    
                    <!-- Card Offcanvas -->
                         



    
                    <script src="plugins/jquery/jquery.min.js"></script>
                    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                    <script src="plugins/simplebar/simplebar.min.js"></script>
                    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>

                    
                    
                    <script src="plugins/prism/prism.js"></script>
                    
                    
                    
                    <script src="plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
                    
                    
                    
                    <script src="plugins/apexcharts/apexcharts.js"></script>
                    
                    
                    <script src="js/ JBPstore.js"></script>
                    <script src="js/chart.js"></script>
                    <script src="js/map.js"></script>
                    <script src="js/custom.js"></script>

                    


                    <!--  -->


  </body>
</html>
