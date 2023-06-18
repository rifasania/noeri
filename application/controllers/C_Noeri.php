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
	
	public function LinkChefAdmin() 
	{
		$data_chef = $this->M_Chef->getAllChef();
		$temp['data'] = $data_chef;
		$this->load->view('V_ChefAdmin.php', $temp);
	}
	
	public function LinkMenuAdmin() 
	{
		$data_menu = $this->M_Menu->getAllMenu();
		$temp['data'] = $data_menu;
		$this->load->view('V_MenuAdmin.php', $temp);
	}

	public function FormAddMenu()
	{
		$data_jenis = $this->M_Menu->getJenisMenu();
		$data_chef = $this->M_Chef->getAllChef();
		$temp['data'] = $data_jenis;
		$temp['data_chef'] = $data_chef;
		$this->load->view('form_add_menu.php', $temp);
	}

	public function FormEditMenu($id)
	{
		$recordMenu = $this->M_Menu->getDataMenu($id);
		$data_jenis = $this->M_Menu->getJenisMenu();
		$data_chef = $this->M_Chef->getAllChef();
		
		$data = array(
			'data_menu' => $recordMenu,
			'data_jenis' => $data_jenis,
			'data_chef' => $data_chef
		);
		
		$this->load->view('form_edit_menu', $data);
	}

	public function AksiAddMenu()
	{
		$nama_menu = $this->input->post('nama_menu'); 
		$harga = $this->input->post('harga');
		$deskripsi = $this->input->post('deskripsi');
		$id_chef = $this->input->post('id_chef');
		$id_jenis = $this->input->post('id_jenis');

		$foto = $_FILES['foto'];
		if($foto = ''){}else{
			$config['upload_path'] = './assets/img/menu';
			$config['allowed_types'] = 'jpg|png|gif';

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('foto')){
				echo "Upload Gagal";die();
			} else {
				$foto=$this->upload->data('file_name');
			}
		}

		$DataInsert = array (
			'nama_menu' => $nama_menu, 
			'harga' => $harga,
			'deskripsi' => $deskripsi,
			'id_chef' => $id_chef,
			'id_jenis' => $id_jenis,
			'foto_menu' => $foto,
		);

		$this->M_Menu->AddDataMenu($DataInsert);
		redirect(site_url('C_Noeri/LinkMenuAdmin')); 
	}

	public function AksiEditMenu()
	{
		$id_mitra = $this->input->post('id_mitra'); 
		$nama_mitra = $this->input->post('nama_mitra'); 
		$alamat_mitra = $this->input->post('alamat_mitra');
		$keterangan = $this->input->post('keterangan');

		$DataUpdate = array(
			'id_mitra' => $id_mitra, 
			'nama_mitra' => $nama_mitra, 
			'alamat_mitra' => $alamat_mitra,
			'keterangan' => $keterangan,
		);

		print_r($DataUpdate);

		$this->M_Mitra->update($DataUpdate, $id_mitra);
		redirect(base_url('C_Gelora/LinkMitra')); 
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
