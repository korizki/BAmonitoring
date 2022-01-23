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
    <link rel='stylesheet' type='text/css' href='../assets/css/responsivex.css'>
    <script src='../script/script.js'></script>
</head>
<body>
  <?php
    include '../phpcode/connection.php';
    include '../phpcode/kabel.php';
  ?>
  <?php 
      $id = $_GET['id'];
      $query_mysql = mysqli_query($hostptba, "select * from T_HALANGAN where id = '$id'");
      while ($dataedit = mysqli_fetch_array($query_mysql)){
      ?>
        <div class='edit-box' id='outer-edit'>
          <div class='form-input'>
            <form action='edit.php' method='post'>
              <h2 class='title' style='margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid rgba(67, 96, 106, 0.20);'>Edit Problem </h2> 
              
              <div class='flex' style='gap: 10px;'>
              <input type='hidden' name='id' id='id' value="<?php echo $dataedit['ID']?>" >
                <div style="flex: 1">
                  <p><label for='power'>Power Type</label></p>
                  <select name="power" id="power">
                    <option value="6 KV" <?php if($dataedit["POWER"] == "6 KV") { echo "selected";}?>>6 KV</option>
                    <option value="20 KV" <?php if($dataedit["POWER"] == "20 KV") { echo "selected";}?> >20 KV</option>
                  </select>
                </div>
                <div style="flex: 1">  
                  <p><label for='unit'>Unit</label></p>
                  <select name="unit" id="unit">
                    <option value='All Unit' <?php if($dataedit['UNIT'] == "All Unit"){ echo "selected"; }?>>All Unit</option>
                    <option value='CRU PIT-2' <?php if($dataedit['UNIT'] == "CRU PIT-2"){ echo "selected"; }?>>CRU PIT-2</option>
                    <option value='CRU PIT-3' <?php if($dataedit['UNIT'] == "CRU PIT-3"){ echo "selected"; }?>>CRU PIT-3</option>
                  </select>
                </div>
                <div style="flex: 1">
                  <p><label for='lokasi'>Location</label></p>
                  <select name="lokasi" id="lokasi">
                    <option value='PIT-2 Banko Barat' <?php if($dataedit['LOKASI'] == "PIT-2 Banko Barat"){ echo "selected"; }?>>PIT-2 Banko Barat</option>
                    <option value='PIT-3 Banko Barat' <?php if($dataedit['LOKASI'] == "PIT-3 Banko Barat"){ echo "selected"; }?>>PIT-3 Banko Barat</option>
                    <option value='Other Location' <?php if($dataedit['LOKASI'] == "Other Location"){ echo "selected"; }?>>Other Location</option>
                  </select>
                </div>
              </div>
              <div>
                <p><label for='grup'>Group</label></p>
                <select name="grup" id="grup">
                  <option value='Grup A' <?php if($dataedit['GRUP'] == "Grup A"){ echo "selected"; }?>>Grup A</option>
                  <option value='Grup B' <?php if($dataedit['GRUP'] == "Grup B"){ echo "selected"; }?>>Grup B</option>
                  <option value='Grup C' <?php if($dataedit['GRUP'] == "Grup C"){ echo "selected"; }?>>Grup C</option>
                  <option value='Grup D' <?php if($dataedit['GRUP'] == "Grup D"){ echo "selected"; }?>>Grup D</option>
                </select>
              </div>
              <div class='flex' style="gap: 10px">
                <div style="flex: 1">
                  <p><label for='start-time'>Start Time</label></p>
                  <input type='datetime-local' id='start-time' name='start-time' value="<?php echo Date('Y-m-d\TH:i',strtotime($dataedit['START']))?>"></input>
                </div>
                <div style="flex: 1">
                  <p><label for='end'>End Time</label></p>
                  <input type='datetime-local' id='end-time' name='end-time' value="<?php echo Date('Y-m-d\TH:i',strtotime($dataedit['END']))?>" onChange='getDurasi()'></input>
                </div>
              </div>
              <div>
                <p><label for='durasi'>Duration (Hours) </label></p>
                <input type='text' id='durasi' name='durasi' value="<?php echo $dataedit['TOTAL']?>" ></input>
              </div>
              <div>
                <p><label for='problem'>Detail Problem</label></p>
                <textarea  spellcheck='false' type='text' id='problem' name='problem' ><?php echo $dataedit['PROBLEM']?></textarea>
              </div>
              <div>
                <p><label for='action'>Action for Problem</label></p>
                <textarea  spellcheck='false' type='text' id='action' name='action' ><?php echo $dataedit['ACTION_PROBLEM']?></textarea>
              </div>
              <div>
                <input type='submit' class='submit' value='Submit' name='simpan'>
              </div>
            </form>
            <button class='cancel'  onClick='window.location = "../pages/data.php?content=problem"'>Cancel</button>
          </div>
        </div> <?php
      }
    ?>
</body>
</html>