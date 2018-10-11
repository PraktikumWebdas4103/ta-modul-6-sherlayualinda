<?php
	session_start();
?>
<form action=" " method="POST">
	<br><br><br><center><table border="1">
		<tr>
			<td>
				<table>
					<tr>
						<td>NIM</td>
						<td>:</td>
						<td><input type="text" name="nim" required></td>
					</tr>
					<tr>
						<td>Username</td>
						<td>:</td>
						<td><input type="text" name="username" required></td>
					</tr>
					<tr>
						<td>Password :</td>
						<td>:</td>
						<td><input type="password" name="password" required></td>
					</tr>
					<tr>
						<td>Repassword :</td>
						<td>:</td>
						<td><input type="password" name="repassword"></td>
					</tr>
					<tr>
						<td><input type="submit" name="submit" value="submit"></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

	
</form>

<?php
include "koneksi.php";
if (isset($_POST['submit'])) {
	$nim = $_POST['nim'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$masuk = mysqli_query($koneksi,"INSERT INTO user(nim, username, password) VALUES ('$nim','$username','$password')");
	if ($masuk) {
		$_SESSION['username'] = $username;
		header("location: login.php");
	}
}
?>

