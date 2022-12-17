<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Add Quiz</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.4.5.2.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/dashboard.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/js/feather.min.js"></script>

    <!--Bootstrap script tag-->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.3.4.1.min.js"></script>

    <!--jquery script tag-->
    <script src="<?php echo base_url(); ?>assets/js/jquery.3.5.1.js"></script>


    <script src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>

  </head>

<body>
  <div class="container-fluid">
    <div class="row">

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

        <?php if($this->session->userdata('msg') != null): ?>
          <br>
          <div class="col-md-12">
              <div class="alert alert-success">
                <?php echo $this->session->userdata('msg'); $this->session->set_userdata('msg');?>
              </div>
          </div>
        <?php elseif($this->session->userdata('error_msg') != null): ?>
          <div class="col-md-12">
              <div class="alert alert-danger">
                <?php echo $this->session->userdata('error_msg'); $this->session->set_userdata('error_msg'); ?>
              </div>
          </div>
          <?php endif;?>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2"><?php echo $quiz_name->quiz_title?> | Edit Quiz </h1>
        </div>


            <form action="<?= base_url(); ?>quizcontroller/edit_quiz/<?= $quiz_id?>/<?= $subject_id?>" method="post">
              <div class="col-md-4">
                <label class="font-weight-bold">Quiz Name</label>
                <div class="form-group">
                    <input type='text' class='form-control' value="<?php echo $quiz_name->quiz_title?>" name="quiz_name" required />
                </div>
              </div>

              <div class="col-md-12">
                <label class="font-weight-bold">Question</label>
                <div class="form-group">
                  <input type="text" class='form-control' value="<?php echo $question[0]->question ?>" name="question_name" required />
                  <input type="hidden" value="<?php echo $question_id?>" name="question_id"/>
                </div>
              </div>

              <?php
              //print_r($answer);
              $i = 0;

              foreach ($options as $option) {
                $i++;?>

              <div class="col-md-4">
                <label class="font-weight-bold">Option</label>
                <div class="form-group">
                  <input type="text" class="form-control" value="<?php echo $option->option_name; ?>" name="<?php echo $option->option_id; ?>" required />
                </div>
              </div>
            <?php    }?>

            <div class="col-md-4">
              <label class="font-weight-bold">Answer</label>
              <div class="form-group">
                <input type='text' class='form-control' value="<?php echo $answer[0]->opt_name; ?>" name="answer" required />
                <input type="hidden" value="<?php echo $answer[0]->answer_id; ?>" name="answer_id"/>
              </div>
            </div>

          <div class="row">
            <div class="col-md-6">
              <button type="submit" class="btn btn-success">Update Quiz</button>
            </div>
          </div>

         </form>
        </main>

          </div>
        </div>
</body>
</html>
