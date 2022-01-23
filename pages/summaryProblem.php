
<?php
    include '../phpcode/connection.php';
    include '../phpcode/kabel.php';
    $sql = mysqli_query($hostptba, "select * from T_HALANGAN order by START desc");

    $jumlah_total = mysqli_query($hostptba, "select sum(TOTAL) as JUMLAH from T_HALANGAN ");
    $jumlahjam20 = mysqli_query($hostptba, "select sum(TOTAL) as JUMLAH20 from T_HALANGAN where POWER = '20 KV'");
    $jumlahjam6 = mysqli_query($hostptba, "select sum(TOTAL) as JUMLAH6 from T_HALANGAN where POWER = '6 KV'");
    $jumlahunit = mysqli_query($hostptba, "select *  from T_UNIT");

    $data = mysqli_fetch_array($jumlah_total);
    $data20 = mysqli_fetch_array($jumlahjam20);
    $data6 = mysqli_fetch_array($jumlahjam6);
    
    $ketersediaanpower = 720 - $data['JUMLAH'];
    $ketersediaanpowerpersen = 100 - $data['JUMLAH']/720 * 100;
    $halangan20 = $data20['JUMLAH20'];
    $halangan6 = $data6['JUMLAH6'];
    $halangan = $data['JUMLAH'];
    $halanganpersen = $data['JUMLAH']/720 * 100;

    $jumlahHalangan20 = mysqli_query($hostptba, "select * from T_HALANGAN where POWER = '20 KV'");
    $jumlahHalangan6 = mysqli_query($hostptba, "select * from T_HALANGAN where POWER = '6 KV'");
    $jumlahTotal = mysqli_query($hostptba, "select * from T_HALANGAN ");

?>
</body>
<div  class="dMainContent datafield" style="padding-top: 20px" >
  <!-- Summary Data -->
  <div class='fdbox' style='margin-top: 20px; border-left: 8px solid rgb(48, 90, 104);'>
    <h1> Summary</h1>
    <div class='flex' style='justify-content: space-between; padding: 0 5%;' >
      <div class='dbox'>
        <i class="fa fa-3x fa-chart-line" style="margin-top: 15px; margin-right: 15px;"></i>
        <div>
          <p>Total Problem</p>
          <p class='summaryData'><?php echo mysqli_num_rows($jumlahTotal) ?></p>
        </div>
      </div>
      <div class='dbox'>
        <i class="far fa-3x fa-clock" style="margin-top: 15px; margin-right: 15px;"></i>
        <div>
          <p>Duration (Hour's)</p>
          <p class='summaryData'><?php echo number_format($halangan,2) ?></p>
        </div>
      </div>
      <div class='dbox'>
        <i class="fa fa-3x fa-bolt" style="margin-top: 15px; margin-right: 15px;"></i>
        <div>
          <p>Total Unit's</p>
          <p class='summaryData'><?php echo mysqli_num_rows($jumlahunit) ?></p>
        </div>
      </div>
      <div class='dbox'>
        <i class="fa fa-3x fa-ruler-vertical" style="margin-top: 15px; margin-right: 15px;"></i>    
        <div>
          <p>Cable Usage (meters)</p>
          <p class='summaryData'><?php echo number_format($totalall, 0) ?></p>
        </div>
      </div>
    </div>
  </div>
  <div class='fdbox fd2' style='padding: 30px; padding-top: 10px;'>
    <h1 style='margin-bottom: 10px;'>Last Updates Problems 
    <?php
      if (isset($_GET['pesan'])){
        $pesan = $_GET['pesan'];
        if($pesan =='edit'){
          echo "
          <script>
            setTimeout(function(){
              const notif = document.querySelector('.notifact');
              notif.style.top = '-60px';
            },2500)
          </script>
          <span class='notifact ngreen'>Update data berhasil.</span>";
        } else if($pesan == "hapus"){
          echo "
          <script>
            setTimeout(function(){
              const notif = document.querySelector('.notifact');
              notif.style.top = '-60px';
            },2500)
          </script>
          <span class='notifact nred'>Data telah dihapus.</span>";
        }
      }
    ?>
    </h1>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Power</th>
          <th class='hide'>Unit</th>
          <th>Location</th>
          <th class='hide'>Group</th>
          <th class='hide'>Start Time</th>
          <th class='hide'>End Time</th>
          <th>Duration</th>
          <th class='hide'>Detail</th>
          <th class='hide'>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $batas = 5;
          $halaman = isset($_GET['halaman'])?(int)$_GET['halaman']: 1;
          $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
          $previous = $halaman - 1;
          $next = $halaman + 1;
          $no = 1;
          $data_all = mysqli_query($hostptba, "select * from T_HALANGAN order by START desc ");
          $jumlah_data = mysqli_num_rows($data_all);
          $total_halaman = ceil($jumlah_data / $batas);

          $data = mysqli_query($hostptba, "select * from T_HALANGAN order by START desc limit $halaman_awal, $batas ");
          $nomor = $halaman_awal + 1;

          while ($tabel = mysqli_fetch_array($data)){
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $tabel['POWER'] ?></td>
                <td class='hide'><?php echo $tabel['UNIT'] ?></td>
                <td><?php echo $tabel['LOKASI'] ?></td>
                <td class='hide'><?php echo $tabel['GRUP'] ?></td>
                <td class='hide'><?php echo $tabel['START'] ?></td>
                <td class='hide'><?php echo $tabel['END'] ?></td>
                <td><?php echo $tabel['TOTAL'] ?></td>
                <td class='hide'><?php echo $tabel['PROBLEM'] ?></td>
                <td class='hide'><?php echo $tabel['ACTION_PROBLEM'] ?></td> 
              </tr>
              <?php
          }
        ?>
      </tbody>
    </table>          
  </div>
  <div class="flex" style="gap: 2%;">
    <!-- Data Unit -->
    <div class='fdbox fd2' style='flex: 1; padding: 30px; padding-top: 10px;'>
      <h1 style='margin-bottom: 10px;'>Last Updates Units </h1>
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Unit</th>
            <th>Location</th>
            <th>Condition</th>
            <th>Lane</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $batas = 5;
            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman']: 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
            $previous = $halaman - 1;
            $next = $halaman + 1;
            $no = 1;
            $data_all_unit = mysqli_query($hostptba, "select * from T_UNIT order by ID desc ");
            $jumlah_data_unit = mysqli_num_rows($data_all_unit);
            $total_halaman = ceil($jumlah_data / $batas);

            $data_unit = mysqli_query($hostptba, "select * from T_UNIT order by ID desc limit $halaman_awal, $batas ");
            $nomor = $halaman_awal + 1;

            while ($tabel_unit = mysqli_fetch_array($data_unit)){
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $tabel_unit['NAMA_UNIT'] ?></td>
                  <td><?php echo $tabel_unit['LOKASI'] ?></td>
                  <td><?php echo $tabel_unit['KONDISI'] ?></td>
                  <td><?php echo $tabel_unit['JALUR'] ?></td>
                </tr>
                <?php
            }
          ?>
        </tbody>
      </table>
    </div>
    <!-- Data Kabel -->
    <div class='fdbox fd2' style='flex: 1; padding: 30px; padding-top: 10px;'>
      <h1 style='margin-bottom: 10px;'>Last Updates Cable's Usage </h1>
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Shovel</th>
            <th>Cable Type</th>
            <th>Cable Usage (meters)</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $batas = 5;
            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman']: 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
            $previous = $halaman - 1;
            $next = $halaman + 1;
            $no = 1;
            $data_all_cable = mysqli_query($hostptba, "select * from T_KABEL order by ID desc ");
            $jumlah_data_cable = mysqli_num_rows($data_all_cable);
            $total_halaman = ceil($jumlah_data / $batas);

            $data_cable = mysqli_query($hostptba, "select * from T_KABEL order by ID desc limit $halaman_awal, $batas ");
            $nomor = $halaman_awal + 1;

            while ($tabel_cable = mysqli_fetch_array($data_cable)){
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $tabel_cable['SHOVEL'] ?></td>
                  <td><?php echo $tabel_cable['KABEL'] ?></td>
                  <td><?php echo $tabel_cable['PANJANG'] ?></td>
                </tr>
                <?php
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
