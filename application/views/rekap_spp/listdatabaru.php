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
                    
                    foreach ($dataKelas as $kls) { ?>
                        <option value="<?php echo $kls->id_kelas ?>" <?php if($kelas==$kls->id_kelas) echo "selected";?>><?php echo $kls->nama_kelas?></option>
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

      <tbody id="data-Rekap_SPPkj">
      <?php
  $no = 1;
  foreach ($dataRekap_SPP as $spp) {
    // $year = $spp->tanggal_bayar[0].$spp->tanggal_bayar[1].$spp->tanggal_bayar[2].$spp->tanggal_bayar[3];
    // $month = $spp->tanggal_bayar[5].$spp->tanggal_bayar[6];
    // $day = $spp->tanggal_bayar[8].$spp->tanggal_bayar[9];
    // $tanggal = tanggal($day, $month, $year);
?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $spp->NIS; ?></td> 
      <td><?php echo $spp->nama_siswa; ?></td>

      <td class="text-center" style="min-width:230px;">
          <a href="<?php echo base_url('Rekap_SPP/detail/'.$spp->NIS.'_'.$tahun_ajaran)?>">
          <button class="btn btn-info" ><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
        </a>
      </td>
    </tr>
    <?php
    $no++;

  }
?>
      </tbody>
    </table>
  </div>
</div>


<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataRekap_SPP', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
