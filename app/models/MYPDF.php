<?php
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		if ($this->page == 1) {
			$this->writeHTML(View::make('reportHeader'), true, false, true, false, '');
			$this->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
		} else {
			$this->Cell(0, 10, 'National Microbiology Referrence Laboratory | NMRL', 0, false, 'C', 0, '', 0, false, 'M', 'M');
			$this->SetMargins(PDF_MARGIN_LEFT, 10, PDF_MARGIN_RIGHT);
			$this->SetHeaderMargin(5);
			$this->Line(200, 10, 10, 10, '');
		}
	}

	// Page footer
	public function Footer() {
		$now = new DateTime();
		$printTime = $now->format('Y-m-d H:i');

		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		$this->Cell(0, 10, "Printed by: ".Auth::user()->name." Date: ".$printTime, 0, false, 'L', 0, '', 0, false, 'T', 'M');

		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');

	}
}
