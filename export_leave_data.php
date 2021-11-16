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
$id = $_GET["id"];






   



    


/*
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
*/


/*
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


$dualValue = '[ ] by birth     [ ] naturalization';
if ($dualchoice == 'birth'){
    $dualValue = '[/]by birth    [ ]naturalization';
} else if ($dualchoice == 'naturalization'){
    $dualValue = '[ ] by birth    [/] naturalization';
}
$sheet->setCellValue('J14', $dualValue);

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
//$sheet->setCellValue('I21', $residentialaddress);
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
//$sheet->setCellValue('I28', $permanentaddress);
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
$sheet->setCellValue('K52', 'To');*/


//$query = 'SELECT * FROM tbl_service_record  WHERE EMPID = "'.$_POST['employeeiddb'].'" AND CANCELLED = "N" ';

$query = 'SELECT tbl_employee.LASTNAME as LASTNAME,
tbl_employee.MIDDLENAME as MIDDLENAME,
tbl_employee.FIRSTNAME as FIRSTNAME,
tbl_employee.SLCREDIT as SLCREDIT,
tbl_employee.VLCREDIT as VLCREDIT

FROM tbl_employee';
$result = mysqli_query($connect, $query);
$rowNum=5; //test
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
/*
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

*/







$spreadsheet->setActiveSheetIndex(0);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="DOLE X Employee Data.xlsx"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');