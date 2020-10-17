<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_siswa');
		$this->load->model('M_tahun_ajaran');

	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataSiswa'] = $this->M_siswa->select_all();

		$data['page'] 		= "siswa";
		$data['judul'] 		= "Data Siswa";
		$data['deskripsi'] 	= "Kelola Data Siswa";


		$data['modal_tambah_siswa'] = show_my_modal('modals/modal_tambah_siswa', 'tambah-siswa', $data);

		$this->template->views('siswa/home', $data);
	}

	public function tampil() {
		$data['dataSiswa'] = $this->M_siswa->select_all();
		$this->load->view('siswa/list_data', $data);
	}

	public function tambah()
	{
		$data['userdata'] 	= $this->userdata;

		$data['page'] 		= "siswa";
		$data['judul'] 		= "Data Siswa";
		$data['deskripsi'] 	= "Kelola Data Siswa";

		$data['tahun_ajaran_default'] = $this->session->userdata('tahun_ajaran_default');
		$data['tahun_ajaran'] = $this->M_tahun_ajaran->select_by_tahun($data['tahun_ajaran_default'])->id_tahun;

		$data['dataTahunAjaran'] 	= $this->M_tahun_ajaran->select_all();


		$this->template->views('siswa/form_tambah_siswa', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('NIS', 'NIS', 'trim|required');
		$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('status_siswa', 'Status', 'trim|required');

		$data 	= $this->input->post();
		if($data['jenis_kelamin']=='L'){
			$data['foto'] = "siswa_L.png";
		}
		else{
			$data['foto'] = "siswa_P.png";
		}
		if ($this->form_validation->run() == TRUE) {
			if($this->M_siswa->check_nis($data['NIS']) == 0){
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
				$result = $this->M_siswa->insert($data);

				if ($result > 0) {
					$this->session->set_flashdata('msg', show_succ_msg('Data Siswa Berhasil ditambah'));
					redirect('Siswa');
				} else {
					$this->session->set_flashdata('msg', show_err_msg('Data Siswa Gagal ditambah'));
					redirect('Siswa');
				}
			}
			else{
				$this->session->set_flashdata('msg', show_err_msg('Siswa Dengan NIS '.$data['NIS'].' Sudah Ada!'));
				redirect('Siswa/tambah');
			}
		} else {
			$this->session->set_flashdata('msg', show_err_msg(validation_errors()));
			redirect('Siswa/tambah');
		}
	}

	public function update($id) {
		$data['userdata'] 	= $this->userdata;
		$data['page'] 		= "siswa";
		$data['judul'] 		= "Data Siswa";
		$data['deskripsi'] 	= "Kelola Data Siswa";

		$data['dataTahunAjaran'] 	= $this->M_tahun_ajaran->select_all();

		$data['dataSiswa'] = $this->M_siswa->select_by_id($id);
		$this->template->views('siswa/form_update_siswa',$data);
	}

	public function prosesUpdate($NIS) {
		$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('status_siswa', 'Status', 'trim|required');

		$data 	= $this->input->post();
		$data['foto'] = $data['foto_lama'];
		if($data['jenis_kelamin']=='L' && $data['foto']=="siswa_P.png"){
			$data['foto'] = "siswa_L.png";
		}
		else if($data['jenis_kelamin']=='P'&& $data['foto']=="siswa_L.png"){
			$data['foto'] = "siswa_P.png";
		}
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
			$result = $this->M_siswa->update($data);

			if ($result > 0) {
				$this->session->set_flashdata('msg', show_succ_msg('Data Siswa Berhasil diubah'));
				redirect('Siswa');
			} else {
				$this->session->set_flashdata('msg', show_err_msg('Data Siswa Gagal diubah'));
				redirect('Siswa');
			}
		} else {
			$this->session->set_flashdata('msg', show_err_msg(validation_errors()));
			redirect('Siswa/update/'.$NIS);
		}
		// echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['NIS'];
		$result = $this->M_siswa->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Siswa Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Siswa Gagal dihapus karena digunakan di data lain', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['NIS']);
		$data['siswa'] = $this->M_siswa->select_by_id($id);
		// $data['dataPosisi'] = $this->M_siswa->select_by_pegawai($id);

		echo show_my_modal('modals/modal_detail_siswa', 'detail-siswa', $data, 'lg');
	}
}

/* End of file Posisi.php */
/* Location: ./application/controllers/Posisi.php */