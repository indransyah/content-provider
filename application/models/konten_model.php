<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konten_model extends CI_Model {

	function add($data) {
        return $this->db->insert('konten', $data);
    }

    function view() {
        return $this->db->get('konten')->result();
    }

}
