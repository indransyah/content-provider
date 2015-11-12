<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konten extends CI_Controller {

	static $config = array(
            array(
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|trim'
                ),
            array(
                'field' => 'keterangan',
                'label' => 'Keterangan',
                'rules' => 'required|trim'
                ),
            array(
                'field' => 'job',
                'label' => 'Job',
                'rules' => 'required|trim|integer'
                ),
        );

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('kreator_logged_in')) {
            redirect('kreator/login');
        }
        $this->load->helper('file');
       $this->load->model('job_model');
       $this->load->model('konten_model');
       $this->load->library('form_validation');
       $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
    }

    public function index() {
    	return redirect('kreator/konten/view');
    }

    public function view() {
    	$data['konten'] = $this->konten_model->view();
    	$this->template->kreator('konten', $data);
    }

    public function submit() {
    	if (!$this->input->post()) {
    		$data['error'] = '';
    		$data['job'] = $this->job_model->get100percentjobs($this->session->userdata('kreator_id'));
    		return $this->template->kreator('kirim-konten', $data);
    	}

       $this->form_validation->set_rules($this::$config);
    	$validation = $this->form_validation->run();

        // Jika validasi salah maka tampilkan form tambah paket beserta pesan errornya
        if ($validation == FALSE) {
    		$data['error'] = '';
    		$data['job'] = $this->job_model->get100percentjobs($this->session->userdata('kreator_id'));
            return $this->template->kreator('kirim-konten', $data);
        }

        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'doc|docx|rtf|txt|text|mp3|mp4|jpg|png';
		$config['max_size']	= '1000';

		$this->load->library('upload', $config);


		if ( ! $this->upload->do_upload('file'))
		{
			$data['error'] = $this->upload->display_errors();
    		$data['job'] = $this->job_model->get100percentjobs($this->session->userdata('kreator_id'));
			return $this->template->kreator('kirim-konten', $data);
		}

        $uploadData = $this->upload->data();
        $file = $uploadData['file_name'];

		$data = array(
			'konten_nama' => $this->input->post('nama'),
			'konten_keterangan' => $this->input->post('keterangan'),
			'konten_file' => $file,
			'konten_status' => 'belum diverifikasi',
			'job_id' => $this->input->post('job'),
			);
		$this->konten_model->add($data);
    	$this->session->set_flashdata('success', 'Kontent berhasil ditambahkan. Menunggu konfirmasi dari Admin.');
		return redirect('kreator/konten/');

    }

    public function resubmit($id) {
        if (!$this->input->post()) {
            $data['error'] = '';
            $data['konten'] = $this->konten_model->get($id);
            return $this->template->kreator('resubmit-konten', $data);
        }

        // unset($this::$config[0]);
        // var_dump($this::$config);
        // return 'ok';
        $config = $this::$config;
        unset($config[2]);

        $this->form_validation->set_rules($config);
        $validation = $this->form_validation->run();

        // Jika validasi salah maka tampilkan form tambah paket beserta pesan errornya
        if ($validation == FALSE) {
            // var_dump($config);
        // return 'ok';
            $data['error'] = '';
            $data['konten'] = $this->konten_model->get($id);
            return $this->template->kreator('resubmit-konten', $data);
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'doc|docx|rtf|txt|text|mp3|mp4|jpg|png';
        $config['max_size'] = '1000';

        $this->load->library('upload', $config);


        if ( ! $this->upload->do_upload('file'))
        {
            // echo 'ok';
            // return 'ok';
            $data['error'] = $this->upload->display_errors();
            $data['konten'] = $this->konten_model->get($id);
            return $this->template->kreator('resubmit-konten', $data);
        }

        $uploadData = $this->upload->data();
        $file = $uploadData['file_name'];

        $data = array(
            'konten_nama' => $this->input->post('nama'),
            'konten_keterangan' => $this->input->post('keterangan'),
            'konten_file' => $file,
            'konten_status' => 'belum diverifikasi',
            );
        $fileName = $this->konten_model->getFileName($id);
        unlink('./uploads/'.$fileName);

        $this->konten_model->update($id, $data);
        $this->session->set_flashdata('success', 'Konten berhasil dikirim lagi. Menunggu konfirmasi dari Admin.');
        return redirect('kreator/konten/view');

    }

    public function delete($id) {
        $fileName = $this->konten_model->getFileName($id);
        $status = $this->konten_model->delete($id);
        if (!$status) {
            $this->session->set_flashdata('danger', 'Konten gagal dihapus.');
            return redirect('kreator/konten/view/');
        }
        unlink('./uploads/'.$fileName);
        $this->session->set_flashdata('success', 'Konten berhasil dihapus.');
        return redirect('kreator/konten/view/');
    }

}