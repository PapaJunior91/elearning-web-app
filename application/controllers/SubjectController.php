<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubjectController extends CI_Controller {

	public function __construct()
	 {
			 parent::__construct();

			 //calling model
			 $this->load->model("SubjectsModel");
	 }

	 public function subjects()
	 {
		$subject_id = $this->uri->segment(4);
		$data['sub_topics'] = $this->SubjectsModel->fetchCourseOutline($subject_id);
		$data['subject_id'] = $subject_id;
	 	$this->load->view('include/nav.inc');
	 	$this->load->view('include/side_nav.inc',$data);
	 	$this->load->view('subjects',$data);
	 }

	public function fetchMySubjects()
	{
		$user_id = $this->session->userdata('user_id');
		$this->load->model("SubjectsModel");
		$result['mysubjects'] = $this->SubjectsModel->fetchMySubjects($user_id);
		$this->load->view('include/nav.inc');
		$this->load->view('include/side_nav.inc');
		$this->load->view('dashboard', $result);
	}

	public function mySubjects()
	{
		$subject_id = $this->uri->segment(3);
		$user_id = $this->session->userdata('user_id');

		$data = array(
			'subject_id' => $subject_id,
			'mysubjects' => $this->SubjectsModel->fetchMySubjects($user_id)
		);
		$this->load->view('include/nav.inc');
		$this->load->view('include/side_nav.inc', $data);
		$this->load->view('my_subjects', $data);
	}

	public function teacherSubjects()
	{
		$subject_id = $this->uri->segment(3);
		$user_id = $this->session->userdata('user_id');

		$data = array(
			'subject_id' => $subject_id,
			'mysubjects' => $this->SubjectsModel->fetchMySubjects($user_id)
		);

		$this->load->view('teacher/top-nav');
		$this->load->view('teacher/side-nav', $data);
		$this->load->view('teacher/subjects', $data);
	}
}
