<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wali_Kelas extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_wali_kelas');
		$this->load->model('M_pegawai');
		$this->load->model('M_kelas');
		$this->load->model('M_tahun_ajaran');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		// $data['dataWali_Kelas'] 	= $this->M_wali_kelas->select_all();

		$data['tahun_ajaran_default'] = $this->session->userdata('tahun_ajaran_default');
		$data['tahun_ajaran'] = $this->M_tahun_ajaran->select_by_tahun($data['tahun_ajaran_default'])->id_tahun;

		$data['dataPegawai'] 	= $this->M_pegawai->select_guru();
		$data['dataKelas'] 	= $this->M_kelas->select_all();
		$data['dataTahun_ajaran'] 	= $this->M_tahun_ajaran->select_all();


		$data['page'] 		= "wali_kelas";
		$data['judul'] 		= "Data Tabel Wali Kelas";
		$data['deskripsi'] 	= "Kelola Data Wali Kelas";

		$data['modal_tambah_wali_kelas'] = show_my_modal('modals/modal_tambah_wali_kelas', 'tambah-wali_kelas', $data);

		$this->template->views('wali_kelas/home', $data);
	}

	public function tampil(){
		$id_tahun = $_POST['id_tahun'];

		$data['dataWali_Kelas'] = $this->M_wali_kelas->select_all_by_ta($id_tahun);

		$this->load->view('wali_kelas/list_data', $data);

	}

	public function prosesTambah() {
		$this->form_validation->set_rules('NIP', 'NIP', 'trim|required');
		$this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|required');
		$this->form_validation->set_rules('id_tahun', 'Tahun Ajaran', 'trim|required');

		$data 	= $this->input->post();

		$cek_kesamaan_guru = $this->M_wali_kelas->cek_duplikat_guru($data['NIP'], $data['id_tahun']);
		$cek_kesamaan_wali = $this->M_wali_kelas->cek_duplikat_wali($data['id_kelas'], $data['id_tahun']);

		if ($this->form_validation->run() == TRUE) {
			if ($cek_kesamaan_guru->num_rows() == 0) {
				if ($cek_kesamaan_wali->num_rows() == 0) {
					$result = $this->M_wali_kelas->insert($data);

					if ($result > 0) {
						$out['status'] = '';
						$out['msg'] = show_succ_msg('Data Wali Kelas Berhasil ditambahkan', '20px');
					} else {
						$out['status'] = '';
						$out['msg'] = show_err_msg('Data Wali Kelas Gagal ditambahkan', '20px');
					}
				}
				else{
				$out['status'] = 'form';
				$out['msg'] = show_err_msg('Kelas '.$cek_kesamaan_wali->row()->nama_kelas.' Sudah Memiliki Wali Kelas', '15px');
				}
			}
			else{
				$out['status'] = 'form';
				$out['msg'] = show_err_msg('Guru '.$cek_kesamaan_guru->row()->nama_pegawai.' Sudah Menjadi Wali Kelas di Kelas '.$cek_kesamaan_guru->row()->nama_kelas.'', '15px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id_wali_kelas				= trim($_POST['id_wali_kelas']);
		$data['dataWali_Kelas'] 	= $this->M_wali_kelas->select_by_id($id_wali_kelas);
		$data['dataPegawai'] 	= $this->M_pegawai->select_guru();
		$data['dataKelas'] 	= $this->M_kelas->select_all();
		$data['dataTahun_ajaran'] 	= $this->M_tahun_ajaran->select_all();

		echo show_my_modal('modals/modal_update_wali_kelas', 'update-wali_kelas', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('NIP', 'NIP', 'trim|required');
		$this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|required');
		$this->form_validation->set_rules('id_tahun', 'Tahun Ajaran', 'trim|required');

		$data 	= $this->input->post();

		$data_db = $this->M_wali_kelas->select_by_id($data["id_wali_kelas"]);

		if ($this->form_validation->run() == TRUE) {
					$result = $this->M_wali_kelas->update($data);

					if ($result > 0) {
						$out['status'] = '';
						$out['msg'] = show_succ_msg('Data Wali Kelas Berhasil diubah', '20px');
					} else {
						$out['status'] = '';
						$out['msg'] = show_succ_msg('Data Wali Kelas Gagal diubah', '20px');
					}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id_wali_kelas = $_POST['id_wali_kelas']; 
	
		$result = $this->M_wali_kelas->delete($id_wali_kelas);
		if ($result > 0){
			echo show_succ_msg('Data Wali Kelas Berhasil dihapus', '20px');	
		}
		else{
			echo show_err_msg('Data Wali Kelas Gagal dihapus karena digunakan di data lain', '20px');	
		}
	}
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */