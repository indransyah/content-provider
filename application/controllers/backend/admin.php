<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('dashboard/login');
        }
        // $this->load->model('backend/user_model');
        $this->load->library('form_validation');
    }

    public function index() {
        redirect('dashboard/admin/view');
    }

    public function view() {

        //Pagination
        $config['base_url'] = base_url('dashboard/admin/view/');
        $config['per_page'] = 5;
        $value = $config['per_page'];
        $page = ($this->uri->segment(4)) ? (int) $this->uri->segment(4) : 1;
        $offset = ($page - 1) * $value;
        if ($this->input->post()) {
            $keyword = $this->input->post('keyword');
            $field = 'user_' . $this->input->post('field');
            $config['total_rows'] = $this->user_model->count($keyword, $field);
            $data['users'] = $this->user_model->view($keyword, $field, $value, $offset);
        } else {
            $config['total_rows'] = $this->user_model->count(NULL, NULL);
            $data['users'] = $this->user_model->view(NULL, NULL, $value, $offset);
        }
        $this->pagination->initialize($config); //Some config in application/config/pagination.php
        $data['pagination'] = $this->pagination->create_links();

        //Title
        $data['title'] = 'Lihat Admin';

        //Template
        $this->template->backend('admin', $data);
    }

    public function add() {

        if (!$this->input->post()) {
            $data['title'] = 'Tambah Admin';
            $this->template->backend('tambah-admin', $data);
        } else {
            $this->form_validation->set_rules('name', 'Name', 'required|trim|min_length[5]|max_length[55]');
            $this->form_validation->set_rules('email', 'Email', 'required|max_length[50]|valid_email|is_unique[nm_users.user_email]');
            $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|max_length[20]|is_unique[nm_users.user_username]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('confirm-password', 'Confirm Password', 'required|matches[password]');
            $this->form_validation->set_error_delimiters('<p class="text-error">', '</p>');
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'admin_nama' => $this->input->post('name'),
                    'admin_email' => $this->input->post('email'),
                    'admin_username' => $this->input->post('username'),
                    'admin_password' => md5($this->input->post('password'))
                );
                $this->user_model->add($data);
                redirect('dashboard/admin');
            } else {
                $data['title'] = 'Tambah Admin';
                $this->template->backend('tambah-admin', $data);
            }
        }
    }
}