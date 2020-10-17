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
     <form id="filter-kelas" method="POST" action="<?php echo base_url('Rekap_SPP/tampil_Rekap')?>">
    <table>
      <tr>
        <td width="100">Tahun Ajaran</td>
        <td></td>
        <td width="200">
          <div >
              <select id="tahun_filter_rekap_spp" class="form-control btn btn-default" data-toggle="modal" name="tahun_ajaran">
                <?php
                    //masih ngebug di option sessionnya
                    foreach ($dataTahunAjaran as $ta) { ?>
                        <option value="<?php echo $ta->id_tahun ?>" <?php if($tahun_ajaran==$ta->id_tahun) echo "selected";?>><?php echo $ta->tahun?></option>
                <?php } ?>
              </select>
          </div>
        </td>
      </tr>
      <tr><td><br></td></tr>

       <tr>
        <td width="100">Kelas</td>
        <td></td>
        <td width="200">
          <div >
              <select id="kelas_filter_rekap_spp" class="form-control btn btn-default" data-toggle="modal" name="kelas">
                <?php
                    //masih ngebug di option sessionnya
                  if($dataKelas)
                    foreach ($dataKelas as $kelas) { ?>
                        <option value="<?php echo $kelas->id_kelas ?>" <?php if($kelas==$kelas->id_kelas) echo "selected";?>><?php echo $kelas->nama_kelas?></option>
                <?php } ?>
              </select>
          </div>
        </td>
        <td width="50" style="padding-left: 10px">
          <button type="submit" class="form-control btn btn-primary " name="submit" value="Submit"><i class="glyphicon glyphicon-search"></i> Lihat Data</button>
        </td> 
    
      </tr>
    </table>    
  </form> 
  </div>

  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>NIS</th>
          <th>Nama Siswa</th>
          <!-- <th>Tanggal Bayar</th>
          <th>Bulan</th>
          <th>Nominal</th>
          <th>Status</th> -->
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>

      <tbody id="data-Rekap_SPP">
      
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