<?php 
include_once("koneksi.php");
session_start();
$id = $_SESSION['id'];
$username =$_SESSION['username'];
?>
	
	<br><br><br><center><table border="1">
		<tr>
			<td>
				<table>
					<tr>
						<td><a href="semuaposting.php">Semua Postingan |</a></td>
						<td><a href="daftarposting.php">Postinganku</a></td>
					</tr>
				</table>

				<table bgcolor="skyblue">
					<form action="proses_posting.php" method="POST" enctype="multipart/form-data">
						<tr>
							<td>Judul</td>
							<td>
								<input type="text" name="judul">
							</td>
						</tr>
						<tr>
							<td>Cerita</td>
							<td>
								<textarea name="cerita" rows="20" cols="80"></textarea>
							</td>
						</tr>
						<tr>
							<td>Foto</td>
							<td>
								<input type="file" name="foto">
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="submit" name="submit" value="submit">
							</td>
						</tr>
					</form>
				</table>
			</td>
		</tr>
	</table>
	