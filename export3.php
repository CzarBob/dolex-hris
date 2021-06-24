<?php
include "dbConnection.php";
require 'vendor/vendor/autoload.php';
session_start();
date_default_timezone_set('Asia/Manila');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('Book2.xlsx');

$query = 'SELECT tbl_employee.FIRSTNAME as FIRSTNAME,
tbl_employee.MIDDLENAME as MIDDLENAME,
tbl_employee.LASTNAME as LASTNAME,
tbl_employee_profile.DOB as DOB,
tbl_employee_profile.PLACEOFBIRTH as PLACEOFBIRTH

FROM tbl_employee 
INNER JOIN tbl_employee_profile ON 
tbl_employee_profile.EMPID = tbl_employee.ID
WHERE tbl_employee.ID = "2" ';


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


    $$query_profile = 'SELECT * FROM tbl_employee_profile WHERE EMPID = "'.$_POST["employeeiddb"].'" ';
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




    while($row = mysqli_fetch_array($result_query_profile)){
  
        $sub_array_query_profile = array();

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
        
        $data_profile[] = $sub_array_query_profile;
      }


/*
    //$query_family = 'SELECT * FROM tbl_employee_family WHERE EMPID = "'.$_POST["employeeiddb"].'" ';
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
    
    while($row = mysqli_fetch_array($result_query_family)){
        $spousemiddlename       = $row['SPOUSEMIDDLENAME'];
        $spouselastname         = $row['SPOUSEFIRSTNAME'];
        $spousemiddlename       = $row['SPOUSEEXTENSION'];
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
    }*/


    $spreadsheet->setActiveSheetIndex(0);
    // Rename worksheet
    $worksheet = $spreadsheet->getActiveSheet();
    $worksheet->getCell('D10')->setValue($lastname);
    $worksheet->getCell('D11')->setValue($firstname);
    $worksheet->getCell('D12')->setValue($middlename);
    $worksheet->getCell('D13')->setValue($dob);
    $worksheet->getCell('D15')->setValue($placeofbirth);
    $worksheet->getCell('D22')->setValue($placeofbirth);


        $gender                = $row['GENDER'];
        $civilstatus                = $row['CIVILSTATUS'];
        $height             = $row['HEIGHT'];
        $weight                = $row['WEIGHT'];
        $bloodtype           = $row['BLOODTYPE'];
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

