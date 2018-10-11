<?php 
include_once("koneksi.php");
session_start();
$id = $_SESSION['id'];
$username =$_SESSION['username'];
$query="SELECT
		    `nim`,
		    `username`,
		    `password`,
		    `nama`,
		    `kelas`,
		    `jenis`,
		    `hobi`,
		    `fakultas`,
		    `alamat`
		FROM
		    `user`
		WHERE nim='$id'";
	$result=mysqli_query($koneksi,$query);
	$data=mysqli_fetch_array($result);
?>
<br><br><br><center>
	<table border="1">
	<tr><td><table>
	<tr>
		<td><a href="logOut.php">Logout |</a></td>
		<td><a href="editprofile.php?id=<?php echo $id; ?>">Edit Profil |</a></td>
		<td><a href="posting.php?id=<?php echo $id; ?>">Edit Profil</a></td>
	</tr>
	</table></td></tr>


	<tr><td><table>
		<tr><td colspan="3"><h3>Selamat Datang, <?php echo $username; ?></h3></td></tr>
		
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?php echo $data['nama']; ?></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td><?php echo $data['jenis']; ?></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>:</td>
			<td><?php echo $data['kelas']; ?></td>
		</tr>
		<tr>
			<td>Hobby</td>
			<td>:</td>
			<td><?php echo $data['hobi']; ?></td>
		</tr>
		<tr>
			<td>Fakultas</td>
			<td>:</td>
			<td><?php echo $data['fakultas']; ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?php echo $data['alamat']; ?></td>
		</tr>

		<tr>
			<td align="center" colspan="2"><a href="posting.php">Post!</a></td>
		</tr>
	</table></td></tr>
</table>
