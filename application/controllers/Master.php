<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_master');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataMaster'] 	= $this->M_master->select_all();

		$data['page'] 		= "master";
		$data['judul'] 		= "Data Tabel Master";
		$data['deskripsi'] 	= "Kelola Data Master";

		$data['modal_tambah_master'] = show_my_modal('modals/modal_tambah_master', 'tambah-master', $data);

		$this->template->views('master/home', $data);
	}

	public function tampil() {
		$data['dataMaster'] = $this->M_master->select_all();
		$this->load->view('master/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('jenis_biaya', 'Biaya', 'trim|required');
		$this->form_validation->set_rules('nominal', 'Nominal', 'trim|required');
		$this->form_validation->set_rules('tahun_masuk', 'Tahun Masuk', 'trim|required');

		$data 	= $this->input->post();
		$data['jenis_biaya'] = ucwords($data['jenis_biaya']);
		$cek_kesamaan_biaya = $this->M_master->check_nama($data['jenis_biaya']);
		if ($this->form_validation->run() == TRUE) {
			if($cek_kesamaan_biaya==0){
				$result = $this->M_master->insert($data);

				if ($result > 0) {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Master Berhasil ditambahkan', '20px');
				} else {
					$out['status'] = '';
					$out['msg'] = show_err_msg('Data Master Gagal ditambahkan', '20px');
				}
			} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg('<br>Biaya '.$data['jenis_biaya'].' Sudah Ada', '15px');
			}	
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id_biaya				= trim($_POST['id_biaya']);
		$data['dataMaster'] 	= $this->M_master->select_by_id($id_biaya);

		echo show_my_modal('modals/modal_update_master', 'update-master', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('jenis_biaya', 'Biaya', 'trim|required');
		$this->form_validation->set_rules('nominal', 'Nominal', 'trim|required');
		$this->form_validation->set_rules('tahun_masuk', 'Tahun Masuk', 'trim|required');
		$data 	= $this->input->post();
		$data['jenis_biaya'] = ucwords($data['jenis_biaya']);
		$cek_kesamaan_biaya = $this->M_master->check_nama($data['jenis_biaya']);
		$data_asli_db = $this->M_master->select_by_jenis_biaya($data['jenis_biaya']);
		if ($this->form_validation->run() == TRUE) {
			if($cek_kesamaan_biaya==0 || $data_asli_db->id_biaya==$data['id_biaya']){

				$result = $this->M_master->update($data);

				if ($result > 0) {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Master Berhasil diubah', '20px');
				} else {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Master Gagal diubah', '20px');
				}
			} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg('<br>Biaya '.$data['jenis_biaya'].' Sudah Ada', '15px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id_biaya = $_POST['id_biaya'];
	
		$result = $this->M_master->delete($id_biaya);
		if ($result > 0){
			echo show_succ_msg('Data Master Berhasil dihapus', '20px');	
		}
		else{
			echo show_err_msg('Data Master Gagal dihapus karena telah digunakan untuk pembayaran SPP pada tahun terkait', '20px');	
		}
	}
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */