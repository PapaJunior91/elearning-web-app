<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>My Subjects</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.4.5.2.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>

<div class="container-fluid">
  <div class="row">


    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <!-- <h1 class="h2">My Subjects | <?php echo $this->uri->segment(3); ?> </h1> -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <!-- <li class="breadcrumb-item"><a href="#">Library</a></li> -->
            <li class="breadcrumb-item active" aria-current="page">Subjects</li>
          </ol>
        </nav>
      </div>

      <div class="row mb-2">


        <ul class="list-group list-group-flush" style="width: 100%">
          <li class="list-group-item list-group-item-action active"><?php echo $this->uri->segment(3); ?> Course Outline</li>

          <?php
  foreach ($sub_topics as $sub_topic):

          ?>
          <li class="list-group-item"><?php echo $sub_topic->topic_id; ?> <?php echo $sub_topic->sub_topic; ?>

            <?php if($this->session->userdata('role') == "Teacher"):?>
            <a class="float-right" href=""><span class="badge badge-pill badge-primary">Edit</span></a> <a class="float-right" href=""><span class="badge badge-pill badge-danger">del</span></a>
          <?php endif ?>

          </li>
          <?php endforeach;?>
        </ul>
  </div>


    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>
    </body>
</html>
