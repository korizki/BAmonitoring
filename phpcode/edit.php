<?php
    include 'connection.php';
	$id = $_POST['id'];
	$power = $_POST['power'];
	$unit = $_POST['unit'];
	$lokasi = $_POST['lokasi'];
	$grup = $_POST['grup'];
	$start = $_POST['start-time'];
	$end = $_POST['end-time'];
	$durasi = $_POST['durasi'];
	$problem = $_POST['problem'];
	$action = $_POST['action'];

	$oke = mysqli_query($hostptba, "update T_HALANGAN set 
	power = '$power',
	unit = '$unit', lokasi = '$lokasi', grup = '$grup', 
	start = '$start', end = '$end', total = '$durasi',
	problem = '$problem', action_problem = '$action' where id='$id'");

	header("location: ../pages/data.php?content=problemedit")

?>