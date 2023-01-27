<?php 
include'header.php';
 ?>
 <head>
 	<script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js">
 	</script>

 </head>

	<div class="container">
		<ul class="small-menu"><!--small-nav -->
			<li><a href="" class="myacc">Hesabım</a></li>
			<li><a href="" class="myshop">Alışveriş Kartı</a></li>
			<li><a href="" class="mycheck">Sepetim</a></li>
		</ul><!--small-nav -->
		<div class="clearfix"></div>
		<div class="lines"></div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							<div class="bread"><a href="index.php">Anasayfa</a> &rsaquo; Hakkımızda</div>
							<div class="bigtitle">Hakkımızda</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9"><!--Main content-->
				<div class="title-bg">
					<div class="title"><?php echo $hakkimizdacek["hakkimizda_icerik"] ?></div>
				</div>
				<div class="page-content">
					<p>
						<?php echo $hakkimizdacek["hakkimizda_misyon"] ?>
					</p>
					<p>
						<?php echo $hakkimizdacek["hakkimizda_vizyon"] ?>
					</p>
				</div>
			</div>
			<div class="col-md-3"><!--sidebar-->
				<div class="title-bg">
					<div class="title">Kategoriler</div>
				</div>
				
				<div class="categorybox">
					<ul>
						<li><a href="category.htm">Kadın Aksesuarları</a></li>
						<li><a href="category.htm">Erkek Ayakkabıları</a></li>
						<li><a href="category.htm">Özel Hediyeler</a></li>
						<li><a href="category.htm">Elektronik</a></li>
					</ul>
				</div>
				
				<div class="ads">
					<a href="product.htm"><img src="images\ads.png" class="img-responsive" alt=""></a>
				</div>
				
				<div class="title-bg">
					<div class="title">En İyiler</div>
				</div>
				<div class="best-seller">
					<ul>
						<li class="clearfix">
							<a href="#"><img src="images\demo-img.jpg" alt="" class="img-responsive mini"></a>
							<div class="mini-meta">
								<a href="#" class="smalltitle2">Panasonic M3</a>
								<p class="smallprice2">Fiyat : $122</p>
							</div>
						</li>
						<li class="clearfix">
							<a href="#"><img src="images\demo-img.jpg" alt="" class="img-responsive mini"></a>
							<div class="mini-meta">
								<a href="#" class="smalltitle2">Panasonic M3</a>
								<p class="smallprice2">Fiyat : $122</p>
							</div>
						</li>
						<li class="clearfix">
							<a href="#"><img src="images\demo-img.jpg" alt="" class="img-responsive mini"></a>
							<div class="mini-meta">
								<a href="#" class="smalltitle2">Panasonic M3</a>
								<p class="smallprice2">Fiyat : $122</p>
							</div>
						</li>
					</ul>
				</div>
				
			</div><!--sidebar-->
		</div>
		<div class="spacer"></div>
	</div>
	
	<?php 
	include'footer.php';
	 ?>