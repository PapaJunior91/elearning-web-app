<?php
class AuthModel extends CI_Model {

    public function login() 
    {

        $this->db->where([
            'username' => $this->input->post('username'), 
            'password' => $this->input->post('password')
        ]);

        $query = $this->db->get('users');

        return $query->row();

    }

    public function fetch_user_data($username) {
        // $username = $this->input->post('username');
        $query = $this->db->query("SELECT user_id, role FROM users WHERE username = '".$username."'");
        return $query->row();
    }

    public function register($data) {
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];
        $role = $data['role'];
        
        return $this->db->query("INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')");
        // return $query->row();
    }


}
?>
