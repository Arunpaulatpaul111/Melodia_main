<?php
    include("./dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<!------ Include the above in your HEAD tag ---------->
<body>
    <div style="padding-top: 70px;"></div>
    <div class="container">
	    <div class="row">
		    <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Forgot Password?</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">
    
                                <form id="register-form" role="form" autocomplete="off" class="form" method="post">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="resetpass" id="resetpass" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                    </div>
                                    <input type="hidden" class="hide" name="token" id="token" value=""> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	    </div>
    </div>
</body>
</html>
<?php
    if(isset($_POST['resetpass'])){
        $email=$_POST['email'];
        $pass=rand();
        $dbpass=MD5($pass);
        $sql1="select Email from tbl_login where dStatus=0 and Email='".$email."'";
        $res1=mysqli_query($con,$sql1)or die(mysqli_error($con));
        if(mysqli_num_rows($res1)==1){
            $sql2="update tbl_login set password='".$dbpass."',forgotStatus=1 where Email='".$email."'";
            $res2=mysqli_query($con,$sql2)or die(mysqli_error($con));
            if($res2){
                $from = "Melodia";
                $subject = "new password";
                $message = "Password: ".$pass;
                $headers = "From:" . $from;
                mail($email,$subject,$message, $headers);
                echo"<script>window.location.href='Login/login.php'</script>";
            }
        }
    }
?>