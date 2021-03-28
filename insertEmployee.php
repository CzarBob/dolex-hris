<?php
include "dbConnection.php";
date_default_timezone_set("Asia/Manila");
//var_dump($_POST['add_employee']);
if(isset($_POST['add_employee'])) {
  /*if($_POST['track_num'] != ''){
    $track_num = $_POST['track_num'];
    $prov = $_POST['prov'];
  }
  else{
    $track_num = $_POST['track_num2'];
    $prov = "External";
  }*/
  $empid = $_POST['empid'];
  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $lastname = $_POST['lastname'];


  $email = 'X';
  $position = 'X';
  $datehired = 'X';
  $slcredit = 'X';
  $vlcredit = 'X';


 // echo $fullName;
  /*if ($fullName == 'BAM') {
        echo "success"; //anything on success
    } else {
      die("<div>Error: ".$fullName."</div>");
     
    }*/
  $dateAdded = date("Y-m-d H:i:s");
  $que = "INSERT INTO `tbl_employee` SET 
  EMPLOYEEID = '".$empid."',
  FIRSTNAME = '".$firstname."',
  MIDDLENAME = '".$middlename."',
  LASTNAME = '".$lastname."',
  EMAIL = '".$email."',
  POSITION = '".$position."',
  DATEHIRED = '".$datehired."',
  SLCREDIT = '".$slcredit."',
  VLCREDIT = '".$vlcredit."',
  CANCELLED = 'N'
  "; 

  $query = $connect->query($que) or die($connect->error); 


    



}
?>