<?php 
session_start();
include "dbConnection.php";
$columns = array('process', 'rating','fullname', 'email', 'comment',  'date_submitted');



if (isset($_POST['action'])){
  if ($_POST['action'] == 'fetch_data'){

          
      //$query = "SELECT * FROM feedback where receiver = '".$_SESSION['received_by']."' ";
      $query = "SELECT * FROM tbl_employee  where  CANCELLED != 'Y'";

      if(isset($_POST["search"]["value"])){
      $query .= ' AND (FIRSTNAME LIKE "%'.$_POST["search"]["value"].'%" 
      OR MIDDLENAME LIKE "%'.$_POST["search"]["value"].'%" 
      OR LASTNAME LIKE "%'.$_POST["search"]["value"].'%" 
      OR EMPLOYEEID LIKE "%'.$_POST["search"]["value"].'%" ) 
      ';
      }


      $query .= ' ORDER BY ID DESC ';


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
                <button type='button' name='delete_employee' class='btn btn-danger btn-sm delete_employee' data-id='".$row['ID']."'>Delete</button>";  

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
