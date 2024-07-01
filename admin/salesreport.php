<!DOCTYPE html>
<?php if (isset($_GET['eml'])) {
					$emml = $_GET['eml'];}?>
  

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
  <script src="js/dist/jspdf.umd.js"></script>
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
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>

              <span class="page-title">Sales Report</span>

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
        
        <div id="print" class="content-wrapper">
          <div class="content">					<div class="invoice-wrapper rounded border bg-white py-5 px-3 px-md-4 px-lg-5 mb-6">
						<div class="d-flex justify-content-between">
							<h2 class="text-dark font-weight-medium"><span id="copy-month"></span> Sales Report</h2>
              
							<div class="btn-group">
								<a hidden href="pdf.php" class="btn btn-sm btn-light">
									<i class="mdi mdi-printer"></i> PDF</a>
                  
                  <a href="excel.php" class="btn btn-sm btn-secondary">
									<i class="mdi mdi-printer"></i>Excel </a>
							</div>
						</div>
						<div class="row pt-5">
							<div class="col-xl-3 col-lg-4">
								
								<address>
									JBPstore
									<br> Jalan Ayer Keroh Lama, 75450 Bukit Beruang, Melaka, Malaysia
									<br> Email: JBPstore@gmail.com
									<br> Phone: +606 252 3253
								</address>
							</div>
							
							<div class="col-xl-3 col-lg-4">
								<p class="text-dark mb-2">Details</p>
								<address>
									Report ID:
									<span class="text-dark">#<span id="copy-data"></span></span>
									<br> Generated Date: <span id="copy-date" class="text-dark"></span>
                  <br> Generated By: <?php echo $r['Un'];?>
									<br> VAT: W12345678901234
								</address>
							</div>
            </div>
            <div class="table-responsive">
              <table class="table mt-3 table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Sales</th>
                    <th>Costs</th>
                    <th>Net Profit</th>
                    <th>Profit(%)</th>
                  </tr>
                </thead>
                <?php 
                $rer="SELECT categories.Category_name, 
                format(SUM((Product_quantity-Product_stock)*Product_price),2)AS'Sales',
                format(SUM(Product_quantity*Product_netprice),2)AS'Costs',
                format(SUM((Product_quantity-Product_stock)*Product_price) - SUM(Product_quantity*Product_netprice),2)AS'Net Profit',
                format(SUM((Product_quantity-Product_stock)*Product_price)/SUM(Product_quantity*Product_netprice)*100,2)AS'Profit' 
                FROM products,categories WHERE products.Category_ID=categories.Category_ID 
                GROUP BY products.Category_ID";

                $re = mysqli_query($connect, $rer);
                $i=0; 
                while($rr=mysqli_fetch_assoc($re)){
                  $i++; 
                ?>
                <tbody>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $rr['Category_name'] ?></td>
                    <td>RM <?php echo $rr['Sales'] ?></td>
                    <td>RM <?php echo $rr['Costs'] ?></td>
                    <td>RM <?php echo $rr['Net Profit'] ?></td>
                    <td><?php echo $rr['Profit'] ?></td>
                  </tr>
                 
                </tbody>
              <?php } ?>
              </table>
            </div>
            <?php
            $reer="SELECT format(SUM((Product_quantity-Product_stock)*Product_price),2)AS'Sales',
                        format(SUM(Product_quantity*Product_netprice),2)AS'Costs',
                        format(SUM((Product_quantity-Product_stock)*Product_price)/SUM(Product_quantity*Product_netprice)*100,2)AS'Profit'
                        FROM products";
            $rrr = mysqli_query($connect, $reer);
            $rrrr=mysqli_fetch_assoc($rrr);
            ?>

						<div class="row justify-content-end">
							<div class="col-lg-5 col-xl-4 col-xl-3 ml-sm-auto">
								<ul class="list-unstyled mt-4">
									<li class="mid pb-3 text-dark"> Total Sales
										<span class="d-inline-block float-right text-default">RM <?php echo $rrrr['Sales'] ?></span>
									</li>
									<li class="mid pb-3 text-dark">Total Costs
										<span class="d-inline-block float-right text-default">RM <?php echo $rrrr['Costs'] ?></span>
									</li>
									<li class="pb-3 text-dark">Total Profit(%)
										<span class="d-inline-block float-right"><?php echo $rrrr['Profit'] ?> %</span>
									</li>
								</ul>
								
							</div>
						</div>
					</div>
          </div>
</div>
<script>
                    window.jsPDF = window.jspdf.jsPDF;

                  // Convert HTML content to PDF
                  function PDF() {
                      var doc = new jsPDF();
                    
                      // Source HTMLElement or a string containing HTML.
                      var elementHTML = document.querySelector("#print");

                      doc.html(elementHTML, {
                          callback: function(doc) {
                              // Save the PDF
                              doc.save('Sales_Report.pdf');
                          },
                          margin: [10, 10, 10, 10],
                          autoPaging: 'text',
                          x: 0,
                          y: 0,
                          width: 190, //target width in the PDF document
                          windowWidth: 675 //window width in CSS pixels
                      });
                  }
              </script>    
        
        
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
                var montth = d.getMonth();
                var data = (d.getFullYear()+d.getMonth()+d.getDate())*12345;
                if(montth == 0){
                  month = "January";
                }
                else if(montth == 1){
                  month = "February";
                }
                else if(montth == 2){
                  month = "March";
                }
                else if(montth == 3){
                  month = "April";
                }
                else if(montth == 4){
                  month = "May";
                }
                else if(montth == 5){
                  month = "June";
                }
                else if(montth == 6){
                  month = "July";
                }
                else if(montth == 7){
                  month = "August";
                }
                else if(montth == 8){
                  month = "September";
                }
                else if(montth == 9){
                  month = "October";
                }
                else if(montth == 10){
                  month = "November";
                }
                else if(montth == 11){
                  month = "December";
                }
                var day = d.getDate();
                document.getElementById("copy-year").innerHTML = year;
                document.getElementById("copy-month").innerHTML = month;
                document.getElementById("copy-date").innerHTML = d.toDateString();
                document.getElementById("copy-data").innerHTML = data;
            </script>
          </footer>

      </div>
    </div>
    
                    <!-- Card Offcanvas -->
                


    
                    <script src="plugins/jquery/jquery.min.js"></script>
                    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                    <script src="plugins/simplebar/simplebar.min.js"></script>
                    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>

                    
                    <script src="js/ JBPstore.js"></script>
                    <script src="js/chart.js"></script>
                    <script src="js/map.js"></script>
                    <script src="js/custom.js"></script>

                    


                    <!--  -->


  </body>
</html>
