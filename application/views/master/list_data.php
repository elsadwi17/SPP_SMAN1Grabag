<?php
  $no = 1;
  foreach ($dataMaster as $master) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $master->jenis_biaya; ?></td>
      <td><?php echo $master->nominal; ?></td>
      <td><?php echo $master->tahun_masuk; ?></td>
      <?php if($this->userdata->id_jabatan == 1 || $this->userdata->id_jabatan == 4){?>
      <td class="text-center" style="min-width:230px;">
          
          <button class="btn btn-warning update-dataMaster" data-id="<?php echo $master->id_biaya; ?>"><i class="glyphicon glyphicon-repeat"></i> Ubah</button>
          <button class="btn btn-danger konfirmasiHapus-master" data-id="<?php echo $master->id_biaya; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
        
  <!--         <button class="btn btn-info detail-dataMaster" data-id="<?php echo $master->id_biaya; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button> -->
      </td><?php }?>
    </tr>
    <?php
    $no++;
  }
?>