<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pegawai');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataPegawai'] = $this->M_pegawai->select_all();
		$data['dataJabatan'] = $this->M_pegawai->select_all_jabatan();

		$data['page'] 		= "pegawai";
		$data['judul'] 		= "Data Pegawai";
		$data['deskripsi'] 	= "Kelola Data Pegawai";

		$data['modal_tambah_pegawai'] = show_my_modal('modals/modal_tambah_pegawai', 'tambah-pegawai', $data);

		$this->template->views('pegawai/home', $data);
	}

	public function tampil() {
		$data['dataPegawai'] = $this->M_pegawai->select_all();
		$this->load->view('pegawai/list_data', $data);
	}

	public function tambah()	{
		$data['userdata'] 	= $this->userdata;
		$data['dataJabatan'] = $this->M_pegawai->select_all_jabatan();

		$data['page'] 		= "pegawai";
		$data['judul'] 		= "Data Pegawai";
		$data['deskripsi'] 	= "Kelola Data Pegawai";

		$this->template->views('pegawai/form_tambah_pegawai', $data);

	}

	public function prosesTambah() {
		$this->form_validation->set_rules('NIP', 'NIP', 'trim|required|max_length[18]');
		$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'trim|required');

		$data 	= $this->input->post();
		$data['foto']="logo-user.png";
		$password = $data['password'];
		$data['password'] = md5($password);
		if ($this->form_validation->run() == TRUE) {
			if($this->M_pegawai->check_nip($data['NIP']) == 0){
				$config['upload_path'] = './assets/img/';
				$config['allowed_types'] = 'jpg|png';
				$config['overwrite'] = true;
				
				$this->load->library('upload', $config);
				
				if (!$this->upload->do_upload('foto')){
					$error = array('error' => $this->upload->display_errors());
				}
				else{
					$data_foto = $this->upload->data();
					$data['foto'] = $data_foto['file_name'];
				}

				$result = $this->M_pegawai->insert($data);

				if ($result > 0) {
					$this->session->set_flashdata('msg', show_succ_msg('Data Pegawai Berhasil ditambah'));
					redirect('Pegawai');
				} else {
					$this->session->set_flashdata('msg', show_err_msg('Data Pegawai Gagal ditambah'));
					redirect('Pegawai');
				}
			}
			else{
				$this->session->set_flashdata('msg', show_err_msg('Pegawai Dengan NIP '.$data['NIP'].' Sudah Ada!'));
				redirect('Pegawai/tambah');
			}
		} else {
			$this->session->set_flashdata('msg', show_err_msg(validation_errors()));
			redirect('Pegawai/tambah');
		}
	}

	public function update($id) {
		$data['userdata'] 	= $this->userdata;
		$data['page'] 		= "pegawai";
		$data['judul'] 		= "Data Pegawai";
		$data['deskripsi'] 	= "Kelola Data Pegawai";
		$data['dataPegawai'] = $this->M_pegawai->select_by_id($id);
		$data['dataJabatan'] = $this->M_pegawai->select_all_jabatan();
		$this->template->views('pegawai/form_update_pegawai', $data);
	}

	public function prosesUpdate($NIP) {
		$this->form_validation->set_rules('NIP', 'NIP', 'trim|required');
		$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'trim|required');

		$data = $this->input->post();
		$password = $data['password'];
		$data['password'] = md5($password);
		$data['foto'] = $data['foto_lama'];
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'jpg|png';
			$config['overwrite'] = true;
			
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('foto')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data_foto = $this->upload->data();
				$data['foto'] = $data_foto['file_name'];
			}

			$result = $this->M_pegawai->update($data);
			if ($result > 0) {
				if($this->session->userdata('userdata')->NIP == $NIP){
					$data_pegawai = $this->M_pegawai->select_by_id_login($this->userdata->NIP);

					$this->session->set_userdata('userdata', $data_pegawai);
					$this->userdata = $this->session->userdata('userdata');
				}
				$this->session->set_flashdata('msg', show_succ_msg('Data Profile Berhasil diubah'));
				redirect('Pegawai');
			} else {
				$this->session->set_flashdata('msg', show_err_msg('Data Profile Gagal diubah'));
				redirect('Pegawai');
			}
		} else {
			$this->session->set_flashdata('msg', show_err_msg(validation_errors()));
			redirect('Pegawai/update/'.$NIP);
		}

	}

	public function delete() {
		$id = $_POST['NIP'];
		$result = $this->M_pegawai->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Pegawai Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Pegawai Gagal dihapus karena digunakan di data lain', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['NIP']);
		$data['pegawai'] = $this->M_pegawai->select_by_id_login($id);

		echo show_my_modal('modals/modal_detail_pegawai', 'detail-pegawai', $data, 'lg');
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Posisi.php */