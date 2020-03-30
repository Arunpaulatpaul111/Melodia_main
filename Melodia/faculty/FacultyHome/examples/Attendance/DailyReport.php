<?php
//call the FPDF library
  session_start();
  require('fpdf.php');
  include("../../../../dbconnect.php");
  if(isset($_SESSION['login_id'])){
    if(isset($_POST['aGenerate'])){
      $rDate=$_POST['sAttendance'];
      $facId=$_SESSION['facId'];
      $sql1="SELECT * FROM tbl_instruments JOIN tbl_facincharge ON tbl_instruments.instru_id=tbl_facincharge.instru_id WHERE tbl_facincharge.fac_id=".$_SESSION['facId'];
      $res1=mysqli_query($con,$sql1)or die(mysqli_error($con));
      while($row1=mysqli_fetch_array($res1)){
        $instruName=$row1['instruName'];
      }
      $sql2="select * from tbl_attendance where aDate='".$rDate."'";
      $res2=mysqli_query($con,$sql2)or die(mysqli_error($con));

      //create pdf object
      $pdf = new FPDF('P','mm','A4');

      //add new page
      $pdf->AddPage();
      //output the result
      $pdf->SetFont('Arial','B',14);

      //Cell(width , height , text , border , end line , [align] )
      $pdf->Cell(70 ,5,'',0,0);
      $pdf->Cell(10 ,5,'MELODIA',0,0);
      $pdf->Cell(130 ,5,'',0,1);

      //set font to arial, regular, 12pt
      $pdf->SetFont('Arial','',12);

      $pdf->Cell(189 ,10,'',0,1);//end of line

      $pdf->SetFont('Arial','',12);

      $pdf->Cell(130 ,5,'On '.$rDate.' for the '.$instruName.' class the following students are not attended the class',0,1);

      $pdf->SetFont('Arial','',12);
      $n=0;
      $pdf->Cell(130,5,'',0,1);
      $pdf->Cell(130,5,'',0,1);
      while($row2=mysqli_fetch_array($res2)){
        $n++;
        $sql3="select sName from tbl_studentdetails where s_id=".$row2['s_id'];
        $res3=mysqli_query($con,$sql3)or die(mysqli_error($con));
        while($row3=mysqli_fetch_array($res3)){
          $sName=$row3['sName'];
        }
        $pdf->Cell(10,5,$n,0,0);
        $pdf->Cell(10,5,$sName,0,1);
      }
      $pdf->Output();
    }
  }
?>