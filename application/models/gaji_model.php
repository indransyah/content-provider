<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gaji_model extends CI_Model {

    function view($kreator_id) {
        $this->db->where('gaji.kreator_id', $kreator_id);
        $this->db->join('jobs', 'jobs.job_id = gaji.job_id');
        $this->db->join('order', 'jobs.order_id = order.order_id');
    	return $this->db->get('gaji')->result();
    }

    function total($kreator_id) {
        $this->db->where('kreator_id', $kreator_id);
        $this->db->select_sum('gaji_jumlah');
        return $this->db->get('gaji')->row();


    }

}
