<?php 
session_start();
include "dbConnection.php";
$columns = array('process', 'rating','fullname', 'email', 'comment',  'date_submitted');

//$query = "SELECT * FROM feedback where receiver = '".$_SESSION['received_by']."' ";
$query = "SELECT * FROM tbl_employee  ";

if(isset($_POST["search"]["value"])){
 $query .= 'where (FIRSTNAME LIKE "%'.$_POST["search"]["value"].'%" 
 OR MIDDLENAME LIKE "%'.$_POST["search"]["value"].'%" 
 OR LASTNAME LIKE "%'.$_POST["search"]["value"].'%" 
 OR EMPLOYEEID LIKE "%'.$_POST["search"]["value"].'%" ) AND CANCELLED != "Y"
 ';
}


 $query .= 'ORDER BY ID DESC ';


 //var_dump($query);
 
$query1 = '';

/*if($_POST["length"] != -1){
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}*/

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

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
  $sub_array[] = $row["EMPLOYEEID"];
  $sub_array[] = $row["FIRSTNAME"];
  $sub_array[] = $row["MIDDLENAME"];
  $sub_array[] = $row["LASTNAME"];

  //$sub_array[] = $row["EMPLOYEEID"];
  /*$sub_array[] = 
  "<form action='adminviewapplicant.php' method='POST'>
                      <input type='hidden' name='tin' value='" . $row["FIRSTNAME"] . "'>
                      <input type='hidden' name='id' value='" . $row["ID"] . "'>
					  <input type='submit' class ='btn btn-sm btn-info btn-block' name ='view' id = 'submit' value ='VIEW (?)'>
					</form> ";*/
         /* $sub_array[] = "<a href='viewEmployee.php?id=".$row['ID']."' data-id='".$row['ID']."'> View</a> / 
          <a href='#addEmployeeForm'  id='custId' data-toggle='modal' data-id='".$row['ID']."'>Delete</a>"; */
          $sub_array[] = "<a href='viewEmployee.php?id=".$row['ID']."' data-id='".$row['ID']."'> <button type='button' class='btn btn-info btn-sm'>View</button></a></a> 
          <a href='viewEmployee.php?id=".$row['ID']."' data-id='".$row['ID']."'> <button type='button' class='btn btn-danger btn-sm'>Delete</button></a>";  
      

          
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

function get_all_employee_data($connect){
 $query = "SELECT * FROM tbl_employees where CANCELLED = 'N'";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 //"draw"    => intval($_POST["draw"]),
 //"employeeTotal"  =>  get_all_employee_data($connect),
 //"recordsFiltered" => $number_filter_row,

 "data"    => $data
);

echo json_encode($output);







?>
