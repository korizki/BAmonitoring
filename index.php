<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name='description' 
          content = 'Halaman menampilkan Summary Data yang dikemas dalam Grafik untuk menyatakan suatu kondisi.' />
  <link rel='icon' href='icon.png'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  <link rel='stylesheet' href='assets/css/index.css'>
  <link rel='stylesheet' href='assets/css/style.css'>
  <link rel='stylesheet' href='assets/css/responsives.css'>
  <title>Bukit Asam Monitoring</title>
</head>
<body style='height: 1400px'>
  <nav class='navbar'>
    <div><a href='#'><img src='assets/logoptba.png' class='navicon'></a></div>
    <ul>
      <a href='#benefit'><li class='link'>Benefit</li></a>
      <a href='#data'><li class='link2'>Contents</li></a>
      <a target='blank' href='index.php?page=mesin' ><li class='link3'> Data Inventory</li></a>
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
        <p><i class='fa fa-map-marker'></i>Jl. Parigi No.1, Tanjung Enim 31716, Sumatera Selatan</p>
        <p><i class='fa fa-envelope'></i>corsec@ptba.co.id</p>
        <p><i class='fa fa-phone'></i>+(62) 734 451 096</p>
        <p><i class='fa fa-globe'></i><a href='https://www.ptba.co.id'>https://www.ptba.co.id</a></p>
      </div>
    </section>
    <section> 
      <div>
        <p style='margin-bottom: 15px;'>Developed by : Rizki Ramadhan</p>
        <p class='sosmed'><i class='fa fa-envelope'></i><a target='blank' href='mailto:rzk.ramadhan@gmail.com'>Gmail</a></p>
        <p class='sosmed'><i class='fa fa-linkedin-in'></i><a target='blank' href='https://www.linkedin.com/in/korizki/'>LinkedIn</a></p>
        <p class='sosmed'><i class='fa fa-instagram'></i><a target='blank' href='https://www.instagram.com/ko_rizki/'>Instagram</a></p>
      </div>
    </section>
  </footer>
</body>
</html>