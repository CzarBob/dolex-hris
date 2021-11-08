<?php 
//session_start();
include "dbConnection.php";
require_once "Classes/PHPExcel.php";
$columns = array('process', 'rating','fullname', 'email', 'comment',  'date_submitted');
session_start();
date_default_timezone_set('Asia/Manila');

$export = new PHPExcel();
$q ='SELECT EMPLOYEEID,LASTNAME, FIRSTNAME, MIDDLENAME,  EXTENSION, POSITION, ADDRESS, DATEHIRED FROM tbl_employee

WHERE 
CANCELLED = "N" 

ORDER BY LASTNAME ASC
';

  
$export->setActiveSheetIndex(0);
$query = mysqli_query($connect,$q);
$row = 5; 
$now = date_create()->format('Y-m-d H:i:s');

while($list = mysqli_fetch_object($query)){
/*	if($_SESSION['received_by'] == 'Receiving'){
	$GG = "date_sent";
	}
	else{
	$GG = "date_released";
	}*/
	$export->getActiveSheet()
	->setCellValue('A'.$row, $list->EMPLOYEEID)
	->setCellValue('B'.$row, $list->LASTNAME)
	->setCellValue('C'.$row, $list->FIRSTNAME)
	->setCellValue('D'.$row, $list->MIDDLENAME)
	->setCellValue('E'.$row, $list->EXTENSION)
	->setCellValue('F'.$row, $list->POSITION)
	->setCellValue('G'.$row, $list->ADDRESS)
	->setCellValue('H'.$row, $list->DATEHIRED);
	$row++;
}
$export->getActiveSheet()->getColumnDimension('A')->setwidth(20);
$export->getActiveSheet()->getColumnDimension('B')->setwidth(20);
$export->getActiveSheet()->getColumnDimension('C')->setwidth(30);
$export->getActiveSheet()->getColumnDimension('D')->setwidth(30);
$export->getActiveSheet()->getColumnDimension('E')->setwidth(20);
$export->getActiveSheet()->getColumnDimension('F')->setwidth(20);
$export->getActiveSheet()->getColumnDimension('G')->setwidth(20);
$export->getActiveSheet()->getColumnDimension('H')->setwidth(20);
$export->getActiveSheet()->getColumnDimension('I')->setwidth(20);

$export->getActiveSheet()
->setCellValue('A1','DOLE X Employee Data')
->setCellValue('A2','Date Generated:'.$now)
->setCellValue('A4','EMPLOYEEID')
->setCellValue('B4','LASTNAME')
->setCellValue('C4','FIRSTNAME')
->setCellValue('D4','MIDDLENAME')
->setCellValue('E4','EXTENSION')
->setCellValue('F4','POSITION')
->setCellValue('G4','ADDRESS')
->setCellValue('H4','DATE HIRED');


$export->getActiveSheet()->mergeCells('A1:H1');
$export->getActiveSheet()->mergeCells('A2:H2');

$export->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
$export->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
$export->getActiveSheet()->getStyle('A4:H4')->getAlignment()->setHorizontal('center');

$export->getActiveSheet()->getStyle('A1')->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR)
    ->setStartColor(new PHPExcel_Style_Color(PHPExcel_Style_Color::COLOR_WHITE))
    ->setEndColor(new PHPExcel_Style_Color(PHPExcel_Style_Color::COLOR_WHITE))
    ->setRotation(45);
$export->getActiveSheet()->getStyle('A1')->applyFromArray(
	array(
		'font'=>array(
			'size'=> 24,
			'bold'=>true,
		)
	)
);
$export->getActiveSheet()->getStyle('A2')->applyFromArray(
	array(
		'font'=>array(
			'size'=> 12,
			'bold'=>true,
		)
	)
);
$export->getActiveSheet()->getStyle('A4:H4')->applyFromArray(
	array(
		'font'=>array(
			'bold'=> true
		),
		'borders'=>array(
			'allborders'=>array(
				'style'=>PHPExcel_Style_Border::BORDER_THIN
			)
		)
	)
);
$export->getActiveSheet()->getStyle('A5:H'.($row-1))->applyFromArray(
	array(
		'borders'=>array(
			'outline'=>array(
				'style'=>PHPExcel_Style_Border::BORDER_THIN
			),
			'vertical'=> array(
				'style'=>PHPExcel_Style_Border::BORDER_THIN
			)
		)
	)
);
/*header('Content-Type: application/vnd.openxmlformats-officedocumnets.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Employee Data.xlsx"');
header('Content-Control: max-age=0');
$file = PHPExcel_IOFactory::createWriter($export,'Excel2007');*/

$file = PHPExcel_IOFactory::createWriter($export, 'Excel5');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="DOLE X Employee Record.xls"');

ob_end_clean();
$file->save('php://output');

 




?>
