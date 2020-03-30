<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Melodia</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form action="dbregister.php" method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="email" id="email" placeholder="Your Email" onchange="Validateemail()" required/>
                            <label style="display:nne; color:red" id="email_error"></label>
                            <script>
                                function Validateemail() {
                                    var regMailobj = document.getElementById('email');
                                    var regMail=regMailobj.value;
                                    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                                    if (!filter.test(regMailobj.value)) {
                                        regMailobj.value="";
                                        $("#email_error").html('Please provide a valid email address').fadeIn().delay(4000).fadeOut();
                                        return false;
                                    }
                                    $.ajax({
                                        type: "POST",
                                        url: "./dbregister.php",
                                        data:'validateMail='+regMail,
                                        success: function(data){
                                            if(data==1){
                                                $("#email_error").html('Email already exists......!').fadeIn().delay(1000).fadeOut();
                                                regMailobj.value="";
                                            }
                                        }
                                    });
                                }
                            </script>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="reg_password" id="reg_password" placeholder="Password" onchange="Validatepass()" required/>
                            <label style="display:nne; color:red" id="pass_error"></label>
                            <script>
                                function Validatepass() {
                                    var val = document.getElementById('reg_password').value;
                                    if (!val.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/)) {
                                        $("#pass_error").html('one number,one uppercase,lowercase letter, 8 characters').fadeIn().delay(4000).fadeOut();
                                        document.getElementById('reg_password').value = "";
                                        return false;
                                    }
                                    return true;
                                }
                            </script>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password" onchange="Validatecpass()" required/>
                            <label style="display:nne; color:red" id="cpass_error"></label>
                            <script>
                                function Validatecpass() {
                                    var pass = document.getElementById('reg_password').value;
                                    var repass = document.getElementById('re_password').value;
                                    if (pass!=repass) {
                                        $("#cpass_error").html('Password Miss match....!').fadeIn().delay(4000).fadeOut();
                                        document.getElementById('re_password').value = "";
                                        return false;
                                    }
                                    return true;
                                }
                            </script>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required/>
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="register" id="register" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="../login/login.php" class="loginhere-link">Login here</a>
                    </p>
                    <div>
                        <?php
                            if(isset($_GET['error'])){$error=$_GET['error'];
                                echo "<center><p id='errortext'><font color='red'>"
                                    .$error
                                    ."</font></p></center>";
                            }
                        ?>
                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
                        <script type="text/javascript">
                            $(function(){
                                $("#errortext").fadeOut(5000);  
                            });
                        </script>
                        
					</div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>