  <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="<?php echo base_url(); ?>home">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item collapsed active" data-toggle="collapse" data-target="#quiz_dropdown">

            <a class="nav-link" href="<?php echo base_url(); ?>quiz"><span data-feather="file"></span>Quiz
            </a>
          </li>
          <ul class="nav nav-second-level sub-menu collapse" id="quiz_dropdown">
                  <li>New Service 1</li>
                  <li>New Service 2</li>
                  <li>New Service 3</li>
                </ul>
          <!--li class="nav-item">
            <a class="nav-link" href="">
              <span data-feather="shopping-cart"></span>
              Exercises
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Tests
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Exams
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Assignments
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Grades
            </a>
          </li-->
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Manage</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
        
         <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>teacher/subjects">
              <span data-feather="file-text"></span>
              My Subjects
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>teacher/profile">
              <span data-feather="user"></span>
              My Account
            </a>
          </li>
         
        </ul>
      </div>
    </nav>
