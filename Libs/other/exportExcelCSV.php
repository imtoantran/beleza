<?php
/*
*Informations
	**Author 	: Le Trong Loi
	**License	: Brights VN
	**Version 	: 1.0
*Description
	** Export CSV and Excel
*/
/*
	Change Log
		V1.0 - First Release
*/

class ExportExcelCSV {
	private $file_name;
	private $header;
	private $data;

	private $iColumns;
	private $aZeroColumns; // 
	private $iLRPHPExcel = 3000; // Default Limit recored for export by lib phpExcel

	#Class constructor
	function ExportExcelCSV( $sFileName, $aHeader, $aData, $aZeroColumns = false ) { 
		$this->file_name 	= trim($sFileName);
		$this->header 		= $aHeader;
		$this->data 		= $aData;
		$this->iColumns 	= count($this->header);
		if( !$aZeroColumns ) {
			$this->aZeroColumns = $aZeroColumns;
		}
	}

	/*
	-------------------------
	START OF PUBLIC FUNCTIONS
	-------------------------
	*/

	// Set Limit recored for export by lib phpExcel
	public function setLimitRowPhpExcel( $limit ) {
		$this->iLRPHPExcel = $limit;
	}

	public function exportExcel() {
		try {
			if( sizeof($this->data) <= $this->iLRPHPExcel ) {
				require_once(OTHER_LIBS .DS. 'PHPExcel.php');
				require_once(OTHER_LIBS .DS. 'PHPExcel' .DS. 'IOFactory.php');

				$objPHPExcel = new PHPExcel ();
				$sheet       = $objPHPExcel->setActiveSheetIndex(0);

                // Set file header
				for($i=0; $i < $this->iColumns; $i++) {
					$sheet->SetCellValue ( PHPExcel_Cell::stringFromColumnIndex($i) . '1', $this->header[$i] );
				}

                // Sets tyle for header
				$style_header = array(
					'fill' => array(
						'type' => PHPExcel_Style_Fill::FILL_SOLID,
						'color' => array(
							'rgb' => '4376FF'
							)
						)
					);

				foreach ( range(0, $this->iColumns - 1) as $columnID ) {
                    // Set color for header
					$sheet->getStyle( PHPExcel_Cell::stringFromColumnIndex($columnID)  . '1' )->applyFromArray( $style_header );
                    // Set auto size to column 
					$sheet->getColumnDimension ( PHPExcel_Cell::stringFromColumnIndex($columnID) )->setAutoSize( true );
				}

                // Import file data
				$row = 2;
				foreach ( $this->data as $aRow ) {
					for($i=0; $i < $this->iColumns; $i++) {
                      $sheet->SetCellValue ( PHPExcel_Cell::stringFromColumnIndex($i) . $row, $aRow[$i] );
						// $sheet->setCellValueExplicit( PHPExcel_Cell::stringFromColumnIndex($i) . $row, $aRow[$i], PHPExcel_Cell_DataType::TYPE_STRING);
					}
					$row ++;
				}

				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition: attachment;filename=' . $this->file_name . '.xlsx');
				header('Cache-Control: max-age=0');
				header('Cache-Control: public');
				header('Pragma: public');
				$obj_writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
				$obj_writer->save('php://output');
			}
			else {
                // Use lib export excel with huge data
				require_once (OTHER_LIBS . DS . 'exportXLS.php');
				$xls = new ExportXLS($this->file_name);
				$xls->create($this->header, $this->data);
				exit;
			}
		} catch (Exception $ex) {
			echo $ex->getMessage();
		}
	}

	public function exportCSV() {
		try{
			$sep = ",";
	        $eol = "\r\n";
	        $csv = count($this->header) ? '"' . implode('"' . $sep . '"', $this->header) . '"' . $eol : '';
	        foreach ($this->data as $line) {
	            $csv .= '"' . implode('"' . $sep . '"', $line) . '"' . $eol;
	        }
	        $encoded_csv = mb_convert_encoding($csv, 'SJIS', 'UTF-8');
	        header('Content-Encoding: UTF-8');
	        header('Content-Type: text/csv; charset=UTF-8');
	        header('Content-Description: File Transfer');
	        header('Content-Disposition: attachment; filename="' . $this->file_name . '.csv"');
	        header('Content-Transfer-Encoding: binary');
	        header('Expires: 0');
	        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	        header('Pragma: public');
	        header('Content-Length: ' . strlen($encoded_csv));
	        echo $encoded_csv;
	        exit;
		} catch (Exception $ex) {
			echo $ex->getMessage();
		}
	}
	

}