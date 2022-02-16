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
      $query_mysql = mysqli_query($hostptba, "select * from T_UNIT where id = '$id'");
      while ($dataedit = mysqli_fetch_array($query_mysql)){
      ?>
        <div class='edit-box' id='outer-edit'>
          <div class='form-input'>
            <form action='edit.php' method='post'>
              <h2 class='title' style='margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid rgba(67, 96, 106, 0.20);'>Edit Unit </h2> 
              <div class='flex' style='gap: 10px; flex-direction: column'>
                <input type='hidden' name='id_unit' id='id' value="<?php echo $dataedit['ID']?>" >
                <div>
                    <p><label for='unit_name'>Unit Name (Ex. CRU 01)</label></p>
                    <input type="text" id='unit_name' name='NAMA_UNIT' value="<?php echo $dataedit["NAMA_UNIT"] ?>">
                </div>
                <div>
                    <p><label for="location">Location</label></p>
                    <select name="LOKASI" id="location">
                        <option value="" disabled selected>-- Select Location --</option>
                        <option value="PIT 2, Banko Barat" <?php echo ($dataedit["LOKASI"] == "PIT 2, Banko Barat" ? "selected" : "")?>>PIT 2, Banko Barat</option>
                        <option value="PIT 2 Jalan, Banko Barat" <?php echo ($dataedit["LOKASI"] == "PIT 2 Jalan, Banko Barat" ? "selected" : "")?>>PIT 2 Jalan, Banko Barat</option>
                        <option value="PIT 2 Front, Banko Barat" <?php echo ($dataedit["LOKASI"] == "PIT 2 Front, Banko Barat" ? "selected" : "")?>>PIT 2 Front, Banko Barat</option>
                        <option value="PIT 3, Banko Barat" <?php echo ($dataedit["LOKASI"] == "PIT 3, Banko Barat" ? "selected" : "")?>>PIT 3, Banko Barat</option>
                        <option value="PIT 3 Jalan, Banko Barat" <?php echo ($dataedit["LOKASI"] == "PIT 3 Jalan, Banko Barat" ? "selected" : "")?>>PIT 3 Jalan, Banko Barat</option>
                        <option value="PIT 3 Front, Banko Barat" <?php echo ($dataedit["LOKASI"] == "PIT 3 Front, Banko Barat" ? "selected" : "")?>>PIT 3 Front, Banko Barat</option>
                        <option value="PIT 3 Utara, Banko Barat" <?php echo ($dataedit["LOKASI"] == "PIT 3 Utara, Banko Barat" ? "selected" : "")?>>PIT 3 Utara, Banko Barat</option>
                        <option value="PIT 3 Selatan, Banko Barat" <?php echo ($dataedit["LOKASI"] == "PIT 3 Selatan, Banko Barat" ? "selected" : "")?>>PIT 3 Selatan, Banko Barat</option>
                    </select>
                </div>
                <div>
                    <p><label for="condition">Condition</label></p>
                    <select name="KONDISI" id="condition">
                        <option value="" disabled selected>-- Unit Condition --</option>
                        <option value="Ready" <?php echo ($dataedit["KONDISI"] == "Ready" ? "selected" : "")?>>Ready</option>
                        <option value="Breakdown" <?php echo ($dataedit["KONDISI"] == "Breakdown" ? "selected" : "")?>>Breakdown</option>
                        <option value="Standby" <?php echo ($dataedit["KONDISI"] == "Standby" ? "selected" : "")?>>Standby</option>
                    </select>
                </div>
                <div>
                    <p><label for='lane'>Lane </label></p>
                    <input type="text" id='lane' name='JALUR' value="<?php echo $dataedit["JALUR"]?>">
                </div>
                <div>
                    <input type='submit' class='submit' value='Submit' name='simpan_unit'>
                </div>
            </form>
            <button class='cancel'  onClick='window.location = "../pages/data.php?"'>Cancel</button>
          </div>
        </div> <?php
      }
    ?>
</body>
</html>