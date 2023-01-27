
<?php 
include'../nedmin/netting/baglan.php';

$kullanicisor=$db->prepare(" SELECT * FROM kullanici where kullanici_id=:id"); 
$kullanicisor->execute(array(
'id'=>0
  
)); 
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

?>












<!doctype html>
<html lang="en">
  <head>
  	<title>Giriş Ekranı</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Giriş Ekranı</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Bir Hesabınız Var Mı?</h3>
						<form action="islem.php" method="POST">



		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" name="kulanici_mail" value=" <?php echo $kullanicicek ['kullanici_mail'] ?>" placeholder="Username" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" class="form-control rounded-left" name="kulanici_password" value=" <?php echo $kullanicicek ['kullanici_password'] ?>" placeholder="Password" required>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Beni Hatırla
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Parolamı Unuttum</a>
								</div>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="admingiris" class="btn btn-primary rounded submit p-3 px-5">Giriş Yap</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

