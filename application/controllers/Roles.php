<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('rolesmodel');
    }

    public function index() {
        $data['title'] = 'Roles Menu';
        $data['users'] = $this->UsersModel->getUserWhere(['email' => $this->session->userdata('email')])->row_array();
        $data['roles'] = $this->RolesModel->getData('roles')->result();

        $this->template->load('roles/index', $data);
    }

    public function create() {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Product';
            $data['users'] = $this->UsersModel->getUserWhere(['email' => $this->session->userdata('email')])->row_array();

            $this->template->load('roles/index', $data);
        } else {
            $data = array(
                'name' => $this->input->post('name')
            );

            $this->RolesModel->createData($data, 'roles');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Selamat... Data Berhasil Ditambahkan!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('roles');
        }
    }

    public function update($id) {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = array(
                'id' => $id,
                'name' => $this->input->post('name'),
            );

            $this->RolesModel->updateData($data, 'roles');
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Selamat... Data Berhasil Diubah!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('roles');
        }
    }

    public function delete($id) {
        $where = array('id' => $id);

        $this->RolesModel->deleteData($where, 'roles');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Selamat... Data Berhasil Dihapus!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('roles');
    }

    public function print() {
        $data['roles'] = $this->RolesModel->get_data('roles')->result();
        $this->load->view('print_product', $data);
    }

    public function pdf() {
        $this->load->library('dompdf_gen');

        $data['roles'] = $this->product_model->get_data('roles')->result();
        $this->load->view('laporan_product', $data);

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('data_roles.pdf', array('Attachment' => 0));
    }

    public function _rules() {
        $this->form_validation->set_rules('name', 'Name Roles', 'required', array(
            'required' => '%s harus diisi !!'
        ));
    }
}

?>