<?php
include "dbConnection.php";
//session_start();


if (isset($_GET['id'])) {

    //CHILDREN DATA
    unset($_SESSION['sr_data']);
    $id = $_GET['id'];

    $query = 'SELECT * FROM tbl_service_record WHERE EMPID = "'.$id.'" AND CANCELLED = "N" ';


     
      
      $result = mysqli_query($connect, $query );
      
      $data = array();
      if($result){
        while($row = mysqli_fetch_array($result)){
         
          $sub_array = array();
          $sub_array['srid'] = $row['ID'];
          $sub_array['employeeid'] = $row['EMPID'];
          $sub_array['service_from'] = $row['SERVICEFROM'];
          $sub_array['service_to'] = $row['SERVICETO'];
          $sub_array['designation'] = $row['DESIGNATION'];
          $sub_array['status'] = $row['STATUS'];
          $sub_array['salary'] = $row['SALARY'];
          $sub_array['office'] = $row['OFFICE'];
          $sub_array['branch'] = $row['BRANCH'];
          $sub_array['abs'] = $row['ABS'];
          $sub_array['separation_date'] = $row['SEPARATIONDATE'];
          $sub_array['amount_received'] = $row['AMOUNTRECEIVED'];
          $sub_array['details'] = $row['DETAILS'];
          $sub_array['action'] = "
                  <button type='button' name='update_sr' class='btn btn-warning btn-sm update_sr'  data-id='".$row['ID']."'>View</button>
                  <button type='button' name='delete_sr' class='btn btn-danger btn-sm delete_sr' data-id='".$row['ID']."'>Delete</button>";  
          $data[] = $sub_array;
        }
      }
      
      $_SESSION['sr_data'] = $data;
      //END OF CHILDREN DATA

}

?>