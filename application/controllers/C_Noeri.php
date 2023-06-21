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
		$data_makanan = $this->M_Menu->getMakanan(); 
		$data_minuman = $this->M_Menu->getMinuman(); 
		$data_snack = $this->M_Menu->getSnack(); 
		$temp['data_makanan'] = $data_makanan; 
		$temp['data_minuman'] = $data_minuman; 
		$temp['data_snack'] = $data_snack;  
		$this->load->view('V_Menu', $temp);
	}

	public function LinkChef() 
	{ 
		$data_chef = $this->M_Chef->getAllChef();
		$temp['data'] = $data_chef;
		$this->load->view('V_Chef', $temp);
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

	public function hapusMenuDariKeranjang($rowid)
	{
	    $data = array(
	        'rowid' => $rowid,
	        'qty' => 0
	    );
	    $this->cart->update($data);
	    redirect(site_url('C_Noeri/LinkPesanan'));
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

<<<<<<< HEAD
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
		redirect(site_url('C_Noeri/LinkOrderAdmin')); 
	
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

	public function AksiDeletePesanan($id_pesanan)
	{
		$this->M_Pesanan->DeletePesanan($id_pesanan);
		redirect(site_url('C_Noeri/LinkOrderAdmin'));
	}

	public function AksiUpdateOrder($id_pesanan)
	{
		global $conn;
		$id = $order['id_pesanan'];
		$nama = $order['nama'];
		$status =$order['id_status_pesanan'];
		$pembayaran = $order['id-pembayaran'];
		$waktu = $order['waktu_pesanan'];
		$harga = $order['total_harga'];
		$tanggal_pesanan=$order['tanggal_pesanan'];

		$Order_pesanan = aksiOrder();
		if($status != "")
		{
			 
		}
	}



=======
>>>>>>> 424f0a54a1c5a4e6339990437ba5fd9a33804f6d
}

