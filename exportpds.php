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
$drawing->setPath("img/dolelogogs.png");
$drawing->setName('DOLE LOGO');
$drawing->setCoordinates('C5');
$drawing->setWidthAndHeight(50,50);
$drawing->setWorksheet($sheet);  */




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
$sheet->setCellValue('A9', '1. PERSONAL INFORMATION');
$sheet->setCellValue('A10', '2.');
$sheet->setCellValue('B10', 'SURNAME');
$sheet->setCellValue('D10', 'ZAMBRANO');//
$sheet->setCellValue('B11', 'FIRST NAME');
$sheet->setCellValue('D11', 'CZAR BOBIN');//
$sheet->setCellValue('L11', 'NAME EXTENSION (JR., SR)    ');//
$sheet->setCellValue('B12', 'MIDDLE NAME');
$sheet->setCellValue('D12', 'TEJANO');//
$sheet->setCellValue('A13', '3.');
$sheet->setCellValue('B13', 'DATE OF BIRTH 
(mm/dd/yyyy)  ');
$sheet->setCellValue('D13', '01/02/1995');//
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
$sheet->setCellValue('G15', 'CAGAYAN DE ORO');//
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