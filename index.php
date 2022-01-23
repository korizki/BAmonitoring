<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" 
        content = 'Halaman menampilkan Summary Data yang dikemas dalam Grafik untuk menyatakan suatu kondisi.' />
  <link rel="icon" href="icon.png">
  <link rel='stylesheet' href='assets/css/index.css'>
  <link rel='stylesheet' href='assets/css/styles.css'>
  <link rel='stylesheet' href='assets/css/responsive.css'>
  <link rel="manifest" href="manifest.json">
  <script defer src="assets/css/all.js"></script>
  <title>Bukit Asam Monitoring</title>
</head>
<body style='height: 1400px'>
  <nav class='navbar'>
    <div><a href='#'><img src='assets/logoptba.png' class='navicon'></a></div>
    <ul>
      <a href='#benefit'><li class='link'>Benefit </li></a>
      <a href='#data'><li class='link2'>Contents</li></a>
      <a href='#' onClick = 'showLogin()' ><li class='link3'>Data Inventory</li></a>
    </ul>
  </nav>
  
  <?php 
    if(isset($_GET['page'])){
      $page = $_GET['page'];

      switch($page){
        case 'listrik':
          include "pages/listrik.php";
          break;
        case 'appt':
          include "pages/appt.php";
          break;
        case 'mesin':
          include "pages/mesin.php";
          break;
        default:
          echo "<center>Maaf halaman tidak ditemukan </center>";
          break;
      }
    } else {
      include "pages/home.php";
    }
  ?>
<script>
  <?php require_once('script/script.js')?>
</script>
<footer>
    <section>
      <figure class='ftIcon'>
        <img src='assets/logoptba.png' width='auto' height='40px' alt='iconptba'>
      </figure>
      <div class='corpInfo'>
        <h1>PT. Bukit Asam (Persero) Tbk.</h1>
        <p><i class='fa fa-map-marker-alt'></i>Jl. Parigi No.1, Tanjung Enim, Sumatera Selatan</p>
        <p><i class='fa fa-envelope'></i>corsec@ptba.co.id</p>
        <p><i class='fa fa-phone'></i>(+62) 734 451 096</p>
        <p><i class='fa fa-globe'></i><a href='https://www.ptba.co.id'>https://www.ptba.co.id</a></p>
      </div>
    </section>
    <section> 
      <div>
        <p style='margin-bottom: 15px;'>Developed by : Rizki Ramadhan</p>
        <p class='sosmed'><i class='fa fa-envelope'></i><a target='blank' href='mailto:rzk.ramadhan@gmail.com'>  rzk.ramadhan@gmail.com</a></p>
        <p class='sosmed'><i class='fab fa-linkedin-in'></i><a target='blank' href='https://www.linkedin.com/in/korizki/'> Rizki Ramadhan</a></p>
        <p class='sosmed'><i class='fab fa-instagram'></i><a target='blank' href='https://www.instagram.com/ko_rizki/'>  ko_rizki</a></p>
      </div>
    </section>
  </footer>
  <script>
    if('serviceWorker' in navigator){
      navigator.serviceWorker
        .register('sw.js')
        .then(function(){
          console.log('Service Worker Registered');
        });
    } 
  </script>
</body>
</html>