<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		//jk tidak ada tiket bioskop, maka suruh login
		if(!$this->session->userdata("id_admin")) {
			redirect('/','refresh');
		}
	}
	
	function index() {
		$this->load->model("Mmember");
		$data["jumlah_member_distrik"] = $this->Mmember->jumlah_member_distrik();

		$this->load->view("header");
		$this->load->view("home", $data);
		$this->load->view("footer");
	}
}