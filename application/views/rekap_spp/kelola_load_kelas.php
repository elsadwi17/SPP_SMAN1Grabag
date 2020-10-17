<?php
  foreach ($dataKelas as $kelas) { ?>
        <option value="<?php echo $kelas->id_kelas ?>" >
          <?php echo $kelas->nama_kelas?>
        </option>
<?php } ?>