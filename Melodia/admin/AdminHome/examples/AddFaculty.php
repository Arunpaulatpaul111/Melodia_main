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
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a  class="simple-text logo-normal">
                MELODIA
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item  ">
                        <a class="nav-link" href="./AdminHome.php">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item active ">
                        <a class="nav-link" disabled="disabled">
                            <i class="material-icons">person_add</i>
                            <p>Add Staff</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./AddInstruments.php">
                        <i class="material-icons">add_circle</i>
                        <p>Add Instruments</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./AssignFaculty.php">
                        <i class="material-icons">add_circle</i>
                        <p>Assign Faculty</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./StaffList.php">
                        <i class="material-icons">group</i>
                        <p>Staff List</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./InstrumentsList.php">
                        <i class="material-icons">music_note</i>
                        <p>Instrument List</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./ApproveLeave.php">
                        <i class="material-icons">check_circle</i>
                        <p>Approve Leave</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./ApproveRegistration.php">
                        <i class="material-icons">how_to_reg</i>
                        <p>Approve Registration</p>
                        </a>
                    </li>
                    <li class="nav-item ">
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
                    <a class="navbar-brand" href="#pablo">Adding staff........</a>
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
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- <div class="col-md-8"> -->
                            <div class="card">
                                <div class="card-header card-header-primary">
                                <h4 class="card-title">Enter details</h4>
                                <p class="card-category">Add the faculty....</p>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="../../AdminAction.php">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Name</label>
                                                    <input type="text" name="fName" id="fName" class="form-control" onchange="Validatename()" required/>
                                                    <label style="display:nne; color:red" id="name_error"></label>
                                                    <script>
                                                        function Validatename() {
                                                            var val = document.getElementById('fName').value;
                                                            if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) {
                                                                $("#name_error").html('Invalid Name..!').fadeIn().delay(4000).fadeOut();
                                                                document.getElementById('fName').value = "";
                                                                return false;
                                                            }
                                                            return true;
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Email</label>
                                                    <input type="text" name="fEmail" id="fEmail" class="form-control" onchange="Validateemail1()" required/>
                                                    <label style="display:nne; color:red" id="email_error"></label>
                                                    <script>
                                                        function Validateemail1() {
                                                            var faculty_email = document.getElementById('fEmail');
                                                            var regMail=faculty_email.value;
                                                            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                                                            if (!filter.test(faculty_email.value)) {
                                                                faculty_email.value="";
                                                                $("#email_error").html('Please provide a valid email address').fadeIn().delay(4000).fadeOut();
                                                                return false;
                                                            }
                                                            $.ajax({
                                                                type: "POST",
                                                                url: "../../AdminAction.php",
                                                                data:'validateMail='+regMail,
                                                                success: function(data){
                                                                    if(data==1){
                                                                        $("#email_error").html('Email already exists......!').fadeIn().delay(1000).fadeOut();
                                                                        faculty_email.value="";
                                                                    }
                                                                }
                                                            });
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Contact</label>
                                                    <input type="text" name="fContact" id="fContact" class="form-control" onchange="Validatep()" required/>
                                                    <label style="display:nne; color:red" id="contact_error"></label>
                                                    <script>
                                                        function Validatep() {
                                                            var val = document.getElementById('fContact').value;
                                                            if (!val.match(/^(?!(\d)\1{9})(?!0123456789|1234567890|0987654321|0000000000|1111111111|22222222222|3333333333|4444444444|5555555555|6666666666|7777777777|8888888888|9999999999|1000000000|2000000000|3000000000|40000000000|5000000000|6000000000|7000000000|8000000000|9000000000)\d{10}$/)) {
                                                                $("#contact_error").html('Invalid Phone number..!').fadeIn().delay(4000).fadeOut();
                                                                document.getElementById('fContact').value = "";
                                                                return false;
                                                            }
                                                            return true;
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Date of birth</label>
                                                    <input type="date" name="fDob" id="fDob" class="form-control" onchange="Validatedate()" required/>
                                                    <label style="display:nne; color:red" id="date_error"></label>
                                                    <script>
                                                        function Validatedate() {
                                                            var a=new Date();
                                                            var b=document.getElementById('fDob').value;
                                                            var c=new Date(b);
                                                            if((a.getFullYear() - c.getFullYear() >20)){
                                                                return true;
                                                            } else{
                                                                $("#date_error").html('Must be 20 year or above..!').fadeIn().delay(4000).fadeOut();
                                                                document.getElementById('fDob').value="";
                                                            }
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Gender</label>
                                                    <select name="fGender" id="fGender" class="form-control" onblur="ValidateGender()" required>
                                                        <option value="" required >Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                    <label style="display:nne; color:red" id="gender_error"></label>
                                                    <script>
                                                        function ValidateGender() {
                                                            var b=document.getElementById('fGender').value;
                                                            if(b==""){
                                                                $("#gender_error").html('select an option..!').fadeIn().delay(4000).fadeOut();
                                                            } else{
                                                                return true;
                                                            }
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Qualification</label>
                                                    <input type="text" name="fQualification" id="fQualification" class="form-control" onchange="Validatequali()" required/>
                                                    <label style="display:nne; color:red" id="quali_error"></label>
                                                    <script>
                                                        function Validatequali() {
                                                            var val = document.getElementById('fQualification').value;
                                                            if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) {
                                                                $("#quali_error").html('Invalid Qualification..!').fadeIn().delay(4000).fadeOut();
                                                                document.getElementById('fQualification').value = "";
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
                                                    <label class="bmd-label-floating">Address</label>
                                                    <input type="text" name="fAddress" id="fAddress" class="form-control" onchange="Validateaddress()" required/>
                                                    <label style="display:nne; color:red" id="adr_error"></label>
                                                    <script>
                                                        function Validateaddress() {
                                                            var val = document.getElementById('fAddress').value;
                                                            if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) {
                                                                $("#adr_error").html('Invalid Address..!').fadeIn().delay(4000).fadeOut();
                                                                document.getElementById('fAddress').value = "";
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
                                                    <input type="text" name="fDistrict" id="fDistrict" class="form-control" onchange="Validatedst()" required/>
                                                    <label style="display:nne; color:red" id="dst_error"></label>
                                                    <script>
                                                        function Validatedst() {
                                                            var val = document.getElementById('fDistrict').value;
                                                            if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) {
                                                                $("#dst_error").html('Invalid District..!').fadeIn().delay(4000).fadeOut();
                                                                document.getElementById('fDistrict').value = "";
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
                                                    <input type="text" name="fCity" id="fCity" class="form-control" onchange="Validatecity()" required/>
                                                    <label style="display:nne; color:red" id="city_error"></label>
                                                    <script>
                                                        function Validatecity() {
                                                        var val = document.getElementById('fCity').value;
                                                        if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) {
                                                            $("#city_error").html('Invalid name of city..!').fadeIn().delay(4000).fadeOut();
                                                            document.getElementById('fCity').value = "";
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
                                                    <input type="text" name="fPin" id="fPin" class="form-control" onchange="Validatepin()" required/>
                                                    <label style="display:nne; color:red" id="pin_error"></label>
                                                    <script>
                                                        function Validatepin() {
                                                        var val = document.getElementById('fPin').value;
                                                        if (!val.match(/^(?!(\d)\1{9})(?!0123456789|1234567890|0987654321|0000000000|1111111111|22222222222|3333333333|4444444444|5555555555|6666666666|7777777777|8888888888|9999999999|1000000000|2000000000|3000000000|40000000000|5000000000|6000000000|7000000000|8000000000|9000000000)\d{6}$/)) {
                                                            $("#pin_error").html('Invalid Pin number..!').fadeIn().delay(4000).fadeOut();
                                                            document.getElementById('fPin').value = "";
                                                            return false;
                                                        }
                                                        return true;
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="addFaculty" id="addFaculty" class="btn btn-primary pull-right">Add</button>
                                    </form>
                                </div>
                            </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
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