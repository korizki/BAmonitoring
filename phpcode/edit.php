<?php
    include 'connection.php';
    $id = $_GET['id'];
    $data = mysqli_query($hostptba, "select * from T_HALANGAN where id='$id'");
	while($tabel = mysqli_fetch_array($data)){
		?>
		<form method="post" action="update.php">
			<table>
				<tr>			
					<td>Nama</td>
					<td>
						<input type="text" name="id" value="<?php echo $tabel['ID']; ?>">
					</td>
				</tr>
			</table>
		</form>
		<?php 
	}

?>