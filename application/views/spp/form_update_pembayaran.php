<script type="text/javascript">
  function updateNominal() {
    var biaya = "<?php echo $dataRekap_SPP->total_bayar; ?>";
    // var count = $("#form_update_pembayaran input[name='bulan[]']:checked").length;
    var nominal = document.getElementById('nominal_spp');

    nominal.setAttribute('value', biaya);
  } 

  function updateNominal_Tahun() {
    var nominal = document.getElementById('nominal_spp');

    nominal.setAttribute('value', 0);
  } 

</script>

<?php 
    $year = $dataRekap_SPP->tanggal_bayar[0].$dataRekap_SPP->tanggal_bayar[1].$dataRekap_SPP->tanggal_bayar[2].$dataRekap_SPP->tanggal_bayar[3];
    $month = $dataRekap_SPP->tanggal_bayar[5].$dataRekap_SPP->tanggal_bayar[6];
    $day = $dataRekap_SPP->tanggal_bayar[8].$dataRekap_SPP->tanggal_bayar[9];
    $tanggal = tanggal($day, $month, $year);
?>
<div class="box-header">
<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg">
    <div class="msg" style="display:none;">
        <?php echo $this->session->flashdata('msg'); ?>
      </div>
  </div>
  <h3 style="display:block; text-align:center;">Ubah Data Pembayaran SPP</h3>

  <form id="form_update_pembayaran" method="POST" action="<?php echo base_url('Rekap_SPP/prosesUpdate/'.$dataRekap_SPP->no_transaksi)?>">
    <table class="table table-bordered">
      <input type="hidden" name="no_transaksi" value="<?php echo $dataRekap_SPP->no_transaksi ?>">
      <tr>
        <td colspan="3"style="text-align: right;"> Tanggal Bayar</td>
        <td>
            <input type="text" class="form-control" placeholder="Tanggal Bayar" name="tanggal_bayar" aria-describedby="sizing-addon2" value="<?php echo $tanggal?>" disabled>
        </td>
      </tr>
      <tr>
        <td> Nama Siswa </td>
        <td>
            <input type="text" class="form-control" placeholder="Nama Siswa" name="nama_siswa" aria-describedby="sizing-addon2" value="<?php echo $dataRekap_SPP->nama_siswa?>" disabled>
        </td>
        <td> Nomor Induk</td>
        <td>
            <input type="text" class="form-control" placeholder="NIS" name="NIS" aria-describedby="sizing-addon2" value="<?php echo $dataRekap_SPP->NIS ?>" disabled>
        </td>
      </tr>
      <tr>
        <td> Kelas </td>
        <td>
            <input type="text" class="form-control" placeholder="Kelas" name="kelas" aria-describedby="sizing-addon2" value="<?php echo $dataRekap_SPP->nama_kelas?>" disabled>
        </td>
        <td> Tahun Ajaran </td>
        <td>
            <select id="filter-update-spp" type="text" class="form-control" placeholder="Tahun Ajaran" name="id_tahun" aria-describedby="sizing-addon2" onchange="updateNominal_Tahun()">
              <?php foreach ($tahun as $ta) {?>
              <option value = "<?php echo $ta->id_tahun ?>" <?php if ($ta->id_tahun==$dataRekap_SPP->id_tahun)echo "selected"?>> <?php echo $ta->tahun; ?>
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
      <tr>
        <td> Bulan yang Dibayar </td>
        <td id="bulan-update-spp">
          <!--  -->
        </td>
      </tr>
      <tr>
        <td> Nominal Asli </td>
        <td colspan = 3>
            <input id="nominal_spp" type="number" class="form-control" placeholder="0" name="nominal_spp" aria-describedby="sizing-addon2" disabled value="<?php  echo $dataRekap_SPP->nominal_spp; ?>">
        </td>
      </tr>
      <tr>
        <td> Jenis Biaya</td>
        <td colspan = 3>
            <input id="jenis" type="text" class="form-control" placeholder="-" name="jenis" aria-describedby="sizing-addon2" disabled value="<?php echo "SPP ".$siswa->tahun_masuk;?>">
        </td>
      </tr>
      <tr>
        <td> Jumlah yang Dibayarkan </td>
        <td colspan = 3>
            <input id="nominal_spp" type="number" class="form-control" placeholder="0" name="nominal" aria-describedby="sizing-addon2" value="<?php echo $dataRekap_SPP->total_bayar ?>" disabled>
        </td>
      </tr>
    </table>
   
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-success"> <i class="glyphicon glyphicon-ok"></i> Simpan </button>
      </div>
    </div>
  </form>
    <br><br>
    <div class="col-md-12">
      <a href="<?php echo base_url('Rekap_SPP/detail/'.$dataRekap_SPP->NIS.'_'.$dataRekap_SPP->id_tahun)?>">
        <button class="form-control btn btn-primary"> <i class="glyphicon glyphicon-remove"></i> Batalkan</button>  
      </a>
    </div>
</div>
</div>