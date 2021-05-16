<?php 
session_start();
include "dbConnection.php";
$columns = array('process', 'rating','fullname', 'email', 'comment',  'date_submitted');

//$query = "SELECT * FROM feedback where receiver = '".$_SESSION['received_by']."' ";
$query = "SELECT * FROM tbl_employee WHERE ";

if(isset($_POST["search"]["value"])){
 $query .= ' (FIRSTNAME LIKE "%'.$_POST["search"]["value"].'%" 
 OR MIDDLENAME LIKE "%'.$_POST["search"]["value"].'%" 
 OR LASTNAME LIKE "%'.$_POST["search"]["value"].'%" 
 OR EMPLOYEEID LIKE "%'.$_POST["search"]["value"].'%" ) AND
 ';
}


 $query .= " CANCELLED = 'N' ORDER BY ID DESC ";


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
  $sub_array[] = $row["EMPLOYEEID"];
  $sub_array[] = $row["FIRSTNAME"];
  $sub_array[] = $row["MIDDLENAME"];
  $sub_array[] = $row["LASTNAME"];

  
          $sub_array[] = "<a href='serviceRecordDetail?id=".$row['ID']."' data-id='".$row['ID']."'> <button type='button' class='btn btn-info btn-sm'>Select</button></a></a>";  
      

          

  $data[] = $sub_array;
}


$output = array(
 //"draw"    => intval($_POST["draw"]),
 //"recordsTotal"  =>  get_all_data($connect),
 //"recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);
?>
