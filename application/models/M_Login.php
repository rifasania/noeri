<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model {
	
    public function getDataLogin($usn_user, $pass_user)
    {
        $this->db->where('usn_user', $usn_user);
        $this->db->where('pass_user', $pass_user);
        $query = $this->db->get('t_user');
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $sess = array ('usn_user' => $row->usn_user, 'pass_user' => $row->pass_user);
            }
            $this->session->get_userdata($sess);
            redirect('C_Noeri/LinkMenu');
        }
        else
        {
            echo "<script>
            alert('Maaf, Username dan Password Salah!');
            window.location = 'LinkLogin';
            </script>";
            // $this->session->set_flashdata('message_login_error', 'Maaf! Username dan Password Salah!');
            // redirect('C_Noeri/LinkLogin');
        }
    }

}
