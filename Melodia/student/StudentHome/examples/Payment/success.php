<?php
    session_start();
    include("../../../../dbconnect.php");
    if(isset($_SESSION['login_id'])){
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .success-page{
        max-width:300px;
        display:block;
        margin: 0 auto;
        text-align: center;
            position: relative;
            top: 50%;
            transform: perspective(1px) translateY(50%)
        }
        .success-page img{
        max-width:62px;
        display: block;
        margin: 0 auto;
        }

        .btn-view-orders{
        display: block;
        border:1px solid #47c7c5;
        width:100px;
        margin: 0 auto;
        margin-top: 45px;
        padding: 10px;
        color:#fff;
        background-color:#47c7c5;
        text-decoration: none;
        margin-bottom: 20px;
        }
        h2{
        color:#47c7c5;
            margin-top: 25px;

        }
        a{
        text-decoration: none;
        }
    </style>
</head>
<body>
    <div align="center">
        <img  src="./payment_success.jpg" class="center" alt="hiiii" />
    </div>
    <div class="success-page">
        <!-- <h2>Payment Successful !</h2>
        <p>We are delighted to inform you that we received your payments</p> -->
        <!-- <a href="#" class="btn-view-orders">View Orders</a> -->
        <a href="../PaymentStatus.php">Continue login...</a>
    </div>
</body>
<?php 
    }
?>