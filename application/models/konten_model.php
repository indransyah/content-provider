<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konten_model extends CI_Model {

	function add($data) {
        return $this->db->insert('konten', $data);
    }

    function update($id, $data) {
        $this->db->where('konten_id', $id);
        return $this->db->update('konten', $data);
    }

    function view() {
    	$this->db->join('jobs', 'jobs.job_id=konten.job_id');
    	$this->db->join('kreator', 'kreator.kreator_id=jobs.kreator_id');
        return $this->db->get('konten')->result();
    }

    function delete($id) {
        $this->db->where('konten_id', $id);
        return $this->db->delete('konten');
    }

    function get($id) {
    	$this->db->where('konten_id', $id);
        $this->db->join('jobs', 'jobs.job_id=konten.job_id');
        $this->db->join('order', 'jobs.order_id=order.order_id');
        $this->db->join('customer', 'customer.customer_id=order.pemesan_id');
        $this->db->join('kreator', 'kreator.kreator_id=jobs.kreator_id');
    	return $this->db->get('konten')->row();
    }

    function getFileName($id) {
    	$this->db->where('konten_id', $id);
    	return $this->db->get('konten')->row()->konten_file;
    }

    function getContentByCustomerId($id) {
        $this->db->join('jobs', 'jobs.job_id=konten.job_id');
        $this->db->join('order', 'jobs.order_id=order.order_id');
        $this->db->where('pemesan_id', $id);
        return $this->db->get('konten')->result();

    }

}
