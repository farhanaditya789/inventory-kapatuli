<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('supplier_product_model');
    }

    public function index()
    {
        $data['title'] = 'Supplier Product';
        $data['users'] = $this->UsersModel->getUserWhere(['email' => $this->session->userdata('email')])->row_array();
        $data['supplier_product'] = $this->supplier_product_model->get_data('supplier_product')->result();

        $this->template->load('supplier_product', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Supplier';
        $data['users'] = $this->UsersModel->getUserWhere(['email' => $this->session->userdata('email')])->row_array();

        $this->template->load('tambah_supplier_product', $data);
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'name_product' => $this->input->post('name_product'),
                'stock_product' => $this->input->post('stock_product'),
                'supplier_id' => $this->input->post('supplier_id'),
                'qty' => $this->input->post('qty'),
                'date_received' => $this->input->post('date_received'),
            );

            $this->supplier_product_model->insert_data($data, 'supplier_product');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Selamat... Data Berhasil Ditambahkan!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('supplier_product');
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
                'name_product' => $this->input->post('name_product'),
                'stock_product' => $this->input->post('stock_product'),
                'supplier_id' => $this->input->post('supplier_id'),
                'qty' => $this->input->post('qty'),
                'date_received' => $this->input->post('date_received'),
            );

            $this->supplier_product_model->update_data($data, 'supplier_product');
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Selamat... Data Berhasil Diubah!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('supplier_product');
        }
    }

    public function print()
    {
        $data['supplier_product'] = $this->supplier_product_model->get_data('supplier_product')->result();
        $this->load->view('print_supplier_product', $data);
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['supplier_product'] = $this->supplier_product_model->get_data('supplier_product')->result();
        $this->load->view('laporan_supplier_product', $data);

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('laporan_supplier_product.pdf', array('Attachment' => 0));
    }

    public function _rules()
    {
        $this->form_validation->set_rules('name_product', 'Name Supplier', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('stock_product', 'Stock Supplier', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('supplier_id', 'Supplier ID', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('qty', 'Expired', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('date_received', 'Date Received', 'required', array(
            'required' => '%s harus diisi !!'
        ));
    }

    public function delete($id)
    {
        $where = array('id' => $id);

        $this->supplier_product_model->delete($where, 'supplier_product');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Selamat... Data Berhasil Dihapus!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('supplier_product');
    }
}
