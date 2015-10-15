<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemesan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('dashboard/login');
        }
        // $this->load->model('backend/user_model');
    }

    public function index() {
        redirect('dashboard/pemesan/view');
    }

    public function view() {

        //Pagination
        // $config['base_url'] = base_url('dashboard/pemesan/view/');
        // $config['per_page'] = 5;
        // $value = $config['per_page'];
        // $page = ($this->uri->segment(4)) ? (int) $this->uri->segment(4) : 1;
        // $offset = ($page - 1) * $value;
        // if ($this->input->post()) {
        //     $keyword = $this->input->post('keyword');
        //     $field = 'user_' . $this->input->post('field');
        //     $config['total_rows'] = $this->user_model->count($keyword, $field);
        //     $data['users'] = $this->user_model->view($keyword, $field, $value, $offset);
        // } else {
        //     $config['total_rows'] = $this->user_model->count(NULL, NULL);
        //     $data['users'] = $this->user_model->view(NULL, NULL, $value, $offset);
        // }
        // $this->pagination->initialize($config); //Some config in application/config/pagination.php
        // $data['pagination'] = $this->pagination->create_links();

        //Title
        $data['title'] = 'Lihat Pemesan';

        //Template
        $this->template->backend('customer', $data);
    }

}