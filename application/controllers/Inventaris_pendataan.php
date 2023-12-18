<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventaris_pendataan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_inventaris_pendataan');
    }

    public function index()
    {
        $data['title'] = 'Inventaris Pendataan';
        $data['users'] = $this->UsersModel->getUserWhere(['email' => $this->session->userdata('email')])->row_array();
        $data['inventaris_pendataan'] = $this->model_inventaris_pendataan->get_data('stock_in')->result();

        $this->template->load('inventaris_pendataan', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Inventaris';
        $data['users'] = $this->UsersModel->getUserWhere(['email' => $this->session->userdata('email')])->row_array();

        $this->template->load('tambah_inventaris', $data);
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'product_id' => $this->input->post('product_id'),
                'supplier_id' => $this->input->post('supplier_id'),
                'supplier_product_id' => $this->input->post('supplier_product_id'),
                'stock' => $this->input->post('stock'),
                'date_received' => $this->input->post('date_received'),
                'total_received' => $this->input->post('total_received'),
            );

            $this->model_inventaris_pendataan->insert_data($data, 'stock_in');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Selamat... Data Berhasil Ditambahkan!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('inventaris_pendataan');
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
                'product_id' => $this->input->post('product_id'),
                'supplier_id' => $this->input->post('supplier_id'),
                'supplier_product_id' => $this->input->post('supplier_product_id'),
                'stock' => $this->input->post('stock'),
                'date_received' => $this->input->post('date_received'),
                'total_received' => $this->input->post('total_received'),
            );

            $this->model_inventaris_pendataan->update_data($data, 'stock_in');
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Selamat... Data Berhasil Diubah!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('inventaris_pendataan');
        }
    }

    public function print()
    {
        $data['inventaris_pendataan'] = $this->model_inventaris_pendataan->get_data('stock_in')->result();
        $this->load->view('print_inventaris', $data);
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['inventaris_pendataan'] = $this->model_inventaris_pendataan->get_data('stock_in')->result();
        $this->load->view('laporan_inventaris', $data);

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('laporan_inventaris.pdf', array('Attachment' => 0));
    }

    public function _rules()
    {
        $this->form_validation->set_rules('product_id', 'Product ID', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('supplier_id', 'Supplier ID', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('supplier_product_id', 'Supplier Product ID', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('stock', 'stock', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('date_received', 'Date Received', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('total_received', 'Total Received', 'required', array(
            'required' => '%s harus diisi !!'
        ));
    }

    public function delete($id)
    {
        $where = array('id' => $id);

        $this->supplier_product_model->delete($where, 'stock_in');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Selamat... Data Berhasil Dihapus!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('inventaris_pendataan');
    }
}
