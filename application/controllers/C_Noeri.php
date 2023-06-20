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
		$data_makanan = $this->M_Menu->getMakanan(); 
		$data_minuman = $this->M_Menu->getMinuman(); 
		$data_snack = $this->M_Menu->getSnack(); 
		$temp['data_makanan'] = $data_makanan; 
		$temp['data_minuman'] = $data_minuman; 
		$temp['data_snack'] = $data_snack; 
		$this->load->view('V_Order', $temp);
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

	public function FormAddChef()
	{ 
		$this->load->view('form_add_chef.php');
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
		redirect(site_url('C_Noeri/LinkMenuAdmin')); 
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
		redirect(site_url('C_Noeri/LinkChefAdmin')); 
	}

	public function AksiEditMenu()
	{
		$data_menu = $this->M_Menu->getDataMenu($id);

		// Cek apakah ada file foto baru yang diunggah
		if ($_FILES['foto_menu']['name']) {
			// Mengunggah file foto baru
			$config['upload_path'] = './assets/img/menu';
			$config['allowed_types'] = 'jpg|jpeg|png'; 
	
			$this->load->library('upload', $config);
	
			if (!$this->upload->do_upload('foto')) {
				// Jika gagal mengunggah foto baru, tampilkan pesan error
				$error = $this->upload->display_errors();
				// Lakukan penanganan error sesuai kebutuhan Anda
			} else {
				// Jika berhasil mengunggah foto baru, perbarui nilai kolom "foto_menu" dalam tabel database
				$data['foto_menu'] = $this->upload->data('file_name');
			}
		} else {
			// Jika tidak ada file foto baru yang diunggah, tetap gunakan foto yang sebelumnya
			$data['foto_menu'] = $data_menu->foto_menu;
		}

		// $DataUpdate['id_menu'] = $this->input->post('id_menu');
		$DataUpdate['nama_menu'] = $this->input->post('nama_menu');
    	$DataUpdate['harga'] = $this->input->post('harga');
    	$DataUpdate['deskripsi'] = $this->input->post('deskripsi');
		$DataUpdate['id_chef'] = $this->input->post('id_chef');
    	$DataUpdate['id_jenis'] = $this->input->post('id_jenis');

		$id_menu = $this->input->post('id_menu'); 

		$this->M_Menu->UpdateMenu($DataUpdate, $id_menu);
		redirect(site_url('C_Noeri/LinkMenuAdmin')); 
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
				$data['foto_chef'] = $this->upload->data('file_name');
			}
		} else {
			// Jika tidak ada file foto baru yang diunggah, tetap gunakan foto yang sebelumnya
			$data['foto_chef'] = $data_chef->foto_chef;
		}
 
		$DataUpdate['nama_chef'] = $this->input->post('nama_chef');
    	$DataUpdate['alamat_chef'] = $this->input->post('alamat_chef');
    	$DataUpdate['jenis_kelamin_chef'] = $this->input->post('jenis_kelamin_chef');
		$DataUpdate['no_telp_chef'] = $this->input->post('no_telp_chef'); 
		$DataUpdate['foto_chef'] = $this->input->post('foto_chef');
		 

		$id_chef = $this->input->post('id_chef'); 

		$this->M_Chef->UpdateChef($DataUpdate, $id_chef);
		redirect(site_url('C_Noeri/LinkChefAdmin')); 
	}



	public function AksiDeleteMenu($id_menu)
	{
		$this->M_Menu->DeleteDataMenu($id_menu);
		redirect(site_url('C_Noeri/LinkMenuAdmin'));
	}

	public function AksiDeleteChef($id_chef)
	{
		$this->M_Chef->DeleteDataChef($id_chef);
		redirect(site_url('C_Noeri/LinkChefAdmin'));
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

	
	public function LinkPesanan() 
	{
		$keranjang = $this->cart->contents();
		$data['keranjang'] = $keranjang;
		$this->load->view('pesanan', $data);
	}
 
	public function tambahKeranjang($id_menu)
	{
	    // Dapatkan data menu berdasarkan ID menu
	    $menu = $this->M_Menu->getDataMenu($id_menu);

	        // Buat data menu untuk ditambahkan ke keranjang pesanan
	        $data = array(
				'id' => $menu->id_menu,
				'name' => $menu->nama_menu,
				'price' => $menu->harga, 
				'qty' => 1,
			);

	        // Tambahkan menu ke keranjang pesanan
	        $this->cart->insert($data);

	        // Redirect ke halaman pesanan
	        redirect(site_url('C_Noeri/LinkPesanan'));
	    
	}

	public function hapusKeranjang()
	{
		$this->cart->destroy();
		redirect(site_url('C_Noeri/LinkOrder'));
	}
	
	public function LinkPembayaran() 
	{
		$bayar = $this->M_Pembayaran->getMetodeBayar();
		$temp['bayar'] = $bayar;
		$this->load->view('pembayaran', $temp);
	}

	public function ProsesPemesanan() 
	{
		$this->cart->destroy();
			$this->load->view('proses_pesanan');
	}

	public function AksiAddPesanan()
	{
		date_default_timezone_set('Asia/Jakarta');
        $nama = $this->input->post('nama');
        $id_pembayaran = $this->input->post('id_pembayaran'); 
        $id_status_pesanan = $this->input->post('id_status_pesanan');
        $total_harga = $this->input->post('total_harga');
        $date = new DateTime('now');
        $dateString = $date->format('Y-m-d');
        
        $data_pesanan = array(
            'nama' => $nama,
            'id_pembayaran' => $id_pembayaran,
            'id_status_pesanan' => $id_status_pesanan,
            'total_harga' => $total_harga,
            'tanggal_pesanan' => $dateString,
            'waktu_pesanan' => date('H:i:s'),
        );

		// $this->M_Pesanan->AddDataPesanan($data_pesanan);
		$this->db->insert('pesanan', $data_pesanan);
        $id_pesanan = $this->db->insert_id();

		foreach ($this->cart->contents() as $item)
        {
            $data = array(
                'id_pesanan' => $id_pesanan,
                'id_menu' => $item['id'],
                'jumlah' => $item['qty'],
            );
            $this->db->insert('pesanan_menu', $data);
        }
		redirect(site_url('C_Noeri/ProsesPemesanan')); 
	}

	public function aksiOrder()
	{
		$order = $this->M_Pesanan->getAllPesanan();

		$dataUpdate['nama'] = $this->input->post('nama');
		$dataUpdate['id_status_pesanan'] = $this->input->post('id_status_pesanan');
		$dataUpdate['id_pembayaran'] = $this->input->post('id_pembayaran');
		$dataUpdate['waktu_pesanan'] = $this->input->post('waktu_pesanan');
		$dataUpdate['total_harga'] = $this->input->post('total_harga');
		$dataUpdate['tanggal_pesanan'] = $this->input->post('tanggal_pesanan');
	
		$id_pesanan = $this->input->post('id_pesanan');

		$this->M_Pesanan->UpdateOrder($DataUpdate, $id_Order);
		redirect (site_url('C_Noeri/LinkOrderAdmin')); 
	}

	public function AksiDeleteOrder($id_Pesanan)
	{
		$this->M_Pesanan->DeleteDataOrder($id_Pesanan);
		redirect(site_url('C_Noeri/LinkOrderAdmin'));
	}

}

