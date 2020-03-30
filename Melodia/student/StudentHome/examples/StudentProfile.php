<?php
    session_start();
    include("../../../dbconnect.php");
    if(isset($_SESSION['login_id'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Melodia
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a class="simple-text logo-normal">
          Melodia
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="./StudentHome.php">
            <i class="material-icons">dashboard</i>
            <p>Student Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="./ApplyCourse.php">
              <i class="material-icons">school</i>
              <p>Apply Course</p>
              </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="./RegisteredCourses.php">
              <i class="material-icons">check_circle</i>
              <p>Course Approval Status</p>
              </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="./ApplyLeave.php">
              <i class="material-icons">check_circle</i>
              <p>Apply Leave</p>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="./ViewLeaveStatus.php">
              <i class="material-icons">check_circle</i>
              <p>Leave Status</p>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="./PaymentStatus.php">
              <i class="material-icons">payment</i>
              <p>Payment Status</p>
              </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">User Profile</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <!-- <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form> -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>  
                </a>
                <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div> -->
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <!-- <a class="dropdown-item" href="#">Profile</a> -->
                  <a class="dropdown-item" href="./ChangePassword/ChangePassword.php">Change Password</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../../../logout.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <?php
        $sql1="select Email from tbl_login where dStatus=0 and login_id=".$_SESSION['login_id'];
        $res1=mysqli_query($con,$sql1)or die(mysqli_error($con));
        while($row1=mysqli_fetch_array($res1)){
          $sEmail=$row1['Email'];
        }
        $sql2="select * from tbl_studentdetails where dStatus=0 and login_id=".$_SESSION['login_id'];
        $res2=mysqli_query($con,$sql2)or die(mysqli_error($con));
        if(mysqli_num_rows($res2)==1){
          while($row2=mysqli_fetch_array($res2)){
            $_SESSION['sId']=$row2['s_id'];
            $sName=$row2['sName'];
            $sContact=$row2['sContact'];
            $sDob=$row2['sDob'];
            $sGender=$row2['sGender'];
            $sFather=$row2['sFather'];
            $sMother=$row2['sMother'];
            $sAddress=$row2['sAddress'];
            $sCity=$row2['sCity'];
            $sDistrict=$row2['sDistrict'];
            $sPin=$row2['sPin'];
            $contact=$row2['contact'];
          }

      ?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form method="post" action="../../StudentAction.php">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" id="sName" name="sName" value="<?php echo $sName; ?>" class="form-control" disabled required/>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" id="sEmail" name="sEmail" value="<?php echo $sEmail; ?>" class="form-control" disabled required/>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Student Contact</label>
                          <input type="text" name="sContact" id="sContact" value="<?php echo $sContact; ?>" class="form-control" onchange="Validatep()" disabled required/>
                          <label style="display:nne; color:red" id="contact_error"></label>
                          <script>
                            function Validatep() {
                              var val = document.getElementById('sContact').value;
                              if (!val.match(/^(?!(\d)\1{9})(?!0123456789|1234567890|0987654321|0000000000|1111111111|22222222222|3333333333|4444444444|5555555555|6666666666|7777777777|8888888888|9999999999|1000000000|2000000000|3000000000|40000000000|5000000000|6000000000|7000000000|8000000000|9000000000)\d{10}$/)) {
                                $("#contact_error").html('Invalid Phone number..!').fadeIn().delay(4000).fadeOut();
                                document.getElementById('sContact').value = "";
                                return false;
                              }
                              return true;
                            }
                          </script>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Date of birth</label>
                          <input type="date" name="sDob" id="sDob" value="<?php echo $sDob; ?>" class="form-control" disabled required/>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Gender</label>
                          <input type="text" name="sGender" id="sGender" value="<?php echo $sGender; ?>" class="form-control" disabled required/>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Father's Name</label>
                          <input type="text" name="sFather" id="sFather" value="<?php echo $sFather; ?>" class="form-control" disabled required/>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Mother's Name</label>
                          <input type="text" id="sMother" id="sMother" value="<?php echo $sMother; ?>" class="form-control" disabled required/>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contact</label>
                          <input type="text" id="pContact" name="pContact" value="<?php echo $contact; ?>" class="form-control" onchange="Validatepc()" disabled required/>
                          <label style="display:nne; color:red" id="pcontact_error"></label>
                          <script>
                            function Validatepc() {
                              var val = document.getElementById('pContact').value;
                              if (!val.match(/^(?!(\d)\1{9})(?!0123456789|1234567890|0987654321|0000000000|1111111111|22222222222|3333333333|4444444444|5555555555|6666666666|7777777777|8888888888|9999999999|1000000000|2000000000|3000000000|40000000000|5000000000|6000000000|7000000000|8000000000|9000000000)\d{10}$/)) {
                                $("#pcontact_error").html('Invalid Phone number..!').fadeIn().delay(4000).fadeOut();
                                document.getElementById('pContact').value = "";
                                return false;
                              }
                              return true;
                            }
                          </script>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress</label>
                          <input type="text" id="sAddress" name="sAddress" value="<?php echo $sAddress; ?>" class="form-control" onchange="Validateaddress()" disabled required/>
                          <label style="display:nne; color:red" id="adress_error"></label>
                          <script>
                            function Validateaddress() {
                              var val = document.getElementById('sAddress').value;
                              if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) {
                                $("#adress_error").html('Invalid Address..!').fadeIn().delay(4000).fadeOut();
                                document.getElementById('sAddress').value = "";
                                return false;
                              }
                              return true;
                            }
                          </script>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">District</label>
                          <input type="text" name="sDistrict" id="sDistrict" value="<?php echo $sDistrict; ?>" class="form-control" onchange="Validatedistrict()" disabled required/>
                          <label style="display:nne; color:red" id="district_error"></label>
                          <script>
                            function Validatedistrict() {
                              var val = document.getElementById('sDistrict').value;
                              if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) {
                                $("#district_error").html('Invalid District name..!').fadeIn().delay(4000).fadeOut();
                                document.getElementById('sDistrict').value = "";
                                return false;
                              }
                              return true;
                            }
                          </script>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" name="sCity" id="sCity" value="<?php echo $sCity; ?>" class="form-control" onchange="Validatecity()" disabled required/>
                          <label style="display:nne; color:red" id="city_error"></label>
                          <script>
                            function Validatecity() {
                              var val = document.getElementById('sCity').value;
                              if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) {
                                $("#city_error").html('Invalid name of city..!').fadeIn().delay(4000).fadeOut();
                                document.getElementById('sCity').value = "";
                                return false;
                              }
                              return true;
                            }
                          </script>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Postal Code</label>
                          <input type="text" id="sPin" name="sPin" value="<?php echo $sPin; ?>" class="form-control" onchange="Validatepin()" disabled required/>
                          <label style="display:nne; color:red" id="pin_error"></label>
                          <script>
                            function Validatepin() {
                              var val = document.getElementById('sPin').value;
                              if (!val.match(/^(?!(\d)\1{9})(?!0123456789|1234567890|0987654321|0000000000|1111111111|22222222222|3333333333|4444444444|5555555555|6666666666|7777777777|8888888888|9999999999|1000000000|2000000000|3000000000|40000000000|5000000000|6000000000|7000000000|8000000000|9000000000)\d{6}$/)) {
                                $("#pin_error").html('Invalid Pin number..!').fadeIn().delay(4000).fadeOut();
                                document.getElementById('sPin').value = "";
                                return false;
                              }
                              return true;
                            }
                          </script>
                        </div>
                      </div>
                    </div>
                    <button type="submit" name="sEditProfile" id="sEditProfile" class="btn btn-primary pull-right" disabled>Save</button>
                    <button type="button" name="edit" id="edit" class="btn btn-primary pull-right">Update</button>
                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
                    <script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
                    <script>
                      $(document).ready(function() {
                        $("#edit").click(function(){
                          $("#sContact").prop("disabled", false);
                          $("#pContact").prop("disabled", false);
                          $("#sAddress").prop("disabled", false);
                          $("#sDistrict").prop("disabled", false);
                          $("#sCity").prop("disabled", false);
                          $("#sPin").prop("disabled", false);
                          $("#sEditProfile").prop("disabled", false);
                        });
                      });
                    </script>
                  </form>
                </div>
              </div>
            </div>
            <?php
              $sql3="select * from tbl_profile where login_id=".$_SESSION['login_id'];
              $res3=mysqli_query($con,$sql3)or die(mysqli_error($con));
              while($row3=mysqli_fetch_array($res3)){
                $proPic=$row3['proImage'];
              }
            ?>
            <div class="col-md-4">
              <div class="card card-profile">
                <div id="profilePic" class="card-avatar">
                  <?php
                    if(mysqli_num_rows($res3)>0){
                      echo "<img class='img' src='../../proPics/".$proPic."' />";
                    } else{
                      echo "<img class='img' src='../assets/img/faces/marc.jpg' />";
                    }
                  ?>
                  <!-- <a href="#pablo"> -->
                    <!-- <img class="img" src="../assets/img/faces/marc.jpg" /> -->
                  <!-- </a> -->
                </div>
                <div class="card-body">
                  <h4 class="card-title"><?php echo $sName; ?></h4>
                  <h6 class="card-category text-gray">Student</h6>
                  
                  <!-- <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p> -->
                  <!-- <a href="#pablo" class="btn btn-primary btn-round">Change Pro Pic</a> -->
                  <button class="btn btn-primary btn-round" onClick="doChange()" id="proSelect" name="proSelect">Change Pro Pic</button>
                  <div id="proChange" name="proChange" style="display:none;">
                    <form id="uploadForm" action="../../StudentAction.php" method="post">
                      <input type="file" name="proImage" id="proImage" required/>
                      <!-- <a href="#pablo" class="btn btn-primary btn-round">Change Pro Pic</a> -->
                      <button type="submit" class="btn btn-primary btn-round">Change</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <script>
              function doChange(){
                $('#proChange').show();
                $('#proSelect').hide();
              }
              // --------pro pic upload-------
              $(document).ready(function (e) {
                $("#uploadForm").on('submit',(function(e) {
                  e.preventDefault();
                  $.ajax({
                    url: "../../StudentAction.php",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                        cache: false,
                    processData:false,
                    success: function(data)
                      {
                        $("#profilePic").html(data);
                        $('#proChange').hide();
                        $('#proSelect').show();
                      },
                      error: function() 
                      {
                      } 	        
                  });
                }));
              });
            </script>
          </div>
        </div>
      </div>
      <?php
        }
      ?>
      <!-- <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="https://creative-tim.com/presentation">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/license">
                  Licenses
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
        </div>
      </footer> -->
    </div>
  </div>
  <!-- <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
              <span class="badge filter badge-rose active" data-color="rose"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-4.jpg" alt="">
          </a>
        </li>
        <li class="button-container">
          <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-primary btn-block">Free Download</a>
        </li> -->
        <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> -->
        <!-- <li class="button-container">
          <a href="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
            View Documentation
          </a>
        </li>
        <li class="button-container github-star">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
          <br>
          <br>
        </li>
      </ul>
    </div>
  </div> -->
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <!-- <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script> -->
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
</body>

</html>
<?php
    }else{
      echo"<script>window.location.href='../../../index.php'</script>";
    }
?>