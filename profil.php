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
	<h1>Profil Cemal Cemil</h1>
    
    <p align="justify"><b>Cemal Cemil</b> merupakan salah satu situs e-commerce yang menjual 
    berbagai macam aneka snack atau cemilan mulai dari kue kering, kue basah
    dan aneka snack.<br>    
    Situs ini didirikan untuk para pecinta cemilan yang ingin mendapat cita rasa
    cemilan yang berbeda.<br>    
    <b>Cemal Cemil</b> hadir membawa aneka varian cemilan yang unik dengan rasa yang berbeda
    dengan cemilan lain.</p><br>  
</div>
</div>

<div class="shell">
<div class="panel-right">
<div class="judul-pengiriman">JASA PENGIRIMAN</div>
<div class="pic1"><img src="image/pic1/jne.png" width="136" height="56" /></div>
</div>
</div>