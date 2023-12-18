<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {

    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
    }

    public function load($view, $data = array()) {
        $this->CI->load->view('template/header', $data);
        $this->CI->load->view('template/navbar', $data);
        $this->CI->load->view($view, $data);
        $this->CI->load->view('template/footer');
    }
}
