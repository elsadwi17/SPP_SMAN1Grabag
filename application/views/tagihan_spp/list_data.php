<?php
  $no = 1;
  foreach ($dataTagihan_SPP as $spp) {
    // $year = $spp->tanggal_bayar[0].$spp->tanggal_bayar[1].$spp->tanggal_bayar[2].$spp->tanggal_bayar[3];
    // $month = $spp->tanggal_bayar[5].$spp->tanggal_bayar[6];
    // $day = $spp->tanggal_bayar[8].$spp->tanggal_bayar[9];
    // $tanggal = tanggal($day, $month, $year);
?>
    <tr>
      <td ><?php echo $no; ?></td>
      <!-- <td><?php echo $spp->no_transaksi; ?></td> -->
      <td style="min-width: 50%"><?php echo $spp->NIS; ?></td>
      <td><?php echo $spp->nama_siswa; ?></td>
      <td><?php echo $spp->nama_kelas; ?></td>
      <td><?php echo $spp->nama_bulan?></td>
      <td>Belum Lunas</td>
    </tr>
    <?php
    $no++;

  }
?>