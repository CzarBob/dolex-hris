<?php
include "dbConnection.php";
require 'vendor/vendor/autoload.php';
session_start();
date_default_timezone_set('Asia/Manila');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

/*$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
//$drawing->setPath("../img/dolelogogs.png");
$drawing->setName('DOLE LOGO');
$drawing->setCoordinates('C5');
$drawing->setWidthAndHeight(50,50);
$drawing->setWorksheet($sheet); */ 


//$id = $_SESSION["usernameid"];
$leaveID = $_GET["id"]; //leave ID
/*
$query = 'SELECT 
    tbl_employee.FIRSTNAME as FIRSTNAME,
    tbl_employee.MIDDLENAME as MIDDLENAME,
    tbl_employee.LASTNAME as LASTNAME,
    tbl_employee_profile.DOB as DOB,
    tbl_employee_profile.PLACEOFBIRTH as PLACEOFBIRTH
 
    FROM tbl_employee 
    INNER JOIN tbl_employee_profile ON tbl_employee_profile.EMPID = tbl_employee.ID
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
    }*/


    $leaveType = '';
    $dateOfFilling = '';
    $salary = '';
    $workingDays = '';
    $partOne = '';
    $partTwo = '';
    $partThree = '';
    $partFour   =   '';
    $partFive   =   '';
    $partSix    =   '';
    $headApproveStatus  ='';
    $rdApproveStatus    ='';
    $firstname = '';
    $middlename ='';
    $lastname = '';
    $ext= '';
    $position = '';
    $fieldofficeID = '';
    $divisionID = '';



  
    $query = 'SELECT tbl_leave.LEAVETYPE as LEAVETYPE,
    tbl_leave.DATEOFFILLING as DATEOFFILLING, 
    tbl_leave.SALARY as SALARY, 
    tbl_leave.WORKINGDAYS as WORKINGDAYS,
    tbl_leave.PARTONE as PARTONE,
    tbl_leave.PARTTWO as PARTTWO, 
    tbl_leave.PARTTHREE as PARTTHREE,
    tbl_leave.PARTFOUR as PARTFOUR,
    tbl_leave.PARTFIVE as PARTFIVE, 
    tbl_leave.PARTSIX as PARTSIX, 
    tbl_leave.HEADAPPROVESTATUS as HEADAPPROVESTATUS, 
    tbl_leave.RDAPPROVESTATUS as RDAPPROVESTATUS,
    tbl_employee.FIRSTNAME as FIRSTNAME,
    tbl_employee.MIDDLENAME as MIDDLENAME,
    tbl_employee.LASTNAME as LASTNAME, 
    tbl_employee.EXTENSION as EXTENSION, 
    tbl_employee.POSITION as POSITION, 
    tbl_employee.FIELDOFFICEID as FIELDOFFICEID, 
    tbl_employee.DIVISIONID as DIVISIONID
    
    
    FROM tbl_leave
    INNER JOIN tbl_employee on tbl_leave.EMPID = tbl_employee.ID
    
    WHERE tbl_leave.ID = "'.$leaveID.'"  AND tbl_leave.CANCELLED = "N"';

    //var_dump($query);
    
    $result = mysqli_query($connect, $query);
    ///$rowNum=23;
    if($result){
        while($row = mysqli_fetch_array($result)){
            $leaveType = $row['LEAVETYPE'];
            $dateOfFilling = $row['DATEOFFILLING'];
            $salary = $row['SALARY'];
            $workingDays = $row['WORKINGDAYS'];
            $partOne = $row['PARTONE'];
            $partTwo = $row['PARTTWO'];
            $partThree = $row['PARTTHREE'];
            $partFour   =  $row['PARTFOUR'];
            $partFive   =   $row['PARTFIVE'];
            $partSix    =  $row['PARTSIX'];
            $headApproveStatus  =$row['HEADAPPROVESTATUS'];
            $rdApproveStatus    =$row['RDAPPROVESTATUS'];
            $firstname = $row['FIRSTNAME'];
            $middlename =$row['MIDDLENAME'];
            $lastname = $row['LASTNAME'];
            $ext= $row['EXTENSION'];
            $position = $row['POSITION'];
            $fieldofficeID = $row['FIELDOFFICEID'];
            $divisionID = $row['DIVISIONID'];
            //var_dump($leaveType);
       }
    }
     
$sheet->setCellValue('A1', 'Civil Service Form No.6 (Revised 2020)');
$sheet->setCellValue('A2', "Republic of the Philippines\rDepartment of Labor and Employment\rNorthern Mindanao");

$sheet->setCellValue('A3', 'APPLICATION FOR LEAVE');
$sheet->setCellValue('A4', '1. OFFICE/DEPARTMENT');
$sheet->setCellValue('E4', '2.  NAME :            (Last)                               (First)                         (Middle)');
$sheet->setCellValue('B5', $fieldofficeID)
->setCellValue('E5',$lastname.', '.$firstname.' '.$middlename);

$sheet->setCellValue('A6','3. DATE OF FILLING :'.$dateOfFilling)
->setCellValue('E6','4. POSITION :'.$position)
->setCellValue('H6','5. SALARY :'.$salary);
$sheet->setCellValue('A8','6. DETAILS OF APPLICATION');
$sheet->setCellValue('A9','6.A  TYPE OF LEAVE TO BE AVAILED OF');
$sheet->setCellValue('A11','[ ] Vacation Leave (Sec. 51, Rule XVI, Omnibus Rules Implementing E.O. No. 292)');
$sheet->setCellValue('A13','[ ] Mandatory/Forced Leave(Sec. 25, Rule XVI, Omnibus Rules Implementing E.O. No. 292)');
$sheet->setCellValue('A15','[ ] Sick Leave  (Sec. 43, Rule XVI, Omnibus Rules Implementing E.O. No. 292)');
$sheet->setCellValue('A17','[ ] Maternity Leave (R.A. No. 11210 / IRR issued by CSC, DOLE and SSS)');
$sheet->setCellValue('A19','[ ] Paternity Leave (R.A. No. 8187 / CSC MC No. 71, s. 1998, as amended)');
$sheet->setCellValue('A21','[ ] Special Privilege Leave (Sec. 21, Rule XVI, Omnibus Rules Implementing E.O. No. 292)');
$sheet->setCellValue('A23','[ ] Solo Parent Leave (RA No. 8972 / CSC MC No. 8, s. 2004)');
$sheet->setCellValue('A25','[ ] Study Leave (Sec. 68, Rule XVI, Omnibus Rules Implementing E.O. No. 292)');
$sheet->setCellValue('A27','[ ] 10-Day VAWC Leave (RA No. 9262 / CSC MC No. 15, s. 2005)');
$sheet->setCellValue('A29','[ ] Rehabilitation Privilege (Sec. 55, Rule XVI, Omnibus Rules Implementing E.O. No. 292)');
$sheet->setCellValue('A31','[ ] Special Leave Benefits for Women (RA No. 9710 / CSC MC No. 25, s. 2010)');
$sheet->setCellValue('A33','[ ] Special Emergency (Calamity) Leave (CSC MC No. 2, s. 2012, as amended)');
$sheet->setCellValue('A35','[ ] Adoption Leave (R.A. No. 8552)');
$sheet->setCellValue('A39','Others');
$sheet->setCellValue('B41','__________________________');

$sheet->setCellValue('G9',' 6.B  DETAILS OF LEAVE ');
$sheet->setCellValue('H11',' In case of Vacation/Special Privilege Leave:');
$sheet->setCellValue('H13','[ ] Within the Philippines');
$sheet->setCellValue('H15','[ ] Abroad (Specify)');

$sheet->setCellValue('H17','In case of Sick Leave:');
$sheet->setCellValue('H19','[ ] In Hospital (Specify Illness) _____________________');
$sheet->setCellValue('H21','[ ] Out Patient (Specify Illness)  ____________________');

$sheet->setCellValue('H25','In case of Special Leave Benefits for Women:');
$sheet->setCellValue('H27','(Specify Illness) ________________________________');

$sheet->setCellValue('H31','In case of Study Leave:');
$sheet->setCellValue('H33',"[ ] Completion of Master's Degree");
$sheet->setCellValue('H35','[ ] BAR/Board Examination Review');

$sheet->setCellValue('H37','Other purpose:');
$sheet->setCellValue('H39',"[ ] Not Requested");
$sheet->setCellValue('H41','[ ] Requested');

$sheet->setCellValue('A43','6.C  NUMBER OF WORKING DAYS APPLIED FOR');
$sheet->setCellValue('A45',"___________________________");
$sheet->setCellValue('A47','INCLUSIVE DATES');
$sheet->setCellValue('A48','___________________________');

$sheet->setCellValue('G43','6.D  COMMUTATION ');
$sheet->setCellValue('H45',"[ ] Not Requested");
$sheet->setCellValue('H47','[ ] Requested');

$sheet->setCellValue('G48',"___________________________");
$sheet->setCellValue('H49','(Signature of Applicant)');

$sheet->setCellValue('A50',"7.  DETAILS OF ACTION ON APPLICATION");
$sheet->setCellValue('A51','7.A  CERTIFICATION OF LEAVE CREDITS');
$sheet->setCellValue('C53','As of __________________');
$sheet->setCellValue('D55','Vacation Leave');
$sheet->setCellValue('E55','Sick Leave');
$sheet->setCellValue('C56','Total Earned');
$sheet->setCellValue('C57','Less this application');
$sheet->setCellValue('C58','Balance');
$sheet->setCellValue('C59','HAZEL S. UMBAL');
$sheet->setCellValue('C60','HRMO III');

$sheet->setCellValue('G51','7.B  RECOMMENDATION');
$sheet->setCellValue('H53',"[ ] For Approval");
$sheet->setCellValue('H55','[ ] For Disapproval due to');
$sheet->setCellValue('H59','                     ');
$sheet->setCellValue('H60','(Head of Division/Unit/P/FO or ARD)');

$sheet->setCellValue('A61','7.C  APPROVED FOR:');
$sheet->setCellValue('C62',"days with pay");
$sheet->setCellValue('C63','days without pay');
$sheet->setCellValue('C64','others (Specify)');

$sheet->setCellValue('G61','7.D   DISAPPROVED DUE TO:');

$sheet->setCellValue('A65','ALBERT E. GUTIB');
$sheet->setCellValue('A66','_____________________');
$sheet->setCellValue('A67','REGIONAL DIRECTOR');

$sheet->mergeCells('A1:I1');
$sheet->mergeCells('A2:I2');
$sheet->mergeCells('A3:I3');
$sheet->mergeCells('A4:D4');
$sheet->mergeCells('E4:I4');
$sheet->mergeCells('A8:I8');
$sheet->mergeCells('E5:I5');
$sheet->mergeCells('B5:D5');
$sheet->mergeCells('A8:I8');
$sheet->mergeCells('A6:D6');
$sheet->mergeCells('E6:G6');
$sheet->mergeCells('H6:I6');
$sheet->mergeCells('A9:F9');
$sheet->mergeCells('A11:F11');
$sheet->mergeCells('A13:F13');
$sheet->mergeCells('A15:F15');
$sheet->mergeCells('A17:F17');
$sheet->mergeCells('A19:F19');
$sheet->mergeCells('A21:F21');
$sheet->mergeCells('A23:F23');
$sheet->mergeCells('A25:F25');
$sheet->mergeCells('A27:F27');
$sheet->mergeCells('A29:F29');
$sheet->mergeCells('A31:F31');
$sheet->mergeCells('A33:F33');
$sheet->mergeCells('A35:F35');
$sheet->mergeCells('A39:F39');
$sheet->mergeCells('B41:F41');
$sheet->mergeCells('A43:F43');
$sheet->mergeCells('A45:F45');
$sheet->mergeCells('A47:F47');
$sheet->mergeCells('A48:F48');
$sheet->mergeCells('A50:I50');
$sheet->mergeCells('C53:F53');
$sheet->mergeCells('G9:I9');
$sheet->mergeCells('A51:F51');
$sheet->mergeCells('A61:C61');
$sheet->mergeCells('G61:I61');
$sheet->mergeCells('C59:F59');
$sheet->mergeCells('C60:F60');
$sheet->mergeCells('C62:D62');
$sheet->mergeCells('C63:D63');
$sheet->mergeCells('C64:D64');
$sheet->mergeCells('H11:I11');
$sheet->mergeCells('H13:I13');
$sheet->mergeCells('H15:I15');
$sheet->mergeCells('H17:I17');
$sheet->mergeCells('H19:I19');
$sheet->mergeCells('H21:I21');
$sheet->mergeCells('H25:I25');
$sheet->mergeCells('H27:I27');
$sheet->mergeCells('H31:I31');
$sheet->mergeCells('H33:I33');
$sheet->mergeCells('H35:I35');
$sheet->mergeCells('H37:I37');
$sheet->mergeCells('H41:I41');
$sheet->mergeCells('G43:I43');
$sheet->mergeCells('H45:I45');
$sheet->mergeCells('H47:I47');
$sheet->mergeCells('G48:I48');
$sheet->mergeCells('H49:I49');
$sheet->mergeCells('G51:I51');
$sheet->mergeCells('H53:I53');
$sheet->mergeCells('H55:I55');
$sheet->mergeCells('H60:I60');
$sheet->mergeCells('A65:I65');
$sheet->mergeCells('A66:I66');
$sheet->mergeCells('A67:I67');
$sheet->mergeCells('H39:I39');







$sheet->getStyle('A1:N999')
    ->getAlignment()->setWrapText(true); 
$sheet->getColumnDimension('B')->setWidth(3);
$sheet->getColumnDimension('C')->setWidth(20);
$sheet->getColumnDimension('D')->setWidth(18);
$sheet->getColumnDimension('E')->setWidth(18);
$sheet->getColumnDimension('F')->setWidth(15);
$sheet->getColumnDimension('G')->setWidth(2);
$sheet->getColumnDimension('H')->setWidth(2);
$sheet->getColumnDimension('I')->setWidth(40);


$sheet->getColumnDimension('A')->setWidth(1);
$sheet->getColumnDimension('I')->setWidth(40);
$sheet->getRowDimension('2')->setRowHeight(40);
$sheet->getRowDimension('10')->setRowHeight(5);
$sheet->getRowDimension('12')->setRowHeight(5);
$sheet->getRowDimension('14')->setRowHeight(5);
$sheet->getRowDimension('16')->setRowHeight(5);
$sheet->getRowDimension('18')->setRowHeight(5);
$sheet->getRowDimension('20')->setRowHeight(5);
$sheet->getRowDimension('22')->setRowHeight(5);
$sheet->getRowDimension('24')->setRowHeight(5);
$sheet->getRowDimension('26')->setRowHeight(5);
$sheet->getRowDimension('28')->setRowHeight(5);
$sheet->getRowDimension('30')->setRowHeight(5);
$sheet->getRowDimension('32')->setRowHeight(5);
$sheet->getRowDimension('34')->setRowHeight(5);
$sheet->getRowDimension('36')->setRowHeight(5);
$sheet->getRowDimension('38')->setRowHeight(5);
$sheet->getRowDimension('40')->setRowHeight(5);
$sheet->getRowDimension('36')->setRowHeight(5);
$sheet->getRowDimension('38')->setRowHeight(5);
$sheet->getRowDimension('40')->setRowHeight(5);
$sheet->getRowDimension('42')->setRowHeight(5);
$sheet->getRowDimension('44')->setRowHeight(5);
$sheet->getRowDimension('46')->setRowHeight(5);
$sheet->getRowDimension('52')->setRowHeight(5);
$sheet->getRowDimension('54')->setRowHeight(5);
$sheet->getRowDimension('52')->setRowHeight(5);
$sheet->getRowDimension('59')->setRowHeight(20);
$sheet->getRowDimension('60')->setRowHeight(20);

$sheet->getStyle('A2')->getAlignment()->setHorizontal('center');
$sheet->getStyle('F9')->getAlignment()->setHorizontal('center');
$sheet->getStyle('C60')->getAlignment()->setHorizontal('center');
$sheet->getStyle('C59')->getAlignment()->setHorizontal('center');
$sheet->getStyle('A65')->getAlignment()->setHorizontal('center');
$sheet->getStyle('A66')->getAlignment()->setHorizontal('center');
$sheet->getStyle('A67')->getAlignment()->setHorizontal('center');




$styleArrayHeaderFontStyle = [
    'font' => [
        'bold'  =>  true,
        'size'  =>  8,
        'name'  =>  'Arial'
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
    ]

];
$styleArray = [
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



$sheet->getStyle('A1:I67')->applyFromArray($styleArray);
/*$sheet->getStyle('B13:H13')->applyFromArray($styleArray);
$sheet->getStyle('H10:K11')->applyFromArray($styleArrayBox);
$sheet->getStyle('I14:K15')->applyFromArray($styleArrayBox);
$sheet->getStyle('C17:I19')->applyFromArray($styleArrayBox);
$sheet->getStyle('A20:B21')->applyFromArray($styleArrayBox);
$sheet->getStyle('C20:E21')->applyFromArray($styleArrayBox);
$sheet->getStyle('A22')->applyFromArray($styleArrayBox);
$sheet->getStyle('B22')->applyFromArray($styleArrayBox);
$sheet->getStyle('C22')->applyFromArray($styleArrayBox);
$sheet->getStyle('D22')->applyFromArray($styleArrayBox);
$sheet->getStyle('E22')->applyFromArray($styleArrayBox);
$sheet->getStyle('F20:F22')->applyFromArray($styleArrayBox);
$sheet->getStyle('G20:G22')->applyFromArray($styleArrayBox);
$sheet->getStyle('H20:H22')->applyFromArray($styleArrayBox);
$sheet->getStyle('I20:J20')->applyFromArray($styleArrayBox);
$sheet->getStyle('K20:K22')->applyFromArray($styleArrayBox);
$sheet->getStyle('J21:J22')->applyFromArray($styleArrayBox);
$sheet->getStyle('I22')->applyFromArray($styleArrayBox);

$sheet->getStyle('A23:K'.$rowNum)->applyFromArray($styleArrayVerticalBox);
$sheet->getStyle('A'.$rowNum.':K'.$rowNum)->applyFromArray($styleArrayAllBox);*/




header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="CS Form No 6 Rev 2020.xlsx"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');