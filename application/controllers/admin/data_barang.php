<?php

class Data_barang extends CI_Controller
{
    public function index(){
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi(){
        $nama_brg   = $this->input->post('nama_brg');
        $keterangan = $this->input->post('keterangan');
        $kategori   = $this->input->post('kategori');
        $harga      = $this->input->post('harga');
        $stok       = $this->input->post('stok');
        $gambar     = $_FILES['gambar']['name'];

        // Dapatkan id_brg terbesar dan tambahkan 1
        $max_id = $this->model_barang->get_max_id('tb_barang');
        $id_brg = $max_id + 1;

        if ($gambar == '') {
            echo "Gambar tidak boleh kosong";
        } else {
            $config['upload_path']   = './assets/uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name']     = $gambar;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                echo "Gagal Upload: " . $this->upload->display_errors();
            } else {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];
            }
        }

        $data = array(
            'id_brg'     => $id_brg,
            'nama_brg'   => $nama_brg,
            'keterangan' => $keterangan,
            'kategori'   => $kategori,
            'harga'      => $harga,
            'stok'       => $stok,
            'gambar'     => $gambar
        );

        $this->model_barang->tambah_barang($data, 'tb_barang');
        redirect('admin/data_barang/index');
    }

    public function hapus($id){
        // Get the item to delete
        $barang = $this->model_barang->get_barang_by_id($id);
        $gambar = $barang->gambar;

        // Delete the item from the database
        $where = array('id_brg' => $id);
        $this->model_barang->hapus_data($where, 'tb_barang');

        // Delete the image file
        $file_path = './assets/uploads/' . $gambar;
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        redirect('admin/data_barang/index');
    }

    public function edit($id){
        $where = array('id_brg' => $id);
        $data['barang'] = $this->model_barang->edit_data($where, 'tb_barang')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update(){
        $id         = $this->input->post('id_brg');
        $nama_brg   = $this->input->post('nama_brg');
        $keterangan = $this->input->post('keterangan');
        $kategori   = $this->input->post('kategori');
        $harga      = $this->input->post('harga');
        $stok       = $this->input->post('stok');

        $data = array(
            'nama_brg'   => $nama_brg,
            'keterangan' => $keterangan,
            'kategori'   => $kategori,
            'harga'      => $harga,
            'stok'       => $stok
        );

        $where = array(
            'id_brg' => $id
        );

        $this->model_barang->update_data($where, $data, 'tb_barang');
        redirect('admin/data_barang/index');
    }
}