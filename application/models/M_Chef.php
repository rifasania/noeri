<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Chef extends CI_Model {

	
    public function getAllChef()
    {
        $query = $this->db->query("SELECT * FROM chef");
        return $query->result();
    }

}
