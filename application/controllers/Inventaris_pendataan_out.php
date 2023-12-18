<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventaris_pendataan_out extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_inventaris_out');
    }

    public function index()
    {
        $data['title'] = 'Inventaris Pendataan Out';
        $data['users'] = $this->UsersModel->getUserWhere(['email' => $this->session->userdata('email')])->row_array();
        $data['inventaris_pendataan_out'] = $this->model_inventaris_out->get_data('stock_out')->result();

        $this->template->load('inventaris_pendataan_out', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Inventaris';
        $data['users'] = $this->UsersModel->getUserWhere(['email' => $this->session->userdata('email')])->row_array();

        $this->template->load('tambah_inventaris_out', $data);
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'product_id' => $this->input->post('product_id'),
                'merchant_id' => $this->input->post('merchant_id'),
                'user_id' => $this->input->post('user_id'),
                'date_delivery' => $this->input->post('date_delivery'),
                'amount_delivered' => $this->input->post('amount_delivered'),
            );

            $this->model_inventaris_out->insert_data($data, 'stock_out');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Selamat... Data Berhasil Ditambahkan!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('inventaris_pendataan_out');
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
                'merchant_id' => $this->input->post('merchant_id'),
                'user_id' => $this->input->post('user_id'),
                'date_delivery' => $this->input->post('date_delivery'),
                'amount_delivered' => $this->input->post('amount_delivered'),
            );

            $this->smodel_inventaris_out->update_data($data, 'stock_out');
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Selamat... Data Berhasil Diubah!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('inventaris_pendataan_out');
        }
    }

    public function print()
    {
        $data['inventaris_pendataan_out'] = $this->model_inventaris_out->get_data('stock_out')->result();
        $this->load->view('print_inventaris_out', $data);
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['inventaris_pendataan_out'] = $this->model_inventaris_out->get_data('stock_out')->result();
        $this->load->view('laporan_inventaris_out', $data);

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('laporan_inventaris_out.pdf', array('Attachment' => 0));
    }

    public function _rules()
    {
        $this->form_validation->set_rules('product_id', 'Product ID', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('merchant_id', 'Merchant ID', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('user_id', 'User ID', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('date_delivery', 'Date Delivery', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('amount_delivered', 'Amount Delivered', 'required', array(
            'required' => '%s harus diisi !!'
        ));
    }

    public function delete($id)
    {
        $where = array('id' => $id);

        $this->supplier_product_model->delete($where, 'stock_out');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Selamat... Data Berhasil Dihapus!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('inventaris_pendataan_out');
    }
}
