<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_beasiswa extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('beasiswa');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id_beasiswa) {
		$sql = "SELECT * FROM beasiswa WHERE id_beasiswa = '{$id_beasiswa}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_NIS($NIS) {
		$sql = "SELECT * FROM potongan, beasiswa WHERE potongan.id_beasiswa = beasiswa.id_beasiswa AND NIS =  '{$NIS}'";

		$data = $this->db->query($sql);

		return $data;
	}


	public function insert($data) {
		$sql = "INSERT INTO beasiswa VALUES('','" .$data['nama_beasiswa'] ."','" .$data['nominal_beasiswa'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('mapel', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE beasiswa SET nama_beasiswa='" .$data['nama_beasiswa'] ."', nominal_beasiswa='" .$data['nominal_beasiswa'] ."' WHERE id_beasiswa ='" .$data['id_beasiswa'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id_beasiswa) {
		$this->db->trans_start();
		$this->db->trans_strict(FALSE);

		$sql = "DELETE FROM potongan WHERE id_beasiswa='" .$id_beasiswa ."'";

		$this->db->query($sql);
		
		$sql = "DELETE FROM beasiswa WHERE id_beasiswa='" .$id_beasiswa ."'";

		$this->db->query($sql);

		// return $this->db->affected_rows();

		$this->db->trans_complete();

		if ($this->db->trans_status()==FALSE) {
			$this->db->trans_rollback();
			return FALSE;
		}
		else{
			$this->db->trans_commit();
			return TRUE;
		}
	}

	public function check_nama($nama_beasiswa) {
		$this->db->where('nama_beasiswa', $nama_beasiswa);
		$data = $this->db->get('beasiswa');

		return $data;
	}

	public function total_rows() {
		$data = $this->db->get('beasiswa');

		return $data->num_rows();
	}

	public function select_pengajar($id_mapel) {
		$this->db->select('*');
		$this->db->from('pengajar');
		$this->db->where('id_mapel', $id_mapel);
		
		$data = $this->db->get();

		return $data->num_rows();
	}


	function select_siswa_by_id_beasiswa($id_beasiswa,$id_tahun){
		$sql = "SELECT * FROM potongan, siswa, beasiswa, kelas, wali_kelas,anggota_kelas WHERE beasiswa.id_beasiswa=potongan.id_beasiswa AND siswa.NIS=potongan.NIS AND kelas.id_kelas = wali_kelas.id_kelas AND anggota_kelas.id_wali_kelas = wali_kelas.id_wali_kelas AND siswa.NIS = anggota_kelas.NIS AND wali_kelas.id_tahun = '{$id_tahun}' AND potongan.id_beasiswa = '{$id_beasiswa}'";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_siswa(){
		$sql = "SELECT * FROM siswa WHERE NIS NOT IN(SELECT NIS FROM potongan)";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert_siswa_to_beasiswa($data)
	{
		$nama_siswa = $data['nama_siswa'];
		$id_beasiswa = $data['id_beasiswa'];
		$sql = "SELECT * FROM potongan WHERE NIS = '".$nama_siswa ."'";

		$data = $this->db->query($sql);
		if($data->num_rows() == 1){
			return 0;
		}
		else {
			$sql = "INSERT INTO potongan VALUES('" .$nama_siswa ."','" .$id_beasiswa ."')";
			$this->db->query($sql);
			return $this->db->affected_rows();
		}
	}

	public function delete_siswa_beasiswa($NIS)
	{
		$sql = "DELETE FROM potongan WHERE NIS = '{$NIS}' ";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */