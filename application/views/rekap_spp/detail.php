<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  
  <div class="col-md-1" style="padding-top: 15px">
    <a href="<?php echo base_url('Rekap_SPP')?>"><button style="width: 100px;" type="button" class="btn btn-danger col-md-0"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</button></a>
  </div>
  <h3 style="display:block; text-align:center;"><i class="fa fa-briefcase"></i> Detail Rekap SPP<br><br><b></b></h3>

  <div class="box box-body">
      <table id="tabel-detail" class="table table-bordered table-striped">
              <tr>
                <td colspan="4" style="text-align: center; "> <img src="<?php echo base_url();?>assets/img/<?php echo $dataSiswa->foto ?>" style="max-width: 200px; max-height: 160px"> 
                </td>
              </tr>
              <tr>
                <td>NIS</td>
                <td style="min-width:230px;"><input type="text" class="form-control" value="<?php echo $dataSiswa->NIS; ?>"disabled></td>
                <td>Nama Siswa</td>
                <td style="min-width:230px;"><input type="text" class="form-control" value="<?php echo $dataSiswa->nama_siswa; ?>"disabled></td>
              </tr>
              <tr>
                <td>Kelas</td>
                <td style="min-width:230px;"><input type="text" class="form-control" value="<?php echo $dataSiswa->nama_kelas; ?>"disabled></td>
                <td>Tahun Ajaran</td>
                <td style="min-width:230px;"><input type="text" class="form-control" value="<?php echo $dataSiswa->tahun; ?>"disabled></td>
              </tr>
      </table>

    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Bulan yang Dibayar</th>
          <th>Tanggal Bayar</th>
          <th>Total Bayar</th>
          <th>Keterangan</th>
          <th>Status Pembayaran</th>
        <?php if($this->userdata->nama_jabatan == 'Staf Tata Usaha'){?>
          <th style="text-align: center; min-width: 230px;">Aksi</th>
        <?php }?>
        </tr>
      </thead>

      <tbody id="data-detail-Rekap-SPP">
       
      </tbody>
    </table>
  </div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataRekap_SPP', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
</div>