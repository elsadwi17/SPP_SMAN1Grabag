<?php
  $no = 1;
  foreach ($dataSiswa as $siswa) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $siswa->NIS; ?></td>
      <td><?php echo $siswa->nama_siswa; ?></td>
      <!-- <td><?php echo $siswa->jenis_kelamin; ?></td>
      <td><?php echo $siswa->TTL; ?></td> -->
      <!-- <td><?php echo $siswa->status_siswa; ?></td> -->
      <td class="text-center" style="min-width:300px;">
        <?php if($this->userdata->id_jabatan == 4){?>
        <!-- NIS disini digunakan untuk mengisi inputan pada fungsi tambah(bayar) di SPP.php -->
        <a href="<?php echo base_url('SPP/tambah/'.$siswa->NIS)?>">
        <button class="btn btn-success update-dataSiswa" data-id="<?php echo $siswa->NIS; ?>"><i class="glyphicon glyphicon-usd"></i> Bayar SPP</button></a>
      <?php } 
      else{
        ?>
        <button class="btn btn-success update-dataSiswa" data-id="<?php echo $siswa->NIS; ?>" disabled><i class="glyphicon glyphicon-usd"></i> Bayar SPP</button>
        <?php
      }?>
      </td>
    </tr>
    <?php
    $no++;
  }
?>