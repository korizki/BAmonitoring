<?php
    include 'connection.php';
    $id = $_GET['id'];
    $query = mysqli_query($hostptba, "DELETE FROM T_UNIT WHERE ID = '$id' ");
    header("location:../pages/data.php?content=unitdelete");

?>