<?php 
// Menghubungkan file koneksi ke XAMPP 
include 'connection.php';
// cek session
error_reporting(0);
session_start();
if (isset($_SESSION['username'])){
header("location: data.php");
}
// Mendapatkan nilai dari form input
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($hostptba, "select * from T_USER where USERNAME='$username' and password='$password'");
$cek = mysqli_num_rows($query);
if ($cek == 1){
    $infouser = $username;
    $_SESSION['username'] = $username;
    header("location: ../pages/data.php");
} else {
    echo "<script>";
    echo "alert('Username atau password yang anda masukan salah.')";
    echo "</script>";
}
echo "<a href='../index.php'>Kembali ke Halaman Utama </a>"
?>