<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Liblogin {

    var $CI;
    var $user_table = 'nm_developers';

    function in($developer_uname = '', $developer_pwd = '') {
        $this->CI = & get_instance();
        if ($developer_uname == '' OR $developer_pwd == '')
            return false;
        //Check if already logged in
        if ($this->CI->session->userdata('developer_uname') == $developer_uname)
            return true;
        //Check against user table
        $this->CI->db->where('developer_uname', $developer_uname);
        $query = $this->CI->db->get_where($this->user_table);
        if ($query->num_rows() > 0) {
            $user_data = $query->row_array();
            $developer_pwd = md5($developer_pwd);
            if ($developer_pwd != $user_data['developer_pwd'])
                return false;
            //Destroy old session
            $this->CI->session->sess_destroy();
            //Create a fresh, brand new session
            $this->CI->session->sess_create();
            //Set session data
            $user_data['developer_uname'] = $user_data['developer_uname']; // for compatibility with Simplelogin
            $user_data['developer_id'] = $user_data['developer_id']; // for compatibility with Simplelogin
            $user_data['logged_in'] = true;
            $this->CI->session->set_userdata($user_data);
            return true;
        }
        else {
            return false;
        }
    }

    function out() {
        $this->CI = & get_instance();
        $this->CI->session->sess_destroy();
    }

}

?>
