<?php
include('../koneksi/koneksi.php');

/* fungsi simpan */
if(isset($_POST['simpan'])) {
	$nm_kat = $_POST['nm_kategori'];
	$kd_kat = $_POST['kd_kategori'];
	mysql_query("insert into kategori(nama_kategori,kode_kategori) values('".$nm_kat."','".$kd_kat."')");
}
if(isset($_POST['update'])) {
	$id = $_POST['id'];
	$nm_kat = $_POST['nm_kategori'];
	$kd_kat = $_POST['kd_kategori'];
	mysql_query("update kategori set nama_kategori='".$nm_kat."', kode_kategori='".$kd_kat."' where id_kategori='".$id."'");		
}

/* end fungsi simpan */

/* fungsi edit */
$d_nm_kat = "";
$d_kd_kat= "";
$d_id = "";
if(isset($_GET['aksi'])) {
	if($_GET['aksi']=="edit")
	{
		$id = $_GET['id'];
		$query = mysql_query("select * from kategori where id_kategori='".$id."' ");
		while($data = mysql_fetch_array($query)) {
			$d_nm_kat = $data['nama_kategori'];
			$d_kd_kat = $data['kode_kategori'];
			$d_id = $data['id_kategori'];
		}
	}
	if($_GET['aksi']=="hapus")
	{
		$id = $_GET['id'];
		$query = mysql_query("delete from kategori where id_kategori='".$id."' ");
		
		
	}
}


	



/* end fungsi edit */
?>
<form method="post" action="">
<input type="hidden" value="<?php echo $d_id ?>" name="id">
Nama Kategori : <input type="text" name="nm_kategori" value="<?php echo $d_nm_kat ?>"><br>
Kode Kategori : <input type="text" name="kd_kategori" value="<?php echo $d_kd_kat ?>"><br>
<input type="submit" name="simpan" value="simpan">
<input type="submit" name="update" value="Update">
<input type="submit" name="batal" value="Batal">
</form>

<h3>List data</h3>
<table border="1" width="100%">
	<tr>
    	<th>No</th>
        <th>Nama Kategori</th>
        <th>Kode Kategori</th>
        <th>Alat</th>
    </tr>
    <?php
	$query = "select * from kategori order by id_kategori desc";
	$list = mysql_query($query);
	if(mysql_num_rows($list)>0) {
		$no = 1;
		while($rows = mysql_fetch_array($list))
		{
	?>
    <tr>
    	<td><?php echo $no ?></td>
        <td><?php echo $rows['nama_kategori'] ?></td>
        <td><?php echo $rows['kode_kategori'] ?></td>
        <td>
        <a href="?view=kategori&aksi=edit&id=<?php echo $rows['id_kategori']?>">edit</a> | 
        <a href="?view=kategori&aksi=hapus&id=<?php echo $rows['id_kategori']?>">hapus</a></td>
    </tr>
    <?php
		$no++;
		}
	}
	?>
</table>