
<div class="col-md-3"><!--sidebar-->
				<div class="title-bg">
					<div class="title">Kategoriler</div>
				</div>
				
				<div class="categorybox">
					<ul>
						<?php $kategorisor=$db->prepare("SELECT * FROM kategori where kategori_durum ='1' order by kategori_sira asc");
						$kategorisor->execute();

					 while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {?>
					
						<li><a href="kategori-<?=seo($kategoricek["kategori_ad"])?>"><?php  echo $kategoricek['kategori_ad'] ?></a></li>
									<?php } ?>
									</ul>
									
				</div>
				
				<div class="ads">
					<a href="product.htm"><img src="images\ads.png" class="img-responsive" alt=""></a>
				</div>
				
			</div><!--sidebar-->