<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
	public function create_pdf($data,$view = 'show')
	{
		
		if(is_dir("assets/pdf/")){	
			$output_pdf = "assets/pdf/".time().".pdf";
		}
		
		$title = "BAC";
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$title = "BAC";
		$pdf->SetTitle($title);
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setHeaderData('',0,"BAC");
	    $pdf->SetFont('helvetica','', 6,'',false);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetMargins(5, 20);
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		
		$pdf->AddPage();
		ob_start();
		$content = ob_get_contents();
		ob_end_clean();
		$pdf->writeHTMLCell(0, 0, '', '', $data, 0, 1, 0, true, '', true);
		
		if($view == 'show'){
			$pdf->Output($title,'I');
			//exit;
		}else{
			$pdf->Output($output_pdf, 'F');// D F
			return $output_pdf;
		}
	}
}

/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */