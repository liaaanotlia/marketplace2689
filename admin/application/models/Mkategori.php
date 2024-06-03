<?php
class Mkategori extends CI_Model {
	function tampil() {

		//melakukan query
		$q = $this->db->get("kategori");

		//pecah ke array
		$d = $q->result_array();

		return $d;
	}

	function simpan($inputan) {
		$config['upload_path'] = $this->config->item("assets_kategori");
		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$this->load->library('upload', $config);

		//adegan mengupload foto_kategori
		$ngupload = $this->upload->do_upload("foto_kategori");

		//jika ngupload, maka dapatkan nama fotonya utk ditampung ke db
		if ($ngupload) {
			$inputan['foto_kategori'] = $this->upload->data("file_name");
		}

		//query simpan data ke tabel kategori
		$this->db->insert('kategori', $inputan);
	}

	function hapus($id_kategori) {
		$this->db->where('id_kategori', $id_kategori);
		$this->db->delete('kategori');
	}

	function detail($id_kategori) {
		//select * from kategori where id kategori
		$this->db->where('id_kategori', $id_kategori);
		$q = $this->db->get('kategori');
		$d = $q->row_array();

		return $d;
	}

	function edit($inputan, $id_kategori) {
		//ngurusi foto_kategori jika pengguna upload foto

		$config['upload_path'] = $this->config->item("assets_kategori");
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library("upload", $config);

		//adegan ngupload
		$ngupload = $this->upload->do_upload("foto_kategori");

		//jika ngupload
		if ($ngupload) {
			$inputan['foto_kategori'] = $this->upload->data("file_name");
		}

		//query update data sesuai id_kategori
		$this->db->where('id_kategori', $id_kategori);
		$this->db->update('kategori', $inputan);
	}
}
