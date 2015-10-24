<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Job extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('kreator_logged_in')) {
            redirect('kreator/login');
        }
       $this->load->model('job_model');
    }

    public function index() {
    	return redirect('kreator/job/view');        
    }

    public function view() {
    	$data['job'] = $this->job_model->getJobBasedOnKreatorId($this->session->userdata('kreator_id'));
        return $this->template->kreator('job', $data);
    }

    public function detail($id) {
    	$data['job'] = $this->job_model->get($id, $this->session->userdata('kreator_id'));
    	return $this->template->kreator('detail-job', $data);
    }

    public function terima($id) {
    	$data['job_status'] = 'diterima';
    	$status = $this->job_model->terima($id, $this->session->userdata('kreator_id'), $data);
    	if (!$status) {
    		$this->session->set_flashdata('danger', 'Terjadi kesalahan, hubungi admin!');
            return redirect('kreator/job/detail/'.$id);
    	}
    	$this->session->set_flashdata('success', 'Job berhasil diterima. Selamat mengerjakan.');
        return redirect('kreator/job/detail/'.$id);
    }

    public function tolak($id) {
    	$data['job_status'] = 'ditolak';
    	$status = $this->job_model->tolak($id, $this->session->userdata('kreator_id'), $data);
    	if (!$status) {
    		$this->session->set_flashdata('danger', 'Terjadi kesalahan, hubungi admin!');
            return redirect('kreator/job/detail/'.$id);
    	}
    	$this->session->set_flashdata('success', 'Job telah berhasil ditolak.');
        return redirect('kreator/job/detail/'.$id);
    }

}