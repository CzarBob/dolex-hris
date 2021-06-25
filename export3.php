<?php
include "dbConnection.php";
require 'vendor/vendor/autoload.php';
session_start();
date_default_timezone_set('Asia/Manila');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('Book2.xlsx');


//$id = $_POST['employeeiddb'];
$id = '15';


$query = 'SELECT tbl_employee.FIRSTNAME as FIRSTNAME,
tbl_employee.MIDDLENAME as MIDDLENAME,
tbl_employee.LASTNAME as LASTNAME,
tbl_employee_profile.DOB as DOB,
tbl_employee_profile.PLACEOFBIRTH as PLACEOFBIRTH

FROM tbl_employee 
INNER JOIN tbl_employee_profile ON 
tbl_employee_profile.EMPID = tbl_employee.ID
WHERE tbl_employee.ID = "15" ';


    $firstname = '';
    $middlename ='';
    $lastname = '';
    $dob = '';
    $placeofbirth = '';

    
    $result = mysqli_query($connect, $query);

    if($result){
      while($row = mysqli_fetch_array($result)){
        
          $firstname = $row['FIRSTNAME'];
          $middlename = $row['MIDDLENAME'];
          $lastname = $row['LASTNAME'];
          $dob = $row['DOB'];
          $placeofbirth = $row['PLACEOFBIRTH']; 
      }
    }


    //$$query_profile = 'SELECT * FROM tbl_employee_profile WHERE EMPID = "'.$_POST["employeeiddb"].'" ';
    $query_profile = 'SELECT * FROM tbl_employee_profile WHERE EMPID = "'.$id.'" ';
    $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query_profile));

    $result_query_profile = mysqli_query($connect, $query_profile);


   $dob                         = '';
   $placeofbirth                = '';
   $height                      = '';
   $weight                      = '';
   $bloodtype                   = '';
   $gender                      = '';
   $civilstatus                 = '';
   $gsisno                      = '';
   $pagibigno                   = ''; 
   $phicno                      = '';
   $sssno                       = '';
   $tinno                       = '';
   $agencyemployeeno            = '';
   $citizenship                 = '';
   $dualchoice                  = '';
   $residentialaddress          = '';
   $permanentaddress            = '';
   $telephoneno                 = '';
   $mobileno                    = '';
   $emailprofile                = '';



   if ($result_query_profile){
    while($row = mysqli_fetch_array($result_query_profile)){

      $dob                   = $row['DOB'];
      $placeofbirth          = $row['PLACEOFBIRTH'];
      $gender                = $row['GENDER'];
      $civilstatus                = $row['CIVILSTATUS'];
      $height                 = $row['HEIGHT'];
      $weight                = $row['WEIGHT'];
      $bloodtype              = $row['BLOODTYPE'];
      $gsisno                = $row['GSISNO'];
      $pagibigno             = $row['PAGIBIGNO'];
      $phicno                = $row['PHICNO'];
      $sssno                 = $row['SSSNO'];
      $tinno                 = $row['TINNO'];
      $agencyemployeeno      = $row['AGENCYEMPLOYEENO'];
      $citizenship           = $row['CITIZENSHIP'];
      $dualchoice            = $row['DUALCITIZEN'];
      $residentialaddress    = $row['RESIDENTIALADDRESS'];
      $permanentaddress      = $row['PERMANENTADDRESS'];
      $telephoneno           = $row['TELEPHONENO'];
      $mobileno              = $row['MOBILENO'];
      $emailprofile          = $row['EMAIL'];
    }
  }

    



    //$query_family = 'SELECT * FROM tbl_employee_family WHERE EMPID = "'.$_POST["employeeiddb"].'" ';
    $query_family = 'SELECT * FROM tbl_employee_family WHERE EMPID = "'.$id.'" ';
    $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query_family));

    $dateNow = date("Y-m-d H:i:s");


    $result_query_family = mysqli_query($connect, $query_family);

        $spousemiddlename     = '';
        $spouselastname       = '';
        $spousemiddlename     = '';
        $spousefirstname      = '';
        $spouseextension      = '';
        $occupation           = '';
        $employername         = '';
        $businessaddress      = '';
        $spousetelno          = '';
        $fathersurname        = '';
        $fatherfirstname      = '';
        $fathermiddlename     = '';
        $fatherext            = '';
        $mothermaidenname     = '';
        $mothersurname        = '';
        $motherfirstname      = '';
        $mothermiddlename     = ''; 
   
    if ($result_query_family){
      while($row = mysqli_fetch_array($result_query_family)){
        $spousemiddlename       = $row['SPOUSEMIDDLENAME'];
        $spouselastname         = $row['SPOUSELASTNAME'];
        $spousefirstname        = $row['SPOUSEFIRSTNAME'];
        $spouseextension        = $row['SPOUSEEXTENSION'];
        $occupation             = $row['OCCUPATION'];
        $employername           = $row['EMPLOYERNAME'];
        $businessaddress        = $row['BUSINESSADDRESS'];
        $spousetelno            = $row['SPOUSETELNO'];
        $fathersurname          = $row['FATHERSURNAME'];
        $fatherfirstname        = $row['FATHERFIRSTNAME'];
        $fathermiddlename       = $row['FATHERMIDDLENAME'];
        $fatherext              = $row['FATHEREXT'];
        $mothermaidenname       = $row['MOTHERMAIDENNAME'];
        $mothersurname          = $row['MOTHERSURNAME'];
        $motherfirstname        = $row['MOTHERFIRSTNAME'];
        $mothermiddlename       = $row['MOTHERMIDDLENAME'];   
      }
    }

   



    
    


    $spreadsheet->setActiveSheetIndex(0);
    // Rename worksheet
    $worksheet = $spreadsheet->getActiveSheet();
    $worksheet->getCell('D10')->setValue($lastname);
    $worksheet->getCell('D11')->setValue($firstname);
    $worksheet->getCell('D12')->setValue($middlename);
    $worksheet->getCell('D13')->setValue($dob);
    $worksheet->getCell('D15')->setValue($placeofbirth);



    $query = 'SELECT * FROM tbl_employee_children WHERE EMPID = "'.$id.'" AND CANCELLED = "N" ';

    $result = mysqli_query($connect, $query);
    $rowNum = 37; 
    
    if ($result){
      while(($row = mysqli_fetch_array($result)) && ($rowNum > 50)){
        $worksheet->getCell('I'.(int)$rowNum)->setValue($row["FULLNAME"]);
        $worksheet->getCell('M'.(int)$rowNum)->setValue($row["DOB"]);
        $rowNum++;
      }    
    }


    //$query = 'SELECT * FROM tbl_employee_educ_background WHERE EMPID = "'.$id.'" AND CANCELLED = "N"';
    /*$query = 'SELECT * FROM tbl_employee_educ_background WHERE EMPID = "15" AND CANCELLED = "N"  
    ORDER BY `tbl_employee_educ_background`.`LEVEL`= "ELEM",`tbl_employee_educ_background`.`LEVEL`= 'SEC",`tbl_employee_educ_background`.`LEVEL`= 'VOC',`tbl_employee_educ_background`.`LEVEL`= 'COLLEGE'
    ,`tbl_employee_educ_background`.`LEVEL`= "GRADSTUD"';*/
    
    $result = mysqli_query($connect, $query);
    $educlevel = '';
    $educschool = '';
    $educcourse = '';
    $educfrom = '';
    $educto = '';
    $educlevelearned = '';
    $educyeargraduated = '';
    $educschol = '';
    $rowNum = 54; 
    if ($result){
      while($row = mysqli_fetch_array($result)){
        if ($row["LEVEL"] == 'ELEM'){
          
        }
        $rowNum++;
      }    

      $worksheet->getCell('I'.(int)$rowNum)->setValue($row["FULLNAME"]);
    }



/*
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="UPDATE.xls"');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
$writer->save('BEST.xls');*/


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="TEST EXPORT.xlsx"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

?>

