<?php
    session_start();
    include "../../../dbconnect.php";
    if(isset($_SESSION['login_id'])){
        $sql="select * from tbl_studentdetails where dStatus=0 and login_id=".$_SESSION['login_id'];
        $res=mysqli_query($con,$sql)or die(mysqli_error($con));
        $rowc=mysqli_num_rows($res);
        if($rowc==0){
            echo"<script>window.location.href='./StudentDetails.php'</script>";
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
                <li class="nav-item active">
                    <a class="nav-link">
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
                            <a class="dropdown-item" href="./StudentProfile.php">Profile</a>
                            <a class="dropdown-item" href="./ChangePassword">Change Password</a>
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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Leave Status</h4>
                                    <p class="card-category"> You can cancel applied leave before approval.....</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class=" text-primary">
                                                <th>No.</th>
                                                <th>Date</th>
                                                <th>Reason</th>
                                                <th>Leave Status</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $no=0;
                                                    $sql1="select * from tbl_studentleave where dStatus=0 and s_id=".$_SESSION['sId'];
                                                    $res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
                                                    $rowC1=mysqli_num_rows($res1);
                                                    if($rowC1 !=0){
                                                        while($row1=mysqli_fetch_array($res1)){
                                                            $sql2="select * from tbl_instruments where dStatus=0 and instru_id=".$row1['instru_id'];
                                                            $res2=mysqli_query($con,$sql2) or die(mysqli_error($con));
                                                            $rowC2=mysqli_num_rows($res2);
                                                            if($rowC2 !=0){
                                                                while($row2=mysqli_fetch_array($res2)){
                                                                    $no++;
                                                                    if($row1['sl_status']==0){
                                                                        $status="Applied";
                                                                    }
                                                                    else if($row1['sl_status']==1){
                                                                        $status="Approved";
                                                                    } else{
                                                                        $status="Canceled";
                                                                    }
                                                                    echo"<tr>"
                                                                        ."<td>".$no."</td>"
                                                                        ."<td>".$row1['sl_date']."</td>"
                                                                        ."<td>".$row1['sl_reason']."</td>"
                                                                        ."<td id='status$no' name='status$no'>".$status."</td>";
                                                                    if($row1['sl_status']==0){
                                                                        echo"<td id='action$no' name='action$no'><button name='$no' id='$no' value=".$row1['sl_id']." onclick='doCancel(this.value,this.id);' style='border:none;background-color:white;' class='material-icons'>cancel</button></td>";
                                                                        echo"<td name='show$no' id='show$no' style='display:none'></td>";
                                                                    }else{
                                                                        echo"<td></td>";
                                                                    }
                                                                    echo"</tr>";
                                                                }
                                                            }
                                                        }
                                                    } else{
                                                        echo"<tr><td colspan='5' style'color:red'><center>No data found</center></td></tr>";
                                                        // echo"<script>window.alert('No data Found....!');</script>";
                                                    }
                                                ?>
                                                <script>
                                                    function doCancel(val,id) {
                                                        $.ajax({
                                                        type: "POST",
                                                        url: "../../StudentAction.php",
                                                        data:'cancelAction='+val,
                                                        success: function(data){
                                                            $("#status"+id).html(data);
                                                            $("#action"+id).hide();
                                                            $("#show"+id).show();
                                                        }
                                                        });
                                                    }
                                                </script>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
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
