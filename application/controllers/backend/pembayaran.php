<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('dashboard/login');
        }

        // Load model & library yang akan digunakan
        $this->load->model('payment_model');
        $this->load->model('order_model');
    }

    // Mengarahkan pada halaman pembayaran / payment
    public function index() {
        redirect('dashboard/pembayaran/view');
    }

    // Menampilkan halaman pembayaran / payment
    public function view() {

        // Ambil data payment dari database
        $data['payment'] = $this->payment_model->view();

        // Memuat view dengan data payment dari database
        return $this->template->backend('verifikasi-pembayaran', $data);
    }

    // Menampilkan halaman detail pembayaran dengan fungsi konfirmasi pembayaran di dalamnya
    public function detail($id) {
        // Cek apakah URL terdapat id payment atau tidak
        if (is_null($id)) {
            // Jika tidak ada maka redirect ke halaman pembayaran
            return redirect('dashboard/pembayaran/view');
        }

        // Cek apakah terdapat submit data dari form konfirmasi pembayaran
        if ($this->input->post()) {
            // JIka ada ubah status payment
            $data = array(
                'payment_status' => $this->input->post('status')
                );
            $this->payment_model->update($id, $data);

            // if ($this->input->post('status') == 'lunas') {
            //     $dataOrder = array(
            //         'order_status' => 'pengerjaan'
            //     );
            //     $this->order_model->update($payment->order_id, $dataOrder);
            // }
            
            // redirect ke halaman detail pembayaran dengan pesan sukses
            $this->session->set_flashdata('success', 'Status berhasil diubah.');
            return redirect('dashboard/pembayaran/detail/'.$id);
        }

        // Jika tidak ada submit data dari form konfirmasi pembayaran, ambil data payment berdasarkan id tersebut
        $data['payment'] = $this->payment_model->get($id);

        //Cek apakah terdapat data payment dengan id tersebut
        if (count($data['payment'])==0) {
            // Jika tidak ada data payment dengan id tersebut redirect ke halaman pembayaran dengan pesan error
            $this->session->set_flashdata('danger', 'Data tidak ditemukan');
            return redirect('dashboard/pembayaran/view');
        }

        // Jika ada tampilkan halaman detail pembayaran
        $this->template->backend('detail-verifikasi', $data);

    }

    public function delete($id) {
        // Cek apakah URL terdapat id payment atau tidak
        if (is_null($id)) {
            // Jika tidak ada maka redirect ke halaman pembayaran
            return redirect('dashboard/pembayaran/view');
        }

        $status = $this->payment_model->delete($id);
        if (!$status) {
            $this->session->set_flashdata('danger', 'Pembayaran gagal dihapus.');
            return redirect('dashboard/pembayaran/view/');
        }
        $this->session->set_flashdata('success', 'Pembayaran berhasil dihapus.');
        return redirect('dashboard/pembayaran/view/');
    }

}