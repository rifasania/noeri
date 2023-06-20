<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pesanan extends CI_Model {

	
    // public function getPesanan()
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $nama = $this->input->post('nama');
    //     $id_pembayaran = $this->input->post('id_pembayaran'); 
    //     $id_status_pesanan = $this->input->post('id_status_pesanan');
    //     $total_harga = $this->input->post('total_harga');
    //     $date = new DateTime('now');
    //     $dateString = $date->format('Y-m-d');
        
    //     $data_pesanan = array(
    //         'nama' -> $nama,
    //         'id_pembayaran' -> $id_pembayaran,
    //         'id_status_pesanan' -> $id_status_pesanan,
    //         'total_harga' -> $total_harga,
    //         'tanggal_pesanan' -> $dateString,
    //         'waktu_pesanan' -> time('H:i:s'),
    //     );

    //     $this->db->insert('pesanan', $data_pesanan);
    //     $id_pesanan = $this->db->insert_id();

    //     foreach ($this->cart->contents() as $item)
    //     {
    //         $data = array(
    //             'id_pesanan' => $id_pesanan,
    //             'id_menu' => $item['id'],
    //             'jumlah' => $item['qty'],
    //         );
    //         $this->db->insert('pesanan_menu', $data);
    //     }

    //     return TRUE;
    // }

    public function getAllPesanan()
    {
        $query = $this->db->query("SELECT * FROM pesanan INNER JOIN status_pesanan ON pesanan.id_status_pesanan = status_pesanan.id_status_pesanan INNER JOIN pembayaran ON pesanan.id_pembayaran = pembayaran.id_pembayaran ORDER BY pesanan.id_pesanan ASC");
        return $query->result();
    }

    public function getMetodePembayaran()
    {
        $query = $this->db->query("SELECT * FROM pembayaran");
        return $query->result();
    }

    public function getStatusPesanan()
    {
        $query = $this->db->query("SELECT * FROM status_pesanan");
        return $query->result();
    }

    public function AddDataPesanan($data)
    {
        $this->db->insert('pesanan', $data);
        $id_pesanan = $this->db->insert_id();
    }

    public function UpdatePesanan($data, $id)
    {
        $this->db->where('id_pesanan', $id);
        $this->db->update('pesanan', $data );
    }

    public function getDataPesanan($id)
    {
        $this->db->where('id_pesanan', $id);
        $query = $this->db->get('pesanan');
        return $query->row();
    }

    public  function DeletePesanan($id)
    {
        $this->db->where('id_pesanan', $id);
        $this->db->delete('pesanan_menu');
        
        $this->db->where('id_pesanan', $id);
        $this->db->delete('pesanan');
        
    }
    
}
