<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	 public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('dashboard/login');
        }
       // $this->load->model('backend/order_model');
    }

    public function index() {
        
        $this->template->backend('dashboard');
    }

}