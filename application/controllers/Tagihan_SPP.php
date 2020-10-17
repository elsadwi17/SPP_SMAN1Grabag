<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan_SPP extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_tahun_ajaran');
		$this->load->model('M_SPP');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataTahunAjaran'] = $this->M_tahun_ajaran->select_all();

		$data['tahun_ajaran_default'] = $this->session->userdata('tahun_ajaran_default');
		$data['tahun_ajaran'] = $this->M_tahun_ajaran->select_by_tahun($data['tahun_ajaran_default'])->id_tahun;

		$data['page'] 		= "tagihan_spp";
		$data['judul'] 		= "Data Tagihan SPP";
		$data['deskripsi'] 	= "Data Tagihan SPP";
		$this->template->views('tagihan_spp/home', $data);
	}

	public function tampil() {
		$id_tahun = $_POST['id_tahun'];
		$tahun_ajaran= $this->M_tahun_ajaran->select_by_id($id_tahun);
		$tahun = explode("/", $tahun_ajaran->tahun);
		if($tahun[0]==date('Y')){
			$id_bulan_batas = 7;
		}
		else if($tahun[1]==date('Y')){
			$id_bulan_batas = 1;
		}
		else{
			$id_bulan_batas = 999;
		}
		$id_bulan_sekarang =date('m');
		$data['dataTagihan_SPP'] = $this->M_SPP->select_tagihan($id_tahun,$id_bulan_sekarang,$id_bulan_batas);
		$this->load->view('tagihan_spp/list_data', $data);
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
		$data['tahun']= $this->M_tahun_ajaran->select_all();
		$data['bulan']=$this->M_SPP->select_all_bulan();

		$this->session->set_userdata('NIS_siswa_spp', $data['dataRekap_SPP']->NIS);
		$this->session->set_userdata('no_transaksi_siswa_spp', $no_transaksi);

		$this->template->views('spp/form_update_pembayaran', $data);
	}

	public function prosesUpdate($no_transaksi) {

		$data 	= $this->input->post();
			$result = $this->M_SPP->update($data);

			if ($result > 0) {
				$this->session->set_flashdata('msg', show_succ_msg('Data Pembayaran Sudah Tersimpan, Silahkan Cek Rekapitulasi'));
				redirect('Rekap_SPP');
			} else {
				$this->session->set_flashdata('msg', show_err_msg('Data Pembayaran Belum Terbayar'));
				redirect('Rekap_SPP');
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

	public function detail() {
		$data['userdata'] 	= $this->userdata;
		$tahun_ajaran=$this->session->userdata('tahun_ajaran_default');
		$id 				= trim($_POST['no_transaksi']);
		$data['dataRekap_SPP'] = $this->M_SPP->select_by_no_transaksi($id);
		echo show_my_modal('modals/modal_detail_rekap_spp', 'detail-rekap_spp', $data, 'lg');
	}

	public function cetak($no_transaksi)
	{
	// pastikan error reporting mati, atau file pdf akan corrupt
        error_reporting(0);



        // parameter OK
        if(! empty($no_transaksi)){
            // spp
            $spp = $this->M_SPP->select_by_no_transaksi($no_transaksi);
            // $dataCetak=$this->M_SPP->select_by_nis_and_tanggal($spp->NIS,$spp->tanggal_bayar);

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

            $this->pdf->ezText("\nTanda Bukti Pembayaran SPP", 18, array('justification'=> 'centre'));

            $this->pdf->ezSetY(700);
            $this->pdf->ezText("NIS",11,array('justification'=>'left','aleft'=>'70'));

            $this->pdf->ezSetY(700);
            $this->pdf->ezText(":\t".$spp->NIS,11,array('justification'=>'left','aleft'=>'120'));
            
            $this->pdf->ezSetY(700);
            $this->pdf->ezText("Tanggal Bayar",11,array('justification'=>'left','aleft'=>'325'));
            
            $this->pdf->ezSetY(700);
            $this->pdf->ezText(":\t".$tanggal,11,array('justification'=>'left','aleft'=>'425'));
            
            $this->pdf->ezSetY(680);
            $this->pdf->ezText("Nama",11,array('justification'=>'left','aleft'=>'70'));
            
            $this->pdf->ezSetY(680);
            $this->pdf->ezText(":\t".$spp->nama_siswa,11,array('justification'=>'left','aleft'=>'120'));
            
            $this->pdf->ezSetY(660);
            $this->pdf->ezText("Kelas",11,array('justification'=>'left','aleft'=>'70'));

            $this->pdf->ezSetY(660);
            $this->pdf->ezText(":\t".$spp->nama_kelas,11,array('justification'=>'left','aleft'=>'120'));

           

            // spasi judul dengan tabel
            $this->pdf->ezSetDy(-20);

            // jalankan query
            // $query = $this->M_absensi->select_for_laporan($id_kelas, $id_semester, $id_tahun);
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
                'nominal'=>'Nominal',
                'status_pembayaran'=>'Status Pembayaran',
            );

            // buat tabel pdf
            $this->pdf->ezTable($data_laporan, $column_header);

            // 
            $this->pdf->ezSetDy(-25);
            $this->pdf->ezText("Staf Tata Usaha\t",11,array('justification'=>'center','aleft'=>'425'));
            $this->pdf->ezSetDy(-40);
            $this->pdf->ezText("".$spp->nama_pegawai,11,array('justification'=>'center','aleft'=>'425'));
            $this->pdf->ezSetDy(-5);
            $this->pdf->ezText("".$spp->NIP,11,array('justification'=>'center','aleft'=>'425'));

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
	
}

/* End of file kelas.php */
/* Location: ./application/controllers/kelas.php */