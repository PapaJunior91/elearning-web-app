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

        <?php if($this->session->userdata('msg')): ?>
          <br>
          <div class="col-md-12">
              <div class="alert alert-success">
                <?php echo $this->session->userdata('msg'); $this->session->set_userdata('msg');?>
              </div>
          </div>
        <?php elseif($this->session->userdata('error_msg')): ?>
          <div class="col-md-12">
              <div class="alert alert-danger">
                <?php echo $this->session->userdata('error_msg'); $this->session->set_userdata('error_msg'); ?>
              </div>
          </div>
          <?php endif;?>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h2 class="h2"><?php echo $subject_name?> | Add Quiz </h2>
        </div>

        <form action="<?= base_url(); ?>quizcontroller/add_quiz/" method="post" class="form-inline">
            <input type="hidden" name="subject_id" value="<?php echo $subject_id ?>">
            <label class="sr-only" for="inlineFormInputGroupUsername2">Quiz Name</label>
            <div class="input-group mb-2 mr-sm-2">
              <input type="text" name="quiz_name" class="form-control" placeholder="Quiz Name" required>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Add</button>
          </form>

          <hr>

            <form action="<?= base_url(); ?>quizcontroller/add_quiz_questions_and_options/<?= $subject_id ?>" method="post">
              <div class="col-md-4">
                <label>Select Quiz</label>
                <div class="form-group">
                  <select name="quiz_id" class="form-control" required>
                    <option value="">Select Quiz</option>
                    <?php foreach($data as $row){?>
                    <option value="<?php echo $row->quiz_id; ?>"><?php echo $row->quiz_title; ?></option>
                  <?php } ?>
                  </select>
                </div>
              </div>

              <div class="col-md-12">
                <label>Question</label>
                <div class="form-group">
                  <input type='text' class='form-control' id="" name='question' required />
                </div>
              </div>

              <div class="col-md-4">
                <label>Option 1</label>
                <div class="form-group">
                  <input type='text' class='form-control' id="" name='option_1' placeholder="Option 1..." required />
                </div>
              </div>

              <div class="col-md-4">
                <label>Option 2</label>
                <div class="form-group">
                  <input type='text' class='form-control' id="" name='option_2' placeholder="Option 2..." required />
                </div>
              </div>

              <div class="col-md-4">
                <label>Option 3</label>
                <div class="form-group">
                  <input type='text' class='form-control' id="" name='option_3' placeholder="Option 3..." required />
                </div>
              </div>


              <div class="col-md-4">
                <label>Option 4</label>
                <div class="form-group">
                  <input type='text' class='form-control' id="" name='option_4' placeholder="Option 4..." required />
                </div>
              </div>

              <div class="col-md-4">
                <label>Answer</label>
                <div class="form-group">
                  <input type='text' class='form-control' id="" name='answer' placeholder="Answer..." required />
                </div>
              </div>

              <div class="col-md-6">
                <button type="submit" name="add_question" class="btn btn-success">Add Quiz</button>
              </div>

         </form>
        </main>

          </div>
        </div>
</body>
</html>
