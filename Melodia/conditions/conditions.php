<?php
    session_start();
    if(isset($_SESSION['login_id'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Melodia</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <h2 class="form-title">Terms and Conditions</h2>
                    <div class="form-group">
                        <ol>
                            <li>Students can only register for two courses.</li>
                            <li>Students are permitted to take two leaves in a month.</li>
                            <li>If student previously applied for leave the missed classes will scheduled later.</li>
                            <li>There are only two schedules available that are evening and weekend schedules.</li>
                        </ol>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-submit" value="I  AGREE" onClick="location.href='../student/StudentHome/examples/StudentDetails.php'"/>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<?php
    }else{
        echo"<script>window.location.href='../index.php';</script>";
    }
?>