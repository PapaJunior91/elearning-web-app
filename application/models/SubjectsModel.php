<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubjectsModel extends CI_Model {

    function __construct()
    {
        //call model constructor
        parent::__construct();
    }

    function fetchSubjectName($subject_id)
        {
            $query = $this->db->query("select subject_name from subjects where subject_id ='".$subject_id."' ");
            return $query->row();
        }

    function fetchMySubjects($user_id)
        {
            $query = $this->db->query("select subjects.subject_id, subjects.subject_name, subjects.description from subjects inner join users_subjects ON subjects.subject_id = users_subjects.subject_id where users_subjects.user_id ='".$user_id."' ");
            return $query->result();
        }

        function fetchCourseOutline($subject_id)
            {
                $query = $this->db->query("select topic_id, sub_topic from subjects_course_outline where subject_id ='".$subject_id."' ");
                return $query->result();
            }
}
?>
