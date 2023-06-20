<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pembayaran extends CI_Model {

	
    public function getMetodeBayar()
    {
        $query = $this->db->query("SELECT * FROM pembayaran");
        return $query->result();
    }
    
}
