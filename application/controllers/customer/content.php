<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Content extends CI_Controller {

	 public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('customer_logged_in')) {
            redirect('customer/login');
        }
       $this->load->model('konten_model');
    }

    public function index() {
        return redirect('customer/konten/view');
    }

    public function view() {
        $data['konten'] = $this->konten_model->getContentByCustomerId($this->session->userdata('customer_id'));
        // var_dump($data['konten']);
        // return 'ok';
        return $this->template->customer('konten', $data);
    }

}