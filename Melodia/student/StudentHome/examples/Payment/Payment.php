<?php
    session_start();
    include("../../../../dbconnect.php");
    if(isset($_SESSION['login_id'])){
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Melodia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script> -->
    <!--  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script> -->
</head>
<body>

    <div class="container">
        <div class="page-header">
            <h1>Your <small>payment is in process.....</small></h1>
        </div>
        <?php
            $fee=0;
            if(isset($_POST['sPayment'])){
                $pId=$_POST['sPayment'];
                $sql1="select feeAmount from tbl_payment where dStatus=0 and p_id=".$pId;
                $res1=mysqli_query($con,$sql1)or die(mysqli_error($con));
                while($row1=mysqli_fetch_array($res1)){
                    $fee=$row1['feeAmount'];
                }
            }
        ?>
<!-- Credit Card Payment Form - START -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <h3 class="text-center">Payment Details</h3>
                                <img class="img-responsive cc-img" src="http://www.prepbootstrap.com/Content/images/shared/misc/creditcardicons.png">
                            </div>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="../../../StudentAction.php">
                                <div class="row" style="display:none">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" id="pId" name="pId" class="form-control" value="<?php echo $pId; ?>"/>
                                                <span class="input-group-addon"><span class="fa fa-money"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>AMOUNT</label>
                                            <div class="input-group">
                                                <input type="text" name="sFee" id="sFee" class="form-control" value="<?php echo $fee; ?>" readonly/>
                                                <span class="input-group-addon"><span class="fa fa-money"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>CARD NUMBER</label>
                                            <div class="input-group">
                                                <input type="text" name="cardNumber" id="cardNumber" class="form-control" placeholder="Valid Card Number" onchange="validateCard()" required/>
                                                <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label style="display:nne; color:red" id="card_error"></label>
                                    <script>
                                        function validateCard() {
                                        var val = document.getElementById('cardNumber').value;
                                        if (!val.match(/^(?!(\d)\1{9})(?!0123456789|1234567890|0987654321|0000000000|1111111111|22222222222|3333333333|4444444444|5555555555|6666666666|7777777777|8888888888|9999999999|1000000000|2000000000|3000000000|40000000000|5000000000|6000000000|7000000000|8000000000|9000000000)\d{16}$/)) {
                                            $("#card_error").html('Invalid card number..!').fadeIn().delay(2000).fadeOut();
                                            document.getElementById('cardNumber').value = "";
                                            return false;
                                        }
                                        return true;
                                        }
                                    </script>
                                </div>
                                <div class="row">
                                    <div class="col-xs-7 col-md-7">
                                        <div class="form-group">
                                            <label><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                            <input type="text" id="expDate" name="expDate" class="form-control" placeholder="MM / YY" onchange="validateDate()" required/>
                                        </div>
                                    </div>
                                    <div class="col-xs-5 col-md-5 pull-right">
                                        <div class="form-group">
                                            <label>CV CODE</label>
                                            <input type="text" id="cvv" name="cvv" class="form-control" placeholder="CVC" onchange="validateCvv()" required/>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label style="display:nne; color:red" id="error"></label>
                                    <script>
                                        // function validateDate() {
                                        // var val = document.getElementById('expDate').value;
                                        // if (!val.match(/^(?!(\d)\1{9})(?!0123456789|1234567890|0987654321|0000000000|1111111111|22222222222|3333333333|4444444444|5555555555|6666666666|7777777777|8888888888|9999999999|1000000000|2000000000|3000000000|40000000000|5000000000|6000000000|7000000000|8000000000|9000000000)\d{16}$/)) {
                                        //     $("#pcontact_error").html('Invalid exp date..!').fadeIn().delay(4000).fadeOut();
                                        //     document.getElementById('expDate').value = "";
                                        //     return false;
                                        // }
                                        // return true;
                                        // }
                                        function validateCvv() {
                                        var val = document.getElementById('cvv').value;
                                        if (!val.match(/^(?!(\d)\1{9})(?!0123456789|1234567890|0987654321|0000000000|1111111111|22222222222|3333333333|4444444444|5555555555|6666666666|7777777777|8888888888|9999999999|1000000000|2000000000|3000000000|40000000000|5000000000|6000000000|7000000000|8000000000|9000000000)\d{3}$/)) {
                                            $("#error").html('Invalid cvv number..!').fadeIn().delay(4000).fadeOut();
                                            document.getElementById('cvv').value = "";
                                            return false;
                                        }
                                        return true;
                                        }
                                    </script>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>CARD OWNER</label>
                                            <input type="text" id="cardHolder" name="cardHolder" class="form-control" placeholder="Card Owner Names" onchange="Validatereason()" required />
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label style="display:nne; color:red" id="name_error"></label>
                                    <script>
                                        function Validatereason() {
                                            var val = document.getElementById('cardHolder').value;
                                            if (!val.match(/^[A-Za-z][A-Za-z" "]{3,}$/)) {
                                                $("#name_error").html('Invalid name..!').fadeIn().delay(4000).fadeOut();
                                                document.getElementById('cardHolder').value = "";
                                                return false;
                                            }
                                            return true;
                                        }
                                    </script>
                                </div>
                                <label style="display:nne; color:red" id="error"></label>
                                <div class="panel-footer" id="gOtp" name="gOtp">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <button type="button" class="btn btn-warning btn-lg btn-block" value="1" onclick="doProcess(this.value);">Process payment</button>
                                        </div>
                                    </div>
                                </div>
                                <label style="display:nne; color:red" id="otp_error"></label>
                                <div id="otp" name="otp" class="row" style="display:none">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <input type="text" name="sOtp" id="sOtp" class="form-control" placeholder="OTP" />
                                        </div>
                                        <div class="col-xs-12">
                                            <button type="button" id="feePayment" name="feePayment" value="1" class="btn btn-warning btn-lg btn-block" onclick="processOtp(this.value);">Continue</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <script>
                                function doProcess(val) {
                                    var pId=document.getElementById('pId').value;
                                    var sFee=document.getElementById('sFee').value;
                                    var cardNumber=document.getElementById('cardNumber').value;
                                    var expDate=document.getElementById('expDate').value;
                                    var cvv=document.getElementById('cvv').value;
                                    var cardHolder=document.getElementById('cardHolder').value;
                                    $.ajax({
                                        type: "POST",
                                        url: "../../../StudentAction.php",
                                        data:{
                                            paymentAction:val,
                                            dPId:pId,
                                            dFee:sFee,
                                            dCardNumber:cardNumber,
                                            dExpDate:expDate,
                                            dCvv:cvv,
                                            dCardHolder:cardHolder
                                        },
                                        success: function(data){
                                            if(data==1){
                                                $("#otp").show();
                                                $("#gOtp").hide();
                                            }else{
                                                $("#error").html(data).fadeIn().delay(4000).fadeOut();
                                            }
                                        }
                                    });
                                }
                                function processOtp(val) {
                                    var pId=document.getElementById('pId').value;
                                    var sFee=document.getElementById('sFee').value;
                                    var cardNumber=document.getElementById('cardNumber').value;
                                    var otp=document.getElementById('sOtp').value;
                                    $.ajax({
                                        type: "POST",
                                        url: "../../../StudentAction.php",
                                        data:{
                                            feePayment:val,
                                            dPId:pId,
                                            dFee:sFee,
                                            dCardNumber:cardNumber,
                                            dOtp:otp
                                        },
                                        success: function(data){
                                            if(data==1){
                                                window.location.href="./success.php";
                                            }else{
                                                $("#otp_error").html(data).fadeIn().delay(4000).fadeOut();
                                            }
                                        }
                                    });
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .cc-img {
                margin: 0 auto;
            }
        </style>
<!-- Credit Card Payment Form - END -->
    </div>
</body>
</html>
<?php
    }else{
        echo"<script>window.location.href='../../../../index.php'</script>";
    }
?>