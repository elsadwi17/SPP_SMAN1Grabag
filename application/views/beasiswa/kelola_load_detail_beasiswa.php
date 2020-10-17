<?php
  foreach ($dataSiswa as $siswa) { ?>
        <option value="<?php echo $siswa->NIS?>" >
          <?php echo $siswa->nama_siswa?>
        </option>
<?php } ?>