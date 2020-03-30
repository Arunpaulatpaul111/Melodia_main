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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
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
          <li class="nav-item  ">
            <a class="nav-link" href="./FacultyHome.php">
              <i class="material-icons">dashboard</i>
              <p>Faculty Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="./ApplyLeave.php">
              <i class="material-icons">check_circle</i>
              <p>Apply Leave</p>
              </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="./LeaveStatus.php">
              <i class="material-icons">check_circle</i>
              <p>Leave Status</p>
              </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="./ApproveSleave.php">
              <i class="material-icons">check_circle</i>
              <p>Approve Leaves</p>
              </a>
          </li>
          <li class="nav-item active">
              <a class="nav-link">
              <i class="material-icons">check_circle</i>
              <p>Student Attendance</p>
              </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./CourseStatus.php">
            <i class="material-icons">check_circle</i>
            <p>Update Course Status</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./ViewCourseStatus.php">
            <i class="material-icons">check_circle</i>
            <p>View Course Status</p>
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
            <a class="navbar-brand" href="#pablo"></a>
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
                  <a class="dropdown-item" href="./FacultyProfile.php">Profile</a>
                  <a class="dropdown-item" href="ChangePassword/ChangePassword.php">Change Password</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../../../logout.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      
      <div class="content">
        <div class="container-fluid">
          <div class="row">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Mark the leaves</h4>
                  <!-- <p class="card-category">Complete your profile</p> -->
                </div>
                <div class="card-body">
                  <form method="post" action="./Attendance/DailyReport.php">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Select Date</label>
                          <input type="date" id="sAttendance" name="sAttendance" class="form-control" onchange="doList(this.value)" required/>
                          <label style="display:nne; color:red" id="date_error"></label>
                        </div>
                      </div>
                    </div>
                    <button type="button" name="aSave" id="aSave" class="btn btn-primary pull-right" style="display:none" onClick="doSave()">Save</button>
                    <button type="submit" name="aGenerate" id="aGenerate" class="btn btn-primary pull-right" style="display:none">Generate</button>
                  </form>
                </div>
              </div>
          </div>
          <div id="aList" name="aList" class="row" style="display:none">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">  
                  <table class="table">
                    <thead class="text-primary">
                        <th>No.</th>
                        <th>Student Name</th>
                        <th></th>
                    </thead>
                    <tbody id="dataList" name="dataList">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function doList(val) {
      var a=new Date();
      var b=new Date(val);
      if(a< b){
        $("#date_error").html('Dont select coming date..!').fadeIn().delay(4000).fadeOut();
        document.getElementById('sAttendance').value="";
      } else{
        $.ajax({
        type: "POST",
        url: "../../FacultyAction.php",
        data:{abscentDate:val},
        success: function(data){
          $("#aList").show();
          $("#dataList").html(data);
          doCheck(val);
        }
        });
      }   
    }
    // --------enter data to abscent table--------
    function doEnter(val){
      var aDate=document.getElementById('sAttendance').value;
      $.ajax({
        type: "POST",
        url: "../../FacultyAction.php",
        data:{abscentDate:aDate,
              sId:val},
        success: function(data){
          $("#aList").show();
          $("#dataList").html(data);
          doCheck(aDate);
        }
      });
    }
    // ------------delete data from table---------
    function doDelete(val){
      var aDate=document.getElementById('sAttendance').value;
      $.ajax({
        type: "POST",
        url: "../../FacultyAction.php",
        data:{abscentDate:aDate,
              delSId:val},
        success: function(data){
          $("#aList").show();
          $("#dataList").html(data);
          doCheck(aDate);
        }
      });
    }
    // --------------save the update for report-------------
    function doSave(){
      var aDate=document.getElementById('sAttendance').value;
      $.ajax({
        type: "POST",
        url: "../../FacultyAction.php",
        data:{saveDate:aDate},
        success: function(data){
          if(data==1){
            $("#aGenerate").show();
            $("#aSave").hide();
          } else{
            $("#aGenerate").hide();
            $("#aSave").show();
          }
        }
      });
    }
    // --------------check date------------
    function doCheck(val){
      $.ajax({
        type: "POST",
        url: "../../FacultyAction.php",
        data:{checkDate:val},
        success: function(data){
          if(data==1){
            $("#aGenerate").show();
            $("#aSave").hide();
          } else{
            $("#aGenerate").hide();
            $("#aSave").show();
          }
        }
      });
    }
  </script>
  
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