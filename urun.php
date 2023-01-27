<?php include'header.php'; 




$urunsor=$db->prepare("SELECT * FROM urun where urun_seourl=:seourl");
$urunsor->execute(array(
	'seourl' => $_GET['sef']
	));

$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

$say=$urunsor->rowCount();
if ($say==0) {
	 header("location:index.php");
	 exit;
}

$sepetsor=$db->prepare("SELECT * FROM sepet ");
$sepetsor->execute();

$sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC);






?>
<head>
	<?php

	 if (isset($_GET['durum'])&& $_GET['durum']=="ok") { ?>
		<script type="text/javascript">
			alert("okeeee")
		</script>
		
	<?php } ?>
</head>

	
	
	<div class="container">
		
		<div class="row">
			<div class="col-md-9"><!--Main content-->
				<div class="title-bg">
					<div class="title">	<?php echo $uruncek['urun_ad'] ?></div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="dt-img">
							<div class="detpricetag"><div class="inner">$199</div></div>
							<a class="fancybox" href="images\sample-1.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\sample-1.jpg" alt="" class="img-responsive"></a>
						</div>
						<div class="thumb-img">
							<a class="fancybox" href="images\sample-4.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\sample-4.jpg" alt="" class="img-responsive"></a>
						</div>
						<div class="thumb-img">
							<a class="fancybox" href="images\sample-5.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\sample-5.jpg" alt="" class="img-responsive"></a>
						</div>
						<div class="thumb-img">
							<a class="fancybox" href="images\sample-1.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\sample-1.jpg" alt="" class="img-responsive"></a>
						</div>
					</div>
					<div class="col-md-6 det-desc">
						<div class="productdata">
							<div class="infospan">Ürün Kodu <span><?php echo $uruncek['urun_id']; ?></span></div>
							<div class="infospan">Ürün Kategori<span><?php echo $uruncek['kategori_id'] ?></span></div>
							<div class="infospan">Ürün Fiyatı <span><?php echo $uruncek['urun_fiyat']; ?></span></div>


							<form action="nedmin/netting/islem.php" method="POST">	
							<div class="form-group">
								<hr>

									<label for="qty" class="col-sm-2 control-label">Miktar Seçiniz</label>
									<div class="col-sm-4">
										<select class="form-control" id="qty" name="urun_adet">
											<option>1
											<option>2
											<option>3
											<option>4
											<option>5
										</select>
									</div>
									<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">
									<input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id'] ?>">
									<div class="col-sm-4">
										<button type="submit" name="sepeteekle" class="btn btn-default btn-red btn-sm"><span class="addchart">Sepete Ekle</span></button>
									</div>
									<div class="clearfix"></div>
								</div>
								</form>
							
								
							<hr>	
							
							<div class="sharing">
								<div class="share-bt">
									<div class="addthis_toolbox addthis_default_style ">
										<a class="addthis_counter addthis_pill_style"></a>
									</div>
									<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f0d0827271d1c3b"></script>
									<div class="clearfix"></div>
								</div>
								<div class="avatock"><span>

									<?php 
									if ($uruncek['urun_stok']>=1) {
									 	echo "stok adeti : ".$uruncek['urun_stok']	;
									 }else{
									 	echo "stok 0";
									 } ?>




								</span></div>
							</div>
							
						</div>
					</div>
				</div>

				<div class="tab-review">
					<ul id="myTab" class="nav nav-tabs shop-tab">
					
					<li <?php if (isset($_GET['durum']) && $_GET['durum']!="ok") {?>
						class="active"
						<?php } ?>><a href="#desc" data-toggle="tab">Açıklama</a></li>
						<li 

						<?php if (isset($_GET['durum']) && $_GET['durum']=="ok") {?>
						class="active"
						<?php } ?>

						<?php 
						$kullanici_id=$kullanicicek['kullanici_id'];
						$urun_id=$uruncek['urun_id'];

						$yorumsor=$db->prepare("SELECT * FROM yorumlar where urun_id=:urun_id and yorum_onay=:yorum_onay");
						$yorumsor->execute(array(
							'urun_id' => $urun_id,
							'yorum_onay' => 0
							));


							?>
							><a href="#rev" data-toggle="tab">Yorumlar (<?php echo $yorumsor->rowCount(); ?>)</a></li>

						</ul>


					<div id="myTabContent" class="tab-content shop-tab-ct">
						<div class="tab-pane fade active in" id="desc">
								<p>
									<?php echo $uruncek['urun_detay'] ?>
								</p>
							</div>

						
						<div class="tab-pane fade
							active in
							" id="rev">
						<?php 

						while($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC)) {

									

									$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
									?>
							<p class="dash">
										<span><?php echo $yorumcek['kullanici_id'] ?></span> <span>( <?php echo $yorumcek['yorum_zaman'] ?>)</span><br><br>
										<?php echo $yorumcek['yorum_detay'] ?>
									</p>
						<?php } ?>
							
							<h4>Yorum Yapın </h4>

							<?php 
								if (isset($_SESSION['kullanici_mail'])) { ?>


									<?php 	$urunsor=$db->prepare("SELECT * from urun limit 3");
                 					 $urunsor->execute(
                  					  ); ?>
									
								
							<form action="nedmin/netting/islem.php" method="POST" role="form">
							
							<div class="form-group">
								<textarea class="form-control" name="yorum_detay" id="text" placeholder="Yorumunuzu Buraya Yazınız"></textarea>

							</div>
							<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">
							<input type="hidden" name="gelen_url" value="<?php echo "http://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI'].""; ?>">
							<input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id'] ?>">
							
							<button type="submit" name="yorumkaydet" class="btn btn-default btn-red btn-sm">Gönder</button>
						</form>
						<?php }else{ ?>
									yorum yapmak için <a style="color:red" href="register.php"> giriş</a> yapmalısınız
							<?php 		}

							 ?>
							
						</div>
					</div>
				</div>
				
				<div id="title-bg">
					<div class="title">Benzer Ürünler</div>
				</div>

								
				<div class="row prdct"><!--Products-->
					<?php  
					$kategori_id=$uruncek['kategori_id'];
					$urunaltsor=$db->prepare("SELECT * FROM urun where kategori_id=:kategori_id order by urun_id DESC limit 3");
					$urunaltsor->execute(array(
					'kategori_id' => $kategori_id
					)); 
					 while($urunaltcek=$urunaltsor->fetch(PDO::FETCH_ASSOC)) {?>

					<div class="col-md-4">
						<div class="productwrap">
							<div class="pr-img">
								<div class="hot"></div>
								<a href="product.htm"><img src="images\sample-4.jpg" alt="" class="img-responsive"></a>
								<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice">$314</span><?php echo $urunaltcek['urun_fiyat'] ?></span></div></div>
							</div>
							<span class="smalltitle"><a href="product.htm"><?php echo $urunaltcek['urun_ad'] ?></a></span>
							<span class="smalldesc"><?php echo $urunaltcek['urun_stok'] ?></span>
						</div>
					</div>
				<?php }  ?>
					
					
				</div><!--Products-->
				<div class="spacer"></div>
			</div><!--Main content-->
			<?php include'sidebar.php'; ?>
			<!--sidebar-->
		</div>
	</div>
	
	
	<?php include'footer.php'; ?>
	<!--footer-->
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap\js\bootstrap.min.js"></script>
	
	<!-- map -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
	<script type="text/javascript" src="js\jquery.ui.map.js"></script>
	<script type="text/javascript" src="js\demo.js"></script>
	
	<!-- owl carousel -->
    <script src="js\owl.carousel.min.js"></script>
	
	<!-- rating -->
	<script src="js\rate\jquery.raty.js"></script>
	<script src="js\labs.js" type="text/javascript"></script>
	
	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="js\product\lib\jquery.mousewheel-3.0.6.pack.js"></script>
	
	<!-- fancybox -->
    <script type="text/javascript" src="js\product\jquery.fancybox.js?v=2.1.5"></script>
	
	<!-- custom js -->
    <script src="js\shop.js"></script>
	</div>
  </body>
</html>
