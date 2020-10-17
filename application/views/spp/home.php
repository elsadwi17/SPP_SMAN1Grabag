<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/table-panjang.css">
<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
<div class="box-header"></div>
    
  <!-- /.box-header -->
  <div class="box-body">
    <form method="POST">
                <div class="col-md-1 " > Kelas </div>
                <div class="col-md-3 " >
                    <select id="filter-kelas-spp" class="form-control btn btn-default" data-toggle="modal" name="kelas">
                      <?php
                          foreach ($dataKelas as $kelas) { ?>
                                <option value="<?php echo $kelas->id_kelas ?>"  >
                                  <?php echo $kelas->nama_kelas?>
                                </option>
                      <?php } ?>
                    </select>
                </div>
                <br>
                <br>
                <br>
       
        </form>
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th width="10px">#</th>
          <th>NIS</th>
          <th>Nama Siswa</th>
<!--           <th>Jenis Kelamin</th>
          <th>Tanggal Lahir</th> -->
          <!-- <th>Status</th> -->
          
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-spp">

      </tbody>
    </table>
  </div>
</div>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataSiswa', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Siswa';
  $data['url'] = 'Siswa/import';
  echo show_my_modal('modals/modal_import', 'import-siswa', $data);
?>