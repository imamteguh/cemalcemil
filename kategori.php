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
<?php
$kode = $_GET['kode'];
$listpro = mysql_query("select * from produk p, kategori k where p.kode_kategori=k.kode_kategori and k.kode_kategori='".$kode."' order by id_produk desc");
if(mysql_num_rows($listpro)>0) {
	while($list = mysql_fetch_array($listpro))
	{
?>
<div class="konten_produk">
    <div class="judul_produk"><?php echo $list['nama_kategori'] ?></div>
    <div class="baru"><?php echo $list['nama_produk'] ?></div>
    <div class="gambar">
    <img src="image/produk/<?php echo $list['gambar'] ?>"  width="100" height="80"/>
    </div>
    <div class="harga">Rp. <?php echo $list['harga'] ?></div>
    <div class="bawah"><a href="?view=detail&id=<?php echo $list['id_produk'] ?>">Pesan</a></div>
</div>
<?php	
	}
}
?>
</div>
</div>

<div class="shell">
<div class="panel-right">
<div class="judul-pengiriman">JASA PENGIRIMAN</div>
<div class="pic1"><img src="image/pic1/jne.png" width="136" height="56" /></div>
</div>
</div>