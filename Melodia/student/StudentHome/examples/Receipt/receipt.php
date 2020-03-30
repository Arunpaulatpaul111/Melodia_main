<?php
//call the FPDF library
  session_start();
  require('fpdf.php');
    include("../../../../dbconnect.php");
    if(isset($_SESSION['login_id'])){
      if(isset($_POST['sReceipt'])){
        $pId=$_POST['sReceipt'];
        $sql1="select * from tbl_payment where p_id=".$pId;
        $res1=mysqli_query($con,$sql1)or die(mysqli_error($con));
        while($row1=mysqli_fetch_array($res1)){
          $amount=$row1['feeAmount'];
          $date=$row1['gDate'];
          $paidDate=$row1['pDate'];
          $sql2="select * from tbl_studentdetails where s_id=".$row1['s_id'];
          $res2=mysqli_query($con,$sql2)or die(mysqli_error($con));
          while($row2=mysqli_fetch_array($res2)){
              $name=$row2['sName'];
              $sid=$row2['s_id'];
              $contact=$row2['sContact'];
              $adress=$row2['sAddress'];
              
          }
        }
      }


// if(isset($_GET['si']))
// {
//     $sid=$_GET['si'];
// $connection = mysqli_connect('localhost','root','','faithshop');
// $sql5 ="SELECT * from sales  JOIN coustmer on sales.u_id=coustmer.log_id JOIN product on sales.pro_id=product.pro_id where sales_id='$sid' ";
  

// $i=1;
// $result5=mysqli_query($connection,$sql5); 

//   if(mysqli_num_rows($result5)>0)
//   {
//       while ($row2 =mysqli_fetch_assoc($result5))
//       {


//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//create pdf object
$pdf = new FPDF('P','mm','A4');

//add new page
$pdf->AddPage();
//output the result
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130 ,5,'MELODIA',0,0);
$pdf->Cell(59 ,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line
// $dt=$row2['sale_date'];

// $adress=$row2['adress'];
// $ph=$row2['c_phone'];
// $pro_name=$row2['pro_name'];
// $sprice=$row2['s_price'];
// $nam= $row2['c_name'];
// $s_id=$row2['sales_id'];

// $sqty=$row2['sqty'];

// $cid=$row2['cust_id'];
// $tot=$sqty*$sprice;
$pdf->Cell(130 ,5,'kanjirapally',0,0);
$pdf->Cell(25 ,5,'Date',0,0);
$pdf->Cell(34 ,5,$paidDate,0,1);//end of line

$pdf->Cell(130 ,5,'Phone 8592095528',0,0);
$pdf->Cell(25 ,5,'Invoice #',0,0);
$pdf->Cell(34 ,5,'000'.$pId,0,1);//end of line


// $pdf->Cell(25 ,5,'Customer ID',0,0);
// $pdf->Cell(34 ,5,'000'.$sid,0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$name,0,1);
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(25 ,5,'Customer ID ',0,0);
$pdf->Cell(34 ,5,': 000'.$sid,0,1);


$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$adress,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$contact,0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130 ,5,'Description',1,0);
$pdf->Cell(25 ,5,'Date',1,0);
$pdf->Cell(34 ,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(130 ,5,'Monthly Fee',1,0);
$pdf->Cell(25 ,5,$date,1,0);
$pdf->Cell(34 ,5,$amount,1,1,'R');//end of line


//summary
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Total',0,0);
$pdf->Cell(4 ,5,'',1,0);
$pdf->Cell(30 ,5,$amount,1,1,'R');//end of line

// $pdf->Cell(130 ,5,'',0,0);
// $pdf->Cell(25 ,5,'Taxable',0,0);
// $pdf->Cell(4 ,5,'',1,0);
// $pdf->Cell(30 ,5,'0',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Due',0,0);
$pdf->Cell(4 ,5,'',1,0);
$pdf->Cell(30 ,5,'0',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Total Paid',0,0);
$pdf->Cell(4 ,5,'',1,0);
$pdf->Cell(30 ,5,$amount,1,1,'R');
$pdf->Output();
}
?>