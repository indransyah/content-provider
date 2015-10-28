<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pendapatan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('dashboard/login');
        }
        $this->load->model('pendapatan_model');
    }

    public function index() {
        return redirect('dashboard/pendapatan/view');
    }

    public function view() {
        $data['pendapatan'] = $this->pendapatan_model->view();
        $data['total'] = $this->pendapatan_model->total();
        return $this->template->backend('pendapatan', $data);
    }
}