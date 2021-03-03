<?php 
session_start();
require_once "Classes/PHPExcel.php";
include "dbConnection.php";


$export = new PHPExcel();
$q ='SELECT feedback.ID AS ID, process.NAME AS PROCESS,  feedback.RATING as RATING,
feedback.FULLNAME as FULLNAME,  feedback.EMAIL as EMAIL, feedback.COMMENT as COMMENT, 
feedback.DATEADDED as DATEADDED,feedback.CANCELLED as CANCELLED  FROM feedback
INNER JOIN process
ON feedback.PROCESS = process.ID 
WHERE 
feedback.CANCELLED = "N" AND 
feedback.DATEADDED >= "'.$_POST['fromDate'].'" AND
feedback.DATEADDED <= "'.$_POST['toDate'].'"

ORDER BY feedback.DATEADDED DESC
';




$export->setActiveSheetIndex(0);
$query = mysqli_query($connect,$q);
$row = 5; //changed to five to add more headers
while($list = mysqli_fetch_object($query)){
/*	if($_SESSION['received_by'] == 'Receiving'){
	$GG = "date_sent";
	}
	else{
	$GG = "date_released";
	}*/
	$export->getActiveSheet()
	->setCellValue('A'.$row, $list->ID)
	->setCellValue('B'.$row, $list->PROCESS)
	->setCellValue('C'.$row, $list->RATING)
	->setCellValue('D'.$row, $list->FULLNAME)
	->setCellValue('E'.$row, $list->EMAIL)
	->setCellValue('F'.$row, $list->COMMENT)
	->setCellValue('G'.$row, $list->DATEADDED);
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

$export->getActiveSheet()
->setCellValue('A1','Citizen Charter Feedback Report')
->setCellValue('A2','Period:'.$_POST['fromDate'].' - '.$_POST['toDate'])
->setCellValue('A4','ID')
->setCellValue('B4','PROCESS')
->setCellValue('C4','RATING')
->setCellValue('D4','FULLNAME')
->setCellValue('E4','EMAIL')
->setCellValue('F4','COMMENT')
->setCellValue('G4','DATE ADDED');


$export->getActiveSheet()->mergeCells('A1:G1');
$export->getActiveSheet()->mergeCells('A2:G2');

$export->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
$export->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
$export->getActiveSheet()->getStyle('A4:G4')->getAlignment()->setHorizontal('center');

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
$export->getActiveSheet()->getStyle('A4:G4')->applyFromArray(
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
$export->getActiveSheet()->getStyle('A5:G'.($row-1))->applyFromArray(
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
header('Content-Type: application/vnd.openxmlformats-officedocumnets.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Feedback Report.xlsx"');
header('Content-Control: max-age=0');
$file = PHPExcel_IOFactory::createWriter($export,'Excel2007');
$file->save('php://output');