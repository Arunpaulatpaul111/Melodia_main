<?php
$con= mysqli_connect("localhost","root","") or die ("could not connect to mysql"); 
mysqli_select_db($con, "melodia_new") or die ("no database");   
?>