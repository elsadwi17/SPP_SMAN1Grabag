<script type="text/javascript">
  function updateNominal() {
    var biaya = "<?php echo $spp->nominal; ?>";
    var potongan = "<?php if($beasiswa->num_rows()!= 0)echo $beasiswa->row()->nominal_beasiswa; else echo 0; ?>";
    var count = $("#form_tambah_pembayaran input[name='bulan[]']:checked").length;
    var nominal = document.getElementById('nominal_spp');
    if(parseInt(biaya)>=parseInt(potongan)){
      var jumlah =  parseInt(biaya) - parseInt(potongan);
    }
    else{
      var jumlah = 0;
    }
    nominal.setAttribute('value', jumlah * count);
  } 

  function updateNominal_Tahun() {
    var nominal = document.getElementById('nominal_spp');

    nominal.setAttribute('value', 0);
  } 
</script>

<?php $tanggal = tanggal(date('d'),date('m'),date('Y'))?>
<div class="box-header">
<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg">
    <div class="msg" style="display:none;">
        <?php echo $this->session->flashdata('msg'); ?>
      </div>
  </div>
  <h3 style="display:block; text-align:center;">Pembayaran SPP</h3>

  <form id="form_tambah_pembayaran" method="POST" action="<?php echo base_url('SPP/prosesTambah/'.$siswa->NIS)?>">
    <table class="table table-bordered">
      <tr>
        <td colspan="3"style="text-align: right;"> Tanggal Bayar</td>
        <td>
            <input type="text" class="form-control" placeholder="Tanggal Bayar" name="tanggal_bayar" aria-describedby="sizing-addon2" value="<?php echo $tanggal?>" disabled>
        </td>
      </tr>
      <tr>
        <td> Nama Siswa </td>
        <td>
            <input type="text" class="form-control" placeholder="Nama Siswa" name="nama_siswa" aria-describedby="sizing-addon2" value="<?php echo $siswa->nama_siswa?>" disabled>
        </td>
        <td> Nomor Induk</td>
        <td>
            <input type="text" class="form-control" placeholder="NIS" name="NIS" aria-describedby="sizing-addon2" value="<?php echo $siswa->NIS ?>" disabled>
        </td>
      </tr>
      <tr>
        <td> Kelas </td>
        <td>
            <input type="text" class="form-control" placeholder="Kelas" name="kelas" aria-describedby="sizing-addon2" value="<?php echo $kelas->nama_kelas?>" disabled>
        </td>
        <td> Tahun Ajaran </td>
        <td>
            <select id="filter-bayar-spp" type="text" class="form-control" placeholder="Tahun Ajaran" name="id_tahun" aria-describedby="sizing-addon2" onchange="updateNominal_Tahun()">
              <?php foreach ($tahun as $ta) {?>
              <option value = "<?php echo $ta->id_tahun ?>" <?php if ($ta->id_tahun==$tahun_ajaran)echo "selected"?>> <?php echo $ta->tahun; ?>
              </option>
              <?php }?>
            </select>
        </td>
      </tr>
      <tr>
        <td> Perihal </td>
        <td colspan = 3>
            <input type="text" class="form-control" placeholder="Perihal" name="perihal" aria-describedby="sizing-addon2" value="Pembayaran SPP" disabled>
        </td>
      </tr>
      <tr  id="bulan-yang-dibayar">
        <!--  -->
      </tr>
      <tr>
        <td> Nominal Asli </td>
        <td colspan = 3>
            <input id="nominal" type="number" class="form-control" placeholder="0" name="nominal" aria-describedby="sizing-addon2" disabled value="<?php  echo $spp->nominal; ?>">
        </td>
      </tr>
      <tr>
        <td> Jenis Biaya</td>
        <td colspan = 3>
            <input id="jenis" type="text" class="form-control" placeholder="-" name="jenis" aria-describedby="sizing-addon2" disabled value="<?php echo "SPP ".$spp->tahun_masuk;?>">
        </td>
      </tr>
      <tr>
        <td> Potongan </td>
        <td colspan = 3>
            <input id="potongan" type="number" class="form-control" placeholder="0" name="potongan" aria-describedby="sizing-addon2" disabled value="<?php if($beasiswa->num_rows()!= 0)echo $beasiswa->row()->nominal_beasiswa; else echo "0"; ?>">
        </td>
      </tr>

      <tr>
        <td> Jenis Potongan</td>
        <td colspan = 3>
            <input id="jenis_potongan" type="text" class="form-control" placeholder="-" name="jenis_potongan" aria-describedby="sizing-addon2" disabled value="<?php if($beasiswa->num_rows()!= 0) echo $beasiswa->row()->nama_beasiswa; else echo'-'; ?>">
        </td>
      </tr>
      <tr>
        <td> Jumlah yang Dibayarkan </td>
        <td colspan = 3>
            <input id="nominal_spp" type="number" class="form-control" placeholder="0" name="nominal_spp" aria-describedby="sizing-addon2" disabled>
        </td>
      </tr>
    </table>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-success"> <i class="glyphicon glyphicon-ok"></i> Bayar </button>
      </div>
    </div>
  </form>
    <br><br>
    <div class="col-md-12">
      <a href="<?php echo base_url('SPP')?>">
        <button class="form-control btn btn-primary"> <i class="glyphicon glyphicon-remove"></i> Batalkan</button>  
      </a>
    </div>
</div>
</div>