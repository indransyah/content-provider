<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('dashboard/login');
        }
        $this->load->model('payment_model');
        $this->load->model('order_model');
    }

    public function index() {
        redirect('dashboard/pembayaran/view');
    }

    public function view() {

        $data['payment'] = $this->payment_model->view();

        $this->template->backend('verifikasi-pembayaran', $data);
    }

    public function detail($id) {
        if (is_null($id)) {
            return redirect('dashboard/pembayaran/view');
        }

        $payment = $this->payment_model->get($id);


        if ($this->input->post()) {
            $data = array(
                'payment_status' => $this->input->post('status')
                );
            if ($this->input->post('status') == 'lunas') {
                $dataOrder = array(
                    'order_status' => 'pengerjaan'
                );
                $this->order_model->update($payment->order_id, $dataOrder);
            }
            
            $this->payment_model->update($id, $data);
            $this->session->set_flashdata('success', 'Status berhasil diubah.');
            return redirect('dashboard/pembayaran/detail/'.$id);
        }

        $data['payment'] = $payment;

        if (count($data['payment'])==0) {
            $this->session->set_flashdata('danger', 'Data tidak ditemukan');
            return redirect('dashboard/pembayaran/view');
        }

        $this->template->backend('detail-verifikasi', $data);

    }

}