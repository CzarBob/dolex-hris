<?php
include "dbConnection.php";
require 'vendor/vendor/autoload.php';
session_start();
date_default_timezone_set('Asia/Manila');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$spreadsheet->getDefaultStyle()->getFont()->setName('Arial Narrow');
/*$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setPath("img/dolelogogs.png");
$drawing->setName('DOLE LOGO');
$drawing->setCoordinates('C5');
$drawing->setWidthAndHeight(50,50);
$drawing->setWorksheet($sheet);  */


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

/*
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
    }*/


$sheet->getColumnDimension('A')->setWidth(2);
//$spreadsheet->getActiveSheet()->getRowDimension('1')->setRowHeight(1);
$spreadsheet->getActiveSheet()->getRowDimension('6')->setRowHeight(1);
$spreadsheet->getActiveSheet()->getRowDimension('8')->setRowHeight(1);

$sheet->setCellValue('A1', 'CS Form No. 212');
$sheet->setCellValue('A2', 'Revised 2017');
$sheet->setCellValue('A3', 'PERSONAL DATA SHEET');
$sheet->setCellValue('A4', 'WARNING: Any misrepresentation made in the Personal Data Sheet and the Work Experience Sheet shall cause the filing of administrative/criminal case/s against the person concerned.');
$sheet->setCellValue('A5', 'READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS) BEFORE ACCOMPLISHING THE PDS FORM.');
$sheet->setCellValue('A7', 'Print legibly. Tick appropriate boxes (     ) and use separate sheet if necessary. Indicate N/A if not applicable.  DO NOT ABBREVIATE.');
$sheet->setCellValue('K7', '1. CS ID No.');
$sheet->setCellValue('L7', ' (Do not fill up. For CSC use only)');
$sheet->setCellValue('A9', 'I. PERSONAL INFORMATION');
$sheet->setCellValue('A10', '2.');
$sheet->setCellValue('B10', 'SURNAME');
$sheet->setCellValue('D10', $lastname);//
$sheet->setCellValue('B11', 'FIRST NAME');
$sheet->setCellValue('D11',  $firstname);//
$sheet->setCellValue('L11', 'NAME EXTENSION (JR., SR)    ');//
$sheet->setCellValue('B12', 'MIDDLE NAME');
$sheet->setCellValue('D12', $middlename);//
$sheet->setCellValue('A13', '3.');
$sheet->setCellValue('B13', 'DATE OF BIRTH 
(mm/dd/yyyy)  ');
$sheet->setCellValue('D13', $dob);//
$sheet->setCellValue('G13', '16. CITIZENSHIP');
$sheet->setCellValue('J13', 'BOX');
$sheet->setCellValue('K13', 'FILIPINO');
$sheet->setCellValue('L13', 'BOX');
$sheet->setCellValue('M13', 'DUAL CITIZENSHIP');
$sheet->setCellValue('K14', 'BOX');
$sheet->setCellValue('L14', 'by birth');
$sheet->setCellValue('M14', 'BOX');
$sheet->setCellValue('N14', 'by naturalization');
$sheet->setCellValue('A15', '4.');
$sheet->setCellValue('B15', 'PLACE OF BIRTH');
$sheet->setCellValue('D15', 'CAGAYAN DE ORO');//
$sheet->setCellValue('G15', 'If holder of  dual citizenship, please indicate the details.');
$sheet->setCellValue('J15', 'Pls. indicate country:');
$sheet->setCellValue('A16', '5.');
$sheet->setCellValue('B16', 'SEX');
$sheet->setCellValue('D16', 'BOX Male');
$sheet->setCellValue('E16', 'BOX Female');
//$sheet->setCellValue('G16', 'If holder of  dual citizenship, ');
$sheet->setCellValue('J16', 'PHILIPPINES');
$sheet->setCellValue('A17', '6.');
$sheet->setCellValue('B17', 'CIVIL STATUS');
$sheet->setCellValue('D17', 'BOX Single');//
$sheet->setCellValue('E17', 'BOX Married');
$sheet->setCellValue('G17', '17. RESIDENTIAL ADDRESS');
$sheet->setCellValue('I17', 'BLOCK 37 LOT 1');
$sheet->setCellValue('L17', 'PHASE 2');
$sheet->setCellValue('D18', 'BOX Widowed');//
$sheet->setCellValue('E17', 'BOX Separated');
$sheet->setCellValue('G17', '17. RESIDENTIAL ADDRESS');
$sheet->setCellValue('I17', 'BLOCK 37 LOT 1');
$sheet->setCellValue('L17', 'PHASE 2');

$sheet->setCellValue('I18', 'House/Block/Lot No.');
$sheet->setCellValue('L18', 'Street');

$sheet->setCellValue('I19', 'NHA KAUSWAGAN');
$sheet->setCellValue('L19', 'KAUSWAGAN');

$sheet->setCellValue('I20', 'Subdivision/Village');
$sheet->setCellValue('L20', 'Barangay');

$sheet->setCellValue('A21', '7.');
$sheet->setCellValue('B21', 'HEIGHT(m)');
$sheet->setCellValue('D21', '1.63');
$sheet->setCellValue('I21', 'CAGAYAN DE ORO');
$sheet->setCellValue('L21', 'HEIGHT(m)');
$sheet->setCellValue('I22', 'City/Municipality');
$sheet->setCellValue('L22', 'Province');

$sheet->setCellValue('A23', '8.');
$sheet->setCellValue('B23', 'WEIGHT(kg)');
$sheet->setCellValue('D23', '71');
$sheet->setCellValue('G23', 'ZIP CODE');
$sheet->setCellValue('I23', '9000');

$sheet->setCellValue('A24', '9.');
$sheet->setCellValue('B24', 'BLOOD TYPE');
$sheet->setCellValue('D24', 'B');
$sheet->setCellValue('G24', '18. PERMANENT ADDRESS');
$sheet->setCellValue('I24', 'BLOCK 37 LOT 1');
$sheet->setCellValue('L24', 'PHASE 2');
$sheet->setCellValue('I25', 'House/Block/Lot No.');
$sheet->setCellValue('L25', 'Street');

$sheet->setCellValue('A26', '10.');
$sheet->setCellValue('B26', 'GSIS ID NO.');
$sheet->setCellValue('D26', '150504110429');
$sheet->setCellValue('I26', 'NHA KAUSWAGAN');
$sheet->setCellValue('L26', 'KAUSWAGAN');
$sheet->setCellValue('I27', 'Subdivision/Village');
$sheet->setCellValue('L27', 'Barangay');

$sheet->setCellValue('A28', '11.');
$sheet->setCellValue('B28', 'PAG-IBIG ID NO.');
$sheet->setCellValue('D28', '121154322333');
$sheet->setCellValue('I28', 'CAGAYAN DE ORO');
$sheet->setCellValue('L28', 'MISAMIS ORIENTAL');
$sheet->setCellValue('I29', 'City/Municipality');
$sheet->setCellValue('L29', 'Province');

$sheet->setCellValue('A30', '12.');
$sheet->setCellValue('B30', 'PHILHEALTH NO.');
$sheet->setCellValue('D30', '150504110429');
$sheet->setCellValue('G30', 'ZIP CODE');
$sheet->setCellValue('I30', '9000');

$sheet->setCellValue('A31', '13.');
$sheet->setCellValue('B31', 'SSS NO.');
$sheet->setCellValue('D31', '150504110429');
$sheet->setCellValue('G31', '19. TELEPHONE NO.');
$sheet->setCellValue('I31', 'N/A');

$sheet->setCellValue('A32', '14.');
$sheet->setCellValue('B32', 'TIN NO.');
$sheet->setCellValue('D32', '323485003');
$sheet->setCellValue('G32', '20. MOBILE NO.');
$sheet->setCellValue('I32', '09568776357');

$sheet->setCellValue('A33', '15.');
$sheet->setCellValue('B33', 'AGENCY EMPLOYEE NO.');
$sheet->setCellValue('D33', 'N/A');
$sheet->setCellValue('G33', '21. E-MAIL ADDRESS (if any)');
$sheet->setCellValue('I33', 'czarbobzambrano@gmail.com');

$sheet->setCellValue('A34', 'II.  FAMILY BACKGROUND');

$sheet->setCellValue('A35', '22.');
$sheet->setCellValue('B35', 'SPOUSE SURNAME');
$sheet->setCellValue('D35', 'N/A');
$sheet->setCellValue('I35', '23. NAME of CHILDREN  (Write full name and list all)');
$sheet->setCellValue('M35', 'DATE OF BIRTH (mm/dd/yyyy) ');

$sheet->setCellValue('B36', 'FIRST NAME');
$sheet->setCellValue('D36', 'N/A');
$sheet->setCellValue('G36', 'NAME EXTENSION (JR., SR)');

$sheet->setCellValue('B37', 'MIDDLE NAME');
$sheet->setCellValue('D37', 'N/A');

$sheet->setCellValue('B38', 'OCCUPATION');
$sheet->setCellValue('D38', 'N/A');

$sheet->setCellValue('B39', 'EMPLOYER/BUSINESS NAME');
$sheet->setCellValue('D39', 'N/A');

$sheet->setCellValue('B40', 'BUSINESS ADDRESS');
$sheet->setCellValue('D40', 'N/A');

$sheet->setCellValue('B41', 'TELEPHONE NO.');
$sheet->setCellValue('D41', 'N/A');

$sheet->setCellValue('A42', '24.');
$sheet->setCellValue('B42', 'FATHER SURNAME');
$sheet->setCellValue('D42', 'N/A');

$sheet->setCellValue('B43', 'FIRST NAME');
$sheet->setCellValue('D43', 'N/A');
$sheet->setCellValue('G43', 'NAME EXTENSION (JR., SR)');

$sheet->setCellValue('B44', 'MIDDLE NAME');
$sheet->setCellValue('D44', 'N/A');

$sheet->setCellValue('A45', '25.');
$sheet->setCellValue('B45', "MOTHER'S MAIDEN NAME");
$sheet->setCellValue('D45', 'CESARIA LICO TEJANO');

$sheet->setCellValue('B46', 'SURNAME');
$sheet->setCellValue('D46', 'TEJANO');

$sheet->setCellValue('B47', 'FIRST NAME');
$sheet->setCellValue('D47', 'N/A');

$sheet->setCellValue('B48', 'MIDDLE NAME');
$sheet->setCellValue('D48', 'N/A');
$sheet->setCellValue('I48', '(Continue on separate sheet if necessary)');

$sheet->setCellValue('A49', 'III.  EDUCATIONAL BACKGROUND');



$sheet->mergeCells('A1:N1');
$sheet->mergeCells('A2:N2');
$sheet->mergeCells('A3:N3');
$sheet->mergeCells('A4:N4');
$sheet->mergeCells('A5:N5');
$sheet->mergeCells('A7:J7');
$sheet->mergeCells('A9:N9');
$sheet->mergeCells('L7:N7');
$sheet->mergeCells('D12:N12');
$sheet->mergeCells('B10:C10');
$sheet->mergeCells('D10:N10');
$sheet->mergeCells('B11:C11');
$sheet->mergeCells('D11:K11');
$sheet->mergeCells('B12:C12');
$sheet->mergeCells('D12:N12');
$sheet->mergeCells('B13:C14');
$sheet->mergeCells('D13:F14');
$sheet->mergeCells('B13:C14');
$sheet->mergeCells('B15:C15');
$sheet->mergeCells('D15:F15');
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
$sheet->mergeCells('G24:H25');
$sheet->mergeCells('I24:K24');
$sheet->mergeCells('L24:N24');
$sheet->mergeCells('I25:K25');
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

$sheet->mergeCells('A34:N34');

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

$sheet->mergeCells('A49:N49');






$sheet->getStyle('A1:K999')
    ->getAlignment()->setWrapText(true); 




$styleArray = [
    'borders' => [
        'bottom' => [
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







$spreadsheet->createSheet();
// Add some data
$spreadsheet->setActiveSheetIndex(1) ->setCellValue('A1', 'world!');
// Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('URL Removed');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$spreadsheet->setActiveSheetIndex(0);






header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="PDS.xlsx"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');