<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ListUser extends CI_Model {

	
    public function getAllUser()
    {
        $query = $this->db->query("SELECT * FROM t_user");
        return $query->result();
    }

}
