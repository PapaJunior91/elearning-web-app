<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiginController extends CI_Controller {
	public function index()
	{
		$this->load->view('signin');
	}
}
