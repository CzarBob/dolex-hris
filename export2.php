<?php
include "dbConnection.php";
require 'vendor/vendor/autoload.php';
session_start();
date_default_timezone_set('Asia/Manila');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setPath("img/dolelogogs.png");
$drawing->setName('DOLE LOGO');
$drawing->setCoordinates('C5');
$drawing->setWidthAndHeight(50,50);
$drawing->setWorksheet($sheet);  

$id = $_GET["id"];

$query = 'SELECT 
    tbl_employee.FIRSTNAME as FIRSTNAME,
    tbl_employee.MIDDLENAME as MIDDLENAME,
    tbl_employee.LASTNAME as LASTNAME,
    tbl_employee_profile.DOB as DOB,
    tbl_employee_profile.PLACEOFBIRTH as PLACEOFBIRTH
 
    FROM tbl_employee 
    INNER JOIN tbl_employee_profile ON tbl_employee_profile.EMPID = tbl_employee.ID
    WHERE tbl_employee.ID = "'.$id.'" ';

    //WHERE tbl_employee.ID = "'.$_POST["employeeiddb"].'" ';

    //var_dump($query);

    //$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
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



    //$query = 'SELECT * FROM tbl_service_record  WHERE EMPID = "'.$_POST['employeeiddb'].'" AND CANCELLED = "N" ';
    $query = 'SELECT * FROM tbl_service_record  WHERE EMPID = "'.$id.'"  AND CANCELLED = "N" ';
    $result = mysqli_query($connect, $query);
    $rowNum=23;
    if($result){
        while($row = mysqli_fetch_array($result)){
            $sheet->setCellValue('A'.$rowNum,$row['SERVICEFROM'])
            ->setCellValue('B'.$rowNum, $row['SERVICETO'])
            ->setCellValue('C'.$rowNum, $row['DESIGNATION'])
            ->setCellValue('D'.$rowNum, $row['STATUS'])
            ->setCellValue('E'.$rowNum, $row['SALARY'])
            ->setCellValue('F'.$rowNum, $row['OFFICE'])
            ->setCellValue('G'.$rowNum, $row['BRANCH'])
            ->setCellValue('H'.$rowNum, $row['ABS'])
            ->setCellValue('I'.$rowNum, $row['SEPARATIONDATE'])
            ->setCellValue('J'.$rowNum, $row['AMOUNTRECEIVED'])
            ->setCellValue('K'.$rowNum, $row['DETAILS']);
            $rowNum++;
        }
    }
      
$sheet->setCellValue('A1', 'GSIS D 202-02 (Revised, 1989)');
$sheet->setCellValue('A4', 'SERVICE RECORD');
$sheet->setCellValue('D5', 'Department of Labor and Employment');
$sheet->setCellValue('A6', 'Northern Mindanao');
$sheet->setCellValue('A9', 'NAME')
->setCellValue('B9',$lastname)
->setCellValue('D9',$firstname)
->setCellValue('F9',$middlename);
$sheet->setCellValue('A10', '')
->setCellValue('B10','(Surname)')
->setCellValue('D10','(Given Name)')
->setCellValue('F10','(Middle Name)');
$sheet->setCellValue('H10', '(If married woman, give also full name and other surname used)');

$sheet->setCellValue('A13', 'BIRTH')
->setCellValue('B13',$dob)
->setCellValue('E13',$placeofbirth);

$sheet->setCellValue('A14', '')
->setCellValue('B14','(Date of Birth)')
->setCellValue('E14','(Place of Birth)');
$sheet->setCellValue('I14', '(Date herein should be checked from birth or baptismal certificate or some other official documents)
)');

$sheet->setCellValue('C17', '     This is to certify that the employee named hereinabove actually rendered services in this Office or Offices indicated below each line of which is supported by appointment and other papers actually issued and approved by the authorities concerned:
    ');

$sheet->setCellValue('A20', 'SERVICE')
->setCellValue('C20','')
->setCellValue('F20','OFFICE')
->setCellValue('G20','')
->setCellValue('H20','')
->setCellValue('H20','SEPARATION');

$sheet->setCellValue('A20', 'SERVICE')
->setCellValue('C20','')
->setCellValue('F20','OFFICE')
->setCellValue('G20','')
->setCellValue('H20','')
->setCellValue('I20','SEPARATION');

$sheet->setCellValue('A21', '(Inclusive Dates)')
->setCellValue('C21','RECORD OF APPOINTMENT')
->setCellValue('F21','Station/Place')
->setCellValue('G21','BRANCH')
->setCellValue('H21','L/V ABS')
->setCellValue('I21','')
->setCellValue('J21','AMOUNT RECEIVED');

$sheet->setCellValue('A22', 'FROM')
->setCellValue('B22','TO')
->setCellValue('C22','Designation')
->setCellValue('D22','Status')
->setCellValue('E22','Salary')
->setCellValue('F22','of Assigment')
->setCellValue('G22','')
->setCellValue('H22','W/O PAY')
->setCellValue('I22','Date/Cause')
->setCellValue('J22','');

$sheet->setCellValue('A'.$rowNum, '*** NOTHING FOLLOWS ***');
$sheet->setCellValue('C'.((int)$rowNum+1), 'Issued in compliance with Executive Order No. 54 dated August 10, 1954, and in accordance with Circular No. 58, dated August 10, 1954 of the System.
');

$sheet->setCellValue('H'.((int)$rowNum+5), 'Certified Correct:');
$sheet->setCellValue('H'.((int)$rowNum+8), 'LUCILA S. PULVERA');
$sheet->setCellValue('H'.((int)$rowNum+9), 'Chief Administrative Officer');
$sheet->setCellValue('H'.((int)$rowNum+10), 'Internal Management Services Division');
$sheet->setCellValue('A'.((int)$rowNum+11), '');


$sheet->mergeCells('A1:C1');
$sheet->mergeCells('A2:K2');
$sheet->mergeCells('A3:K3');
$sheet->mergeCells('A4:K4');
$sheet->mergeCells('D5:H5');
$sheet->mergeCells('A6:K6');
$sheet->mergeCells('A7:K7');
$sheet->mergeCells('B9:C9');
$sheet->mergeCells('D9:E9');
$sheet->mergeCells('F9:G9');

$sheet->mergeCells('B10:C10');
$sheet->mergeCells('D10:E10');
$sheet->mergeCells('F10:G10');
$sheet->mergeCells('H10:K11');

$sheet->mergeCells('B13:D13');
$sheet->mergeCells('E13:G13');
$sheet->mergeCells('I14:K15');

$sheet->mergeCells('C17:I19');

$sheet->mergeCells('A20:B20');
$sheet->mergeCells('C20:E20');
$sheet->mergeCells('I20:J20');

$sheet->mergeCells('A21:B21');
$sheet->mergeCells('C21:E21');
$sheet->mergeCells('J21:J22');
$sheet->mergeCells('F20:F22');
$sheet->mergeCells('A'.((int)$rowNum).':K'.((int)$rowNum));
$sheet->mergeCells('C'.((int)$rowNum+1).':I'.((int)$rowNum+1));

$sheet->mergeCells('H'.((int)$rowNum+5).':J'.((int)$rowNum+5));
$sheet->mergeCells('H'.((int)$rowNum+8).':J'.((int)$rowNum+8));
$sheet->mergeCells('H'.((int)$rowNum+9).':J'.((int)$rowNum+9));
$sheet->mergeCells('H'.((int)$rowNum+10).':J'.((int)$rowNum+10));

$sheet->setCellValue('I'.((int)$rowNum+5), 'Certified Correct:');
$sheet->setCellValue('I'.((int)$rowNum+8), 'LUCILA S. PULVERA');
$sheet->setCellValue('I'.((int)$rowNum+9), 'Chief Administrative Officer');
$sheet->setCellValue('I'.((int)$rowNum+10), 'Internal Management Services Division');
$sheet->setCellValue('A'.((int)$rowNum+11), '');


$sheet->getStyle('A1:K999')
    ->getAlignment()->setWrapText(true); 

$sheet->getStyle('A4')->getAlignment()->setHorizontal('center');
$sheet->getStyle('D5')->getAlignment()->setHorizontal('center');
$sheet->getStyle('A6')->getAlignment()->setHorizontal('center');
$sheet->getStyle('B9')->getAlignment()->setHorizontal('center');
$sheet->getStyle('D9')->getAlignment()->setHorizontal('center');
$sheet->getStyle('F9')->getAlignment()->setHorizontal('center');
$sheet->getStyle('B10')->getAlignment()->setHorizontal('center');
$sheet->getStyle('D10')->getAlignment()->setHorizontal('center');
$sheet->getStyle('F10')->getAlignment()->setHorizontal('center');

$sheet->getStyle('A20')->getAlignment()->setHorizontal('center');
$sheet->getStyle('F20')->getAlignment()->setHorizontal('center');
$sheet->getStyle('H20')->getAlignment()->setHorizontal('center');

$sheet->getStyle('A21')->getAlignment()->setHorizontal('center');
$sheet->getStyle('C21')->getAlignment()->setHorizontal('center');
$sheet->getStyle('F21')->getAlignment()->setHorizontal('center');
$sheet->getStyle('G21')->getAlignment()->setHorizontal('center');
$sheet->getStyle('H21')->getAlignment()->setHorizontal('center');
$sheet->getStyle('J21')->getAlignment()->setHorizontal('center');

$sheet->getStyle('A22')->getAlignment()->setHorizontal('center');
$sheet->getStyle('B22')->getAlignment()->setHorizontal('center');
$sheet->getStyle('D22')->getAlignment()->setHorizontal('center');
$sheet->getStyle('C21')->getAlignment()->setHorizontal('center');
$sheet->getStyle('F21')->getAlignment()->setHorizontal('center');
$sheet->getStyle('G21')->getAlignment()->setHorizontal('center');
$sheet->getStyle('I20')->getAlignment()->setHorizontal('center');
$sheet->getStyle('H21')->getAlignment()->setHorizontal('center');
$sheet->getStyle('J21')->getAlignment()->setHorizontal('center');
$sheet->getStyle('A'.$rowNum)->getAlignment()->setHorizontal('center');


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


$sheet->getStyle('B9:H9')->applyFromArray($styleArray);
$sheet->getStyle('B13:H13')->applyFromArray($styleArray);
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
$sheet->getStyle('A'.$rowNum.':K'.$rowNum)->applyFromArray($styleArrayAllBox);




header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Service Record.xlsx"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');