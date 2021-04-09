<?php 
$servername = "localhost";
$username = "root";
$password="";
//$db = "citizen_charter";
$db = "d0l310_hris";
//Establish Connnecion
$connect = new mysqli($servername,$username,$password,$db) or die($mysqli->error);
GLOBAL $connect;
 ?>