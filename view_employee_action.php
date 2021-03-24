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


    $query_profile = 'SELECT * FROM tbl_employee_profile WHERE EMPID = "'.$_POST["employeeiddb"].'" ';
    $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

    $result_query_profile = mysqli_query($connect, $query_profile);

    $data_profile = array();
    
    while($row = mysqli_fetch_array($result_query_profile)){
  
      $sub_array_query_profile = array();
      $sub_array_query_profile['id']                 = $row['ID'];
      $sub_array_query_profile['empid']                 = $row['EMPID'];
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
    //var_dump($query_family);

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




    $output = array(
    //"draw"    => intval($_POST["draw"]),
    //"recordsTotal"  =>  get_all_data($connect),
    //"recordsFiltered" => $number_filter_row,
    "data"    => $sub_array,
    "data_profile"    => $sub_array_query_profile,
    "data_family"    => $sub_array_query_family
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
    if ($_POST['action'] == 'fetch_education'){

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
    if ($_POST['action'] == 'add_children'){
        //
        /*if($_POST['track_num'] != ''){
          $track_num = $_POST['track_num'];
          $prov = $_POST['prov'];
        }
        else{
          $track_num = $_POST['track_num2'];
          $prov = "External";
        }*/

        //var_dump($_SESSION['query2']);
        $fullname = $_POST['fullname'];
        $dob = $_POST['dob'];
        $empid  = $_POST['employeeiddb'];
       
        /*$email = $_POST['email'];
        $position = $_POST['position'];
        $datehired = $_POST['datehired'];
        $slcredit = $_POST['slcredit'];
        $vlcredit = $_POST['vlcredit'];*/
      
        $email = 'X';
        $position = 'X';
        $datehired = 'X';
        $slcredit = 'X';
        $vlcredit = 'X';
      
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
    if ($_POST['action'] == 'cancel_update'){


        //var_dump($_SESSION['query2']);
       
        $empid  = $_POST['employeeiddb'];
       
        /*$email = $_POST['email'];
        $position = $_POST['position'];
        $datehired = $_POST['datehired'];
        $slcredit = $_POST['slcredit'];
        $vlcredit = $_POST['vlcredit'];*/
      
        $email = 'X';
        $position = 'X';
        $datehired = 'X';
        $slcredit = 'X';
        $vlcredit = 'X';
      
      
        $i = 0;

        $dateAdded = date("Y-m-d H:i:s");
        $query = 'UPDATE tbl_employee_children
        SET CANCELLED = "Y" 
        WHERE EMPID = "'.$_POST["employeeiddb"].'"';

        //var_dump($query);
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
    if ($_POST['action'] == 'submit_update_children'){

      

      $fullname = $_POST['fullname'];
      $dob = $_POST['dob'];
      //$empid  = $_POST['employeeiddb'];
      $empid  = $_POST['id'];
     
     
    
      $i = 0;

      $dateAdded = date("Y-m-d H:i:s");
      $query = 'UPDATE tbl_employee_children
      SET FULLNAME =  "'.$fullname.'",
      DOB = "'.$dob.'"

      WHERE ID = "'.$_POST["id"].'"';

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





  if ($_POST['action'] == 'fetch_single_children'){
      $query = 'SELECT * FROM tbl_employee_children WHERE ID = "'.$_POST["id"].'" AND CANCELLED != "Y" ';

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


}




?>
