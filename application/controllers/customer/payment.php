<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment extends CI_Controller {

    // Konfigurasi aturan validasi
    static $config = array(
            array(
                'field' => 'order',
                'label' => 'Order',
                'rules' => 'required|trim'
                ), array(
                'field' => 'jumlah',
                'label' => 'Jumlah',
                'rules' => 'required|trim|integer'
                ),
            array(
                'field' => 'keterangan',
                'label' => 'Keterangan',
                'rules' => 'required|trim'
                )
        );

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('customer_logged_in')) {
            redirect('customer/login');
        }

        // Load model & library yang akan digunakan
        $this->load->model('order_model');
        $this->load->model('payment_model');
        $this->load->library('form_validation');

        // Konfigurasi validasi
        $this->form_validation->set_rules($this::$config);
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
    }

    public function confirm() {
        // Ambil data-data order dengan status dalam 'proses pembayaran'
        $data['order'] = $this->order_model->view($this->session->userdata('customer_id'), 'proses pembayaran');

        // Cek apakah terdapat submit data dari form
        if (!$this->input->post()) {
            // Jika tidak ada langsung tampilkan halaman konfirmasi
            return $this->template->customer('pembayaran', $data);
        }

        // Jika ada data dari submit form
        // Proses Validasi
        $validation = $this->form_validation->run();

        // Jika validasi salah maka tampilkan form tambah paket beserta pesan errornya
        if ($validation == FALSE) {
            return $this->template->customer('pembayaran', $data);
        }
        
        //Jika validasi benar maka masukan data ke database
        $data = array(
            'order_id' => $this->input->post('order'),
            'payment_date' => date('Y-m-d'),
            'payment_total' => $this->input->post('jumlah'),
            'payment_keterangan' => $this->input->post('keterangan'),
            'payment_status' => 'sudah dibayar',
            );
        $this->payment_model->add($data);

        // $dataOrder = array(
        //     'order_status' => 'verifikasi pembayaran'
        //     );
        // $this->order_model->update($this->input->post('order'), $dataOrder);
        
        // Arahkan halaman dengan pesan sukses
        $this->session->set_flashdata('success', 'Konfirmasi pwmbayaran berhasil. Pihak kami akan menghubungi Anda jika pembayaran telah diterima.');
        return redirect('customer/payment/confirm');
    }

}