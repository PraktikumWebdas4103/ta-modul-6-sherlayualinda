<?php 
session_start();
include_once 'koneksi.php';
$id = $_SESSION['id'];
$query = "SELECT `nim`, `username`, `password`, `nama`, `kelas`, `jenis`, `hobi`, `fakultas`, `alamat` FROM `user` WHERE nim='$id'";
$result = mysqli_query($koneksi, $query);
$d = mysqli_fetch_array($result);
?>
<form action=" " method="POST">
	<br><br><br><center>
		<table border="1">
			<tr>
				<td>
					<table>
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td><input type="text" name="nama" value="<?php echo $d['nama']; ?>"></td>
						</tr>
						<tr>
							<td>NIM</td>
							<td>:</td>
							<td><input type="text" name="nim" value="<?php echo $d['nim']; ?>"></td>
						</tr>
						<tr>
							<td>Kelas</td>
							<td>:</td>
							<td><input type="radio" name="kelas" value="D3MI4101" <?php echo $d['kelas'] == "D3MI4101" ? "checked" : ""; ?>>D3MI4101</td>
							<td><input type="radio" name="kelas" value="D3MI4102" <?php echo $d['kelas'] == "D3MI4102" ? "checked" : ""; ?>>D3MI4102</td>
							<td><input type="radio" name="kelas" value="D3MI4103" <?php echo $d['kelas'] == "D3MI4103" ? "checked" : ""; ?>>D3MI4103</td>
							<td><input type="radio" name="kelas" value="D3MI4104" <?php echo $d['kelas'] == "D3MI4104" ? "checked" : ""; ?>>D3MI4104</td>
						</tr>
						<tr>
							<td>Jenis kelamin</td>
							<td>:</td>
							<td><input type="radio" name="jenis" value="laki-laki" <?php echo $d['jenis'] == "laki-laki" ? "checked" : ""; ?>>laki-laki</td>
							<td><input type="radio" name="jenis" value="perempuan" <?php echo $d['jenis'] == "perempuan" ? "checked" : ""; ?>>perempuan</td>
						</tr>
						<tr>
							<td>Hobby</td>
							<td>:</td>
							<?php 
							$hobby = explode(", ", $d['hobi']);
							?>
							<td><input type="checkbox" name="hobi[]" value="Makan" <?php echo in_array("Makan", $hobby) ? "checked" : ""; ?>>Makan</td>
							<td><input type="checkbox" name="hobi[]" value="Berenang" <?php echo in_array("Berenang", $hobby) ? "checked" : ""; ?>>Berenang</td>
							<td><input type="checkbox" name="hobi[]" value="Basket" <?php echo in_array("Basket", $hobby) ? "checked" : ""; ?>>Basket</td>
							<td><input type="checkbox" name="hobi[]" value="Lari" <?php echo in_array("Lari", $hobby) ? "checked" : ""; ?>>Lari</td>
							<td><input type="checkbox" name="hobi[]" value="Belajar" <?php echo in_array("Belajar", $hobby) ? "checked" : ""; ?>>Belajar</td>
							<td><input type="checkbox" name="hobi[]" value="Menulis" <?php echo in_array("Menulis", $hobby) ? "checked" : ""; ?>>Menulis</td>
						</tr>
						<tr>
							<td>Fakultas</td>
							<td>:</td>
							<td><select name="fakultas">
								<option value="fit" <?php echo $d['fakultas'] == "fit" ? "selected='selected'" : ""; ?>>Fakultas Ilmu Terapan</option>
								<option value="fik" <?php echo $d['fakultas'] == "fik" ? "selected='selected'" : ""; ?>>Fakultas Ildustri Kreatif</option>
								<option value="fkb" <?php echo $d['fakultas'] == "fkb" ? "selected='selected'" : ""; ?>>Fakultas Komunikasi dan Bisnis</option>
								<option value="fri" <?php echo $d['fakultas'] == "fri" ? "selected='selected'" : ""; ?>>Fakultas Rekayasa Industri</option>
								<option value="fte" <?php echo $d['fakultas'] == "fte" ? "selected='selected'" : ""; ?>>Fakultas Teknik elektro</option>
								<option value="fti" <?php echo $d['fakultas'] == "fti" ? "selected='selected'" : ""; ?>>Fakultas teknik Informatika</option>
							</select></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><input type="textarea" name="alamat" value="<?php echo $d['alamat']; ?>"></td>
						</tr>
						<tr>
							<td><input type="submit" name="submit" value="Masuk"></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		
</form>

<?php 
if (isset($_POST['submit'])) {
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$jenis = $_POST['jenis'];
	$hobby = implode(", ",$_POST['hobi']);
	$fakultas =$_POST['fakultas'];
	$alamat = $_POST['alamat'];


	$query="UPDATE
			    `user`
			SET
			    `nama` = '$nama',
			    `kelas` = '$kelas',
			    `jenis` = '$jenis',
			    `hobi` = '$hobby',
			    `fakultas` = '$fakultas',
			    `alamat` = '$alamat'
			WHERE
			    nim ='$id'
    ";
	$sukses = mysqli_query($koneksi,$query);
	if ($sukses) {
		header("location: halamanawal.php");
	}
}
?>
