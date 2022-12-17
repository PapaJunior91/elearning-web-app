<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
	public function home()
	{
		$user_id = $this->session->userdata('user_id');
		$this->load->model("SubjectsModel");
		$data['mysubjects'] = $this->SubjectsModel->fetchMySubjects($user_id);
		$this->load->view('teacher/nav.inc');
		$this->load->view('teacher/side_nav.inc');
		$this->load->view('teacher/dashboard',$data);
	}
}
