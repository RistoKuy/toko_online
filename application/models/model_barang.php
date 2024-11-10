<?php

class Model_barang extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_barang');
    }

    public function get_barang_by_id($id_brg)
    {
        return $this->db->get_where('tb_barang', ['id_brg' => $id_brg]);
    }

    public function tambah_barang($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function get_max_id($table)
    {
        $this->db->select_max('id_brg');
        $query = $this->db->get($table);
        return $query->row()->id_brg;
    }

    public function tampilData()
    {
        return $this->db->get('tb_barang')->result_array();
    }

    public function find($id)
    {
        $result = $this->db->where('id_brg', $id)
            ->limit(1)
            ->get('tb_barang');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_brg($id_brg)
    {
        $result = $this->db->get_where('tb_barang', ['id_brg' => $id_brg]);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return false;
        }
    }
}