<div class="box-header">
  <div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
    <div class="form-msg">
      <div class="msg" style="display:none;">
        <?php echo $this->session->flashdata('msg'); ?>
      </div>
    </div>

    <h3 style="display:block; text-align:center;">Tambah Data Detail Beasiswa <?= $dataBeasiswa->nama_beasiswa;?>
    </h3>

    <form id="form_tambah_detail_beasiswa" method="POST" action="<?php echo base_url('Beasiswa/prosesTambahDetail/'.$id_beasiswa)?>">
      
      <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-pushpin"></i>
        </span>
        <select id="filter_beasiswa_kelas" class="form-control" data-toggle="modal" name="kelas" aria-describedby="sizing-addon2">
          <?php
          foreach ($dataKelas as $kelas) {
            ?>
            <option value="<?php echo $kelas->id_kelas; ?>">
              <?php echo $kelas->nama_kelas; ?>
            </option>
            <?php
          }
          ?>
        </select>
      </div>
      
      <div class="input-group form-group">
        <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-briefcase"></i>
        </span>  
        <select id= "filter_beasiswa_nama_siswa" name="nama_siswa" data-toggle="modal" class="form-control select2" aria-describedby="sizing-addon2">
          <?php
          foreach ($dataSiswa as $siswa) {
            ?>
            <option value="<?php echo $siswa->NIS; ?>">
              <?php echo $siswa->nama_siswa; ?> 
            </option>
            <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <div class="col-md-12">
          
            <button type="submit" class="form-control btn btn-success"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button> 
                     
        </div>
      </div>
    </form>
    <br><br>
    <div class="col-md-12">
      <a href="<?php echo base_url('Beasiswa/detail/'.$id_beasiswa)?>">
        <button class="form-control btn btn-primary"> <i class="glyphicon glyphicon-remove"></i> Batalkan</button>  
      </a>
    </div>
  </div>
</div>