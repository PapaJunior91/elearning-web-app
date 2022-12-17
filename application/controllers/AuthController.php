<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

  public function __construct()
   {
       parent::__construct();

       //calling model
       $this->load->model("AuthModel");
       $this->load->model("SubjectsModel");
   }


  public function index()
  {
      $this->load->view('login');
  }

  public function registerForm()
  {
      $this->load->view('signup');
  }

  public function register()
  {

    $this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|is_unique[users.username]');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|is_unique[users.email]');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');
    $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
    $this->form_validation->set_message('is_unique', 'username already exists');

    if ($this->form_validation->run() != FALSE){
      $this->load->view('signup');
    }

    $data = array(
      'username' => $this->input->post('username'),
      'email' => $this->input->post('email'),
      'password' => $this->input->post('password'),
      'role' => $this->input->post('role')
    );

    $result = $this->AuthModel->register($data);

    if ($result) {
      $data['success_msg'] = 'Registration Successfully';
      $this->session->set_userdata($data);
      redirect('/');
    } else {
      $data['error_msg'] = 'Username already exist!';
      $this->session->set_userdata($data);
      redirect('/auth/register/view');
    }

          
  }

  public function data()
  {
    $user_id = $this->session->userdata('user_id');
    $this->load->model("SubjectsModel");
    $data['mysubjects'] = $this->SubjectsModel->fetchMySubjects($user_id);
    $this->load->view('include/nav.inc');
		$this->load->view('dashboard',$data);
  }


  public function login()
  {

      $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

      $result = $this->AuthModel->login();

      if (!empty($result)) 
      {
        $user = array(
                        'username' => $result->username,
                        'user_id' => $result->id,
                        'email' => $result->email,
                        'role' => $result->role
                      );

        $this->session->set_userdata($user);
        
        $data['mysubjects'] = $this->SubjectsModel->fetchMySubjects($result->id);

        if($result->role == "teacher")
        {
          $this->load->view('teacher/top-nav');
          $this->load->view('teacher/side-nav');
          $this->load->view('teacher/dashboard',$data);
        }else
        {
          $this->load->view('include/nav.inc');
          $this->load->view('include/side_nav.inc');
          $this->load->view('dashboard',$data); 
        }

      } else 
      {
        $message = array('error_msg' => 'Invalid Username or Password');
        $this->session->set_userdata($message);
        redirect('/');
      }
  }

  function login_error()
  {
    $this->load->view('login');
  }

  public function logout() 
  {
    $this->session->sess_destroy();
    $this->load->view('login');
    // redirect('AuthController/index');
  }

}

?>
