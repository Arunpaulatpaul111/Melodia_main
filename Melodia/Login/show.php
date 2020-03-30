<?php
session_start();
include("../dbconnect.php");
if (isset($_POST['login'])){
	$userName=trim($_POST['username']);
	$password=md5(trim($_POST['pass']));	
	$sql1="select * from tbl_login where Email='$userName'";
	$result=mysqli_query($con,$sql1);
	$rowCount=mysqli_num_rows($result);
	if($rowCount != 0){
		while($row1=mysqli_fetch_array($result))	
		{
			$dbUserName=$row1['Email'];
			$dbPassword=$row1['password'];
			$dbUser=$row1['utype_id'];
			$dbLoginId=$row1['login_id'];
			if($dbUserName==$userName && $dbPassword==$password && $dbUser==3){
				$_SESSION['login_id']="$dbLoginId";
				$sql2="select * from tbl_studentdetails where login_id=".$dbLoginId;
				$res2=mysqli_query($con,$sql2) or die(mysqli_error($con));
				if($res2){
					header("location:../student/StudentHome/examples/StudentHome.php");
				} else {
					echo"<script>window.location.href='../student/StudentProfile/StudentProfile.php'</script>";
				}
				
			}
			else if($dbUserName==$userName && $dbPassword==$password && $dbUser==1){
				$_SESSION['login_id']="$dbLoginId";
				header("location:../admin/AdminHome/examples/AdminHome.php");
			}
			else if($dbUserName==$userName && $dbPassword==$password && $dbUser==2){
				$_SESSION['login_id']="$dbLoginId";
				header("location:../faculty/FacultyHome/examples/FacultyHome.php");
			}
			else{
				header("location:login.php?error=wrong Password!");
			}
		}
	}
	else{
		header("location:login.php?error=wrong username!");
	}
}
?>