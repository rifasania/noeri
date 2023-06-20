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

}

