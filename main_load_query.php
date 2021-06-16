<?php 
include "dbConnection.php";
//session_start();
$query = '';

if (isset($_POST['action'])){
  if ($_POST['action'] == 'fetch_employee'){
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
    FROM tbl_employee WHERE tbl_employee.CANCELLED = "N" ';

    $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
    //var_dump($number_filter_row);
    $result = mysqli_query($connect, $query);

    /*$data = array();
  
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
    } */
    $output = array(
    "totalEmployee"    => $number_filter_row/*,
    "data_profile"    => $b,
    "data_family"    => $c*/
    );

    echo json_encode($output);
    //cho json_encode($sub_array);


  }
}


if (isset($_POST['action'])){
  if ($_POST['action'] == 'fetch_dashboard_employee'){

      $query = "SELECT * FROM tbl_employee  where ID != '1' AND CANCELLED != 'Y'";

      if(isset($_POST["search"]["value"])){
      $query .= ' AND (FIRSTNAME LIKE "%'.$_POST["search"]["value"].'%" 
      OR MIDDLENAME LIKE "%'.$_POST["search"]["value"].'%" 
      OR LASTNAME LIKE "%'.$_POST["search"]["value"].'%" 
      OR EMPLOYEEID LIKE "%'.$_POST["search"]["value"].'%" ) 
      ';
      }


      $query .= ' ORDER BY ID DESC ';
      $query1 = '';

      $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

      $result = mysqli_query($connect, $query . $query1);

      $data = array();
      
      while($row = mysqli_fetch_array($result)){
        
        $sub_array = array();
        $sub_array[] = $row["EMPLOYEEID"];
        $sub_array[] = $row["FIRSTNAME"];
        $sub_array[] = $row["MIDDLENAME"];
        $sub_array[] = $row["LASTNAME"];
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

  }
}








?>
