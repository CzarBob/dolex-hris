<?php
include "dbConnection.php";
//session_start();

//include 'adminviewapplicant1.php';
if (isset($_GET['id'])) {

    //CHILDREN DATA
    unset($_SESSION['query3']);
    $id = $_GET['id'];

    $query = 'SELECT * FROM tbl_employee_children WHERE EMPID = "'.$id.'" AND CANCELLED = "N" ';

     // var_dump($query);
      $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
      
      $result = mysqli_query($connect, $query );
      
      $data = array();
       
      while($row = mysqli_fetch_array($result)){
         
        $sub_array = array();
        $sub_array[] = $row["FULLNAME"];
        $sub_array[] = $row["DOB"];
        $data[] = $sub_array;
      }
      $_SESSION['query3'] = $data;
      //END OF CHILDREN DATA

    //EDUCATION DATA
    unset($_SESSION['educ_data']);
    //$id = $_GET['id'];

    $query = 'SELECT * FROM tbl_employee_educ_background WHERE EMPID = "'.$id.'" AND CANCELLED = "N" ';
          
        $result = mysqli_query($connect, $query );

        $data = array();
        if($result){
          while($row = mysqli_fetch_array($result)){
          
            $sub_array = array();
            $sub_array[] = $row["ID"];
            $sub_array[] = $row["LEVEL"];
            $sub_array[] = $row["SCHOOLNAME"];
            $sub_array[] = $row["BASICEDUCATION"];
            $sub_array[] = $row["PERIODFROM"];
            $sub_array[] = $row["PERIODTO"];
            $sub_array[] = $row["HIGHESTLEVEL"];
            $sub_array[] = $row["YEARGRADUATED"];
            $sub_array[] = $row["HONORRECEIVED"];
            $data[] = $sub_array;
          }
        }
        
        $_SESSION['educ_data'] = $data;
      //END OF EDUCATION DATA


    //ELIGIBILITY DATA
    unset($_SESSION['eligibility_data']);
    //$id = $_GET['id'];

    $query = 'SELECT * FROM tbl_employee_civil_service WHERE EMPID = "'.$id.'" AND CANCELLED = "N" ';

      //$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
      
      $result = mysqli_query($connect, $query);
      
      $data = array();
      if($result){
        while($row = mysqli_fetch_array($result)){
          
          $sub_array = array();
          $sub_array[] = $row["ID"];
          $sub_array[] = $row["ELIGIBILITY"];
          $sub_array[] = $row["RATING"];
          $sub_array[] = $row["DATEOFEXAM"];
          $sub_array[] = $row["PLACEOFEXAM"];
          $sub_array[] = $row["LICENSENUMBER"];
          $sub_array[] = $row["LICENSEDATEOFVALIDITY"];
          $data[] = $sub_array;
        }
      }
      $_SESSION['eligibility_data'] = $data;
      //END OF ELIBILITY DATA



    //WORK DATA
    unset($_SESSION['work_data']);
    //$id = $_GET['id'];

    $query = 'SELECT * FROM tbl_employee_work_experience WHERE EMPID = "'.$id.'" AND CANCELLED = "N" ';
 
      $result = mysqli_query($connect, $query );
      
      $data = array();
      if($result){
        while($row = mysqli_fetch_array($result)){
            
            $sub_array = array();
            $sub_array[] = $row["ID"];
            $sub_array[] = $row["EMPID"];
            $sub_array[] = $row["DATEFROM"];
            $sub_array[] = $row["DATETO"];
            $sub_array[] = $row["POSITION"];
            $sub_array[] = $row["COMPANY"];
            $sub_array[] = $row["MONTHLYSALARY"];
            $sub_array[] = $row["GRADE"];
            $sub_array[] = $row["STATUS"];
            $sub_array[] = $row["GOVTSERVICE"];
            $data[] = $sub_array;
          }
      }
      $_SESSION['work_data'] = $data;
      //END OF ELIBILITY DATA



    //WORK DATA
    unset($_SESSION['volwork_data']);
    //$id = $_GET['id'];

    $query = 'SELECT * FROM tbl_employee_voluntary_work WHERE EMPID = "'.$id.'" AND CANCELLED = "N" ';
 
      $result = mysqli_query($connect, $query );
      
      $data = array();
      if($result){
        while($row = mysqli_fetch_array($result)){
            
            $sub_array = array();
            $sub_array[] = $row["ID"];
            $sub_array[] = $row["EMPID"];
            $sub_array[] = $row["ORGANIZATION"];
            $sub_array[] = $row["DATEFROM"];
            $sub_array[] = $row["DATETO"];
            $sub_array[] = $row["NOOFHOURS"];
            $sub_array[] = $row["POSITION"];
            $data[] = $sub_array;
          }
      }
      $_SESSION['volwork_data'] = $data;
      //END OF VOLUNTARY WORK DATA


    //L AND D DATA
    unset($_SESSION['landd_data']);
    //$id = $_GET['id'];

    $query = 'SELECT * FROM tbl_employee_ld WHERE EMPID = "'.$id.'" AND CANCELLED = "N" ';
 
      $result = mysqli_query($connect, $query );
      
      $data = array();
      if($result){
        while($row = mysqli_fetch_array($result)){
            
            $sub_array = array();
            $sub_array[] = $row["ID"];
            $sub_array[] = $row["EMPID"];
            $sub_array[] = $row["PROGRAM"];
            $sub_array[] = $row["DATEFROM"];
            $sub_array[] = $row["DATETO"];
            $sub_array[] = $row["NOOFHOURS"];
            $sub_array[] = $row["TYPE"];
            $sub_array[] = $row["SPONSOREDBY"];
            $data[] = $sub_array;
          }
      }
      $_SESSION['landd_data'] = $data;
      //END OF VOLUNTARY WORK DATA
      
}

?>