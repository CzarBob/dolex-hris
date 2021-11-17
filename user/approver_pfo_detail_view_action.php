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
  if ($_POST['action'] == 'fetch_leave_application'){
    $query = 'SELECT 
    tbl_employee.EMPLOYEEID as EMPLOYEEID,
    tbl_employee.FIRSTNAME as FIRSTNAME,
    tbl_employee.MIDDLENAME as MIDDLENAME,
    tbl_employee.LASTNAME as LASTNAME,
    tbl_employee.EXTENSION as PROFILE_EXTENSION,
    tbl_employee.POSITION as POSITION,
    tbl_employee.USERNAME as USERNAME,
    tbl_employee.SLCREDIT as SLCREDIT,
    tbl_employee.VLCREDIT as VLCREDIT,
    tbl_employee.FIELDOFFICEID as FIELDOFFICEID,
    tbl_employee.DIVISIONID as DIVISIONID,
    tbl_leave.ID as LEAVEID,
    tbl_leave.LEAVETYPE as LEAVETYPE,
    tbl_leave.DATEOFFILLING as DATEOFFILLING,
    tbl_leave.SALARY as SALARY,
    tbl_leave.WORKINGDAYS as WORKINGDAYS,
    tbl_leave.INCLUSIVEDATE as INCLUSIVEDATE,
    tbl_leave.PARTONE as PARTONE,
    tbl_leave.PARTTWO as PARTTWO,
    tbl_leave.PARTTHREE as PARTTHREE,
    tbl_leave.PARTFOUR as PARTFOUR,
    tbl_leave.PARTFIVE as PARTFIVE,
    tbl_leave.PARTSIX as PARTSIX,
    tbl_leave.CHIEFREMARKS as CHIEFREMARKS,
    tbl_leave.RDREMARKS as RDREMARKS,
    tbl_leave.APPROVEDDAYSWITHPAY as APPROVEDDAYSWITHPAY,
    tbl_leave.APPROVEDDAYSWITHOUTPAY as APPROVEDDAYSWITHOUTPAY,
    tbl_leave.APPROVEDAYSOTHERS as APPROVEDAYSOTHERS,
    tbl_leave.DISAPPROVEDDUE as DISAPPROVEDDUE,
    tbl_leave.DATERDUPDATED as DATERDUPDATED,
    tbl_leave.RDAPPROVESTATUS as RDAPPROVESTATUS,
    tbl_leave.HEADAPPROVESTATUS as HEADAPPROVESTATUS,
    tbl_leave.DATEHEADUPDATED as DATEHEADUPDATED,
    tbl_leave.VLLESS as VLLESS,
    tbl_leave.VLBALANCE as VLBALANCE,
    tbl_leave.SLLESS as SLLESS,
    tbl_leave.SLBALANCE as SLBALANCE,
    tbl_leave.ATTACHMENT as ATTACHMENT,
    tbl_leave.IMSDREMARKS as IMSDREMARKS,
    tbl_leave.APPLICANTREMARKS as APPLICANTREMARKS
    
    
    FROM tbl_employee
    INNER JOIN tbl_leave on tbl_leave.EMPID = tbl_employee.ID
    where tbl_leave.ID = "'.$_POST["leaveID"].'" ';

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
        $sub_array['username'] = $row['USERNAME'];
        $sub_array['slcredit'] = $row['SLCREDIT'];
        $sub_array['vlcredit'] = $row['VLCREDIT'];
        $sub_array['fieldofficeid'] = $row['FIELDOFFICEID'];
        $sub_array['divisionid'] = $row['DIVISIONID'];

        $sub_array['leavetype']                 = $row['LEAVETYPE'];
        $sub_array['dateoffilling']        = $row['DATEOFFILLING'];
        $sub_array['salary']              = $row['SALARY'];
        $sub_array['workingdays']         = $row['WORKINGDAYS'];
        $sub_array['inclusivedate']              = $row['INCLUSIVEDATE'];
        $sub_array['partone']                       = $row['PARTONE'];
        $sub_array['parttwo']                       = $row['PARTTWO'];
        $sub_array['partthree']                     = $row['PARTTHREE'];
        $sub_array['partfour']                      = $row['PARTFOUR'];
        $sub_array['partfive']                      = $row['PARTFIVE'];
        $sub_array['partsix']                       = $row['PARTSIX'];
        $sub_array['chiefremarks']                  = $row['CHIEFREMARKS'];
        $sub_array['rdremarks']                     = $row['RDREMARKS'];
        $sub_array['approveddayswithpay']           = $row['APPROVEDDAYSWITHPAY'];
        $sub_array['approveddayswithoutpay']         = $row['APPROVEDDAYSWITHOUTPAY'];
        $sub_array['approveddaysothers']            = $row['APPROVEDAYSOTHERS'];
        $sub_array['disapproveddue']                = $row['DISAPPROVEDDUE'];
        $sub_array['daterdupdated']                 = $row['DATERDUPDATED'];
        $sub_array['rdapprovedstatus']              = $row['RDAPPROVESTATUS'];
        $sub_array['headapprovestatus']               = $row['HEADAPPROVESTATUS'];
        $sub_array['dateheadupdated']               = $row['DATEHEADUPDATED'];
        $sub_array['slless']               = $row['SLLESS'];
        $sub_array['slbalance']               = $row['SLBALANCE'];
        $sub_array['vlless']               = $row['VLLESS'];
        $sub_array['vlbalance']               = $row['VLBALANCE'];
        $sub_array['imsdremarks']                      = $row['IMSDREMARKS'];
        $sub_array['attachment']                      = $row['ATTACHMENT'];
        $sub_array['applicantremarks']                      = $row['APPLICANTREMARKS'];

      


        $data[] = $sub_array;
        
      }
    }



    $dateNow = date("Y-m-d H:i:s");
    /*if($number_filter_row == 0){
      $queProfile = "INSERT INTO `tbl_employee_profile` SET 
      EMPID = '".$_POST["employeeiddb"]."',
      UPDATEDBY = '".$usernameid."',
      UPDATEDDATETIME = '".$dateNow."'
      "; 

      $query = $connect->query($queProfile) or die($connect->error); 
    }*/

    //var_dump($query_leave);

    $a = array();




    if(isset($sub_array)){
      $a = $sub_array; //employee profile
    } 


    $output = array(
    "data"    => $a
    );

    echo json_encode($output);


  }
}


  if (isset($_POST['action'])){
    if ($_POST['action'] == 'fetch_service_record'){

      $query = 'SELECT * FROM tbl_service_record   WHERE EMPID = "'.$_POST['employeeiddb'].'" AND CANCELLED = "N" ';

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
    if ($_POST['action'] == 'approve_leave'){
      $leaveID  = $_POST['leaveID'];

      $chiefremarks = mysqli_real_escape_string($connect,strtoupper($_POST['chiefremarks']));

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

      //$currentDate = date("Y/m/d");
      $dateNow = date("Y-m-d H:i:s");

      /*if (($designation == null) || ($designation == '')){
        $flag = true;
        $message .= 'Designation must not be blank <br>
        ';
      }*/
      //var_dump($_SESSION['divisionid']);
      

      if (!$flag){
        if ($_SESSION['divisionid']=='IMSD'){
          
          $dateAdded = date("Y-m-d H:i:s");
          $que = 'UPDATE tbl_leave
          SET 
          CHIEFREMARKS =  "'.$chiefremarks.'",
          DATEHEADUPDATED = "'.$dateNow.'",
          HEADAPPROVESTATUS = "Y",
          IMSDAPPROVESTATUS = "Y"
  
  
          WHERE ID = "'.$leaveID.'"';
  
          $result = mysqli_query($connect, $que);
        } else { 
          
          $dateAdded = date("Y-m-d H:i:s");
          $que = 'UPDATE tbl_leave
          SET 
          CHIEFREMARKS =  "'.$chiefremarks.'",
          DATEHEADUPDATED = "'.$dateNow.'",
          HEADAPPROVESTATUS = "Y"
  
  
          WHERE ID = "'.$leaveID.'"';
  
          $result = mysqli_query($connect, $que);

        }
       

      }

      $message_final = 'LEAVE APPROVED';

      /*if ($flag){
        $message_final = $message;
      } else {
        $message_final = $message_success;
      }*/
     
      
      /*$output = array(
        'status'    => $message_final
        );*/
      $output = array(
      'status'    => $message_final
      );

      echo json_encode($output);
    }
  }


  if (isset($_POST['action'])){
    if ($_POST['action'] == 'reject_leave'){
      $leaveID  = $_POST['leaveID'];

      $chiefremarks = mysqli_real_escape_string($connect,strtoupper($_POST['chiefremarks']));

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

      //$currentDate = date("Y/m/d");
      $dateNow = date("Y-m-d H:i:s");

      /*if (($designation == null) || ($designation == '')){
        $flag = true;
        $message .= 'Designation must not be blank <br>
        ';
      }*/

      if (!$flag){
        $dateAdded = date("Y-m-d H:i:s");
        $que = 'UPDATE tbl_leave
        SET 
        CHIEFREMARKS =  "'.$chiefremarks.'",
        DATEHEADUPDATED = "'.$dateNow.'",
        HEADAPPROVESTATUS = "N"


        WHERE ID = "'.$leaveID.'"';

        //$result = mysqli_query($connect, $que);

      }

      $message_final = 'LEAVE DISAPPROVED';

      /*if ($flag){
        $message_final = $message;
      } else {
        $message_final = $message_success;
      }*/
     
      
      /*$output = array(
        'status'    => $message_final
        );*/
      $output = array(
      'status'    => $message_final
      );

      echo json_encode($output);
    }
  }

  

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'add_leave'){
      $inclusive_date = implode(",", $_POST["inclusive_date"]);
      $empid  = $_POST['empID'];

      $dateoffilling =  mysqli_real_escape_string($connect,strtoupper($_POST['dateoffilling']));
      $salary =  mysqli_real_escape_string($connect,strtoupper($_POST['salary']));
      $leave_type =  mysqli_real_escape_string($connect,strtoupper($_POST['leave_type']));
      $workingdays =  mysqli_real_escape_string($connect,strtoupper($_POST['workingdays']));



      //var_dump($inclusive_date);
      /*$data = array(
        ':name'						=>	$_POST["name"],
        ':programming_languages'	=>	$programming_languages
      );
      $query = '';*/
        //$query = "INSERT INTO tbl_name (name, programming_languages) VALUES (:name, :programming_languages)";

        $que = 'INSERT INTO `tbl_leave` SET 
        EMPID =  "'.$empid.'",
        LEAVETYPE =  "'.$leave_type.'",
        DATEOFFILLING =  "'.$dateoffilling.'",
        SALARY =  "'.$salary.'",
        WORKINGDAYS =  "'.$workingdays.'",
        INCLUSIVEDATE =  "'.$inclusive_date.'",
        CANCELLED =  "N"
       
        
        '; 

        //var_dump($que);
        $result = mysqli_query($connect,$que); 



        /*
        if ($flag){
          $message_final = $message;
        } else {
          $message_final = $message_success;
        }
      
        $output = array(
        'status'    => $message_final
        );

        echo json_encode($output);*/


    }
  }



  if (isset($_POST['action'])){
    if ($_POST['action'] == 'submit_update_leave'){

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
