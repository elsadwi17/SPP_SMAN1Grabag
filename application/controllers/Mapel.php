<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_mapel');
		$this->load->model('M_pengajar');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataMapel'] 	= $this->M_mapel->select_all();

		$data['page'] 		= "mapel";
		$data['judul'] 		= "Data Mata Pelajaran";
		$data['deskripsi'] 	= "Kelola Data Mapel";

		$data['modal_tambah_mapel'] = show_my_modal('modals/modal_tambah_mapel', 'tambah-mapel', $data);

		$this->template->views('mapel/home', $data);
	}

	public function tampil() {
		$data['dataMapel'] = $this->M_mapel->select_all();
		$this->load->view('mapel/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('nama_mapel', 'Mapel', 'trim|required');

		$data 	= $this->input->post();
		$data['nama_mapel'] = ucwords($data['nama_mapel']);
		$validasi_kesamaan = $this->M_mapel->check_nama($data['nama_mapel']);
		if ($this->form_validation->run() == TRUE) {
			if ($validasi_kesamaan == 0) {
				$result = $this->M_mapel->insert($data);

				if ($result > 0) {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Mata Pelajaran Berhasil ditambahkan', '20px');
				} else {
					$out['status'] = '';
					$out['msg'] = show_err_msg('Data Mata Pelajaran Gagal ditambahkan', '20px');
				}
			}
			else{
				$out['status'] = 'form';
				$out['msg'] = show_err_msg('<br>Mata Pelajaran '.$data['nama_mapel'].' sudah ada', '15px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id_mapel				= trim($_POST['id_mapel']);
		$data['dataMapel'] 	= $this->M_mapel->select_by_id($id_mapel);

		echo show_my_modal('modals/modal_update_mapel', 'update-mapel', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama_mapel', 'Mapel', 'trim|required');

		$data 	= $this->input->post();
		$data['nama_mapel'] = ucwords($data['nama_mapel']);
		$validasi_kesamaan = $this->M_mapel->check_nama($data['nama_mapel']);
		if ($this->form_validation->run() == TRUE) {
			if ($validasi_kesamaan == 0) {
				$result = $this->M_mapel->update($data);

				if ($result > 0) {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Mata Pelajaran Berhasil diubah', '20px');
				} else {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Mata Pelajaran Gagal diubah', '20px');
				}
			}
			else{
				$out['status'] = 'form';
				$out['msg'] = show_err_msg('<br>Mata Pelajaran '.$data['nama_mapel'].' sudah ada', '15px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id_mapel = $_POST['id_mapel'];
		$cek_pengajar = $this->M_mapel->select_pengajar($id_mapel); 
	
		if ($cek_pengajar == 0) {
			$result = $this->M_mapel->delete($id_mapel);
			if ($result > 0){
				echo show_succ_msg('Data Mata Pelajaran Berhasil dihapus', '20px');	
			}
			else{
				echo show_err_msg('Data Mata Pelajaran Gagal dihapus', '20px');	
			}
		} else {
			echo show_err_msg('Data Mata Pelajaran Gagal dihapus! Cek Tabel Pengajar', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id_mapel 				= trim($_POST['id_mapel']);
		$data['mapel'] = $this->M_mapel->select_by_id($id_mapel);
		$data['jumlahPengajar'] = $this->M_pengajar->total_rows();
		$data['dataPengajar'] = $this->M_pengajar->select_by_mapel($id_mapel);

		echo show_my_modal('modals/modal_detail_mapel', 'detail-mapel', $data, 'lg');
	}
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */