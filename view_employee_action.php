<?php 
//session_start();
include "dbConnection.php";
$columns = array('process', 'rating','fullname', 'email', 'comment',  'date_submitted');
session_start();
date_default_timezone_set('Asia/Manila');


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

    $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

    $result = mysqli_query($connect, $query);

    $data = array();
    
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

    /*$queProfile = "INSERT INTO `tbl_employee_profile` SET 
    EMPID = '".$empid."'
    "; 
  
    $query = $connect->query($queProfile) or die($connect->error); 
  */

    $query_profile = 'SELECT * FROM tbl_employee_profile WHERE EMPID = "'.$_POST["employeeiddb"].'" ';
    $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query_profile));
    //var_dump($number_filter_row);
    $dateNow = date("Y-m-d H:i:s");
    if($number_filter_row == 0){
      $queProfile = "INSERT INTO `tbl_employee_profile` SET 
      EMPID = '".$_POST["employeeiddb"]."',
      UPDATEDBY = '".$usernameid."',
      UPDATEDDATETIME = '".$dateNow."'
      "; 
      //var_dump($queProfile);
      $query = $connect->query($queProfile) or die($connect->error); 
    }


    $result_query_profile = mysqli_query($connect, $query_profile);

    $data_profile = array();
    
    while($row = mysqli_fetch_array($result_query_profile)){
  
      $sub_array_query_profile = array();
      $sub_array_query_profile['id']                 = $row['ID'];
      $sub_array_query_profile['empid']                = $row['EMPID'];
      $sub_array_query_profile['dob']                 = $row['DOB'];
      $sub_array_query_profile['placeofbirth']        = $row['PLACEOFBIRTH'];
      $sub_array_query_profile['gender']              = $row['GENDER'];
      $sub_array_query_profile['civilstatus']         = $row['CIVILSTATUS'];
      $sub_array_query_profile['height']              = $row['HEIGHT'];
      $sub_array_query_profile['weight']              = $row['WEIGHT'];
      $sub_array_query_profile['bloodtype']           = $row['BLOODTYPE'];
      $sub_array_query_profile['gsisno']              = $row['GSISNO'];
      $sub_array_query_profile['pagibigno']           = $row['PAGIBIGNO'];
      $sub_array_query_profile['phicno']              = $row['PHICNO'];
      $sub_array_query_profile['sssno']               = $row['SSSNO'];
      $sub_array_query_profile['tinno']               = $row['TINNO'];
      $sub_array_query_profile['agencyemployeeno']    = $row['AGENCYEMPLOYEENO'];
      $sub_array_query_profile['citizenship']         = $row['CITIZENSHIP'];
      $sub_array_query_profile['dualcitizen']         = $row['DUALCITIZEN'];
      $sub_array_query_profile['residentialaddress']  = $row['RESIDENTIALADDRESS'];
      $sub_array_query_profile['permanentaddress']    = $row['PERMANENTADDRESS'];
      $sub_array_query_profile['telephoneno']         = $row['TELEPHONENO'];
      $sub_array_query_profile['mobileno']            = $row['MOBILENO'];
      $sub_array_query_profile['email']               = $row['EMAIL'];
      
      
      
      $data_profile[] = $sub_array_query_profile;
    }


    $query_family = 'SELECT * FROM tbl_employee_family WHERE EMPID = "'.$_POST["employeeiddb"].'" ';
    $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query_family));

    $dateNow = date("Y-m-d H:i:s");

    if ($number_filter_row == 0){
      $queProfile = "INSERT INTO `tbl_employee_family` SET 
      EMPID = '".$_POST["employeeiddb"]."',
      UPDATEDBY = '".$usernameid."',
      UPDATEDDATETIME = '".$dateNow."'
      "; 
    
      $query = $connect->query($queProfile) or die($connect->error); 
    }


    $result_query_family = mysqli_query($connect, $query_family);

    $data_family = array();
    
    while($row = mysqli_fetch_array($result_query_family)){
      $sub_array_query_family = array();
      $sub_array_query_family['id']                           = $row['ID'];
      $sub_array_query_family['empid']                        = $row['EMPID'];
      $sub_array_query_family['spouselastname']               = $row['SPOUSELASTNAME'];
      $sub_array_query_family['spousemiddlename']             = $row['SPOUSEMIDDLENAME'];
      $sub_array_query_family['spousefirstname']              = $row['SPOUSEFIRSTNAME'];
      $sub_array_query_family['spouseextension']              = $row['SPOUSEEXTENSION'];
      $sub_array_query_family['occupation']                   = $row['OCCUPATION'];
      $sub_array_query_family['employername']                 = $row['EMPLOYERNAME'];
      $sub_array_query_family['businessaddress']              = $row['BUSINESSADDRESS'];
      $sub_array_query_family['spousetelno']                  = $row['SPOUSETELNO'];
      $sub_array_query_family['fathersurname']                = $row['FATHERSURNAME'];
      $sub_array_query_family['fatherfirstname']              = $row['FATHERFIRSTNAME'];
      $sub_array_query_family['fathermiddlename']             = $row['FATHERMIDDLENAME'];
      $sub_array_query_family['fatherext']                    = $row['FATHEREXT'];
      $sub_array_query_family['mothermaidenname']             = $row['MOTHERMAIDENNAME'];
      $sub_array_query_family['mothersurname']                = $row['MOTHERSURNAME'];
      $sub_array_query_family['motherfirstname']              = $row['MOTHERFIRSTNAME'];
      $sub_array_query_family['mothermiddlename']             = $row['MOTHERMIDDLENAME'];
      $data_family[] = $sub_array_query_family;
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
    //cho json_encode($sub_array);
  }
}


  if (isset($_POST['action'])){
    if ($_POST['action'] == 'fetch_single_personal_details'){
      $query = 'SELECT 
      tbl_employee.ID as ID,
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

      $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

      //print_r($query);
      $result = mysqli_query($connect, $query);

      $data = array();
      
      while($row = mysqli_fetch_array($result)){
        $sub_array = array();
     
        $sub_array['employeeid']  = $row['EMPLOYEEID'];
        $sub_array['firstname']   = $row['FIRSTNAME'];
        $sub_array['middlename']  = $row['MIDDLENAME'];
        $sub_array['lastname']    = $row['LASTNAME'];
        $sub_array['extension'] = $row['PROFILE_EXTENSION'];
        $sub_array['position'] = $row['POSITION'];
        $sub_array['datehired'] = $row['DATEHIRED'];
        $sub_array['username'] = $row['USERNAME'];
        $sub_array['password'] = $row['PASSWORD_ACCOUNT'];
        $sub_array['slcredit'] = $row['SLCREDIT'];
        $sub_array['vlcredit'] = $row['VLCREDIT'];
        $data[] = $sub_array;
      }

      $query_profile = 'SELECT * FROM tbl_employee_profile WHERE EMPID = "'.$_POST["employeeiddb"].'" ';
      $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query_profile));
      if($number_filter_row == 0){
        $queProfile = "INSERT INTO `tbl_employee_profile` SET 
        EMPID = '".$_POST["employeeiddb"]."'
        "; 
        //var_dump($queProfile);
        $query = $connect->query($queProfile) or die($connect->error); 
      }


      $result_query_profile = mysqli_query($connect, $query_profile);

      $data_profile = array();
      
      while($row = mysqli_fetch_array($result_query_profile)){
    
        $sub_array_query_profile = array();

        $sub_array_query_profile['empid']                = $row['EMPID'];
        $sub_array_query_profile['dob']                 = $row['DOB'];
        $sub_array_query_profile['placeofbirth']        = $row['PLACEOFBIRTH'];
        $sub_array_query_profile['gender']              = $row['GENDER'];
        $sub_array_query_profile['civilstatus']         = $row['CIVILSTATUS'];
        $sub_array_query_profile['height']              = $row['HEIGHT'];
        $sub_array_query_profile['weight']              = $row['WEIGHT'];
        $sub_array_query_profile['bloodtype']           = $row['BLOODTYPE'];
        $sub_array_query_profile['gsisno']              = $row['GSISNO'];
        $sub_array_query_profile['pagibigno']           = $row['PAGIBIGNO'];
        $sub_array_query_profile['phicno']              = $row['PHICNO'];
        $sub_array_query_profile['sssno']               = $row['SSSNO'];
        $sub_array_query_profile['tinno']               = $row['TINNO'];
        $sub_array_query_profile['agencyemployeeno']    = $row['AGENCYEMPLOYEENO'];
        $sub_array_query_profile['citizenship']         = $row['CITIZENSHIP'];
        $sub_array_query_profile['dualcitizen']         = $row['DUALCITIZEN'];
        $sub_array_query_profile['residentialaddress']  = $row['RESIDENTIALADDRESS'];
        $sub_array_query_profile['permanentaddress']    = $row['PERMANENTADDRESS'];
        $sub_array_query_profile['telephoneno']         = $row['TELEPHONENO'];
        $sub_array_query_profile['mobileno']            = $row['MOBILENO'];
        $sub_array_query_profile['email']               = $row['EMAIL'];
        $data_profile[] = $sub_array_query_profile;
      }




      $a = array();
      $b = array();
      


      if(isset($sub_array)){
        $a = $sub_array;
      } 
      if(isset($sub_array_query_profile)){
        $b = $sub_array_query_profile;
      } 
      
      $output = array(
      "data"    => $a,
      "data_profile"    => $b
      );

      echo json_encode($output);

    }
  }


  if (isset($_POST['action'])){
    if ($_POST['action'] == 'fetch_single_family_background'){
      $query_family = 'SELECT * FROM tbl_employee_family WHERE EMPID = "'.$_POST["employeeiddb"].'" ';
      $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query_family));

      if ($number_filter_row == 0){
        $que = "INSERT INTO `tbl_employee_family` SET 
        EMPID = '".$_POST["employeeiddb"]."'
        "; 
      
        $query = $connect->query($que) or die($connect->error); 
      }


      $result_query_family = mysqli_query($connect, $query_family);

      $data_family = array();
      
      while($row = mysqli_fetch_array($result_query_family)){
        $sub_array_query_family = array();
        $sub_array_query_family['id']                           = $row['ID'];
        $sub_array_query_family['empid']                        = $row['EMPID'];
        $sub_array_query_family['spouselastname']               = $row['SPOUSELASTNAME'];
        $sub_array_query_family['spousemiddlename']             = $row['SPOUSEMIDDLENAME'];
        $sub_array_query_family['spousefirstname']              = $row['SPOUSEFIRSTNAME'];
        $sub_array_query_family['spouseextension']              = $row['SPOUSEEXTENSION'];
        $sub_array_query_family['occupation']                   = $row['OCCUPATION'];
        $sub_array_query_family['employername']                 = $row['EMPLOYERNAME'];
        $sub_array_query_family['businessaddress']              = $row['BUSINESSADDRESS'];
        $sub_array_query_family['spousetelno']                  = $row['SPOUSETELNO'];
        $sub_array_query_family['fathersurname']                = $row['FATHERSURNAME'];
        $sub_array_query_family['fatherfirstname']              = $row['FATHERFIRSTNAME'];
        $sub_array_query_family['fathermiddlename']             = $row['FATHERMIDDLENAME'];
        $sub_array_query_family['fatherext']                    = $row['FATHEREXT'];
        $sub_array_query_family['mothermaidenname']             = $row['MOTHERMAIDENNAME'];
        $sub_array_query_family['mothersurname']                = $row['MOTHERSURNAME'];
        $sub_array_query_family['motherfirstname']              = $row['MOTHERFIRSTNAME'];
        $sub_array_query_family['mothermiddlename']             = $row['MOTHERMIDDLENAME'];
        $data_family[] = $sub_array_query_family;
      }

      $c = array();

 
      if(isset($sub_array_query_family)){
        $c = $sub_array_query_family;
      } 
      $output = array(

      "data_family"    => $c
      );

      echo json_encode($output);
      //cho json_encode($sub_array);


    }
  }

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'fetch_children'){

      $query = 'SELECT * FROM tbl_employee_children WHERE EMPID = "'.$_POST['employeeiddb'].'" AND CANCELLED = "N" ';

     // var_dump($query);
      $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
      
      $result = mysqli_query($connect, $query );
      
      $data = array();

      if ($result) {
        while($row = mysqli_fetch_array($result)){
          /*if($_SESSION['received_by'] == "Receiving"){
            $rel = $row["date_sent"];
          }
          else{
            $rel = $row["date_released"];
          }
          $timestamp = $row["date_received"];
          $delta_time = strtotime($rel) - strtotime($timestamp);
          $days = floor($delta_time / 86400);
          $delta_time %= 86400;
          $hours = floor($delta_time / 3600);
          $delta_time %= 3600;
          $minutes = floor($delta_time / 60);
          $delta_time %= 60;
          $seconds = floor($delta_time / 1);
          $time_cycle = "";
          if($days==0){$dd = "";}else{if($days>1){$dd = "{$days} days";}else{$dd = "{$days} day";}}
          if($hours==0){$hh = "";}else{if($hours>1){$hh = "{$hours} hours";}else{$hh = "{$hours} hour";}}
          if($minutes==0){$mm = "";}else{if($minutes>1){$mm = "{$minutes} minutes";}else{$mm = "{$minutes} minute";}}
          if($days!=0){$time_cycle = $dd." ".$hh;}else{$time_cycle = $hh." ".$mm." {$seconds} seconds";}
          if(strlen($row["description"]) >= 25){
            $description = "<a style = 'color:#0893b8;' class ='fas fa-info-circle' data-toggle='tooltip' title='".$row["description"]."'></a> ". $row["description"];
          }
          else{
             $description = $row["description"];
          }
          if(strlen($row["type"]) >= 25){
            $type = "<a style = 'color:#0893b8;' class ='fas fa-info-circle' data-toggle='tooltip' title='".$row["type"]."'></a> ". $row["type"];
          }
          else{
             $type = $row["type"];
          }
        */
          $sub_array = array();
          $sub_array[] = $row["FULLNAME"];
          $sub_array[] = $row["DOB"];
        
          //$sub_array[] = $row["EMPLOYEEID"];
          /*$sub_array[] = 
          "<form action='adminviewapplicant.php' method='POST'>
                              <input type='hidden' name='tin' value='" . $row["FIRSTNAME"] . "'>
                              <input type='hidden' name='id' value='" . $row["ID"] . "'>
                    <input type='submit' class ='btn btn-sm btn-info btn-block' name ='view' id = 'submit' value ='VIEW (?)'>
                  </form> ";*/
          // $sub_array[] = "<a href='employee_detail.php'  id='ID' data-toggle='modal' data-id='".$row['ID']."'>View</a> / 
                  //$sub_array[] = "<a href='viewEmployee.php?id=".$row['ID']."' data-id='".$row['ID']."'> HERE</a> /  
  
                  //<button type='button' name='update_children' class='btn btn-warning btn-sm update_children' data-toggle='modal' data-target='#modalChildrenForm' data-id='".$row['ID']."'>Update</button>  
                  $sub_array[] = "
                  
                  <button type='button' name='update_children' class='btn btn-warning btn-sm update_children'  data-id='".$row['ID']."'>View</button>
                  <button type='button' name='delete_children' class='btn btn-danger btn-sm delete_children' data-id='".$row['ID']."'>Delete</button>";  
                //<a data-toggle='modal' id = 'delete-children' data-id='".$row['ID']."'>Delete</a>
        
    
          $data[] = $sub_array;
        }
      }
       
      
 
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
    //var_dump($_POST['action']);
    if ($_POST['action'] == 'fetch_educ'){

      $query = 'SELECT * FROM tbl_employee_educ_background WHERE EMPID = "'.$_POST['employeeiddb'].'" AND CANCELLED = "N" ';

      //var_dump($query);
      //$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
      
      $result = mysqli_query($connect, $query);
      
      $data = array();
      if($result){
        while($row = mysqli_fetch_array($result)){
        
          $sub_array = array();
          $sub_array[] = $row["LEVEL"];
          $sub_array[] = $row["SCHOOLNAME"];
          $sub_array[] = $row["BASICEDUCATION"];
          $sub_array[] = $row["PERIODFROM"];
          $sub_array[] = $row["PERIODTO"];
          $sub_array[] = $row["HIGHESTLEVEL"];
          $sub_array[] = $row["YEARGRADUATED"];
          $sub_array[] = $row["HONORRECEIVED"];
          $sub_array[] = "
          
          <button type='button' name='update_educ' class='btn btn-warning btn-sm update_educ'  data-id='".$row['ID']."'>View</button>
          <button type='button' name='delete_educ' class='btn btn-danger btn-sm delete_educ' data-id='".$row['ID']."'>Delete</button>";  
          //<a data-toggle='modal' id = 'delete-children' data-id='".$row['ID']."'>Delete</a>
          $data[] = $sub_array;
        }

      } else {
        $sub_array = array();
        $data[] = $sub_array;
      }
      
      

      
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
    //var_dump($_POST['action']);
    if ($_POST['action'] == 'fetch_eligibility'){

      $query = 'SELECT * FROM tbl_employee_civil_service WHERE EMPID = "'.$_POST['employeeiddb'].'" AND CANCELLED = "N" ';

      //var_dump($query);
      $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
      
      $result = mysqli_query($connect, $query );
      
      $data = array();
       
      while($row = mysqli_fetch_array($result)){
        
        $sub_array = array();
        $sub_array[] = $row["ELIGIBILITY"];
        $sub_array[] = $row["RATING"];
        $sub_array[] = $row["DATEOFEXAM"];
        $sub_array[] = $row["PLACEOFEXAM"];
        $sub_array[] = $row["LICENSENUMBER"];
        $sub_array[] = $row["LICENSEDATEOFVALIDITY"];
        $sub_array[] = "
        
        <button type='button' name='update_civil' class='btn btn-warning btn-sm update_eligibility'  data-id='".$row['ID']."'>View</button>
        <button type='button' name='delete_civil' class='btn btn-danger btn-sm delete_eligibility' data-id='".$row['ID']."'>Delete</button>";  
        //<a data-toggle='modal' id = 'delete-children' data-id='".$row['ID']."'>Delete</a>
        $data[] = $sub_array;
      }
      
     
      //$_SESSION['query2'] = $data;
      
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
    //var_dump($_POST['action']);
    if ($_POST['action'] == 'fetch_work'){

      $query = 'SELECT * FROM tbl_employee_work_experience WHERE EMPID = "'.$_POST['employeeiddb'].'" AND CANCELLED = "N" ';

      
      $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
      
      $result = mysqli_query($connect, $query );
      
      $data = array();
       
      while($row = mysqli_fetch_array($result)){
        
        $sub_array = array();
        $sub_array[] = $row["DATEFROM"];
        $sub_array[] = $row["DATETO"];
        $sub_array[] = $row["POSITION"];
        $sub_array[] = $row["COMPANY"];
        $sub_array[] = $row["MONTHLYSALARY"];
        $sub_array[] = $row["GRADE"];
        $sub_array[] = $row["STATUS"];
        $sub_array[] = $row["GOVTSERVICE"];
        $sub_array[] = "
        
        <button type='button' name='update_work' class='btn btn-warning btn-sm update_work'  data-id='".$row['ID']."'>View</button>
        <button type='button' name='delete_work' class='btn btn-danger btn-sm delete_work' data-id='".$row['ID']."'>Delete</button>";  
        //<a data-toggle='modal' id = 'delete-children' data-id='".$row['ID']."'>Delete</a>
        $data[] = $sub_array;
      }
      
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
    //var_dump($_POST['action']);
    if ($_POST['action'] == 'fetch_volwork'){

      $query = 'SELECT * FROM tbl_employee_voluntary_work WHERE EMPID = "'.$_POST['employeeiddb'].'" AND CANCELLED = "N" ';

      
      //$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
      
      $result = mysqli_query($connect, $query );
      
      $data = array();
      if($result){
        while($row = mysqli_fetch_array($result)){
        
          $sub_array = array();
          $sub_array[] = $row["ORGANIZATION"];
          $sub_array[] = $row["DATEFROM"];
          $sub_array[] = $row["DATETO"];
          $sub_array[] = $row["NOOFHOURS"];
          $sub_array[] = $row["POSITION"];
          $sub_array[] = "
          
          <button type='button' name='update_volwork' class='btn btn-warning btn-sm update_volwork'  data-id='".$row['ID']."'>View</button>
          <button type='button' name='delete_volwork' class='btn btn-danger btn-sm delete_volwork' data-id='".$row['ID']."'>Delete</button>";  
          $data[] = $sub_array;
        }
      }
      
      
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
    //var_dump($_POST['action']);
    if ($_POST['action'] == 'fetch_landd'){

      $query = 'SELECT * FROM tbl_employee_ld WHERE EMPID = "'.$_POST['employeeiddb'].'" AND CANCELLED = "N" ';

      
      //$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
      
      $result = mysqli_query($connect, $query );
      
      $data = array();
      if($result){
        while($row = mysqli_fetch_array($result)){
          
          $sub_array = array();
          $sub_array[] = $row["PROGRAM"];
          $sub_array[] = $row["DATEFROM"];
          $sub_array[] = $row["DATETO"];
          $sub_array[] = $row["NOOFHOURS"];
          $sub_array[] = $row["TYPE"];
          $sub_array[] = $row["SPONSOREDBY"];
          $sub_array[] = "
          
          <button type='button' name='update_landd' class='btn btn-warning btn-sm update_landd'  data-id='".$row['ID']."'>View</button>
          <button type='button' name='delete_landd' class='btn btn-danger btn-sm delete_landd' data-id='".$row['ID']."'>Delete</button>";  
          $data[] = $sub_array;
        }
      }
      
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
    if ($_POST['action'] == 'fetch_other_skill'){

      $query = 'SELECT * FROM tbl_employee_other_skills WHERE EMPID = "'.$_POST['employeeiddb'].'" AND CANCELLED = "N" ';

      
      //$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
      
      $result = mysqli_query($connect, $query );
      
      $data = array();
      if($result){
        while($row = mysqli_fetch_array($result)){
          
          $sub_array = array();
          $sub_array[] = $row["SKILLS"];
          $sub_array[] = "
          
          
          <button type='button' name='delete_other_skill' class='btn btn-danger btn-sm delete_other_skill' data-id='".$row['ID']."'>Delete</button>";  
          $data[] = $sub_array;
        }
      }
      
      $output = array(
       "data"    => $data
      );
      
      echo json_encode($output);
    }
  }

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'fetch_other_recognition'){

      $query = 'SELECT * FROM tbl_employee_other_recognition WHERE EMPID = "'.$_POST['employeeiddb'].'" AND CANCELLED = "N" ';

      
      //$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
      
      $result = mysqli_query($connect, $query );
      
      $data = array();
      if($result){
        while($row = mysqli_fetch_array($result)){
          
          $sub_array = array();
          $sub_array[] = $row["RECOGNITION"];
          $sub_array[] = "
          
        
          <button type='button' name='delete_other_recognition' class='btn btn-danger btn-sm delete_other_recognition' data-id='".$row['ID']."'>Delete</button>";  
          $data[] = $sub_array;
        }
      }
      
      $output = array(
       "data"    => $data
      );
      
      echo json_encode($output);
    }
  }

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'fetch_other_membership'){

      $query = 'SELECT * FROM tbl_employee_other_membership WHERE EMPID = "'.$_POST['employeeiddb'].'" AND CANCELLED = "N" ';

      
      //$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
      
      $result = mysqli_query($connect, $query );
      
      $data = array();
      if($result){ 
        while($row = mysqli_fetch_array($result)){
          
          $sub_array = array();
          $sub_array[] = $row["MEMBERSHIP"];
          $sub_array[] = "
          <button type='button' name='delete_other_membership' class='btn btn-danger btn-sm delete_other_membership' data-id='".$row['ID']."'>Delete</button>";  
          $data[] = $sub_array;
        }
      }
      
      $output = array(
       "data"    => $data
      );
      echo json_encode($output);
    }
  }


  if (isset($_POST['action'])){
    if ($_POST['action'] == 'fetch_attachment'){

      $query = 'SELECT * FROM tbl_employee_attachment WHERE EMPID = "'.$_POST['employeeiddb'].'" AND CANCELLED = "N" ';
      //$query = 'SELECT * FROM tbl_employee_attachment ';

      
      //$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
      
      $result = mysqli_query($connect, $query );
      
      $data = array();
      if($result){ 
        while($row = mysqli_fetch_array($result)){
          
          $sub_array = array();
          $sub_array[] = $row["FILENAME"];
          $sub_array[] = "
          <a href='".$row['LOCATION']."'><button type='button' class='btn btn-info btn-sm'>Download</button></a>
          <button type='button' name='delete_other_membership' class='btn btn-danger btn-sm delete_other_membership' data-id='".$row['ID']."'>Delete</button>";  
          $data[] = $sub_array;
        }
      }
      
      $output = array(
       "data"    => $data
      );
      echo json_encode($output);
    }
  }

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'add_children'){

        $fullname = mysqli_real_escape_string($connect, $_POST['fullname']);
        $dob = mysqli_real_escape_string($connect,$_POST['dob']);
        $empid  = mysqli_real_escape_string($connect,$_POST['employeeiddb']);


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

        if (($fullname == null) || ($fullname == '') || (preg_match('~[0-9]+~', $fullname))){
          $flag = true;
          $message .= 'Name must not be blank or must be in correct format <br>
          ';
        }

        if (($dob == null) || ($dob == '') || ($dob>= $currentDate)){
          $flag = true;
          $message .= 'Date of Birth must not be blank or must be in correct format <br>
          ';
        }

        if (!$flag){

          $dateAdded = date("Y-m-d H:i:s");
          $que = "INSERT INTO `tbl_employee_CHILDREN` SET 
          EMPID = '".$empid."',
          FULLNAME = '".$fullname."',
          DOB = '".$dob."',
          CANCELLED = 'N'
          "; 
          $query = $connect->query($que) or die($connect->error);

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
    if ($_POST['action'] == 'add_educ'){
        
      $level                  = mysqli_real_escape_string($connect,$_POST['level']);
      $school_name            =  mysqli_real_escape_string($connect, $_POST['school_name']);
      $empid                  = mysqli_real_escape_string($connect,$_POST['employeeiddb']);
      $educ                   =  mysqli_real_escape_string($connect, $_POST['educ']);
      $attended_from          = mysqli_real_escape_string($connect,$_POST['attended_from']);
      $attended_to            = mysqli_real_escape_string($connect,$_POST['attended_to']);
      $highest_level               =  mysqli_real_escape_string($connect, $_POST['highest_level']);
      $year_grad          = mysqli_real_escape_string($connect,$_POST['year_grad']);
      $honor_received         =  mysqli_real_escape_string($connect, $_POST['honor_received']);
      
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

      if (($level == null) || ($level == '') || ($level == 'NA')){
        $flag = true;
        $message .= 'Educational Level must not be blank <br>
        ';
      }

      if (($school_name == null) || ($school_name == '')){
        $flag = true;
        $message .= 'School Name must not be blank<br>
        ';
      }

      if (!$flag){
        $dateAdded = date("Y-m-d H:i:s");
        $que = "INSERT INTO `tbl_employee_educ_background` SET 
        EMPID = '".$empid."',
        LEVEL = '".$level."',
        SCHOOLNAME = '".$school_name."',
        BASICEDUCATION = '".$educ."',
        PERIODFROM = '".$attended_from."',
        PERIODTO = '".$attended_to."',
        HIGHESTLEVEL = '".$highest_level."',
        YEARGRADUATED = '".$year_grad."',
        HONORRECEIVED = '".$honor_received."',
        CANCELLED = 'N'
        "; 
        $query = $connect->query($que) or die($connect->error); 
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
    if ($_POST['action'] == 'add_eligibility'){
        
        $empid                        = mysqli_real_escape_string($connect,$_POST['employeeiddb']);
        $eligibility                  = mysqli_real_escape_string($connect,$_POST['eligibility']);
        $rating                       = mysqli_real_escape_string($connect,$_POST['rating']);
        $date_of_exam                 = mysqli_real_escape_string($connect,$_POST['date_of_exam']);
        $place_of_exam                = mysqli_real_escape_string($connect,$_POST['place_of_exam']);
        $license_no                   = mysqli_real_escape_string($connect,$_POST['license_no']);
        $license_date                 = mysqli_real_escape_string($connect,$_POST['license_date']);

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
  
        if (($eligibility == null) || ($eligibility == '')){
          $flag = true;
          $message .= 'Eligibility must not be blank <br>
          ';
        }

        if (!$flag){
          $que_eligibility = "INSERT INTO `tbl_employee_civil_service` SET 
          EMPID = '".$empid."',
          ELIGIBILITY = '".$eligibility."',
          RATING = '".$rating."',
          DATEOFEXAM = '".$date_of_exam."',
          PLACEOFEXAM = '".$place_of_exam."',
          LICENSENUMBER = '".$license_no."',
          LICENSEDATEOFVALIDITY = '".$license_date."',
          CANCELLED = 'N'"; 
          $query = $connect->query($que_eligibility) or die($connect->error);
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
    if ($_POST['action'] == 'add_work'){
        
        $empid                  =  mysqli_real_escape_string($connect,$_POST['employeeiddb']);
        $work_date_from                  =  mysqli_real_escape_string($connect,$_POST['work_date_from']);
        $work_date_to            =  mysqli_real_escape_string($connect,$_POST['work_date_to']);
        $work_position                  =  mysqli_real_escape_string($connect,$_POST['work_position']);
        $work_company                   =  mysqli_real_escape_string($connect,$_POST['work_company']);
        $work_salary          =  mysqli_real_escape_string($connect,$_POST['work_salary']);
        $work_salary_grade            =  mysqli_real_escape_string($connect,$_POST['work_salary_grade']);
        $work_status          =  mysqli_real_escape_string($connect,$_POST['work_status']);
        $work_govt_service            =  mysqli_real_escape_string($connect,$_POST['work_govt_service']);

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
  
        if (($work_position == null) || ($work_position == '')){
          $flag = true;
          $message .= 'Work Position must not be blank <br>
          ';
        }

        if (!$flag){
          $que_work_exp = "INSERT INTO `tbl_employee_work_experience` SET 
          EMPID = '".$empid."',
          DATEFROM = '".$work_date_from."',
          DATETO = '".$work_date_to."',
          POSITION = '".$work_position."',
          COMPANY = '".$work_company."',
          MONTHLYSALARY = '".$work_salary."',
          GRADE = '".$work_salary_grade."',
          STATUS = '".$work_status."',
          GOVTSERVICE = '".$work_govt_service."',

          CANCELLED = 'N'"; 
          $query = $connect->query($que_work_exp) or die($connect->error); 
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
    if ($_POST['action'] == 'add_volwork'){
        
        $empid                  = mysqli_real_escape_string($connect,$_POST['employeeiddb']);
        $volwork_organization                  = mysqli_real_escape_string($connect,$_POST['volwork_organization']);
        $volwork_date_from            = mysqli_real_escape_string($connect,$_POST['volwork_date_from']);
        $volwork_date_to                  = mysqli_real_escape_string($connect,$_POST['volwork_date_to']);
        $volwork_nohours                   = mysqli_real_escape_string($connect,$_POST['volwork_nohours']);
        $volwork_position          = mysqli_real_escape_string($connect,$_POST['volwork_position']);
        
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
  
        if (($volwork_organization == null) || ($volwork_organization == '')){
          $flag = true;
          $message .= 'Organization/Company must not be blank <br>
          ';
        }

        if (!$flag){
          $dateAdded = date("Y-m-d H:i:s");
          $que_vol_work = "INSERT INTO `tbl_employee_voluntary_work` SET 
          EMPID = '".$empid."',
          ORGANIZATION = '".$volwork_organization."',
          DATEFROM = '".$volwork_date_from."',
          DATETO = '".$volwork_date_to."',
          NOOFHOURS = '".$volwork_nohours."',
          POSITION = '".$volwork_position."',
          CANCELLED = 'N'"; 

          //var_dump($que);
          $query = $connect->query($que_vol_work) or die($connect->error); 
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
    if ($_POST['action'] == 'add_landd'){
        
        $empid                  = mysqli_real_escape_string($connect,$_POST['employeeiddb']);
        $landd_program                  =  mysqli_real_escape_string($connect, $_POST['landd_program']);
        $landd_date_from            = mysqli_real_escape_string($connect,$_POST['landd_date_from']);
        $landd_date_to                  = mysqli_real_escape_string($connect,$_POST['landd_date_to']);
        $landd_nohours                   = mysqli_real_escape_string($connect,$_POST['landd_nohours']);
        $landd_type          =  mysqli_real_escape_string($connect, $_POST['landd_type']);
        $landd_sponsoredby          =  mysqli_real_escape_string($connect, $_POST['landd_sponsoredby']);

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
  
        if (($landd_program == null) || ($landd_program == '')){
          $flag = true;
          $message .= 'Program must not be blank <br>
          ';
        }

        if (!$flag){
          $dateAdded = date("Y-m-d H:i:s");
          $que_lad = "INSERT INTO `tbl_employee_ld` SET 
          EMPID = '".$empid."',
          PROGRAM = '".$landd_program."',
          DATEFROM = '".$landd_date_from."',
          DATETO = '".$landd_date_to."',
          NOOFHOURS = '".$landd_nohours."',
          TYPE = '".$landd_type."',
          SPONSOREDBY = '".$landd_sponsoredby."',
          CANCELLED = 'N'"; 

          //var_dump($que);
          $query = $connect->query($que_lad) or die($connect->error);
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
    if ($_POST['action'] == 'add_other_skill'){
        
        $empid                      = mysqli_real_escape_string($connect, $_POST['employeeiddb']);
        $other_skill                = mysqli_real_escape_string($connect, $_POST['other_skill']);
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
  
        if (($other_skill == null) || ($other_skill == '')){
          $flag = true;
          $message .= 'Field must not be blank <br>
          ';
        }

        if (!$flag){

        $dateAdded = date("Y-m-d H:i:s");
        $que_other_skills = "INSERT INTO `tbl_employee_other_skills` SET 
        EMPID = '".$empid."',
        SKILLS = '".$other_skill."',
        CANCELLED = 'N'"; 

        //var_dump($que);
        $query = $connect->query($que_other_skills) or die($connect->error);
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
    if ($_POST['action'] == 'add_other_recognition'){
        
        $empid                      = mysqli_real_escape_string($connect, $_POST['employeeiddb']);
        $other_recognition                = mysqli_real_escape_string($connect, $_POST['other_recognition']);
        
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
  
        if (($other_recognition == null) || ($other_recognition == '')){
          $flag = true;
          $message .= 'Field must not be blank <br>
          ';
        }

        if (!$flag){

          $dateAdded = date("Y-m-d H:i:s");
          $que_other_recognition = "INSERT INTO `tbl_employee_other_recognition` SET 
          EMPID = '".$empid."',
          RECOGNITION = '".$other_recognition."',
          CANCELLED = 'N'"; 

          //var_dump($que);
          $query = $connect->query($que_other_recognition) or die($connect->error); 

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
    if ($_POST['action'] == 'add_other_membership'){
        
        $empid                      = mysqli_real_escape_string($connect, $_POST['employeeiddb']);
        $other_membership                = mysqli_real_escape_string($connect, $_POST['other_membership']);
        
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
  
        if (($other_membership == null) || ($other_membership == '')){
          $flag = true;
          $message .= 'Field must not be blank <br>
          ';
        }

        if (!$flag){

        $dateAdded = date("Y-m-d H:i:s");
        $que_other_membership = "INSERT INTO `tbl_employee_other_membership` SET 
        EMPID = '".$empid."',
        MEMBERSHIP = '".$other_membership."',
        CANCELLED = 'N'"; 

        //var_dump($que);
        $query = $connect->query($que_other_membership) or die($connect->error); 

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
    if ($_POST['action'] == 'add_attachment'){
        
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

				$user_image = upload_image();
			
        $empid  = mysqli_real_escape_string($connect, $_POST['empID']);
			  $filename = mysqli_real_escape_string($connect, $_POST["filename"]);

			  $admin_profile = $user_image;

       
        if (!$flag){

          $sqli = "INSERT INTO `tbl_employee_attachment` SET 
          EMPID = '".$empid."',
          FILENAME = '".$filename."',
          LOCATION = '".$admin_profile."',
          CANCELLED = 'N'";
          $query = $connect->query($sqli) or die($connect->error); 
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
  
  function upload_image()
  {
    if(isset($_FILES["user_image"]))
    {
      $extension = explode('.', $_FILES['user_image']['name']);
      $new_name = rand() . '.' . $extension[1];
      $destination = 'Uploaded_Files/' . $new_name;
      move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
      return $destination;
    }
  }


  if (isset($_POST['action'])){
    if ($_POST['action'] == 'submit_personal_details'){
       
        $empid  = $_POST['employeeiddb'];

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
        
        $usernameid              = mysqli_real_escape_string($connect, $_POST['usernameid']);
        $employeeid              = mysqli_real_escape_string($connect, $_POST['empid']);
        $firstname               = mysqli_real_escape_string($connect, $_POST['firstname']);
        $middlename              = mysqli_real_escape_string($connect, $_POST['middlename']);
        $lastname                = mysqli_real_escape_string($connect, $_POST['lastname']);
        $extension               = mysqli_real_escape_string($connect, $_POST['extension']);
        $position                = mysqli_real_escape_string($connect, $_POST['position']);
        $datehired               = mysqli_real_escape_string($connect, $_POST['datehired']);
        $username                = mysqli_real_escape_string($connect, $_POST['username']);
        $password                = mysqli_real_escape_string($connect, $_POST['password']);
        $gender                  = mysqli_real_escape_string($connect, $_POST['gender']);
        $civilstatus             = mysqli_real_escape_string($connect, $_POST['civilstatus']);

        $profileid               = mysqli_real_escape_string($connect, $_POST['profileid']);
        $dob                     = mysqli_real_escape_string($connect, $_POST['dob']);
        $placeofbirth            = mysqli_real_escape_string($connect, $_POST['placeofbirth']);
        $height                  = mysqli_real_escape_string($connect, $_POST['height']);
        $weight                  = mysqli_real_escape_string($connect, $_POST['weight']);
        $bloodtype               = mysqli_real_escape_string($connect, $_POST['bloodtype']);
        $gsisno                  = mysqli_real_escape_string($connect, $_POST['gsisno']);
        $pagibigno               = mysqli_real_escape_string($connect, $_POST['pagibigno']);
        $phicno                  = mysqli_real_escape_string($connect, $_POST['phicno']);
        $sssno                   = mysqli_real_escape_string($connect, $_POST['sssno']);
        $tinno                   = mysqli_real_escape_string($connect, $_POST['tinno']);
        $agencyemployeeno        = mysqli_real_escape_string($connect, $_POST['agencyemployeeno']);
        $citizenship                    = mysqli_real_escape_string($connect, $_POST['citizenship']);
        $dualchoice                =mysqli_real_escape_string($connect,  $_POST['dualchoice']);
        $residentialaddress      = mysqli_real_escape_string($connect, $_POST['residentialaddress']);
        $permanentaddress        = mysqli_real_escape_string($connect, $_POST['permanentaddress']);
        $telephoneno             = mysqli_real_escape_string($connect, $_POST['telephoneno']);
        $mobileno                = mysqli_real_escape_string($connect, $_POST['mobileno']);
        $emailprofile            = mysqli_real_escape_string($connect, $_POST['emailprofile']);

        $usernameid = mysqli_real_escape_string($connect, $_POST['usernameid']);
        

       /* if(1 === preg_match('~[0-9]~', $string)){
          #has numbers
      }*/

        if (($employeeid == null) || ($employeeid == '') ){
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

          $dateNow = date("Y-m-d H:i:s");
          $sqlemployee = 'UPDATE tbl_employee
          SET FIRSTNAME           = "'.$firstname.'",
          MIDDLENAME              = "'.$middlename.'", 
          LASTNAME                = "'.$lastname.'", 
          EXTENSION               = "'.$extension.'", 
          EMPLOYEEID              = "'.$employeeid.'", 
          POSITION                = "'.$position.'", 
          DATEHIRED               = "'.$datehired.'", 
          USERNAME                = "'.$username.'", 
          PASSWORD                = "'.$password.'",
          UPDATEDBY               = "'.$usernameid.'",
          UPDATEDDATETIME          = "'.$dateNow.'"
          
          WHERE ID = "'.$empid.'" ';

          //var_dump($sqlemployee);
          $result = mysqli_query($connect, $sqlemployee);

          //var_dump($sqlemployee);
          $sqlProfile = 'UPDATE tbl_employee_profile
          SET DOB                 = "'.$dob.'", 
          PLACEOFBIRTH            = "'.$placeofbirth.'", 
          HEIGHT                  = "'.$height.'",
          WEIGHT                  = "'.$weight.'",
          BLOODTYPE              = "'.$bloodtype.'", 
          GENDER                  = "'.$gender.'", 
          CIVILSTATUS             = "'.$civilstatus.'",
          GSISNO                  = "'.$gsisno.'", 
          PAGIBIGNO               = "'.$pagibigno.'", 
          PHICNO                  = "'.$phicno.'", 
          SSSNO                   = "'.$sssno.'", 
          TINNO                   = "'.$tinno.'", 
          AGENCYEMPLOYEENO        = "'.$agencyemployeeno.'", 
          CITIZENSHIP                    = "'.$citizenship.'", 
          DUALCITIZEN                   = "'.$dualchoice.'", 
          RESIDENTIALADDRESS      = "'.$residentialaddress.'", 
          PERMANENTADDRESS        = "'.$permanentaddress.'", 
          TELEPHONENO             = "'.$telephoneno.'", 
          MOBILENO                = "'.$mobileno.'", 
          EMAIL                   = "'.$emailprofile.'",
          UPDATEDBY               = "'.$usernameid.'",
          UPDATEDDATETIME          = "'.$dateNow.'"
          
          WHERE 
          ID = "'.$profileid.'" AND 
          EMPID = "'.$empid.'"';

          //var_dump($sqlProfile);
          $result = mysqli_query($connect, $sqlProfile);

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
    if ($_POST['action'] == 'submit_family_background'){
       
        $empid  = $_POST['employeeiddb'];

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

      
        $familyid                = mysqli_real_escape_string($connect,$_POST['familyid']);
        $spouselastname          = mysqli_real_escape_string($connect,$_POST['spouselastname']);
        $spousemiddlename        = mysqli_real_escape_string($connect,$_POST['spousemiddlename']);
        $spousefirstname         = mysqli_real_escape_string($connect,$_POST['spousefirstname']);
        $spouseextension         = mysqli_real_escape_string($connect,$_POST['spouseextension']);
        $occupation              = mysqli_real_escape_string($connect,$_POST['occupation']);
        $employername            = mysqli_real_escape_string($connect,$_POST['employername' ]);
        $businessaddress         = mysqli_real_escape_string($connect,$_POST['businessaddress']);
        $spousetelno             = mysqli_real_escape_string($connect,$_POST['spousetelno']);
        $fathersurname           = mysqli_real_escape_string($connect,$_POST['fathersurname']);
        $fatherfirstname         = mysqli_real_escape_string($connect,$_POST['fatherfirstname']);
        $fathermiddlename        = mysqli_real_escape_string($connect,$_POST['fathermiddlename']);
        $fatherext               = mysqli_real_escape_string($connect,$_POST['fatherext']);
        $mothermaidenname        = mysqli_real_escape_string($connect,$_POST['mothermaidenname']);
        $mothersurname           = mysqli_real_escape_string($connect,$_POST['mothersurname']);
        $motherfirstname         = mysqli_real_escape_string($connect,$_POST['motherfirstname']);
        $mothermiddlename        = mysqli_real_escape_string($connect,$_POST['mothermiddlename']);   
        
        $usernameid =  mysqli_real_escape_string($connect,$_POST['usernameid']);

        

        //CONDITION 
        /*if (preg_match('~[0-9]+~', $middlename)){
          $flag = true;
          $message .= 'Father Surname not correct format <br>
          ';
        }*/
       

        if (!$flag){
          $dateNow = date("Y-m-d H:i:s");
          $sqlFamily = 'UPDATE tbl_employee_family
          SET 
          SPOUSELASTNAME            = "'.$spouselastname.'", 
          SPOUSEFIRSTNAME           = "'.$spousefirstname.'", 
          SPOUSEMIDDLENAME          = "'.$spousemiddlename.'", 
          SPOUSEEXTENSION                  = "'.$spouseextension.'", 
          OCCUPATION               = "'.$occupation.'", 
          EMPLOYERNAME                  = "'.$employername.'", 
          BUSINESSADDRESS                   = "'.$businessaddress.'", 
          SPOUSETELNO                   = "'.$spousetelno.'", 
          FATHERSURNAME        = "'.$fathersurname.'", 
          FATHERFIRSTNAME                    = "'.$fatherfirstname.'", 
          FATHERMIDDLENAME                   = "'.$fathermiddlename.'", 
          FATHEREXT          = "'.$fatherext.'", 
          MOTHERMAIDENNAME      = "'.$mothermaidenname.'", 
          MOTHERSURNAME        = "'.$mothersurname.'", 
          MOTHERFIRSTNAME             = "'.$motherfirstname.'", 
          MOTHERMIDDLENAME                = "'.$mothermiddlename.'",
          UPDATEDBY               = "'.$usernameid.'",
          UPDATEDDATETIME          = "'.$dateNow.'"
        
          WHERE EMPID = "'.$_POST["employeeiddb"].'" AND ID = "'.$_POST["familyid"].'" ';
        
          $result = mysqli_query($connect, $sqlFamily);
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
    if ($_POST['action'] == 'submit_update_children'){

      $fullname =  mysqli_real_escape_string($connect,$_POST['fullname']);
      $dob =  mysqli_real_escape_string($connect,$_POST['dob']);
      $empid  =  mysqli_real_escape_string($connect,$_POST['id']);

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

      if (($fullname == null) || ($fullname == '') || (preg_match('~[0-9]+~', $fullname))){
        $flag = true;
        $message .= 'Name must not be blank or must be in correct format <br>
        ';
      }

      if (($dob == null) || ($dob == '') || ($dob>= $currentDate)){
        $flag = true;
        $message .= 'Date of Birth must not be blank or must be in correct format <br>
        ';
      }

      if (!$flag){

      $query = 'UPDATE tbl_employee_children
      SET FULLNAME =  "'.$fullname.'",
      DOB = "'.$dob.'"
      WHERE ID = "'.$_POST["id"].'"';

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
    if ($_POST['action'] == 'submit_educ'){
        $educid                  =  mysqli_real_escape_string($connect,$_POST['educid']);
        $level                  =  mysqli_real_escape_string($connect,$_POST['level']);
        $school_name            =  mysqli_real_escape_string($connect,$_POST['school_name']);
        $empid                  =  mysqli_real_escape_string($connect,$_POST['employeeiddb']);
        $educ                   =  mysqli_real_escape_string($connect,$_POST['educ']);
        $attended_from          =  mysqli_real_escape_string($connect,$_POST['attended_from']);
        $attended_to            =  mysqli_real_escape_string($connect,$_POST['attended_to']);
        $highest_level               =  mysqli_real_escape_string($connect,$_POST['highest_level']);
        $year_grad          =  mysqli_real_escape_string($connect,$_POST['year_grad']);
        $honor_received         =  mysqli_real_escape_string($connect,$_POST['honor_received']);
        
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
  
        if (($level == null) || ($level == '') || ($level == 'NA')){
          $flag = true;
          $message .= 'Level must not be blank  <br>
          ';
        }
        if (($school_name == null) || ($school_name == '') ){
          $flag = true;
          $message .= 'School Name must not be blank  <br>
          ';
        }

        if (!$flag){
          $query = 'UPDATE tbl_employee_educ_background
          SET SCHOOLNAME =  "'.$school_name.'",
          LEVEL = "'.$level.'",
          BASICEDUCATION = "'.$educ.'",
          PERIODFROM =  "'.$attended_from.'",
          PERIODTO = "'.$attended_to.'",
          HIGHESTLEVEL =  "'.$highest_level.'",
          YEARGRADUATED = "'.$year_grad.'",
          HONORRECEIVED =  "'.$honor_received.'"
        
          WHERE ID = "'.$educid.'"';

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
    if ($_POST['action'] == 'submit_eligibility'){
        $eligibilityid                  = mysqli_real_escape_string($connect,$_POST['eligibilityid']);
        $eligibility                  = mysqli_real_escape_string($connect,$_POST['eligibility']);
        $rating            = mysqli_real_escape_string($connect,$_POST['rating']);
        $empid                  = mysqli_real_escape_string($connect,$_POST['employeeiddb']);
        $date_of_exam                   = mysqli_real_escape_string($connect,$_POST['date_of_exam']);
        $place_of_exam          = mysqli_real_escape_string($connect,$_POST['place_of_exam']);
        $license_no            = mysqli_real_escape_string($connect,$_POST['license_no']);
        $license_date               = mysqli_real_escape_string($connect,$_POST['license_date']);

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
  
        if (($eligibility == null) || ($eligibility == '') ){
          $flag = true;
          $message .= 'Eligibility must not be blank <br>
          ';
        }
  
  
        if (!$flag){

          $query = 'UPDATE tbl_employee_civil_service
          SET ELIGIBILITY =  "'.$eligibility.'",
          RATING = "'.$rating.'",
          DATEOFEXAM =  "'.$date_of_exam.'",
          PLACEOFEXAM = "'.$place_of_exam.'",
          LICENSENUMBER =  "'.$license_no.'",
          LICENSEDATEOFVALIDITY = "'.$license_date.'"

        
          WHERE ID = "'.$eligibilityid.'"';

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
    if ($_POST['action'] == 'submit_work'){
        $workid                  = mysqli_real_escape_string($connect,$_POST['workid']);
        $work_date_from                  = mysqli_real_escape_string($connect,$_POST['work_date_from']);
        $work_date_to            = mysqli_real_escape_string($connect,$_POST['work_date_to']);
        $empid                  = mysqli_real_escape_string($connect,$_POST['employeeiddb']);
        $work_position                   = mysqli_real_escape_string($connect,$_POST['work_position']);
        $work_company          = mysqli_real_escape_string($connect,$_POST['work_company']);
        $work_salary            = mysqli_real_escape_string($connect,$_POST['work_salary']);
        $work_salary_grade               = mysqli_real_escape_string($connect,$_POST['work_salary_grade']);
        $work_status            = mysqli_real_escape_string($connect,$_POST['work_status']);
        $work_govt_service               = mysqli_real_escape_string($connect,$_POST['work_govt_service']);

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
        //if (($work_position == null) || ($work_position == '') || (preg_match('~[0-9]+~', $fullname))){
        if (($work_position == null) || ($work_position == '')){
          $flag = true;
          $message .= 'Name must not be blank or must be in correct format <br>
          ';
        }
  
        
  
        if (!$flag){
          $query = 'UPDATE tbl_employee_work_experience
          SET DATEFROM =  "'.$work_date_from.'",
          DATETO = "'.$work_date_to.'",
          POSITION =  "'.$work_position.'",
          COMPANY = "'.$work_company.'",
          MONTHLYSALARY =  "'.$work_salary.'",
          GRADE = "'.$work_salary_grade.'",
          STATUS =  "'.$work_status.'",
          GOVTSERVICE = "'.$work_govt_service.'"

        
          WHERE ID = "'.$workid.'"';

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
    if ($_POST['action'] == 'submit_volwork'){
        $volworkid                  = mysqli_real_escape_string($connect,$_POST['volworkid']);
        $volwork_organization                  = mysqli_real_escape_string($connect,$_POST['volwork_organization']);
        $volwork_date_from            = mysqli_real_escape_string($connect,$_POST['volwork_date_from']);
        $empid                  = mysqli_real_escape_string($connect,$_POST['employeeiddb']);
        $volwork_date_to                   = mysqli_real_escape_string($connect,$_POST['volwork_date_to']);
        $volwork_nohours          = mysqli_real_escape_string($connect,$_POST['volwork_nohours']);
        $volwork_position            = mysqli_real_escape_string($connect,$_POST['volwork_position']);
    

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
        //if (($work_position == null) || ($work_position == '') || (preg_match('~[0-9]+~', $fullname))){
        if (($volwork_organization == null) || ($volwork_organization == '')){
          $flag = true;
          $message .= 'Organization/Company must not be blank  <br>
          ';
        }
  
        if (!$flag){
          $query = 'UPDATE tbl_employee_voluntary_work
          SET ORGANIZATION =  "'.$volwork_organization.'",
          DATEFROM = "'.$volwork_date_from.'",
          DATETO =  "'.$volwork_date_to.'",
          NOOFHOURS = "'.$volwork_nohours.'",
          POSITION =  "'.$volwork_position.'"
    
          WHERE ID = "'.$volworkid.'"';

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
    if ($_POST['action'] == 'submit_landd'){
        $landdid                  = mysqli_real_escape_string($connect,$_POST['landdid']);
        $landd_program                  = mysqli_real_escape_string($connect,$_POST['landd_program']);
        $landd_date_from            = mysqli_real_escape_string($connect,$_POST['landd_date_from']);
        $empid                  = mysqli_real_escape_string($connect,$_POST['employeeiddb']);
        $landd_date_to                   = mysqli_real_escape_string($connect,$_POST['landd_date_to']);
        $landd_nohours          = mysqli_real_escape_string($connect,$_POST['landd_nohours']);
        $landd_type            = mysqli_real_escape_string($connect,$_POST['landd_type']);
        $landd_sponsoredby            = mysqli_real_escape_string($connect,$_POST['landd_sponsoredby']);
    

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
        //if (($work_position == null) || ($work_position == '') || (preg_match('~[0-9]+~', $fullname))){
        if (($landd_program == null) || ($landd_program == '')){
          $flag = true;
          $message .= 'Program must not be blank  <br>
          ';
        }
  
        if (!$flag){
          $query = 'UPDATE tbl_employee_ld
          SET PROGRAM =  "'.$landd_program.'",
          DATEFROM = "'.$landd_date_from.'",
          DATETO =  "'.$landd_date_to.'",
          NOOFHOURS = "'.$landd_nohours.'",
          TYPE =  "'.$landd_type.'",
          SPONSOREDBY =  "'.$landd_sponsoredby.'"
    
          WHERE ID = "'.$landdid.'"';

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
    if ($_POST['action'] == 'delete_children'){

      $query = 'UPDATE tbl_employee_children
        SET CANCELLED = "Y" 
        WHERE ID = "'.$_POST["id"].'" AND CANCELLED = "N" ';

      echo $query;
      //$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
      
      $result = mysqli_query($connect, $query );

    }
  }


  if (isset($_POST['action'])){
    if ($_POST['action'] == 'delete_education'){

      $query = 'UPDATE tbl_employee_educ_background
        SET CANCELLED = "Y" 
        WHERE ID = "'.$_POST["id"].'" AND CANCELLED = "N" ';

      echo $query;
      
      $result = mysqli_query($connect, $query );

    }
  }

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'delete_eligibility'){

      $query = 'UPDATE tbl_employee_civil_service
        SET CANCELLED = "Y" 
        WHERE ID = "'.$_POST["id"].'" AND CANCELLED = "N" ';

      echo $query;
      
      $result = mysqli_query($connect, $query );

    }
  }

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'delete_work'){

      $query = 'UPDATE tbl_employee_work_experience
        SET CANCELLED = "Y" 
        WHERE ID = "'.$_POST["id"].'" AND CANCELLED = "N" ';

      echo $query;
      
      $result = mysqli_query($connect, $query );

    }
  }

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'delete_volwork'){

      $query = 'UPDATE tbl_employee_voluntary_work
        SET CANCELLED = "Y" 
        WHERE ID = "'.$_POST["id"].'" AND CANCELLED = "N" ';

      echo $query;
      
      $result = mysqli_query($connect, $query );

    }
  }

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'delete_other_skill'){

      $query = 'UPDATE tbl_employee_other_skills
        SET CANCELLED = "Y" 
        WHERE ID = "'.$_POST["id"].'" AND CANCELLED = "N" ';

      //echo $query;
      
      $result = mysqli_query($connect, $query );

    }
  }

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'delete_other_recognition'){

      $query = 'UPDATE tbl_employee_other_recognition
        SET CANCELLED = "Y" 
        WHERE ID = "'.$_POST["id"].'" AND CANCELLED = "N" ';

      //echo $query;
      
      $result = mysqli_query($connect, $query );

    }
  }

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'delete_other_membership'){

      $query = 'UPDATE tbl_employee_other_membership
        SET CANCELLED = "Y" 
        WHERE ID = "'.$_POST["id"].'" AND CANCELLED = "N" ';

      //echo $query;
      
      $result = mysqli_query($connect, $query);

    }
  }

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'delete_attachment'){

      $query = 'UPDATE tbl_employee_attachment
        SET CANCELLED = "Y" 
        WHERE ID = "'.$_POST["id"].'" AND CANCELLED = "N" ';

      //echo $query;
      
      $result = mysqli_query($connect, $query);

    }
  }





  if ($_POST['action'] == 'fetch_single_children'){
      $query = 'SELECT * FROM tbl_employee_children WHERE ID = "'.$_POST["id"].'" AND CANCELLED != "Y" ';

      //var_dump($query);

      $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

      $result = mysqli_query($connect, $query);

      $data = array();
      
      while($row = mysqli_fetch_array($result)){
        


        $sub_array = array();
        $sub_array['hidden_id'] = $row['ID'];
        $sub_array['employeeid'] = $row['EMPID'];
        $sub_array['fullname'] = $row['FULLNAME'];
        $sub_array['dob'] = $row['DOB'];


        $data[] = $sub_array;
      }



    $output = array(
      //"draw"    => intval($_POST["draw"]),
      //"recordsTotal"  =>  get_all_data($connect),
      //"recordsFiltered" => $number_filter_row,
      "data"    => $sub_array
      );
      //var_dump($data[]);

    echo json_encode($sub_array);
    //var_dump($sub_array[0]);
    //echo json_encode($data);


  }

  if ($_POST['action'] == 'fetch_single_educ'){
      $query = 'SELECT * FROM tbl_employee_educ_background WHERE ID = "'.$_POST["id"].'" AND CANCELLED != "Y" ';

      //var_dump($query);

      $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

      $result = mysqli_query($connect, $query);

      $data = array();
      
      while($row = mysqli_fetch_array($result)){
      


        $sub_array = array();
        $sub_array['level'] = $row['LEVEL'];
        $sub_array['school_name'] = $row['SCHOOLNAME'];
        $sub_array['educ'] = $row['BASICEDUCATION'];
        $sub_array['attended_from'] = $row['PERIODFROM'];
        $sub_array['attended_to'] = $row['PERIODTO'];
        $sub_array['highest_level'] = $row['HIGHESTLEVEL'];
        $sub_array['year_grad'] = $row['YEARGRADUATED'];
        $sub_array['honor_received'] = $row['HONORRECEIVED'];
        $sub_array['educid'] = $row['ID'];
 
        $data[] = $sub_array;
      }



    $output = array(
      //"draw"    => intval($_POST["draw"]),
      //"recordsTotal"  =>  get_all_data($connect),
      //"recordsFiltered" => $number_filter_row,
      "data"    => $sub_array
      );

    echo json_encode($sub_array);



  }



  if ($_POST['action'] == 'fetch_single_eligibility'){
      $query = 'SELECT * FROM tbl_employee_civil_service WHERE ID = "'.$_POST["id"].'" AND CANCELLED != "Y" ';

      //var_dump($query);

      $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
      $result = mysqli_query($connect, $query);
      $data = array();
      
      while($row = mysqli_fetch_array($result)){
        
        $sub_array = array();
        $sub_array['eligibilityid'] = $row["ID"];
        $sub_array['eligibility']    = $row["ELIGIBILITY"];
        $sub_array['rating']    = $row["RATING"];
        $sub_array['date_of_exam']      = $row["DATEOFEXAM"];
        $sub_array['place_of_exam']      = $row["PLACEOFEXAM"];
        $sub_array['license_no']      = $row["LICENSENUMBER"];
        $sub_array['license_date']      = $row["LICENSEDATEOFVALIDITY"];
        

        $data[] = $sub_array;


      }



    $output = array(
      //"draw"    => intval($_POST["draw"]),
      //"recordsTotal"  =>  get_all_data($connect),
      //"recordsFiltered" => $number_filter_row,
      "data"    => $sub_array
      );

    echo json_encode($sub_array);



  }

  if ($_POST['action'] == 'fetch_single_work'){
      $query = 'SELECT * FROM tbl_employee_work_experience WHERE ID = "'.$_POST["id"].'" AND CANCELLED != "Y" ';

      //var_dump($query);

      $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
      $result = mysqli_query($connect, $query);
      $data = array();
      
      while($row = mysqli_fetch_array($result)){
        
        $sub_array = array();
        $sub_array['workid'] = $row["ID"];
        $sub_array['work_date_from']    = $row["DATEFROM"];
        $sub_array['work_date_to']    = $row["DATETO"];
        $sub_array['work_position']      = $row["POSITION"];
        $sub_array['work_company']      = $row["COMPANY"];
        $sub_array['work_salary']      = $row["MONTHLYSALARY"];
        $sub_array['work_salary_grade']      = $row["GRADE"];
        $sub_array['work_status']      = $row["STATUS"];
        $sub_array['work_govt_service']      = $row["GOVTSERVICE"];
        $data[] = $sub_array;
      }



    $output = array(
      //"draw"    => intval($_POST["draw"]),
      //"recordsTotal"  =>  get_all_data($connect),
      //"recordsFiltered" => $number_filter_row,
      "data"    => $sub_array
      );

    echo json_encode($sub_array);
  }

  if ($_POST['action'] == 'fetch_single_volwork'){
      $query = 'SELECT * FROM tbl_employee_voluntary_work WHERE ID = "'.$_POST["id"].'" AND CANCELLED != "Y" ';

      //var_dump($query);

      $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
      $result = mysqli_query($connect, $query);
      $data = array();
      
      while($row = mysqli_fetch_array($result)){
        
        $sub_array = array();
        $sub_array['volworkid']                   = $row["ID"];
        $sub_array['volwork_date_from']           = $row["DATEFROM"];
        $sub_array['volwork_date_to']             = $row["DATETO"];
        $sub_array['volwork_nohours']             = $row["NOOFHOURS"];
        $sub_array['volwork_position']            = $row["POSITION"];
        $sub_array['volwork_organization']           = $row["ORGANIZATION"];
        $data[] = $sub_array;
      }



    $output = array(
      //"draw"    => intval($_POST["draw"]),
      //"recordsTotal"  =>  get_all_data($connect),
      //"recordsFiltered" => $number_filter_row,
      "data"    => $sub_array
      );

    echo json_encode($sub_array);
  }

  if ($_POST['action'] == 'fetch_single_landd'){
      $query = 'SELECT * FROM tbl_employee_ld WHERE ID = "'.$_POST["id"].'" AND CANCELLED != "Y" ';

      //var_dump($query);

      $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
      $result = mysqli_query($connect, $query);
      $data = array();
      
      while($row = mysqli_fetch_array($result)){
        
        $sub_array = array();
        $sub_array['landdid']                   = $row["ID"];
        $sub_array['landd_program']           = $row["PROGRAM"];
        $sub_array['landd_date_from']             = $row["DATEFROM"];
        $sub_array['landd_date_to']             = $row["DATETO"];
        $sub_array['landd_nohours']            = $row["NOOFHOURS"];
        $sub_array['landd_type']              = $row["TYPE"];
        $sub_array['landd_sponsoredby']           = $row["SPONSOREDBY"];
        $data[] = $sub_array;
      }



    $output = array(
      //"draw"    => intval($_POST["draw"]),
      //"recordsTotal"  =>  get_all_data($connect),
      //"recordsFiltered" => $number_filter_row,
      "data"    => $sub_array
      );

    echo json_encode($sub_array);
  }



  

  







?>
