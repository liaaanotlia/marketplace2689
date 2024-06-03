<?php
class Mkategori extends CI_Model {
	function tampil() {

		//melakukan query
		$q = $this->db->get("kategori");

		//pecah ke array
		$d = $q->result_array();

		return $d;
	}
}
