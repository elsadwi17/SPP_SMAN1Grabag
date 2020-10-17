<script type="text/javascript">
  function cetak() {
    var button = document.getElementById('cetak_tagihan');
    var tahun_ajaran = document.getElementById('tahun_filter_tagihan');

    
  } 

  function updateNominal_Tahun() {
    var nominal = document.getElementById('nominal');

    nominal.setAttribute('value', 0);
  } 
</script>
<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <!-- <div class="box-header">
    <?php if($this->userdata->nama_jabatan == 'Staff Tata Usaha'){?>
    <div class="col-md-6">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-spp"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-spp"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div>
    <?php }?>
    <div class="col-md-3">
        <a href="<?php echo base_url('Rekapitulasi/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
  </div> -->
  <!-- /.box-header -->

  <div class="box-header">
    <div class="col-md-4">
     <form id="filter-kelas" method="POST">
    <table>
      <tr>
        <td width="100">Tahun Ajaran</td>
        <td></td>
        <td width="200">
          <div >
              <select id="tahun_filter_tagihan" class="form-control btn btn-default" data-toggle="modal" name="tahun_ajaran" onchange="cetak()">
                <?php
                    foreach ($dataTahunAjaran as $ta) { ?>
                        <option value="<?php echo $ta->id_tahun ?>" <?php if($tahun_ajaran==$ta->id_tahun) echo "selected";?>><?php echo $ta->tahun?></option>
                <?php } ?>
              </select>
          </div>
        </td>
        <!-- <td width="100" style="padding-left: 500px;">
          
        </td> -->
    
      </tr>
    </table>    
  </form>
  </div>
<!--   <div class="col-md-3">
    <a id="cetak_tagihan" href="<?php echo base_url('Tagihan_SPP/cetak/'.$this->session->userdata('tahun_ajaran'))?>">
            <button style="width: 300px" type="submit" class="form-control btn btn-success" name="cetak" value=""><i class="glyphicon glyphicon-print"></i> Cetak </button>
          </a>
  </div>  -->
  </div>

  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>NIS</th>
          <th>Nama Siswa</th>
          <th>Kelas</th>
          <th>Bulan</th>
          <th>Status</th>
          <!-- <th style="text-align: center;">Aksi</th> -->
        </tr>
      </thead>

      <tbody id="data-Tagihan_SPP">
      
      </tbody>
    </table>
  </div>
</div>

<!-- <?php echo $modal_tambah_kelas; ?> -->

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataRekap_SPP', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  // $data['judul'] = 'kelas';
  // $data['url'] = 'Kelas/import';
  // echo show_my_modal('modals/modal_import', 'import-kelas', $data);

  // if (isset($_POST["submit"])){  
    // echo trim($_POST["tahun_ajaran"]);
    // $this->session->set_userdata('tahun_ajaran', trim($_POST["tahun_ajaran"]));

  // }
?> 