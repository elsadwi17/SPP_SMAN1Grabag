<script>
      function show_password(){
        var password = document.getElementById('password');
        if (password.type === "password") {
          password.type = "text"
        }
        else{
          password.type = "password";
        }
      }
</script> 
<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Pegawai</h3>

  <form id="form-tambah-pegawai" method="POST">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="NIP" name="NIP" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>  
      <input type="text" class="form-control" placeholder="Nama Pegawai" name="nama_pegawai" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Alamat" name="alamat" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Email" name="email" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="password" class="form-control" placeholder="Password" name="password" id="password" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <input type="checkbox" onclick="show_password()"> Tampilkan Password
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <select class="form-control" name="status" aria-describedby="sizing-addon2">
        <option value="Aktif" selected>Aktif</option>
        <option value="Pindah" selected>Pindah</option>
        <option value="Cuti" selected>Cuti</option>
        <option value="Keluar" selected>Keluar</option>
        <option value="Pensiun">Pensiun</option>
      </select>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>  
      <input type="file" class="form-control" placeholder="Foto" name="foto" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>  
      <select name="id_jabatan" class="form-control select2" aria-describedby="sizing-addon2">
        <?php
        foreach ($dataJabatan as $jabatan) {
          ?>
          <option value="<?php echo $jabatan->id_jabatan; ?>">
            <?php echo $jabatan->nama_jabatan; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>