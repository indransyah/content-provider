<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $result = $this->authentication->customerlogin($username, $password);
        if ($result) {
            redirect('customer/dashboard');
        } else {
            redirect('customer/login');
        }
    }

    public function logout() {
        $this->authentication->logout();
        redirect('customer/login');
    }

}