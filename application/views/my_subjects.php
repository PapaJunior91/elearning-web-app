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
        <h1 class="h1">My Subjects</h1>
      

         <form action="<?= base_url(); ?>quizcontroller/add_quiz/" method="post" class="form-inline">
            <label class="sr-only" for="inlineFormInputGroupUsername2">Quiz Name</label>
            <div class="input-group mb-2 mr-sm-2">
              <select name="subject_id" class="form-control" required>
                <option>Enrol in Subject</option>
                <option value="<?php ?>"><?php ?></option>
              </select>
            </div>
            <button type="submit" class="btn btn-success mb-2">Enrol</button>
          </form>

      </div>
      
      <div class="row mb-2">
        <table class="table">
  <thead class="thead-dark">
    <tr>
      <th>Subject ID</th>
      <th>Subject Name</th>
      <?php if($this->session->userdata('role') == "Teacher"):?>
      <th>Edit</th>
      <?php endif; ?>
      <th>Del</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($mysubjects as $mysubject):
    ?>
    <tr>
      <th><?php echo $mysubject->subject_id?> </th>
      <td><?php echo $mysubject->subject_name?></td>
      <?php if($this->session->userdata('role') == "Teacher"):?>
      <td><button type="submit" class="btn btn-primary" href=""><span data-feather="edit-2"></span> Edit</button></td>
    <?php endif; ?>
      <td><button type="submit" class="btn btn-danger" href=""><span data-feather="trash-2"></span> Del</button></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
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
