<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Job extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('dashboard/login');
        }
        $this->load->model('order_model');
        $this->load->model('job_model');
    }

    public function index() {
        redirect('dashboard/job/view');
    }

    public function view() {

        //Title
        $data['title'] = 'Lihat Job';

        //Template
        $this->template->backend('job', $data);
    }

    public function add($id) {
        if (is_null($id)) {
            return redirect('dashboard/order');
        }
        $data = array(
            'order_id' => $id,
            'kreator_id' => $this->input->post('kreator'),
            'job_status' => 'penerimaan'
            );
        $this->job_model->add($data);
        $this->session->set_flashdata('success', 'Job berhasil ditambahkan, menunggu konfirmasi dari kreator.');
        return redirect('dashboard/order/detail/'.$id);
    }

}