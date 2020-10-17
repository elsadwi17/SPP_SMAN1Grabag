<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_ajaran extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_tahun_ajaran');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataTahun_ajaran'] = $this->M_tahun_ajaran->select_all();
		$data['page'] = "tahun_ajaran";
		$data['judul'] = "Data Tahun Ajaran";
		$data['deskripsi'] = "Kelola Data Tahun Ajaran";

		$data['modal_tambah_tahun_ajaran'] = show_my_modal('modals/modal_tambah_tahun_ajaran', 'tambah-tahun_ajaran', $data);

		$this->template->views('tahun_ajaran/home', $data);
	}

	public function tampil() {
		$data['dataTahun_ajaran'] = $this->M_tahun_ajaran->select_all();
		$this->load->view('tahun_ajaran/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');

		$data = $this->input->post();
		$validasi_kesamaan = $this->M_tahun_ajaran->check_nama($data['tahun']);
		if ($this->form_validation->run() == TRUE) {
			if ($validasi_kesamaan == 0) {
				if ($this->M_tahun_ajaran->cek_format_tahun_ajaran($data['tahun']) == TRUE) {
					$result = $this->M_tahun_ajaran->insert($data);

					if ($result > 0) {
						$out['status'] = '';
						$out['msg'] = show_succ_msg('Data Tahun Ajaran Berhasil ditambahkan', '20px');
					} else {
						$out['status'] = '';
						$out['msg'] = show_err_msg('Data Tahun Ajaran Gagal ditambahkan', '20px');
					}
				}
				else{
					$out['status'] = 'form';
					$out['msg'] = show_err_msg('<br>Format Tahun Ajaran salah!<br> Contoh : 2019/2020', '15px');
				}
			}
			else{
				$out['status'] = 'form';
				$out['msg'] = show_err_msg('<br>Tahun Ajaran '.$data['tahun'].' sudah ada', '15px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$id = trim($_POST['id_tahun']);

		$data['dataTahun_ajaran'] = $this->M_tahun_ajaran->select_by_id($id);

		echo show_my_modal('modals/modal_update_tahun_ajaran', 'update-tahun_ajaran', $data);
	}

	public function prosesUpdate() {
		// $this->form_validation->set_rules('id_tahun', 'id_tahun', 'trim|required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
		
		$data = $this->input->post();
		$validasi_kesamaan = $this->M_tahun_ajaran->check_nama($data['tahun']);
		if ($this->form_validation->run() == TRUE) {
			if ($validasi_kesamaan == 0) {
				if ($this->M_tahun_ajaran->cek_format_tahun_ajaran($data['tahun']) == TRUE) {
					$result = $this->M_tahun_ajaran->update($data);

					if ($result > 0) {
						$out['status'] = '';
						$out['msg'] = show_succ_msg('Data Tahun Ajaran Berhasil diubah', '20px');
					} else {
						$out['status'] = '';
						$out['msg'] = show_succ_msg('Data Tahun Ajaran Gagal diubah', '20px');
					}
				}
				else{
					$out['status'] = 'form';
					$out['msg'] = show_err_msg('<br>Format Tahun Ajaran salah!<br> Contoh : 2019/2020', '15px');
				}
			}
			else{
				$out['status'] = 'form';
				$out['msg'] = show_err_msg('<br>Tahun Ajaran '.$data['tahun'].' sudah ada', '15px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id_tahun = $_POST['id_tahun'];
		$result = $this->M_tahun_ajaran->delete($id_tahun);

		if ($result > 0) {
			echo show_succ_msg('Data Tahun Ajaran Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Tahun Ajaran Gagal dihapus karena digunakan di data lain', '20px');
		}
	}

}

/* End of file Tahun_ajaran.php */
/* Location: ./application/controllers/Tahun_ajaran.php */