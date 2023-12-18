<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('usersmodel');
    }

    public function index() {
        $data['title'] = 'Users Menu';
        $data['users'] = $this->UsersModel->getUserWhere(['email' => $this->session->userdata('email')])->row_array();
        $data['list_user'] = $this->session->userdata('roles_id') == 1 ? $this->UsersModel->getData('users') : $this->UsersModel->getData('users', [2, 3]);

        $this->template->load('users/index', $data);
    }
}

?>