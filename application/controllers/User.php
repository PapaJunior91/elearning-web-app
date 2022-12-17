<?php
class User extends CI_Controller
{
	public function __construct()
	{
	parent::__construct();
	}

	public function login()
	{

		if($this->input->post('login'))
		{
			$e=$this->input->post('username');
			$p=$this->input->post('password');

			$que=$this->db->query("select * from login where username='".$e."' and password='$p'");
			$row = $que->num_rows();
			if($row)
			{
			redirect('User/dashboard');
			}
			else
			{
		$data['error']="<h3 style='color:red'>Invalid login details</h3>";
			}
		}
		$this->load->view('login',@$data);
	}

	function dashboard()
	{
	$this->load->view('dashboard');
	}
}
?>
