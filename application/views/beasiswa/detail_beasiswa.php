<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-3">
      <a href="<?php echo base_url('Beasiswa')?>"><button style="width: 100px;" type="button" class="btn btn-danger col-md-0"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</button></a>
    </div>

    <?php if($this->userdata->nama_jabatan == 'Admin' || $this->userdata->nama_jabatan == 'Staf Tata Usaha'){?>
      
    <div class="col-md-6">
      <a href="<?php echo base_url('Beasiswa/tambah_siswa/'.$id_beasiswa)?>">
        <button class="form-control btn btn-primary">
          <i class="glyphicon glyphicon-plus-sign">
            </i> Tambah Data</button>
          </a>
    </div>

   <!--  <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-mapel"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div> -->
  <?php } ?>

  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <h3 style="text-align: center;">List Data Siswa Penerima Beasiswa <?php echo $dataBeasiswa->nama_beasiswa?></h3>
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>NIS</th>
          <th>Nama Siswa</th>
           <th>Kelas</th>

          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-detail-beasiswa">

      
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_detail_beasiswa; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataDetailBeasiswa', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'beasiswa';
  $data['url'] = 'Beasiswa/import';
  echo show_my_modal('modals/modal_import', 'import-beasiswa', $data);
?>