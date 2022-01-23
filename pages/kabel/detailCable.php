<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='description' 
          content = 'Halaman menampilkan Summary Data yang dikemas dalam Grafik untuk menyatakan suatu kondisi.' />
    <title>Cable Usage Detail</title>
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

  <div class="dpContainer">
    <h1>List of Cable's Usage</h1>
    <div class="outContainer">
      <div class="dpContainer2 cable">
        <div style="display: flex; align-items: center; margin-bottom: 15px; border-bottom: 1px solid #30475e30; padding-bottom: 10px;">
          <i class="fa fa-lg fa-map-marker-alt" ></i><h2>Unit on PIT-2 Banko Barat</h2>
        </div>
        <div class='cContent'>
          <div>
            <h1>SE-3001</h1>
            <p class="<?php if($totalSE3001 > 1000){echo "redkabel";}?>"><?php echo number_format($totalSE3001) ?> Meter's</p>
          </div>
          <div>
            <h1>SE-3002</h1>
            <p class="<?php if($totalSE3002 > 1000){echo "redkabel";}?>"><?php echo number_format($totalSE3002) ?> Meter's</p>
          </div>
          <div>
            <h1>SE-3003</h1>
            <p class="<?php if($totalSE3003 > 1000){echo "redkabel";}?>"><?php echo number_format($totalSE3003) ?> Meter's</p>
          </div>
          
        </div>
      </div>
      <div class="dpContainer2 cable">
        <div style="display: flex; align-items: center; margin-bottom: 15px; border-bottom: 1px solid #30475e30; padding-bottom: 10px;">
          <i class="fa fa-lg fa-map-marker-alt" ></i><h2>Unit on PIT-3 Banko Barat</h2>
        </div>
        <div class='cContent'>
          <div>
            <h1>SE-3004</h1>
            <p class="<?php if($totalSE3004 > 1000){echo "redkabel";}?>"><?php echo number_format($totalSE3004) ?> Meter's</p>
          </div>
          <div>
            <h1>SE-3005</h1>
            <p class="<?php if($totalSE3005 > 1000){echo "redkabel";}?>"><?php echo number_format($totalSE3005) ?> Meter's</p>
          </div>
          <div>
            <h1>SE-3006</h1>
            <p class="<?php if($totalSE3006 > 1000){echo "redkabel";}?>"><?php echo number_format($totalSE3006) ?> Meter's</p>
          </div>
          <div>
            <h1>SE-3007</h1>
            <p class="<?php if($totalSE3007 > 1000){echo "redkabel";}?>"><?php echo number_format( $totalSE3007) ?> Meter's</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id ='tabel-problem' class='tabel_problem' style='display: block;'>
    <h1 style="font-size: 1.5rem; color: #30475E; margin-bottom: 20px; font-weight: 600;">All Cable's Usage Detail</h1>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Shovel</th>
          <th>Jenis Kabel</th>
          <th>Panjang Kabel (meter)</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $bataskabel = 10;
          $halamankabel = isset($_GET['halaman_kabel'])?(int)$_GET['halaman_kabel'] : 1;
          $halawalkabel = ($halamankabel > 1) ? ($halamankabel * $bataskabel) - $bataskabel : 0;
          $prevkabel = $halamankabel -1;
          $nextkabel = $halamankabel + 1;
          $nokabel = 1;
          $datakabel_all = mysqli_query($hostptba, 'select * from T_KABEL order by SHOVEL asc');
          $jumlah_kabel = mysqli_num_rows($datakabel_all);
          $totalhal_kabel = ceil($jumlah_kabel / $bataskabel);

          $datakabel = mysqli_query($hostptba, "select * from T_KABEL order by SHOVEL asc limit $halawalkabel, $bataskabel ");
          $nohal = $halawalkabel + 1;
          while ($t_kabel = mysqli_fetch_array($datakabel)){
            ?>
            <tr>
              <td><?php echo $nokabel++; ?></td>
              <td><?php echo $t_kabel['SHOVEL']?></td>
              <td><?php echo $t_kabel['KABEL']?></td>
              <td><?php echo $t_kabel['PANJANG']?></td>
            </tr>
            <?php
          }
        ?>
      </tbody>
    </table>
    <nav>
      <ul class="pageNumber">
        <li>
          <a class="pageact" <?php if($halamankabel >1){
            echo "href='?halaman_kabel=$prevkabel'";
          }?>><i class="fa fa-angle-left" style="margin-right: 0"></i></a>
        </li>
        <?php
          for ($y=1; $y <= $totalhal_kabel; $y++){
            ?>
              <li><a class="pageact" href="?halaman_kabel=<?php echo $y?>"><?php echo $y?></a></li>
            <?php
          }
        ?>
        <li>
          <a class="pageact" <?php if ($halamankabel < $totalhal_kabel){echo "href='?halaman_kabel=$nextkabel'";} ?>><i class="fa fa-angle-right" style="margin-right: 0;"></i></a>
        </li>
      </ul>
    </nav>
  </div>
    
  <!-- oke -->
  <script><?php require_once('../../script/Chart.min.js'); ?></script>
  <script><?php require_once('../../script/script.js'); ?></script>
  <script><?php require_once('../sw.js'); ?></script>
  </body>
  </html>