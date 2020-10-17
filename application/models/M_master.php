<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_master extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('mastertabelbiaya');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM mastertabelbiaya WHERE id_biaya = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_jenis_biaya($jenis_biaya) {
		$sql = "SELECT * FROM mastertabelbiaya WHERE jenis_biaya = '{$jenis_biaya}'";

		$data = $this->db->query($sql);

		return $data->row();
	}


	public function insert($data) {
		$sql = "INSERT INTO mastertabelbiaya VALUES('','" .$data['jenis_biaya'] ."','" .$data['nominal'] ."','" .$data['tahun_masuk'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('mastertabelbiaya', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE mastertabelbiaya SET jenis_biaya ='" .$data['jenis_biaya'] ."', nominal='" .$data['nominal'] ."', tahun_masuk='" .$data['tahun_masuk'] ."' WHERE id_biaya ='" .$data['id_biaya'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "SELECT tahun_masuk FROM mastertabelbiaya WHERE id_biaya='" .$id ."'";
		$data = $this->db->query($sql)->row();

		$sql = "SELECT * FROM siswa WHERE tahun_masuk='" .$data->tahun_masuk ."'";
		if($data = $this->db->query($sql)->num_rows() > 0){
			return 0;
		}else{
			$sql = "DELETE FROM mastertabelbiaya WHERE id_biaya='" .$id ."'";

			$this->db->query($sql);

			return $this->db->affected_rows();	
		}

		
	}

	public function check_nama($nama) {
		$this->db->where('jenis_biaya', $nama);
		$data = $this->db->get('mastertabelbiaya');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('mastertabelbiaya');

		return $data->num_rows();
	}

	public function select_by_tahun_masuk($tahun_masuk)
	{
		$sql = "SELECT * FROM mastertabelbiaya WHERE tahun_masuk = '{$tahun_masuk}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function cek_select_by_tahun_masuk($tahun_masuk)
	{
		$sql = "SELECT * FROM mastertabelbiaya WHERE tahun_masuk = '{$tahun_masuk}'";

		$data = $this->db->query($sql);

		return $data->num_rows();
	}

	// public function select_pengajar($id_mapel) {
	// 	$this->db->select('*');
	// 	$this->db->from('pengajar');
	// 	$this->db->where('id_mapel', $id_mapel);
		
	// 	$data = $this->db->get();

	// 	return $data->num_rows();
	// }
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */