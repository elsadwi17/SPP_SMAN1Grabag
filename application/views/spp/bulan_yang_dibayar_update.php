 <select type="text" class="form-control" placeholder="Bulan" name="id_bulan" aria-describedby="sizing-addon2" onchange="updateNominal()">
  <?php 
  if($bulan_yang_sudah_dibayar->num_rows()==0){
    foreach ($semua_bulan as $bul) {?>
      <option value = "<?php echo $bul->id_bulan ?>" <?php if ($bul->id_bulan==$dataRekap_SPP->id_bulan)echo "selected"?>> <?php echo $bul->nama_bulan; ?>
      </option>
  <?php 
    }
  }
  else{
    foreach ($semua_bulan as $bul){
      if(find_bulan($bulan_yang_sudah_dibayar, $bul->id_bulan) == 999){
    ?> 
      <option value = "<?php echo $bul->id_bulan ?>" <?php if ($bul->id_bulan==$dataRekap_SPP->id_bulan && $dataRekap_SPP->id_tahun==$id_tahun)echo "selected"?>> <?php echo $bul->nama_bulan; ?>
      </option>

    <?php
      }
    }
  }
  ?>
</select>