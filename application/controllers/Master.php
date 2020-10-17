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
		// $cek_pengajar = $this->M_master->select_pengajar($id_biaya); 
	
		$result = $this->M_master->delete($id_biaya);
		if ($result > 0){
			echo show_succ_msg('Data Master Berhasil dihapus', '20px');	
		}
		else{
			echo show_err_msg('Data Master Gagal dihapus karena telah digunakan untuk pembayaran SPP pada tahun terkait', '20px');	
		}
	}

	// public function detail() {
	// 	$data['userdata'] 	= $this->userdata;

	// 	$id_mapel 				= trim($_POST['id_mapel']);
	// 	$data['kota'] = $this->M_kota->select_by_id($id);
	// 	$data['jumlahKota'] = $this->M_kota->total_rows();
	// 	$data['dataKota'] = $this->M_kota->select_by_pegawai($id);

	// 	echo show_my_modal('modals/modal_detail_kota', 'detail-kota', $data, 'lg');
	// }

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_master->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID Biaya"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Jenis Biaya");
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', "Nominal");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id_biaya); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->jenis_biaya); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->nominal); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Master.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Master.xlsx', NULL);
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
						$check = $this->M_master->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['jenis_biaya'] = ucwords($value['B']);
							$resultData[$index]['nominal'] = ucwords($value['C']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_master->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Master Berhasil diimport ke database'));
						redirect('Master');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Master diimport ke database (Data Sudah terubah)', 'warning', 'fa-warning'));
					redirect('Master');
				}

			}
		}
	}
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */