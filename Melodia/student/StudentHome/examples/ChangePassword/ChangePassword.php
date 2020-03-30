<?php
    session_start();
    if(isset($_SESSION['login_id'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Melodia</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="../../../StudentAction.php" method="post">
					<span class="login100-form-title p-b-26">
						Change your password...!
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="cpass" id="cpass">
						<span class="focus-input100" data-placeholder="Current password"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="newpass" id="newpass" onchange="Validatepass()" required/>
						<span class="focus-input100" data-placeholder="Password"></span>
						<label style="display:nne; color:red" id="pass_error"></label>
						<script>
							function Validatepass() {
								var val = document.getElementById('newpass').value;
								if (!val.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/)) {
									$("#pass_error").html('one number,one uppercase,lowercase letter, 8 characters').fadeIn().delay(4000).fadeOut();
									document.getElementById('newpass').value = "";
									return false;
								}
								return true;
							}
						</script>
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="confirmpass" id="confirmpass" onchange="Validatecpass()" required/>
						<span class="focus-input100" data-placeholder="Password"></span>
						<label style="display:nne; color:red" id="cpass_error"></label>
						<script>
							function Validatecpass() {
								var pass = document.getElementById('newpass').value;
								var repass = document.getElementById('confirmpass').value;
								if (pass!=repass) {
									$("#cpass_error").html('Password Miss match....!').fadeIn().delay(4000).fadeOut();
									document.getElementById('confirmpass').value = "";
									return false;
								}
								return true;
							}
                        </script>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="changePass" id="changePass">
								Change Password
							</button>
						</div>
                    </div>
                    <div>
                        <?php
                            if(isset($_GET['error'])){$error=$_GET['error'];
                                echo "<center><font color='red'>"
                                    .$error
                                    ."</font></center>";
                            }
                        ?>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Don’t want to change?
						</span>

						<a class="txt2" onClick="history.go(-1);">
							Cancel
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
<?php
    } else{
        echo"<script>window.location.href='../../../../index.php';</script>";
	}
?>