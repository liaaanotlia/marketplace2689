<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();

		//jk tidak ada tiket bioskop, maka suruh login
		if(!$this->session->userdata("id_member")) {
			redirect('/','refresh');
		}
	}
	function index() {

		//dapatkan id_member yang login
		$id_member = $this->session->userdata("id_member");

		//panggil model Mtransaksi dan fungsi transaksi_member_beli(id_member yang login)
		$this->load->model("Mtransaksi");
		$data["transaksi"] = $this->Mtransaksi->transaksi_member_beli($id_member);

		$this->load->view("header");
		$this->load->view("transaksi_tampil", $data);
		$this->load->view("footer");
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
