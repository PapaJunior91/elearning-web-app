<nav class="navbar sticky-top flex-md-nowrap shadow">
  <a class="col-md-3 col-lg-2 mr-0 px-3" href="#">Elearning Portal</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav list-group list-group-horizontal">
    <li class="nav-item text-nowrap mx-2">
      <a class="nav-link" href="<?php echo base_url(); ?>user/profile"><span data-feather="user"></span> <?php echo $this->session->userdata('username');?></a>
    </li>
    <li class="nav-item text-nowrap mx-2">
      <a class="nav-link" href="<?php echo base_url(); ?>auth/logout"><span data-feather="log-out"></span> Sign out</a>
    </li>
  </ul>
</nav>
