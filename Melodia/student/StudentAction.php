<?php
    session_start();
    if(isset($_SESSION['login_id'])){
        include("../dbconnect.php");
        //----------- Student profile------------
        if(isset($_POST['sProfile'])){
            $loginId=$_SESSION['login_id'];
            $sName=$_POST['sName'];
            $sContact=$_POST['sContact'];
            $sDob=$_POST['sDob'];
            $sGender=$_POST['sGender'];
            $sFather=$_POST['sFather'];
            $sMother=$_POST['sMother'];
            $sAddress=$_POST['sAddress'];
            $pContact=$_POST['pContact'];
            $sDistrict=$_POST['sDistrict'];
            $sCity=$_POST['sCity'];
            $sPin=$_POST['sPin'];
            $sql="insert into tbl_studentdetails (login_id,sName,sContact,sDob,sGender,sFather,sMother,sAddress,sDistrict,sCity,sPin,contact) values($loginId,'$sName',$sContact,'$sDob','$sGender','$sFather','$sMother','$sAddress','$sDistrict','$sCity',$sPin,$pContact)"; 
            $res1= mysqli_query($con,$sql) or die(mysqli_error($con));
            if ($res1){
                echo"<script>window.location.href='StudentHome/examples/StudentHome.php'</script>";
            } else{
                echo"<script>window.location.href='StudentHome/examples/StudentDetails.php?error=Register failed..!";
            }
        }
        //------------ student leave-------------
        if(isset($_POST['sLeave'])){
            $s_id=$_SESSION['sId'];
            $lCourse=$_POST['lCourse'];
            $ldate=$_POST['ldate'];
            $lreason=$_POST['lreason'];
            $sql2="insert into tbl_studentleave (s_id,instru_id,sl_date,sl_reason) values($s_id,$lCourse,'$ldate','$lreason')";
            $res2=mysqli_query($con,$sql2) or die(mysqli_error($con));
            if($res2){
                echo"<script>window.location.href='StudentHome/examples/ViewLeaveStatus.php';</script>";
            } else{
                echo"<script>window.location.href='StudentHome/examples/ApplyLeave.php?error=Failed...!';</script>";
            }
        }
        // ----------------------Register course-----------
        if(isset($_POST['regCourse'])){
            $sId=$_SESSION['sId'];
            $instruName=$_POST['instruName'];
            $batchName=$_POST['batchName'];
            $cDate=Date("Y-m-d");
            $sql1="insert into tbl_regcourse (s_id,instru_id,batch_id,regDate) values($sId,$instruName,$batchName,'$cDate')";
            $res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
            if($res1){
                echo"<script>window.location.href='StudentHome/examples/RegisteredCourses.php';</script>";
            } else{
                echo"<script>window.location.href='StudentHome/examples/ApplyCourse.php?error=Failed...!';</script>";
            }
        }
        // ---------change password----------
        if(isset($_POST['changePass'])){
            $loginId=$_SESSION['login_id'];
            $cpass=md5($_POST['cpass']);
            $newpass=md5($_POST['newpass']);
            $confirmpass=md5($_POST['confirmpass']);
            $sql1="select * from tbl_login where dStatus=0 and login_id=".$loginId;
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
                            echo"<script>window.location.href='StudentHome/examples/StudentHome.php'</script>";
                        }
                    }else{
                     echo"<script>window.location.href='StudentHome/examples/ChangePassword/ChangePassword.php?error=Password missmatch...!'</script>";
                    }
                } else{
                 echo"<script>window.location.href='StudentHome/examples/ChangePassword/ChangePassword.php?error=Current Password not exists...!'</script>";
                }
            }
        }
        // --------------cancel leave-------------
        // if(isset($_POST['cancelleave'])){
        //     $slId=$_POST['cancelleave'];
        //     $sql1="update tbl_studentleave set sl_status=2 where sl_id=".$slId;
        //     $res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
        //     if($res1){
        //         echo"<script>window.location.href='ViewLeaveStatus/ViewLeaveStatus.php'</script>";
        //     }
        // }
        if(isset($_POST['cancelAction'])){ 
            $slId=$_POST['cancelAction'];
            $sql1="update tbl_studentleave set sl_status=2 where sl_id=".$slId;
            $res1=mysqli_query($con,$sql1)or die(mysqli_error($con));
            if($res1){
                echo"Canceled";
            }else{
                die;
            } 
        }
        // --------cancel registration--------
        if(isset($_POST['cancelreg'])){
            $regId=$_POST['cancelreg'];
            $sql1="update tbl_regcourse set regStatus=2 where reg_id=".$regId;
            $res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
            if($res1){
                echo"<script>window.location.href='RegStatus/RegStatus.php'</script>";
            }
        }
        // ------------profile update------------
        if(isset($_POST['sEditProfile'])){
            $sId=$_SESSION['sId'];
            $sContact=$_POST['sContact'];
            $pContact=$_POST['pContact'];
            $sAddress=$_POST['sAddress'];
            $sql1="update tbl_studentdetails set sContact=$sContact, sAddress='$sAddress', contact=$pContact where s_id=".$sId;
            $res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
            if($res1){
                echo"<script>window.location.href='StudentHome/examples/StudentProfile.php'</script>";
            }
        }
        // -------------payment otp generation--------------
        if (isset($_POST['paymentAction'])) {
            $Id=$_POST['paymentAction'];
            $sPId=$_POST['dPId'];
            $sFee=$_POST['dFee'];
            $cardNumber=$_POST['dCardNumber'];
            $expDate=$_POST['dExpDate'];
            $cvv=$_POST['dCvv'];
            $cardHolder=$_POST['dCardHolder'];
            $sql1="select * from tbl_account where dStatus=0 and cardNumber=".$cardNumber;
            $res1=mysqli_query($con,$sql1)or die(mysqli_error($con));
            if(mysqli_num_rows($res1)>0){ 
                while($row1=mysqli_fetch_array($res1)){
                    if($expDate==$row1['expiry']){
                        if($cvv==$row1['cvv']){
                            $otp=rand(100000,999999);
                            $sql2="update tbl_account set otp=".$otp." where cardNumber=".$cardNumber;
                            $res2=mysqli_query($con,$sql2)or die(mysqli_error($con));
                            if($res2){
                                $sql3="select Email from tbl_login where dStatus=0 and login_id=".$_SESSION['login_id'];
                                $res3=mysqli_query($con,$sql3)or die(mysqli_error($con));
                                while($row3=mysqli_fetch_array($res3)){
                                    $email=$row3['Email'];
                                }
                                $from = "getarunpaulprojects@gmail.com";
                                $subject = "new OTP";
                                $message = "OTP: ".$otp;
                                $headers = "From:" . $from;
                                mail($email,$subject,$message, $headers);
                                echo 1;
                            }
                        } else{
                            echo"Invalid CVV";
                        }
                    } else{
                        echo"Expiry date is invalid";
                    }
                }
            }else{
                echo"Invalid card number";
            }
        }
        // ---------payment update-----------
        if(isset($_POST['feePayment'])){
            $pId=$_POST['dPId'];
            $sFees=$_POST['dFee'];
            $cardNumber=$_POST['dCardNumber'];
            $otp=$_POST['dOtp'];
            $sql2="select * from tbl_account where dStatus=0 and cardNumber=".$cardNumber;
            $res2=mysqli_query($con,$sql2)or die(mysqli_error($con));
            while($row2=mysqli_fetch_array($res2)){
                if($row2['otp']==$otp){
                    $balance=$row2['balance']-$sFees;
                    $acId=$row2['ac_id'];
                    $cdate=Date("Y-m-d");
                    $sql1="select * from tbl_studentdetails where dStatus=0 and login_id=".$_SESSION['login_id'];
                    $res1=mysqli_query($con,$sql1)or die(mysqli_error($con));
                    while($row1=mysqli_fetch_array($res1)){
                        $sId=$row1['s_id'];
                    }
                    $sql3="insert into tbl_transactions (s_id,ac_id,tDebit,tDate) values($sId,$acId,$sFees,'$cdate')";
                    $res3=mysqli_query($con,$sql3)or die(mysqli_error($con));
                    if($res3){
                        $sql4="update tbl_payment set pStatus=1,pDate='".$cdate."' where p_id=".$pId;
                        $res4=mysqli_query($con,$sql4)or die(mysqli_error($con));
                        if($res4){
                            $sql5="update tbl_account set balance=".$balance.",otp=0 where ac_id=".$acId;
                            if(mysqli_query($con,$sql5)or die(mysqli_error($con))){
                                $sql5="select * from tbl_account where cardNumber=8888777766665555";
                                $res5=mysqli_query($con,$sql5)or die(mysqli_error($con));
                                while($row5=mysqli_fetch_array($res5)){
                                    $adminBalance=$row5['balance']+$sFees;
                                    $adminAc=$row5['ac_id'];
                                }
                                $sql6="update tbl_account set balance=".$adminBalance.",otp=0 where ac_id=".$adminAc;
                                if(mysqli_query($con,$sql6)or die(mysqli_error($con))){
                                    // echo"<script>window.location.href='./StudentHome/examples/Payment/success.php'</script>";
                                    echo 1;
                                }
                            }
                        }
                    }
                } else{
                    // echo"<script>window.location.href='./StudentHome/examples/Payment/Payment.php?error=Invalid OTP'</script>";
                    echo"Inavlid OTP";
                }
            }
        }
        // ------------pro pic upload--------
        if(isset($_FILES['proImage'])){
            if(is_array($_FILES)) {
                if(is_uploaded_file($_FILES['proImage']['tmp_name'])) {
                    $sourcePath = $_FILES['proImage']['tmp_name'];
                    $imageName=$_FILES['proImage']['name'];
                    $sql1="insert into tbl_profile (login_id,proImage) values(".$_SESSION['login_id'].",'$imageName')";
                    mysqli_query($con,$sql1)or die(mysqli_error($con));
                    $targetPath = "proPics/".$_FILES['proImage']['name'];
                    if(move_uploaded_file($sourcePath,$targetPath)) {
                        echo "<img class='img' src='../../".$targetPath."'/>";
                    }
                }
            }
        }
    }
?>