<?php
  $no = 1;
  foreach ($dataBeasiswa as $beasiswa) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $beasiswa->nama_beasiswa; ?></td>
      <td><?php echo $beasiswa->nominal_beasiswa; ?></td>
      <td class="text-center" style="min-width:300px;">
          <?php if($this->userdata->nama_jabatan == 'Admin' || $this->userdata->nama_jabatan == 'Staf Tata Usaha' ){?>
          <button class="btn btn-warning update-dataBeasiswa" data-id="<?php echo $beasiswa->id_beasiswa; ?>"><i class="glyphicon glyphicon-repeat"></i> Ubah</button>
          <button class="btn btn-danger konfirmasiHapus-beasiswa" data-id="<?php echo $beasiswa->id_beasiswa; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
        <?php } ?>
        <a href="<?php echo base_url('beasiswa/detail/'.$beasiswa->id_beasiswa)?>">
          <button class="btn btn-info" data-id="<?php echo $beasiswa->id_beasiswa; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
        </a>
      </td>
    </tr>
    <?php
    $no++;
  }
?>