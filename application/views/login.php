<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>OlineLearning | Signin</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.4.5.2.min.css" rel="stylesheet">

    <!-- My CSS -->
    <link href="<?php echo base_url(); ?>assets/css/myStyle.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/signin.css" rel="stylesheet">
  </head>

  <body>


          <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow" style="margin-top:0px;">
            <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Wanafunzi Learning Portal<img src="<?php echo base_url(); ?>assets/images/uganda.svg" width="50px" height="30px"></a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav px-3">
              <li class="nav-item text-nowrap">
                <a class="nav-link" href="<?php echo base_url(); ?>">Guest Login</a>
              </li>
            </ul>
          </nav>

    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h3 class="my-2 card-title">Login</h3>
          <?php
            if($this->session->userdata('error_msg')){
          ?>
            <div class="alert alert-danger text-white">
              <?php 
                echo $this->session->userdata('error_msg'); 
                $this->session->unset_userdata('error_msg');
              ?>  
            </div>
          <?php
            }else if($this->session->userdata('success_msg')){
          ?>
            <div class="alert alert-success text-white">
              <?php 
                echo $this->session->userdata('success_msg');
                $this->session->unset_userdata('success_msg');
                ?>  
            </div>
          <?php
            }
          ?>
      
          <form method="POST" action="<?php echo base_url(); ?>auth/login">
            <div class="form-group">
              <label for="inputEmail" class="sr-only">Username</label>
              <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
            </div>
            
            <div class="form-group">
              <label for="inputPassword" class="sr-only">Password</label>
              <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            </div>

            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
        
            <button class="btn btn-primary my-2" type="submit">Login</button>
            
          </form>
          <a href="<?php echo base_url(); ?>auth/register/view">Not Registered ? Click Here To Create Account</a>
        </div>
      </div>
    </div>

</body>
</html>
