<?php
// include package
include 'Writer.php';
include 'ExcelDownloader.php';

class IssueList implements ExcelDownloader {

	private $__rows;
	private $__columns;
	private $__sheet_name;
	private $__file_name;
	private $__excel;
	private $__sheet;

	public function __construct($rows) {
		$this->__rows = $rows;
	}

	public function setFileName($file_name) {
		$this->__file_name = $file_name;
	}

	public function setSheetName($sheet_name){
		$this->__sheet_name = $sheet_name;
	}

	public function download() {
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");;
		header("Content-Disposition: attachment;filename=$this->__file_name ");
		header("Content-Transfer-Encoding: binary ");
		echo @file_get_contents($this->__file_name);
		@unlink($this->__file_name);
	}


	public function save() {		
		// create empty file
		$this->__excel = new Spreadsheet_Excel_Writer($this->__file_name);
		$this->__excel->setVersion(8, 'utf-8');
		
		// add worksheet
		$this->__sheet =$this->__excel->addWorksheet($this->__sheet_name);		
		$this->__sheet->setInputEncoding('utf-8');
		
		$firstRow = $this->__getFirstRowFormat();
		$cell = $this->__getCellFormat();
		// add data to worksheet		
		foreach ($this->__rows as $row) {
			for($colCount=0; $colCount<sizeof($row); $colCount++) {
				if ($rowCount == 0) {
					$format = 'firstRow';
				} else {
					$format = 'cell'; 
				}
				$this->__sheet->write($rowCount, $colCount, $row[$colCount], $$format);                       
			}	// for
			
			// get cell coordinates
			$start = Spreadsheet_Excel_Writer::rowcolToCell($rowCount, 1);
			$end = Spreadsheet_Excel_Writer::rowcolToCell($rowCount, (sizeof($row)-1));

			$rowCount++;
		}	// end foreach
		
		// save file to disk		
		return $this->__excel->close();
	}
	
	private function __getFirstRowFormat() {
		// create format for header row 
		// bold, red with black lower border
		$firstRow = $this->__excel->addFormat();
		$firstRow->setFgColor('0x17');
		$firstRow->setBold();
		//$firstRow->setColor('red');
		$firstRow->setBottom(2);
		$firstRow->setBottomColor('black');		
		//$firstRow->setTextWrap();
		return $firstRow;
	}
	
	private function __getCellFormat() {
		// create format for numeric cells
		$cell = $this->__excel->addFormat();
		$cell->setBorder(1);		
		$cell->setTextWrap();		
		return $cell;
	}	
}
?>
