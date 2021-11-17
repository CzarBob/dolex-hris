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




if (isset($_POST['action'])){
  if ($_POST['action'] == 'fetch_leave_data'){  
     
      $query = "SELECT * FROM tbl_leave  where  CANCELLED != 'Y' and EMPID = '".$_POST['employeeiddb']."'";

      if(isset($_POST["search"]["value"])){
      $query .= ' AND (DATEOFFILLING LIKE "%'.$_POST["search"]["value"].'%" 
      OR LEAVETYPE LIKE "%'.$_POST["search"]["value"].'%" 
      OR INCUSIVEDATE LIKE "%'.$_POST["search"]["value"].'%"  ) 
      ';
      }
      $query .= ' ORDER BY DATEOFFILLING ASC ';


      //var_dump($query);
      
      $query1 = '';

      /*if($_POST["length"] != -1){
      $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
      }*/

      $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

      $result = mysqli_query($connect, $query . $query1);

      $data = array();
      
      while($row = mysqli_fetch_array($result)){
        
        $sub_array = array();
        $sub_array[] = $row["ID"];
        $sub_array[] = $row["DATEOFFILLING"];
        $sub_array[] = $row["LEAVETYPE"];
        $sub_array[] = $row["INCLUSIVEDATE"];
        //$sub_array[] = $row["HEADAPPROVESTATUS"];
        //$sub_array[] = $row["RDAPPROVESTATUS"];


        if (($row['HEADAPPROVESTATUS'] == 'Y') && ($row['RDAPPROVESTATUS'] == 'PENDING')){
          $sub_array[] = '<p id="applicationstatus" class="text-warning h6"><strong>PENDING</strong></p>';
        } else if (($row['HEADAPPROVESTATUS'] == 'Y') &&($row['RDAPPROVESTATUS'] == 'N' )){
          //$sub_array['approvalstatus'] = 'DISAPPROVED ';
          $sub_array[] = '<p id="applicationstatus" class="text-danger h6"><strong>DISAPPROVED</strong></p>';
        } else if ($row['HEADAPPROVESTATUS'] == 'PENDING') {
          //$sub_array['approvalstatus'] = 'PENDING ';
          $sub_array[] = '<p id="applicationstatus" class="text-warning h6"><strong>PENDING</strong></p>';
        } else if ($row['HEADAPPROVESTATUS'] == 'N') {
          //$sub_array['approvalstatus'] = 'DISAPPROVED ';
          $sub_array[] = '<p id="applicationstatus" class="text-danger h6"><strong>DISAPPROVED</strong></p>';
        } else if (($row['HEADAPPROVESTATUS'] == 'Y') && ($row['RDAPPROVESTATUS'] == 'Y')  ){
          $sub_array[] = '<p id="applicationstatus" class="text-success h6"><strong>APPROVED</strong></p>';
        
        
        } else {
          $sub_array[] = '<p id="applicationstatus" class="text-danger h6"><strong>PENDING </strong></p>';
        }

        
        //$sub_array[] = $row["EMPLOYEEID"];
        /*$sub_array[] = 
        "<form action='adminviewapplicant.php' method='POST'>
                            <input type='hidden' name='tin' value='" . $row["FIRSTNAME"] . "'>
                            <input type='hidden' name='id' value='" . $row["ID"] . "'>
                  <input type='submit' class ='btn btn-sm btn-info btn-block' name ='view' id = 'submit' value ='VIEW (?)'>
                </form> ";*/
              /* $sub_array[] = "<a href='viewEmployee.php?id=".$row['ID']."' data-id='".$row['ID']."'> View</a> / 
                <a href='#addEmployeeForm'  id='custId' data-toggle='modal' data-id='".$row['ID']."'>Delete</a>"; */
                $sub_array[] = "<a href='application_leave_view_only.php?id=".$row['ID']."' data-id='".$row['ID']."'> <button type='button' class='btn btn-info btn-sm'>View</button></a></a> ";  

        $data[] = $sub_array;
      }



      $output = array(
      //"draw"    => intval($_POST["draw"]),
      //"employeeTotal"  =>  get_all_employee_data($connect),
      //"recordsFiltered" => $number_filter_row,

      "data"    => $data
      );

      echo json_encode($output);

  }
}

















if (isset($_POST['action'])){
  if ($_POST['action'] == 'fetch_leave_application'){
    $query = 'SELECT tbl_employee.EMPLOYEEID as EMPLOYEEID, tbl_employee.FIRSTNAME as FIRSTNAME, tbl_employee.MIDDLENAME as MIDDLENAME, tbl_employee.LASTNAME as LASTNAME, tbl_employee.EXTENSION as PROFILE_EXTENSION, tbl_employee.POSITION as POSITION,  tbl_employee.FIELDOFFICEID as FIELDOFFICEID, tbl_employee.DIVISIONID as DIVISIONID FROM tbl_employee where tbl_employee.ID = "'.$_POST["loginID"].'" ';

    //var_dump($query);

    //$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

    $result = mysqli_query($connect, $query);
    
    $data = array();
    if($result){
      while($row = mysqli_fetch_array($result)){
        
        $sub_array = array();

        $sub_array['employeeid'] = $row['EMPLOYEEID'];
        $sub_array['office'] = $row['FIELDOFFICEID'];
        $sub_array['division'] = $row['DIVISIONID'];
        $sub_array['firstname'] = $row['FIRSTNAME'];
        $sub_array['middlename'] = $row['MIDDLENAME'];
        $sub_array['lastname'] = $row['LASTNAME'];
        $sub_array['extension'] = $row['PROFILE_EXTENSION'];
        $sub_array['position'] = $row['POSITION'];

        


        $data[] = $sub_array;
        
      }
    }



    $dateNow = date("Y-m-d H:i:s");

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
    if ($_POST['action'] == 'add_leave'){


      $inclusive_date = implode(",", $_POST["inclusive_date"]);
      $empid  = $_POST['empID'];

      $dateoffilling =  mysqli_real_escape_string($connect,strtoupper($_POST['dateoffilling']));
      $salary =  mysqli_real_escape_string($connect,strtoupper($_POST['salary']));
      $leave_type =  mysqli_real_escape_string($connect,strtoupper($_POST['leave_type']));
      $workingdays =  mysqli_real_escape_string($connect,strtoupper($_POST['workingdays']));
      $attachment =  mysqli_real_escape_string($connect,strtoupper($_POST['attachment']));
      $applicantremarks =  mysqli_real_escape_string($connect,strtoupper($_POST['applicantremarks']));
      
      if(isset($_POST['partone'])){
        $partone =  mysqli_real_escape_string($connect,strtoupper($_POST['partone']));
      } else {
        $partone= "";
      }
      if(isset($_POST['parttwo'])){
        $parttwo =  mysqli_real_escape_string($connect,strtoupper($_POST['parttwo']));
      } else {
        $parttwo = "";
      }
      if(isset($_POST['partthree'])){
        $partthree =  mysqli_real_escape_string($connect,strtoupper($_POST['partthree']));
      } else {
        $partthree = "";
      }
      if(isset($_POST['partfour'])){
        $partfour =  mysqli_real_escape_string($connect,strtoupper($_POST['partfour']));
      } else {
        $partfour = "";
      }

      if(isset($_POST['partfive'])){
        $partfive =  mysqli_real_escape_string($connect,strtoupper($_POST['partfive']));
      } else {
        $partfive = "";
      }
      if(isset($_POST['partsix'])){
        $partsix =  mysqli_real_escape_string($connect,strtoupper($_POST['partsix']));
      } else {
        $partsix = "";
      }
      
      


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
        APPLICANTREMARKS = "'.$applicantremarks.'",
        ATTACHMENT = "'.$attachment.'",
        PARTONE = "'.$partone.'",
        PARTTWO = "'.$parttwo.'",
        PARTTHREE = "'.$partthree.'",
        PARTFOUR = "'.$partfour.'",
        PARTFIVE = "'.$partfive.'",
        PARTSIX = "'.$partsix.'",
        CANCELLED =  "N"
       
        
        '; 

        //var_dump($que);
        $result = mysqli_query($connect,$que); 


        $message_final = 'LEAVE APPLIED';

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
