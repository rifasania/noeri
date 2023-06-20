<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pesanan extends CI_Model {

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

    public function getPesananMenu($id)
    {
        $this->db->select('*');
        $this->db->from('pesanan_menu');
        $this->db->join('menu', 'pesanan_menu.id_menu = menu.id_menu', 'inner');
        $this->db->where('pesanan_menu.id_pesanan', $id);
        $query = $this->db->get();
        return $query->result();
        // $this->db->where('id_pesanan', $id);
        // $query = $this->db->get('pesanan_menu');
        // return $query->result();
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
