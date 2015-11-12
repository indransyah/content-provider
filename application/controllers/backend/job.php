<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Job extends CI_Controller {

    static $config = array(
            array(
                'field' => 'keuntungan',
                'label' => 'Keuntungan',
                'rules' => 'trim|integer'
                ),
        );

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('dashboard/login');
        }

        // Load model & library yang akan digunakan
        $this->load->model('order_model');
        $this->load->model('job_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this::$config);
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
    }

    // Mengarahkan pada halaman job
    public function index() {
        return redirect('dashboard/job/view');
    }

    // Menampilkan halaman job
    public function view() {
        $data['job'] = $this->job_model->view();
        $this->template->backend('job', $data);
    }

    // Menambah job dari halaman detail order
    public function add($id) {
        // Cek apakah id kosong atau tidak
        if (is_null($id)) {
            // Jika kosong arahkan ke halaman order
            return redirect('dashboard/order');
        }

        // Jika ada data 
        // Proses Validasi
        $validation = $this->form_validation->run();

        // Jika validasi salah maka tampilkan form tambah paket beserta pesan errornya
        if ($validation == FALSE) {
            $this->session->set_flashdata('danger', 'Data yang Anda inputkan salah, mohon periksa kembali!');
            return redirect('dashboard/order/detail/'.$id);
        }

        // Jika tidak buat data job baru dan simpan
        // Ambil input keuntungan
        $keuntungan = $this->input->post('keuntungan');
        // Cek apakah kosong atau tidak, jika kosong beri keuntungan 10%
        if ($this->input->post('keuntungan') == '') {
            $keuntungan = 10;
        }
        $data = array(
            'order_id' => $id,
            'kreator_id' => $this->input->post('kreator'),
            'job_keuntungan' => $keuntungan,
            'job_status' => 'belum diverifikasi'
            );
        $this->job_model->add($data);

        // Arahkan ke halaman detail order dengan pesan sukses
        $this->session->set_flashdata('success', 'Job berhasil ditambahkan, menunggu konfirmasi dari kreator.');
        return redirect('dashboard/job/view/');
    }

    public function delete($id) {
        // $status = $this->job_model->delete($id);
        // if (!$status) {
        //     $this->session->set_flashdata('danger', 'Job gagal dihapus.');
        //     return redirect('dashboard/job/view/');
        // }
        // $this->session->set_flashdata('success', 'Job berhasil dihapus.');
        // return redirect('dashboard/job/view/');

        if (is_null($id)) {
            // Jika tidak ada data dari submit form, redirect ke halaman "view job"
            return redirect('dashboard/job/view');
        }

        $removeable = $this->job_model->removeable($id);
        if ($removeable) {
            // $this->job_model->delete($id);
            $this->session->set_flashdata('success', 'Data Job berhasil dihapus');
            return redirect('dashboard/job/view');
        }
        $this->session->set_flashdata('danger', 'Data Job yang sudah selesai dikerjakan tidak dapat dihapus karena memiliki relasi dengan data Gaji dan Pendapatan');
        return redirect('dashboard/job/view');
    }

    public function detail($id) {
        $data['job'] = $this->job_model->getWithOutKreatorID($id);
        return $this->template->backend('detail-job', $data);
    }

}