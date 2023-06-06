<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Register extends CI_Model {
	
    public function InsertDataRegister($data)
    {
        $this->db->insert('t_user', $data);
        redirect('C_Noeri/LinkLogin');
    }

}
