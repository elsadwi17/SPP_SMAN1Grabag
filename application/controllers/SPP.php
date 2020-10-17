<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SPP extends AUTH_Controller {
	public function __construct() {
		//ngeload model
		parent::__construct();
		$this->load->model('M_SPP');
		$this->load->model('M_siswa');
		$this->load->model('M_tahun_ajaran');
		$this->load->model('M_master');
		$this->load->model('M_beasiswa');
		$this->load->model('M_kelas');
	}

	public function index() {
		//ketika sidebar dipencet maka akan menampilkan homenya SPP
		$data['userdata'] 	= $this->userdata;
		$data['dataKelas'] = $this->M_kelas->select_all();

		$data['page'] 		= "SPP";
		$data['judul'] 		= "Pembayaran SPP";
		$data['deskripsi'] 	= "Kelola Data Pembayaran SPP";

		//menampilkan modals tambah
		$data['modal_tambah_siswa'] = show_my_modal('modals/modal_tambah_siswa', 'tambah-siswa', $data);

		$this->template->views('spp/home', $data);
	}

	public function tampil() {
		//ngeload data tabel 
		$id_kelas = $_POST['id_kelas'];
		$data['tahun_ajaran_default'] = $this->session->userdata('tahun_ajaran_default');
		$data['tahun_ajaran'] = $this->M_tahun_ajaran->select_by_tahun($data['tahun_ajaran_default'])->id_tahun;
		$data['dataSiswa'] = $this->M_siswa->select_by_kelas_ta($id_kelas,$data['tahun_ajaran']);

		$this->load->view('spp/list_data', $data);
	}

	public function tambah($NIS)
	{
		//ketika bayar dipencet, maka akan diarahkan ke 

		$data['userdata'] 	= $this->userdata;

		$data['page'] 		= "SPP";
		$data['judul'] 		= "Pembayaran SPP";
		$data['deskripsi'] 	= "Kelola Pembayaran SPP";

		$data['tahun_ajaran_default'] = $this->session->userdata('tahun_ajaran_default');//pakek fungsi yang dari session
		$data['tahun_ajaran'] = $this->M_tahun_ajaran->select_by_tahun($data['tahun_ajaran_default'])->id_tahun;//ini id buat tukeran data lalu yang ditampilkan tahunnya
		$data['siswa']		= $this->M_siswa->select_by_id($NIS);
		$data['kelas']		= $this->M_siswa->select_detail_siswa($data['tahun_ajaran'],$NIS);
		$data['beasiswa'] = $this->M_beasiswa->select_by_NIS($NIS);
		$data['tahun']= $this->M_tahun_ajaran->tahun_untuk_spp(intval($data['siswa']->tahun_masuk)); //pakek fungsi yang udah ada di M_Tahun
		$data['bulan'] = $this->M_SPP->select_all_bulan();
		$data['spp'] = $this->M_master->select_by_tahun_masuk($data['siswa']->tahun_masuk);

		$this->session->set_userdata('NIS_siswa_spp', $NIS);

		$this->template->views('spp/form_tambah_pembayaran', $data);
		//sini

	}

	public function prosesTambah($NIS) {
		$this->form_validation->set_rules('bulan[]', 'Bulan', 'trim|required');

		$data 	= $this->input->post();
		$data["NIS"] = $NIS;
		$data["tanggal_bayar"] = date('Y-m-d');

		$data['siswa']		= $this->M_siswa->select_by_id($NIS);

		if($this->M_master->cek_select_by_tahun_masuk($data['siswa']->tahun_masuk)==0){
			$this->session->set_flashdata('msg', show_err_msg('Nominal SPP pada tabel master belum di atur'));
			redirect('SPP/tambah/'.$NIS);
		}

		if($this->M_beasiswa->select_by_NIS($NIS)->num_rows() != 0){
			$data['total_bayar'] = intval($this->M_master->select_by_tahun_masuk($data['siswa']->tahun_masuk)->nominal) - intval($this->M_beasiswa->select_by_NIS($NIS)->row()->nominal_beasiswa);
			if($data['total_bayar'] < 0){
				$data['total_bayar']=0;
			}
			$data['nominal_spp'] = intval($this->M_master->select_by_tahun_masuk($data['siswa']->tahun_masuk)->nominal);
			$data['potongan'] = intval($this->M_beasiswa->select_by_NIS($NIS)->row()->nominal_beasiswa);
			$data['jenis_potongan']= $this->M_beasiswa->select_by_NIS($NIS)->row()->nama_beasiswa;				

		}
		else{
			$data['nominal_spp'] = intval($this->M_master->select_by_tahun_masuk($data['siswa']->tahun_masuk)->nominal);
			$data['total_bayar'] = intval($this->M_master->select_by_tahun_masuk($data['siswa']->tahun_masuk)->nominal);
			$data['potongan'] = 0;
			$data['jenis_potongan']= '-';
		}
		
		$data['NIP']= $this->session->userdata('userdata')->NIP;
		$data['status_pembayaran']='Lunas';
		if ($this->form_validation->run() == TRUE) {
			
			// foreach ($data["bulan"] as $id_bulan) {
			// 	$data["id_bulan"] = $id_bulan;
			$result = $this->M_SPP->insert($data);
			// }
			
			if ($result == TRUE) {
				$this->session->set_flashdata('msg', show_succ_msg('SPP Sudah Terbayar, silahkan Cetak Nota'));
				redirect('Rekap_SPP/detail/'.$data['NIS'].'_'.$data['id_tahun']);
			} 
			else {
				$this->session->set_flashdata('msg', show_err_msg('SPP Belum Terbayar'));
				redirect('SPP');
			}
		} else {
			$this->session->set_flashdata('msg', show_err_msg('Bulan tidak boleh kosong'));
			redirect('SPP/tambah/'.$NIS);

		}

		// echo json_encode($out);
	}

	public function update($id) {
		$data['userdata'] 	= $this->userdata;
		$data['page'] 		= "siswa";
		$data['judul'] 		= "Data Siswa";
		$data['deskripsi'] 	= "Kelola Data Siswa";

		$data['dataSiswa'] = $this->M_siswa->select_by_id($id);
		$this->template->views('siswa/form_update_siswa',$data);


		// echo show_my_modal('modals/modal_update_siswa', 'update-siswa', $data);
	}

	public function prosesUpdate($NIS) {
		$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('status_siswa', 'Status', 'trim|required');

		$data 	= $this->input->post();
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
			echo show_err_msg('Data Siswa Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['NIS']);
		$data['siswa'] = $this->M_siswa->select_by_id($id);
		// $data['dataPosisi'] = $this->M_siswa->select_by_pegawai($id);

		echo show_my_modal('modals/modal_detail_siswa', 'detail-siswa', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_siswa->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "NIS"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Nama Siswa");
		$rowCount++;

		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->NIS); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama_siswa); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Siswa.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Siswa.xlsx', NULL);
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
						$check = $this->M_siswa->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama_siswa'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_kota->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Siswa Berhasil diimport ke database'));
						redirect('Posisi');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Siswa Gagal diimport ke database (Data Sudah Terubah)', 'warning', 'fa-warning'));
					redirect('Posisi');
				}

			}
		}
	}

	public function bulan_yang_dibayar(){

		$id_tahun = $_POST['id_tahun'];
		$NIS = $this->session->userdata('NIS_siswa_spp');

		$data['semua_bulan'] = $this->M_SPP->select_all_bulan();
		$data['bulan_yang_sudah_dibayar'] = $this->M_SPP->select_spp_bulan_by_tahun($id_tahun, $NIS);

		$this->load->view('spp/bulan_yang_dibayar', $data);
	}

	public function bulan_yang_dibayar_update(){

		$id_tahun = $_POST['id_tahun'];
		$NIS = $this->session->userdata('NIS_siswa_spp');
		$no_transaksi = $this->session->userdata('no_transaksi_siswa_spp');

		$data['id_tahun'] = $id_tahun;
		$data['dataRekap_SPP'] 	= $this->M_SPP->select_by_no_transaksi($no_transaksi);
		$data['semua_bulan'] = $this->M_SPP->select_all_bulan();
		$data['bulan_yang_sudah_dibayar'] = $this->M_SPP->select_spp_for_update($id_tahun, $NIS, $no_transaksi);

		$this->load->view('spp/bulan_yang_dibayar_update', $data);
	}
}

/* End of file Posisi.php */
/* Location: ./application/controllers/Posisi.php */