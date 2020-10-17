 <?php
        $no=1; 
          foreach ($dataRekap_SPP as $spp) {
        ?>
        <tr>
          <td> <?php echo $no;?></td>
          <td> <?php echo $spp->nama_bulan;?></td>
          <?php 
              $year = $spp->tanggal_bayar[0].$spp->tanggal_bayar[1].$spp->tanggal_bayar[2].$spp->tanggal_bayar[3];
              $month = $spp->tanggal_bayar[5].$spp->tanggal_bayar[6];
              $day = $spp->tanggal_bayar[8].$spp->tanggal_bayar[9];
              $tanggal = tanggal($day, $month, $year);
          ?>
          <td> <?php echo $tanggal;?></td>
          <td> <?php echo $spp->total_bayar;?></td>
          <td> <?php 
                  if ($spp->keterangan == '') {
                    echo "-";
                  }
                  else{
                    echo $spp->keterangan;      
                  }
              ?>
          </td>
          <td> <?php echo $spp->status_pembayaran;?></td>
          <td style="text-align: center;">
            <?php if($this->userdata->nama_jabatan == 'Staf Tata Usaha'){?>
            <button class="btn btn-danger konfirmasiHapus-rekap_spp" data-id="<?php echo $spp->no_transaksi; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
            <a href="<?php echo base_url('Rekap_SPP/update/'.$spp->no_transaksi);?>">
              <button class="btn btn-warning"><i class="glyphicon glyphicon-repeat"></i> Ubah</button>
            </a>
            <a href="<?php echo base_url('Rekap_SPP/cetak/'.$spp->no_transaksi);?>" target="_blank">
              <button class="btn btn-success" ><i class="glyphicon glyphicon-print"></i> Cetak</button >
            </a>
            <?php }?>
          </td>
        </tr>

        <?php
          $no++;
        }
         ?>