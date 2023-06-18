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

	public function LinkLogin() 
	{
		$this->load->view('V_Login.php');
	}

	public function CekLogin(){
		$usn_user = $this->input->post('usn_user');
		$pass_user = $this->input->post('pass_user');
		$this->M_Login->getDataLogin($usn_user, $pass_user);
	}

	public function LinkRegister() 
	{
		$this->load->view('V_Register.php');
	}
	
	public function InsertRegister(){
		$nama_user = $this->input->post('nama_user');
		$no_telp_user = $this->input->post('no_telp_user');
		$email_user = $this->input->post('email_user');
		$usn_user = $this->input->post('usn_user');
		$pass_user = $this->input->post('pass_user');

		$DataRegister = array (
			'nama_user' => $nama_user, 
			'no_telp_user' => $no_telp_user,
			'email_user' => $email_user,
			'usn_user' => $usn_user,
			'pass_user' => $pass_user,
		);

		$this->M_Register->InsertDataRegister($DataRegister);
	}

	public function LinkOrder() 
	{
		$this->load->view('V_Order');
	}

	public function LinkLoginAdmin() 
	{
		$this->load->view('V_LoginAdmin.php');
	}

	public function CekLoginAdmin(){
		$usn_admin = $this->input->post('usn_admin');
		$pass_admin = $this->input->post('pass_admin');
		$this->M_LoginAdmin->getDataAdmin($usn_admin, $pass_admin);
	}

	public function LinkDashboard() 
	{
		$this->load->view('V_Dashboard.php');
	}

	public function LinkMenuAdmin() 
	{
		$this->load->view('V_MenuAdmin.php');
	}

	public function LinkChefAdmin() 
	{
		$this->load->view('V_ChefAdmin.php');
	}

	public function LinkOrderAdmin() 
	{
		$this->load->view('V_OrderAdmin.php');
	}

	public function ListUser() 
	{
		$data_user = $this->M_ListUser->getAllUser();
		$temp['data'] = $data_user;
		$this->load->view('V_ListUser.php', $temp);
	}
}

// NGANTUK BGT YA ALLAH
// CAPEEEE
// PENGEN TURU
