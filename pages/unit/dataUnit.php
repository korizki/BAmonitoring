<div class="dMainContent datafield" id="dataProblem" style="padding-top: 40px">
    <div class="fdbox" style="border-left: 8px solid #30475e;">
      <h1>Manage Data Unit</h1>
        <div class="contProblemNav">
          <div>
            Search Unit  <input type="text" name="fieldcari" id="cari" class="searchInput"><a href="#" class="searchbtn"><i class="fa fa-search" style="margin-left: 6px"></i></a>
          </div>
          <div>
            <a href="#" class='searchbtn' style="padding: 10px 15px;" onClick="showFilterMenu()"> Filter By <i class="fa fa-filter"></i></a>
            <div class="filterMenu">
              <ul>
                <li><a href="#">Unit Name</a></li>
                <li><a href="#">Location</a></li>
                <li><a href="#">Condition</a></li>
                <li><a href="#">Lane</a></li>
              </ul>
            </div>
          </div>
          <div>
            <a class='add-button' onClick='showForm()'> <i class='fa fa-plus'></i>Add Unit</a>
          </div>
        </div>
    </div>
    <div class='fdbox fd2' style='padding: 30px; padding-top: 10px;'>
      <h1 style='margin-bottom: 10px;'>Last Updates Unit </h1>
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Unit Name</th>
              <th>Location</th>
              <th>Condition</th>
              <th>Lane</th>
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
              $data_all = mysqli_query($hostptba, "select * from T_UNIT order by NAMA_UNIT asc ");
              $jumlah_data = mysqli_num_rows($data_all);
              $total_halaman = ceil($jumlah_data / $batas);

              $data = mysqli_query($hostptba, "select * from T_UNIT order by NAMA_UNIT asc limit $halaman_awal, $batas ");
              $nomor = $halaman_awal + 1;

              while ($tabel = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $tabel['NAMA_UNIT'] ?></td>
                    <td><?php echo $tabel['LOKASI'] ?></td>
                    <td><?php echo $tabel['KONDISI'] ?></td>
                    <td><?php echo $tabel['JALUR'] ?></td>
                    <td><a href='../phpcode/updateUnit.php?id=<?php echo $tabel['ID']; ?>'><img title='Edit' class='dataact' src='../assets/edit.svg' ></a>
                    
                    <a href="../phpcode/hapusUnit.php?id=<?php 
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
            <li> <a <?php if($halaman > 1){echo "href='?content=unit&halaman=$previous'";} ?>><i class="fa fa-angle-left" style="margin: 0"> </i></a></li>
            <?php 
              for ($x=1; $x <= $total_halaman; $x++){
                ?>
                  <li><a href = "?content=unit&halaman=<?php echo $x ?>"><?php echo $x?></a></li>
                <?php
              }
            ?>
            <li><a <?php if ($halaman < $total_halaman){ echo "href='?content=unit&halaman=$next'"; }?>><i class="fa fa-angle-right" style="margin: 0"></i></a></li>
          </div>
        </div>
    </div>
</div>
<!-- Input Data Problem -->
<div class='outer-box addunit' id='outer'>
  <div class='form-input'>
    <form method='post'>
      <h2 class='title' style='margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid rgba(67, 96, 106, 0.20);'>Input Data Unit </h2> 
      <?php
      if(isset($_POST['simpan_unit'])){
        $nama_unit = $_POST['NAMA_UNIT'];
        $lokasi_unit = $_POST['LOKASI'];
        $kondisi = $_POST['KONDISI'];
        $jalur = $_POST['JALUR'];
        
        // kirim data ke database
        $simpan_unit = mysqli_query($hostptba, "insert into T_UNIT value(
          NULL, '$nama_unit', '$lokasi_unit', '$kondisi', '$jalur')");
        if($simpan_unit){
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
          <p><label for='unit_name'>Unit Name (Ex. CRU 01)</label></p>
          <input type="text" id='unit_name' name='NAMA_UNIT'>
        </div>
        <div>
          <p><label for="location">Location</label></p>
          <select name="LOKASI" id="location">
            <option value="" disabled selected>-- Select Location --</option>
            <option value="PIT 2, Banko Barat">PIT 2, Banko Barat</option>
            <option value="PIT 2 Jalan, Banko Barat">PIT 2 Jalan, Banko Barat</option>
            <option value="PIT 2 Front, Banko Barat">PIT 2 Front, Banko Barat</option>
            <option value="PIT 3, Banko Barat">PIT 3, Banko Barat</option>
            <option value="PIT 3 Jalan, Banko Barat">PIT 3 Jalan, Banko Barat</option>
            <option value="PIT 3 Front, Banko Barat">PIT 3 Front, Banko Barat</option>
            <option value="PIT 3 Utara, Banko Barat">PIT 3 Utara, Banko Barat</option>
            <option value="PIT 3 Selatan, Banko Barat">PIT 3 Selatan, Banko Barat</option>
          </select>
        </div>
        <div>
          <p><label for="condition">Condition</label></p>
          <select name="KONDISI" id="condition">
            <option value="" disabled selected>-- Unit Condition --</option>
            <option value="Ready">Ready</option>
            <option value="Breakdown">Breakdown</option>
            <option value="Standby">Standby</option>
          </select>
        </div>
        <div>
          <p><label for='lane'>Lane </label></p>
          <input type="text" id='lane' name='JALUR'>
        </div>
        <div>
          <input type='submit' class='submit' value='Submit' name='simpan_unit'>
        </div>
      </div>
     
    </form>
    <a style='display: block; text-align: center' class='cancel' onClick='hideForm()' href='#'>Cancel</a>
  </div>
</div>

