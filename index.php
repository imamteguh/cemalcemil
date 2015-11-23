<?php
include('koneksi/koneksi.php');
@session_start();
$btn = '<a href="?view=login"><img src="image/log_in.png" height="30" /></a>';
if(isset($_SESSION['email_login']))
{
	$btn = '<a href="logout.php">LOGOUT</a>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cemal Cemil</title>
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" charset="utf-8">
</head>
<style type="text/css">
#navigasi{ position:fixed; top:0px; left:0px; right:0px; z-index:9999; margin:0 auto}
</style>
<body background="image/background.jpg">
<div class="shell">
<div id="navigasi">
<div class="navbar">
<table width="1024" border="0" align="center" bgcolor="#FFCC66">
  <tr>
    <td height="122" align="center"><img src="image/logo 1.png" width="150" height="120" /></td>
  </tr>
</table>

<table width="1024" border="0" align="center" bgcolor="#000000">
  <tr>
    <td align="center"><a href="?view=home"><img src="image/home.png" width="150" height="30" /></a></td>
    <td align="center"><a href="?view=profil"><img src="image/profile.png" height="30" /></a></td>
    <td align="center"><a href="#"><img src="image/cara_belanja.png" height="30" /></a></td>
    <td align="center"><a href="?view=contact"><img src="image/contact.png" height="30" /></a></td>
    <td align="center"><?php echo $btn ?></td>
  </tr>
</table>
</div>
</div>
</div>

<br><br><br>
<br><br><br><br><br>

<?php
if(isset($_GET['view'])) {
	if($_GET['view']=="home") {
		include("home.php");
	}
	elseif($_GET['view']=="profil")
	{
		include("profil.php");
	}
	elseif($_GET['view']=="contact")
	{
		include("contact.php");
	}
	elseif($_GET['view']=="kategori")
	{
		include("kategori.php");
	}
	elseif($_GET['view']=="detail")
	{
		include("detail_produk.php");
	}
	elseif($_GET['view']=="login")
	{
		include("login.php");
	}
	else 
	{
		include("home.php");
		
	}


}
else
{include("home.php");}

?>



</body>
</html>
