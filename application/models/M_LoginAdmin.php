<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_LoginAdmin extends CI_Model {
	
    public function getDataAdmin($usn_admin, $pass_admin)
    {
        $this->db->where('usn_admin', $usn_admin);
        $this->db->where('pass_admin', $pass_admin);
        $query = $this->db->get('t_admin');
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $sess = array ('usn_admin' => $row->usn_admin, 'pass_admin' => $row->pass_admin);
            }
            $this->session->get_userdata($sess);
            redirect('C_Noeri/LinkDashboard');
        }
        else
        {
            // echo "<script>
            // alert('Maaf, Username dan Password Salah!');
            // window.location = 'LinkLogin';
            // </script>";
            $this->session->set_flashdata('info', 'Maaf! Username dan Password Salah!');
            redirect('C_Noeri/LinkLoginAdmin');
        }
    }

}
