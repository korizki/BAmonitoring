<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='description' 
          content = 'Halaman menampilkan Summary Data yang dikemas dalam Grafik untuk menyatakan suatu kondisi.' />
    <title>Performa Elektrifikasi</title>
    <link rel="manifest" href="manifest.json">
    <link rel='icon' href='logo1.png'>
    <link rel='stylesheet' href='../assets/css/index.css'>
    <link rel='stylesheet' href='../assets/css/styles.css'>
    <link rel='stylesheet' type='text/css' href='../assets/css/responsive.css'>
    <script src='../script/script.js'></script>
</head>

<body id='pageListrik' style='background: rgb(240,245,245); height: 1300px;'>
  <?php
    include '../phpcode/connection.php';
    include '../phpcode/calculation.php';
    include '../phpcode/kabel.php';
  ?>
  <a href='../index.php' >
  <center><h1 style='
    margin-bottom: 0px;    
    padding: 20px;
    background: #30475E;
    color: #f5f5f5;
    border-bottom: 10px solid #F05454;
    font-size: 40px;
  '>Electrification Performance</h1></a></center> 
  <div class='periodeButton editBtn' id='editBtn'>
    <a title='Edit Report Periode' style ='margin-left: 8px; width: 30px; height: 30px;' onClick='showEditDate()'><img alt='iconedit'   class="iconedit" src='../assets/edit.svg'></a>
  </div>
  <div class='datebutton periodeButton' id='editMenu'>
    <form method='GET' action="" id='editDate'>
      <p><label for='tawal' class="block">Start</label> 
      <input class='listMonth' name='tawal' id='tawal' type='date' value='<?php echo $tawal?>' ></input>
      <label for='takhir' class="block">End</label> 
      <input class='listMonth' name='takhir' id='takhir' type='date' value='<?php echo $takhir?>'></input>
      <input type='submit' name='filterdata' value='Get Data' class='btnsubmit' onClick='showData()'></input></p>
    </form>
  </div>
  <div class="pageTitle">
    <h1>Periode : <?php echo date('j F Y ',strtotime($tawal));?> to <?php echo date('j F Y',strtotime($takhir))?> </h1>
  </div>
  <div class='mainContent'>
    <div class='header' id='grafikperformance'> 
      <div class='header-illustration'>
        <h1 class='top-title'>Electrification Performance</h1>
        <div class='graph-box'>
          <canvas id='myChart'></canvas>
        </div>
        <div style="display: flex; flex-direction: column; justify-content: space-between; height: 170px">
          <p class='keterangan'>Ketersediaan Power Listrik Elektrifikasi sebesar <span id='avail' style='font-size: 1em; color: #30475E; font-weight: bold' ><?php echo number_format($ketersediaanpowerpersen,2) ?>% (<?php echo $ketersediaanpower ?> Jam)</span>, Halangan Power 6KV & 20KV sebesar <span id='tothalangan' style='font-size: 1em; color: red; font-weight: bold' > <?php echo number_format($halanganpersen,2) ?>% (<?php echo $halangan ?> Jam)</span>.</p>
          <div>
            <form action="problem/detailProblem.php" method='get' target="_blank" >
              <input class='listMonth' name='tawal' id='tawal' type='date' value='<?php echo $tawal?>' style='display: none;'></input>
              <input class='listMonth' name='takhir' id='takhir' type='date' value='<?php echo $takhir?>' style='display: none;'></input>
              <input type="submit"  name='filterdata' value="Show Detail Problem" class='detail-problem blues' style="margin-top: 25px;">
            </form>
          </div>
        </div>
      </div>
      <div class='header-illustration'>
      <h1 class='top-title'>Preventif Maintenance</h1>
        <div class='graph-box'>
          <canvas id='myChart2'></canvas>
        </div>
        <div style="display: flex; flex-direction: column; justify-content: space-between; height: 170px">
          <p class='keterangan'> Timesheet, Kegiatan Preventif Maintenance, dan Safety Talk telah dilaksanakan seluruhnya dengan persentase sebesar 100%</span>. </p>
          <div>
            <a style='margin-top: 0px;' href='#listUnit' onClick='showDetailUnit()' class='detail-problem blues'><span id='actionUnit'>Show</span> Detail Report</a>
          </div>
        </div>
      </div>
      <div class='header-illustration'>
        <h1 class='top-title'>List Of Electrification Unit's</h1>
        <div class='graph-box'>
          <canvas id='myChart4'></canvas>
        </div>
        <div style="display: flex; flex-direction: column; justify-content: space-between; height: 170px">
          <p class='keterangan'>Total Keseluruhan Perangkat CRU, TSU, dan SSU Unit Elektrifikasi saat ini, terdiri dari  <span id='totunit' style='font-size: 1em; color: #30475E; font-weight: bold' ><?php echo $readyunit ?> Unit Ready</span>, <span id='unitbd' style='font-size: 1em; color: #30475E; font-weight: bold' > <?php echo $breakdownunit ?> Unit Breakdown</span>, dan <span id='unitstby' style='font-size: 1em; color: #30475E; font-weight: bold' > <?php echo $standbyunit ?> Unit Standby</span>. <span id='unitready' style='color: white'>Klik detail untuk informasi.</span></p>
          <div>
            <form action="unit/detailUnit.php" method='get' target="_blank" >
              <input class='listMonth' name='tawal' id='tawal' type='date' value='<?php echo $tawal?>' style='display: none;'></input>
              <input class='listMonth' name='takhir' id='takhir' type='date' value='<?php echo $takhir?>' style='display: none;'></input>
              <input type="submit"  name='filterdata' value="Show Detail Unit" class='detail-problem blues' >
            </form>
          </div>
        </div>
      </div>
      
    </div> <br>
  

    <div class='frame' style='margin-bottom: 50px; '>
      <div class='header-illustration second'>
        <h1 class='top-title'>Cable's and Junction Box Usage </h1>
        <div class='graph-box' >
          <canvas  id='myChart3' ></canvas>
        </div>
        <div class='timesheet-info'>
          <p class='keterangan'>Pemakaian Kabel 6KV terpanjang Unit Elektrifikasi pada <span id='kabel' style='font-size: 1em; color: #30475E; font-weight: bold' >Shovel <?php echo $shovel ?> </span> dengan total pemakaian kabel sepanjang <span  id='totkabel' style='font-size: 1em; color: #30475E; font-weight: bold' > <?php echo number_format(max($arr),0)?> Meter</span>.</p>
        </div>
        <div>
          <form action="kabel/detailCable.php" method='get' target="_blank" >
            <input class='listMonth' name='tawal' id='tawal' type='date' value='<?php echo $tawal?>' style='display: none;'></input>
            <input class='listMonth' name='takhir' id='takhir' type='date' value='<?php echo $takhir?>' style='display: none;'></input>
            <input type="submit"  name='filterdata' value="Detail Cable Usage" class='detail-problem blues' >
          </form>
        </div>
      </div>

      <div class='header-illustration second' style="background-image: url('../assets/illus2.webp'); background-repeat:no-repeat; background-position:bottom right;">
        <h1 class='top-title'>Other Information's</h1>
        <div class='graph-box' style='text-align: center' >
          <div class="flex" style="flex-direction: column; gap: 25px; align-items: center; margin-top: 25px; ">
            <a href='#singleline' onClick='showSingleLine()' class='btnother'>Single Line Diagram</a>
            <a href='#singleline' onClick='showSingleLine()' class='btnother'>Manual Book</a>
            <a href='#singleline' onClick='showSingleLine()' class='btnother'>Berita Acara Kejadian</a>
            <a href='#singleline' onClick='showSingleLine()' class='btnother'>Nota Dinas</a>
          </div>
        </div>
      </div>
    </div>
  

    
    <div class='content3' id='singleline'>
      <div class='tabel_problem unit' style='width: 88%'>
        <h1 class='top-title' style='margin-bottom: 20px; margin-top: 0; font-size: 1.5em;'>Single Line Diagram </h1>
        <figure>
          <img src='../assets/singleline.webp' style='width: 100%; object-fit: cover; border-radius: 10px; box-shadow: 0 0 10px 0 #30475E60' class='illusbig' >
        </figure>

      </div>
    </div>
  </div>
  

  
  <!-- oke -->
  <script><?php require_once('../script/Chart.min.js'); ?></script>

  <script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Ketersediaan','Halangan'],
            datasets: [{
                label: 'Electricity Performance',
                data: [
                    <?php echo $ketersediaanpower; ?>,
                    <?php echo $halangan; ?>,
                ],
                backgroundColor: [
                  'rgba(7, 128, 128, 0.7)',
				          'rgba(242, 80, 66, 0.7)', 
                ],
                borderColor: [
					        'rgba(7, 128, 128, 1)',
                  'rgba(242, 80, 66, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    })
  </script>

<script>
    const ctx2 = document.getElementById('myChart2').getContext('2d');
    const myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Time Sheet','Preventif'],
            datasets: [{
                label: 'Total Persentase ',
                data: [
                    100,
                    100,
                ],
                backgroundColor: [
                  'rgba(8, 129, 157, 0.7)',
				          'rgba(206, 5, 32, 0.7)', 
                ],
                borderColor: [
                  'rgba(8, 129, 157, 1)',
					        'rgba(206, 5, 32, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    })
  </script>
  <script>
    const ctx3 = document.getElementById('myChart3').getContext('2d');
    const myChart3 = new Chart(ctx3, {
      type: 'bar',
      data: {
        labels: ['3001', '3002', '3003','3004','3005','3006','3007'],
        datasets: [
          {
            label: 'Kabel 3 x 35mm2',
            data: [<?php  echo $pjgkabel13001; ?>, <?php echo $pjgkabel13002 ?>, <?php echo $pjgkabel13003 ?>, <?php echo $pjgkabel13004 ?>, <?php echo $pjgkabel13005 ?>, <?php echo $pjgkabel13006 ?>, <?php echo $pjgkabel13007 ?>],
            backgroundColor: 'rgb(107, 122, 161, 0.7)',
            borderColor: '#6B7AA1',
            borderWidth: 1
          },
          {
            label: 'Kabel 3 x 70mm2',
            data: [<?php  echo $pjgkabel33001; ?>, <?php echo $pjgkabel33002 ?>, <?php echo $pjgkabel33003 ?>, <?php echo $pjgkabel33004 ?>, <?php echo $pjgkabel33005 ?>, <?php echo $pjgkabel33006 ?>, <?php echo $pjgkabel33007 ?>],
            backgroundColor: 'rgb(143, 193, 212, 0.7)',
            borderColor: '#8FC1D4',
            borderWidth: 1
          },
          {
            label: 'Kabel 3 x 50mm2',
            data: [<?php  echo $pjgkabel23001; ?>, <?php echo $pjgkabel23002 ?>, <?php echo $pjgkabel23003 ?>, <?php echo $pjgkabel23004 ?>, <?php echo $pjgkabel23005 ?>, <?php echo $pjgkabel23006 ?>, <?php echo $pjgkabel23007 ?>],
            backgroundColor: 'rgb(255, 184, 48, 0.7)',
            borderColor: '#FFB830',
            borderWidth: 1
          },
          
          {
            label: 'Kabel 3 x 95mm2',
            data: [<?php  echo $pjgkabel43001; ?>, <?php echo $pjgkabel43002 ?>, <?php echo $pjgkabel43003 ?>, <?php echo $pjgkabel43004 ?>, <?php echo $pjgkabel43005 ?>, <?php echo $pjgkabel43006 ?>, <?php echo $pjgkabel43007 ?>],
            backgroundColor: 'rgb(240, 217, 255, 0.7)',
            borderColor: '#F0D9FF',
            borderWidth: 1
          },
          {
            type: 'line',
            label: 'Batas Maximal Penggunaan Kabel',
            data: [1000,1000,1000,1000,1000,1000,1000],
            backgroundColor: 'rgb(255,80,80, 0.1)',
            borderColor: 'rgb(255,80,80)',
            borderWidth: 1,
            order: 2
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        responsive: true,
        scales: {
          xAxes: [{stacked: true}],
          yAxes: [{
            stacked: true,
            display: true,
            ticks: {
              beginAtZero: true
            }
          },
          ],
        },
        
      },
    })
    
  </script>
  <!-- Grafik Status Unit -->
  <script>
    const ctx4 = document.getElementById('myChart4').getContext('2d');
    const myChart4 = new Chart(ctx4, {
      type: 'bar',
      data: {
        labels: ['Ready', 'Breakdown', 'Standby'],
        datasets: [
          {
            label: 'SSU',
            data: [<?php echo $ssuready ?>, <?php echo $ssubreakdown ?>,<?php echo $ssustandby ?>],
            backgroundColor: 'rgb(59, 24, 95, 0.7)',
            borderColor: '#3B185F',
            borderWidth: 1
          },
          {
            label: 'TSU',
            data: [<?php echo $tsuready ?>, <?php echo $tsubreakdown ?>,<?php echo $tsustandby ?>],
            backgroundColor: 'rgb(75, 101, 135, 0.7)',
            borderColor: '#4B6587',
            borderWidth: 1
          },
          {
            label: 'CRU',
            data: [<?php echo $cruready ?>, <?php echo $crubreakdown ?>,<?php echo $crustandby ?>],
            backgroundColor: 'rgb(161, 37, 104, 0.7)',
            borderColor: '#A12568',
            borderWidth: 1
          },
          
          
        ]
      },
      options: {
        maintainAspectRatio: false,
        responsive: true,
        scales: {
          xAxes: [{stacked: true}],
          yAxes: [{
            stacked: true,
            display: true,
            ticks: {
              beginAtZero: true
            }
          },
          ],
        },
      }
    })
  </script>
  <script><?php require_once('../script/script.js'); ?></script>
  
  <script><?php require_once('sw.js'); ?></script>
  </body>
  </html>