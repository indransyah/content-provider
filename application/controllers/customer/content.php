<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Content extends CI_Controller {

	 public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('customer_logged_in')) {
            redirect('customer/login');
        }
       // $this->load->model('backend/order_model');
    }

    public function view() {
        
        $this->template->customer('konten');
    }

}