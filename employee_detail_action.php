<?php
include "dbConnection.php";
session_start();
date_default_timezone_set("Asia/Manila");

if (isset($_POST['action'])){
  if ($_POST['action'] == 'insert_employee'){


    $message_success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Data Updated!</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Please Check field/s below:</strong> <br>
    ';
    $flag = false;

    $usernameid = $_POST['usernameid'];
    $empid = $_POST['empid'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];


    $email = '';
    $position = '';
    $datehired = '';
    $slcredit = '';
    $vlcredit = '';

    if (($empid == null) || ($empid == '') ){
      $flag = true;
      $message .= 'Employee ID must not be blank <br>
      ';
    }
    if (($firstname == null) || ($firstname == '') || (preg_match('~[0-9]+~', $firstname))){
      $flag = true;
      $message .= 'First Name must not be blank or not correct format <br>
      ';
    }
    if (($middlename == null) || ($middlename == '') || (preg_match('~[0-9]+~', $middlename))){
      $flag = true;
      $message .= 'Middle Name must not be blank or not correct format <br>
      ';
    }
    if (($lastname == null) || ($lastname == '') || (preg_match('~[0-9]+~', $lastname))){
      $flag = true;
      $message .= 'Last Name must not be blank or not correct format <br>
      ';
    }

    if (!$flag){

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
      CREATEDBY = '".$usernameid."',
      CREATEDDATETIME = '".$dateAdded."',
      CANCELLED = 'N'
      "; 

      $query = $connect->query($que) or die($connect->error); 
    }
      
    $message .= '
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button></div>';

    $message_final = '';

    if ($flag){
      $message_final = $message;
    } else {
      $message_final = $message_success;
    }
    
    $output = array(
    'status'    => $message_final
    );

    echo json_encode($output);
  }
}




if (isset($_POST['action'])){
  if ($_POST['action'] == 'delete_employee'){
    $usernameid = $_POST['usernameid'];
    $date = date("Y-m-d H:i:s");
    $query = 'UPDATE tbl_employee
      SET CANCELLED = "Y",
      CANCELLEDBY = "'.$usernameid.'",
      CANCELLEDDATETIME = "'.$date.'"
      WHERE ID = "'.$_POST["id"].'" AND CANCELLED = "N" ';
     

    $result = mysqli_query($connect, $query );

  }
}
?>