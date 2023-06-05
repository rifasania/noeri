<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Noeri extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index() 
	{
		$this->load->view('V_Noeri');
	}

	public function LinkMenu() 
	{ 
		$data_menu = $this->M_Menu->getAllMenu();
		$temp['data'] = $data_menu;
		$this->load->view('V_Menu', $temp);
	}

	public function LinkChef() 
	{ 
		$data_chef = $this->M_Chef->getAllChef();
		$temp['data'] = $data_chef;
		$this->load->view('V_Chef', $temp);
	}
}

// NGANTUK BGT YA ALLAH
// CAPEEEE
// PENGEN TURU
