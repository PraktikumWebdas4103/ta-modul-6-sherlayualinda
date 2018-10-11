<?php 
session_start();
include_once 'koneksi.php';
?>

<body>
	<center> <font size="10">Form Login<br><br></font> 
		<table border="1">
			<tr>
				<td>
						<table>
							<form action=" " method="POST">
							<tr>
								<td><input type="text" name="username" placeholder="username"></td>
							</tr>
							<tr>
								<td><input type="password" name="password" placeholder="Password"></td>
							</tr>
							<tr>
								<td><input type="submit" name="submit" value="kirim"></td>
							</tr>
						</table>
				</td>
			</tr>
		</table>
	
</body>


<?php
include "koneksi.php";
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$masuk = mysqli_query($koneksi,"SELECT `nim` FROM `user` WHERE username = '$username' && password = '$password'");
	$num = mysqli_num_rows($masuk);
	$data = mysqli_fetch_array($masuk);
	if ($num > 0) {
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $data['nim'];
		header("location: editprofile.php");
	}
}
?>
