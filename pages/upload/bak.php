<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Of Berita Acara Kejadian</title>
    <link rel='icon' href='../../icon.png'>
    <link rel='stylesheet' href='../../assets/css/index.css'>
    <link rel='stylesheet' href='../../assets/css/styles.css'>
    <link rel='stylesheet' type='text/css' href='../../assets/css/responsive.css'>
    <script defer src="../../assets/css/all.js"></script>
</head>
<body id="uploadContent">
    <?php 
        if(isset($_GET['status_upload'])){
            if($_GET['status_upload'] == 'berhasil'){
                echo "<script>alert('File berhasil diupload.')</script>";
            } else {
                echo "<script>alert('File gagal diupload / File sudah ada, silahkan periksa kembali.')</script>";
            }
        }
    
    ?>
    <header style="background: none" class="uploadPage">
        <div class="upHeader bak">
            <figure>
                <img src="../../assets/bak.svg" alt="illustration">
            </figure>
            <div class="textHeader">
                <h1>Berita Acara Kejadian</h1>
                <p>This page contains collection of Berita Acara Kejadian. You can Upload and Download all of document's. Wanna see other document's? Click on button bellow.</p>
                <div class="listButtons">
                    <a href="singlelinediagram.php"><i class="fa fa-file-signature"></i>Single Line Diagram</a>
                    <a href="notadinas.php"><i class="fa fa-file"></i>Nota Dinas</a>            
                    <a href="manualbook.php"><i class="fa fa-file-medical"></i>Manual Book</a>
                </div>
            </div>
        </div>
    </header>
    <article>
        <div class="contentTitle">
            <h1>List Of Document's</h1>
            <div class="rightBtn">
                <button id="upload"><i class="fa fa-upload"></i>Upload</button>
            </div>
        </div>
        <div class="uploadContent">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Document Name</th>
                        <th>Upload Date</th>
                        <th>Uploaded By</th>
                        <th>Document Type</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        include "../../phpcode/connection.php";
                        $no = 1;
                        $query = mysqli_query($hostptba, "SELECT * FROM t_file WHERE DOC_TYPE='Berita Acara Kejadian' ");
                        while ($row = mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['FILE_NAME']?></td>
                                <td><?php echo $row['DATE']?></td>
                                <td><?php echo $row['USER']?></td>
                                <td><?php echo $row['DOC_TYPE']?></td>
                                <td><a target="_blank" href="../../assets/uploaded/<?php echo $row['FILE_NAME']?>"><i class="fa fa-download"></i></a></td>
                            </tr>
                        <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </article>
    <div class="boxFormUpload">
        <div class="boxform">
            <h1>Upload Document</h1>
            <form class="form" action="../../phpcode/upload.php" method="post" enctype="multipart/form-data">
                <label for="namadokumen">Select Document Type </label>
                <select id="doctype" name="doctype">
                    <option value="Nota Dinas">Nota Dinas</option>
                    <option value="Manual Book">Manual Book</option>
                    <option value="Berita Acara Kejadian" selected>Berita Acara Kejadian</option>
                    <option value="Single Line Diagram">Single Line Diagram</option>
                    <option value="Other Document">Other Document</option>
                </select>
                <input id="uploadBtn" name="uploadBtn" type="file" accept="application/pdf" onChange="getName()">
                <input class="upSubmit" type="submit" value="Submit" name="upload">
            </form>
            <a class="cancelUploadBtn" href="#">Cancel</a>
        </div>
    </div>
    <script>
        const uploadForm = document.querySelector(".boxFormUpload");
        const cancel = document.querySelector(".cancelUploadBtn");
        cancel.addEventListener('click', function(){
            uploadForm.style.display="none";
        });
        const sideUpload = document.getElementById("upload");
        sideUpload.addEventListener('click', function(){
            const uploadForm = document.querySelector(".boxFormUpload");
            uploadForm.style.display="block";
        })
    </script>
    <script src='../../script/script.js'></script>
</body>
</html>