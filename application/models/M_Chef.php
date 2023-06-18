<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Chef extends CI_Model {

	
    public function getAllChef()
    {
        $query = $this->db->query("SELECT * FROM chef");
        return $query->result();
    }

    public function AddDataChef($data)
    {
        $this->db->insert('chef', $data);
    }

    public function UpdateChef($data, $id)
    {
        $this->db->where('id_chef', $id);
        $this->db->update('chef', $data );
    }

    public function getDataChef($id)
    {
        $this->db->where('id_chef', $id);
        $query = $this->db->get('chef');
        return $query->row();
    }

    public  function DeleteDataChef($id)
    {
        $this->db->where('id_chef', $id);
        $this->db->delete('chef');
    }

}
