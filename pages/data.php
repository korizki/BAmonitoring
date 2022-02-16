<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='description' 
          content = 'Halaman menampilkan Summary Data yang dikemas dalam Grafik untuk menyatakan suatu kondisi.' />
    <title>Data Management System</title>
    <link rel='manifest' href='manifest.webmanifest'>
    <link rel='icon' href='logo1.png'>
    <link rel='stylesheet' href='../assets/css/index.css'>
    <link rel='stylesheet' href='../assets/css/styles.css'>
    <link rel='stylesheet' href='../assets/css/data.css'>
    <link rel='stylesheet' type='text/css' href='../assets/css/responsive.css'>
    <script defer src="../assets/css/all.js"></script>
    <script src='../script/script.js'></script>
</head>
<body>
  
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
  <!-- validasi login -->
  <?php 
    session_start();
    if (!isset($_SESSION['username'])){
      header("location: ../index.php");
    }
  ?>
  
  <div class='flex'>
    <aside>
        <p>Hello, </p>
        <img src='../assets/user.png' style='width: 100px;'>
        <h1 style='margin-bottom: 35px;'><?php echo $_SESSION['username'] ?></h1>
        <div class='timeinfo'>
          <p> Last Log In : </p>
          <p><?php
            date_default_timezone_set('Asia/Jakarta'); 
            echo date('d-m-Y H:i:s') ?>
          </p>
        </div>
        <div class='boxSideMenu'>
          <a href="data.php?content=summary" class='sideMenu' ><i class="fa fa-lg fa-chart-bar" ></i>Summary</a>
          <a href="data.php?content=problem" class='sideMenu' ><i class="fa fa-lg fa-exclamation-circle" ></i>Problem</a>
          <a href="data.php?content=unit" class='sideMenu'><i class="fa fa-lg fa-charging-station"></i>Unit</a>
          <a href="data.php?content=kabel" class='sideMenu'><i class="fa fa-lg fa-ruler-combined"></i>Cable Usage</a>
        </div>
    </aside>
    <div class='dMainContent' style="padding-top: 20px;">
      <!-- Header -->
      <div style='display: flex; justify-content: space-between' style="color: blue; " >
        <img src='../assets/logoptba.png' style='width: auto; height: 35px; margin-right: 20px;'>
        <h1>Management Data</h1>
        <a class='round-button refresh' href='data.php' title="Refresh"><i  class="fa  fa-lg fa-sync-alt" style="margin-top: 2px; margin-left: 2px;" ></i></a>
        <a class='round-button logout' onClick = 'return confirm("Do you want to Log Off?")' href='../phpcode/logout.php' title="Log Out"><i  class="fa  fa-lg fa-power-off" style="margin-top: 2px; margin-left: 2px;" ></i></a>
      </div>
    </div>
  </div>
    <!-- Cek Halaman -->
    <?php
      if(isset($_GET['content'])){
        $content = $_GET['content'];
        switch($content){
          case 'summary' :
            include "summaryProblem.php";
            break;
          case 'problem':
            include "problem/dataProblem.php";
            break;
          case 'problemedit':
            include "problem/dataProblem.php";
            echo "
            <script>
              setTimeout(function(){
                const notif = document.querySelector('.notifact');
                notif.style.top = '-60px';
              },2500)
            </script>
            <span class='notifact ngreen'>Update data berhasil.</span>";
            break;
          case 'problemdelete' : 
            include "problem/dataProblem.php";
            echo "
            <script>
              setTimeout(function(){
                const notif = document.querySelector('.notifact');
                notif.style.top = '-60px';
              },2500)
            </script>
            <span class='notifact nred'>Data telah dihapus.</span>";
            break;
          case 'unit' : 
            include "unit/dataUnit.php";
            break;
          case 'unitedit' : 
            include "unit/dataUnit.php";
            echo "
            <script>
              setTimeout(function(){
                const notif = document.querySelector('.notifact');
                notif.style.top = '-60px';
              },2500)
            </script>
            <span class='notifact ngreen'>Update data berhasil.</span>";
            break;
          case 'unitdelete' : 
            include "unit/dataUnit.php";
            echo "
            <script>
              setTimeout(function(){
                const notif = document.querySelector('.notifact');
                notif.style.top = '-60px';
              },2500)
            </script>
            <span class='notifact nred'>Data telah dihapus.</span>";
            break;
          case 'kabel' : 
            include "kabel/dataKabel.php";
            break;
          case 'kabeledit' : 
            include "kabel/dataKabel.php";
            echo "
            <script>
              setTimeout(function(){
                const notif = document.querySelector('.notifact');
                notif.style.top = '-60px';
              },2500)
            </script>
            <span class='notifact ngreen'>Update data berhasil.</span>";
            break;
          case 'kabeldelete' : 
            include "kabel/dataKabel.php";
            echo "
            <script>
              setTimeout(function(){
                const notif = document.querySelector('.notifact');
                notif.style.top = '-60px';
              },2500)
            </script>
            <span class='notifact nred'>Data telah dihapus.</span>";
            break;
          default:
            echo "<center>Maaf, Halaman tidak ditemukan! </center>";
            break;
        }
      } else {
        include "summaryProblem.php";
      };
      
    ?>
    <!-- Data Problem -->
  

    <!-- Input Data Problem -->
    <div class='outer-box' id='outer'>
      <div class='form-input'>
        <form method='post'>
          <h2 class='title' style='margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid rgba(67, 96, 106, 0.20);'>Input Data Problem </h2> 
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
          <div class='flex' style='gap: 10px;'>
            <div style="flex: 1">
              <p><label for='power'>Power Type</label></p>
              <select id="power" name="power">
                <option value disabled selected></option>
                <option value="6 KV">6 KV</option>
                <option value="20 KV">20 KV</option>
              </select>
              
            </div>
            <div style="flex: 1">  
              <p><label for='unit'>Unit</label></p>
              <select id="unit" name="unit">
                <option value disabled selected></option>
                <option value="All Unit">All Unit</option>
                <option value="CRU PIT-2">CRU PIT-2</option>
                <option value="CRU PIT-3">CRU PIT-3</option>
              </select>
             
            </div>
            <div style="flex: 1">
              <p><label for='lokasi'>Location</label></p>
              <select id="lokasi" name="lokasi">
                <option value disabled selected></option>
                <option value="PIT-2 Banko Barat">PIT-2 Banko Barat</option>
                <option value="PIT-3 Banko Barat">PIT-3 Banko Barat</option>
                <option value="Other Location">Other Location</option>
              </select>
              
            </div>
          </div>
          <div>
            <p><label for='grup'>Group</label></p>
            <select id="grup" name="grup">
              <option value disabled selected></option>
              <option value="Grup A">Grup A</option>
              <option value="Grup B">Grup B</option>
              <option value="Grup C">Grup C</option>
              <option value="Grup D">Grup D</option>
            </select>
          
          </div>
          <div class='flex' style="gap: 10px">
            <div style="flex: 1">
              <p><label for='start-time'>Start Time</label></p>
              <input type='datetime-local' id='start-time' name='start-time'></input>
            </div>
            <div style="flex: 1">
              <p><label for='end'>End Time</label></p>
              <input type='datetime-local' id='end-time' name='end-time' onChange='getDurasi()'></input>
            </div>
          </div>
          <div>
            <p><label for='durasi'>Duration (Hour's) </label></p>
            <input type='text' id='durasi' name='durasi'  ></input>
          </div>
          <div>
            <p><label for='problem'>Detail Problem</label></p>
            <textarea  spellcheck='false' type='text' id='problem' name='problem'/></textarea>
          </div>
          <div>
            <p><label for='action'>Action for Problem</label></p>
            <textarea  spellcheck='false' type='text' id='action' name='action'></textarea>
          </div>
          <div>
            <input type='submit' class='submit' value='Submit' name='simpan'>
          </div>
        </form>
        <a style='display: block; text-align: center' class='cancel' onClick='hideForm()' href='#'>Cancel</a>
      </div>
    </div>
  
  
  <script><?php require_once('../script/script.js'); ?></script>
  <script><?php require_once('sw.js'); ?></script>
  </body>
  </html>