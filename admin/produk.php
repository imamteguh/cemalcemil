<?php
include('../koneksi/koneksi.php');

/* fungsi simpan */
if(isset($_POST['simpan'])) {
	$tnm_produk = $_POST['nm_produk'];
	$tkategori =$_POST['kategori'];
	$tharga = $_POST['harga'];
	$tstok = $_POST['stok'];
	$deskripsi = $_POST['desk'];
	$gbr = $_FILES['gambar']['name'];
	$pindah = $_FILES['gambar']['tmp_name'];
	move_uploaded_file($pindah,"../image/produk/".$gbr);
	mysql_query("insert into produk(nama_produk,kode_kategori,harga,stok,deskripsi,gambar) values('".$tnm_produk."','".$tkategori."','".$tharga."','".$tstok."','".$deskripsi."','".$gbr."')");
}
if(isset($_POST['update'])) {
	$id = $_POST['id'];
	$tnm_produk = $_POST['nm_produk'];
	$tkategori =$_POST['kategori'];
	$tharga = $_POST['harga'];
	$tstok = $_POST['stok'];
	$deskripsi = $_POST['desk'];
	$gbr = $_FILES['gambar']['name'];
	$pindah = $_FILES['gambar']['tmp_name'];
	move_uploaded_file($pindah,"../image/produk/".$gbr);
	mysql_query("update produk set nama_produk='".$tnm_produk."',kode_kategori='".$tkategori."', harga='".$tharga."', stok='".$tstok."', deskripsi='".$deskripsi."', gambar='".$gbr."' where id_produk='".$id."'");		
}

/* end fungsi simpan */

/* fungsi edit */
$d_id = "";
$d_tnm_produk = "";
$d_tharga= "";
$d_tstok = "";
$d_deskripsi= "";
$d_gbr = "";
if(isset($_GET['aksi'])) {
	if($_GET['aksi']=="edit")
	{
		$id = $_GET['id'];
		$query = mysql_query("select * from produk where id_produk='".$id."' ");
		while($data = mysql_fetch_array($query)) {
			$d_tnm_produk = $data['nama_produk'];
			$d_tharga = $data['harga'];
			$d_tstok = $data['stok'];
			$d_deskripsi = $data['deskripsi'];
			$d_id = $data['id_produk'];
			$d_gbr = $data['gambar'];
		}
	}
	if($_GET['aksi']=="hapus")
	{
		$id = $_GET['id'];
		$query = mysql_query("delete from produk where id_produk='".$id."' ");
		
		
	}
}


	



/* end fungsi edit */
?>
<form method="post" action="" enctype="multipart/form-data">
<input type="hidden" value="<?php echo $d_id ?>" name="id">
Kode Kategori : <select name="kategori"> 
<?php $listkat = mysql_query("select*from kategori order by kode_kategori");
if(mysql_num_rows($listkat)>0)
while($data = mysql_fetch_array($listkat)){
	echo "<option value = '".$data['kode_kategori']."' >".$data['nama_kategori']."</option>";
}
?>
</select><br>
Nama Produk : <input type="text" name="nm_produk" value="<?php echo $d_tnm_produk ?>"><br>
Harga : <input type="text" name="harga" value="<?php echo $d_tharga ?>"><br>
Stok : <input type="text" name="stok" value="<?php echo $d_tstok ?>"><br>
Deskripsi : <textarea  name="desk" ><?php echo $d_deskripsi ?></textarea><br>
Gambar : <input type="file" name="gambar"><br>
<?php
if($d_gbr != "") {
?>
<img src="../image/produk/<?php echo $d_gbr ?>" width="80"><br>
<?php
}
?>
<input type="submit" name="simpan" value="simpan">
<input type="submit" name="update" value="Update">
<input type="reset" name="batal" value="Batal">
</form>

<h3>List data</h3>
<table border="1" width="100%">
	<tr>
    	<th>No</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Deskripsi</th>
        <th>gambar</th>
        <th>Alat</th>
        
    </tr>
    <?php
	$query = "select * from produk order by id_produk desc";
	$list = mysql_query($query);
	if(mysql_num_rows($list)>0) {
		$no = 1;
		while($rows = mysql_fetch_array($list))
		{
	?>
    <tr>
    	<td><?php echo $no ?></td>
        <td><?php echo $rows['nama_produk'] ?></td>
        <td><?php echo $rows['harga'] ?></td>
        <td><?php echo $rows['stok'] ?></td>
        <td><?php echo $rows['deskripsi'] ?></td>
        <td><img src="../image/produk/<?php echo $rows['gambar'] ?>" width="80"></td>
        <td>
        <a href="?view=produk&aksi=edit&id=<?php echo $rows['id_produk']?>">edit</a> | 
        <a href="?view=produk&aksi=hapus&id=<?php echo $rows['id_produk']?>">hapus</a></td>
    </tr>
    <?php
		$no++;
		}
	}
	?>
</table>