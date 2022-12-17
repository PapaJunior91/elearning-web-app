<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuizController extends CI_Controller {

	 public function __construct()
    {
        parent::__construct();

        //calling model
        $this->load->model("QuizModel");
				$this->load->model("SubjectsModel");
    }

		public function add_quiz_form()
		{
			$subject_id = $this->uri->segment(3);
			$subject_name = $this->SubjectsModel->fetchSubjectName($subject_id);

			$result = array(
				'subject_name' => $subject_name->subject_name,
				'data' => $this->QuizModel->fetchAllQuiz($subject_id),
				'subject_id' => $subject_id
			);

			$this->load->view('include/nav.inc');
			$this->load->view('include/side_nav.inc', $result);
			$this->load->view('add_quiz_form', $result);
		}

		public function add_quiz(){
			$subject_id = $this->input->post('subject_id');
			$data = array(
				'subject_id'  => $subject_id,
				'quiz_name'  => $this->input->post('quiz_name'),
				'quiz_id' => uniqid()
			);

			$this->QuizModel->add_quiz($data);

			$data_error = array(
				'error_msg'  => "Failure, conatct system administrator",
				'msg'  => "Quiz added Successfully"
			);
			$this->session->set_userdata($data_error);
			redirect('QuizController/add_quiz_form/'.$subject_id);

		}

		public function add_quiz_questions_and_options()
		{

			$subject_id = $this->uri->segment(3);

			//add question
			$quiz_id = $this->input->post('quiz_id');
			$question_id = uniqid();
			$data = array(
				'question' => $this->input->post('question'),
				'id' => $question_id,
				'quiz_id' => $quiz_id
			);
			$this->QuizModel->add_question($data);

			//add options
			$i = 4;
			for ($i=1; $i <=4 ; $i++) {
				$option = "option_".$i;
				$data = array(
					'question_id' => $question_id,
					'option_id' => uniqid(),
					'option_name' => $this->input->post($option)
				);
				$this->QuizModel->add_option($data);

			}
			//add answer
			$answer = $this->input->post('answer');
			$answer_id = $this->QuizModel->fetchAnswerId($answer,$question_id);
			$data = array(
					'question_id' => $question_id,
					'answer_id' => $answer_id->option_id,
					'quiz_id' => $quiz_id
				);
				$this->QuizModel->add_answer($data);

				$data_error = array(
					'error_msg'  => "Failure, contact system administrator",
					'msg'  => "Question added Successfully"
				);
				$this->session->set_userdata($data_error);

				redirect('QuizController/add_quiz_form/'.$subject_id);


			}

	public function quizzes()
	{
		$subject_id = $this->uri->segment(3);
		$subject_name = $this->SubjectsModel->fetchSubjectName($subject_id);

		$result = array(
			'subject_name' => $subject_name->subject_name,
			'data' => $this->QuizModel->fetchAllQuiz($subject_id),
			'subject_id' => $subject_id
		);

		$this->load->view('include/nav.inc');
		$this->load->view('include/side_nav.inc',$result);
		$this->load->view('quizzes', $result);
	}

	public function attempt_quiz(){
		$quiz_id = $this->uri->segment(3);
		$subject_id = $this->uri->segment(5);
		$quiz_name = $this->QuizModel->fetchQuizName($quiz_id);

		$data = array(
			'number_of_question' => $this->uri->segment(4),
			'subject_id' => $this->uri->segment(5),
			'questions' => $this->QuizModel->fetchQuestions($quiz_id),
			'quiz_id'	 => $quiz_id,
			'subject_name' => $this->SubjectsModel->fetchSubjectName($subject_id),
			'quiz_name' => $quiz_name->quiz_title
		);

		$this->load->view('include/nav.inc');
		$this->load->view('include/side_nav.inc',$data);
		$this->load->view('attempt_quiz', $data);

	}


	public function validate_quiz()	{

	  $postData['options'] = $this->input->post();
		$quiz_id = $this->uri->segment(3);

		foreach (array_keys($postData['options']) as $key) {

			foreach ($postData as $value) {
				$data = array(
					'question_id' =>$key,
					'option_id'		=>$value[$key],
					'quiz_id' => $quiz_id,
					'user_id' => $this->session->userdata('user_id')
				 );
				//$this->QuizModel->saveResults($data);

			}

		}

		$postData = array(
			'questions' => json_decode(json_encode($this->QuizModel->fetchQuestions($quiz_id)), true),
			'answers' => json_decode(json_encode($this->QuizModel->fetchAnswers($quiz_id)), true),
			'number_of_question' => $this->uri->segment(4),
			'subject_id' => $this->uri->segment(5),
			'options' => $this->input->post()
		);

		$this->load->view('include/nav.inc');
		$this->load->view('include/side_nav.inc',$postData);
		$this->load->view('quiz_result',$postData);
	}

	public function delete_quiz(){
		$quiz_id = $this->uri->segment(3);
		$subject_id = $this->uri->segment(4);
		$this->QuizModel->delete_quiz($quiz_id);
		redirect('QuizController/quizzes/'.$subject_id);
	}

	public function edit_quiz_form(){
		$question_id = $this->uri->segment(3);
		$quiz_id = $this->uri->segment(4);
		$subject_id = $this->uri->segment(5);

		$data = array(
			'question' => $this->QuizModel->fetchQuestion($question_id),
			'options' => $this->QuizModel->fetchOptions($question_id),
			'quiz_name' => $this->QuizModel->fetchQuizName($quiz_id),
			'subject_name' => $this->SubjectsModel->fetchSubjectName($subject_id),
			'subject_id' => $subject_id,
			'quiz_id' => $quiz_id,
			'answer' => $this->QuizModel->fetchAnswer($question_id),
			'question_id' => $question_id
		);

		$this->load->view('include/nav.inc');
		$this->load->view('include/side_nav.inc',$data);
		$this->load->view('edit_quiz_form', $data);

	}

	//edit quiz
	public function edit_quiz(){
		$subject_id = $this->uri->segment(4);
		$quiz_id = $this->uri->segment(3);
		$question_id = $this->input->post('question_id');

		//updating quiz name
		$data = array(
			'quiz_name' => $this->input->post('quiz_name'),
			'quiz_id' => $quiz_id
		);
		$this->QuizModel->edit_quiz($data);

		//updating question
		$data = array(
			'question' => $this->input->post('question_name'),
			'question_id' => $question_id
		);
		$this->QuizModel->edit_question($data);

		//updating answer
		$answer =  $this->input->post('answer');
		$answer_id = $this->QuizModel->fetchOptionId($answer, $question_id);

		$data = array(
			'question_id' =>$question_id,
			'answer_id' => $answer_id[0]->option_id
		);
		$this->QuizModel->edit_answer($data);

		$formData = $this->input->post();

		unset($formData['quiz_name']);unset($formData['question_name']);unset($formData['question_id']);
		unset($formData['question_id']);unset($formData['answer_id']);

		$postData['data'] = $formData;

		foreach (array_keys($postData['data']) as $key) {

			foreach ($postData as $value) {
				$data = array(
					'id' =>$key,
					'value'	=> $value[$key]
				 );
				$this->QuizModel->edit_options($data);

			}

		}

		redirect('QuizController/attempt_quiz/'.$quiz_id."/1/".$subject_id);

	}


	}
