<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('dashboard/login');
        }
        $this->load->model('order_model');
        $this->load->model('kreator_model');
        $this->load->model('job_model');

    }

    public function index() {
        redirect('dashboard/order/view');
    }

    public function view() {
        $data['order'] = $this->order_model->view();
        //Pagination
        // $config['base_url'] = base_url('dashboard/order/view/');
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

        //Template
        $this->template->backend('order', $data);
    }

    public function detail($id) {
        if (is_null($id)) {
            return redirect('dashboard/order/view');
        }
        $data['kreator'] = $this->kreator_model->view();
        $data['order'] = $this->order_model->get($id);
        if (count($data['order'])==0) {
            $this->session->set_flashdata('danger', 'Data tidak ditemukan');
            return redirect('dashboard/order/view');
        }
        $data['jobBasedOnOrderId'] = $this->job_model->getJobBasedOnOrderId($id);
        $this->template->backend('detail-order', $data);
    }

}