<?php

class Dashboard extends CI_Controller {
    public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_keranjang($id)
    {
        $barang = $this->model_barang->find($id);
        $data = array(
            'id'      => $barang->id_brg,
            'qty'     => 1,
            'price'   => $barang->harga,
            'name'    => $barang->nama_brg,
        );

        $this->cart->insert($data);
        redirect('http://localhost/toko_online/');
    }
    
    public function detail_keranjang()
    {

        $data['judul'] = 'Detail Keranjang Belanja';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('keranjang');
        $this->load->view('templates/footer');
    }

    public function __construct() {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('model_invoice'); // Add this line to load the model
    }

    public function keranjang() {
        $this->load->view('keranjang');
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('http://localhost/toko_online/');
    }

    public function pembayaran()
    {
        $data['judul'] = 'Pembayaran';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pembayaran');
        $this->load->view('templates/footer');
    }

    public function proses_pesanan()
    {
        $data['judul'] = 'Proses Pesanan';

        // input ke db
        $is_process = $this->model_invoice->index();

        if ($is_process) {
            $this->cart->destroy();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('proses_pesanan');
            $this->load->view('templates/footer');
        } else {
            echo ' pesanan anda gagal di proses';
        }
    }
    
    public function back()
    {
        redirect('http://localhost/toko_online/');
    }
}
