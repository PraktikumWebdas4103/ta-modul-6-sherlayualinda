<?php
include_once 'koneksi.php';
session_start();
$id = $_SESSION['id'];
$username = $_SESSION['username'];
?>

<body>
	<center>Postingannya <?php echo $username; ?></center>
	<table border="1" align="center">
		<tr>
			<th width="200">Judul</th>
			<th width="500">Cerita</th>
			<th>ID User</th>
			<th>Tanggal</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
		<?php 
		$query = "
				SELECT
				    `postingan`.`id`,
				    `judul`,
				    `cerita`,
				    `user`.`nama` AS 'nama',
				    `tanggal`,
				    `postingan`.`foto`
				FROM
				    `postingan`
				JOIN USER ON `postingan`.`id_user` = `user`.`nim`
				WHERE `postingan`.`id_user` = '$id'
				";
		$result= mysqli_query($koneksi,$query);
		while($data=mysqli_fetch_array($result)){
		?>
		<tr>
			<td align="center">
				<?php
				echo $data['judul'];
				?>
			</td>
			<td align="center">
				<?php
				echo $data['cerita'];
				?>
			</td>
			<td align="center">
				<?php
				echo $data['nama'];
				?>
			</td>
			<td align="center">
				<?php
				echo $data['tanggal'];
				?>
			</td>
			<td align="center">
				<?php
				echo "<img src='terkirim/".$data['foto']."' width='200'>";
				?>
			</td>
			<td>Aksi</td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
