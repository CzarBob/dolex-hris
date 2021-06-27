<?php
include "dbConnection.php";
require 'vendor/vendor/autoload.php';
session_start();
date_default_timezone_set('Asia/Manila');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$spreadsheet->getActiveSheet()->setTitle('C1');
$spreadsheet->getActiveSheet()->getDefaultRowDimension()->setRowHeight(30);
$spreadsheet->getDefaultStyle()->getFont()->setName('Arial Narrow');
$spreadsheet->getDefaultStyle()->getFont()->setSize('9');

/*$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setPath("img/dolelogogs.png");
$drawing->setName('DOLE LOGO');
$drawing->setCoordinates('C5');
$drawing->setWidthAndHeight(50,50);
$drawing->setWorksheet($sheet);  */


//$id = $_POST['employeeiddb'];
$id = isset($_GET["id"]);


$query = 'SELECT tbl_employee.FIRSTNAME as FIRSTNAME,
tbl_employee.MIDDLENAME as MIDDLENAME,
tbl_employee.LASTNAME as LASTNAME,
tbl_employee_profile.DOB as DOB,
tbl_employee_profile.PLACEOFBIRTH as PLACEOFBIRTH

FROM tbl_employee 
INNER JOIN tbl_employee_profile ON 
tbl_employee_profile.EMPID = tbl_employee.ID
WHERE tbl_employee.ID = "'.$id.'" ';


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


$sheet->getColumnDimension('A')->setWidth(3);
$sheet->getColumnDimension('B')->setWidth(20);
$sheet->getColumnDimension('C')->setWidth(9);
$sheet->getColumnDimension('D')->setWidth(30);
$sheet->getColumnDimension('E')->setWidth(9);
$sheet->getColumnDimension('F')->setWidth(9);
$sheet->getColumnDimension('G')->setWidth(12);
$sheet->getColumnDimension('H')->setWidth(13);
$sheet->getColumnDimension('I')->setWidth(12);
$sheet->getColumnDimension('J')->setWidth(11);
$sheet->getColumnDimension('K')->setWidth(12);
$sheet->getColumnDimension('L')->setWidth(15);
$sheet->getColumnDimension('M')->setWidth(12);
$sheet->getColumnDimension('N')->setWidth(12);


$spreadsheet->getActiveSheet()->getRowDimension('6')->setRowHeight(1);
$spreadsheet->getActiveSheet()->getRowDimension('7')->setRowHeight(12);
$spreadsheet->getActiveSheet()->getRowDimension('8')->setRowHeight(1);



/*$spreadsheet->getActiveSheet()->getStyle('A9:N9')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('828583');*/

$sheet->setCellValue('A1', 'CS Form No. 212');
$sheet->setCellValue('A2', 'Revised 2017');
$sheet->setCellValue('A3', 'PERSONAL DATA SHEET');
$sheet->setCellValue('A4', 'WARNING: Any misrepresentation made in the Personal Data Sheet and the Work Experience Sheet shall cause the filing of administrative/criminal case/s against the person concerned.');
$sheet->setCellValue('A5', 'READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS) BEFORE ACCOMPLISHING THE PDS FORM.');
$sheet->setCellValue('A7', 'Print legibly. Tick appropriate boxes (     ) and use separate sheet if necessary. Indicate N/A if not applicable.  DO NOT ABBREVIATE.');
$sheet->setCellValue('K7', '1. CS ID No.')->getStyle('K7')->getFill()
->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
->getStartColor()->setARGB('828583');
$sheet->setCellValue('L7', ' (Do not fill up. For CSC use only)');
$sheet->setCellValue('A9', 'I. PERSONAL INFORMATION');
$sheet->setCellValue('A10', '2.');
$sheet->setCellValue('B10', 'SURNAME');
$sheet->setCellValue('D10', $lastname);//
$sheet->setCellValue('B11', 'FIRST NAME');
$sheet->setCellValue('D11',  $firstname);//
$sheet->setCellValue('L11', 'NAME EXTENSION (JR., SR)    ')->getStyle('L11')->getFill()
->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
->getStartColor()->setARGB('cfcfcf');//
$sheet->setCellValue('B12', 'MIDDLE NAME');
$sheet->setCellValue('D12', $middlename);//
$sheet->setCellValue('A13', '3.');
$sheet->setCellValue('B13', 'DATE OF BIRTH 
(mm/dd/yyyy)  ');
$sheet->setCellValue('D13', $dob);//
$sheet->setCellValue('G13', '16. CITIZENSHIP
If holder of  dual citizenship, please indicate the details.');
$citizenValue = '[ ] Filipino    [ ]Dual Citizen';
if ($citizenship == 'filipino'){
    $citizenValue = '[/] Filipino    [ ]Dual Citizen';
} else if ($citizenship == 'dual'){
    $citizenValue = '[ ] Filipino    [/]Dual Citizen';
}
$sheet->setCellValue('J13', $citizenValue);
/*$sheet->setCellValue('K13', 'FILIPINO');
$sheet->setCellValue('L13', 'BOX');
$sheet->setCellValue('M13', 'DUAL CITIZENSHIP');
$sheet->setCellValue('K14', 'BOX');*/

$dualValue = '[ ] by birth     [ ] naturalization';
if ($dualchoice == 'birth'){
    $dualValue = '[/]by birth    [ ]naturalization';
} else if ($dualchoice == 'naturalization'){
    $dualValue = '[ ] by birth    [/] naturalization';
}
$sheet->setCellValue('J14', $dualValue);
/*$sheet->setCellValue('M14', 'BOX');
$sheet->setCellValue('N14', 'by naturalization');*/
$sheet->setCellValue('A15', '4.');
$sheet->setCellValue('B15', 'PLACE OF BIRTH');
$sheet->setCellValue('D15', $placeofbirth);//
$sheet->setCellValue('G15', ' ');
$sheet->setCellValue('J15', 'Pls. indicate country:');
$sheet->setCellValue('A16', '5.');
$sheet->setCellValue('B16', 'SEX');

$genderValue = '[ ] Male  [ ] Female';
if ($gender == 'MALE'){
    $genderValue = '[/] Male  [ ] Female';
} else if ($gender == 'FEMALE'){
    $genderValue = '[ ] Male  [/] Female';
}
$sheet->setCellValue('D16', $genderValue);
//$sheet->setCellValue('E16', 'BOX Female');
//$sheet->setCellValue('G16', 'If holder of  dual citizenship, ');
$sheet->setCellValue('J16', 'PHILIPPINES');
$sheet->setCellValue('A17', '6.');
$sheet->setCellValue('B17', 'CIVIL STATUS');

$civilStatusValue = '[ ] Single     [ ] Married
[ ] Widowed     [ ] Separated
[ ] Others ';
if ($civilstatus == 'SINGLE'){
    $civilStatusValue = '[/] Single     [ ] Married
    [ ] Widowed     [ ] Separated
    [ ] Others ';
} else if ($civilstatus == 'MARRIED'){
    $civilStatusValue = '[ ] Single     [/] Married
    [ ] Widowed     [ ] Separated
    [ ] Others ';
} else if ($civilstatus == 'WIDOWED'){
    $civilStatusValue = '[ ] Single     [ ] Married
    [/] Widowed     [ ] Separated
    [ ] Others ';
} else if ($civilstatus == 'SEPARATED'){
    $civilStatusValue = '[ ] Single     [ ] Married
    [ ] Widowed     [/] Separated
    [ ] Others ';
} else if ($civilstatus == 'OTHERS'){
    $civilStatusValue = '[ ] Single     [ ] Married
    [ ] Widowed     [ ] Separated
    [/] Others ';
}

$sheet->setCellValue('D17', $civilStatusValue);//
//$sheet->setCellValue('E17', 'BOX Married');
$sheet->setCellValue('G17', '17. RESIDENTIAL ADDRESS');
$sheet->setCellValue('I17', ' ');
$sheet->setCellValue('L17', ' ');
//$sheet->setCellValue('D18', 'BOX Widowed');//
//$sheet->setCellValue('E17', 'BOX Separated');

$sheet->setCellValue('I18', 'House/Block/Lot No.');
$sheet->setCellValue('L18', 'Street');

$sheet->setCellValue('I19', ' ');
$sheet->setCellValue('L19', ' ');

$sheet->setCellValue('I20', 'Subdivision/Village');
$sheet->setCellValue('L20', 'Barangay');

$sheet->setCellValue('A21', '7.');
$sheet->setCellValue('B21', 'HEIGHT(m)');
$sheet->setCellValue('D21', $height);
$sheet->setCellValue('I21', $residentialaddress);
$sheet->setCellValue('I22', 'City/Municipality');
$sheet->setCellValue('L22', 'Province');

$sheet->setCellValue('A23', '8.');
$sheet->setCellValue('B23', 'WEIGHT(kg)');
$sheet->setCellValue('D23', $weight);
$sheet->setCellValue('G23', 'ZIP CODE');
$sheet->setCellValue('I23', ' ');

$sheet->setCellValue('A24', '9.');
$sheet->setCellValue('B24', 'BLOOD TYPE');
$sheet->setCellValue('D24', $bloodtype );
$sheet->setCellValue('G24', '18. PERMANENT ADDRESS');
$sheet->setCellValue('I24', ' ');
$sheet->setCellValue('L24', ' ');
$sheet->setCellValue('I25', 'House/Block/Lot No.');
$sheet->setCellValue('L25', 'Street');

$sheet->setCellValue('A26', '10.');
$sheet->setCellValue('B26', 'GSIS ID NO.');
$sheet->setCellValue('D26', $gsisno);
$sheet->setCellValue('I26', ' ');
$sheet->setCellValue('L26', ' ');
$sheet->setCellValue('I27', 'Subdivision/Village');
$sheet->setCellValue('L27', 'Barangay');

$sheet->setCellValue('A28', '11.');
$sheet->setCellValue('B28', 'PAG-IBIG ID NO.');
$sheet->setCellValue('D28', $pagibigno);
$sheet->setCellValue('I28', $permanentaddress);
$sheet->setCellValue('L28', ' ');
$sheet->setCellValue('I29', 'City/Municipality');
$sheet->setCellValue('L29', 'Province');

$sheet->setCellValue('A30', '12.');
$sheet->setCellValue('B30', 'PHILHEALTH NO.');
$sheet->setCellValue('D30', $phicno);
$sheet->setCellValue('G30', 'ZIP CODE');
$sheet->setCellValue('I30', ' ');

$sheet->setCellValue('A31', '13.');
$sheet->setCellValue('B31', 'SSS NO.');
$sheet->setCellValue('D31', $sssno);
$sheet->setCellValue('G31', '19. TELEPHONE NO.');
$sheet->setCellValue('I31', $telephoneno);

$sheet->setCellValue('A32', '14.');
$sheet->setCellValue('B32', 'TIN NO.');
$sheet->setCellValue('D32', $tinno);
$sheet->setCellValue('G32', '20. MOBILE NO.');
$sheet->setCellValue('I32', $mobileno);

$sheet->setCellValue('A33', '15.');
$sheet->setCellValue('B33', 'AGENCY EMPLOYEE NO.');
$sheet->setCellValue('D33', $agencyemployeeno);
$sheet->setCellValue('G33', '21. E-MAIL ADDRESS (if any)');
$sheet->setCellValue('I33', $emailprofile);

$sheet->setCellValue('A34', 'II.  FAMILY BACKGROUND');

$sheet->setCellValue('A35', '22.');
$sheet->setCellValue('B35', 'SPOUSE SURNAME');
$sheet->setCellValue('D35', $spouselastname);
$sheet->setCellValue('I35', '23. NAME of CHILDREN  (Write full name and list all)')->getStyle('I35')->getFill()
->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
->getStartColor()->setARGB('cfcfcf');;
$sheet->setCellValue('M35', 'DATE OF BIRTH (mm/dd/yyyy) ')->getStyle('M35')->getFill()
->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
->getStartColor()->setARGB('cfcfcf');

$sheet->setCellValue('B36', 'FIRST NAME');
$sheet->setCellValue('D36', $spousefirstname);
$sheet->setCellValue('G36', 'NAME EXTENSION (JR., SR) '.$spouseextension)->getStyle('G36')->getFill()
->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
->getStartColor()->setARGB('cfcfcf');

$sheet->setCellValue('B37', 'MIDDLE NAME');
$sheet->setCellValue('D37', $spousemiddlename);

$sheet->setCellValue('B38', 'OCCUPATION');
$sheet->setCellValue('D38', $occupation);

$sheet->setCellValue('B39', 'EMPLOYER/BUSINESS NAME');
$sheet->setCellValue('D39', $employername);

$sheet->setCellValue('B40', 'BUSINESS ADDRESS');
$sheet->setCellValue('D40', $businessaddress);

$sheet->setCellValue('B41', 'TELEPHONE NO.');
$sheet->setCellValue('D41', $spousetelno);

$sheet->setCellValue('A42', '24.');
$sheet->setCellValue('B42', 'FATHER SURNAME');
$sheet->setCellValue('D42', $fathersurname);

$sheet->setCellValue('B43', 'FIRST NAME');
$sheet->setCellValue('D43', $fatherfirstname);
$sheet->setCellValue('G43', 'NAME EXTENSION (JR., SR) '.$fatherext)->getStyle('G43')->getFill()
->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
->getStartColor()->setARGB('cfcfcf');

$sheet->setCellValue('B44', 'MIDDLE NAME');
$sheet->setCellValue('D44', $fathermiddlename);

$sheet->setCellValue('A45', '25.');
$sheet->setCellValue('B45', "MOTHER'S MAIDEN NAME");
$sheet->setCellValue('D45', $mothermaidenname);

$sheet->setCellValue('B46', 'SURNAME');
$sheet->setCellValue('D46', $mothersurname );

$sheet->setCellValue('B47', 'FIRST NAME');
$sheet->setCellValue('D47', $motherfirstname);

$sheet->setCellValue('B48', 'MIDDLE NAME');
$sheet->setCellValue('D48', $mothermiddlename);
$sheet->setCellValue('I48', '(Continue on separate sheet if necessary)')->getStyle('I48')->getFill()
->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
->getStartColor()->setARGB('cfcfcf');

$sheet->setCellValue('A49', 'III.  EDUCATIONAL BACKGROUND');

$sheet->setCellValue('A50', '26.');
$sheet->setCellValue('B50', 'LEVEL');
$sheet->setCellValue('D50', 'NAME OF SCHOOL                                                                                                                                         (Write in full)');
$sheet->setCellValue('G50', 'BASIC EDUCATION/DEGREE/COURSE                                                             (Write in full)                     ');
$sheet->setCellValue('J50', 'PERIOD OF ATTENDANCE');
$sheet->setCellValue('L50', 'HIGHEST LEVEL/                     UNITS EARNED       ');
$sheet->setCellValue('M50', 'YEAR GRADUATED ');
$sheet->setCellValue('N50', 'SCHOLARSHIP/ ACADEMIC HONORS RECEIVED');

$sheet->setCellValue('J52', 'From');
$sheet->setCellValue('K52', 'To');


//$query = 'SELECT * FROM tbl_service_record  WHERE EMPID = "'.$_POST['employeeiddb'].'" AND CANCELLED = "N" ';
$query = "SELECT * FROM tbl_employee_children WHERE EMPID = '5' AND CANCELLED = 'N'  
ORDER BY `DOB` ASC";
$result = mysqli_query($connect, $query);
$rowNum=36;
if($result){
    while($row = mysqli_fetch_array($result)){
        $sheet->mergeCells('I'.((int)$rowNum).':L'.((int)$rowNum));
        $sheet->mergeCells('M'.((int)$rowNum).':N'.((int)$rowNum));
        $sheet->setCellValue('I'.$rowNum,$row['FULLNAME'])
        ->setCellValue('M'.$rowNum, $row['DOB']);
        $rowNum++;
    }
}


$query = "SELECT * FROM tbl_employee_educ_background WHERE EMPID = '5' AND CANCELLED = 'N'  
ORDER BY  `tbl_employee_educ_background`.`LEVEL`= 'GRADSTUD', `tbl_employee_educ_background`.`LEVEL`= 'COLLEGE',`tbl_employee_educ_background`.`LEVEL`= 'VOC',`tbl_employee_educ_background`.`LEVEL`= 'SEC',`tbl_employee_educ_background`.`LEVEL`= 'ELEM' DESC";
$result = mysqli_query($connect, $query);
$rowNum=53;
if($result){
    while($row = mysqli_fetch_array($result)){
        $sheet->mergeCells('B'.((int)$rowNum).':C'.((int)$rowNum));
        $sheet->mergeCells('D'.((int)$rowNum).':F'.((int)$rowNum));
        $sheet->mergeCells('G'.((int)$rowNum).':I'.((int)$rowNum));
        $sheet->setCellValue('B'.$rowNum,$row['LEVEL'])
        ->setCellValue('D'.$rowNum, $row['SCHOOLNAME'])
        ->setCellValue('G'.$rowNum, $row['BASICEDUCATION'])
        ->setCellValue('J'.$rowNum, $row['PERIODFROM'])
        ->setCellValue('K'.$rowNum, $row['PERIODTO'])
        ->setCellValue('L'.$rowNum, $row['HIGHESTLEVEL'])
        ->setCellValue('M'.$rowNum, $row['YEARGRADUATED'])
        ->setCellValue('N'.$rowNum, $row['HONORRECEIVED']);
        $rowNum++;
    }
}

$sheet->setCellValue('A'.((int)$rowNum+1), '(Continue on separate sheet if necessary)')->getStyle('A'.((int)$rowNum+1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->setCellValue('A'.((int)$rowNum+2), 'SIGNATURE');
$sheet->setCellValue('D'.((int)$rowNum+2), ' ');
$sheet->setCellValue('J'.((int)$rowNum+2), 'DATE');
$sheet->setCellValue('L'.((int)$rowNum+2), ' ');


$sheet->setCellValue('A'.((int)$rowNum+3), '(CS FORM 212 (Revised 2017), Page 1 of 4)');
                               

//LINE 58
$sheet->mergeCells('A'.((int)$rowNum+1).':N'.((int)$rowNum+1));

//SIGNATURE AREA
$sheet->mergeCells('A'.((int)$rowNum+2).':C'.((int)$rowNum+2));
$sheet->mergeCells('D'.((int)$rowNum+2).':I'.((int)$rowNum+2));
$sheet->mergeCells('J'.((int)$rowNum+2).':K'.((int)$rowNum+2));
$sheet->mergeCells('L'.((int)$rowNum+2).':N'.((int)$rowNum+2));

$sheet->mergeCells('A'.((int)$rowNum+3).':N'.((int)$rowNum+3));


$sheet->mergeCells('A1:N1');
$sheet->mergeCells('A2:N2');
$sheet->mergeCells('A3:N3');
$sheet->mergeCells('A4:N4');
$sheet->mergeCells('A5:N5');
$sheet->mergeCells('A7:J7');
$sheet->mergeCells('A9:N9')->getStyle('A9:N9')->getFill()
->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
->getStartColor()->setARGB('828583');
$sheet->mergeCells('L7:N7');
$sheet->mergeCells('D12:N12');
$sheet->mergeCells('B10:C10')->getStyle('B10:C10')->getFill()
->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
->getStartColor()->setARGB('cfcfcf');
$sheet->mergeCells('D10:N10');
$sheet->mergeCells('B11:C11');
$sheet->mergeCells('D11:K11');
$sheet->mergeCells('L11:N11');
$sheet->mergeCells('B12:C12');
$sheet->mergeCells('D12:N12');
$sheet->mergeCells('B13:C14');
$sheet->mergeCells('D13:F14');
$sheet->mergeCells('G13:I16');
$sheet->mergeCells('J13:N13');
$sheet->mergeCells('J14:N14');

$sheet->mergeCells('B15:C15');
$sheet->mergeCells('D15:F15');
$sheet->mergeCells('J15:N15');



$sheet->mergeCells('B16:C16');
$sheet->mergeCells('D16:F16');
$sheet->mergeCells('J16:N16');

$sheet->mergeCells('B17:C20');
$sheet->mergeCells('D17:F20');
$sheet->mergeCells('G17:H22');
$sheet->mergeCells('I17:K17');
$sheet->mergeCells('L17:N17');

$sheet->mergeCells('I18:K18');
$sheet->mergeCells('L18:N18');

$sheet->mergeCells('I19:K19');
$sheet->mergeCells('L19:N19');

$sheet->mergeCells('I20:K20');
$sheet->mergeCells('L20:N20');

$sheet->mergeCells('A21:A22');
$sheet->mergeCells('B21:C22');
$sheet->mergeCells('D21:F22');
$sheet->mergeCells('I21:K21');
$sheet->mergeCells('L21:N21');
$sheet->mergeCells('I22:K22');
$sheet->mergeCells('L22:N22');
$sheet->mergeCells('B23:C23');
$sheet->mergeCells('D23:F23');
$sheet->mergeCells('G23:H23');
$sheet->mergeCells('I23:N23');
$sheet->mergeCells('A24:A25');
$sheet->mergeCells('B24:C25');
$sheet->mergeCells('D24:F25');
$sheet->mergeCells('G24:H29');
$sheet->mergeCells('I24:K24');
$sheet->mergeCells('L24:N24');
$sheet->mergeCells('I25:K25');
$sheet->mergeCells('L25:N25');


$sheet->mergeCells('A26:A27');
$sheet->mergeCells('B26:C27');
$sheet->mergeCells('D26:F27');
$sheet->mergeCells('I26:K26');
$sheet->mergeCells('L26:N26');
$sheet->mergeCells('I27:K27');
$sheet->mergeCells('L27:N27');

$sheet->mergeCells('A28:A29');
$sheet->mergeCells('B28:C29');
$sheet->mergeCells('D28:F29');
$sheet->mergeCells('I28:K28');
$sheet->mergeCells('L28:N28');
$sheet->mergeCells('I29:K29');
$sheet->mergeCells('L29:N29');

$sheet->mergeCells('B30:C30');
$sheet->mergeCells('D30:F30');
$sheet->mergeCells('G30:H30');
$sheet->mergeCells('I30:N30');

$sheet->mergeCells('B31:C31');
$sheet->mergeCells('D31:F31');
$sheet->mergeCells('G31:H31');
$sheet->mergeCells('I31:N31');

$sheet->mergeCells('B32:C32');
$sheet->mergeCells('D32:F32');
$sheet->mergeCells('G32:H32');
$sheet->mergeCells('I32:N32');

$sheet->mergeCells('B33:C33');
$sheet->mergeCells('D33:F33');
$sheet->mergeCells('G33:H33');
$sheet->mergeCells('I33:N33');

$sheet->mergeCells('A34:N34')->getStyle('A34:N34')->getFill()
->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
->getStartColor()->setARGB('828583');

$sheet->mergeCells('B35:C35');
$sheet->mergeCells('D35:H35');
$sheet->mergeCells('I35:L35');
$sheet->mergeCells('M35:N35');

$sheet->mergeCells('B36:C36');
$sheet->mergeCells('D36:F36');
$sheet->mergeCells('G36:H36');

$sheet->mergeCells('B37:C37');
$sheet->mergeCells('D37:H37');

$sheet->mergeCells('B38:C38');
$sheet->mergeCells('D38:H38');

$sheet->mergeCells('B39:C39');
$sheet->mergeCells('D39:H39');

$sheet->mergeCells('B40:C40');
$sheet->mergeCells('D40:H40');

$sheet->mergeCells('B41:C41');
$sheet->mergeCells('D41:H41');

$sheet->mergeCells('B42:C42');
$sheet->mergeCells('D42:H42');

$sheet->mergeCells('B43:C43');
$sheet->mergeCells('D43:F43');
$sheet->mergeCells('G43:H43');

$sheet->mergeCells('B44:C44');
$sheet->mergeCells('D44:H44');

$sheet->mergeCells('B45:C45');
$sheet->mergeCells('D45:H45');

$sheet->mergeCells('B46:C46');
$sheet->mergeCells('D46:H46');

$sheet->mergeCells('B47:C47');
$sheet->mergeCells('D47:H47');

$sheet->mergeCells('B48:C48');
$sheet->mergeCells('D48:H48');
$sheet->mergeCells('I48:N48');

$sheet->mergeCells('A49:N49')->getStyle('A49:N49')->getFill()
->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
->getStartColor()->setARGB('828583');

$sheet->mergeCells('A50:A52');
$sheet->mergeCells('B50:C52');
$sheet->mergeCells('D50:F52');
$sheet->mergeCells('G50:I52');
$sheet->mergeCells('J50:K51');
$sheet->mergeCells('L50:L52');
$sheet->mergeCells('M50:M52');
$sheet->mergeCells('N50:N52');









$sheet->getStyle('A1:N999')
    ->getAlignment()->setWrapText(true); 

$styleArraySample = [
    'font' => [
        'bold'  =>  true,
        'size'  =>  14,
        'name'  =>  'Arial'
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
    ],
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['rgb' => '000000']
        ]
    ]
];


$styleArray = [
    'font' => [
        'bold' => true,
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
        'rotation' => 90,
        'startColor' => [
            'argb' => 'FFA0A0A0',
        ],
        'endColor' => [
            'argb' => 'FFFFFFFF',
        ],
    ],
];



$styleArrayBorder = [
    'borders' => [
        'outline' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
            'color' => ['argb' => '000000'],
        ],
    ],
];

$styleArrayBox = [
    'borders' => [
        'outline' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '000000'],
        ],
    ],
];

$styleArrayBoxThick = [
    'borders' => [
        'outline' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '000000'],
        ],
    ],
];

$styleArrayAllBox = [
    'borders' => [
  		'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN //fine border
        ]
   	 ]
];

$styleArrayInsideBox = [
    'borders' => [
  		'inside' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN //fine border
        ]
   	 ]
];

$styleArrayVerticalBox = [
    'borders' => [
  		'vertical' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN //fine border
        ]
   	 ]
];

$styleArrayHorizontalBox = [
    'borders' => [
  		'horizontal' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN //fine border
        ]
   	 ]
];

$styleArrayHeader = [
    'font' => [
        'bold'  =>  false,
        'size'  =>  22,
        'name'  =>  'Arial Black'
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
    ],
    'borders' => [
        'vertical' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['rgb' => '000000']
        ]
    ]
];

$styleArrayHeaderFontStyle = [
    'font' => [
        'bold'  =>  true,
        'size'  =>  8,
        'name'  =>  'Arial',
        'italic' =>  true
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
    ]

];

$styleArrayLightGrayFill = [

    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
        'rotation' => 90,
        'startColor' => [
            'argb' => 'cfcfcf',
        ]
    ]
    
];

$sheet->getStyle('A1:N'.((int)$rowNum+3))->applyFromArray($styleArrayBorder);
$sheet->getStyle('A3:N3')->applyFromArray($styleArrayHeader);
$sheet->getStyle('A1:A2')->applyFromArray($styleArrayHeaderFontStyle);
$sheet->getStyle('A4:A5')->applyFromArray($styleArrayHeaderFontStyle);
$sheet->getStyle('A50:N55')->applyFromArray($styleArrayInsideBox);
$sheet->getStyle('A50:N55')->applyFromArray($styleArrayInsideBox);
$sheet->getStyle('A10:N33')->applyFromArray($styleArrayInsideBox);
$sheet->getStyle('A22:N48')->applyFromArray($styleArrayInsideBox);
$sheet->getStyle('A10:C33')->applyFromArray($styleArrayLightGrayFill);
$sheet->getStyle('A10:C33')->applyFromArray($styleArrayLightGrayFill);
$sheet->getStyle('A35:C48')->applyFromArray($styleArrayLightGrayFill);
$sheet->getStyle('A50:N52')->applyFromArray($styleArrayLightGrayFill);
$sheet->getStyle('A50:C'.((int)$rowNum+1))->applyFromArray($styleArrayLightGrayFill);







$spreadsheet->createSheet();
// Add some data
$spreadsheet->setActiveSheetIndex(1);//->setCellValue('A1', 'world!');
// Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('C2');
$sheet = $spreadsheet->getActiveSheet();
$sheet->getStyle('A1:N999')
    ->getAlignment()->setWrapText(true); 
// Set active sheet index to the first sheet, so Excel opens this as the first sheet

$sheet->getColumnDimension('A')->setWidth(3);
$sheet->getColumnDimension('B')->setWidth(20);
$sheet->getColumnDimension('C')->setWidth(9);
$sheet->getColumnDimension('D')->setWidth(30);
$sheet->getColumnDimension('E')->setWidth(9);
$sheet->getColumnDimension('F')->setWidth(9);
$sheet->getColumnDimension('G')->setWidth(12);
$sheet->getColumnDimension('H')->setWidth(13);
$sheet->getColumnDimension('I')->setWidth(12);
$sheet->getColumnDimension('J')->setWidth(11);
$sheet->getColumnDimension('K')->setWidth(12);
$sheet->getColumnDimension('L')->setWidth(15);
$sheet->getColumnDimension('M')->setWidth(12);


$sheet->setCellValue('A2', 'IV.  CIVIL SERVICE ELIGIBILITY');
$sheet->setCellValue('A3', "27. CAREER SERVICE/ RA 1080 (BOARD/ BAR) UNDER SPECIAL LAWS/ CES/ CSEE 
BARANGAY ELIGIBILITY / DRIVER'S LICENSE")
->setCellValue('F3', "RATING(If Applicable)")
->setCellValue('G3', "DATE OF EXAMINATION / CONFERMENT")
->setCellValue('I3', "PLACE OF EXAMINATION / CONFERMENT")
->setCellValue('L3', "LICENSE (if applicable)");

$sheet->setCellValue('L4', "NUMBER")
->setCellValue('M4', "Date of Validity");

$sheet->setCellValue('L4', "NUMBER")
->setCellValue('M4', "Date of Validity");

//$query = 'SELECT * FROM tbl_service_record  WHERE EMPID = "'.$_POST['employeeiddb'].'" AND CANCELLED = "N" ';
$query = 'SELECT * FROM tbl_employee_civil_service WHERE EMPID = "'.$id.'" AND CANCELLED = "N" ';


$result = mysqli_query($connect, $query);
$rowNum=5;
if ($result){
    while(($row = mysqli_fetch_array($result)) && ($rowNum < 12)){

        $sheet->mergeCells('A'.((int)$rowNum).':E'.((int)$rowNum));
        $sheet->mergeCells('G'.((int)$rowNum).':H'.((int)$rowNum));
        $sheet->mergeCells('I'.((int)$rowNum).':K'.((int)$rowNum));



        $sheet->setCellValue('A'.$rowNum,$row['ELIGIBILITY'])
        ->setCellValue('F'.$rowNum, $row['RATING'])
        ->setCellValue('G'.$rowNum, $row['DATEOFEXAM'])
        ->setCellValue('I'.$rowNum, $row['PLACEOFEXAM'])
        ->setCellValue('L'.$rowNum, $row['LICENSENUMBER'])
        ->setCellValue('M'.$rowNum, $row['LICENSEDATEOFVALIDITY']);
        $rowNum++;
    }
}

$sheet->setCellValue('A12', '(Continue on separate sheet if necessary)')->getStyle('A12')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->setCellValue('A13', 'V.  WORK EXPERIENCE ');
$sheet->setCellValue('A14', '(Include private employment.  Start from your recent work) Description of duties should be indicated in the attached Work Experience sheet.');
$sheet->setCellValue('A15', '28. INCLUSIVE DATES (mm/dd/yyyy)');
$sheet->setCellValue('D15', 'POSITION TITLE
(Write in full/Do not abbreviate)');
$sheet->setCellValue('G15', 'DEPARTMENT / AGENCY / OFFICE / COMPANY
(Write in full/Do not abbreviate)');
$sheet->setCellValue('J15', 'MONTHLY SALARY');
$sheet->setCellValue('K15', 'SALARY/ JOB/ PAY GRADE (if applicable)& STEP  (Format "00-0")/ INCREMENT');
$sheet->setCellValue('L15', 'STATUS OF APPOINTMENT');
$sheet->setCellValue('M15', "GOV'T SERVICE(Y/ N)");
$sheet->setCellValue('A17', "From");
$sheet->setCellValue('C17', "To");


//$query = 'SELECT * FROM tbl_service_record  WHERE EMPID = "'.$_POST['employeeiddb'].'" AND CANCELLED = "N" ';
$query = 'SELECT * FROM tbl_employee_work_experience WHERE EMPID = "'.$id.'" AND CANCELLED = "N" ORDER BY DATEFROM';


$result = mysqli_query($connect, $query);
$rowNum=18;
if ($result){
    while(($row = mysqli_fetch_array($result)) && ($rowNum < 46)){

        $sheet->mergeCells('A'.((int)$rowNum).':B'.((int)$rowNum));
        $sheet->mergeCells('D'.((int)$rowNum).':F'.((int)$rowNum));
        $sheet->mergeCells('G'.((int)$rowNum).':I'.((int)$rowNum));




        $sheet->setCellValue('A'.$rowNum,$row['DATEFROM'])
        ->setCellValue('C'.$rowNum, $row['DATETO'])
        ->setCellValue('D'.$rowNum, $row['POSITION'])
        ->setCellValue('G'.$rowNum, $row['COMPANY'])
        ->setCellValue('J'.$rowNum, $row['MONTHLYSALARY'])
        ->setCellValue('K'.$rowNum, $row['GRADE'])
        ->setCellValue('L'.$rowNum, $row['STATUS'])
        ->setCellValue('M'.$rowNum, $row['GOVTSERVICE']);
        $rowNum++;
    }
}


$sheet->setCellValue('A46', "(Continue on separate sheet if necessary)")->getStyle('A46')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->setCellValue('A47', 'SIGNATURE');
$sheet->setCellValue('D47', ' ');
$sheet->setCellValue('J47', 'DATE');
$sheet->setCellValue('L47', ' ');

$sheet->setCellValue('A48', '(CS FORM 212 (Revised 2017), Page 2 of 4)');


$sheet->mergeCells('A2:M2')->getStyle('A2:M2')->getFill()
->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
->getStartColor()->setARGB('828583');
$sheet->mergeCells('A3:E4');


$sheet->mergeCells('A13:M13')->getStyle('A13:A13')->getFill()
->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
->getStartColor()->setARGB('828583');

$sheet->mergeCells('A14:M14')->getStyle('A14:A14')->getFill()
->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
->getStartColor()->setARGB('828583');

$sheet->mergeCells('F3:F4');
$sheet->mergeCells('G3:H4');
$sheet->mergeCells('I3:K4');
$sheet->mergeCells('L3:M3');
$sheet->mergeCells('A12:M12');
$sheet->mergeCells('A13:M13');
$sheet->mergeCells('A15:C16');
$sheet->mergeCells('D15:F17');
$sheet->mergeCells('A17:B17');
$sheet->mergeCells('G15:I17');
$sheet->mergeCells('J15:J17');
$sheet->mergeCells('K15:K17');
$sheet->mergeCells('L15:L17');
$sheet->mergeCells('M15:M17');
$sheet->mergeCells('A46:M46');
$sheet->mergeCells('A47:C47');
$sheet->mergeCells('A48:M48');

$sheet->getStyle('A3:M4')->applyFromArray($styleArrayLightGrayFill);
$sheet->getStyle('A12:M12')->applyFromArray($styleArrayLightGrayFill);
$sheet->getStyle('A15:M17')->applyFromArray($styleArrayLightGrayFill);
$sheet->getStyle('A46:M46')->applyFromArray($styleArrayLightGrayFill);
$sheet->getStyle('A47:C47')->applyFromArray($styleArrayLightGrayFill);
$sheet->getStyle('I47')->applyFromArray($styleArrayLightGrayFill);
$sheet->getStyle('A1:M48')->applyFromArray($styleArrayBorder);

$sheet->getStyle('A3:M11')->applyFromArray($styleArrayInsideBox);
$sheet->getStyle('A15:M45')->applyFromArray($styleArrayInsideBox);
$sheet->getStyle('A46:M48')->applyFromArray($styleArrayInsideBox);





$spreadsheet->createSheet();
// Add some data
$spreadsheet->setActiveSheetIndex(2);//->setCellValue('A1', 'world!');
// Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('C3');
$sheet = $spreadsheet->getActiveSheet();
$sheet->getStyle('A1:N999')
    ->getAlignment()->setWrapText(true); 


    $sheet->getColumnDimension('A')->setWidth(3);
    $sheet->getColumnDimension('B')->setWidth(20);
    $sheet->getColumnDimension('C')->setWidth(9);
    $sheet->getColumnDimension('D')->setWidth(30);
    $sheet->getColumnDimension('E')->setWidth(9);
    $sheet->getColumnDimension('F')->setWidth(9);
    $sheet->getColumnDimension('G')->setWidth(12);
    $sheet->getColumnDimension('H')->setWidth(13);
    $sheet->getColumnDimension('I')->setWidth(12);
    $sheet->getColumnDimension('J')->setWidth(11);
    $sheet->getColumnDimension('K')->setWidth(12);


    $sheet->setCellValue('A2', 'VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S');
    $sheet->setCellValue('A3', "29. NAME & ADDRESS OF ORGANIZATION 
    (Write in full)")
    ->setCellValue('E3', "INCLUSIVE DATES
    (mm/dd/yyyy)")
    ->setCellValue('G3', "NUMBER OF HOURS")
    ->setCellValue('H3', "POSITION / NATURE OF WORK");
    $sheet->setCellValue('E5', 'From');
    $sheet->setCellValue('F5', 'To');

    $query = 'SELECT * FROM tbl_employee_voluntary_work WHERE EMPID = "'.$id.'" AND CANCELLED = "N" ORDER BY DATEFROM';

    $result = mysqli_query($connect, $query);
    $rowNum=6;
    if ($result){
        while(($row = mysqli_fetch_array($result)) && ($rowNum < 13)){

            $sheet->mergeCells('A'.((int)$rowNum).':D'.((int)$rowNum));
            $sheet->mergeCells('H'.((int)$rowNum).':K'.((int)$rowNum));

            $sheet->setCellValue('A'.$rowNum,$row['ORGANIZATION'])
            ->setCellValue('E'.$rowNum, $row['DATEFROM'])
            ->setCellValue('F'.$rowNum, $row['DATETO'])
            ->setCellValue('G'.$rowNum, $row['NOOFHOURS'])
            ->setCellValue('H'.$rowNum, $row['POSITION']);
            $rowNum++;
        }
    }
    $sheet->setCellValue('A13', '(Continue on separate sheet if necessary)')->getStyle('A13')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    $sheet->setCellValue('A14', 'VII.  LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING PROGRAMS ATTENDED');
    $sheet->setCellValue('A15', '(Start from the most recent L&D/training program and include only the relevant L&D/training taken for the last five (5) years for Division Chief/Executive/Managerial positions)');

    //$sheet->setCellValue('A16', '');
    $sheet->setCellValue('A16', '30. TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS
    (Write in full)');
    $sheet->setCellValue('E16', 'INCLUSIVE DATES OF ATTENDANCE
    (mm/dd/yyyy)');
    $sheet->setCellValue('G16', 'NUMBER OF HOURS');
    $sheet->setCellValue('H16', 'Type of LD
    ( Managerial/ Supervisory/
   Technical/etc) ');
   $sheet->setCellValue('I16', 'Type of LD
   ( Managerial/ Supervisory/
  Technical/etc) ');

    $sheet->setCellValue('E18', 'From');
    $sheet->setCellValue('F18', 'To');

    $query = 'SELECT * FROM tbl_employee_ld WHERE EMPID = "'.$id.'" AND CANCELLED = "N" ORDER BY DATEFROM';

    $result = mysqli_query($connect, $query);
    $rowNum=19;
    if ($result){
        while(($row = mysqli_fetch_array($result)) && ($rowNum < 40)){

            $sheet->mergeCells('A'.((int)$rowNum).':D'.((int)$rowNum));
            $sheet->mergeCells('I'.((int)$rowNum).':K'.((int)$rowNum));

            $sheet->setCellValue('A'.$rowNum,$row['PROGRAM'])
            ->setCellValue('E'.$rowNum, $row['DATEFROM'])
            ->setCellValue('F'.$rowNum, $row['DATETO'])
            ->setCellValue('G'.$rowNum, $row['NOOFHOURS'])
            ->setCellValue('H'.$rowNum, $row['TYPE'])
            ->setCellValue('I'.$rowNum, $row['SPONSOREDBY']);
            $rowNum++;
        }
    }
    $sheet->setCellValue('A40', '(Continue on separate sheet if necessary)')->getStyle('A50')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    $sheet->setCellValue('A41', 'VIII.  OTHER INFORMATION');
    $sheet->setCellValue('A42', '31. SPECIAL SKILLS and HOBBIES');
    $sheet->setCellValue('C42', '32. NON-ACADEMIC DISTINCTIONS / RECOGNITION
    (Write in full)');
    $sheet->setCellValue('I42', '33. MEMBERSHIP IN ASSOCIATION/ORGANIZATION
    (Write in full)');

    $query = 'SELECT * FROM tbl_employee_other_skills WHERE EMPID = "'.$id.'" AND CANCELLED = "N" ';

    $result = mysqli_query($connect, $query);
    $rowNum=43;
    if ($result){
        while(($row = mysqli_fetch_array($result)) && ($rowNum < 50)){

            $sheet->mergeCells('A'.((int)$rowNum).':B'.((int)$rowNum));

            $sheet->setCellValue('A'.$rowNum,$row['SKILLS']);
            $rowNum++;
        }
    }

    $query = 'SELECT * FROM tbl_employee_other_recognition WHERE EMPID = "'.$id.'" AND CANCELLED = "N" ';

    $result = mysqli_query($connect, $query);
    $rowNum=43;
    if ($result){
        while(($row = mysqli_fetch_array($result)) && ($rowNum < 50)){

            $sheet->mergeCells('C'.((int)$rowNum).':H'.((int)$rowNum));

            $sheet->setCellValue('C'.$rowNum,$row['RECOGNITION']);
            $rowNum++;
        }
    }

    $query = 'SELECT * FROM tbl_employee_other_membership WHERE EMPID = "'.$id.'" AND CANCELLED = "N" ';

    $result = mysqli_query($connect, $query);
    $rowNum=43;
    if ($result){
        while(($row = mysqli_fetch_array($result)) && ($rowNum < 50)){

            $sheet->mergeCells('I'.((int)$rowNum).':K'.((int)$rowNum));

            $sheet->setCellValue('I'.$rowNum,$row['MEMBERSHIP']);
            $rowNum++;
        }
    }

    $sheet->setCellValue('A50', "(Continue on separate sheet if necessary)")->getStyle('A50')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->setCellValue('A51', 'SIGNATURE');
    $sheet->setCellValue('C51', ' ');
    $sheet->setCellValue('G51', 'DATE');
    $sheet->setCellValue('I51', ' ');

    $sheet->setCellValue('A52', '(CS FORM 212 (Revised 2017), Page 3 of 4)')->getStyle('A52')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);


    $sheet->mergeCells('A2:K2')->getStyle('A2:K2')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('828583');
    $sheet->mergeCells('A3:D5');
    $sheet->mergeCells('E3:F4');
    $sheet->mergeCells('G3:G5');
    $sheet->mergeCells('H3:K5');
    $sheet->mergeCells('A13:K13');
    
    
    $sheet->mergeCells('A14:K14')->getStyle('A14:K14')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('828583');
    
    $sheet->mergeCells('A15:K15')->getStyle('A15:K15')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('828583');
    
    $sheet->mergeCells('A16:D18');
    $sheet->mergeCells('E16:F17');
    $sheet->mergeCells('G16:G18');
    $sheet->mergeCells('H16:H18');
    $sheet->mergeCells('I16:K18');

    $sheet->mergeCells('A40:K40');

    $sheet->mergeCells('A41:K41')->getStyle('A41:K41')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('828583');

    $sheet->mergeCells('A42:B42');
    $sheet->mergeCells('C42:H42');
    $sheet->mergeCells('I42:K42');
    $sheet->mergeCells('A50:K50');
    $sheet->mergeCells('A51:B51');
    $sheet->mergeCells('C51:F51');
    $sheet->mergeCells('G51:H51');
    $sheet->mergeCells('I51:K51');
    $sheet->mergeCells('A52:K52');

    
    $sheet->getStyle('A3:K5')->applyFromArray($styleArrayLightGrayFill);
    $sheet->getStyle('A13:K13')->applyFromArray($styleArrayLightGrayFill);
    
    $sheet->getStyle('A40:K40')->applyFromArray($styleArrayLightGrayFill);
    $sheet->getStyle('A42:K42')->applyFromArray($styleArrayLightGrayFill);
    $sheet->getStyle('A50:K50')->applyFromArray($styleArrayLightGrayFill);
    $sheet->getStyle('A51:B51')->applyFromArray($styleArrayLightGrayFill);
    $sheet->getStyle('G51:H51')->applyFromArray($styleArrayLightGrayFill);
    
    
    $sheet->getStyle('A1:K52')->applyFromArray($styleArrayBorder);
    
    $sheet->getStyle('A1:K52')->applyFromArray($styleArrayInsideBox);


    $sheet->mergeCells('A2:K2')->getStyle('A2:K2')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('828583');
    $sheet->mergeCells('A3:D5');
    $sheet->mergeCells('E3:F4');
    $sheet->mergeCells('G3:G5');
    $sheet->mergeCells('H3:K5');
    $sheet->mergeCells('A13:K13');
    
    
    $sheet->mergeCells('A14:K14')->getStyle('A14:K14')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('828583');
    
    $sheet->mergeCells('A15:K15')->getStyle('A15:K15')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('828583');
    
    $sheet->mergeCells('A16:D18');
    $sheet->mergeCells('E16:F17');
    $sheet->mergeCells('G16:G18');
    $sheet->mergeCells('H16:H18');
    $sheet->mergeCells('I16:K18');

    $sheet->mergeCells('A40:K40');

    $sheet->mergeCells('A41:K41')->getStyle('A41:K41')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('828583');

    $sheet->mergeCells('A42:B42');
    $sheet->mergeCells('C42:H42');
    $sheet->mergeCells('I42:K42');
    $sheet->mergeCells('A50:K50');
    $sheet->mergeCells('A51:B51');
    $sheet->mergeCells('C51:F51');
    $sheet->mergeCells('G51:H51');
    $sheet->mergeCells('I51:K51');
    $sheet->mergeCells('A52:K52');

    
    $sheet->getStyle('A3:K5')->applyFromArray($styleArrayLightGrayFill);
    $sheet->getStyle('A13:K13')->applyFromArray($styleArrayLightGrayFill);
    
    $sheet->getStyle('A40:K40')->applyFromArray($styleArrayLightGrayFill);
    $sheet->getStyle('A42:K42')->applyFromArray($styleArrayLightGrayFill);
    $sheet->getStyle('A50:K50')->applyFromArray($styleArrayLightGrayFill);
    $sheet->getStyle('A51:B51')->applyFromArray($styleArrayLightGrayFill);
    $sheet->getStyle('G51:H51')->applyFromArray($styleArrayLightGrayFill);
    
    
    $sheet->getStyle('A1:K52')->applyFromArray($styleArrayBorder);
    
    $sheet->getStyle('A1:K52')->applyFromArray($styleArrayInsideBox);





    

$spreadsheet->createSheet();
// Add some data
$spreadsheet->setActiveSheetIndex(3);//->setCellValue('A1', 'world!');
// Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('C4');
$sheet = $spreadsheet->getActiveSheet();
$sheet->getStyle('A1:N999')
    ->getAlignment()->setWrapText(true); 


    $sheet->getColumnDimension('A')->setWidth(3);
    $sheet->getColumnDimension('B')->setWidth(3);
    $sheet->getColumnDimension('C')->setWidth(20);
    $sheet->getColumnDimension('D')->setWidth(30);
    $sheet->getColumnDimension('E')->setWidth(5);
    $sheet->getColumnDimension('F')->setWidth(40);
    $sheet->getColumnDimension('G')->setWidth(7);
    $sheet->getColumnDimension('H')->setWidth(8);
    $sheet->getColumnDimension('I')->setWidth(3);
    $sheet->getColumnDimension('J')->setWidth(3);
    $sheet->getColumnDimension('K')->setWidth(12);
    $sheet->getColumnDimension('L')->setWidth(20);
    $sheet->getColumnDimension('M')->setWidth(3);


   

$sheet->setCellValue('A2', '34. Are you related by consanguinity or affinity to the appointing or recommending authority, or to the
chief of bureau or office or to the person who has immediate supervision over you in the Office, 
Bureau or Department where you will be apppointed,
a. within the third degree?
b. within the fourth degree (for Local Government Unit - Career Employees)?');

$sheet->setCellValue('G2', '



[ ] Yes             [ ] No
[ ] Yes             [ ] No
If YES, give details: ________________________________  ________________________________');

$sheet->setCellValue('A13', '35. a. Have you ever been found guilty of any administrative offense?


b. Have you been criminally charged before any court?');

$sheet->setCellValue('G13', '[ ] Yes             [ ] No
If YES, give details: 

[ ] Yes             [ ] No
If YES, give details: 
Date Filed: ________________________________
Status of Case/s: ________________________________
');

$sheet->setCellValue('A23', '36. Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?');
$sheet->setCellValue('G23', '[ ] Yes             [ ] No
If YES, give details: ________________________________
');

$sheet->setCellValue('A27', '37. Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector?');
$sheet->setCellValue('G27', '[ ] Yes             [ ] No
If YES, give details: ________________________________
');

$sheet->setCellValue('A31', '38. a. Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?

b. Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?');
$sheet->setCellValue('G31', '[ ] Yes             [ ] No
If YES, give details: ________________________________

[ ] Yes             [ ] No
If YES, give details: ________________________________
');

$sheet->setCellValue('A37', '39. Have you acquired the status of an immigrant or permanent resident of another country?');
$sheet->setCellValue('G37', '

[ ] Yes             [ ] No
If YES, give details (country): ________________________________

');

$sheet->setCellValue('A41', "40. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:
    
    a. Are you a member of any indigenous group?
    
    
    b. Are you a person with disability?
    
    
    c. Are you a solo parent?");
$sheet->setCellValue('G41', '[ ] Yes             [ ] No
If YES, please specify: ________________________________


[ ] Yes             [ ] No
If YES, please specify: ________________________________


[ ] Yes             [ ] No
If YES, please specify: ________________________________

');

$sheet->setCellValue('A50', '41. REFERENCES (Person not related by consanguinity or affinity to applicant /appointee)');
$sheet->setCellValue('A51', 'NAME');
$sheet->setCellValue('F51', 'ADDRESS');
$sheet->setCellValue('G51', 'TEL. NO');

$sheet->setCellValue('A55', '42. I declare under oath that I have personally accomplished this Personal Data Sheet which is a true, correct and complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the Philippines. I authorize the agency head/authorized representative to verify/validate the contents stated herein.          I  agree that any misrepresentation made in this document and its attachments shall cause the filing of administrative/criminal case/s against me.');
$sheet->setCellValue('K56', 'PHOTO')->getStyle('K56')
->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue('B60', "Government Issued ID (i.e.Passport, GSIS, SSS, PRC, Driver's License, etc.)
PLEASE INDICATE ID Number and Date of Issuance");
$sheet->setCellValue('B61', "Government Issued ID: ");
$sheet->setCellValue('B62', "ID/License/Passport No.: ");
$sheet->setCellValue('B63', "Date/Place of Issuance:");

$sheet->setCellValue('F63', "Signature (Sign inside the box)")->getStyle('F63')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->setCellValue('F65', "Date Accomplished")->getStyle('F65')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->setCellValue('K65', "Right Thumbmark")->getStyle('K65')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue('A67', "SUBSCRIBED AND SWORN to before me this _____________________________________, affiant exhibiting his/her validly issued government ID as indicated above.");
$sheet->setCellValue('E69', "Person Administering Oath")->getStyle('E69')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->setCellValue('A71', "CS FORM 212 (Revised 2017),  Page 4 of 4")->getStyle('A71:M71')
->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

$sheet->mergeCells('A2:F12');
$sheet->mergeCells('G2:M12');

$sheet->mergeCells('A13:F22');
$sheet->mergeCells('G13:M22');

$sheet->mergeCells('A23:F26');
$sheet->mergeCells('G23:M26');

$sheet->mergeCells('A27:F30');
$sheet->mergeCells('G27:M30');

$sheet->mergeCells('A31:F36');
$sheet->mergeCells('G31:M36');

$sheet->mergeCells('A37:F40');
$sheet->mergeCells('G37:M40');

$sheet->mergeCells('A41:F49');
$sheet->mergeCells('G41:M49');

$sheet->mergeCells('A50:I50');
$sheet->mergeCells('A51:E51')->getStyle('A51:I51')
->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->mergeCells('G51:I51');

$sheet->mergeCells('A52:E52');
$sheet->mergeCells('A53:E53');
$sheet->mergeCells('A54:E54');
$sheet->mergeCells('G52:I52');
$sheet->mergeCells('G53:I53');
$sheet->mergeCells('G54:I54');

$sheet->mergeCells('A55:I58');
$sheet->mergeCells('K56:L56');

$sheet->mergeCells('B60:D60');
$sheet->mergeCells('B61:D61');
$sheet->mergeCells('B62:D62');
$sheet->mergeCells('B63:D63');
$sheet->mergeCells('F60:I62');

$sheet->mergeCells('K58:L64');
$sheet->mergeCells('K65:L65');

$sheet->mergeCells('F63:I63');
$sheet->mergeCells('F64:I64');
$sheet->mergeCells('F65:I65');

$sheet->mergeCells('A67:M67');
$sheet->mergeCells('E68:I68');
$sheet->mergeCells('E69:I69');
$sheet->mergeCells('A71:M71');

$spreadsheet->getActiveSheet()->getRowDimension('50')->setRowHeight(20, 'pt');
$spreadsheet->getActiveSheet()->getRowDimension('52')->setRowHeight(30, 'pt');
$spreadsheet->getActiveSheet()->getRowDimension('53')->setRowHeight(30, 'pt');
$spreadsheet->getActiveSheet()->getRowDimension('54')->setRowHeight(30, 'pt');
$spreadsheet->getActiveSheet()->getRowDimension('55')->setRowHeight(40, 'pt');
$spreadsheet->getActiveSheet()->getRowDimension('68')->setRowHeight(100, 'pt');

$sheet->getStyle('A2:M71')->applyFromArray($styleArrayBorder);
$sheet->getStyle('A2:F49')->applyFromArray($styleArrayLightGrayFill);
$sheet->getStyle('A50:I51')->applyFromArray($styleArrayLightGrayFill);
$sheet->getStyle('A55:I58')->applyFromArray($styleArrayLightGrayFill);
$sheet->getStyle('B60:D60')->applyFromArray($styleArrayLightGrayFill);
$sheet->getStyle('F63:I63')->applyFromArray($styleArrayLightGrayFill);
$sheet->getStyle('F65:I65')->applyFromArray($styleArrayLightGrayFill);
$sheet->getStyle('K65:L65')->applyFromArray($styleArrayLightGrayFill);
$sheet->getStyle('E69:I69')->applyFromArray($styleArrayLightGrayFill);

$sheet->getStyle('A2:M49')->applyFromArray($styleArrayInsideBox);
$sheet->getStyle('A50:I54')->applyFromArray($styleArrayInsideBox);
$sheet->getStyle('B60:D63')->applyFromArray($styleArrayInsideBox);
$sheet->getStyle('F60:I65')->applyFromArray($styleArrayInsideBox);
$sheet->getStyle('K58:L65')->applyFromArray($styleArrayInsideBox);
$sheet->getStyle('E68:I69')->applyFromArray($styleArrayInsideBox);

$sheet->getStyle('A50:I50')->applyFromArray($styleArrayBorder);
$sheet->getStyle('A51:I54')->applyFromArray($styleArrayBorder);
$sheet->getStyle('A55:I58')->applyFromArray($styleArrayBorder);
$sheet->getStyle('B60:D63')->applyFromArray($styleArrayBorder);
$sheet->getStyle('F60:I65')->applyFromArray($styleArrayBorder);
$sheet->getStyle('K58:L65')->applyFromArray($styleArrayBorder);
$sheet->getStyle('E68:I69')->applyFromArray($styleArrayBorder);
$sheet->getStyle('A71:M71')->applyFromArray($styleArrayBorder);


$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setPath("2x2.jpg");
$drawing->setName('2x2');
$drawing->setCoordinates('k51');
$drawing->setWidthAndHeight(132,170);
$drawing->setWorksheet($sheet); 

$spreadsheet->setActiveSheetIndex(0);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="PDS.xlsx"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');