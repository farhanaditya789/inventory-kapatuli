<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merchant extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_merchant');
    }

    public function index()
    {
        $data['title'] = 'Merchant';
        $data['users'] = $this->UsersModel->getUserWhere(['email' => $this->session->userdata('email')])->row_array();
        $data['merchant'] = $this->model_merchant->get_data('merchant')->result();

        $this->template->load('merchant', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Merchant';
        $data['users'] = $this->UsersModel->getUserWhere(['email' => $this->session->userdata('email')])->row_array();

        $this->template->load('tambah_merchant', $data);
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
            );

            $this->model_merchant->insert_data($data, 'merchant');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Selamat... Data Berhasil Ditambahkan!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('merchant');
        }
    }

    public function edit($id)
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'id' => $id,
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
            );

            $this->model_merchant->update_data($data, 'merchant');
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Selamat... Data Berhasil Diubah!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('merchant');
        }
    }

    public function print()
    {
        $data['merchant'] = $this->model_merchant->get_data('merchant')->result();
        $this->load->view('print_merchant', $data);
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['merchant'] = $this->model_merchant->get_data('merchant')->result();
        $this->load->view('laporan_merchant', $data);

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('laporan_merchant.pdf', array('Attachment' => 0));
    }

    public function _rules()
    {
        $this->form_validation->set_rules('name', 'Name Merchant', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('address', 'Address Merchant', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('phone', 'Phone Mercahnt', 'required', array(
            'required' => '%s harus diisi !!'
        ));
    }

    public function delete($id)
    {
        $where = array('id' => $id);

        $this->model_merchant->delete($where, 'merchant');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Selamat... Data Berhasil Dihapus!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('merchant');
    }
}
