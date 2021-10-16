<?php
// Koneksi ke host dan database 
  include 'connection.php';

// Ambil data dari komponen input
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
        $success = "
        <div class='notifInput'>
          <div>Data berhasil disimpan.</div>
        </div>
        ";
        $failed = "";
    } else {
        $failed = "
        <div class='notifInput failed'>
          <div>Data gagal disimpan, silahkan periksa kembali!</div>
        </div>
        ";
        $success = " ";
    }
// mengalihkan halaman ke index.php
header('location: ../pages/ptba.php');

?>