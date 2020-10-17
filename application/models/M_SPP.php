<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_SPP extends CI_Model {
	public function select_all() {
		$sql = "SELECT * FROM siswa WHERE status_siswa = 'Aktif'";

		$data = $this->db->query($sql); //untuk menjalankan query

		return $data->result(); // untuk menampilkan secara berbaris baris
	}

	public function select_by_id($id) {

		$sql = "SELECT * FROM siswa WHERE NIS = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row(); //untuk menampilkan secara 1 baris saja sesuai kondisi

	}

	public function select_by_no_transaksi($id) {
		$sql = "SELECT * FROM spp,siswa,pegawai,bulan,wali_kelas,kelas,anggota_kelas,tahun_ajaran WHERE siswa.NIS = spp.NIS AND pegawai.NIP = spp.NIP AND bulan.id_bulan = spp.id_bulan  AND wali_kelas.id_wali_kelas = anggota_kelas.id_wali_kelas AND wali_kelas.id_kelas = kelas.id_kelas AND anggota_kelas.NIS = siswa.NIS AND spp.id_tahun=tahun_ajaran.id_tahun AND no_transaksi = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row(); //untuk menampilkan secara 1 baris saja sesuai kondisi

	}

	public function select_NIP_TU($id){
        $sql = "SELECT NIP FROM spp WHERE no_transaksi = '{$id}'";
        $data = $this->db->query($sql);
        return $data->row(); //untuk menampilkan secara 1 baris saja sesuai kondisi
    }

	public function select_by_nis_and_tanggal($NIS,$tanggal_bayar) {
		$sql = "SELECT DISTINCT nama_bulan, nominal_spp, nominal_beasiswa, total_bayar, status_pembayaran,keterangan FROM spp,siswa,pegawai,bulan,wali_kelas,kelas,anggota_kelas,tahun_ajaran WHERE siswa.NIS = spp.NIS AND pegawai.NIP = spp.NIP AND bulan.id_bulan = spp.id_bulan  AND wali_kelas.id_wali_kelas = anggota_kelas.id_wali_kelas AND wali_kelas.id_kelas = kelas.id_kelas AND anggota_kelas.NIS = siswa.NIS AND spp.id_tahun=tahun_ajaran.id_tahun AND spp.NIS = '{$NIS}' AND tanggal_bayar = '{$tanggal_bayar}'";

		$data = $this->db->query($sql);

		return $data; //untuk menampilkan secara 1 baris saja sesuai kondisi

	}

	public function select_by_nis_and_tahun($NIS,$tahun) {
		$sql = "SELECT DISTINCT nama_bulan, tanggal_bayar, no_transaksi, total_bayar, status_pembayaran,keterangan FROM spp,siswa,pegawai,bulan,wali_kelas,kelas,anggota_kelas,tahun_ajaran WHERE siswa.NIS = spp.NIS AND pegawai.NIP = spp.NIP AND bulan.id_bulan = spp.id_bulan  AND wali_kelas.id_wali_kelas = anggota_kelas.id_wali_kelas AND wali_kelas.id_kelas = kelas.id_kelas AND anggota_kelas.NIS = siswa.NIS AND spp.id_tahun=tahun_ajaran.id_tahun AND spp.NIS = '{$NIS}' AND spp.id_tahun = '{$tahun}' order by no_transaksi desc ";

		$data = $this->db->query($sql);

		return $data->result(); //tambah pembayaran spp

	}

	public function select_by_tahun($id_tahun) {
		$sql = "SELECT * FROM spp,siswa, bulan WHERE siswa.NIS = spp.nis AND bulan.id_bulan=spp.id_bulan AND id_tahun = '{$id_tahun}'order by tanggal_bayar desc";

		$data = $this->db->query($sql);

		return $data->result(); //untuk menampilkan secara 1 baris saja sesuai kondisi

	}


	public function select_by_kelas_ta_default($id, $tahun) {
		$sql = "SELECT * FROM siswa, kelas, anggota_kelas, wali_kelas, tahun_ajaran WHERE siswa.NIS=anggota_kelas.NIS AND anggota_kelas.id_wali_kelas=wali_kelas.id_wali_kelas AND wali_kelas.id_kelas=kelas.id_kelas AND wali_kelas.id_tahun=tahun_ajaran.id_tahun AND  kelas.id_kelas = '{$id}' AND tahun_ajaran.id_tahun='{$tahun}'";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all_bulan(){
		$sql = "SELECT * FROM bulan ";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_spp_bulan_by_tahun($id_tahun, $NIS){
		$sql = "SELECT id_bulan FROM spp WHERE NIS = '{$NIS}' AND id_tahun='{$id_tahun}'";

		$data = $this->db->query($sql);

		return $data;
	}

	public function select_spp_for_update($id_tahun, $NIS, $no_transaksi){
		$sql = "SELECT id_bulan FROM spp WHERE NIS = '{$NIS}' AND id_tahun='{$id_tahun}' AND no_transaksi <> '{$no_transaksi}'";

		$data = $this->db->query($sql);

		return $data;
	}


	public function select_by_kelas_ta($id_kelas) {
		$post = $this->input->post();
		$id_tahun = $post["tahun_ajaran"];
		$sql = "SELECT * FROM siswa, kelas, anggota_kelas, wali_kelas, tahun_ajaran WHERE siswa.NIS=anggota_kelas.NIS AND anggota_kelas.id_wali_kelas=wali_kelas.id_wali_kelas AND wali_kelas.id_kelas=kelas.id_kelas AND wali_kelas.id_tahun=tahun_ajaran.id_tahun AND  kelas.id_kelas = '{$id_kelas}' AND tahun_ajaran.id_tahun='{$id_tahun}'";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_pegawai($id) {
		$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, posisi.nama AS posisi FROM pegawai, kota, kelamin, posisi WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_posisi = posisi.id AND pegawai.id_kota = kota.id AND pegawai.id_posisi={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {
		$this->db->trans_start();
		$this->db->trans_strict(FALSE);

		foreach ($data["bulan"] as $id_bulan) {
				$data["id_bulan"] = $id_bulan;
				$sql = "INSERT INTO spp VALUES('','" .$data['NIS'] ."','" .$data['id_bulan'] ."','" .$data['id_tahun'] ."','" .$data['tanggal_bayar'] ."','" .$data['NIP'] ."','" .$data['status_pembayaran'] ."','" .$data['nominal_spp'] ."','".$data['potongan']."','".$data['total_bayar'] ."','" .$data['jenis_potongan'] ."')";
				$this->db->query($sql);
		}

		$this->db->trans_complete();

		if ($this->db->trans_status()==FALSE) {
			$this->db->trans_rollback();
			return FALSE;
		}
		else{
			$this->db->trans_commit();
			return TRUE;
		}
		

		// return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('siswa', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE spp SET id_bulan='" .$data['id_bulan'] ."', id_tahun='" .$data['id_tahun'] ."' WHERE no_transaksi='" .$data['no_transaksi'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM spp WHERE no_transaksi='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama_siswa', $nama);
		$data = $this->db->get('siswa');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('siswa');

		return $data->num_rows();
	}

	public function select_tagihan($id_tahun,$id_bulan_sekarang,$id_bulan_batas) {
		// $post = $this->input->post();
		// $id_tahun = $post["tahun_ajaran"];
		$sql = "SELECT siswa.NIS, nama_siswa, id_bulan, nama_bulan, nama_kelas FROM siswa, bulan, kelas, wali_kelas,anggota_kelas WHERE id_bulan NOT IN (SELECT id_bulan FROM spp WHERE id_tahun= '{$id_tahun}' AND NIS = siswa.NIS) AND id_bulan <='{$id_bulan_sekarang}' AND id_bulan >= '{$id_bulan_batas}' AND kelas.id_kelas = wali_kelas.id_kelas AND anggota_kelas.id_wali_kelas = wali_kelas.id_wali_kelas AND siswa.NIS = anggota_kelas.NIS AND wali_kelas.id_tahun ='{$id_tahun}' ORDER BY nama_kelas, siswa.NIS, id_bulan";

		$data = $this->db->query($sql);

		return $data->result();
	}


}

/* End of file M_posisi.php */
/* Location: ./application/models/M_posisi.php */