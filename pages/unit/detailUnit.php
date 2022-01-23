<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='description' 
          content = 'Halaman menampilkan Summary Data yang dikemas dalam Grafik untuk menyatakan suatu kondisi.' />
    <title>Detail Unit's</title>
    <link rel="manifest" href="manifest.json">
    <link rel='icon' href='../logo1.png'>
    <link rel='stylesheet' href='../../assets/css/index.css'>
    <link rel='stylesheet' href='../../assets/css/styles.css'>
    <link rel='stylesheet' type='text/css' href='../../assets/css/responsive.css'>
    <script defer src="../../assets/css/all.js"></script>
    <script src='../../script/script.js'></script>
</head>

<body id='pageListrik' style='background: rgb(240,245,245); '>
  <?php
    include '../../phpcode/connection.php';
    include '../../phpcode/calculation.php';
    include '../../phpcode/kabel.php';
  ?>
  
  <div class="dpContainer containerUnit">
    <h1>List of Unit's</h1>
    <div class="outContainer">
      <div class='probDetailContent unitBox'>
        <div class='unitItemBox' style='display: flex;'>
          <img src='../../assets/ssu.webp' alt='illustrasissu'/>
          <div>
            <h3>SSU</h3>
            <figure style='display: flex; align-items: center; justify-content: space-around;'>
              <div style='display: flex; justify-content: space-around;'>
                <div class='status ready'>
                  <h2>Ready</h2>
                  <p><?php echo $ssuready?> <p>
                </div>
                <div class='status breakdown'>
                  <h2>Breakdown</h2>
                  <p><?php echo $ssubreakdown?><p>
                </div>
                <div class='status'>
                  <h2>Standby</h2>
                  <p><?php echo $ssustandby?><p>
                </div>
              </div>
            </figure>
          </div>  
        </div>
        <div class='unitItemBox' style='display: flex;'>
          <img src='../../assets/tsu.webp' alt='illustrasitsu'/>
          <div>
            <h3>TSU</h3>
            <figure style='display: flex; align-items: center; justify-content: space-around;'>
              <div style='display: flex; justify-content: space-around;'>
                <div class='status ready'>
                  <h2>Ready</h2>
                  <p><?php echo $tsuready?><p>
                </div>
                <div class='status breakdown'>
                  <h2>Breakdown</h2>
                  <p><?php echo $tsubreakdown?> <p>
                </div>
                <div class='status'>
                  <h2>Standby</h2>
                  <p><?php echo $tsustandby?> <p>
                </div>
              </div>
            </figure>
          </div>
        </div>
        <div class='unitItemBox' style='display: flex'>
          <img src='../../assets/cru.webp' alt='illustrasicru'/>
          <div>
            <h3>CRU</h3>
            <figure style='display: flex; align-items: center; justify-content: space-around;'>
              
              <div style='display: flex; justify-content: space-around;'>
                <div class='status ready'>
                  <h2>Ready</h2>
                  <p><?php echo $cruready?> <p>
                </div>
                <div class='status breakdown'>
                  <h2>Breakdown</h2>
                  <p><?php echo $crubreakdown?> <p>
                </div>
                <div class='status'>
                  <h2>Standby</h2>
                  <p><?php echo $crustandby?> <p>
                </div>
              </div>
            </figure>
          </div>
        </div>  
      </div>
    </div>
  </div>

    <div id ='tabel-problem' class='tabel_problem' style='display: block;'>
      <h1 style="font-size: 1.5rem; color: #30475E; margin-bottom: 20px; font-weight: 600;">All Unit's Detail</h1>
      <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Unit</th>
            <th>Lokasi</th>
            <th>Kondisi</th>
            <th>Jalur</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $batasunit = 10;
            $halamanunit = isset($_GET['hal_unit']) ? (int) $_GET['hal_unit'] : 1;
            $halawalunit = ($halamanunit > 1) ? ($halamanunit * $batasunit) - $batasunit : 0;
            $prevunit = $halamanunit -1;
            $nextunit = $halamanunit +1;
            $no = 1;
            $dataunit_all = mysqli_query($hostptba, "select * from T_UNIT order by NAMA_UNIT asc");
            $jumlah_unit = mysqli_num_rows($dataunit_all);
            $totalhal_unit = ceil($jumlah_unit / $batasunit);
            $dataunit = mysqli_query($hostptba, "select * from T_UNIT order by NAMA_UNIT asc limit $halawalunit, $batasunit ");
            $nohal = $halawalunit + 1;
            while ($t_unit = mysqli_fetch_array($dataunit)){
                ?>
                <tr>
                <td><?php echo $no++; ?>
                <td><?php echo $t_unit['NAMA_UNIT'] ?></td>
                <td><?php echo $t_unit['LOKASI'] ?></td>
                <td><span id='tkondisi' ><?php echo $t_unit['KONDISI'] ?></span></td>
                <td><?php echo $t_unit['JALUR'] ?></td>
                </tr>
                <?php
            }
        ?>
        </tbody>
      </table>
      <nav>
        <ul class="pageNumber">
          <li>
            <a class="pageact" <?php if($halamanunit > 1){
              echo "href='?hal_unit=$prevunit'";
            }?>><i class="fa fa-angle-left" style="margin-right: 0"></i></a>
          </li>
          <li>
            <?php 
              for ($w=1; $w <= $totalhal_unit; $w++){
                ?>
                  <li><a class="pageact" href="?hal_unit=<?php echo $w?>"><?php echo $w?></a></li>
                <?php
              }
            ?>
          </li>
          <li>
            <a class="pageact" <?php if($halamanunit < $totalhal_unit){
              echo "href='?hal_unit=$nextunit'";
            }?>><i class="fa fa-angle-right" style="margin-right: 0"></i></a>
          </li>
        </ul>
      </nav>
    </div>
    
  <!-- oke -->
  <script><?php require_once('../../script/Chart.min.js'); ?></script>
  <script><?php require_once('../../script/script.js'); ?></script>
  <script><?php require_once('sw.js'); ?></script>
  </body>
  </html>