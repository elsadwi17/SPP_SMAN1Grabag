<?php
  $no = 1;
  foreach ($dataRekap_SPP as $spp) {
  
?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $spp->NIS; ?></td> 
      <td><?php echo $spp->nama_siswa; ?></td>
      

      <td class="text-center" style="min-width:230px;">
          
          <a href="<?php echo base_url('Rekap_SPP/detail/'.$spp->NIS.'_'.$tahun_ajaran)?>">
          <button class="btn btn-info" ><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
        </a>
        
      </td>
    </tr>
    <?php
    $no++;

  }
?>