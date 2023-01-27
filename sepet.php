<?php include'header.php' ?>
<?php 
$kullanici_id=$kullanicicek['kullanici_id'];
$sepetsor=$db->prepare("SELECT * FROM sepet ");
$sepetsor->execute();

$sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC); ?>
	
	
	<div class="container">
		
		<div class="title-bg">
			<div class="title">Alışveriş Sepetim</div>
		</div>
		
		<div class="table-responsive">
			<table class="table table-bordered chart">
				<thead>
					<tr>
						<th>Onay</th>
						<th>Fotoğraf</th>
						<th>Ürün Adı</th>
						<th>Ürün Kodu</th>
						<th>Ürün Adet</th>
						<th>Toplam Tutar</th>
					</tr>
				</thead>
				<tbody>
					
					<?php 
					
					while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)) {
						$urun_id=$sepetcek['urun_id'];
						$urunsor=$db->prepare("SELECT * FROM urun where urun_id=:urun_id");
						$urunsor->execute(array(
						'urun_id' => $urun_id
							));

						$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
					 ?>
					
					
					<tr>
						<td><form><input type="checkbox"></form></td>
						<td><img src="images\demo-img.jpg" width="100" alt=""></td>
						<td><?php echo $uruncek['urun_ad'] ?></td>
						<td><?php echo $sepetcek['urun_id'] ?></td>
						<td><?php echo $sepetcek['urun_adet'] ?></td>
						<td><?php echo $uruncek['urun_fiyat'] * $sepetcek['urun_adet'] ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="row">
			<div class="col-md-6">
				
			</div>
			<div class="col-md-3 col-md-offset-3">
			<div class="subtotal-wrap">
				
				<div class="total" >Toplam : <span  class="bigprice"><?php echo $uruncek['urun_fiyat'] ?></span></div>
				<div class="clearfix"></div>
				<a href="odeme.php" class="btn btn-default btn-yellow">Ödemeye Geç</a>
			</div>
			<div class="clearfix"></div>
			</div>
		</div>
		<div class="spacer"></div>
	</div>
	
	<?php include'footer.php' ?>