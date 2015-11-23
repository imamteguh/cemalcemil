<div class="shell">        
<div class="panel-left">
<div id="kategori">
<div class="judul">KATEGORI</div>
<div class="sidebar_konten">
<ul>
<?php
$listpro = mysql_query("select * from kategori order by nama_kategori asc");
if(mysql_num_rows($listpro)>0) {
	while($list = mysql_fetch_array($listpro))
	{
?>
	<li><a href="?view=kategori&kode=<?php echo $list['kode_kategori'] ?>"><?php echo $list['nama_kategori'] ?></a></li>
<?php	
	}
}
?>
</ul>
</div>
</div>
</div>
</div>

<div class="shell">
<div class="panel-center">
	<table border="0" align="center">
    	<tr>
        <td><img src="image/Blackberry-Messenger-Logo.png" width="200" height="200" /></td>
        <td><img src="image/WA.png"  width="200" height="200"/></td>
        </tr>
        <tr>
        <td bgcolor="#0066FF" align="center"><b>53FF7487</b></td>
        <td bgcolor="#00CC00" align="center"><b>089636460946</b></td>
        </tr>
        <tr>
        <td><img src="image/Instagram Logo.png" width="200" height="200" /></td>
        <td><img src="image/New_Logo_Gmail.svg.png" width="200" height="150" /></td>
        </tr>
        <tr>
        <td bgcolor="#FFCC66" align="center"><b>CemalCemil</b></td>
        <td bgcolor="#FF0000" align="center"><b>cemalcemil@gmail.com</b></td>
        </tr>
    </table>    
</div>
</div>

<div class="shell">
<div class="panel-right">
<div class="judul-pengiriman">JASA PENGIRIMAN</div>
<div class="pic1"><img src="image/pic1/jne.png" width="136" height="56" /></div>
</div>
</div>