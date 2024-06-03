<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	
    function __construct()
	{
		parent::__construct();

		//jk tidak ada tiket bioskop, maka suruh login
		if(!$this->session->userdata("id_member")) {
            $this->session->set_flashdata('pesan_gagal', 'Anda harus login');
			redirect('/','refresh');
		}
	}

    function index()
    {
        //mendapatkan id_member yang login

        $id_member = $this->session->userdata("id_member");
        $this->load->model('Mproduk');

        $data["produk"] = $this->Mproduk->produk_member($id_member);

        $this->load->view('header');
        $this->load->view('seller/produk_tampil', $data);
        $this->load->view('footer');
    }
    function tambah() {

        $this->load->model('Mkategori');
        $this->load->model('Mproduk');
        $data['kategori'] = $this->Mkategori->tampil();

        $inputan = $this->input->post();
        if ($inputan) {
            $this->Mproduk->simpan($inputan);
            $this->session->set_flashdata('pesan_sukses', 'produk tersimpan');
            redirect('seller/produk','refresh');
        }

		$this->load->view("header");
        $this->load->view('seller/produk_tambah', $data);
        $this->load->view('footer');
	}

    function edit($id_produk) {
        $this->load->model('Mproduk');
        $data['produk'] = $this->Mproduk->detail($id_produk);

        $this->load->model('Mkategori');
        $data['kategori'] = $this->Mkategori->tampil();

        $inputan = $this->input->post();
        if ($inputan) {
            $this->Mproduk->ubah($inputan, $id_produk);
            $this->session->set_flashdata('pesan_sukses', 'produk tersimpan');
            redirect('seller/produk','refresh');
        }

        $this->load->view("header");
        $this->load->view('seller/produk_edit', $data);
        $this->load->view('footer');
    }

    function hapus($id_produk) {
        $this->load->model('Mproduk');
        $this->Mproduk->hapus($id_produk);

        $this->session->set_flashdata('pesan_sukses', 'produk telah dihapus');
        redirect('seller/produk', 'refresh');
    }
}