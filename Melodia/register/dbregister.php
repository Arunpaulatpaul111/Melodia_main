<?php
    session_start();
    include("../dbconnect.php");
    if (isset($_POST['register'])){
        $email=$_POST['email'];
        $reg_password=md5($_POST['reg_password']);
            // ----------insertion--------
        $sql2="insert into tbl_login (Email,password) values('$email','$reg_password')"; 
        $res2= mysqli_query($con,$sql2) or die(mysqli_error($con));
        if ($res2){
            $sql3="select login_id from tbl_login where Email='$email'";
            $res3=mysqli_query($con,$sql3) or die(mysqli_error($con));
            if($res3){
                while($row3=mysqli_fetch_array($res3)){
                    $loginId=$row3['login_id'];
                }
                $_SESSION['login_id']=$loginId;
                echo"<script>window.location.href='../conditions/conditions.php'</script>";
            }
        } else{
            echo"<script>window.location.href='register.php?error=Register Failed...!'</script>";
        }
    }
    // -------------email validation----------
    if(isset($_POST['validateMail'])){
        $email=$_POST['validateMail'];
        $sql1="select Email from tbl_login where Email='".$email."'";
        $res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
        $rowCount=mysqli_num_rows($res1);
        if($rowCount==1){
            while($row1=mysqli_fetch_array($res1)){
                if($email==$row1['Email']){
                    echo"1";
                }
            }
        }
    }  
?>

