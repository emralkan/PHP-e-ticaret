<?php include'header.php' ?>
<?php 
$kullanici_id=$kullanicicek['kullanici_id'];
$sepetsor=$db->prepare("SELECT * FROM sepet ");
$sepetsor->execute();

$sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC); ?>
	
	
	<div class="container">
		
		<div class="title-bg">
			<div class="title">Ödeme Sayfası</div>
		</div>
		
		<div class="table-responsive">
			<table class="table table-bordered chart">
				<thead>
					<tr>
						<th>Fotoğraf</th>
						<th>Ürün Adı</th>
						<th>Ürün Kodu</th>
						<th>Ürün Adet</th>
						<th>Toplam Tutar</th>
					</tr>
				</thead>
				<tbody>
					
					<?php 
					$toplam_fiyat = 0;
					while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)) {
						$urun_id=$sepetcek['urun_id'];
						$urunsor=$db->prepare("SELECT * FROM urun where urun_id=:urun_id");
						$urunsor->execute(array(
						'urun_id' => $urun_id
							));

						$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
						$toplam_fiyat+=$uruncek['urun_fiyat']*$sepetcek['urun_adet'];
					 ?>
					
					
					<tr>
						<td><img src="images\demo-img.jpg" width="100" alt=""></td>
						<td><?php echo $uruncek['urun_ad'] ?></td>
						<td><?php echo $sepetcek['urun_id'] ?></td>
						<td><?php echo $sepetcek['urun_adet'] ?></td>
						<td><?php echo $uruncek['urun_fiyat'] * $sepetcek['urun_adet'] ?></td>
					</tr>
				<?php } 
				?>
				</tbody>
			</table>
							<div class="tab-review">
					<ul id="myTab" class="nav nav-tabs shop-tab">
					
					<li class="active"><a href="#desc" data-toggle="tab">Havale</a></li>
					<li class=""><a href="#rev" data-toggle="tab">Kredi Kartı</a></li>

						</ul>


					<div id="myTabContent" class="tab-content shop-tab-ct">
						<div class="tab-pane fade active in" id="desc">
								<p>
									entegre edildi
								</p>
							</div>

						
						<div class="tab-pane fade
							active in
							" id="rev">
						
									
								
							<p>Ödeme yapacağınız hesap numarasını seçerek işlemi tamamlayınız.</p>


					<?php 

					$bankasor=$db->prepare("SELECT * FROM banka order by banka_id ASC");
					$bankasor->execute();

					while($bankacek=$bankasor->fetch(PDO::FETCH_ASSOC)) { ?>

					
					<input type="radio" name="siparis_banka" value="<?php echo $bankacek['banka_ad'] ?>">
					<?php echo $bankacek['banka_ad']; echo " ";?><br>


					

					<?php } ?>

						
							
						</div>
					</div>
				</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				
			</div>
			<div class="col-md-3 col-md-offset-3">
			<div class="subtotal-wrap">
				
				<div class="total">Toplam : <?php echo $toplam_fiyat;?> <span class="bigprice"></span></div>
				<div class="clearfix"></div>
					<button class="btn btn-success" type="submit" name="bankasiparisekle">Sipariş Ver</button>
			</div>
			<div class="clearfix"></div>
			</div>
		</div>
		<div class="spacer"></div>
	</div>
	
	<?php include'footer.php' ?>