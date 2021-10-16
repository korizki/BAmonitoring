
<?php 
// mengecek nilai input tanggal awal dan tanggal akhir
if(isset($_GET['filterdata'])){
    $tawal = $_GET['tawal'];
    $takhir = $_GET['takhir'];
    // memuat data dari periode tanggal awal dan akhir
    $sql = mysqli_query($hostptba, "select * from T_HALANGAN where START between '$tawal' and '$takhir' ");

    $jumlah_total = mysqli_query($hostptba, "select sum(TOTAL) as JUMLAH from T_HALANGAN where START between '$tawal' and '$takhir'");
    $jumlahjam20 = mysqli_query($hostptba, "select sum(TOTAL) as JUMLAH20 from T_HALANGAN where START between '$tawal' and '$takhir' and POWER = '20 KV'");
    $jumlahjam6 = mysqli_query($hostptba, "select sum(TOTAL) as JUMLAH6 from T_HALANGAN where START between '$tawal' and '$takhir' and POWER = '6 KV'");

    $data = mysqli_fetch_array($jumlah_total);
    $data20 = mysqli_fetch_array($jumlahjam20);
    $data6 = mysqli_fetch_array($jumlahjam6);

    $ketersediaanpower = 720 - $data['JUMLAH'];
    $ketersediaanpowerpersen = 100 - $data['JUMLAH']/720 * 100;
    $halangan20 = $data20['JUMLAH20'];
    $halangan6 = $data6['JUMLAH6'];
    $halangan = $data['JUMLAH'];
    $halanganpersen = $data['JUMLAH']/720 * 100;

    $jumlahHalangan20 = mysqli_query($hostptba, "select * from T_HALANGAN where START between '$tawal' and '$takhir' and POWER = '20 KV'");
    $jumlahHalangan6 = mysqli_query($hostptba, "select * from T_HALANGAN where START between '$tawal' and '$takhir' and POWER = '6 KV'");
    $jumlahTotal = mysqli_query($hostptba, "select * from T_HALANGAN where START between '$tawal' and '$takhir'");

    $tawalnew = date('d/m/Y', strtotime($tawal));
    $takhirnew = date('d/m/Y', strtotime($takhir));
} else {
    // header('location: ../pages/ptba.php');
    $sql = mysqli_query($hostptba, "select * from T_HALANGAN");
}
?>