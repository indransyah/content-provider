<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konten extends CI_Controller {

    static $config = array(
            array(
                'field' => 'komentar',
                'label' => 'Komentar',
                'rules' => 'required|trim'
                ),
            array(
                'field' => 'status',
                'label' => 'Status',
                'rules' => 'required|trim'
                )
        );

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('dashboard/login');
        }

        // Load model & library yang akan digunakan
        $this->load->model('konten_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this::$config);
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
    }

    // Mengarahkan pada halaman order
    public function index() {
        return redirect('dashboard/konten/view');
    }

    // Menampilkan halaman order
    public function view() {
        $data['konten'] = $this->konten_model->view();
        $this->template->backend('konten', $data);
    }

    // Menampilkan halaman detail order
    public function detail($id) {
        // Cek apakah URL terdapat id order atau tidak
        if (is_null($id)) {
            // Jika tidak ada maka redirect ke halaman order
            return redirect('dashboard/konten/view');
        }
        
        // Jika ada ambil data konten
        $data['konten'] = $this->konten_model->get($id);

        if ($this->input->post()) {
            $validation = $this->form_validation->run();

            // Cek dapakah validasiya benar atau salah
            if ($validation == FALSE) { // Jika validasi salah maka masuk ke kondisi ini
                // Redirect ke form ubah paket beserta pesan errornya
                return $this->template->backend('detail-konten', $data);
            }

            //Jika validasi benar maka masukan data ke database
            $data = array(
                'konten_komentar' => $this->input->post('komentar'),
                'konten_status' => $this->input->post('status')
                );
            $this->konten_model->update($id, $data);

            // Redirect ke halaman view paket dengan notifikasi
            $this->session->set_flashdata('success', 'Konten berhasil diubah.');
            return redirect('dashboard/konten/detail/'.$id);
        }


        // Cek apakah data konten kosong atau tidak
        if (count($data['konten'])==0) {
            // JIka kosong arahkan kembali ke halaman konten dengan pesan error
            $this->session->set_flashdata('danger', 'Data tidak ditemukan');
            return redirect('dashboard/konten/view');
        }

        // jika tidak kosong maka tampilkan halaman detail konten dengan form penambahan job di dalamnya
        return $this->template->backend('detail-konten', $data);
    }

}