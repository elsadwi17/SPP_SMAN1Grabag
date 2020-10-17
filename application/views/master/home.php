<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <?php if($this->userdata->id_jabatan == 1 || $this->userdata->id_jabatan == 4){?>
      <div class="col-md-3">
      </div>
    <div class="col-md-6">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-master"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
   <!--  <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-master"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div> -->
  <?php }?>
    <!-- <div class="col-md-3">
        <a href="<?php echo base_url('Master/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div> -->
    
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th >Biaya</th>
          <th >Nominal</th>
          <th>Tahun Masuk</th>
          <?php if($this->userdata->id_jabatan == 1 || $this->userdata->id_jabatan == 4){?>
          <th style="text-align: center;">Aksi</th><?php } ?>
        </tr>
      </thead>
      <tbody id="data-master">
      
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_master; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataMaster', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Master';
  $data['url'] = 'Master/import';
  echo show_my_modal('modals/modal_import', 'import-master', $data);
?>