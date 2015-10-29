<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('dashboard/login');
        }

        // Load model & library yang akan digunakan
        $this->load->model('order_model');
        $this->load->model('kreator_model');
        $this->load->model('job_model');
    }

    // Mengarahkan pada halaman order
    public function index() {
        return redirect('dashboard/order/view');
    }

    // Menampilkan halaman order
    public function view() {
        $data['order'] = $this->order_model->view();
        $this->template->backend('order', $data);
    }

    // Menampilkan halaman detail order
    public function detail($id) {
        // Cek apakah URL terdapat id order atau tidak
        if (is_null($id)) {
            // Jika tidak ada maka redirect ke halaman order
            return redirect('dashboard/order/view');
        }

        // Jika ada ambil data kreator dan order
        $data['kreator'] = $this->kreator_model->view();
        $data['order'] = $this->order_model->get($id);

        // Cek apakah data order kosong atau tidak
        if (count($data['order'])==0) {
            // JIka kosong arahkan kembali ke halaman order dengan pesan error
            $this->session->set_flashdata('danger', 'Data tidak ditemukan');
            return redirect('dashboard/order/view');
        }

        // jika tidak kosong maka tampilkan halaman detail order dengan form penambahan job di dalamnya
        $data['jobBasedOnOrderId'] = $this->job_model->getJobBasedOnOrderId($id);
        $this->template->backend('detail-order', $data);
    }

    public function delete($id) {
        // Cek ada tidaknya data yang dikirim
        if (is_null($id)) {
            // Jika tidak ada data dari submit form, redirect ke halaman "view order"
            return redirect('dashboard/order/view');
        }

        $removeable = $this->order_model->removeable($id);
        if ($removeable) {
            $this->order_model->delete($id);
            $this->session->set_flashdata('success', 'Data Order telah dihapus');
            return redirect('dashboard/order/view');
        }
        $this->session->set_flashdata('danger', 'Order tidak dapat dihapus karena memiliki relasi dengan data Job');
        return redirect('dashboard/order/view');
    }

}