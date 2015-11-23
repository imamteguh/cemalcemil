<?php
@session_start();
$info = "";
include('./koneksi/koneksi.php');
if(isset($_POST['login']))
{
	$user = $_POST['email'];
	$pass = md5($_POST['password']);
	$query = "select * from member where email = '".$user."' and password = '".$pass."' ";
	$login = mysql_query($query);
	if(mysql_num_rows($login)==1) {
		$_SESSION['email_login'] = $user;
		header("location:index.php");
	} else {
		$info = "MAAF KOMBINASI EMAIL DAN PASSWORD ANDA TIDAK TERDAFTAR.";
	}
}
?>
<div style="background:#c4c4c4; width:1024px; margin:0px auto;">
	<div><?php echo $info ?></div>
	<table width="100%">
		<tr>
		<td width="50%" style="padding:5px;" valign="top">
		<form method="post" action="">
			<table border="1" width="100%" style="background:#f4f4f4">
				<tr>
					<th align="center" colspan="2"><h3>LOGIN CEMALCEMIL</h3></th>
				</tr>
				<tr>
					<td align="right">EMAIL</td><td><input type="text" name="email" style="padding:5px;" size="30"></td>
				</tr>
				<tr>
					<td align="right">PASSWORD</td><td><input type="password" name="password" style="padding:5px;" size="30"></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" name="login" value="LOGIN" style="padding:5px; margin:5px 0px;">
						<input type="reset" name="batal" value="BATAL" style="padding:5px; margin:5px 0px;">
					</td>
				</tr>
			</table>
		</form>
		</td>
		<td width="50%" style="padding:5px;" valign="top">
		<form method="post" action="">
			<table border="1" width="100%" style="background:#f4f4f4">
				<tr>
					<th align="center" colspan="2"><h3>BELUM PUNYA AKUN?? DAFTAR GRATISS</h3></th>
				</tr>
				<tr>
					<td align="right">NAMA</td><td><input type="text" name="nama" style="padding:5px;" size="30"></td>
				</tr>
				<tr>
					<td align="right">EMAIL</td><td><input type="text" name="email" style="padding:5px;" size="30"></td>
				</tr>
				<tr>
					<td align="right">PASSWORD</td><td><input type="password" name="password" style="padding:5px;" size="30"></td>
				</tr>
				<tr>
					<td align="right">NO. TELP</td><td><input type="text" name="telp" style="padding:5px;" size="30"></td>
				</tr>
				<tr>
					<td align="right" valign="top">ALAMAT</td><td><textarea name="alamat" style="padding:5px;" rows="5" cols="30"></textarea></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" name="daftar" value="DAFTAR" style="padding:5px; margin:5px 0px;">
						<input type="reset" name="batal" value="BATAL" style="padding:5px; margin:5px 0px;">
					</td>
				</tr>
			</table>
		</form>
		</td>
		</tr>
	</table>
</div>