<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File Test</title>
</head>
<body>
    <h1>Belajar Upload File</h1>
    <form action="proses.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="doc">Pilih File</label>
            <input type="file" name="doc" id="doc">
        </div>
        <br>
        <div>
            <input type="submit" name="submit" value="Upload File">
        </div>
        <br>
    </form>
</body>
</html>