<?php 
$servername = "localhost";
$username = "root";
$password="";

$db = "d0l310_hris";

/*$servername = "localhost";
$username = "d0l310_hrisadmin";
$password="d0l310_hrisadmin";
$db = "d0l310_hris_db";*/
//Establish Connnecion
$connect = new mysqli($servername,$username,$password,$db) or die($mysqli->error);
GLOBAL $connect;
 ?>