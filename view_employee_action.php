<?php 
//session_start();
include "dbConnection.php";
$columns = array('process', 'rating','fullname', 'email', 'comment',  'date_submitted');
session_start();
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

    $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

    $result = mysqli_query($connect, $query);

    $data = array();
    
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


      //$sub_array[] = $row["EMPLOYEEID"];
      /*$sub_array[] = 
      "<form action='adminviewapplicant.php' method='POST'>
                          <input type='hidden' name='tin' value='" . $row["FIRSTNAME"] . "'>
                          <input type='hidden' name='id' value='" . $row["ID"] . "'>
                <input type='submit' class ='btn btn-sm btn-info btn-block' name ='view' id = 'submit' value ='VIEW (?)'>
              </form> ";*/
    // $sub_array[] = "<a href='employee_detail.php'  id='ID' data-toggle='modal' data-id='".$row['ID']."'>View</a> /           
    /*
      $sub_array[] = $type;
      $sub_array[] = $description;
      $sub_array[] = (new DateTime($row["date_received"]))->format('M d, Y H:i:s');
      $sub_array[] = $row["received_by"];
      $sub_array[] = (new DateTime($rel))->format('M d, Y H:i:s');
      $sub_array[] = $time_cycle;
      $sub_array[] = $row["remarks"];*/
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

    if ($number_filter_row == 0){
      $queProfile = "INSERT INTO `tbl_employee_family` SET 
      EMPID = '".$_POST["employeeiddb"]."'
      "; 
    
      $query = $connect->query($queProfile) or die($connect->error); 
    }


    $result_query_family = mysqli_query($connect, $query_family);

    $data_family = array();
    
    while($row = mysqli_fetch_array($result_query_family)){
  
      $sub_array_query_family = array();
      
      $sub_array_query_family['id']                         = $row['ID'];
      $sub_array_query_family['empid']                      = $row['EMPID'];
      $sub_array_query_family['spouselastname']             = $row['SPOUSELASTNAME'];
      $sub_array_query_family['spousemiddlename']             = $row['SPOUSEMIDDLENAME'];
      $sub_array_query_family['spousefirstname']             = $row['SPOUSEFIRSTNAME'];
      $sub_array_query_family['spouseextension']             = $row['SPOUSEEXTENSION'];
      $sub_array_query_family['occupation']                   = $row['OCCUPATION'];
      $sub_array_query_family['employername']                   = $row['EMPLOYERNAME'];
      $sub_array_query_family['businessaddress']                   = $row['BUSINESSADDRESS'];
      $sub_array_query_family['spousetelno']                   = $row['SPOUSETELNO'];
      $sub_array_query_family['fathersurname']                   = $row['FATHERSURNAME'];
      $sub_array_query_family['fatherfirstname']                   = $row['FATHERFIRSTNAME'];
      $sub_array_query_family['fathermiddlename']                   = $row['FATHERMIDDLENAME'];
      $sub_array_query_family['fatherext']                    = $row['FATHEREXT'];
      $sub_array_query_family['mothermaidenname']                   = $row['MOTHERMAIDENNAME'];
      $sub_array_query_family['mothersurname']                   = $row['MOTHERSURNAME'];
      $sub_array_query_family['motherfirstname']                   = $row['MOTHERFIRSTNAME'];
      $sub_array_query_family['mothermiddlename']                   = $row['MOTHERMIDDLENAME'];
      $data_family[] = $sub_array_query_family;
    }




   
    //"draw"    => intval($_POST["draw"]),
    //"recordsTotal"  =>  get_all_data($connect),
    //"recordsFiltered" => $number_filter_row,


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

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'fetch_children'){

      $query = 'SELECT * FROM tbl_employee_children WHERE EMPID = "'.$_POST['employeeiddb'].'" AND CANCELLED = "N" ';

     // var_dump($query);
      $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
      
      $result = mysqli_query($connect, $query );
      
      $data = array();
       
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
                
                <button type='button' name='update_children' class='btn btn-warning btn-sm update_children'  data-id='".$row['ID']."'><i class='fas fa-edit'></i></button>
                <button type='button' name='delete_children' class='btn btn-danger btn-sm delete_children' data-id='".$row['ID']."'>Delete</button>";  
              //<a data-toggle='modal' id = 'delete-children' data-id='".$row['ID']."'>Delete</a>
      
                
      /*
        $sub_array[] = $type;
        $sub_array[] = $description;
        $sub_array[] = (new DateTime($row["date_received"]))->format('M d, Y H:i:s');
        $sub_array[] = $row["received_by"];
        $sub_array[] = (new DateTime($rel))->format('M d, Y H:i:s');
        $sub_array[] = $time_cycle;
        $sub_array[] = $row["remarks"];*/
        $data[] = $sub_array;
      }
      
      /*function get_all_data($connect){
       $query = "SELECT * FROM updates where receiver = '".$_SESSION['received_by']."'";
       $result = mysqli_query($connect, $query);
       return mysqli_num_rows($result);
      }*/
      
      $_SESSION['query2'] = $data;
      
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

      
      $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
      
      $result = mysqli_query($connect, $query );
      
      $data = array();
       
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
        
        <button type='button' name='update_educ' class='btn btn-warning btn-sm update_educ'  data-id='".$row['ID']."'><i class='fas fa-edit'></i></button>
        <button type='button' name='delete_educ' class='btn btn-danger btn-sm delete_educ' data-id='".$row['ID']."'>Delete</button>";  
        //<a data-toggle='modal' id = 'delete-children' data-id='".$row['ID']."'>Delete</a>
        $data[] = $sub_array;
      }
      
      /*function get_all_data($connect){
       $query = "SELECT * FROM updates where receiver = '".$_SESSION['received_by']."'";
       $result = mysqli_query($connect, $query);
       return mysqli_num_rows($result);
      }*/
      
      $_SESSION['query2'] = $data;
      
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
        
        <button type='button' name='update_civil' class='btn btn-warning btn-sm update_eligibility'  data-id='".$row['ID']."'><i class='fas fa-edit'></i></button>
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
        
        <button type='button' name='update_work' class='btn btn-warning btn-sm update_work'  data-id='".$row['ID']."'><i class='fas fa-edit'></i></button>
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
    if ($_POST['action'] == 'add_children'){
        
        //var_dump($_SESSION['query2']);
        $fullname = $_POST['fullname'];
        $dob = $_POST['dob'];
        $empid  = $_POST['employeeiddb'];
        //var_dump($dob);
        /*$dateOfBirth=$_POST['dob'];
        $dob =  date_format($dateOfBirth,"Y/m/d");*/

        $dateAdded = date("Y-m-d H:i:s");
        $que = "INSERT INTO `tbl_employee_CHILDREN` SET 
        EMPID = '".$empid."',
        FULLNAME = '".$fullname."',
        DOB = '".$dob."',
        CANCELLED = 'N'
        "; 
        $query = $connect->query($que) or die($connect->error); 

    }
  }

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'add_educ'){
        
        //var_dump($_SESSION['query2']);
        $level                  = $_POST['level'];
        $school_name            = $_POST['school_name'];
        $empid                  = $_POST['employeeiddb'];
        $educ                   = $_POST['educ'];
        $attended_from          = $_POST['attended_from'];
        $attended_to            = $_POST['attended_to'];
        $highest_level               = $_POST['highest_level'];
        $year_grad          = $_POST['year_grad'];
        $honor_received         = $_POST['honor_received'];
        
        /*$dateOfBirth=$_POST['dob'];
        $dob =  date_format($dateOfBirth,"Y/m/d");*/

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

        //var_dump($que);
        $query = $connect->query($que) or die($connect->error); 

    }
  }

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'add_eligibility'){
        
        $empid                  = $_POST['employeeiddb'];
        $eligibility                  = $_POST['eligibility'];
        $rating            = $_POST['rating'];
        $date_of_exam                  = $_POST['date_of_exam'];
        $place_of_exam                   = $_POST['place_of_exam'];
        $license_no          = $_POST['license_no'];
        $license_date            = $_POST['license_date'];

        
        /*$dateOfBirth=$_POST['dob'];
        $dob =  date_format($dateOfBirth,"Y/m/d");*/

        $dateAdded = date("Y-m-d H:i:s");
        $que_eligibility = "INSERT INTO `tbl_employee_civil_service` SET 
        EMPID = '".$empid."',
        ELIGIBILITY = '".$eligibility."',
        RATING = '".$rating."',
        DATEOFEXAM = '".$date_of_exam."',
        PLACEOFEXAM = '".$place_of_exam."',
        LICENSENUMBER = '".$license_no."',
        LICENSEDATEOFVALIDITY = '".$license_date."',
        CANCELLED = 'N'"; 

        //var_dump($que);
        $query = $connect->query($que_eligibility) or die($connect->error); 

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


        //EDUCATION DATA
        $query = 'UPDATE tbl_employee_educ_background
        SET CANCELLED = "Y" 
        WHERE EMPID = "'.$_POST["employeeiddb"].'"';
        $result = mysqli_query($connect, $query);

        $educ_data =  $_SESSION['educ_data'];


        foreach($educ_data as $x ) {
          $que_educ = "INSERT INTO `tbl_employee_educ_background` SET 
          EMPID = '".$empid."',
          FULLNAME = '".$x[0]."',
          DOB = '".$x[1]."',
          LEVEL = '".$x[1]."',
          SCHOOLNAME = '".$x[2]."',
          BASICEDUCATION = '".$x[3]."',
          PERIODFROM = '".$x[4]."',
          PERIODTO = '".$x[5]."',
          HIGHESTLEVEL = '".$x[6]."',
          YEARGRADUATED = '".$x[7]."',
          HONORRECEIVED = '".$x[8]."',
          CANCELLED = 'N'"; 

          //echo $que;
          $result = mysqli_query($connect, $que_educ);
          $i++; 

        }

        //WORK DATA
        $query = 'UPDATE tbl_employee_work_experience
        SET CANCELLED = "Y" 
        WHERE EMPID = "'.$_POST["employeeiddb"].'"';
        $result = mysqli_query($connect, $query);

        $work_data =  $_SESSION['work_data'];


        foreach($work_data as $x ) {
          $que_work = "INSERT INTO `tbl_employee_civil_service` SET 

          EMPID = '".$empid."',
          DATEFROM = '".$x[0]."',
          DATETO = '".$x[1]."',
          POSITION = '".$x[2]."',
          COMPANY = '".$x[3]."',
          MONTHLYSALARY = '".$x[4]."',
          GRADE = '".$x[5]."',
          STATUS = '".$x[6]."',
          GOVTSERVICE = '".$x[7]."',
          CANCELLED = 'N'"; 



          //echo $que;
          $result = mysqli_query($connect, $que_work);
          $i++; 

        }

        //ELIGIBILITY DATA
        $query = 'UPDATE tbl_employee_civil_service
        SET CANCELLED = "Y" 
        WHERE EMPID = "'.$_POST["employeeiddb"].'"';
        $result = mysqli_query($connect, $query);

        $eligibility_data =  $_SESSION['eligibility_data'];
        

        foreach($eligibility_data as $x ) {
          $que_eligibility = "INSERT INTO `tbl_employee_civil_service` SET 

          EMPID = '".$empid."',
          ELIGIBILITY = '".$x[0]."',
          RATING = '".$x[1]."',
          DATEOFEXAM = '".$x[2]."',
          PLACEOFEXAM = '".$x[3]."',
          LICENSENUMBER = '".$x[4]."',
          LICENSEDATEOFVALIDITY = '".$x[5]."',
          CANCELLED = 'N'"; 



          //echo $que;
          $result = mysqli_query($connect, $que_eligibility);
          $i++; 

        }
    }
  }

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'update_employee'){
       
        $empid  = $_POST['employeeiddb'];

        $employeeid              = $_POST['empid'];
        $firstname               = $_POST['firstname'];
        $middlename              = $_POST['middlename'];
        $lastname                = $_POST['lastname'];
        $extension               = $_POST['extension'];
        $position                = $_POST['position'];
        $datehired               = $_POST['datehired'];
        $username                = $_POST['username'];
        $password                = $_POST['password'];
        $gender                  = $_POST['gender'];
        $civilstatus             = $_POST['civilstatus'];

        $profileid               = $_POST['profileid'];
        $dob                     = $_POST['dob'];
        $placeofbirth            = $_POST['placeofbirth'];
        $height                  = $_POST['height'];
        $weight                  = $_POST['weight'];
        $gsisno                  = $_POST['gsisno'];
        $pagibigno               = $_POST['pagibigno'];
        $phicno                  = $_POST['phicno'];
        $sssno                   = $_POST['sssno'];
        $tinno                   = $_POST['tinno'];
        $agencyemployeeno        = $_POST['agencyemployeeno'];
        $dual                    = $_POST['dual'];
        $filipino                = $_POST['filipino'];
        $birth                   = $_POST['birth'];
        $naturalization          = $_POST['naturalization'];
        $residentialaddress      = $_POST['residentialaddress'];
        $permanentaddress        = $_POST['permanentaddress'];
        $telephoneno             = $_POST['telephoneno'];
        $mobileno                = $_POST['mobileno'];
        $emailprofile            = $_POST['emailprofile'];

        $familyid                = $_POST['familyid'];
        $spouselastname          = $_POST['spouselastname'];
        $spousemiddlename        = $_POST['spousemiddlename'];
        $spousefirstname         = $_POST['spousefirstname'];
        $spouseextension         = $_POST['spouseextension'];
        $occupation              = $_POST['occupation'];
        $employername            = $_POST['employername' ];
        $businessaddress         = $_POST['businessaddress'];
        $spousetelno             = $_POST['spousetelno'];
        $fathersurname           = $_POST['fathersurname'];
        $fatherfirstname         = $_POST['fatherfirstname'];
        $fathermiddlename        = $_POST['fathermiddlename'];
        $fatherext               = $_POST['fatherext'];
        $mothermaidenname        = $_POST['mothermaidenname'];
        $mothersurname           = $_POST['mothersurname'];
        $motherfirstname         = $_POST['motherfirstname'];
        $mothermiddlename        = $_POST['mothermiddlename'];        

        $dateAdded = date("Y-m-d H:i:s");
        $sqlProfile = 'UPDATE tbl_employee
        SET FIRSTNAME           = "'.$firstname.'",
        MIDDLENAME              = "'.$middlename.'", 
        LASTNAME                = "'.$lastname.'", 
        EXTENSION               = "'.$extension.'", 
        EMPLOYEEID              = "'.$employeeid.'", 
        POSITION                = "'.$position.'", 
        DATEHIRED               = "'.$datehired.'", 
        USERNAME                = "'.$username.'", 
        PASSWORD                = "'.$password.'"
        
       
        WHERE ID = "'.$empid.'" ';
        $result = mysqli_query($connect, $sqlProfile);

        //var_dump($sqlProfile); 
        /** */
        
        $sqlProfile = 'UPDATE tbl_employee_profile
        SET DOB                 = "'.$dob.'", 
        PLACEOFBIRTH            = "'.$placeofbirth.'", 
        HEIGHT                  = "'.$height.'",
        WEIGHT                  = "'.$weight.'", 
        GENDER                  = "'.$gender.'", 
        CIVILSTATUS             = "'.$civilstatus.'",
        GSISNO                  = "'.$gsisno.'", 
        PAGIBIGNO               = "'.$pagibigno.'", 
        PHICNO                  = "'.$phicno.'", 
        SSSNO                   = "'.$sssno.'", 
        TINNO                   = "'.$tinno.'", 
        AGENCYEMPLOYEENO        = "'.$agencyemployeeno.'", 
        CITIZENSHIP                    = "'.$dual.'", 
        DUALCITIZEN                   = "'.$birth.'", 
        RESIDENTIALADDRESS      = "'.$residentialaddress.'", 
        PERMANENTADDRESS        = "'.$permanentaddress.'", 
        TELEPHONENO             = "'.$telephoneno.'", 
        MOBILENO                = "'.$mobileno.'", 
        EMAIL            = "'.$emailprofile.'"
        
        WHERE 
        ID = "'.$profileid.'" AND 
        EMPID = "'.$empid.'"';
        $result = mysqli_query($connect, $sqlProfile);

        //var_dump($sqlProfile);

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
        MOTHERMIDDLENAME                = "'.$mothermiddlename.'" 
       
        WHERE EMPID = "'.$_POST["employeeiddb"].'" AND ID = "'.$_POST["familyid"].'" ';
        
        //var_dump($sqlFamily);

        $result = mysqli_query($connect, $sqlFamily);



    }
  }



  if (isset($_POST['action'])){
    if ($_POST['action'] == 'submit_update_children'){

      $fullname = $_POST['fullname'];
      $dob = $_POST['dob'];
      //$empid  = $_POST['employeeiddb'];
      $empid  = $_POST['id'];
      
      /*$dateOfBirth = $_POST['dob'];
      $dob =  date_format($dateOfBirth,"Y/m/d");*/
     

      $query = 'UPDATE tbl_employee_children
      SET FULLNAME =  "'.$fullname.'",
      DOB = "'.$dob.'"

      WHERE ID = "'.$_POST["id"].'"';

      //var_dump($query);
      $result = mysqli_query($connect, $query);


    }
  }


  if (isset($_POST['action'])){
    if ($_POST['action'] == 'submit_educ'){
        $educid                  = $_POST['educid'];
        $level                  = $_POST['level'];
        $school_name            = $_POST['school_name'];
        $empid                  = $_POST['employeeiddb'];
        $educ                   = $_POST['educ'];
        $attended_from          = $_POST['attended_from'];
        $attended_to            = $_POST['attended_to'];
        $highest_level               = $_POST['highest_level'];
        $year_grad          = $_POST['year_grad'];
        $honor_received         = $_POST['honor_received'];
        
        /*$dateOfBirth=$_POST['dob'];
        $dob =  date_format($dateOfBirth,"Y/m/d");*/



        $query = 'UPDATE tbl_employee_educ_background
        SET SCHOOLNAME =  "'.$school_name.'",
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
  }


  if (isset($_POST['action'])){
    if ($_POST['action'] == 'submit_eligibility'){
        $eligibilityid                  = $_POST['eligibilityid'];
        $eligibility                  = $_POST['eligibility'];
        $rating            = $_POST['rating'];
        $empid                  = $_POST['employeeiddb'];
        $date_of_exam                   = $_POST['date_of_exam'];
        $place_of_exam          = $_POST['place_of_exam'];
        $license_no            = $_POST['license_no'];
        $license_date               = $_POST['license_date'];



        $query = 'UPDATE tbl_employee_civil_service
        SET ELIGIBILITY =  "'.$eligibility.'",
        RATING = "'.$rating.'",
        DATEOFEXAM =  "'.$date_of_exam.'",
        PLACEOFEXAM = "'.$place_of_exam.'",
        LICENSENUMBER =  "'.$license_no.'",
        LICENSEDATEOFVALIDITY = "'.$license_date.'"

      
        WHERE ID = "'.$eligibilityid.'"';

        //var_dump($query);
        $result = mysqli_query($connect, $query);


    }
  }

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'submit_work'){
        $workid                  = $_POST['workid'];
        $work_date_from                  = $_POST['work_date_from'];
        $work_date_to            = $_POST['work_date_to'];
        $empid                  = $_POST['employeeiddb'];
        $work_position                   = $_POST['work_position'];
        $work_company          = $_POST['work_company'];
        $work_salary            = $_POST['work_salary'];
        $work_salary_grade               = $_POST['work_salary_grade'];
        $work_status            = $_POST['work_status'];
        $work_govt_service               = $_POST['work_govt_service'];




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
        
      /*  $sub_array = array();

        $sub_array['employeeid'] = $row['EMPID'];
        $sub_array['fullname'] = $row['FULLNAME'];
        $sub_array['dob'] = $row['DOB'];


        $data[] = $sub_array;*/


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

  


}




?>
