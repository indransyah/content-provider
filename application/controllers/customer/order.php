<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Order extends CI_Controller {

    static $config = array(
            array(
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
       $this->load->model('backend/paket_model');
       $this->load->model('order_model');
       $this->load->library('form_validation');
       $this->form_validation->set_rules($this::$config);
       $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
    }

    public function add() {
        $data['paket'] = $this->paket_model->view();

        // Cek apakah ada data yang disubmit
        if (!$this->input->post()) { // Jika tidak ada maka masuk ke kondisi ini
            // Menampilkan halaman tambah order
            return $this->template->customer('buat-order', $data);
        }

        // Jika ada data dari submit form
        // Proses Validasi
        $validation = $this->form_validation->run();

        // Jika validasi salah maka tampilkan form tambah paket beserta pesan errornya
        if ($validation == FALSE) {
            return $this->template->customer('buat-order', $data);
        }
        
        // Ambil harga paket untuk dikalikan dengan jumlah
        $paket = $this->paket_model->get($this->input->post('paket'));
        
        //Jika validasi benar maka masukan data ke database
        $data = array(
            'pemesan_id' => $this->session->userdata('customer_id'),
            'paket_id' => $this->input->post('paket'),
            'order_date' => date('Y-m-d'),
            'order_jumlah' => $this->input->post('jumlah'),
            'order_total' => $this->input->post('jumlah') * $paket->paket_harga,
            'order_keterangan' => $this->input->post('keterangan'),
            'order_status' => 'proses pembayaran',
            );
        $this->order_model->add($data);
        $this->session->set_flashdata('success', 'Order berhasil ditambahkan.');
        return redirect('customer/order/view');

        
    }

    public function view() {
        $data['order'] = $this->order_model->viewByCustomer($this->session->userdata('customer_id'));
        // var_dump($data['order']);
        // return 'ok';
        return $this->template->customer('order', $data);
    }

    public function detail($id) {
        $data['order'] = $this->order_model->get($id,$this->session->userdata('customer_id'));
        $this->template->customer('detail-order', $data);
    }

}