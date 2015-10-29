<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paket extends CI_Controller {

    // Konfigurasi untuk validasi
    static $config = array(
            array(
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|trim|max_length[25]'
                ),
            array(
                'field' => 'jenis',
                'label' => 'Jenis',
                'rules' => 'required|trim|max_length[25]'
                ),
            array(
                'field' => 'deskripsi',
                'label' => 'Deskripsi',
                'rules' => 'required|trim'
                ),
            array(
                'field' => 'waktu',
                'label' => 'Jangka Waktu',
                'rules' => 'required|trim|max_length[20]'
                ),
            array(
                'field' => 'harga',
                'label' => 'Harga',
                'rules' => 'required|trim|integer'
                ),
            array(
                'field' => 'jumlah',
                'label' => 'Jumlah',
                'rules' => 'required|trim|max_length[20]'
                ),
        );

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('dashboard/login');
        }
        $this->load->model('backend/paket_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this::$config);
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
    }

    public function add() {

        if (!$this->input->post()) {
            // Jika tidak ada data dari submit form maka akan ditampilkan halaman "tambah paket"
            return $this->template->backend('tambah-paket');
        }

        // Jika ada data dari submit form
        // Proses Validasi
        $validation = $this->form_validation->run();

        // Jika validasi salah maka tampilkan form tambah paket beserta pesan errornya
        if ($validation == FALSE) {
            return $this->template->backend('tambah-paket');
        }
        
        //Jika validasi benar maka masukan data ke database
        $data = array(
            'paket_nama' => $this->input->post('nama'),
            'konten_jenis' => $this->input->post('jenis'),
            'paket_deskripsi' => $this->input->post('deskripsi'),
            'paket_jangkawaktu' => $this->input->post('waktu'),
            'paket_jumlah' => $this->input->post('jumlah'),
            'paket_harga' => $this->input->post('harga'),
            );
        $this->paket_model->add($data);
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
        return redirect('dashboard/paket/view');
    }

    public function index() {
        return redirect('dashboard/paket/view');
    }

    public function view() {
        // Ambil data paket pada database
        $data['paket'] = $this->paket_model->view();

        // Memuat view dengan memasukkan data kedalamnya
        return $this->template->backend('paket', $data);
    }

    public function edit($id) {

        // Ambil data paket dengan id tertentu
        $paket = $this->paket_model->get($id);

        // Cek apakah paket dengan id tertentu tersebut ada dalam database
        if ($paket == null) { // Jika paket dengan id tersebut tidak dapat ditemukan masuk ke kondisi ini
            // redirect ke halaman view paket
            $this->session->set_flashdata('danger', 'Data tidak ditemukan.');
            return redirect('dashboard/paket/view');
        }

        // Cek ada data dari form yang di-submit
        if ($this->input->post()) { // Jika terdapat data yang disubmit masuk ke kondisi ini
            // Proses Validasi data yang disubmit
            $validation = $this->form_validation->run();

            // Cek dapakah validasiya benar atau salah
            if ($validation == FALSE) { // Jika validasi salah maka masuk ke kondisi ini
                // Redirect ke form ubah paket beserta pesan errornya
                $data['paket'] = $paket;
                return $this->template->backend('ubah-paket', $data);
            }

            //Jika validasi benar maka masukan data ke database
            $data = array(
                'paket_nama' => $this->input->post('nama'),
                'konten_jenis' => $this->input->post('jenis'),
                'paket_deskripsi' => $this->input->post('deskripsi'),
                'paket_jangkawaktu' => $this->input->post('waktu'),
                'paket_jumlah' => $this->input->post('jumlah'),
                'paket_harga' => $this->input->post('harga'),
                );
            $this->paket_model->update($id, $data);

            // Redirect ke halaman view paket dengan notifikasi
            $this->session->set_flashdata('success', 'Data berhasil diubah.');
            return redirect('dashboard/paket/view');
        }

        // Jika tidak ada maka tampilkan halaman ubah paket dengan form yang sudah terisi dengan data sebelumnya
        // Jika paket ditemukan ambil datanya dan masukkan ke dalam view
        $data['paket'] = $paket;
        return $this->template->backend('ubah-paket', $data);
    }

    public function update($id) {
        // Cek ada tidaknya data yang dikirim
        if (!$this->input->post()) {
            // Jika tidak ada data dari submit form, redirect ke halaman "view paket"
            return redirect('dashboard/paket/view');
        }

        // ambil data paket dengan id tertentu
        $paket = $this->paket_model->get($id);
        if ($paket == null) {
            // Jika paket tidak dapat ditemukan, redirect ke halaman view paket
            $this->session->set_flashdata('danger', 'Data tidak ditemukan.');
            return redirect('dashboard/paket/view');
        }

        // Proses Validasi
        $validation = $this->form_validation->run();

        // Jika validasi salah maka tampilkan form tambah paket beserta pesan errornya
        if ($validation == FALSE) {
            return redirect('dashboard/paket/edit/'.$id);
        }
        
        //Jika validasi benar maka masukan data ke database
        $data = array(
            'paket_nama' => $this->input->post('nama'),
            'konten_jenis' => $this->input->post('jenis'),
            'paket_deskripsi' => $this->input->post('deskripsi'),
            'paket_jangkawaktu' => $this->input->post('waktu'),
            'paket_jumlah' => $this->input->post('jumlah'),
            'paket_harga' => $this->input->post('harga'),
            );
        $this->paket_model->update($id, $data);

        // Redirect ke halaman view paket dengan notifikasi
        $this->session->set_flashdata('success', 'Data berhasil diubah.');
        return redirect('dashboard/paket/view');

    }

    public function delete($id) {
        // Cek ada tidaknya data yang dikirim
        if (is_null($id)) {
            // Jika tidak ada data dari submit form, redirect ke halaman "view paket"
            return redirect('dashboard/paket/view');
        }

        $data = array(
            'paket_terhapus' => 1
            );
        $this->paket_model->update($id, $data);

        // Redirect ke halaman view paket dengan notifikasi
        $this->session->set_flashdata('success', 'Paket berhasil dihapus.');
        return redirect('dashboard/paket/view');
    }

    

}