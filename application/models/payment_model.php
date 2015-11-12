<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment_model extends CI_Model {

	function add($data) {
        return $this->db->insert('payment', $data);
    }

    function view() {
        $this->db->join('order', 'order.order_id = payment.order_id');

        $this->db->join('customer', 'customer.customer_id = order.pemesan_id');

        return $this->db->get('payment')->result();
    }

    function get($id) {
    	$this->db->where('payment_id', $id);
        $this->db->join('order', 'order.order_id = payment.order_id');
        $this->db->join('customer', 'customer.customer_id = order.pemesan_id');
        return $this->db->get('payment')->row();
    }

    function update($id, $data) {
        $this->db->where('payment_id', $id);
        return $this->db->update('payment', $data);
    }

    function delete($id) {
        $this->db->where('payment_id', $id);
        return $this->db->delete('payment');
    }

}
