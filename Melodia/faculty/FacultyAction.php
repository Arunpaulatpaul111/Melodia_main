<?php
    session_start();
    include("../dbconnect.php");
    if(isset($_SESSION['login_id'])){
        //---------------faculty leave-----------
        if(isset($_POST['fLeave'])){
            $lId=$_SESSION['login_id'];
            $flDate=$_POST['ldate'];
            $flReason=$_POST['lreason'];
            $sql1="select fac_id from tbl_faculty where login_id=$lId";
            $res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
             if($res1){
                while($row=mysqli_fetch_array($res1)){
                    $fId=$row['fac_id'];
                }
                $sql2="insert into tbl_facleave(fac_id,flDate,flReason) values($fId,'$flDate','$flReason')";
                $res2=mysqli_query($con,$sql2) or die(mysqli_error($con));
                if($res2){
                    echo"<script>window.location.href='FacultyHome/examples/LeaveStatus.php'</script>";
                } else {
                    echo"<script>window.location.href='FacultyHome/examples/ApplyLeave.php'</script>";
                }
            }
        }
        //-----------approval of student leave------------
        if (isset($_POST['approveAction'])) {
            $slId=$_POST['approveAction'];
            $sql1="update tbl_studentleave set sl_status=1 where sl_id=".$slId;
            $res1=mysqli_query($con,$sql1)or die(mysqli_error($con));
            if($res1){
                echo"Approved";
            }else{
                die;
            }
            
        }
        // -------------canceling of student leave------------
        if (isset($_POST['cancelAction'])) {
            $slId=$_POST['cancelAction'];
            $sql1="update tbl_studentleave set sl_status=2 where sl_id=".$slId;
            $res1=mysqli_query($con,$sql1)or die(mysqli_error($con));
            if($res1){
                echo"Canceled";
            }else{
                die;
            }
            
        }

        // -----------change password-----------
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
                            echo"<script>window.location.href='FacultyHome/examples/FacultyHome.php'</script>";
                        }
                    }else{
                     echo"<script>window.location.href='FacultyHome/examples/ChangePassword/ChangePassword.php?error=Password missmatch...!'</script>";
                    }
                } else{
                 echo"<script>window.location.href='FacultyHome/examples/ChangePassword/ChangePassword.php?error=Current Password not exists...!'</script>";
                }
            }
        }
        // --------------cancel leave-------------
        if(isset($_POST['cancelfAction'])){ 
            $slId=$_POST['cancelfAction'];
            $sql1="update tbl_facleave set flStatus=2 where fl_id=".$slId;
            $res1=mysqli_query($con,$sql1)or die(mysqli_error($con));
            if($res1){
                echo"Canceled";
            }else{
                die;
            } 
        }
        // ------------profile update------------
        if(isset($_POST['fEditProfile'])){
            $facId=$_SESSION['fId'];
            $facContact=$_POST['fContact'];
            $facAddress=$_POST['fAddress'];
            $fQualification=$_POST['fQualification'];
            $fAddress=$_POST['fAddress'];
            $fDistrict=$_POST['fDistrict'];
            $fCity=$_POST['fCity'];
            $fPin=$_POST['fPin'];
            $sql1="update tbl_faculty set facContact=$facContact,facQualification='$fQualification',facAddress='$facAddress',facDistrict='$fDistrict',facCity='$fCity',facPin=$fPin where fac_id=".$facId;
            $res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
            if($res1){
                 echo"<script>window.location.href='FacultyHome/examples/FacultyProfile.php'</script>";
            }
        }
        // ---------------punching----------
        if(isset($_POST['punch'])){
            $cdate=Date("Y-m-d");
            $sql2="select * from tbl_punching where fac_id=".$_SESSION['facId'];
            $res2=mysqli_query($con,$sql2)or die(mysqli_error($con));
            if($res2){
                $c=0;
                while($row2=mysqli_fetch_array($res2)){
                    if($cdate==$row2['punch_date']){
                        $c++;
                    }
                }
            }
            $facId=$_SESSION['facId'];
            $sql1="select * from tbl_instruments where fac_id=".$facId;
            $res1=mysqli_query($con,$sql1)or die(mysqli_error($con));
            if($res1){
                while($row1=mysqli_fetch_array($res1)){
                    $instruId=$row1['instru_id'];
                }
            }
            if($c==0){
                $sql3="insert into tbl_punching (punch_date,fac_id,instru_id) values('$cdate',$facId,$instruId)";
                $res3=mysqli_query($con,$sql3)or die(mysqli_error($con));
                if($res3){
                    echo"<script>window.location.href='FacultyHome/FacultyHome.php';</script>";
                }  
            } else{
                echo"<script>window.location.href='FacultyHome/FacultyHome.php?msg=hhhhh';</script>";
            }
            
        }
        // ----------------check abscent date of student--------- 
        if(isset($_POST['abscentDate'])){
            $aDate=$_POST['abscentDate'];
            $sDate=strtotime($aDate);
            $day=date("D",$sDate);
            $batchId=0;
            if($day==='Sun' || $day==='Sat'){
                $batchId=2;
            } else{
                $batchId=1;
            }
            $sql1="SELECT * FROM tbl_instruments JOIN tbl_facincharge ON tbl_instruments.instru_id=tbl_facincharge.instru_id WHERE tbl_facincharge.fac_id=".$_SESSION['facId'];
            $res1=mysqli_query($con,$sql1)or die(mysqli_error($con));
            if(mysqli_num_rows($res1)>0){
                while($row1=mysqli_fetch_array($res1)){
                    $instruId=$row1['instru_id'];
                }
                // -----------------enter to abscent table----------
                if(isset($_POST['sId'])){
                    $sId=$_POST['sId'];
                    $sql5="insert into tbl_attendance (s_id,instru_id,aDate,batch_id) values($sId,$instruId,'$aDate',$batchId)";
                    mysqli_query($con,$sql5)or die(mysqli_error($con));
                }
                // -----------------------deleting data--------------
                if(isset($_POST['delSId'])){
                    $sId=$_POST['delSId'];
                    $sql6="delete from tbl_attendance where s_id=".$sId." and aDate='".$aDate."'";
                    mysqli_query($con,$sql6)or die(mysqli_error($con));
                }
                $no=0;
                $sql2="select * from tbl_regcourse where instru_id=".$instruId." and batch_id=".$batchId;
                $res2=mysqli_query($con,$sql2)or die(mysqli_error($con));
                while($row2=mysqli_fetch_array($res2)){
                    $no++;
                    $sql4="select sName from tbl_studentdetails where s_id=".$row2['s_id'];
                    $res4=mysqli_query($con,$sql4)or die(mysqli_error($con));
                    while($row4=mysqli_fetch_array($res4)){
                        $name=$row4['sName'];
                    }
                    $sql3="select * from tbl_attendance where aDate='".$aDate."' and s_id=".$row2['s_id'];
                    $res3=mysqli_query($con,$sql3)or die(mysqli_error($con));
                    if(mysqli_num_rows($res3)>0){
                        echo "<tr>"
                            ."<td>$no</td>"
                            ."<td>$name</td>"
                            ."<td><button style='border:none;background-color:white;' value='".$row2['s_id']."' onClick='doDelete(this.value)' class='material-icons'>cancel</button></td>"
                            ."</tr>";
                    } else{
                        echo "<tr>"
                            ."<td>$no</td>"
                            ."<td>$name</td>"
                            ."<td><button style='border:none;background-color:white;' value='".$row2['s_id']."' onClick='doEnter(this.value)' class='material-icons'>check_circle</button></td>"
                            ."</tr>";
                    }
                }
                
            }
        }
        // -----------------enter abscent history----------
        if(isset($_POST['saveDate'])){
            $aDate=$_POST['saveDate'];
            $sql1="insert into tbl_attendancehistory (eDate) values('".$aDate."')";
            if(mysqli_query($con,$sql1)or die(mysqli_error($con))){
                echo "1";
            } else{
                echo "0";
            }
        }
        // -----------------check---------------
        if(isset($_POST['checkDate'])){
            $date=$_POST['checkDate'];
            $sql1="select * from tbl_attendancehistory where eDate='".$date."'";
            $res1=mysqli_query($con,$sql1)or die(mysqli_error($con));
            $rowc=mysqli_num_rows($res1);
            if(mysqli_num_rows($res1)>0){
              echo "1";
            } else{
              echo "0";
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
        // ----------course status-------------
        if(isset($_POST['uDate'])){
            $uDate=$_POST['uDate'];
            $instruId=$_POST['instruId'];
            $sql1="SELECT * FROM tbl_portionstatus WHERE psDate='".$uDate."' AND instru_id=".$instruId;
            $res1=mysqli_query($con,$sql1)or die(mysqli_error($con));
            if(mysqli_num_rows($res1)>0){
                echo "1";
            } 
            if(isset($_POST['uDetails'])){
                $uDetails=$_POST['uDetails'];
                $sDate=strtotime($uDate);
                $day=date("D",$sDate);
                $batchId=0;
                if($day==='Sun' || $day==='Sat'){
                    $batchId=2;
                } else{
                    $batchId=1;
                }
                $sql2="INSERT INTO tbl_portionstatus (instru_id,psDate,psSchedule,psDetails) VALUES($instruId,'$uDate',$batchId,'$uDetails')";
                $res2=mysqli_query($con,$sql2)or die(mysqli_error($con));
                if($res2){
                    $sql3="SELECT * FROM tbl_portionstatus WHERE instru_id=".$instruId;
                    $res3=mysqli_query($con,$sql3)or die(mysqli_error($con));
                    while($row3=mysqli_fetch_array($res3)){
                        $date=$row3['psDate'];
                    }
                    echo $date;
                }
            }
        }
        // --------------view course status-----------------
        if(isset($_POST['schedule'])){
            $schedule=$_POST['schedule'];
            $instruId=$_POST['instruId'];
            $no=0;
            $sql1="SELECT * FROM tbl_portionstatus WHERE instru_id=".$instruId." AND psSchedule=".$schedule;
            $res1=mysqli_query($con,$sql1)or die(mysqli_error($con));
            if(mysqli_num_rows($res1)>0){
                while($row1=mysqli_fetch_array($res1)){
                    $no++;
                    echo "<tr>"
                        ."<td>$no</td>"
                        ."<td>".$row1['psDate']."</td>"
                        ."<td>".$row1['psDetails']."</td>"
                        ."</tr>";
                } 
            } else{
                echo "1";
            }
        }
    }
?>