<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_SPP extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_siswa');
		$this->load->model('M_tahun_ajaran');
		$this->load->model('M_SPP');
		$this->load->model('M_wali_kelas');
		$this->load->model('M_kelas');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataSPP'] 	= $this->M_SPP->select_all();
		$data['dataTahunAjaran'] = $this->M_tahun_ajaran->select_all();

		$data['tahun_ajaran_default'] = $this->session->userdata('tahun_ajaran_default');
		$data['tahun_ajaran'] = $this->M_tahun_ajaran->select_by_tahun($data['tahun_ajaran_default'])->id_tahun;

		$this->session->set_userdata('id_tahun-filter-rekap', $data['tahun_ajaran']);
		$this->session->set_userdata('id_kelas-filter-rekap', $this->M_kelas->select_all());
		$data['dataKelas'] 	= $this->M_kelas->select_all();

	
		$data['page'] 		= "rekap_spp";
		$data['judul'] 		= "Data Rekapitulasi SPP";
		$data['deskripsi'] 	= "Rekapitulasi Data SPP";

		$this->template->views('rekap_spp/home', $data);
	}

	public function tampil() {
		$data['tahun_ajaran_default'] = $this->session->userdata('tahun_ajaran_default');
		$data['tahun_ajaran'] = $this->M_tahun_ajaran->select_by_tahun($data['tahun_ajaran_default'])->id_tahun;
		$id_kelas 	= $this->M_kelas->select_limit()->id_kelas;
		$data['dataRekap_SPP'] = $this->M_siswa->select_by_kelas_ta($id_kelas,$data['tahun_ajaran']);
		$this->load->view('rekap_spp/list_data', $data);

	}

	public function tampil_Rekap()
	{
		$data = $this->input->post();

		$data['userdata'] 	= $this->userdata;
		$data['dataTahunAjaran'] = $this->M_tahun_ajaran->select_all();


		$this->session->set_userdata('id_tahun-filter-rekap', $data['tahun_ajaran']);
		$this->session->set_userdata('id_kelas-filter-rekap',$data['kelas']);

		$this->session->set_userdata('id_kelas-filter-rekap', $this->M_kelas->select_all());


		$data['dataKelas'] 	= $this->M_kelas->select_all();

		// $data['dataKelas'] 	= $this->M_wali_kelas->select_all_by_ta($data['tahun_ajaran']);
	
		$data['page'] 		= "rekap_spp";
		$data['judul'] 		= "Data Rekapitulasi SPP";
		$data['deskripsi'] 	= "Rekapitulasi Data SPP";

		$data['dataRekap_SPP'] = $this->M_siswa->select_by_kelas_ta($data['kelas'],$data['tahun_ajaran']);
		// $data['modal_tambah_SPP'] = show_my_modal('modals/modal_tambah_SPP', 'tambah-spp', $data);

		$this->template->views('rekap_spp/listdatabaru', $data);
	}
	

	public function prosesTambah() {
		$this->form_validation->set_rules('no_transaksi', 'Rekap_SPP', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_SPP->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Transaksi SPP Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Transaksi SPP Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update($no_transaksi) {
		$data['userdata'] 	= $this->userdata;

		$data['page'] 		= "spp";
		$data['judul'] 		= "Data Pembayaran SPP";
		$data['deskripsi'] 	= "Ubah Data Pembayaran SPP";

		$data['dataRekap_SPP'] 	= $this->M_SPP->select_by_no_transaksi($no_transaksi);
		$data['siswa']= $this->M_siswa->select_by_id($data['dataRekap_SPP']->NIS);
		$data['tahun']= $this->M_tahun_ajaran->tahun_untuk_spp(intval($data['siswa']->tahun_masuk));
		$data['bulan']=$this->M_SPP->select_all_bulan();

		$this->session->set_userdata('NIS_siswa_spp', $data['dataRekap_SPP']->NIS);
		$this->session->set_userdata('no_transaksi_siswa_spp', $no_transaksi);

		$this->template->views('spp/form_update_pembayaran', $data);
	}

	public function prosesUpdate($no_transaksi) {
		// $this->form_validation->set_rules('no_transaksi', 'Rekap_SPP', 'trim|required');
		$data 	= $this->input->post();
		$data['dataRekap_SPP'] 	= $this->M_SPP->select_by_no_transaksi($data['no_transaksi']);

		// if ($this->form_validation->run() == TRUE) {
			$result = $this->M_SPP->update($data);

			if ($result > 0) {
				$this->session->set_flashdata('msg', show_succ_msg('Data Pembayaran Sudah Tersimpan, Silahkan Cek Rekapitulasi'));
				redirect('Rekap_SPP/detail/'.$data['dataRekap_SPP']->NIS.'_'.$data['dataRekap_SPP']->id_tahun);
			} else {
				$this->session->set_flashdata('msg', show_err_msg('Data Pembayaran Belum Terbayar'));
				redirect('Rekap_SPP/detail/'.$data['dataRekap_SPP']->NIS.'_'.$data['dataRekap_SPP']->id_tahun);
			}
	}

	public function delete() {
		$no_transaksi = $_POST['no_transaksi'];
		$result = $this->M_SPP->delete($no_transaksi);
		
		if ($result > 0) {
			echo show_succ_msg('Data SPP Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data SPP Gagal dihapus', '20px');
		}
	}

	public function detail($input) {
		$data['userdata'] 	= $this->userdata;

		$data['page'] 		= "spp";
		$data['judul'] 		= "Data Pembayaran SPP";
		$data['deskripsi'] 	= "Ubah Data Pembayaran SPP";

		$array=explode('_', $input);
		$data['NIS']= $array[0];
		$data['tahun_ajaran']=$array[1];


		$this->session->set_userdata('NIS-detail-rekap-spp', $data['NIS']);
		$this->session->set_userdata('tahun_ajaran-detail-rekap-spp', $data['tahun_ajaran']);
		$data['dataSiswa'] = $this->M_siswa->select_detail_siswa($data['tahun_ajaran'], $data['NIS']);
		$this->template->views('rekap_spp/detail', $data);

	}

	public function tampil_detail(){
		$data['userdata'] 	= $this->userdata;

		$data['NIS']= $this->session->userdata('NIS-detail-rekap-spp');
		$data['tahun_ajaran']=$this->session->userdata('tahun_ajaran-detail-rekap-spp');

		$data['dataRekap_SPP']=$this->M_SPP->select_by_nis_and_tahun($data['NIS'], $data['tahun_ajaran']);

		$this->load->view('rekap_spp/list_data_detail', $data);
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_kelas->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "NIS"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "NIP");
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', "Tanggal Bayar");
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', "Bulan");
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', "Nominal");
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', "Status");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->NIS); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->NIP); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->tanggal_bayar); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->id_bulan); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->nominal); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->status_pembayaran); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Rekapitulasi SPP.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Rekapitulasi SPP.xlsx', NULL);
	}

	public function cetak($no_transaksi)
	{
	// pastikan error reporting mati, atau file pdf akan corrupt
        error_reporting(0);
        if(! empty($no_transaksi)){
            // spp
            $spp = $this->M_SPP->select_by_no_transaksi($no_transaksi);
            $NIP = $this->M_SPP->select_NIP_TU($no_transaksi)->NIP;
            $tahun_ajaran=$this->M_tahun_ajaran->select_by_id($spp->id_tahun);

            $parameters=array(
                'paper'=>'A4',
                'orientation'=>'potrait',
            );
            $this->load->library('Pdf', $parameters);

            // pastikan path font benar
            $this->pdf->selectFont(APPPATH.'/third_party/pdf-php/fonts/Helvetica.afm');

           // gambar header, pastikan path gambar benar
            $this->pdf->ezImage(base_url('assets/img/KOP_Surat.JPG'), 0, 550, 'none', 'center');

            // judul rekap
            $year 	 = $spp->tanggal_bayar[0].$spp->tanggal_bayar[1].$spp->tanggal_bayar[2].$spp->tanggal_bayar[3];
   			$month 	 = $spp->tanggal_bayar[5].$spp->tanggal_bayar[6];
    		$day 	 = $spp->tanggal_bayar[8].$spp->tanggal_bayar[9];
    		$tanggal = tanggal($day, $month, $year);

            $this->pdf->ezText("\nTanda Bukti Pembayaran SPP", 16, array('justification'=> 'centre'));

            $this->pdf->ezText("".$tahun_ajaran->tahun, 16, array('justification'=> 'centre'));

            $this->pdf->ezSetY(600);
            $this->pdf->ezText("NIS",11,array('justification'=>'left','aleft'=>'70'));

            $this->pdf->ezSetY(600);
            $this->pdf->ezText(":\t".$spp->NIS,11,array('justification'=>'left','aleft'=>'120'));
            
            $this->pdf->ezSetY(600);
            $this->pdf->ezText("Tanggal Bayar",11,array('justification'=>'left','aleft'=>'325'));
            
            $this->pdf->ezSetY(600);
            $this->pdf->ezText(":\t".$tanggal,11,array('justification'=>'left','aleft'=>'425'));
            
            $this->pdf->ezSetY(580);
            $this->pdf->ezText("Nama",11,array('justification'=>'left','aleft'=>'70'));
            
            $this->pdf->ezSetY(580);
            $this->pdf->ezText(":\t".$spp->nama_siswa,11,array('justification'=>'left','aleft'=>'120'));
            
            $this->pdf->ezSetY(560);
            $this->pdf->ezText("Kelas",11,array('justification'=>'left','aleft'=>'70'));

            $this->pdf->ezSetY(560);
            $this->pdf->ezText(":\t".$spp->nama_kelas,11,array('justification'=>'left','aleft'=>'120'));

           

            // spasi judul dengan tabel
            $this->pdf->ezSetDy(-20);

            // jalankan query
            $query=$this->M_SPP->select_by_nis_and_tanggal($spp->NIS,$spp->tanggal_bayar);

            // persiapkan data (array) untuk tabel pdf
            $no = 0;
            $i = 0; //ngitung bulan di  tabel
            $data_laporan=array();
            foreach ($query->result_array() as $key => $value) {
                // jangan ganti urutan 3 baris ini, atau nomor tidak tampil
                $data_laporan[$key] = $value;
                $data_laporan[$i]['no']= ++$no;
                $i++;
            }

            // header tabel pdf
            $column_header=array(
                'no' => 'No',
                'nama_bulan'=>'Bulan yang Dibayar',
                'nominal_spp'=>'Nominal SPP',
                'nominal_beasiswa'=>'Beasiswa/Potongan',
                'total_bayar'=>'Total Bayar',
                'status_pembayaran'=>'Status Pembayaran',
                'keterangan'=>'Potongan/Beasiswa'
            );

            // buat tabel pdf
            $this->pdf->ezTable($data_laporan, $column_header);

            // 
            $this->pdf->ezSetDy(-25);
            $this->pdf->ezText("Staf Tata Usaha\t",11,array('justification'=>'center','aleft'=>'425'));
            $this->pdf->ezSetDy(-40);
            $this->pdf->ezText("".$spp->nama_pegawai,11,array('justification'=>'center','aleft'=>'425'));
            $this->pdf->ezSetDy(-5);
            $this->pdf->ezText("".$NIP,11,array('justification'=>'center','aleft'=>'425'));

            $nama_file = 'Bukti_Pembayaran_SPP_' . $spp->NIS . '_Tanggal_' . $spp->tanggal_bayar . '.pdf';

            // force download, nama file sesuai dengan $nama_file
            $this->pdf->ezStream(array('Content-Disposition'=>$nama_file));
        }
        // parameter tidak lengkap
        else
        {
            $this->session->set_flashdata('msg', show_err_msg('Proses pembuatan laporan (PDF) gagal. Parameter tidak lengkap.'));
            redirect('Rekap_SPP');
        }
    
	}	
	

	public function kelola_load_kelas(){
		$id_tahun = $_POST['id_tahun'];

		$data['dataKelas'] 	= $this->M_wali_kelas->select_all_by_ta($id_tahun);

		$this->load->view('rekap_spp/kelola_load_kelas', $data);
	}
	
}

/* End of file kelas.php */
/* Location: ./application/controllers/kelas.php */