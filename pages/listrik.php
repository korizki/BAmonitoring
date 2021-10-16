<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='description' 
          content = 'Halaman menampilkan Summary Data yang dikemas dalam Grafik untuk menyatakan suatu kondisi.' />
    <title>Performa Elektrifikasi</title>
    <link rel='manifest' href='manifest.webmanifest'>
    <link rel='icon' href='logo1.png'>
    <link rel='stylesheet' href='../assets/css/index.css'>
    <link rel='stylesheet' href='../assets/css/style.css'>
    <link rel='stylesheet' type='text/css' href='../assets/css/responsives.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <script src='../script/script.js'></script>
</head>

<body>
  <?php
    include '../phpcode/connection.php';
    include '../phpcode/calculation.php';
    include '../phpcode/kabel.php';
  ?>
  <script>console.log(nilaiA)</script>
  <center><h1 style='
    margin-bottom: 0px;    
    padding: 20px;
    background: #30475E;
    color: #f5f5f5;
    border-bottom: 10px solid #F05454;
    font-size: 40px;
  '>Listrik Elektrifikasi</h1></center> 
  
  <div class='periodeButton editBtn' id='editBtn'>
    <div title='Edit Tanggal'><i class='fa fa-lg fa-edit ' style='margin-left: -2px; color: #30475E' onClick='showEditDate()'></i></div>
  </div>
  <div class='datebutton periodeButton' id='editMenu'>
    <form method='GET' action="" id='editDate'>
      <p><label for='tawal'>Start</label> 
      <input class='listMonth' name='tawal' id='tawal' type='date' value='<?php echo $tawal?>' ></input>
      <label for='takhir'>End</label> 
      <input class='listMonth' name='takhir' id='takhir' type='date' value='<?php echo $takhir?>'></input>
      <input type='submit' name='filterdata' value='Get Data' class='btnsubmit' onClick='showData()'></input></p>
    </form>
  </div>

  <div class='mainContent'>
    <div class='header' id='grafikperformance' onMouseOver='gerak()'> 
      <div class='header-illustration'>
        <h1 class='top-title'>Kinerja Perawatan Elektrifikasi</h1>
        <div class='graph-box'>
          <canvas title='Grafik Power' id='myChart'></canvas>
        </div>
        <p class='keterangan'>Ketersediaan Power Listrik Elektrifikasi Periode <span id='desclistrik' style='font-size: 1em; color: #30475E; font-weight: bold' > <?php echo "$tawalnew - $takhirnew"  ?> </span> sebesar <span id='avail' style='font-size: 1em; color: #30475E; font-weight: bold' ><?php echo number_format($ketersediaanpowerpersen,2) ?>% (<?php echo $ketersediaanpower ?> Jam)</span>, Halangan Power 6KV & 20KV sebesar <span id='tothalangan' style='font-size: 1em; color: red; font-weight: bold' > <?php echo number_format($halanganpersen,2) ?>% (<?php echo $halangan ?> Jam)</span>.</p>
        <div>
          <a style='margin-top: 20px;' href='#tabel-problem' onClick='showDetails()' class='detail-problem blues'><span id='actionDetail'>Show</span> Detail Problem</a>
        </div>
      </div>

      <div class='header-illustration'>
      <h1 class='top-title'>Preventif Maintenance</h1>
        <div class='graph-box'>
          <canvas title='Grafik Timesheet' id='myChart2'></canvas>
        </div>
        <div class='timesheet-info'>
            <p class='keterangan'>Timesheet, Preventif Maintenance, dan Safety Talk Periode <span id='safetytalk' style='font-size: 1em; color: #30475E; font-weight: bold' > <?php echo "$tawalnew - $takhirnew"  ?> </span> telah dilaksanakan dengan persentase pencapaian sebesar 100%.</p>
        </div>
        <div>
          <a style='margin-top: 45px;' href='#tabel-problem' onClick='showDetails()' class='detail-problem blues'><span id='action_timesheet'>Show</span> Detail TimeSheet </a>
        </div>
      </div>
      <div class='header-illustration'>
        <h1 class='top-title'>Daftar Unit Elektrifikasi</h1>
        <div class='graph-box'>
          <canvas title='Grafik Unit' id='myChart4'></canvas>
        </div>
        <p class='keterangan'>Total Keseluruhan Perangkat CRU, TSU, dan SSU Unit Elektrifikasi saat ini, terdiri dari  <span id='totunit' style='font-size: 1em; color: #30475E; font-weight: bold' >7 Unit Ready</span>, <span id='unitbd' style='font-size: 1em; color: #30475E; font-weight: bold' > 7 Unit Breakdown</span>, dan <span id='unitstby' style='font-size: 1em; color: #30475E; font-weight: bold' > 2 Unit Standby</span>. <span id='unitready' style='color: white'>Klik detail untuk informasi lebih lanjut.</span></p>
        <div>
          <a style='margin-top: 20px;' href='#listUnit' onClick='showDetailUnit()' class='detail-problem blues'><span id='actionUnit'>Show</span> Detail Unit</a>
        </div>
      </div>
      
    </div> <br>
  

    <div class='frame'>
      <div class='header-illustration second'>
        <h1 class='top-title'>Pemakaian Kabel dan Junction Box</h1>
        <div class='graph-box' >
          <canvas title='Grafik Kabel' id='myChart3' ></canvas>
        </div>
        <div class='timesheet-info'>
            <p class='keterangan'>Pemakaian Kabel 6KV terpanjang Unit Elektrifikasi pada <span id='kabel' style='font-size: 1em; color: #30475E; font-weight: bold' >Shovel <?php echo $shovel ?> </span> dengan total pemakaian kabel sepanjang <span  id='totkabel' style='font-size: 1em; color: #30475E; font-weight: bold' > <?php echo number_format(max($arr),0)?> Meter</span>.</p>
        </div>
        <div>
          <a style='margin-top: 0px;' href='#detail-kabel' onClick='showDetails()' class='detail-problem blues'><span id='action_kabel'>Show</span> Detail Penggunaan Kabel </a>
        </div>
      </div>
      <div class='header-illustration second'>
        <h1 class='top-title'>Informasi Lain & Lampiran</h1>
        <div class='graph-box' style='text-align: center'>
          <!-- <canvas id='myChart'></canvas> -->
          <a href='#singleline' onClick='showSingleLine()' class='btnother'>Single Line Unit Perawatan Elektrifikasi</a>
          <figure style='text-align: center; margin: 20px'>
            <img class='singlelineillus' width='500' height='333' alt='illustration' src='../assets/illus2.webp'>
          </figure>
        </div>
        
      </div>
    </div>
    
    <br>
    <!-- Input Data Problem -->
    <div class='outer-box' id='outer'>
      <div class='form-input'>
        <form method='post'>
          <h2 class='title'>Input Data Problem </h2> 
    <?php
    if(isset($_POST['simpan'])){
      $power = $_POST['power'];
      $unit = $_POST['unit'];
      $lokasi = $_POST['lokasi'];
      $grup = $_POST['grup'];
      $start = $_POST['start-time'];
      $end = $_POST['end-time'];
      $durasi = $_POST['durasi'];
      $problem = $_POST['problem'];
      $action = $_POST['action'];

      // kirim data ke database
      $simpan = mysqli_query($hostptba, "insert into T_HALANGAN value(
        NULL, '$power', '$unit', '$lokasi', '$grup', '$start', '$end', '$durasi', '$problem', '$action' )");
      if($simpan){
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
          <div>
            <p><label for='power'>Jenis Power</label></p>
            <input list='powers' name='power' id='power'>
              <datalist id='powers'>
                <option value='6 KV'>
                <option value='20 KV'>
              </datalist>
            </input> 
          </div>
          <div>  
            <p><label for='unit'>Unit</label></p>
            <input list='units' name='unit' id='unit'>
              <datalist id='units'>
                <option value='All Unit'>
                <option value='CRU PIT-3'>
                <option value='CRU PIT-2'>
              </datalist>
            </input>
          </div>
          <div>
            <p><label for='lokasi'>Lokasi</label></p>
            <input list='listlokasi' name='lokasi' id='lokasi'>
              <datalist id='listlokasi'>
                <option value='PIT-2'>
                <option value='PIT-3'>
                <option value='Gedung MSF'>
              </datalist>
            </input>
          </div>
          <div>
            <p><label for='grup'>Grup</label></p>
            <input list='grups' name='grup' id='grup'>
              <datalist id='grups'>
                <option value='A'>
                <option value='B'>
                <option value='C'>
                <option value='D'>
              </datalist>
            </input>
          </div>
          <div>
            <div>
              <p><label for='start-time'>Waktu Awal</label></p>
              <input type='datetime-local' id='start-time' name='start-time'></input>
            </div>
            <div>
              <p><label for='end'>Waktu Selesai</label></p>
              <input type='datetime-local' id='end-time' name='end-time' onChange='getDurasi()'></input>
            </div>
          </div>
          <div>
            <p><label for='durasi'>Durasi (Jam) </label></p>
            <input type='text' id='durasi' name='durasi'  ></input>
          </div>
          <div>
            <p><label for='problem'>Detail Problem</label></p>
            <textarea  spellcheck='false' type='text' id='problem' name='problem'/></textarea>
          </div>
          <div>
            <p><label for='action'>Penyelesaian</label></p>
            <textarea  spellcheck='false' type='text' id='action' name='action'></textarea>
          </div>
          <div>
            <input type='submit' class='submit' value='Simpan' name='simpan'>
          </div>
        </form>
        <button class='cancel' onClick='hideForm()'>Batal</button>
      </div>
    </div>
    <br>
    <div id ='tabel-problem' class='tabel_problem'>
      <div class='probDetailContent'>
        <div>
          <div>
            <h1><?php echo mysqli_num_rows($jumlahHalangan20) ?><h1>
            <p style='margin-bottom: 10px;'>( <?php echo $halangan20;?> Jam )</p>
            <p>Halangan 20 KV</p>
          </div>
        </div>
        <div>
          <div>
            <h1><?php echo mysqli_num_rows($jumlahHalangan6) ?><h1>
            <p style='margin-bottom: 10px;'>( <?php echo $halangan6;?> Jam )</p>
            <p>Halangan 6 KV</p>
          </div>
        </div>
        <div>
          <div>
            <h1><?php echo mysqli_num_rows($jumlahTotal) ?><h1>
            <p style='margin-bottom: 10px;'>( <?php echo $halangan;?> Jam )</p>
            <p>Total Problem</p>
          </div>
        </div>
        <div>
          <div>
            <h1><?php echo $halangan ?><h1>
            <p>Jumlah Halangan (Jam)</p>
          </div>
        </div>
      </div>
      <!-- <a class='add-button' onClick='showForm()'> <i class='fa fa-plus'></i>Tambah Data</a> -->
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
            $batas = 10;
            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman']: 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $no = 1;
            $data_all = mysqli_query($hostptba, "select * from T_HALANGAN where START between '$tawal' and '$takhir'");
            $jumlah_data = mysqli_num_rows($data_all);
            $total_halaman = ceil($jumlah_data / $batas);

            $data = mysqli_query($hostptba, "select * from T_HALANGAN where START between '$tawal' and '$takhir' limit $halaman_awal, $batas ");
            $nomor = $halaman_awal + 1;

            while ($tabel = mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><?php echo $no++; ?>
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
          <li> <a <?php if($halaman > 1){echo "href='?halaman=$previous'";} ?>>Sebelumnya</a></li>
          <?php 
            for ($x=1; $x <= $total_halaman; $x++){
              ?>
                <li><a href = "?halaman=<?php echo $x ?>"><?php echo $x?></a></li>
              <?php
            }
          ?>
          <li><a <?php if ($halaman < $total_halaman){ echo "href='?halaman=$next'"; }?>>Selanjutnya</a></li>
        </ul>
      </nav>
    </div>
    <div class='content2' id='listUnit'>
      <div class='probDetailContent unitBox'>
        <div class='unitItemBox'>
          <h3>SSU</h3>
          <figure style='display: flex; align-items: center; justify-content: space-around;'>
            <img src='../assets/ssu.webp' alt='illustrasissu'/>
            <div style='display: flex; justify-content: space-around;'>
              <div class='status'>
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
        <div class='unitItemBox'>
          <h3>TSU</h3>
          <figure style='display: flex; align-items: center; justify-content: space-around;'>
            <img src='../assets/tsu.webp' alt='illustrasitsu'/>
            <div style='display: flex; justify-content: space-around;'>
              <div class='status'>
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
        <div class='unitItemBox'>
          <h3>CRU</h3>
          <figure style='display: flex; align-items: center; justify-content: space-around;'>
            <img src='../assets/cru.webp' alt='illustrasicru'/>
            <div style='display: flex; justify-content: space-around;'>
              <div class='status'>
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
      <div class='tabel_problem unit'>
        <h1 class='top-title' style='margin-bottom: 20px; margin-top: 0; font-size: 1.5em;'>Status Unit Elektrifikasi </h1>
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
              $no = 1;
              $data = mysqli_query($hostptba, 'select * from T_UNIT');
              while ($t_unit = mysqli_fetch_array($data)){
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
      </div>
    </div>
    <div class='content3' id='singleline'>
      <div class='tabel_problem unit' style='width: 88%'>
        <h1 class='top-title' style='margin-bottom: 20px; margin-top: 0; font-size: 1.5em;'>Single Line Unit Perawatan Elektrifikasi </h1>
        <figure>
          <img src='../assets/singleline.webp' style='width: 100%; border-radius: 10px; box-shadow: 0 0 10px 0 #30475E60' >
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
                  'rgba(48, 71, 94, 0.5)',
				          'rgba(255, 99, 132, 0.5)', 
                ],
                borderColor: [
                  'rgba(48, 71, 94, 1)',
					        'rgba(255, 99, 132, 1)',
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
                label: 'Persentase Timesheet dan Preventif',
                data: [
                    100,
                    100,
                ],
                backgroundColor: [
                  'rgba(8, 129, 157, 0.5)',
				          'rgba(206, 5, 32, 0.5)', 
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
            backgroundColor: 'rgb(107, 122, 161, 0.6)',
            borderColor: '#6B7AA1',
            borderWidth: 1
          },
          {
            label: 'Kabel 3 x 70mm2',
            data: [<?php  echo $pjgkabel33001; ?>, <?php echo $pjgkabel33002 ?>, <?php echo $pjgkabel33003 ?>, <?php echo $pjgkabel33004 ?>, <?php echo $pjgkabel33005 ?>, <?php echo $pjgkabel33006 ?>, <?php echo $pjgkabel33007 ?>],
            backgroundColor: 'rgb(143, 193, 212, 0.6)',
            borderColor: '#8FC1D4',
            borderWidth: 1
          },
          {
            label: 'Kabel 3 x 50mm2',
            data: [<?php  echo $pjgkabel23001; ?>, <?php echo $pjgkabel23002 ?>, <?php echo $pjgkabel23003 ?>, <?php echo $pjgkabel23004 ?>, <?php echo $pjgkabel23005 ?>, <?php echo $pjgkabel23006 ?>, <?php echo $pjgkabel23007 ?>],
            backgroundColor: 'rgb(255, 184, 48, 0.6)',
            borderColor: '#FFB830',
            borderWidth: 1
          },
          
          {
            label: 'Kabel 3 x 95mm2',
            data: [<?php  echo $pjgkabel43001; ?>, <?php echo $pjgkabel43002 ?>, <?php echo $pjgkabel43003 ?>, <?php echo $pjgkabel43004 ?>, <?php echo $pjgkabel43005 ?>, <?php echo $pjgkabel43006 ?>, <?php echo $pjgkabel43007 ?>],
            backgroundColor: 'rgb(240, 217, 255, 0.6)',
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
            label: 'CRU',
            data: [<?php echo $cruready ?>, <?php echo $crubreakdown ?>,<?php echo $crustandby ?>],
            backgroundColor: 'rgb(161, 37, 104, 0.5)',
            borderColor: '#A12568',
            borderWidth: 1
          },
          {
            label: 'SSU',
            data: [<?php echo $ssuready ?>, <?php echo $ssubreakdown ?>,<?php echo $ssustandby ?>],
            backgroundColor: 'rgb(59, 24, 95, 0.5)',
            borderColor: '#3B185F',
            borderWidth: 1
          },
          {
            label: 'TSU',
            data: [<?php echo $tsuready ?>, <?php echo $tsubreakdown ?>,<?php echo $tsustandby ?>],
            backgroundColor: 'rgb(75, 101, 135, 0.5)',
            borderColor: '#4B6587',
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