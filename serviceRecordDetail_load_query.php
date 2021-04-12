<?php
include "dbConnection.php";
//session_start();


if (isset($_GET['id'])) {

    //CHILDREN DATA
    unset($_SESSION['sr_data2']);
    $id = $_GET['id'];

    $query = 'SELECT * FROM tbl_service_record WHERE EMPID = "'.$id.'" AND CANCELLED = "N" ';
      $result = mysqli_query($connect, $query );
      
      $data = array();
      if($result){
        while($row = mysqli_fetch_array($result)){
         
          $sub_array = array();
          $sub_array[] = $row["SERVICEFROM"];
          $sub_array[] = $row["SERVICETO"];
          $sub_array[] = $row["DESIGNATION"];
          $sub_array[] = $row["STATUS"];
          $sub_array[] = $row["SALARY"];
          $sub_array[] = $row["OFFICE"];
          $sub_array[] = $row["BRANCH"];
          $sub_array[] = $row["ABS"];
          $sub_array[] = $row["SEPARATIONDATE"];
          $sub_array[] = $row["AMOUNTRECEIVED"];
          $sub_array[] = $row["DETAILS"];
          $sub_array[] = "
          <button type='button' name='update_sr' class='btn btn-warning btn-sm update_sr'  data-id='".$row['ID']."'>View</button>
          <button type='button' name='delete_sr' class='btn btn-danger btn-sm delete_sr' data-id='".$row['ID']."'>Delete</button>";  
          $sub_array[] = $row["ID"];
          $sub_array[] = $row["EMPID"];
          $sub_array[] = $row["CANCELLED"];
          $data[] = $sub_array;
          
          //$_SESSION['sr_data2'][] = $sub_array; 
        }
      }
      $_SESSION['sr_data'] = $data;
      //$_SESSION['sr_data'] = $data;
      //END OF CHILDREN DATA

}

?>