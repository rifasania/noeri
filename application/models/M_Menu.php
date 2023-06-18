<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Menu extends CI_Model {

	
    public function getAllMenu()
    {
        $query = $this->db->query("SELECT * FROM menu INNER JOIN jenis_menu ON menu.id_jenis = jenis_menu.id_jenis INNER JOIN chef ON menu.id_chef = chef.id_chef ORDER BY nama_menu ASC");
        return $query->result();
    }

    public function getJenisMenu()
    {
        $query = $this->db->query("SELECT * FROM jenis_menu");
        return $query->result();
    }

    public function AddDataMenu($data)
    {
        $this->db->insert('menu', $data);
    }

    public function update($data, $id)
    {
        $this->db->where('id_menu', $id);
        $this->db->update('menu', $data );
    }

    public function getDataMenu($id)
    {
        $this->db->where('id_menu', $id);
        $query = $this->db->get('menu');
        return $query->row();
    }

}
