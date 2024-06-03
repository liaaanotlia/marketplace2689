<?php
class Martikel extends CI_Model {
	function tampil_artikel_terbaru() {

		$this->db->order_by('id_artikel', 'desc');
		//melakukan query
		$q = $this->db->get('artikel',4,0);

		//pecah ke array
		$d = $q->result_array();

		return $d;
	}
}
