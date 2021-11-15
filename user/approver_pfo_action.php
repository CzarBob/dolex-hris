<?php 
//session_start();
include "../dbConnection.php";
$columns = array('process', 'rating','fullname', 'email', 'comment',  'date_submitted');
session_start();
date_default_timezone_set('Asia/Manila');
//$_SESSION['sr_data2'] = array();
//$_SESSION['query2'] = '';
//var_dump($_POST['action']);

/*if($_POST["length"] != -1){
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}*/

$query = '';

if (isset($_POST['action'])){
  if ($_POST['action'] == 'fetch_single'){
    $query = 'SELECT 
    tbl_employee.EMPLOYEEID as EMPLOYEEID,
    tbl_employee.FIRSTNAME as FIRSTNAME,
    tbl_employee.MIDDLENAME as MIDDLENAME,
    tbl_employee.LASTNAME as LASTNAME,
    tbl_employee.EXTENSION as PROFILE_EXTENSION,
    tbl_employee.POSITION as POSITION,
    tbl_employee.DATEHIRED as DATEHIRED,
    tbl_employee.PASSWORD as PASSWORD_ACCOUNT,
    tbl_employee.USERNAME as USERNAME,
    tbl_employee.SLCREDIT as SLCREDIT,
    tbl_employee.VLCREDIT as VLCREDIT
    FROM tbl_employee WHERE tbl_employee.ID = "'.$_POST["employeeiddb"].'" ';


    //var_dump($query);

    //$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

    $result = mysqli_query($connect, $query);
    
    $data = array();
    if($result){
      while($row = mysqli_fetch_array($result)){
        
        $sub_array = array();


          $sub_array['employeeid'] = $row['EMPLOYEEID'];
          $sub_array['firstname'] = $row['FIRSTNAME'];
          $sub_array['middlename'] = $row['MIDDLENAME'];
          $sub_array['lastname'] = $row['LASTNAME'];
          $sub_array['extension'] = $row['PROFILE_EXTENSION'];
          $sub_array['position'] = $row['POSITION'];
          $sub_array['datehired'] = $row['DATEHIRED'];
          $sub_array['username'] = $row['USERNAME'];
          $sub_array['password'] = $row['PASSWORD_ACCOUNT'];
          $sub_array['slcredit'] = $row['SLCREDIT'];
          $sub_array['vlcredit'] = $row['VLCREDIT'];


        
        $data[] = $sub_array;
        
      }
    }

    $a = array();
    $b = array();
    $c = array();


    if(isset($sub_array)){
      $a = $sub_array;
    } 
    if(isset($sub_array_query_profile)){
      $b = $sub_array_query_profile;
    } 
    if(isset($sub_array_query_family)){
      $c = $sub_array_query_family;
    } 
    $output = array(
    "data"    => $a,
    "data_profile"    => $b,
    "data_family"    => $c
    );

    echo json_encode($output);


  }
}



if (isset($_POST['action'])){
    if ($_POST['action'] == 'fetch_leave_data'){

      $query = 'SELECT tbl_leave.ID as ID,tbl_leave.DATEOFFILLING as DATEOFFILLING, tbl_employee.FIELDOFFICEID as FIELDOFFICEID, tbl_leave.LEAVETYPE as LEAVETYPE, tbl_employee.FIRSTNAME as FIRSTNAME, tbl_employee.LASTNAME as LASTNAME FROM `tbl_leave`
      INNER JOIN tbl_employee ON tbl_leave.EMPID = tbl_employee.ID WHERE tbl_leave.CANCELLED = "N" AND tbl_leave.HEADAPPROVESTATUS !="N"  AND tbl_employee.FIELDOFFICEID =  "'.$_SESSION['fielofficeid'].'" ';

      //svar_dump($query);

      $result = mysqli_query($connect, $query );
      
      $data = array();
      if($result){
        while($row = mysqli_fetch_array($result)){
        
          $sub_array = array();
          $sub_array[] = $row["DATEOFFILLING"];
          $sub_array[] = $row["LEAVETYPE"];
          $sub_array[] = $row["FIRSTNAME"];
          $sub_array[] = $row["LASTNAME"];
          /*$sub_array[] = "
          <button type='button' name='view_leave' class='btn btn-warning btn-sm view_leave'  data-id='".$row['ID']."'>View</button>";*/
          $sub_array[] = "<a href='approver_pfo_detail_view.php?id=".$row['ID']."' data-id='".$row['ID']."'> <button type='button' class='btn btn-info btn-sm'>Select</button></a> ";  
          //<button type='button' name='delete_sr' class='btn btn-danger btn-sm delete_sr' data-id='".$row['ID']."'>Delete</button>";  
       
          $data[] = $sub_array;
        }
      }
      
      //var_dump($data);
      //$_SESSION['sr_date_dump'] = $data;
      
      //var_dump($_SESSION['query2']);
      $output = array(
       //"draw"    => intval($_POST["draw"]),
       //"recordsTotal"  =>  get_all_data($connect),
       //"recordsFiltered" => $number_filter_row,
       "data"    => $data
      );
      
      echo json_encode($output);
    }
  } 


  if (isset($_POST['action'])){
    if ($_POST['action'] == 'fetch_leave_approved_data'){

      $query = 'SELECT tbl_leave.ID as ID,tbl_leave.DATEOFFILLING as DATEOFFILLING, tbl_employee.FIELDOFFICEID as FIELDOFFICEID, tbl_leave.LEAVETYPE as LEAVETYPE, tbl_employee.FIRSTNAME as FIRSTNAME, tbl_employee.LASTNAME as LASTNAME FROM `tbl_leave`
      INNER JOIN tbl_employee ON tbl_leave.EMPID = tbl_employee.ID WHERE tbl_leave.CANCELLED = "N" AND tbl_leave.HEADAPPROVESTATUS ="Y"  AND tbl_employee.FIELDOFFICEID =  "'.$_SESSION['fielofficeid'].'"';



      $result = mysqli_query($connect, $query );
      
      $data = array();
      if($result){
        while($row = mysqli_fetch_array($result)){
        
          $sub_array = array();
          $sub_array[] = $row["DATEOFFILLING"];
          $sub_array[] = $row["LEAVETYPE"];
          $sub_array[] = $row["FIRSTNAME"];
          $sub_array[] = $row["LASTNAME"];
          /*$sub_array[] = "
          <button type='button' name='view_leave' class='btn btn-warning btn-sm view_leave'  data-id='".$row['ID']."'>View</button>";*/
          $sub_array[] = "<a href='approver_pfo_detail_view.php?id=".$row['ID']."' data-id='".$row['ID']."'> <button type='button' class='btn btn-info btn-sm'>Select</button></a> ";  
          //<button type='button' name='delete_sr' class='btn btn-danger btn-sm delete_sr' data-id='".$row['ID']."'>Delete</button>";  
       
          $data[] = $sub_array;
        }
      }
      
      //var_dump($data);
      //$_SESSION['sr_date_dump'] = $data;
      
      //var_dump($_SESSION['query2']);
      $output = array(
       //"draw"    => intval($_POST["draw"]),
       //"recordsTotal"  =>  get_all_data($connect),
       //"recordsFiltered" => $number_filter_row,
       "data"    => $data
      );
      
      echo json_encode($output);
    }
  }


  if (isset($_POST['action'])){
    if ($_POST['action'] == 'fetch_leave_denied_data'){

      $query = 'SELECT tbl_leave.ID as ID,tbl_leave.DATEOFFILLING as DATEOFFILLING, tbl_employee.FIELDOFFICEID as FIELDOFFICEID, tbl_leave.LEAVETYPE as LEAVETYPE, tbl_employee.FIRSTNAME as FIRSTNAME, tbl_employee.LASTNAME as LASTNAME FROM `tbl_leave`
      INNER JOIN tbl_employee ON tbl_leave.EMPID = tbl_employee.ID WHERE tbl_leave.CANCELLED = "N" AND tbl_leave.HEADAPPROVESTATUS ="N"  AND tbl_employee.FIELDOFFICEID =  "'.$_SESSION['fielofficeid'].'"';



      $result = mysqli_query($connect, $query );
      
      $data = array();
      if($result){
        while($row = mysqli_fetch_array($result)){
        
          $sub_array = array();
          $sub_array[] = $row["DATEOFFILLING"];
          $sub_array[] = $row["LEAVETYPE"];
          $sub_array[] = $row["FIRSTNAME"];
          $sub_array[] = $row["LASTNAME"];
          /*$sub_array[] = "
          <button type='button' name='view_leave' class='btn btn-warning btn-sm view_leave'  data-id='".$row['ID']."'>View</button>";*/
          $sub_array[] = "<a href='approver_pfo_detail_view.php?id=".$row['ID']."' data-id='".$row['ID']."'> <button type='button' class='btn btn-info btn-sm'>Select</button></a> ";  
          //<button type='button' name='delete_sr' class='btn btn-danger btn-sm delete_sr' data-id='".$row['ID']."'>Delete</button>";  
       
          $data[] = $sub_array;
        }
      }
      
      //var_dump($data);
      //$_SESSION['sr_date_dump'] = $data;
      
      //var_dump($_SESSION['query2']);
      $output = array(
       //"draw"    => intval($_POST["draw"]),
       //"recordsTotal"  =>  get_all_data($connect),
       //"recordsFiltered" => $number_filter_row,
       "data"    => $data
      );
      
      echo json_encode($output);
    }
  }

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'fetch_pfo'){

      $query = 'SELECT * FROM tbl_leave WHERE EMPID = "'.$_POST['employeeiddb'].'" AND CANCELLED = "N" ';

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
          $data[] = $sub_array;
          
          $_SESSION['sr_data2'][] = $sub_array; 
          
        }
      }
      //$_SESSION['sr_data2'] = $data;

      //$_SESSION['sr_date_dump'] = $data;
      
      //var_dump($_SESSION['query2']);
      $output = array(
       //"draw"    => intval($_POST["draw"]),
       //"recordsTotal"  =>  get_all_data($connect),
       //"recordsFiltered" => $number_filter_row,
       //"data"    => $_SESSION['sr_data2']
       "data"    => $data
      );
      
      echo json_encode($output);
    }
  }


  if (isset($_POST['action'])){
    if ($_POST['action'] == 'add_service_record'){
      $empid  = $_POST['employeeiddb'];

      $service_from = $_POST['service_from'];
      $service_to = $_POST['service_to'];
      $designation = mysqli_real_escape_string($connect,strtoupper($_POST['designation']));
      $status = mysqli_real_escape_string($connect,strtoupper($_POST['status']));
      $salary = mysqli_real_escape_string($connect,strtoupper($_POST['salary']));
      $office = mysqli_real_escape_string($connect,strtoupper($_POST['office']));
      $branch = mysqli_real_escape_string($connect,strtoupper($_POST['branch']));
      $abs = mysqli_real_escape_string($connect,strtoupper($_POST['abs']));
      $separation_date = $_POST['separation_date'];
      $amount_received = mysqli_real_escape_string($connect,strtoupper($_POST['amount_received']));
      $details = mysqli_real_escape_string($connect,strtoupper($_POST['details']));

      $usernameid = $_POST['usernameid'];

      $message_success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Data Updated!</strong> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>';
      $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Please Check field/s:</strong> <br>
      ';
      $flag = false;

      $currentDate = date("Y/m/d");

      if (($designation == null) || ($designation == '')){
        $flag = true;
        $message .= 'Designation must not be blank <br>
        ';
      }

      if (!$flag){
        $dateAdded = date("Y-m-d H:i:s");
        $que = 'INSERT INTO `tbl_service_record` SET 
        EMPID =  "'.$empid.'",
        SERVICEFROM =  "'.$service_from.'",
        SERVICETO =  "'.$service_to.'",
        DESIGNATION =  "'.$designation.'",
        STATUS =  "'.$status.'",
        SALARY =  "'.$salary.'",
        OFFICE =  "'.$office.'",
        BRANCH =  "'.$branch.'",
        ABS =  "'.$abs.'",
        SEPARATIONDATE =  "'.$separation_date.'",
        AMOUNTRECEIVED =  "'.$amount_received.'",
        DETAILS =  "'.$details.'",
        CANCELLED = "N",
        CREATEDBY = "'.$usernameid.'",
        CREATEDDATETIME = "'.$dateAdded.'"
        
        '; 
        $result = mysqli_query($connect,$que); 

      }

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
    if ($_POST['action'] == 'cancel_update'){

        $empid  = $_POST['employeeiddb'];

        $email = 'X';
        $position = 'X';
        $datehired = 'X';
        $slcredit = 'X';
        $vlcredit = 'X';
      
      
        $i = 0;

        //CHILDREN DATA
        $dateAdded = date("Y-m-d H:i:s");
        $query = 'UPDATE tbl_employee_children
        SET CANCELLED = "Y" 
        WHERE EMPID = "'.$_POST["employeeiddb"].'"';
        $result = mysqli_query($connect, $query);

        $children_data =  $_SESSION['query3'];


        foreach($children_data as $x ) {

          //echo "$x[0] + $x[1]<br>";
          $que = "INSERT INTO `tbl_employee_children` SET 
          EMPID = '".$empid."',
          FULLNAME = '".$x[0]."',
          DOB = '".$x[1]."',
          CANCELLED = 'N'
          "; 

          //echo $que;
          $result = mysqli_query($connect, $que);
          $i++; 

        }
    }
  }




  if (isset($_POST['action'])){
    if ($_POST['action'] == 'submit_update_sr'){

      $empid  = $_POST['employeeiddb'];
      $srid  = $_POST['srid'];
      $service_from = $_POST['service_from'];
      $service_to = $_POST['service_to'];
      $designation =  mysqli_real_escape_string($connect,strtoupper($_POST['designation']));
      $status =  mysqli_real_escape_string($connect,strtoupper($_POST['status']));
      $salary =  mysqli_real_escape_string($connect,strtoupper($_POST['salary']));
      $office =  mysqli_real_escape_string($connect,strtoupper($_POST['office']));
      $branch =  mysqli_real_escape_string($connect,strtoupper($_POST['branch']));
      $abs =  mysqli_real_escape_string($connect,strtoupper($_POST['abs']));
      $separation_date = $_POST['separation_date'];
      $amount_received =  mysqli_real_escape_string($connect,strtoupper($_POST['amount_received']));
      $details =  mysqli_real_escape_string($connect,strtoupper($_POST['details']));
      $usernameid = $_POST['usernameid'];

      
      $message_success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Data Updated!</strong> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>';
      $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Please Check field/s:</strong> <br>
      ';
      $flag = false;


      if (($designation == null) || ($designation == '')){
        $flag = true;
        $message .= 'Designation must not be blank <br>
        ';
      }

      if (!$flag){
        $dateNow = date("Y-m-d H:i:s");
        $query = 'UPDATE tbl_service_record
        SET 
        SERVICEFROM =  "'.$service_from.'",
        SERVICETO =  "'.$service_to.'",
        DESIGNATION =  "'.$designation.'",
        STATUS =  "'.$status.'",
        SALARY =  "'.$salary.'",
        OFFICE =  "'.$office.'",
        BRANCH =  "'.$branch.'",
        ABS =  "'.$abs.'",
        SEPARATIONDATE =  "'.$separation_date.'",
        AMOUNTRECEIVED =  "'.$amount_received.'",
        DETAILS =  "'.$details.'",
        UPDATEDBY = "'.$usernameid.'",
        UPDATEDDATETIME = "'.$dateNow.'"

        WHERE ID = "'.$srid.'"';

        //var_dump($query);
        $result = mysqli_query($connect, $query);

      }

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
    if ($_POST['action'] == 'delete_sr'){
      $dateNow = date("Y-m-d H:i:s");
      $usernameid = $_POST['usernameid'];
      $query = 'UPDATE tbl_service_record
        SET CANCELLED = "Y",
        CANCELLEDBY = "'.$usernameid.'",
        CANCELLEDDATETIME = "'.$dateNow.'"


        WHERE ID = "'.$_POST["id"].'" AND CANCELLED = "N" ';

      //echo $query;
      //$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
      
      $result = mysqli_query($connect, $query );

    }
  }


  


  if ($_POST['action'] == 'fetch_single_sr'){
      $query = 'SELECT * FROM tbl_service_record WHERE ID = "'.$_POST["id"].'" AND CANCELLED != "Y" ';

      //var_dump($_SESSION['sr_data2'][0]);
      /*foreach($_SESSION['sr_data2'] as $desired_key){
       var_dump('$desired_key');
      }*/
      

      $result = mysqli_query($connect, $query);

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

          $data[] = $sub_array;
        }
      }



    $output = array(
      //"draw"    => intval($_POST["draw"]),
      //"recordsTotal"  =>  get_all_data($connect),
      //"recordsFiltered" => $number_filter_row,
      "data"    => $sub_array
      );
      //var_dump($data[]);

    echo json_encode($sub_array);



  }         








?>
