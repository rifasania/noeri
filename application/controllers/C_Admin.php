<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller {

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
		$this->load->view('V_Dashboard');
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

	public function FormAddChef()
	{ 
		$this->load->view('form_add_chef.php');
	}

    public function FormAddAdmin()
	{ 
		$this->load->view('form_add_admin.php');
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

	public function FormEditChef($id)
	{
		$recordChef = $this->M_Chef->getDataChef($id); 
		
		$data = array(
			'data_chef' => $recordChef
		);
		
		$this->load->view('form_edit_chef', $data);
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
			$config['allowed_types'] = 'jpg|jpeg|png|gif';

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
		redirect(site_url('C_Admin/LinkMenuAdmin')); 
	}

	public function AksiAddChef()
	{
		$nama_chef = $this->input->post('nama_chef'); 
		$alamat_chef = $this->input->post('alamat_chef');
		$jenis_kelamin_chef = $this->input->post('jenis_kelamin_chef');
		$no_telp_chef = $this->input->post('no_telp_chef'); 

		$foto = $_FILES['foto'];
		if($foto = ''){}else{
			$config['upload_path'] = './assets/img/chef';
			$config['allowed_types'] = 'jpg|jpeg|png';

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('foto')){
				echo "Upload Gagal";die();
			} else {
				$foto=$this->upload->data('file_name');
			}
		}

		$DataInsert = array (
			'nama_chef' => $nama_chef, 
			'alamat_chef' => $alamat_chef,
			'jenis_kelamin_chef' => $jenis_kelamin_chef,
			'no_telp_chef' => $no_telp_chef, 
			'foto_chef' => $foto,
		);

		$this->M_Chef->AddDataChef($DataInsert);
		redirect(site_url('C_Admin/LinkChefAdmin')); 
	}

    public function AksiAddAdmin()
	{
		$usn_user = $this->input->post('usn_user'); 
		$pass_user = $this->input->post('pass_user');
		$email_user = $this->input->post('email_user');
		$nama_user = $this->input->post('nama_user'); 
        $no_telp_user = $this->input->post('no_telp_user'); 
        $id_role = $this->input->post('id_role'); 

		$DataInsert = array (
			'usn_user' => $usn_user, 
			'pass_user' => $pass_user,
			'email_user' => $email_user,
			'nama_user' => $nama_user, 
			'no_telp_user' => $no_telp_user,
            'id_role' => $id_role
		);

		$this->M_ListUser->AddDataAdmin($DataInsert);
		redirect(site_url('C_Admin/ListAdmin')); 
	}

	public function AksiEditMenu()
	{

		$data_Menu = $this->M_Menu->getDataMenu($id);

		// Cek apakah ada file foto baru yang diunggah
		if ($_FILES['foto_menu']) {
			// Mengunggah file foto baru
			$config['upload_path'] = './assets/img/menu';
			$config['allowed_types'] = 'jpg|jpeg|png'; 
	
			$this->load->library('upload', $config);
	
			if (!$this->upload->do_upload('foto_menu')) {
				// Jika gagal mengunggah foto baru, tampilkan pesan error
				$error = $this->upload->display_errors();
				// Lakukan penanganan error sesuai kebutuhan Anda
			} else {
				// Jika berhasil mengunggah foto baru, perbarui nilai kolom "foto" dalam tabel database
				$DataUpdate['foto_menu'] = $this->upload->data('file_name');
			}
		} else {
			// Jika tidak ada file foto baru yang diunggah, tetap gunakan foto yang sebelumnya
			$DataUpdate['foto_menu'] = $data_Menu->foto_menu;
	   	}

		// $DataUpdate['id_menu'] = $this->input->post('id_menu');
		$DataUpdate['nama_menu'] = $this->input->post('nama_menu');
    	$DataUpdate['harga'] = $this->input->post('harga');
    	$DataUpdate['deskripsi'] = $this->input->post('deskripsi');
		$DataUpdate['id_chef'] = $this->input->post('id_chef');
    	$DataUpdate['id_jenis'] = $this->input->post('id_jenis');
    	// $DataUpdate['foto_m'] = $this->input->post('foto_m');

		$id_menu = $this->input->post('id_menu'); 

		$this->M_Menu->UpdateMenu($DataUpdate, $id_menu);
		redirect(site_url('C_Admin/LinkMenuAdmin')); 
	}

	public function AksiEditChef()
	{
		$data_chef = $this->M_Chef->getDataChef($id);

		// Cek apakah ada file foto baru yang diunggah
		if ($_FILES['foto_chef']) {
			// Mengunggah file foto baru
			$config['upload_path'] = './assets/img/chef';
			$config['allowed_types'] = 'jpg|jpeg|png'; 
	
			$this->load->library('upload', $config);
	
			if (!$this->upload->do_upload('foto_chef')) {
				// Jika gagal mengunggah foto baru, tampilkan pesan error
				$error = $this->upload->display_errors();
				// Lakukan penanganan error sesuai kebutuhan Anda
			} else {
				// Jika berhasil mengunggah foto baru, perbarui nilai kolom "foto" dalam tabel database
				$DataUpdate['foto_chef'] = $this->upload->data('file_name');
			}
		} else {
			// Jika tidak ada file foto baru yang diunggah, tetap gunakan foto yang sebelumnya
			$DataUpdate['foto_chef'] = $data_chef->foto_chef;
	   	}
 
		$DataUpdate['nama_chef'] = $this->input->post('nama_chef');
    	$DataUpdate['alamat_chef'] = $this->input->post('alamat_chef');
    	$DataUpdate['jenis_kelamin_chef'] = $this->input->post('jenis_kelamin_chef');
		$DataUpdate['no_telp_chef'] = $this->input->post('no_telp_chef'); 
		//$DataUpdate['foto_chef'] = $this->input->post('foto_chef');
		 

		$id_chef = $this->input->post('id_chef'); 

		$this->M_Chef->UpdateChef($DataUpdate, $id_chef);
		redirect(site_url('C_Admin/LinkChefAdmin')); 
	}

	public function AksiDeleteMenu($id_menu)
	{
		$this->M_Menu->DeleteDataMenu($id_menu);
		redirect(site_url('C_Admin/LinkMenuAdmin'));
	}

	public function AksiDeleteChef($id_chef)
	{
		$this->M_Chef->DeleteDataChef($id_chef);
		redirect(site_url('C_Admin/LinkChefAdmin'));
	}

    public function AksiDeletePesanan($id_pesanan)
	{
		$this->M_Pesanan->DeletePesanan($id_pesanan);
		redirect(site_url('C_Admin/LinkOrderAdmin'));
	}

    public function AksiDeleteAdmin($id_user)
	{
		$this->M_ListUser->DeleteAdmin($id_user);
		redirect(site_url('C_Admin/ListAdmin'));
	}

	public function LinkOrderAdmin() 
	{
		$order = $this->M_Pesanan->getAllPesanan();
		$temp['order'] = $order;
		$this->load->view('V_OrderAdmin.php', $temp);
	}

	public function ListUser() 
	{
		$data_user = $this->M_ListUser->getAllUser();
		$temp['data'] = $data_user;
		$this->load->view('V_ListUser.php', $temp);
	}

    public function ListAdmin() 
	{
		$data_admin = $this->M_ListUser->getAllAdmin();
		$temp['data'] = $data_admin;
		$this->load->view('V_ListAdmin.php', $temp);
	}

    public function FormEditPesanan($id_pesanan)
	{
		$data_pesanan = $this->M_Pesanan->getDataPesanan($id_pesanan);
		$bayar = $this->M_Pesanan->getMetodePembayaran(); 
		$status = $this->M_Pesanan->getStatusPesanan();
		$temp['data_pesanan'] = $data_pesanan;
		$temp['bayar'] = $bayar;
		$temp['status'] = $status;
		$this->load->view('form_edit_order', $temp);
	}

	public function AksiEditPesanan()
	{
		$id_pesanan = $this->input->post('id_pesanan'); 
		$nama = $this->input->post('nama'); 
		$id_status_pesanan = $this->input->post('id_status_pesanan');
		$id_pembayaran = $this->input->post('id_pembayaran');
		$total_harga = $this->input->post('total_harga');
		$tanggal_pesanan = $this->input->post('tanggal_pesanan');
		$waktu_pesanan = $this->input->post('waktu_pesanan');

		$DataUpdate = array(
			'id_pesanan' => $id_pesanan, 
			'nama' => $nama, 
			'id_status_pesanan' => $id_status_pesanan,
			'id_pembayaran' => $id_pembayaran,
			'total_harga' => $total_harga,
			'tanggal_pesanan' => $tanggal_pesanan,
			'waktu_pesanan' => $waktu_pesanan,
		); 

		print_r($DataUpdate);

		$this->M_Pesanan->UpdatePesanan($DataUpdate, $id_pesanan);
		redirect(site_url('C_Admin/LinkOrderAdmin')); 
	
	}

    public function DetailPesanan($id)
    {
        $data = $this->M_Pesanan->getPesananMenu($id);

        $temp['data_pesanan'] = $data;
        $this->load->view('V_Details', $temp);
    }

	
}

