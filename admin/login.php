<?php
include('../koneksi/koneksi.php');
if(isset($_POST['login']))
{
	$user = $_POST['username'];
	$pass = md5($_POST['password']);
	$query = "select * from admin where username = '".$user."' and password = '".$pass."' ";
	$login = mysql_query($query);
	if(mysql_num_rows($login)==1) {
		header("location:admin.php");
	} else {
		echo "login gagal";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Cemal Cemil Admin</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="300" border="2">
    <tr>
      <td colspan="2">Login</td>
    </tr>
    <tr>
      <td width="82">User Name</td>
      <td width="200"><label for="textfield"></label>
      <input type="text" name="username" id="textfield" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="textfield2"></label>
      <input type="password" name="password" id="textfield2" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="login" id="button" value="Login" />
      <input type="reset" name="button2" id="button2" value="Batal" /></td>
    </tr>
  </table>
</form>
</body>
</html>