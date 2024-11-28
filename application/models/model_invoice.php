<?php
class model_invoice extends CI_Model
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $nama = $this->input->get('nama');
        $alamat = $this->input->get('alamat');
        $invoice = [
            'nama' => $nama,
            'alamat' => $alamat,
            'tgl_pesan' => date('Y-m-d H:i:s'),
            'batas_bayar' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y')))
        ];

        // Iterate to find a unique ID for tb_invoice
        $id_invoice = 1;
        while ($this->db->where('id', $id_invoice)->get('tb_invoice')->num_rows() > 0) {
            $id_invoice++;
        }
        $invoice['id'] = $id_invoice;

        $this->db->insert('tb_invoice', $invoice);

        foreach ($this->cart->contents() as $item) {
            $data = [
                'id_invoice' => $id_invoice,
                'id_brg' => $item['id'],
                'nama_brg' => $item['name'],
                'jumlah' => $item['qty'],
                'harga' => $item['price']
            ];

            // Iterate to find a unique ID for tb_pesanan
            $id_pesanan = 1;
            while ($this->db->where('id', $id_pesanan)->get('tb_pesanan')->num_rows() > 0) {
                $id_pesanan++;
            }
            $data['id'] = $id_pesanan;

            $this->db->insert('tb_pesanan', $data);
        }
        return true;
    }

    public function tampil_data()
    {
        $result = $this->db->get('tb_invoice');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return false;
        }
    }

    public function getInvoicebyId($id_invoice)
    {
        $result = $this->db->where('id', $id_invoice)->get('tb_invoice');
        if ($result->num_rows() > 0) {
            return $result->row_array();
        } else {
            return false;
        }
    }

    public function getPesananbyId($id_invoice)
    {
        $result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return false;
        }
    }

    public function deleteInvoice($id_invoice)
    {
        // Delete orders associated with the invoice
        $this->db->where('id_invoice', $id_invoice);
        $this->db->delete('tb_pesanan');

        // Delete the invoice
        $this->db->where('id', $id_invoice);
        $this->db->delete('tb_invoice');
    }

    public function deleteAllInvoice()
    {
        // Delete all orders
        $this->db->empty_table('tb_pesanan');

        // Delete all invoices
        $this->db->empty_table('tb_invoice');
    }
}