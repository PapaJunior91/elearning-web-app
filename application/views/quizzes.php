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

    <!--Bootstrap script tag-->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.3.4.1.min.js"></script>

    <!--jquery script tag-->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/feather.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>


  </head>

<body>
  <div class="container-fluid">
    <div class="row">
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2"><?php echo $subject_name?> | Quiz </h1>
        </div>

        <div class="row mb-2">
      	   <div class="list-group list-group-flush" style="width: 100%">
             <li type="button" class="list-group-item list-group-item-action active">
               Practice Quiz
               <?php
               if($this->session->userdata('role') == "Teacher"):?>
               <button type="button" onclick="location.href='<?= base_url(); ?>quizcontroller/add_quiz_form/<?= $subject_id?>'" style="float:right;" class="btn btn-success">Add Quiz</button>
             <?php endif ?>

             </li>

<?php
$count = 0;
foreach($data as $row){
  $count++;

  $quiz_id = $row->quiz_id;

foreach ($this->QuizModel->countQuestions($quiz_id) as $value) {
                	?>
<li class="list-group-item list-group-item-action">
 <button type="button" onclick="location.href='<?= base_url(); ?>quizcontroller/attempt_quiz/<?= $row->quiz_id?>/<?= $value->question_count ?>/<?= $subject_id?>'" class="list-group-item list-group-item-action">Quiz <?php echo $count ?>: <?php
echo $row->quiz_title;
 ?>
  	<br>
  	<small><?php
echo $value->question_count;
 ?> questions</small>
  </button>
  <?php
  if($this->session->userdata('role') == "Teacher"):?>
  <a href="<?= base_url(); ?>quizcontroller/delete_quiz/<?= $row->quiz_id?>/<?= $subject_id?>"><span class="badge badge-pill badge-danger">del</span></a>
<?php endif ?>
</li>

                <?php
}

                }

?>
</div>


</div>

  </div>


    </main>
  </div>
</body>
</html>
