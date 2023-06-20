<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ListUser extends CI_Model {

	
    public function getAllUser()
    {
        $query = $this->db->query("SELECT * FROM t_user WHERE id_role = '1'");
        return $query->result();
    }

    public function getAllAdmin()
    {
        $query = $this->db->query("SELECT * FROM t_user WHERE id_role = '2'");
        return $query->result();
    }

    public function AddDataAdmin($data)
    {
        $this->db->insert('t_user', $data);
    }

    public  function DeleteAdmin($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('t_user');
    }
}
