<?php 
// include connection
include "connection.php";

$target_dir ="../assets/uploaded/";
$target_file = $target_dir.basename($_FILES["uploadBtn"]["name"]);
$uploadOK = 1;
if(file_exists($target_file)){
    echo "Sorry, file already exists";
    $uploadOK = 0;
}
if(isset($_POST["upload"])){
    if($uploadOK == 0){
        header("Location: ../pages/upload/manualbook.php?status_upload=gagal");
    } else {
        // menyalin file ke director tujuan
        if(move_uploaded_file($_FILES["uploadBtn"]["tmp_name"], $target_file)){
            echo "File ".htmlspecialchars(basename($_FILES["uploadBtn"]["name"]))." has been uploaded.";
        }
        // // ambil nama file
        $fileName = $_FILES["uploadBtn"]["name"];
        $doc_type = $_POST['doctype'];
        $user = "Administrator";
        $date = date("Y-m-d");
        // // menyimpan data file kedalam database
        $insertdata = mysqli_query($hostptba, "INSERT INTO t_file VALUES(NULL, '$date', '$user', '$fileName','$doc_type' )");
        // // redirecting ke halaman utama upload
        if($doc_type == 'Manual Book'){
            header("Location: ../pages/upload/manualbook.php?status_upload=berhasil");
        } else if($doc_type == 'Nota Dinas'){
            header("Location: ../pages/upload/notadinas.php?status_upload=berhasil");
        } else if($doc_type == 'Single Line Diagram'){
            header("Location: ../pages/upload/singlelinediagram.php?status_upload=berhasil");
        } else if($doc_type == 'Berita Acara Kejadian'){
            header("Location: ../pages/upload/bak.php?status_upload=berhasil");
        }
        

    }
}
?>