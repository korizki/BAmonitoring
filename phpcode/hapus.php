<?php
    include 'connection.php';
    $id = $_GET['id'];
    $query = mysqli_query($hostptba, "DELETE FROM T_HALANGAN WHERE ID = '$id' ");
    header("location:../pages/data.php?content=problemdelete");

?>