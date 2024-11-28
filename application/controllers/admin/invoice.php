<?php

class invoice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_invoice');
    }

    public function index()
    {
        $data['judul'] = 'Invoice';
        $data['invoice'] = $this->model_invoice->tampil_data();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/invoice', $data);
        $this->load->view('templates_admin/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Invoice';
        $data['invoice'] = $this->model_invoice->getInvoicebyId($id);
        $data['pesanan'] = $this->model_invoice->getPesananbyId($id);
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_invoice', $data);
        $this->load->view('templates_admin/footer');
    }

    public function delete($id)
    {
        $this->model_invoice->deleteInvoice($id);
        redirect('admin/invoice');
    }

    public function deleteAll()
    {
        $this->model_invoice->deleteAllInvoice();
        redirect('admin/invoice');
    }
}