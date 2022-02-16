<div class="dMainContent datafield" id="dataProblem" style="padding-top: 40px">
    <div class="fdbox" style="border-left: 8px solid #30475e;">
      <h1>Manage Data Cable Usage</h1>
        <div class="contProblemNav" style="justify-content: flex-end;">
          <div style="margin-right: 10px;">
            <form action="" method="post" name="sortKabel">
              <select name="sortKabel" id="sortProblem" style="margin-top: 0;" class="btnfilter" onChange="sortProblemData()">
                <option value="" disabled selected>Sort By <span class="fa fa-filter"></span></option>
                <option value="shovel" >Shovel (A-Z)</option>
                <option value="type" >Cable Type (A-Z)</option>
                <option value="usage" >Usage (Highest - Lowest)</option>
              </select>
              <input id="load" type="submit" name="load" value="Load Data" style="display: none";>
            </form>
          </div>
          <div>
            <a class='add-button' onClick='showForm()'> <i class='fa fa-plus'></i>Add Cable Usage</a>
          </div>
        </div>
    </div>
    <div class='fdbox fd2' style='padding: 30px; padding-top: 10px;'>
      <h1 style='margin-bottom: 10px;'>Last Updates Cable's</h1>
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Shovel</th>
              <th>Cable Type</th>
              <th>Usage (meter's)</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $batas = 10;
              $halaman = isset($_GET['halaman'])?(int)$_GET['halaman']: 1;
              $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
              $previous = $halaman - 1;
              $next = $halaman + 1;
              $no = 1;
              $data_all = mysqli_query($hostptba, "select * from T_KABEL order by SHOVEL asc ");
              $jumlah_data = mysqli_num_rows($data_all);
              $total_halaman = ceil($jumlah_data / $batas);

              $data = mysqli_query($hostptba, "select * from T_KABEL order by SHOVEL asc limit $halaman_awal, $batas ");

              // Eksekusi Sort Data
              if(isset($_POST['load'] )){
                $sorts = $_POST['sortKabel']; 
                if ($sorts == "shovel"){
                  $data = mysqli_query($hostptba, "select * from T_KABEL order by SHOVEL asc limit $halaman_awal, $batas ");
                } else if ($sorts == "type"){
                  $data = mysqli_query($hostptba, "select * from T_KABEL order by KABEl asc limit $halaman_awal, $batas ");
                } else if ($sorts == "usage"){
                  $data = mysqli_query($hostptba, "select * from T_KABEL order by PANJANG desc limit $halaman_awal, $batas ");
                } else {
                  $data = mysqli_query($hostptba, "select * from T_KABEl limit $halaman_awal, $batas");
                }  
              }

              $nomor = $halaman_awal + 1;
              while ($tabel = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $tabel['SHOVEL'] ?></td>
                    <td><?php echo $tabel['KABEL'] ?></td>
                    <td><?php echo $tabel['PANJANG'] ?></td>
                    <td><a href='../phpcode/updateKabel.php?id=<?php echo $tabel['ID']; ?>'><img title='Edit' class='dataact' src='../assets/edit.svg' ></a>
                    
                    <a href="../phpcode/hapusKabel.php?id=<?php 
                      echo $tabel['ID'];
                    ?>" > 
                    <img title='Delete' onClick="return confirm('Are you sure delete the data?')" class='dataact' src='../assets/trash.svg'></a>
                    </td>
                  </tr>
                  <?php
              }
            ?>
          </tbody>
        </table>
        <!-- Panel Pages Bar -->
        <div>
          <div class='pageNumber'>
            <li> <a <?php if($halaman > 1){echo "href='?content=kabel&halaman=$previous'";} ?>><i class="fa fa-angle-left" style="margin: 0"> </i></a></li>
            <?php 
              for ($x=1; $x <= $total_halaman; $x++){
                ?>
                  <li><a href = "?content=kabel&halaman=<?php echo $x ?>"><?php echo $x?></a></li>
                <?php
              }
            ?>
            <li><a <?php if ($halaman < $total_halaman){ echo "href='?content=kabel&halaman=$next'"; }?>><i class="fa fa-angle-right" style="margin: 0"></i></a></li>
          </div>
        </div>
    </div>
</div>
<!-- Input Data Problem -->
<div class='outer-box addunit' id='outer'>
  <div class='form-input'>
    <form method='post'>
      <h2 class='title' style='margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid rgba(67, 96, 106, 0.20);'>Input Data Cable Usage </h2> 
      <?php
      if(isset($_POST['simpan_kabel'])){
        $shovel = $_POST['SHOVEL'];
        $kabel = $_POST['KABEL'];
        $panjang = $_POST['PANJANG'];
        
        // kirim data ke database
        $simpan_kabel = mysqli_query($hostptba, "insert into T_KABEL value(
          NULL, '$shovel', '$kabel', '$panjang')");
        if($simpan_kabel){
            echo "
            <div class='notifInput'>
              <p>Data berhasil disimpan.</p>
            </div>
            ";
        } else {
            echo "
            <div class='notifInput failed'>
              <p>Data gagal disimpan, silahkan periksa kembali!</p>
            </div>
            ";
        }
        echo '<script>document.getElementById("outer").style.display = "block"</script>';
      }
      ?>
      <div class='flex' style='gap: 10px; flex-direction:column;'>
        <div>
          <p><label for='shovel'>Unit Name </label></p>
          <select name="SHOVEL" id="shovel">
            <option value="" disabled selected>-- Select Unit --</option>
            <option value="SE-3001">SE-3001</option>
            <option value="SE-3002">SE-3002</option>
            <option value="SE-3003">SE-3003</option>
            <option value="SE-3004">SE-3004</option>
            <option value="SE-3005">SE-3005</option>
            <option value="SE-3006">SE-3006</option>
            <option value="SE-3007">SE-3007</option>
          </select>
        </div>
        <div>
          <p><label for="cable">Cable Type</label></p>
          <select name="KABEL" id="cable">
            <option value="" disabled selected>-- Select Cable --</option>
            <option value="Kabel 3 x 35mm2">Kabel 3 x 35mm2</option>
            <option value="Kabel 3 x 50mm2">Kabel 3 x 50mm2</option>
            <option value="Kabel 3 x 70mm2">Kabel 3 x 70mm2</option>
            <option value="Kabel 3 x 95mm2">Kabel 3 x 95mm2</option>
          </select>
        </div>
        <div>
          <p><label for='usage'>Usage (in meter's)</label></p>
          <input type="text" id='usage' name='PANJANG'>
        </div>
        <div>
          <input type='submit' class='submit' value='Submit' name='simpan_kabel'>
        </div>
      </div>
     
    </form>
    <a style='display: block; text-align: center' class='cancel' onClick='hideForm()' href='#'>Cancel</a>
  </div>
</div>

