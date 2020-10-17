<?php
  $no = 1;
  foreach ($dataDetailBeasiswa as $beasiswa) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $beasiswa->NIS; ?></td>
      <td><?php echo $beasiswa->nama_siswa; ?></td>
      <td><?php echo $beasiswa->nama_kelas; ?></td>
      <td class="text-center" style="min-width:230px;">
          <?php if($this->userdata->nama_jabatan == 'Admin' || $this->userdata->nama_jabatan == 'Staf Tata Usaha'){?>
          <button class="btn btn-danger konfirmasiHapus-detail-beasiswa" data-id="<?php echo $beasiswa->NIS; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
        <?php } ?>
      </td>
    </tr>
    <?php
    $no++;
  }
?>