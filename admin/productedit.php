<!DOCTYPE html>

  

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
</head>


  <body class="navbar-fixed sidebar-fixed" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>
    <?php
		if (isset($_GET['eml'])) {
			$emml = $_GET['eml'];}
        if (isset($_GET['try'])) {
                $ep = $_GET['try'];}?>
    

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
                              <a class="sidenav-item-link" href="reset-password.php?eml=<?php echo $emml ?>">
                                <span class="nav-text">Reset Password</span>
                                
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
             

              <div class="navbar-right ">

                <!-- search form -->
                

                <ul class="nav navbar-nav">
                  <!-- Offcanvas -->
                 
                  <?php				
                  
                      $connect= mysqli_connect("localhost","root","","jbp");
                      $ll="SELECT * from admin WHERE id = '$emml'";
                      $result = mysqli_query($connect, $ll);
                      $r=mysqli_fetch_assoc($result);
                      ?>
                  <!-- User Account -->
                  <li class="dropdown user-menu">
                    <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                      <img src="<?php echo $r['img'] ?>" class="user-image rounded-circle" alt="User Image" />
                      <span class="d-none d-lg-inline-block"><?php echo $r['Un'];?></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                         
                         <li>
                        <a class="dropdown-link-item" href="user-account-settings.php?eml=<?php echo $emml ?>">
                          <i class="mdi mdi-settings"></i>
                          <span class="nav-text">Account Setting</span>
                        </a>
                      </li>
                      

                      <li class="dropdown-footer">
                        <a class="dropdown-link-item" href="/FYP//FYP/loginregister.php"> <i class="mdi mdi-logout"></i> Log Out </a>
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
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
          <div class="d-flex flex-column justify-content-between">
            <div class="row justify-content-center">
              <div class="col-lg-6 col-xl-5 col-md-10 ">
                <div class="card card-default mb-0">
                  <div class="card-header pb-0">
                    <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                      <a class="w-auto pl-0" href="/index.php?eml=<?php echo $emml ?>">
                        <img src="images/jbplogo.png" alt=" JBPstore">
                        <span class="brand-name text-dark"> JBPstore</span>
                      </a>
                    </div>
                  </div>
                  <?php 
                    $lll="SELECT * from products where Product_ID='$ep'";
                    $resultt = mysqli_query($connect, $lll);
                    $rr=mysqli_fetch_assoc($resultt);
                  ?>
                  <div class="card-body px-5 pb-5 pt-0">
                    <h4 class="text-dark text-center mb-5">Product Details</h4>
                    <form method="post">
                      <div class="row">
                        <div class="form-group col-md-12 mb-4">
                          <input type="text" class="form-control input-lg" id="fn" name="name" aria-describedby="nameHelp" required value="<?php echo $rr['Product_name'] ?>">
                        </div>
                        <div class="form-group col-md-12 mb-4">
                          <input type="text" class="form-control input-lg" id="ln" name="detail" aria-describedby="nameHelp" required value="<?php echo $rr['Product_details'] ?>">
                        </div>
                        <div class="form-group col-md-12 mb-4">
                          <input type="int" class="form-control input-lg" id="Un" name="quantity" aria-describedby="emailHelp" required value="<?php echo $rr['Product_quantity'] ?>">
                        </div>
                        <div class="form-group col-md-12 mb-4">
                          <input type="int" class="form-control input-lg" id="Un" name="stock" aria-describedby="emailHelp" required value="<?php echo $rr['Product_stock'] ?>">
                        </div>
                        <div class="form-group col-md-12 ">
                          <input type="int" class="form-control input-lg" id="email" name="price" required value="<?php echo $rr['Product_price'] ?>">
                        </div>
                        <div class="form-group col-md-12 ">
                          <input type="int" class="form-control input-lg" id="password" name="nprice" required value="<?php echo $rr['Product_netprice'] ?>">
                        </div>
                        <div class="product-type mb-3">
                                            <label class="d-block" for="sale-price">Product Type </label>
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
                        <div class="col-md-12">
                          

                          <button type="submit" name="sub" class="btn btn-primary btn-pill mb-4">save</button>
                          <a href="viewproduct.php?eml=<?php echo $emml ?>"><button type="button" name="cancel" class="btn btn-primary btn-pill mb-4" >cancel</button></a>

                        
                        </div>
                      </div>
                    </form>

                    <?php
                     $con=mysqli_connect("localhost","root","","jbp");
                    if(isset($_POST['sub'])){
                      $n=$_POST['name'];
                      $d=$_POST['detail'];
                      $q=$_POST['quantity'];
                      $s=$_POST['stock'];
                      $p=$_POST['price'];
                      $np=$_POST['nprice'];
                      $t=$_POST['customRadio'];
                     
                      $sql="UPDATE products SET Product_name='$n',Product_details='$d',Product_quantity='$q',Product_stock='$s',Product_price='$p',Product_netprice='$np',Category_ID='$t' WHERE Product_ID='$ep'";
                      if(mysqli_query($con,$sql)){
                        echo "<script>alert('Product edited Successfully');";
                        echo 'window.location.href = "viewproduct.php?eml='.$emml.'";</script>';
                      }
                      else{
                        echo "<script>alert('Failed to Add New Staff')</script>";
                      }

                    
                    }
                    ?>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        


      </tbody>
    </table>

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
                    
                    
                    <script src="js/ mono.js"></script>
                    <script src="js/chart.js"></script>
                    <script src="js/map.js"></script>
                    <script src="js/custom.js"></script>

                    


                    <!--  -->


  </body>
</html>
