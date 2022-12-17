<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    function __construct()
    {
        //call model constructor
        parent::__construct();
    }

    function login($username, $password)
        {
            $query = $this->db->query("select * from login where username='".$username."' and password = '".$password."' ");
        }




}
?>
