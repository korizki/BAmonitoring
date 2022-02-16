<?php
	include 'connection.php';
	if(isset($_POST['simpan'])){
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
		header("location: ../pages/data.php?content=problemedit");
	}

	// Simpan data Unit
	if(isset($_POST['simpan_unit'])){
		$id_unit = $_POST['id_unit'];
		$name = $_POST['NAMA_UNIT'];
		$location = $_POST['LOKASI'];
		$condition = $_POST['KONDISI'];
		$lane = $_POST['JALUR'];
		$queryedit = mysqli_query($hostptba, "update T_UNIT set
		NAMA_UNIT = '$name',
		LOKASI = '$location',
		KONDISI = '$condition',
		JALUR = '$lane' where ID ='$id_unit'
		");
		if($queryedit){
			header("location: ../pages/data.php?content=unitedit");
		} else {
			echo "Data Gagal Disimpan";
		}
	}

?>