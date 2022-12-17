<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuizModel extends CI_Model {

    function __construct()
    {
        //call model constructor
        parent::__construct();
    }

    function fetchAllQuiz($subject_id)
        {
            $query = $this->db->query("SELECT * FROM quiz WHERE subject_id = '".$subject_id."'");
            return $query->result();
        }
        function fetchQuizName($quiz_id)
            {
                $query = $this->db->query("SELECT quiz_title FROM quiz WHERE quiz_id ='".$quiz_id."' ");
                return $query->row();
            }

        function fetchQuiz($quiz_id)
        {
            $query = $this->db->query("select * from quiz where quiz_id ='".$quiz_id."' ");
            return $query->result();
        }

        function fetchQuestions($quiz_id)
        {
           $query = $this->db->query("SELECT * FROM questions where quiz_id ='".$quiz_id."' ");
            return $query->result();
        }

        function fetchQuestion($question_id)
        {
           $query = $this->db->query("SELECT question FROM questions WHERE question_id ='".$question_id."' ");
            return $query->result();
        }

        function countQuestions($quiz_id){
          $query = $this->db->query("SELECT count(question_id) as question_count FROM questions where quiz_id ='".$quiz_id."' ");
           return $query->result();
        }

        function fetchOptions($question_id)
        {
            $query = $this->db->query("select * from options where question_id ='".$question_id."'");
            return $query->result();
        }

        function fetchOption($option_id)
        {
            $query = $this->db->query("select * from options where option_id ='".$option_id."'");
            return $query->result();
        }

        function fetchAnswers($quiz_id)
        {
            $query = $this->db->query("select question_id, answer_id from answers where quiz_id='".$quiz_id."'");
            return $query->result();

        }

        function fetchAnswer($question_id)
        {
            $query = $this->db->query("select answers.answer_id,
            (Select option_name from options where answers.answer_id=options.option_id) As opt_name
             from answers where question_id='".$question_id."'");
            return $query->result();

        }

        function fetchOptionId($option_name, $question_id)
        {
            $query = $this->db->query("select option_id from options where option_name ='".$option_name."' and question_id='".$question_id."'");
            return $query->result();
        }

        function saveResults($data)
      	{
          $question_id = $data['question_id'];
          $option_id = $data['option_id'];
          $user_id = $data['user_id'];
          $quiz_id = $data['quiz_id'];

        	$query="insert into results (assesment_id,question_id,option_id,user_id) values('$quiz_id','$question_id','$option_id','$user_id')";
        	$this->db->query($query);
      	}

        function add_quiz($data)
      	{
          $subject_id = $data['subject_id'];
          $quiz_name = $data['quiz_name'];
          $quiz_id = $data['quiz_id'];

        	$query="insert into quiz (quiz_id,quiz_title,subject_id) values('$quiz_id','$quiz_name','$subject_id')";
        	$this->db->query($query);
      	}

        function delete_quiz($quiz_id)
      	{
        	$query="delete from quiz where quiz_id = '$quiz_id'";
        	$this->db->query($query);
      	}

        function edit_quiz($data)
      	{
          $quiz_name = $data['quiz_name'];
          $quiz_id = $data['quiz_id'];

        	$query="update quiz set quiz_title='$quiz_name' where quiz_id = '$quiz_id'";
        	$this->db->query($query);
      	}

        function edit_question($data){
          $question_name = $data['question'];
          $question_id = $data['question_id'];

        	$query="update questions set question='$question_name' where question_id = '$question_id'";
        	$this->db->query($query);

        }

        function edit_answer($data){
          $question_id = $data['question_id'];
          $answer_id = $data['answer_id'];

        	$query="update answers set answer_id ='$answer_id' where question_id = '$question_id'";
        	$this->db->query($query);

        }

        function edit_options($data){
          $id = $data['id'];
          $value = $data['value'];

        	$query="update options set option_name='$value' where option_id = '$id'";
        	$this->db->query($query);

        }

        function add_question($data)
      	{
          $question_id = $data['id'];
          $question = $data['question'];
          $quiz_id = $data['quiz_id'];

        	$query="insert into questions (question_id,question,quiz_id) values('$question_id','$question','$quiz_id')";
        	$this->db->query($query);
      	}

        function add_option($data)
      	{
          $question_id = $data['question_id'];
          $option_id = $data['option_id'];
          $option_name = $data['option_name'];

        	$query="insert into options (question_id,option_id,option_name) values('$question_id','$option_id','$option_name')";
        	$this->db->query($query);
      	}

        function fetchAnswerId($answer, $question_id)
            {
                $query = $this->db->query("SELECT option_id FROM options WHERE option_name ='".$answer."' AND question_id ='".$question_id."' ");
                return $query->row();
            }

        function add_answer($data)
      	{
          $question_id = $data['question_id'];
          $answer_id = $data['answer_id'];
          $quiz_id = $data['quiz_id'];

        	$query="insert into answers (question_id,answer_id,quiz_id) values('$question_id','$answer_id','$quiz_id')";
        	$this->db->query($query);
      	}
}
?>
