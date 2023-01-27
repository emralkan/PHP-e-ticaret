<?php 
include 'header.php';
 ?>
	<div class="container">
		
		<?php include'slider.php'; ?>
		
			<div id="product-carousel" class="owl-carousel owl-theme">


			 <?php 
			 
                  $urunsor=$db->prepare("SELECT * from urun limit 3");
                  $urunsor->execute(
                    );

			 while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)){

			 $urun_id=$uruncek['urun_id'];

			  ?>
				<div class="item">
					<div class="productwrap">
						<div class="pr-img">
							<div class="hot"></div>
							<a href="urun-<?=seo($uruncek["urun_seourl"])?>"><img src="images\sample-1.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag blue"><div class="inner"><span><?php echo $uruncek['urun_fiyat'] ?></span></div></div>
						</div>
							<span class="smalltitle"><a href="product.htm"><?php echo $uruncek['urun_ad'] ?></a></span>
							<span class="smalldesc"><?php echo $uruncek['urun_stok'] ?></span>

					</div>
				</div>
				
				<?php } ?>
				
				
				
				
		</div>
	</div>
	
	
	
	<div class="container">
		<div class="row">
			<div class="col-md-9"><!--Main content-->
				<div class="title-bg">
					<div class="title">Hakkımızda</div>
				</div>

				<?php
				 $hakkimizdasor=$db->prepare("SELECT * FROM hakkimizda where hakkimizda_id=:hakkimizda_id");
				$hakkimizdasor->execute(array(
					'hakkimizda_id'=> 0
				)); 
				$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);?>
				<p class="ct">
					<?php echo $hakkimizdacek['hakkimizda_misyon'] ?>
					
				</p>
				<p class="ct">
					<?php echo $hakkimizdacek['hakkimizda_icerik'] ?>
					
				</p>
				<a href="" class="btn btn-default btn-red btn-sm">Read More</a>
				
				<div class="title-bg">
					<div class="title">En Son Baktıklarınız</div>
				</div>


				<?php $urunsor=$db->prepare("SELECT * FROM urun limit 3");
					  $urunsor->execute();
					  while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)){
				 ?>
				<div class="row prdct"><!--Products-->
					<div class="col-md-3">
						<div class="productwrap">
							<div class="pr-img">
								<a href="urun-<?=seo($uruncek["urun_seourl"])?>"><img src="images\sample-2.jpg" alt="" class="img-responsive"></a>
								<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice">$314</span><?php echo $uruncek['urun_fiyat'] ?></span></div></div>
							</div>
							<span class="smalltitle"> <a href="product.htm"><?php  echo substr( $uruncek['urun_ad'],0,5,); ?> </a></span>
							<span class="smalldesc"><?php echo $uruncek['urun_stok'] ?></span>
						</div>
					</div>
					<?php } ?>
					
					
					
					
				</div><!--Products-->
				<div class="spacer"></div>
			</div><!--Main content-->
			<?php include'sidebar.php'; ?>
		</div>
	</div>
	
	<?php 
	include 'footer.php';
	 ?>