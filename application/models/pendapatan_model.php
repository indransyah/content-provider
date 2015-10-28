<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pendapatan_model extends CI_Model {

    function view() {
        $this->db->join('jobs', 'jobs.job_id = pendapatan.job_id');
        $this->db->join('order', 'jobs.order_id = order.order_id');
    	return $this->db->get('pendapatan')->result();
    }

    function total() {
        $this->db->select_sum('pendapatan_jumlah');
        return $this->db->get('pendapatan')->row();
    }

}
