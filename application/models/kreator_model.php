<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kreator_model extends CI_Model {

    function view() {
        return $this->db->get('kreator')->result();
    }

}
