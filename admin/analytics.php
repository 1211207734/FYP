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
  
  
  
  
  <link href="plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
  
  
  
  
  
  <link href="plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
  
  
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
<?php if (isset($_GET['eml'])) {
					$emml = $_GET['eml'];}
          ?>
    

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

              <span class="page-title">analytics</span>

              <div class="navbar-right ">

                <!-- search form -->
                <div class="search-form">
                  <form action="index.php?eml=<?php echo $emml ?>" method="get">
                    <div class="input-group input-group-sm" id="input-group-search">
                      <input type="text" autocomplete="off" name="query" id="search-input" class="form-control" placeholder="Search..." />
                      <div class="input-group-append">
                        <button class="btn" type="button">/</button>
                      </div>
                    </div>
                  </form>
                   

                </div>

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
        <div class="content-wrapper">
          <div class="content">                <!-- Analytics Status -->
                <div class="row justify-content-between mb-5 ">
                  <div class="col-lg-6">
                    <div class="row">
                      
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex justify-content-xl-end flex-column flex-wrap align-items-lg-end">
                    <div id="mini-status-range" class="date-range date-range-lg bg-white">
                      <span class="date-holder text-dark"></span>
                      <i class="mdi mdi-menu-down"></i>
                    </div>
                    <span class="time-zone">Timezone: (+06:00) Asia - Dhaka</span>
                  </div>
                </div>


                <!-- User Sessions Bounce -->
                <div class="row">
                  <div class="col-xl-4">
                    
                        <!-- User -->
                        <div class="card card-default">
                          <div class="card-header">
                            <h2>Users</h2>
                          </div>
                          <div class="card-body">
                            <div class="bg-primary d-flex justify-content-between flex-wrap p-5 text-white align-items-lg-end">
                              <div class="d-flex flex-column">
                                <span class="h3 text-white">325,980</span>
                                <span>vs 275,900 (prev)</span>
                              </div>
                              <div>
                                <span>45%</span>
                                <i class="mdi mdi-arrow-up-bold"></i>
                              </div>
                            </div>
                            <div id="line-chart-1"></div>
                          </div>
                        </div>

                  </div>
                  <div class="col-xl-4">
                    
                        <!-- Session -->
                        <div class="card card-default">
                          <div class="card-header">
                            <h2>Sessions</h2>
                          </div>
                          <div class="card-body">
                            <div class="bg-success d-flex justify-content-between flex-wrap p-5 text-white align-items-lg-end">
                              <div class="d-flex flex-column">
                                <span class="h3 text-white">7,833</span>
                                <span>vs 7,012 (prev)</span>
                              </div>
                              <div>
                                <span>55%</span>
                                <i class="mdi mdi-arrow-up-bold"></i>
                              </div>
                            </div>
                            <div id="line-chart-2"></div>
                          </div>
                        </div>

                  </div>
                  <div class="col-xl-4">
                    
                  <!-- Bounce Rate -->
                  <div class="card card-default">
                    <div class="card-header">
                      <h2>Bounce Rate</h2>
                    </div>
                    <div class="card-body">
                      <div class="bg-danger d-flex justify-content-between flex-wrap p-5 text-white align-items-lg-end">
                        <div class="d-flex flex-column">
                          <span class="h3 text-white">67.0%</span>
                          <span>vs 65.21% (prev)</span>
                        </div>
                        <div>
                          <span>7%</span>
                          <i class="mdi mdi-arrow-down-bold"></i>
                        </div>
                      </div>
                      <div id="line-chart-3"></div>
                    </div>
                  </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-xl-6">
                    
                    <!-- User Acquisition Statistics -->
                    <div class="card card-default" id="user-acquisition">
                      <div class="card-header border-bottom pb-0">
                        <h2>User Acquisition</h2>
                        <ul class="nav nav-underline-active-primary" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#traffic-channel" role="tab" aria-selected="true">Traffic
                              Channel</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#source-medium" role="tab" aria-selected="false">Source / Medium </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#referrals" role="tab" aria-selected="false">Referrals</a>
                          </li>
                        </ul>
                      </div>

                      <div class="tab-content" id="myTabContent">
                        <div id="barchartlg1"></div>
                      </div>
                      <div class="card-footer d-flex flex-wrap bg-white">
                        <a href="#" class="text-uppercase py-3">Acquisition Report</a>
                      </div>
                    </div>

                  </div>

                  <!-- Sessions by Device -->
                  <div class="col-xl-6">
                    
                      <!-- Sessions By Device -->
                      <div class="card card-default">
                        <div class="card-header border-bottom">
                          <h2 class="mdi mdi-desktop-mac">Sessions by Device</h2>
                        </div>
                        <div class="card-body pt-6">
                          <div class="row">
                            <div class="col-lg-6">
                              <div id="donut-chart-1"></div>
                            </div>
                            <div class="col-lg-6">
                              <div class="media mb-4">
                                <i class="display-4 mdi mdi-remote-desktop text-primary mr-3"></i>
                                <div class="media-body">
                                  <p>Desktop</p>
                                  <p class="h4 my-1 text-dark">45% <span class="text-success">23.5% <i
                                        class="mdi mdi-arrow-up-bold small"></i></span>
                                  </p>
                                  <p>vs 155,900 (prev)</p>
                                </div>
                              </div>

                              <div class="media mb-4">
                                <i class="display-4 mdi mdi-tablet-android text-primary mr-3"></i>
                                <div class="media-body">
                                  <p>Tablet</p>
                                  <p class="h4 my-1 text-dark">30% <span class="text-success">13.5% <i
                                        class="mdi mdi-arrow-up-bold small"></i></span>
                                  </p>
                                  <p>vs 187,900 (prev)</p>
                                </div>
                              </div>

                              <div class="media mb-4">
                                <i class="display-4 mdi mdi-cellphone-iphone text-primary mr-3"></i>
                                <div class="media-body">
                                  <p>Mobile</p>
                                  <p class="h4 my-1 text-dark">25% <span class="text-success">35.5% <i
                                        class="mdi mdi-arrow-up-bold small"></i></span>
                                  </p>
                                  <p>vs 309,900 (prev)</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-xl-4">
                    
                    <!-- Us Vector Map -->
                    <div class="card card-default">
                      <div class="card-header">
                        <h2>User Map</h2>
                      </div>
                      <div class="card-body">
                        <div id="us-vector-map-marker"></div>
                        <ul class="list-unstyled mt-4">
                          <li class="d-flex flex-wrap justify-content-between border-top py-2 text-dark">
                            Oregon
                            <span class="text-primary">35</span>
                          </li>
                          <li class="d-flex flex-wrap justify-content-between border-top py-2 text-dark">
                            Indiana
                            <span class="text-success">10</span>
                          </li>
                          <li class="d-flex flex-wrap justify-content-between border-top py-2 text-dark">
                            Colorado
                            <span class="text-danger">25</span>
                          </li>
                        </ul>
                      </div>
                    </div>

                  </div>
                  <div class="col-xl-4">
                    
                    <!-- Page Views  -->
                    <div class="card card-default" id="page-views">
                      <div class="card-header">
                        <h2>Page Views</h2>
                      </div>
                      <div class="card-body py-0" data-simplebar style="height: 392px;">
                        <table class="table table-borderless table-thead-border">
                          <thead>
                            <tr>
                              <th>Page</th>
                              <th class="text-right px-3">Page Views</th>
                              <th class="text-right">Avg Time</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="text-primary"><a class="link" href="analytics.php?eml=<?php echo $emml ?>">/analytics.php?eml=<?php echo $emml ?></a></td>
                              <td class="text-right px-3">521</td>
                              <td class="text-right">2m:14s</td>
                            </tr>
                            <tr>
                              <td class="text-primary"><a class="link" href="charts-chartjs.html">/charts-chartjs.html</a></td>
                              <td class="text-right px-3">126</td>
                              <td class="text-right">1m:15s</td>
                            </tr>
                            <tr>
                              <td class="text-primary"><a class="link" href="profile.html">/profile.html</a></td>
                              <td class="text-right px-3">50</td>
                              <td class="text-right">1m:7s</td>
                            </tr>
                            <tr>
                              <td class="text-primary"><a class="link" href="general-widgets.html">/general-widgets.html</a></td>
                              <td class="text-right px-3">50</td>
                              <td class="text-right">2m:35s</td>
                            </tr>
                            <tr>
                              <td class="text-primary"><a class="link" href="card.html">/card.html</a></td>
                              <td class="text-right px-3">590</td>
                              <td class="text-right">5m:55s</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="card-footer bg-white py-4">
                        <a href="#" class="text-uppercase">Audience Overview</a>
                      </div>
                    </div>

                  </div>
                  <div class="col-xl-4">
                    <!-- Current Users  -->
                    <div class="card card-default">
                      <div class="card-header">
                        <h2>Current Users</h2>
                        <span>Realtime</span>
                      </div>
                      <div class="card-body">
                        <div id="barchartlg2"></div>
                      </div>
                      <div class="card-footer bg-white py-4">
                        <a href="#" class="text-uppercase">Current Users Overview</a>
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

                    
                    
                    <script src="plugins/apexcharts/apexcharts.js"></script>
                    
                    
                    
                    <script src="plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
                    <script src="plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
                    <script src="plugins/jvectormap/jquery-jvectormap-us-aea.js"></script>
                    
                    
                    
                    
                    
                    <script src="plugins/daterangepicker/moment.min.js"></script>
                    <script src="plugins/daterangepicker/daterangepicker.js"></script>
                    <script>
                      jQuery(document).ready(function() {
                        jQuery('input[name="dateRange"]').daterangepicker({
                        autoUpdateInput: false,
                        singleDatePicker: true,
                        locale: {
                          cancelLabel: 'Clear'
                        }
                      });
                        jQuery('input[name="dateRange"]').on('apply.daterangepicker', function (ev, picker) {
                          jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
                        });
                        jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function (ev, picker) {
                          jQuery(this).val('');
                        });
                      });
                    </script>
                    
                    
                    <script src="js/ JBPstore.js"></script>
                    <script src="js/chart.js"></script>
                    <script src="js/map.js"></script>
                    <script src="js/custom.js"></script>

                    


                    <!--  -->


  </body>
</html>
