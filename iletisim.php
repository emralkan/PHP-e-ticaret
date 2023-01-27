<?php 
include'header.php'
 ?>


	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							<div class="bread"><a href="index.php">Anasayfa</a> &rsaquo; İletişim</div>
							<div class="bigtitle">İletişim Bilgileri </div>
						</div>
					
					</div>
					</div>
				</div>
			</div>
		</div>
		<div class="title-bg">
			<div class="title">İletişim</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<p class="page-content">
					<?php echo $hakkimizdacek["hakkimizda_vizyon"]; ?>
				</p>
				<ul class="contact-widget">
					<li class="fphone"><?php echo $ayarcek["ayar_tel"]; ?> <br> <?php echo $ayarcek["ayar_tel"]; ?></li>
					<li class="fmobile"><?php echo $ayarcek["ayar_tel"]; ?><br><?php echo $ayarcek["ayar_tel"]; ?></li>
					<li class="fmail lastone"><?php echo $ayarcek["ayar_mail"]; ?><br><?php echo $ayarcek["ayar_mail"]; ?></li>
				</ul>
			</div>
			<div class="col-md-7 col-md-offset-1">
				<div class="loc">
					<div id="map_canvas"></div>
				</div>
			</div>
		</div>
		
		<div class="title-bg">
			<div class="title">Size Ulaşalım</div>
		</div>
		<div class="qc">
			<form role="form">
				<div class="form-group">
					<label for="name">Adınız<span>*</span></label>
					<input type="text" class="form-control" id="name">
				</div>
				<div class="form-group">
					<label for="email">Mail Adresiniz<span>*</span></label>
					<input type="email" class="form-control" id="email">
				</div>
				<div class="form-group">
					<label for="text">Mesajınız<span>*</span></label>
					<textarea class="form-control" id="text"></textarea>
				</div>
				<button type="submit" class="btn btn-default btn-red btn-sm">Gönder</button>
			</form>
		</div>
		<div class="spacer"></div>
		
	</div>
	
	<?php 
	include'footer.php'
	 ?>