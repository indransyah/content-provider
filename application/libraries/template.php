<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Template {

    var $CI;

    public function __construct() {
        $this->CI = & get_instance();
    }

    public function backend($content, $data = null) {
        $data['content'] = $this->CI->load->view('backend/'.$content, $data, true);
        $data['header'] = $this->CI->load->view('backend/header', $data, true);
        $data['sidebar'] = $this->CI->load->view('backend/sidebar', $data, true);
        $data['footer'] = $this->CI->load->view('backend/footer', $data, true);
        $this->CI->load->view('backend/index.php', $data);
    }

    public function kreator($content, $data = null) {
        $data['content'] = $this->CI->load->view('kreator/'.$content, $data, true);
        $data['header'] = $this->CI->load->view('kreator/header', $data, true);
        $data['sidebar'] = $this->CI->load->view('kreator/sidebar', $data, true);
        $data['footer'] = $this->CI->load->view('kreator/footer', $data, true);
        $this->CI->load->view('kreator/index.php', $data);
    }

    public function customer($content, $data = null) {
        $data['content'] = $this->CI->load->view('customer/'.$content, $data, true);
        $data['header'] = $this->CI->load->view('customer/header', $data, true);
        $data['sidebar'] = $this->CI->load->view('customer/sidebar', $data, true);
        $data['footer'] = $this->CI->load->view('customer/footer', $data, true);
        $this->CI->load->view('customer/index.php', $data);
    }

    // public function developer($content, $data = null) {
        // $data['content'] = $this->CI->load->view('developer/'.$content, $data, true);
        // $data['header'] = $this->CI->load->view('developer/header', $data, true);
        // $data['sidebar'] = $this->CI->load->view('developer/sidebar', $data, true);
        // $this->CI->load->view('developer/index.php', $data);
    // }
    // public function customer($content, $data = null) {
        // $data['content'] = $this->CI->load->view('customer/'.$content, $data, true);
        // $data['header'] = $this->CI->load->view('customer/header', $data, true);
        // $data['sidebar'] = $this->CI->load->view('customer/sidebar', $data, true);
        // $this->CI->load->view('customer/index.php', $data);
    // }
    
    // public function frontend($content, $data = null) {
        // $data['content'] = $this->CI->load->view('frontend/'.$content, $data, true);
        // $data['header'] = $this->CI->load->view('frontend/header', $data, true);
        // $data['footer'] = $this->CI->load->view('frontend/footer', $data, true);
        // $this->CI->load->view('frontend/index.php', $data);
    // }

   

}