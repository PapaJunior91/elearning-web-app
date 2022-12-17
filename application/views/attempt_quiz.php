<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Quiz</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.4.5.2.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/dashboard.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/js/feather.min.js"></script>

    <!--Bootstrap script tag-->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.3.4.1.min.js"></script>

    <!--jquery script tag-->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/feather.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/attempt_quiz.js"></script>


    <style>
      input[type=text] {
        background-color: #3CBC8D;
        color: white;
        text-align: center;
      }
    </style>
  </head>

  <body>

<div class="container-fluid">
  <div class="row">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Quiz 1 | <?php echo $quiz_name; ?></h1>
      </div>

      <div class="row">
        <div class="col-md-2"><b>Points:</b> 30</div>
        <div class="col-md-2"><b>Questions:</b> 15</div>
        <div class="col-md-2"><b>Time Limit:</b> 30Mins</div>
      </div>

      <br>

      <h4>Instructions</h4>
      <ul>
        <li>Time allowed 30 mins, once the 30 mins elapses, the quiz will automatically submit</li>
        <li>You are advised to have a piece rough book for your side work</li>
        <li>Copy and pasting questions into google only affects your study progress</li>
        <li>GoodLuck!</li>
      </ul>

      <div class="row">
        <div class="col-md-4" id="main">
          <button type="button" id="btn" class="btn btn-primary" onclick="startQuiz()">Start Quiz</button>
        </div>

        <div class="col-md-2">
          <input type="text" id="quiz_time" value="900" class="form-control">
        </div>
      </div>

      <br>

      <div class="row">
        <div class="col-md-6" id="quiz" <?php if($this->session->userdata('role') != "Teacher"):?>style="display:none;"<?php endif?> >
          <form action="<?= base_url(); ?>quizcontroller/validate_quiz/<?= $quiz_id?>/<?= $number_of_question?>/<?= $subject_id?>" method="post">

                      <?php
$count = 0;
 foreach($questions as $question)
                {
                  $count++?>

          <ul class="list-group">
            <li class="list-group-item list-group-item-action active">
            Question <?php echo $count;?>: <?php   echo $question->question;  ?>
            </li>
            <?php
            $question_id = $question->question_id;
            $options = $this->QuizModel->fetchOptions($question_id);
            foreach ($options as $option) {?>
            <li class="list-group-item">
              <input type="radio" name="<?php echo $question_id; ?>"
              value="<?php echo $option->option_id; ?>" required>&nbsp;<?php echo $option->option_name; ?>
            </li>

<?php  }

if($this->session->userdata('role') == "Teacher"):?>
<li class="list-group-item">
<a class="float-right" href="<?= base_url(); ?>quizcontroller/edit_quiz_form/<?= $question_id?>/<?= $quiz_id?>/<?= $subject_id?>"><span class="badge badge-pill badge-primary">Edit</span></a>&nbsp;<a class="float-right" href="<?= base_url(); ?>quizcontroller/edit_quiz_form/<?= $question_id?>/<?= $quiz_id?>/<?= $subject_id?>"><span class="badge badge-pill badge-danger">Del</span></a>
</li>
<?php endif ?>
          </ul>
          <br>
         <?php }?>
         <button type="submit" class="btn btn-success">Submit Quiz</button>
       </form>

        </div>
      </div>

      </div>

    </main>
  </div>
</div>
    </body>
</html>
