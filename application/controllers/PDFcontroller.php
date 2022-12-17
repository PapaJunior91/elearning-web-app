<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pdf_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pdf_model');
		$this->load->library('pdf');
	}


	public function pdfdetails()
	{
		if($this->uri->segment(3))
		{
			$user_id = $this->uri->segment(3);
			$html_content = '<h3 align="center">Generate PDF using Dompdf</h3>';
			$html_content .= $this->pdf_model->show_single_details($user_id);
			$this->pdf->loadHtml($html_content);
			$this->pdf->render();
			$this->pdf->stream("".$user_id.".pdf", array("Attachment"=>0));
		}
	}

}
?>
