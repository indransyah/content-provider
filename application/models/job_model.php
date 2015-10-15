<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Job_model extends CI_Model {

    function add($data) {
        return $this->db->insert('jobs', $data);
    }

    function getJobBasedOnOrderId($id) {
        $this->db->where('order_id', $id);
        $this->db->join('kreator', 'kreator.kreator_id = jobs.kreator_id');
        return $this->db->get('jobs')->row();
    }

}
