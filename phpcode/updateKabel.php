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
      $query_mysql = mysqli_query($hostptba, "select * from T_KABEL where id = '$id'");
      while ($dataedit = mysqli_fetch_array($query_mysql)){
      ?>
        <div class='edit-box addunit' id='outer-edit'>
          <div class='form-input'>
            <form action='edit.php' method='post'>
              <h2 class='title' style='margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid rgba(67, 96, 106, 0.20); font-weight: 600'>Edit Cable Usage </h2> 
              <div class='flex' style='gap: 10px; flex-direction: column'>
                <input type='hidden' name='id_kabel' id='id' value="<?php echo $dataedit['ID']?>" >
                <div>
                    <p><label for='shovel'>Unit Name </label></p>
                    <select name="SHOVEL" id="shovel">
                        <option value="" disabled selected>-- Select Unit --</option>
                        <option value="SE-3001" <?php echo ($dataedit['SHOVEL'] == 'SE-3001' ? "selected" : "" )?>>SE-3001</option>
                        <option value="SE-3002" <?php echo ($dataedit['SHOVEL'] == 'SE-3002' ? "selected" : "" )?>>SE-3002</option>
                        <option value="SE-3003" <?php echo ($dataedit['SHOVEL'] == 'SE-3003' ? "selected" : "" )?>>SE-3003</option>
                        <option value="SE-3004" <?php echo ($dataedit['SHOVEL'] == 'SE-3004' ? "selected" : "" )?>>SE-3004</option>
                        <option value="SE-3005" <?php echo ($dataedit['SHOVEL'] == 'SE-3005' ? "selected" : "" )?>>SE-3005</option>
                        <option value="SE-3006" <?php echo ($dataedit['SHOVEL'] == 'SE-3006' ? "selected" : "" )?>>SE-3006</option>
                        <option value="SE-3007" <?php echo ($dataedit['SHOVEL'] == 'SE-3007' ? "selected" : "" )?>>SE-3007</option>
                    </select>
                </div>
                <div>
                    <p><label for="cable">Cable Type</label></p>
                    <select name="KABEL" id="cable">
                        <option value="" disabled selected>-- Select Cable --</option>
                        <option value="Kabel 3 x 35mm2" <?php echo ($dataedit['KABEL'] == 'Kabel 3 x 35mm2' ? "selected" : "" )?>>Kabel 3 x 35mm2</option>
                        <option value="Kabel 3 x 50mm2" <?php echo ($dataedit['KABEL'] == 'Kabel 3 x 50mm2' ? "selected" : "" )?>>Kabel 3 x 50mm2</option>
                        <option value="Kabel 3 x 70mm2" <?php echo ($dataedit['KABEL'] == 'Kabel 3 x 70mm2' ? "selected" : "" )?>>Kabel 3 x 70mm2</option>
                        <option value="Kabel 3 x 95mm2" <?php echo ($dataedit['KABEL'] == 'Kabel 3 x 95mm2' ? "selected" : "" )?>>Kabel 3 x 95mm2</option>
                    </select>
                </div>
                <div>
                    <p><label for='usage'>Usage (in meter's)</label></p>
                    <input type="text" id='usage' name='PANJANG' value="<?php echo ($dataedit['PANJANG'] )?>">
                </div>
                <div>
                    <input type='submit' class='submit' value='Submit' name='simpan_kabel'>
                </div>
            </form>
            <a class='cancel'  style="text-align: center" href="../pages/data.php?content=kabel">Cancel</a>
          </div>
        </div> <?php
      }
    ?>
</body>
</html>