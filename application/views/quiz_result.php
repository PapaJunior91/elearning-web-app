

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Results</title>

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
        <h1 class="h2">Quiz 1: <?php echo $quiz_name; ?> | Results</h1>
      </div>
<?php
      $length = count($options);
      $count = 0;
      $mark = 0;

     for($i=0; $i<$length; $i++) {
        $count++;
        $question_id = $questions[$i]['question_id'];
        if($options[$question_id] == $answers[$i]['answer_id']){
        $mark++;
        }
      }
?>

          <div class="row">
        <div class="col-md-3"><b>Score: <?php echo $mark; ?></b> </div>
        <div class="col-md-3"><b>Questions: <?php echo count($options); ?></b> </div>
      </div>

      <br>

      <div class="row">
        <div class="col-md-6">
          <?php
          $count = 0;

            for($i=0; $i<$length; $i++) {
              $count++;
          ?>

          <ul class="list-group">
            <li class="list-group-item list-group-item-action active"><?php echo $count;?>: <?php   echo $questions[$i]['question'];  ?></li>
            <li class="list-group-item">
            <?php
            $question_id = $questions[$i]['question_id'];
          if($options[$question_id] == $answers[$i]['answer_id']){
            echo"<b class='text-success'>TRUE"."&nbsp"."Right Answer:"."&nbsp";
            $option_id = $answers[$i]['answer_id'];
          foreach ($this->QuizModel->fetchOption($option_id) as $opt) {
            echo $opt->option_name;
          }
           echo "</b>";

          }else {

            $option_id = $options[$question_id];
            echo"<b class='text-danger'>FALSE"."&nbsp"."Right Answer:"."&nbsp";

            $option_id = $answers[$i]['answer_id'];
          foreach ($this->QuizModel->fetchOption($option_id) as $opt) {
            echo $opt->option_name;
          }
           echo "</b>";
          }
          ?>
        </li>
      </ul>
<br>
<?php

}

?>

<br>

<div class="row">
  <div class="col-md-4">
    <button type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url(); ?>QuizController/quizzes/<?= $subject_id?>'">Continue</button>
  </div>
</div>
</div>



</main>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>
</body>
</html>
