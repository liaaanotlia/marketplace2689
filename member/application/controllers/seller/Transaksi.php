<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	
    function __construct()
	{
		parent::__construct();

		//jk tidak ada tiket bioskop, maka suruh login
		if(!$this->session->userdata("id_member")) {
            $this->session->set_flashdata('pesan_gagal', 'Anda harus login');
			redirect('/','refresh');
		}
	}
    public function index()
    {
        //menampilkan transaksi penjualan member yang login
        $id_member = $this->session->userdata("id_member");
        $this->load->model('Mtransaksi');
        $data['jual'] = $this->Mtransaksi->transaksi_member_jual($id_member);

        $this->load->view('header');
        $this->load->view('seller/transaksi_tampil', $data);
        $this->load->view('footer');
    }
    function detail($id_transaksi) {

		//panggil model Mtransaksi
		$this->load->model('Mtransaksi');

		//panggil fungsi detail()
		$data["transaksi"] = $this->Mtransaksi->detail($id_transaksi);
		
		//panggil fungsi produk_transaksi()
		$data["transaksi_detail"] = $this->Mtransaksi->transaksi_detail($id_transaksi);

		$this->load->view("header");
		$this->load->view("transaksi_detail", $data);
		$this->load->view("footer");
	}
}