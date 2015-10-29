<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paket_model extends CI_Model {

	function add($data) {
        return $this->db->insert('paket', $data);
    }

    function view() {
        $this->db->where('paket_terhapus', 0);
        return $this->db->get('paket')->result();
    }

    function get($id) {
    	$this->db->limit(1);
    	$this->db->where('paket_id', $id);
        return $this->db->get('paket')->row();
    }

    function update($id, $data) {
        $this->db->where('paket_id', $id);
        return $this->db->update('paket', $data);
    }

    // function count($keyword, $field) {
    //     if ($keyword) {
    //         $this->db->like($field, $keyword);
    //     }
    //     return $this->db->count_all_results('paket');
    // }

    // function view($keyword = NULL, $field = NULL, $value, $offset) {
    //     $this->db->limit($value, $offset);
    //     if ($keyword != NULL) {
    //         $this->db->like($field, $keyword);
    //     }
    //     return $this->db->get('paket')->result();
    // }
}
