<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }

    public function index()
    {
        $data['title'] = 'Product';
        $data['users'] = $this->UsersModel->getUserWhere(['email' => $this->session->userdata('email')])->row_array();
        $data['products'] = $this->product_model->get_data('products')->result();

        $this->template->load('products', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Product';
        $data['users'] = $this->UsersModel->getUserWhere(['email' => $this->session->userdata('email')])->row_array();

        $this->template->load('tambah_product', $data);
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'stock' => $this->input->post('stock'),
                'exp_date' => $this->input->post('exp_date'),
                'production_date' => $this->input->post('production_date'),
            );

            $this->product_model->insert_data($data, 'products');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Selamat... Data Berhasil Ditambahkan!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('products');
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
                'stock' => $this->input->post('stock'),
                'exp_date' => $this->input->post('exp_date'),
                'production_date' => $this->input->post('production_date'),
            );

            $this->product_model->update_data($data, 'products');
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Selamat... Data Berhasil Diubah!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('products');
        }
    }

    public function print()
    {
        $data['products'] = $this->product_model->get_data('products')->result();
        $this->load->view('print_product', $data);
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['products'] = $this->product_model->get_data('products')->result();
        $this->load->view('laporan_product', $data);

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('laporan_product.pdf', array('Attachment' => 0));
    }

    public function _rules()
    {
        $this->form_validation->set_rules('name', 'Name Product', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('stock', 'Stock Product', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('name', 'Expired Product', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('name', 'Production Date', 'required', array(
            'required' => '%s harus diisi !!'
        ));
    }

    public function delete($id)
    {
        $where = array('id' => $id);

        $this->product_model->delete($where, 'products');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Selamat... Data Berhasil Dihapus!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('products');
    }
}
