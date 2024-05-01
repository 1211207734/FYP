<!DOCTYPE html>

  

<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title> JBPstore Add New Staff </title>

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
</head>

</head>
  <body class="bg-light-gray" id="body">
          <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
          <div class="d-flex flex-column justify-content-between">
            <div class="row justify-content-center">
              <div class="col-lg-6 col-xl-5 col-md-10 ">
                <div class="card card-default mb-0">
                  <div class="card-header pb-0">
                    <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                      <a class="w-auto pl-0" href="/index.html">
                        <img src="images/jbplogo.png" alt=" JBPstore">
                        <span class="brand-name text-dark"> JBPstore</span>
                      </a>
                    </div>
                  </div>
                  <div class="card-body px-5 pb-5 pt-0">
                    <h4 class="text-dark text-center mb-5">New Staff Details</h4>
                    <form action="/index.html" method="post">
                      <div class="row">
                        <div class="form-group col-md-12 mb-4">
                          <input type="text" class="form-control input-lg" id="fn" name="f" aria-describedby="nameHelp" placeholder="First Name">
                        </div>
                        <div class="form-group col-md-12 mb-4">
                          <input type="text" class="form-control input-lg" id="ln" name="l" aria-describedby="nameHelp" placeholder="Last Name">
                        </div>
                        <div class="form-group col-md-12 mb-4">
                          <input type="text" class="form-control input-lg" id="Un" name="u" aria-describedby="emailHelp" placeholder="Username">
                        </div>
                        <div class="form-group col-md-12 ">
                          <input type="email" class="form-control input-lg" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12 ">
                          <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="col-md-12">
                          

                          <button type="submit" name="sub" class="btn btn-primary btn-pill mb-4">Add new staff</button>

                        
                        </div>
                      </div>
                    </form>

                    <?php
                    if(isset($_POST['sub'])){
                      $f=$_POST['f'];
                      $l=$_POST['l'];
                      $u=$_POST['u'];
                      $email=$_POST['email'];
                      $password=$_POST['password'];
                      $con=mysqli_connect("localhost","root","","jbpstore");
                      $sql="INSERT INTO staff (first_name,last_name,username,email,password) VALUES ('$f','$l','$u','$email','$password')";
                      $res=mysqli_query($con,$sql);
                      if($res){
                        echo "<script>alert('New Staff Added Successfully')</script>";
                      }
                      else{
                        echo "<script>alert('Failed to Add New Staff')</script>";
                      }
                    header("Location: /FYP/admin/index.html");
                    }
                    ?>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

</body>
</html>
