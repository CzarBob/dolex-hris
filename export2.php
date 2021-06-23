<?php
include "dbConnection.php";
require 'vendor/vendor/autoload.php';
session_start();
date_default_timezone_set('Asia/Manila');

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\IOFactory;


$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'GSIS D 202-02 (Revised, 1989)');
$sheet->setCellValue('A4', 'SERVICE RECORD');
$sheet->setCellValue('A5', 'Department of Labor and Employment');
$sheet->setCellValue('A6', 'Northern Mindanao');
$sheet->setCellValue('A9', 'NAME')
->setCellValue('B9','Date Generated:')
->setCellValue('D9','EMPLOYEEID')
->setCellValue('F9','LASTNAME');
$sheet->setCellValue('A10', '')
->setCellValue('B10','(Surname)')
->setCellValue('D10','(Given Name)')
->setCellValue('F10','(Middle Name)');
$sheet->setCellValue('H10', '(If married woman, give also full name and other surname used)');

$sheet->setCellValue('A13', 'BIRTH')
->setCellValue('B13','Date Generated:')
->setCellValue('E13','LASTNAME');

$sheet->setCellValue('A14', '')
->setCellValue('B14','(Surname)')
->setCellValue('E14','(Middle Name)');
$sheet->setCellValue('I14', '(Date herein should be checked from birth or baptismal certificate or some other official documents)
)');


$sheet->mergeCells('A2:K2');
$sheet->mergeCells('A3:K3');
$sheet->mergeCells('A4:K4');
$sheet->mergeCells('A5:K5');
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


$sheet->getStyle('A4')->getAlignment()->setHorizontal('center');
$sheet->getStyle('A5')->getAlignment()->setHorizontal('center');
$sheet->getStyle('A6')->getAlignment()->setHorizontal('center');
$sheet->getStyle('B9')->getAlignment()->setHorizontal('center');
$sheet->getStyle('D9')->getAlignment()->setHorizontal('center');
$sheet->getStyle('F9')->getAlignment()->setHorizontal('center');
$sheet->getStyle('B10')->getAlignment()->setHorizontal('center');
$sheet->getStyle('D10')->getAlignment()->setHorizontal('center');
$sheet->getStyle('F10')->getAlignment()->setHorizontal('center');


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

$sheet->getStyle('B9:H9')->applyFromArray($styleArray);
$sheet->getStyle('B13:H13')->applyFromArray($styleArray);
$sheet->getStyle('H10:K11')->applyFromArray($styleArrayBox);
$sheet->getStyle('I14:K15')->applyFromArray($styleArrayBox);


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Service Record.xlsx"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');