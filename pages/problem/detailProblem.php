<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='description' 
          content = 'Halaman menampilkan Summary Data yang dikemas dalam Grafik untuk menyatakan suatu kondisi.' />
    <title>Problem's Detail</title>
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
    <h1>List of Problem's</h1>
    <div class="outContainer">
      <div class="dpContainer2">
        <div style="display: flex; align-items: center; margin-bottom: 15px; border-bottom: 1px solid #30475e30; padding-bottom: 10px;">
          <i class="fa fa-lg fa-bolt"></i><h2>Problem's by Voltage</h2>
        </div>
        <div class='pContent'>
          <div>
            <div>
              <h3>20 KV Problem's</h3>
              <h1><?php echo mysqli_num_rows($jumlahHalangan20) ?></h1>
              <p><?php echo $halangan20;?> hour's </p>
            </div>
          </div>
          <div >
            <div>
              <h3>6 KV Problem's</h3>
              <h1><?php echo mysqli_num_rows($jumlahHalangan6) ?></h1>
              <p ><?php echo $halangan6;?> hour's </p>
            </div>
          </div>
          <div >
            <div>
              <h3>All Problem's</h3>
              <h1><?php echo mysqli_num_rows($jumlahTotal) ?></h1>
              <p > <?php echo $halangan;?> hour's </p>
            </div>
          </div>
        </div>
      </div>
      <div class="dpContainer2">
        <div style="display: flex; align-items: center; margin-bottom: 15px; border-bottom: 1px solid #30475e30; padding-bottom: 10px;">
          <i class="fa fa-lg fa-map-marker-alt"></i><h2>Problem's by Location</h2>
        </div>
        <div class='pContent'>
          <div>
            <div>
              <h3>PIT 2 Banko Barat</h3>
              <h1><?php echo mysqli_num_rows($jumlahHalangan20) ?></h1>
              <p><?php echo $halangan20;?> hour's </p>
            </div>
          </div>
          <div >
            <div>
              <h3>PIT 3 Banko Barat</h3>
              <h1><?php echo mysqli_num_rows($jumlahHalangan6) ?></h1>
              <p ><?php echo $halangan6;?> hour's </p>
            </div>
          </div>
          <div >
            <div>
              <h3>Other Location</h3>
              <h1><?php echo mysqli_num_rows($jumlahTotal) ?></h1>
              <p > <?php echo $halangan;?> hour's </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <div id ='tabel-problem' class='tabel_problem' style='display: block;'>
      <h1 style="font-size: 1.5rem; color: #30475E; margin-bottom: 20px; font-weight: 600;">All Problem's Detail</h1>
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Power</th>
            <th class='hide'>Unit</th>
            <th>Lokasi</th>
            <th class='hide'>Grup</th>
            <th class='hide'>Awal</th>
            <th class='hide'>Akhir</th>
            <th>Durasi</th>
            <th class='hide'>Problem</th>
            <th class='hide'>Tindakan</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $batas = 15;
            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman']: 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $no = 1;
            $data_all = mysqli_query($hostptba, "select * from T_HALANGAN where START between '$tawal' and '$takhir' order by START desc");
            $jumlah_data = mysqli_num_rows($data_all);
            $total_halaman = ceil($jumlah_data / $batas);

            $data = mysqli_query($hostptba, "select * from T_HALANGAN where START between '$tawal' and '$takhir' order by START desc limit $halaman_awal , $batas ");
            $nomor = $halaman_awal + 1;

            while ($tabel = mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><?php echo $nomor++; ?>
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
      <nav>
        <ul class='pageNumber'>
          <li> <a class='pageact' <?php if($halaman > 1){echo "href='?tawal=$tawal&takhir=$takhir&filterdata=Show+Detail+Problem&halaman=$previous'";} ?>><i class="fa fa-angle-left" style="margin-right: 0;"></i></a></li>
          <?php 
            for ($x=1; $x <= $total_halaman; $x++){
              ?>
                <li><a class='pageact' href = "?tawal=<?php echo $tawal?>&takhir=<?php echo $takhir?>&filterdata=Show+Detail+Problem&halaman=<?php echo $x ?>"><?php echo $x?></a></li>
              <?php
            }
          ?>
          <li><a class='pageact' <?php if ($halaman < $total_halaman){ echo "href=?tawal=$tawal&takhir=$takhir&filterdata=Show+Detail+Problem&halaman=$next'"; }?>><i class="fa fa-angle-right" style="margin-right: 0;"></i></a></li>
        </ul>
      </nav>
    </div>
    
  <!-- oke -->
  <script><?php require_once('../../script/Chart.min.js'); ?></script>
  <script><?php require_once('../../script/script.js'); ?></script>
  <script><?php require_once('../sw.js'); ?></script>
  </body>
  </html>