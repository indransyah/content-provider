<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Authentication {

    var $CI;
    var $user_table = 'admin';

    function login($user_username = '', $user_password = '') {
        $this->CI = & get_instance();
        if ($user_username == '' OR $user_password == '')
            return false;
        //Check if already logged in
        if ($this->CI->session->userdata('admin_username') == $user_username)
            return true;
        //Check against user table
        $this->CI->db->where('admin_username', $user_username);
        $query = $this->CI->db->get_where($this->user_table);
        if ($query->num_rows() > 0) {
            $user_data = $query->row_array();
            $user_password = md5($user_password);
            if ($user_password != $user_data['admin_password'])
                return false;
            //Destroy old session
            $this->CI->session->sess_destroy();
            //Create a fresh, brand new session
            $this->CI->session->sess_create();
            //Set session data
            $user_data['admin_username'] = $user_data['admin_username']; // for compatibility with Simplelogin
            $user_data['admin_id'] = $user_data['admin_id']; // for compatibility with Simplelogin
            $user_data['logged_in'] = true;
            $this->CI->session->set_userdata($user_data);
            return true;
        }
        else {
            return false;
        }
    }

    function kreatorlogin($kreator_username = '', $kreator_password = '') {
        $this->CI = & get_instance();
        if ($kreator_username == '' OR $kreator_password == '')
            return false;
        //Check if already logged in
        if ($this->CI->session->userdata('kreator_username') == $kreator_username)
            return true;
        //Check against user table
        $this->CI->db->where('kreator_username', $kreator_username);
        $query = $this->CI->db->get_where('kreator');
        if ($query->num_rows() > 0) {
            $user_data = $query->row_array();
            $kreator_password = md5($kreator_password);
            if ($kreator_password != $user_data['kreator_password'])
                return false;
            //Destroy old session
            $this->CI->session->sess_destroy();
            //Create a fresh, brand new session
            $this->CI->session->sess_create();
            //Set session data
            $user_data['kreator_username'] = $user_data['kreator_username']; // for compatibility with Simplelogin
            $user_data['kreator_id'] = $user_data['kreator_id']; // for compatibility with Simplelogin
            $user_data['kreator_logged_in'] = true;
            $this->CI->session->set_userdata($user_data);
            return true;
        }
        else {
            return false;
        }
    }

    function customerlogin($customer_username = '', $customer_password = '') {
        $this->CI = & get_instance();
        if ($customer_username == '' OR $customer_password == '')
            return false;
        //Check if already logged in
        if ($this->CI->session->userdata('customer_username') == $customer_username)
            return true;
        //Check against user table
        $this->CI->db->where('customer_username', $customer_username);
        $query = $this->CI->db->get_where('customer');
        if ($query->num_rows() > 0) {
            $user_data = $query->row_array();
            $customer_password = md5($customer_password);
            if ($customer_password != $user_data['customer_password'])
                return false;
            //Destroy old session
            $this->CI->session->sess_destroy();
            //Create a fresh, brand new session
            $this->CI->session->sess_create();
            //Set session data
            $user_data['customer_username'] = $user_data['customer_username']; // for compatibility with Simplelogin
            $user_data['customer_id'] = $user_data['customer_id']; // for compatibility with Simplelogin
            $user_data['customer_logged_in'] = true;
            $this->CI->session->set_userdata($user_data);
            return true;
        }
        else {
            return false;
        }
    }


    function logout() {
        $this->CI = & get_instance();
        $this->CI->session->sess_destroy();
    }

}

?>
