<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {
	
    function __construct()
	{
		parent::__construct();

		//jk tidak ada tiket bioskop, maka suruh login
		if(!$this->session->userdata("id_member")) {
			redirect('/','refresh');
		}
	}
    
	public function index()
    {
        $inputan = $this->input->post();

		$this->form_validation->set_rules("email_member","Email","required");
		$this->form_validation->set_rules("nama_member","Nama Lengkap","required");
		$this->form_validation->set_rules("alamat_member","Alamat Lengkap","required");
		$this->form_validation->set_rules("wa_member","Nomor WA","required");
		$this->form_validation->set_rules("kode_distrik_member","Kode Distrik","required");
		$this->form_validation->set_rules("nama_distrik_member","Nama Distrik","required");
		$this->form_validation->set_message("required","%s wajib diisi.");
        
		if($this->form_validation->run()==TRUE) {

            //jalankan skrip ubah (ubah akun)
            $this->load->model('Mmember');
            $id_member = $this->session->userdata("id_member");
            $this->Mmember->ubah($inputan,$id_member);

            $this->session->set_flashdata('pesan_sukses', 'Akun telah diubah');
            redirect('home','refresh');
        }
		$this->load->view("header");
		$this->load->view("akun");
		$this->load->view("footer");
	}
}
