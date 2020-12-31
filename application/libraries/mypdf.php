<?php 

require_once('assets/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

class mypdf
{
	protected $ci;

	public function __construct()
	{
		$this->ci =& get_instance();
	}

	public function generate($view, $data = array(), $filename = 'Laporan', $paper = 'A4', $orientation = 'portrait')
	{
		$dompdf = new Dompdf();
		$html = $this->ci->load->view($view, $data, TRUE);
		$dompdf->loadhtml($html);
		$dompdf->set_paper($paper, $orientation);
		$dompdf->render();
		$dompdf->stream($filename.".pdf",array("attachment" => FALSE));
	}
}