<?php
    session_start();
    if(isset($_SESSION['login_id'])){ 
        include("../dbconnect.php");
//----------ADD FACULTY----------
        if(isset($_POST['addFaculty'])){
            $fName=$_POST['fName'];
            $fEmail=$_POST['fEmail'];
            $fContact=$_POST['fContact'];
            $fDob=$_POST['fDob'];
            $fGender=$_POST['fGender'];
            $fQualification=$_POST['fQualification'];
            $fAddress=$_POST['fAddress'];
            $fDistrict=$_POST['fDistrict'];
            $fCity=$_POST['fCity'];
            $fPin=$_POST['fPin'];
            $pass=rand();
            $password=md5($pass);
            $sql1="insert into tbl_login (Email,password,utype_id) values('$fEmail','$password',2)"; 
            $result= mysqli_query($con,$sql1) or die(mysqli_error($con));
            if ($result){
                // ------------------sending user credentials----------
                $from = "getarunpaulprojects@gmail.com";
                $subject = "User credentials";
                $message = "Use the login credentials to login=> Username: "
                            .$fEmail."|| Password: ".$pass;
                $headers = "From:" . $from;
                mail($fEmail,$subject,$message, $headers);
                // ------------------------------
                $sql2="select login_id from tbl_login where Email='$fEmail'";
                $res1= mysqli_query($con,$sql2) or die(mysqli_error($con));
                if ($res1){
                    while($row=mysqli_fetch_array($res1)){
                        $id=$row['login_id'];
                    }
                    $sql3="insert into tbl_faculty (login_id,facName,facContact,facDob,facGender,facQualification,facAddress,facDistrict,facCity,facPin) values($id,'$fName',$fContact,'$fDob','$fGender','$fQualification','$fAddress','$fDistrict','$fCity',$fPin)"; 
                    $res2=mysqli_query($con,$sql3) or die(mysqli_error($con));
                    if ($res2){
                        echo"<script>window.location.href='AdminHome/examples/AdminHome.php'</script>";
                        // echo"<script>window.alert('Registered Successfully')</script>";
                    }
                }
            } else{
                echo"<script>window.location.href='AdminHome/examples/AddFaculty.php?error=failed..!'</script>";
                // echo"<script>window.alert('Registered failed')</script>";
            }
        }
        // ---------------Validating email in db-----------
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
//---------Add course----------
        if(isset($_POST['addInstruments'])){
            $iName=$_POST['iName'];
            $iFee=$_POST['iFee'];
            $sql1="insert into tbl_instruments (instruName,instruFee) values('$iName',$iFee)";
            $res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
            if($res1){
                echo"<script>window.location.href='AdminHome/examples/InstrumentsList.php'</script>";
                // echo"<script>window.alert('Added Successfully')</script>";
            }
        }
//---------Assigning----------
        if(isset($_POST['assignInstruments'])){
            $instruId=$_POST['instruName'];
            $facId=$_POST['facName'];
            $sql1="insert into tbl_facincharge (instru_id,fac_id) values($instruId,$facId)";
            $res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
            if($res1){
                echo"<script>window.location.href='AdminHome/examples/InstrumentsList.php'</script>";
                // echo"<script>window.alert('Added Successfully')</script>";
            }
        }
//--------------faculty leave approve-----------
        if (! empty($_POST['approveAction'])) {
            $flId=$_POST['approveAction'];
            $sql1="update tbl_facleave set flstatus=1 where fl_id=".$flId;
            $res1=mysqli_query($con,$sql1)or die(mysqli_error($con));
            if($res1){
                echo"Approved";
            }else{
                die;
            }
            
        }
        // ---------------faculty leave cancel----------
        if (! empty($_POST['cancelAction'])) {
            $flId=$_POST['cancelAction'];
            $sql1="update tbl_facleave set flstatus=2 where fl_id=".$flId;
            $res1=mysqli_query($con,$sql1)or die(mysqli_error($con));
            if($res1){
                echo"Canceled";
            }else{
                die;
            }
            
        }
       // -----------change password----------
        if(isset($_POST['changePass'])){
            $loginId=$_SESSION['login_id'];
            $cpass=md5($_POST['cpass']);
            $newpass=md5($_POST['newpass']);
            $confirmpass=md5($_POST['confirmpass']);
            $sql1="select * from tbl_login where login_id=".$loginId;
            $res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
            if($res1){
                while($row1=mysqli_fetch_array($res1)){
                    $password=$row1['password'];
                }
                if($password==$cpass){
                    if($newpass==$confirmpass){
                        $sql2="update tbl_login set password='".$newpass."',forgotStatus=0 where login_id=".$loginId;
                        $res2=mysqli_query($con,$sql2) or die(mysqli_error($con));
                        if($res2){
                            echo"<script>window.location.href='AdminHome/examples/AdminHome.php'</script>";
                        }
                    }else{
                        echo"<script>window.location.href='AdminHome/examples/ChangePassword.php?error=Password missmatch...!'</script>";
                    }
                } else{
                    echo"<script>window.location.href='AdminHome/examples/ChangePassword.php?error=Current Password not exists...!'</script>";
                }
            }
        }
    //    ------------Approve student registration-------------
        if (! empty($_POST['approveReg'])) {
            $regId=$_POST['approveReg'];
            $approveDate=Date("Y-m-d");
            $sql1="update tbl_regcourse set regStatus=1,regApprove='".$approveDate."' where reg_id=".$regId;
            $res1=mysqli_query($con,$sql1)or die(mysqli_error($con));
            if($res1){
                echo"Approved";
            }else{
                die;
            }
        }
// ---------------Cancel Registration------------
        if (! empty($_POST['cancelReg'])) {
            $regId=$_POST['cancelReg'];
            $sql1="update tbl_regcourse set regStatus=2 where reg_id=".$regId;
            $res1=mysqli_query($con,$sql1)or die(mysqli_error($con));
            if($res1){
                echo"Canceled";
            }else{
                die;
            }
        }
        // ---------------fee-------------
        if(isset($_POST['feeGen'])){
            $dateCheck=strtotime(Date("Y-m-d"));
            if(date("d",$dateCheck)<27){
                echo"<script>window.location.href='AdminHome/examples/PaymentStatus.php?id=date not covered'</script>";
            }
            $sql4="select gDate from tbl_payment";
            $res4=mysqli_query($con,$sql4)or die(mysqli_error($con));
            $rowc=mysqli_num_rows($res4);
            $c=0;
            while($row4=mysqli_fetch_array($res4)){
                $c++;
                $dbDate=$row4['gDate'];
                $time=strtotime($dbDate);
                $dbmonth=date("F",$time);
                $dbyear=date("Y",$time);
                $date=strtotime(Date("Y-m-d"));
                $month=date("F",$date);
                $year=date("Y",$date);
                if ($dbmonth==$month && $dbyear==$year){
                    $c--;
                    echo"<script>window.location.href='AdminHome/examples/PaymentStatus.php?id=already updated'</script>";
                }
            }
            if($c==$rowc){
                $sql1="select s_id,login_id from tbl_studentdetails";
                $res1=mysqli_query($con,$sql1)or die(mysqli_error($con));
                while($row1=mysqli_fetch_array($res1)){
                    $sql_mail="select Email from tbl_login where login_id=".$row1['login_id'];
                    $res_mail=mysqli_query($con,$sql_mail)or die(mysqli_error($con));
                    while($row_mail=mysqli_fetch_array($res_mail)){
                        $mail=$row_mail['Email'];
                    }
                    $sql2="select * from tbl_regcourse where s_id=".$row1['s_id'];
                    $res2=mysqli_query($con,$sql2)or die(mysqli_error($con));
                    $rowcount=mysqli_num_rows($res2);
                    if($rowcount>0){
                        $fee=0;
                        while($row2=mysqli_fetch_array($res2)){
                            $cDate=strtotime(Date("Y-m-d"));
                            $fMonth=date("m",$cDate);
                            $fYear=date("Y",$cDate);
                            $fDay=date("d",$cDate);
                            $regDate=strtotime($row2['regApprove']);
                            $regMonth=date("m",$regDate);
                            $regYear=date("Y",$regDate);
                            $regDay=date("d",$regDate);
                            if($fYear==$regYear && $fMonth==$regMonth){
                                if(($fDay-$regDay)>15){
                                    $fee=$fee+1000;
                                } else{
                                    $fee=$fee+500;
                                }
                            } else{
                                $fee=$fee+1000;
                            }
                        }
                        $cdate=Date("Y-m-d");
                        $sId=$row1['s_id'];
                        $sql3="insert into tbl_payment(s_id,feeAmount,gDate) values($sId,$fee,'$cdate')";
                        $res3=mysqli_query($con,$sql3)or die(mysqli_error($con));
                        if($res3){
                            $from = "MELODIA";
                            $subject = "Monthly fee";
                            $message = "Your monthly fee of ".$cdate." is ".$fee." Pay within 10 days";
                            $headers = "From:" . $from;
                            if(mail($mail,$subject,$message, $headers)){
                                echo"<script>window.location.href='AdminHome/examples/PaymentStatus.php '</script>";
                            }
                        } 
                    }
                }
            }
        }
    }
?>