<?php
	session_start();
	include("../../../dbconnect.php");
    if(isset($_SESSION['login_id'])){
        $sql1="select * from tbl_faculty where login_id=".$_SESSION['login_id'];
        $res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
        if($res1){
            while($row1=mysqli_fetch_array($res1)){
                $_SESSION['facId']=$row1['fac_id'];
                $_SESSION['facName']=$row1['facName'];
            }
        }
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
                MELODIA
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
                        <li class="nav-item">
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
                        <li class="nav-item">
                            <a class="nav-link" href="./ApproveSleave.php">
                            <i class="material-icons">check_circle</i>
                            <p>Approve Leaves</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./StudentAttendance.php">
                            <i class="material-icons">check_circle</i>
                            <p>Student Attendance</p>
                            </a>
                        </li>
                        <li class="nav-item active">
                                <a class="nav-link">
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
                            <!-- <div class="col-md-8"> -->
                                <div class="card">
                                    <?php
                                        $sql2="SELECT * FROM tbl_instruments JOIN tbl_facincharge ON tbl_instruments.instru_id=tbl_facincharge.instru_id WHERE tbl_facincharge.fac_id=".$_SESSION['facId'];
                                        $res2=mysqli_query($con,$sql2)or die(mysqli_error($con));
                                        while($row2=mysqli_fetch_array($res2)){
                                            $instruId=$row2['instru_id'];
                                        }
                                        $sql3="SELECT * FROM tbl_portionstatus WHERE instru_id=".$instruId;
                                        $res3=mysqli_query($con,$sql3)or die(mysqli_error($con));
                                        if(mysqli_num_rows($res3)){
                                            while($row3=mysqli_fetch_array($res3)){
                                                $uDate=$row3['psDate'];
                                            }
                                        } else{
                                            $uDate="----";
                                        }
                                    ?>
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title">Course status update</h4>
                                        <p class="card-category">Details of covered portions....</p>
                                        <label style="color:white" name="lDate" id="lDate"><?php echo "Completed Till ".$uDate; ?></label>
                                        <input type="text" id="instruId" name="instruId" value="<?php echo $instruId; ?>" style="display:none;"/>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="../../FacultyAction.php">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Date</label>
                                                        <input id="uDate" name="uDate" class="form-control" type="date" onchange="Validatedate()" required/>
                                                        <label style="display:nne; color:red" id="date_error"></label>
                                                        <script>
                                                            function Validatedate() {
                                                                var instruId=document.getElementById('instruId').value;
                                                                var a=new Date();
                                                                var b=document.getElementById('uDate').value;
                                                                var c=new Date(b);
                                                                if(a>c){
                                                                    // -------------check entered date-------------
                                                                    $.ajax({
                                                                        type: "POST",
                                                                        url: "../../FacultyAction.php",
                                                                        data:{uDate:b,
                                                                            instruId:instruId},
                                                                        success: function(data){
                                                                            if(data==1){
                                                                                $("#date_error").html("Alredy Entered....!").fadeIn().delay(4000).fadeOut();
                                                                                $("#uDetails").val("");
                                                                            } else{
                                                                                return true;
                                                                            }
                                                                        }
                                                                    });
                                                                } else{
                                                                    $("#date_error").html('Must not select coming date ..!').fadeIn().delay(4000).fadeOut();
                                                                    $("#uDate").val("");
                                                                }
                                                            }
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="bmd-label-floating">Course status</label>
                                                    <input type="text" class="form-control" id="uDetails" name="uDetails" onchange="Validatereason()" required/>
                                                    <label style="display:nne; color:red" id="detail_error"></label>
                                                    <script>
                                                        function Validatereason() {
                                                            var val = document.getElementById('uDetails').value;
                                                            if (!val.match(/^[A-Za-z][A-Za-z" "0-9]{3,}$/)) {
                                                                $("#detail_error").html('Enter valid reason..!').fadeIn().delay(4000).fadeOut();
                                                                document.getElementById('uDetails').value = "";
                                                                return false;
                                                            }
                                                            return true;
                                                        }
                                                    </script>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary pull-right" name="fLeave" id="fLeave" onClick="doUpdate()">Update</button>
                                        </form>
                                        <script>
                                            function doUpdate() {
                                                uDate=document.getElementById('uDate').value;
                                                uStatus=document.getElementById('uDetails').value;
                                                instruId=document.getElementById('instruId').value;
                                                $.ajax({
                                                    type: "POST",
                                                    url: "../../FacultyAction.php",
                                                    data:{uDate:uDate,
                                                          uDetails:uStatus,
                                                          instruId:instruId},
                                                    success: function(data){
                                                        if(data=="1"){
                                                            $("#date_error").html("Alredy Entered....!").fadeIn().delay(4000).fadeOut();
                                                            $("#uDetails").val("");
                                                        }else{
                                                            $("#lDate").html("Completed Till "+data);
                                                            $("#uDetails").val("");
                                                            $("#uDate").val("");
                                                        }
                                                    }
                                                });
                                            }
                                        </script>
                                    </div>
                                </div>
                            <!-- </div> -->
                            <!-- <div class="col-md-4">
                                <div class="card card-profile">
                                    <div class="card-avatar">
                                        <a href="#pablo">
                                            <img class="img" src="../assets/img/faces/marc.jpg" />
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                                        <h4 class="card-title">Alec Thompson</h4>
                                        <p class="card-description">
                                            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                        </p>
                                        <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
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
