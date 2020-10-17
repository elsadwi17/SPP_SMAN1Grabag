<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beasiswa extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_beasiswa');
		$this->load->model('M_siswa');
		$this->load->model('M_tahun_ajaran');
		$this->load->model('M_kelas');
		//$this->load->model('M_pengajar');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataBeasiswa'] 	= $this->M_beasiswa->select_all();

		$data['page'] 		= "beasiswa_potongan";
		$data['judul'] 		= "Data Beasiswa";
		$data['deskripsi'] 	= "Kelola Data Beasiswa";

		$data['modal_tambah_beasiswa'] = show_my_modal('modals/modal_tambah_beasiswa', 'tambah-beasiswa', $data);

		$this->template->views('beasiswa/home', $data);
	}

	public function tampil() {
		$data['dataBeasiswa'] = $this->M_beasiswa->select_all();
		$this->load->view('beasiswa/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('nama_beasiswa', 'Nama Beasiswa', 'trim|required');
		$this->form_validation->set_rules('nominal_beasiswa', 'Nominal Beasiswa', 'trim|required');

		$data 	= $this->input->post();
		$data['nama_beasiswa'] = ucwords($data['nama_beasiswa']);
		$validasi_kesamaan = $this->M_beasiswa->check_nama($data['nama_beasiswa']);
		if ($this->form_validation->run() == TRUE) {
			if ($validasi_kesamaan->num_rows() == 0) {
				$result = $this->M_beasiswa->insert($data);

				if ($result > 0) {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Beasiswa Berhasil ditambahkan', '20px');
				} else {
					$out['status'] = '';
					$out['msg'] = show_err_msg('Data Beasiswa Gagal ditambahkan', '20px');
				}
			}
			else{
				$out['status'] = 'form';
				$out['msg'] = show_err_msg('<br>Beasiswa '.$data['nama_beasiswa'].' sudah ada', '15px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id_beasiswa				= trim($_POST['id_beasiswa']);
		$data['dataBeasiswa'] 	= $this->M_beasiswa->select_by_id($id_beasiswa);

		echo show_my_modal('modals/modal_update_beasiswa', 'update-beasiswa', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama_beasiswa', 'Nama Beasiswa', 'trim|required');
		$this->form_validation->set_rules('nominal_beasiswa', 'Nominal Beasiswa', 'trim|required');

		$data 	= $this->input->post();
		$data['nama_beasiswa'] = ucwords($data['nama_beasiswa']);
		
		$validasi_kesamaan = $this->M_beasiswa->check_nama($data['nama_beasiswa']);
		if ($this->form_validation->run() == TRUE) {
			if ($validasi_kesamaan->num_rows() == 0 || $data['id_beasiswa']== $validasi_kesamaan->row()->id_beasiswa) {
				$result = $this->M_beasiswa->update($data);

				if ($result > 0) {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Beasiswa Berhasil diubah', '20px');
				} else {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Beasiswa Gagal diubah', '20px');
				}
			}
			else{
				$out['status'] = 'form';
				$out['msg'] = show_err_msg('<br>Beasiswa '.$data['nama_beasiswa'].' sudah ada', '15px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id_beasiswa = $_POST['id_beasiswa'];
		// $cek_pengajar = $this->M_mapel->select_pengajar($id_mapel); 
	
		// if ($cek_pengajar == 0) {
			$result = $this->M_beasiswa->delete($id_beasiswa);
			if ($result == TRUE){
				echo show_succ_msg('Data Beasiswa Berhasil dihapus', '20px');	
			}
			else{
				echo show_err_msg('Data Beasiswa Gagal dihapus', '20px');	
			}
		// } else {
		// 	echo show_err_msg('Data Mata Pelajaran Gagal dihapus! Cek Tabel Pengajar', '20px');
		// }
	}

	public function detail($id_beasiswa) {
		$data['userdata'] 	= $this->userdata;
		$data['id_beasiswa'] = $id_beasiswa;


		$this->session->set_userdata('id_beasiswa', $id_beasiswa);

		$data['dataBeasiswa'] 	= $this->M_beasiswa->select_by_id($id_beasiswa);

		// echo show_my_modal('modals/modal_detail_mapel', 'detail-mapel', $data, 'lg');
		$data['page'] 		= "beasiswa_potongan";
		$data['judul'] 		= "Data Beasiswa ";
		$data['deskripsi'] 	= "Detail Data Beasiswa";

		$data['dataSiswa'] = $this->M_beasiswa->select_siswa();

		$data['modal_tambah_detail_beasiswa'] = show_my_modal('modals/modal_tambah_detail_beasiswa', 'tambah-detail-beasiswa', $data);

		$this->template->views('beasiswa/detail_beasiswa', $data);
	}


	public function tampilDetail() {
		$data['tahun_ajaran_default'] = $this->session->userdata('tahun_ajaran_default');       
 		$data['tahun_ajaran'] = $this->M_tahun_ajaran->select_by_tahun($data['tahun_ajaran_default'])->id_tahun;
		$data['dataDetailBeasiswa'] = $this->M_beasiswa->select_siswa_by_id_beasiswa($this->session->userdata('id_beasiswa'),$data['tahun_ajaran']);
		$this->load->view('beasiswa/list_data_detail_beasiswa', $data);
	}

	public function tambah_siswa($id_beasiswa) {
		$data['userdata'] 	= $this->userdata;
		$data['id_beasiswa'] = $id_beasiswa;
		$data['tahun_ajaran_default'] = $this->session->userdata('tahun_ajaran_default');       
 		$data['tahun_ajaran'] = $this->M_tahun_ajaran->select_by_tahun($data['tahun_ajaran_default'])->id_tahun;

		$this->session->set_userdata('id_beasiswa', $id_beasiswa);

		$data['dataBeasiswa'] 	= $this->M_beasiswa->select_by_id($id_beasiswa);

		// echo show_my_modal('modals/modal_detail_mapel', 'detail-mapel', $data, 'lg');
		$data['page'] 		= "form_siswa_penerima_beasiswa";
		$data['judul'] 		= "Data Siswa Penerima Beasiswa ";
		$data['deskripsi'] 	= "Detail Data Siswa Penerima Beasiswa";
		$data['dataKelas'] = $this->M_kelas->select_all();
		$data['dataSiswa'] = $this->M_siswa->select_by_kelas_ta("1", $data['tahun_ajaran']);
		//ini ngeload untuk pertama kali 1 -> untuk ngeload kelas dengan id 1 yaitu kelas x bahasa kemudian yang lain akan menyesuaikan 

		// $data['modal_tambah_detail_beasiswa'] = show_my_modal('modals/modal_tambah_detail_beasiswa', 'tambah-detail-beasiswa', $data);

		$this->template->views('beasiswa/form_tambah_detail_beasiswa', $data);
	}

	public function kelola_load_detail_beasiswa(){
        $id_kelas = $_POST['id_kelas'];

 		$data['tahun_ajaran_default'] = $this->session->userdata('tahun_ajaran_default');       
 		$data['tahun_ajaran'] = $this->M_tahun_ajaran->select_by_tahun($data['tahun_ajaran_default'])->id_tahun;
        $data['dataSiswa']= $this->M_siswa->select_by_kelas_ta($id_kelas, $data['tahun_ajaran']);

 

        $this->load->view('beasiswa/kelola_load_detail_beasiswa', $data);
    }

	public function prosesTambahDetail($id_beasiswa){
		$data 	= $this->input->post();
		$data['id_beasiswa'] 	= $id_beasiswa;
		$result = $this->M_beasiswa->insert_siswa_to_beasiswa($data);

		if ($result > 0) {
                    $this->session->set_flashdata('msg', show_succ_msg('Data Siswa Berhasil ditambah ke Beasiswa'));
                    redirect('Beasiswa/detail/'.$id_beasiswa);
                } else {
                    $this->session->set_flashdata('msg', show_err_msg('Data Siswa Gagal ditambah ke Beasiswa karena Siswa Sudah Mendapat Beasiswa Lain'));  redirect('Beasiswa/detail/'.$id_beasiswa);
                }		
	}

	public function deleteDetail(){
		$NIS = $_POST['NIS'];
	
		$result = $this->M_beasiswa->delete_siswa_beasiswa($NIS);
		if ($result > 0){
			echo show_succ_msg('Data Beasiswa Berhasil dihapus', '20px');	
		}
		else{
			echo show_err_msg('Data Beasiswa Gagal dihapus', '20px');	
		}
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_mapel->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID Mapel"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Nama Mapel");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id_mapel); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama_mapel); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Mapel.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Mapel.xlsx', NULL);
	}

	public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$check = $this->M_mapel->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama_mapel'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_mapel->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Mata Pelajaran Berhasil diimport ke database'));
						redirect('Mapel');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Mata Pelajaran Gagal diimport ke database (Data Sudah terubah)', 'warning', 'fa-warning'));
					redirect('Mapel');
				}

			}
		}
	}
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */