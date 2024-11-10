<?php
class kategori extends CI_Controller
{
    public function elektronik()
    {
        $data['judul'] = 'Elektronik';
        $data['elektronik'] = $this->model_kategori->data_elektronik();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('elektronik', $data);
        $this->load->view('templates/footer');
    }
    public function pakaian_pria()
    {
        $data['judul'] = 'Pakaian Pria';
        $data['pakaian_pria'] = $this->model_kategori->data_pria();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pakaian_pria', $data);
        $this->load->view('templates/footer');
    }

    public function pakaian_wanita()
    {
        $data['judul'] = 'Pakaian Wanita';
        $data['pakaian_wanita'] = $this->model_kategori->data_wanita();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pakaian_wanita', $data);
        $this->load->view('templates/footer');
    }

    public function pakaian_anak()
    {
        $data['judul'] = 'Pakaian Anak';
        $data['pakaian_anak'] = $this->model_kategori->data_anak();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pakaian_anak', $data);
        $this->load->view('templates/footer');
    }

    public function olahraga()
    {
        $data['judul'] = 'Perlengkapan Olahraga';
        $data['olahraga'] = $this->model_kategori->data_olahraga();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('olahraga', $data);
        $this->load->view('templates/footer');
    }
}