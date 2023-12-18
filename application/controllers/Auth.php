<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('UsersModel');
    }

    public function index() {
		// Check if the user is already logged in
		if ($this->session->userdata('email')) {
			// Redirect to the appropriate dashboard based on roles_id
			$roles_id = $this->session->userdata('roles_id');
			if ($roles_id == 1) {
				redirect('dashboard/superadmin');
			} elseif ($roles_id == 2) {
				redirect('dashboard/admin');
			} elseif ($roles_id == 3) {
				redirect('dashboard/employee');
			}
		}

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$title['title'] = 'Admin Login';


			$this->load->view('auth/template/header', $title);
			$this->load->view('auth/login');
			$this->load->view('auth/template/footer');
		} else {
			$this->_login();
		}
    }

	private function _login() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');

        $users = $this->UsersModel->getUserByEmail($email);

		if($users) {
			if($users['is_active'] == 1) {
				if (password_verify($password, $users['password'])) {
					$data = [ 'email' => $users['email'] ];
					$this->session->set_userdata($data);
					
					$this->session->set_userdata('user_id', $users['id']);
        			$this->session->set_userdata('roles_id', $users['roles_id']);
					
					redirect('dashboard');
				} else {
					$this->session->set_flashdata('message', 
					'<div class="alert alert-danger" role="alert"> 
						Wrong password! 
					</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', 
				'<div class="alert alert-danger" role="alert"> 
					This Email has not been activated! 
				</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', 
			'<div class="alert alert-danger" role="alert"> 
				Email is not registered! 
			</div>');
			redirect('auth');
		}
	}

	public function logout() {
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('roles_id');

		$this->session->set_flashdata('message', '
		<div id="success-message" class="alert alert-success d-flex align-items-center" role="alert">
			<i class="fas fa-check"></i>&nbsp;&nbsp; Successfully logged out!
		</div>');
		redirect('auth');
	}

    public function register() {
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => 'This email has already registered!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [ 
			'matches' => 'Password not match!',
			'min_length' => 'Password too short! '
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$title['title'] = 'User Register';
			$this->load->view('auth/template/header', $title);
        	$this->load->view('auth/register');
			$this->load->view('auth/template/footer');
		} else {
			$data = [
				'roles_id' => 3,
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'is_active' => 1
			];

			$this->db->insert('users', $data);
			$this->session->set_flashdata('message', 
			'<div class="alert alert-success" role="alert"> 
				User has been registered! 
			</div>');
			redirect('auth');
		}
    }

}

?>