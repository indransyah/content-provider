<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gaji extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('kreator_logged_in')) {
            redirect('kreator/login');
        }
       $this->load->model('gaji_model');
    }

    public function index() {
    	return redirect('kreator/gaji/view');        
    }

    public function view() {
        $data['gaji'] = $this->gaji_model->view($this->session->userdata('kreator_id'));
    	$data['total'] = $this->gaji_model->total($this->session->userdata('kreator_id'));
        return $this->template->kreator('gaji', $data);
    }

    // public function detail($id) {
    //     $data['job'] = $this->job_model->get($id, $this->session->userdata('kreator_id'));
    //     if (is_null($id) OR count($data['job'])==0) {
    //         $this->session->set_flashdata('danger', 'ID tidak ditemukan');
    //         return redirect('kreator/job/view');
    //     }
    //     if ($this->input->post()) {
    //         $dataJob = array(
    //             'job_progress' => $this->input->post('progress')
    //             );
    //         $this->job_model->update($id, $dataJob);
    //         $this->session->set_flashdata('success', 'Progress berhasil diperbarui!');
    //         return redirect('kreator/job/detail/'.$id);
    //     }
    // 	return $this->template->kreator('detail-job', $data);
    // }

}