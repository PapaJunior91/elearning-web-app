<?php
class UserController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
  		$this->load->model("UserModel");
	}

	public function login()
	{

		if($this->input->post('login'))
		{
			$username=$this->input->post('username');
			$password=$this->input->post('password');

			//$que=$this->db->query("select * from student where email='".$e."' and password='$p'");
      $result = $this->UserModel->login($username, $password);
			$row = $result->num_rows();
			if($row)
			{
			redirect('UserController/dashboard');
			}
			else
			{
		$data['error']="<h3 class='text-danger'>Invalid Username or password</h3>";
			}
		}
		$this->load->view('login',@$data);
	}

	function dashboard()
	{
		$this->load->view('dashboard');
	}

	function profile()
	{
		$this->load->view('profile');

	}
}
?>
