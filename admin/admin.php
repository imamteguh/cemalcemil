<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator Cemal Cemil</title>
</head>

<body>
<table width="928" border="2">
  <tr>
    <td height="95" colspan="2" align="center">
    	<h1>ADMINISTRATOR CEMALCEMIL</h1>
    </td>
  </tr>
  <tr>
    <td width="166" height="317" valign="top">
    	<ul>
        <li><a href="?view=admin">Dashboard</a></li>
        <li><a href="?view=user">User Admin</a></li>
        <li><a href="?view=kategori">Kategori Produk</a></li>
        <li><a href="?view=produk">Produk</a></li>
        </ul>
    </td>
    <td width="744" valign="top">
    	<?php
		if(isset($_GET['view'])) {
			if($_GET['view']=="admin") {
				include("dashboard.php");
			}
			elseif($_GET['view']=="user")
			{
				include("useradmin.php");
			}
			elseif($_GET['view']=="kategori")
			{
				include("kategori.php");
			}
			elseif($_GET['view']=="produk")
			{
				include("produk.php");
			}
			else {
				include("dashboard.php");
			}
		} else {
			include('dashboard.php');
		}
		?>
    </td>
  </tr>
</table>
</body>
</html>