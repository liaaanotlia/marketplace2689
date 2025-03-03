<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$inputan = $this->input->post();

		//form validation username dan password wajib diisi
		$this->form_validation->set_rules("username","Username","required");
		$this->form_validation->set_rules("password","Password","required");

		//atur pesan dalam bahasa Indonesia
		$this->form_validation->set_message("required","%s wajib diisi.");

		//paket validasinya
		if ($this->form_validation->run()==TRUE) {
			$this->load->model('Madmin');
			$output = $this->Madmin->login($inputan);

			if($output=="ada") {
				$this->session->set_flashdata('pesan_sukses', 'Berhasil Login');
				redirect('home','refresh');
			} else {
				$this->session->set_flashdata('pesan_gagal', 'Gagal Login');
				redirect('/','refresh');
			}
		}
		$this->load->view('login');
	}
}
