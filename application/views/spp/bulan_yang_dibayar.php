<td> Bulan yang Dibayar </td>
<td>
    <?php 
    if($bulan_yang_sudah_dibayar->num_rows()==0){
      foreach ($semua_bulan as $bul){
        if($bul->id_bulan <= 6){ 
           echo "<input type='checkbox' name='bulan[]' value='".$bul->id_bulan."' onchange='updateNominal(this);'/>".$bul->nama_bulan."<br>";     
        }
     }
    }
    else{
        foreach ($semua_bulan as $bul){
          if($bul->id_bulan <= 6){ 
            if(find_bulan($bulan_yang_sudah_dibayar, $bul->id_bulan) != 999){
              echo "<input type='checkbox' name='bulan[]' value='".$bul->id_bulan."' onchange='updateNominal(this);' disabled/>".$bul->nama_bulan."<br>";        
            }
            else{
              echo "<input type='checkbox' name='bulan[]' value='".$bul->id_bulan."' onchange='updateNominal(this);'/>".$bul->nama_bulan."<br>";     
            }
          }
        }
    }
  ?>
</td>
<td>
    <?php 
    if($bulan_yang_sudah_dibayar->num_rows()==0){
      foreach ($semua_bulan as $bul){
        if($bul->id_bulan >= 7){ 
           echo "<input type='checkbox' name='bulan[]' value='".$bul->id_bulan."' onchange='updateNominal(this);'/>".$bul->nama_bulan."<br>";     
        }
     }
    }
    else{
        foreach ($semua_bulan as $bul){
          if($bul->id_bulan >= 7){ 
            if(find_bulan($bulan_yang_sudah_dibayar, $bul->id_bulan) != 999){
              echo "<input type='checkbox' name='bulan[]' value='".$bul->id_bulan."' onchange='updateNominal(this);' disabled/>".$bul->nama_bulan."<br>";        
            }
            else{
              echo "<input type='checkbox' name='bulan[]' value='".$bul->id_bulan."' onchange='updateNominal(this);'/>".$bul->nama_bulan."<br>";     
            }
          }
        }
    }
  ?>
</td>