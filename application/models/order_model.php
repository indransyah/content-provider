<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Order_model extends CI_Model {

	function add($data) {
        return $this->db->insert('order', $data);
    }

    function view($pemesan_id = NULL, $status = NULL) {
        $this->db->join('customer', 'customer.customer_id = order.pemesan_id');
        $this->db->join('paket', 'paket.paket_id = order.paket_id');

        if (!is_null($pemesan_id)) {
            $this->db->where('pemesan_id', $pemesan_id);
        }
        if (!is_null($status)) {
            $this->db->where('order_status', $status);
        }
        
        return $this->db->get('order')->result();
    }

    function viewByCustomer($pemesan_id) {
        $this->db->where('pemesan_id', $pemesan_id);
        $this->db->join('customer', 'customer.customer_id = order.pemesan_id');
        $this->db->join('paket', 'paket.paket_id = order.paket_id');

        // $this->db->join('jobs', 'jobs.order_id = order.order_id');
        // $this->db->join('konten', 'jobs.job_id = konten.job_id');
        
        return $this->db->get('order')->result();
    }

    function get($id, $customer_id = null) {
        $this->db->where('order_id', $id);
        if (!is_null($customer_id)) {
            $this->db->where('customer_id', $customer_id);
        }
        $this->db->join('customer', 'customer.customer_id = order.pemesan_id');
        $this->db->join('paket', 'paket.paket_id = order.paket_id');
        
        return $this->db->get('order')->row();
    }

    function update($id, $data) {
        $this->db->where('order_id', $id);
        return $this->db->update('order', $data);
    }

    function removeable($id) {
        $this->db->where('order.order_id', $id);
        $this->db->join('jobs', 'jobs.order_id = order.order_id');
        $total = $this->db->count_all_results('order');
        if ($total==0) {
            return TRUE;
        }
        return FALSE;
    }

    function delete($id) {
        $this->db->where('order_id', $id);
        return $this->db->delete('order');

    }

}
