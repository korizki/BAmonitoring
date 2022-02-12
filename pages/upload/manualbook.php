<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Of Manual Book</title>
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
        <div class="upHeader">
            <figure>
                <img src="../../assets/manualbook.svg" alt="illustration">
            </figure>
            <div class="textHeader">
                <h1>Nota Dinas</h1>
                <p>This page contains collection of Nota Dinas. You can Upload and Download all of document's. Wanna see other document's? Click on button bellow.</p>
                <div class="listButtons">
                    <a href="#"><i class="fa fa-file"></i>Manual Book</a>
                    <a href="#"><i class="fa fa-file-signature"></i>Single Line Diagram</a>
                    <a href="#"><i class="fa fa-file-medical"></i>Berita Acara Kejadian</a>
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
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Nota Dinas No. 5</td>
                        <td>20 Februari 2020</td>
                        <td>Administator</td>
                        <td><a href="#"><i class="fa fa-download"></i></a></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nota Dinas No. 5</td>
                        <td>20 Februari 2020</td>
                        <td>Administator</td>
                        <td><a href="#"><i class="fa fa-download"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </article>
    <div class="boxFormUpload">
        <div class="boxform">
            <h1>Upload Document</h1>
            <form class="form" action="../../phpcode/upload.php" method="post" enctype="multipart/form-data">
                <label for="namadokumen">Please re-check your file (name and extension) before Upload.</label>
                <select id="doctype" name="doctype">
                    <option value="Nota Dinas">Nota Dinas</option>
                    <option value="Manual Book">Manual Book</option>
                    <option value="Berita Acara Kejadian">Berita Acara Kejadian</option>
                    <option value="Single Line Diagram">Single Line Diagram</option>
                </select>
                <input id="uploadBtn" name="uploadBtn" type="file" accept="application/pdf" onChange="getName()">
                <input class="upSubmit" type="submit" value="Submit" name="upload">
            </form>
            <a class="cancelUploadBtn" href="#">Cancel</a>
        </div>
    </div>
    <script src='../../script/script.js'></script>
</body>
</html>