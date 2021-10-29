<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function login()
    {
        $this->load->helper(['url', 'form']);
        $this->load->view('auth/login');
    }

    public function authenticate()
    {
        $this->load->helper('url');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->load->model('User_model');
        $user = $this->User_model->get_user_by_username($username);

        if($user != null) {
            if(password_verify($password, $user->password)) {
                redirect('/');
            }
        }

        $this->session->set_flashdata('errorMessage', 'Wrong Username/Password');
        redirect('auth/login');
    }
}