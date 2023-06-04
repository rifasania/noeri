<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Menu extends CI_Model {

	
    public function getAllMenu()
    {
        $query = $this->db->query("SELECT * FROM menu");
        return $query->result();
    }

}
