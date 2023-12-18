<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        login_check();
    }

    public function index() {
        $data['users'] = $this->UsersModel->getUserWhere(['email' => $this->session->userdata('email')])->row_array();

        $roles_id = $this->session->userdata('roles_id');
        if ($roles_id == 1) {
            $data['title'] = 'Super Admin Dashboard';
        } else if ($roles_id == 2) {
            $data['title'] = 'Admin Dashboard';
        } else {
            $data['title'] = 'Employee Dashboard';
        }

		$this->template->load('index', $data);
    }
}
