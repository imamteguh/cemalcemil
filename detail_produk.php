<?php
if(isset($_POST['pesan'])) {
	$email = $_SESSION['email_login'];
	$alamat = $_POST['alamat'];
	$jumlah = $_POST['jml'];
	$id = $_POST['id_produk'];
	$tgl = date("Y-m-d");

	mysql_query("insert into pesanan(id_produk,jml_pesan,email,tgl_pesan,alamat_tujuan,status) values 
		('".$id."','".$jumlah."','".$email."','".$tgl."','".$alamat."','pesanan baru') ");

	mysql_query("update produk set stok = (stok - ".$jumlah.") where id_produk = $id ");

	?>
	<script type="text/javascript">
	alert('Pesanan anda sudah terkirim. silahkan tunggu konfirmasi kami.');
	document.location.href = '?view=detail&id=<?php echo $id ?>'
	</script>
	<?php
}
?>
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
$kode = $_GET['id'];
$listpro = mysql_query("select * from produk p, kategori k where p.kode_kategori=k.kode_kategori and p.id_produk='".$kode."' order by id_produk desc");
if(mysql_num_rows($listpro)>0) {
	while($list = mysql_fetch_array($listpro))
	{
?>
<div class="konten_produk" style="width:430px;height:auto;text-align:left">
    <div class="judul_produk" style="font-size:16pt;text-align:center"><?php echo $list['nama_produk'] ?></div>
    <table width="100%">
    	<tr>
    		<td>Kategori Produk</td>
    		<td>: <?php echo $list['nama_kategori'] ?></td>
    		<td rowspan="4" width="150">
    			<img src="image/produk/<?php echo $list['gambar'] ?>"  width="100%"/>
    		</td>
    	</tr>
    	<tr>
    		<td>Harga</td>
    		<td>: <?php echo "Rp. ".number_format($list['harga'],2,',','.') ?></td>
    	</tr>
    	<tr>
    		<td>Stok</td>
    		<td>: <?php echo ($list['stok'] > 0) ? "Ada" : "Tidak Ada" ?></td>
    	</tr>
    	<tr>
    		<td>Deskripsi Produk</td>
    		<td>: <?php echo $list['deskripsi'] ?></td>
    	</tr>
    </table>
    <hr>
    <?php
    if(isset($_SESSION['email_login'])) {
	?>
		<h4>Pesan produk ini</h4>
		<form method="post" action="">
		<input type="hidden" name="id_produk" value="<?php echo $list['id_produk'] ?>">
		<table>
			<tr>
				<td>Jumlah pesanan</td>
				<td>:</td>
				<td>
					<select name="jml" style="padding:3px 5px;">
						<?php
						for ($i=1; $i <= $list['stok'] ; $i++) { 
							echo '<option value="'.$i.'">'.$i.'</option>';
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td valign="top">Alamat tujuan</td>
				<td valign="top">:</td>
				<td><textarea name="alamat" style="padding:5px;" rows="5" cols="30"></textarea></td>
			</tr>
			<tr>
				<td></td><td></td>
				<td><input type="submit" name="pesan" value="PESAN" style="padding:3px 5px;"></td>
			</tr>
		</table>
		</form>
	<?php
    } else {
	?>
		<center><h3>Anda harap <a href="?view=login">login</a> dahulu untuk memesan.</h3></center>
	<?php
    }
    ?>
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