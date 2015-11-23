<?php
include('../koneksi/koneksi.php');

/* fungsi simpan */
if(isset($_POST['simpan'])) {
	$user = $_POST['user'];
	$email = $_POST['email'];
	$pass = md5($_POST['pass']);
	mysql_query("insert into admin(username,password,email) values('".$user."','".$pass."','".$email."')");
}
if(isset($_POST['update'])) {
	$id = $_POST['id'];
	$user = $_POST['user'];
	$email = $_POST['email'];
	$pass = md5($_POST['pass']);
	if($_POST['pass'])
	{ 
	
	mysql_query("update admin set username='".$user."', password='".$pass."', email='".$email."' where id_admin='".$id."'");
	}
	else
	{
	mysql_query("update admin set username='".$user."', email='".$email."' where id_admin='".$id."'");	
	}

}

/* end fungsi simpan */

/* fungsi edit */
$d_user = "";
$d_email = "";
$d_id = "";
if(isset($_GET['aksi'])) {
	if($_GET['aksi']=="edit")
	{
		$id = $_GET['id'];
		$query = mysql_query("select * from admin where id_admin='".$id."' ");
		while($data = mysql_fetch_array($query)) {
			$d_user = $data['username'];
			$d_email = $data['email'];
			$d_id = $data['id_admin'];
		}
	}
	if($_GET['aksi']=="hapus")
	{
		$id = $_GET['id'];
		$query = mysql_query("delete from admin where id_admin='".$id."' ");
		
		
	}
}


	



/* end fungsi edit */
?>
<form method="post" action="">
<input type="hidden" value="<?php echo $d_id ?>" name="id">
Username : <input type="text" name="user" value="<?php echo $d_user ?>"><br>
Password : <input type="text" name="pass">(updaete* isi jika ingin dirubah)<br>
Email : <input type="text" name="email" value="<?php echo $d_email ?>"><br>
<input type="submit" name="simpan" value="Simpan">
<input type="submit" name="update" value="Update">
<input type="submit" name="batal" value="Batal">
</form>

<h3>List data</h3>
<table border="1" width="100%">
	<tr>
    	<th>No</th>
        <th>Username</th>
        <th>Email</th>
        <th>Alat</th>
    </tr>
    <?php
	$query = "select * from admin order by id_admin desc";
	$list = mysql_query($query);
	if(mysql_num_rows($list)>0) {
		$no = 1;
		while($rows = mysql_fetch_array($list))
		{
	?>
    <tr>
    	<td><?php echo $no ?></td>
        <td><?php echo $rows['username'] ?></td>
        <td><?php echo $rows['email'] ?></td>
        <td>
        <a href="?view=user&aksi=edit&id=<?php echo $rows['id_admin']?>">edit</a> | 
        <a href="?view=user&aksi=hapus&id=<?php echo $rows['id_admin']?>">hapus</a></td>
    </tr>
    <?php
		$no++;
		}
	}
	?>
</table>