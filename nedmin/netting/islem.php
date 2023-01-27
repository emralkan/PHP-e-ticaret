<?php 
ob_start();
session_start();

	include'baglan.php';
	include'../production/fonksiyon.php';




if (isset($_POST['kategoriduzenle'])) {
	$kategori_id=$_POST['kategori_id'];

	$kategorikaydet=$db->prepare("UPDATE kategori SET
		kategori_ad=:kategori_ad,
		kategori_sira=:kategori_sira,
		kategori_durum=:kategori_durum
		WHERE kategori_id={$_POST['kategori_id']}");

	$update=$kategorikaydet->execute(array(
		'kategori_ad' => $_POST['kategori_ad'],
		'kategori_sira' => $_POST['kategori_sira'],
		'kategori_durum' => $_POST['kategori_durum']
		));


	if ($update) {

		Header("Location:../production/kategori.php?kategori_id=$kategori_id&durum=ok");

	} else {

		Header("Location:../production/kategori-duzenle.php?kategori_id=$kategori_id&durum=ok");
	}

}



if (isset($_GET['kategori_id'])) {
	$kategori_id=$_GET['kategori_id'];

	$kategorisil=$db->prepare("DELETE from kategori where kategori_id=:id");
	$kategoribak=$kategorisil->execute(array(
		'id' => $_GET['kategori_id']
		));


	if ($kategoribak) {


		header("location:../production/kategori.php?sil=ok");



	} else {

		header("location:../production/kategori.php?sil=no");

	}


}




if (isset($_POST['kategorikaydet'])) {


	$kategoriekle=$db->prepare("INSERT INTO kategori SET
		kategori_ad=:kategori_ad,
		kategori_sira=:kategori_sira,
		kategori_durum=:kategori_durum
		");

	$insert=$kategoriekle->execute(array(
		'kategori_ad' => $_POST['kategori_ad'],
		'kategori_sira' => $_POST['kategori_sira'],
		'kategori_durum' => $_POST['kategori_durum']
		));


	if ($insert) {

		Header("Location:../production/kategori.php?durum=ok");

	} else {

		Header("Location:../production/kategori.php?durum=no");
	}

}





	if (isset($_POST['kullanicikaydet'])) {

	
	 $kullanici_adsoyad=htmlspecialchars($_POST['kullanici_adsoyad']); 
	 $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); 

	 $kullanici_passwordone=trim($_POST['kullanici_passwordone']); 
	 $kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']); 



	if ($kullanici_passwordone==$kullanici_passwordtwo) {


		if (strlen($kullanici_passwordone)>=6) {




			$kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_mail=:kullanici_mail");
			$kullanicisor->execute(array(
				'kullanici_mail' => $kullanici_mail
				));

			$say=$kullanicisor->rowCount();



			if ($say==0) {

				
				$kullanici_password=md5($kullanici_passwordone);

				$kullanici_yetki=1;

			
				$kullanicikaydet=$db->prepare("INSERT INTO kullanici SET
					kullanici_adsoyad=:kullanici_adsoyad,
					kullanici_mail=:kullanici_mail,
					kullanici_password=:kullanici_password,
					kullanici_yetki=:kullanici_yetki
					");
				$insert=$kullanicikaydet->execute(array(
					'kullanici_adsoyad' => $kullanici_adsoyad,
					'kullanici_mail' => $kullanici_mail,
					'kullanici_password' => $kullanici_password,
					'kullanici_yetki' => $kullanici_yetki
					));

				if ($insert) {


					header("Location:../../index.php?durum=loginbasarili");

				} else {


					header("Location:../../register.php?durum=basarisiz");
				}

			} else {

				header("Location:../../register.php?durum=mukerrerkayit");

			}

		} else {

			header("Location:../../register.php?durum=eksiksifre");

		}

	} else {

		header("Location:../../register.php?durum=farklisifre");
	}
	
}
	


	if (isset($_GET['slidersil'])) {
	
	$slidersil=$db->prepare("DELETE from slider where slider_id=:slider_id");
	$kontrol=$slidersil->execute(array(
		'slider_id' => $_GET['slider_id']
		));

	if ($kontrol) {

		
		Header("Location:../production/slider.php?durum=ok");

	} else {

		Header("Location:../production/slider.php?durum=no");
	}

}







	if (isset($_POST['logoduzenle'])) {

	

	$uploads_dir = '../../dimg';

	@$tmp_name = $_FILES['ayar_logo']["tmp_name"];
	@$name = $_FILES['ayar_logo']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	
	$duzenle=$db->prepare("UPDATE ayar SET
		ayar_logo=:logo
		WHERE ayar_id=0");
	$update=$duzenle->execute(array(
		'logo' => $refimgyol
		));

	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/genel-ayar.php?durum=ok");

	} else {

		Header("Location:../production/genel-ayar.php?durum=no");
	}

}


	if (isset($_POST['genelayarkaydet'])) {
	
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author
		WHERE ayar_id= 0");

		$update=$ayarkaydet->execute(array(
			'ayar_title' =>	$_POST['ayar_title'],
			'ayar_description' => $_POST['ayar_description'],
			'ayar_keywords' => $_POST['ayar_keywords'],
			'ayar_author' => $_POST['ayar_author'],
			));
		if ($update) {
			header("location:../production/genel-ayar.php");
		}else {
			echo "başarısız";
		}
	}



	if (isset($_POST['iletisimayarkaydet'])) {
	
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_tel=:ayar_tel,
		ayar_gsm=:ayar_gsm,
		ayar_faks=:ayar_faks,
		ayar_mail=:ayar_mail
		WHERE ayar_id= 0");

		$update=$ayarkaydet->execute(array(
			'ayar_tel' =>	$_POST['ayar_tel'],
			'ayar_gsm' => $_POST['ayar_gsm'],
			'ayar_faks' => $_POST['ayar_faks'],
			'ayar_mail' => $_POST['ayar_mail'],
			));
		if ($update) {
			header("location:../production/iletisim-ayar.php");
		}else {
			echo "başarısız";
		}
	}


	if (isset($_POST['apiayarkaydet'])) {
	
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_analystic=:ayar_analystic,
		ayar_zopim=:ayar_zopim,
		ayar_maps=:ayar_maps
		WHERE ayar_id= 0");

		$update=$ayarkaydet->execute(array(
			'ayar_analystic' =>	$_POST['ayar_analystic'],
			'ayar_zopim' => $_POST['ayar_zopim'],
			'ayar_maps' => $_POST['ayar_maps'],
			));
		if ($update) {
			header("location:../production/api-ayar.php");
		}else {
			echo "başarısız";
		}
	}

	if (isset($_POST["hakkimizdaayarkaydet"])) {
		$hakkimizdakaydet=$db->prepare("UPDATE hakkimizda SET
			hakkimizda_baslik=:hakkimizda_baslik,
			hakkimizda_icerik=:hakkimizda_icerik,
			hakkimizda_video=:hakkimizda_video,
			hakkimizda_vizyon=:hakkimizda_vizyon,
			hakkimizda_misyon=:hakkimizda_misyon
			WHERE hakkimizda_id=0");

		$update=$hakkimizdakaydet->execute(array(
			'hakkimizda_baslik' => $_POST['hakkimizda_baslik'],
			'hakkimizda_icerik' => $_POST['hakkimizda_icerik'],
			'hakkimizda_video' => $_POST['hakkimizda_video'],
			'hakkimizda_vizyon' => $_POST['hakkimizda_vizyon'],
			'hakkimizda_misyon' => $_POST['hakkimizda_misyon'],
			));
		if ($update) {
			header("location:../production/hakkimizda-ayar.php");
			}else{
				echo "başarısız";
			}
	}



	if (isset($_POST['admingiris'])) {
		$kullanici_mail= $_POST['kullanici_mail'];
		$kullanici_password= md5($_POST['kullanici_password']);

		$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail AND kullanici_password=:password AND kullanici_yetki=:yetki");
		$kullanicisor->execute(array(
		'mail' =>  $kullanici_mail,
		'password' => $kullanici_password,
		'yetki' =>  1
		));
		 
		  $say=$kullanicisor->rowCount();

		 if ($say==1) {
		 	$_SESSION['kullanici_mail']=$kullanici_mail; //AND $_SESSION['kullanici_password']=$kullanici_password;
		 	header("location:../production/index.php?durum=ok");
		 }else{
		 		header("location:../production/login.php?durum=no");
		 	
		 }
	}

	

if (isset($_POST['kullaniciduzenle'])) {

	$kullanici_id=$_POST['kullanici_id'];

	$ayarkaydet=$db->prepare("UPDATE kullanici SET
		kullanici_tc=:kullanici_tc,
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_durum=:kullanici_durum
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$ayarkaydet->execute(array(
		'kullanici_tc' => $_POST['kullanici_tc'],
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_durum' => $_POST['kullanici_durum']
		));


	if ($update) {

		Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");

	} else {

		Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
	}

}






if (isset($_POST['menuduzenle'])) {

	$menu_id=$_POST['menu_id'];

	$menukaydet=$db->prepare("UPDATE menu SET
		menu_ad=:menu_ad,
		menu_sira=:menu_sira,
		menu_durum=:menu_durum
		WHERE menu_id={$_POST['menu_id']}");

	$update=$menukaydet->execute(array(
		'menu_ad' => $_POST['menu_ad'],
		'menu_sira' => $_POST['menu_sira'],
		'menu_durum' => $_POST['menu_durum']
		));


	if ($update) {

		Header("Location:../production/menu.php?menu_id=$menu_id&durum=ok");

	} else {

		Header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=no");
	}

}


if (isset($_GET['menu_id'])) {
	$menu_id=$_GET['menu_id'];

	$menusil=$db->prepare("DELETE from menu where menu_id=:id");
	$menubak=$menusil->execute(array(
		'id' => $_GET['menu_id']
		));


	if ($menubak) {


		header("location:../production/menu.php?sil=ok");



	} else {

		header("location:../production/menu.php?sil=no");

	}


}



if (isset($_POST['menukaydet'])) {

	
	$menu_seourl=seo($_POST['menu_ad']);


	$ayarekle=$db->prepare("INSERT INTO menu SET
		menu_ad=:menu_ad,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		");

	$insert=$ayarekle->execute(array(
		'menu_ad' => $_POST['menu_ad'],
		'menu_url' => $_POST['menu_url'],
		'menu_sira' => $_POST['menu_sira'],
		'menu_seourl' => $menu_seourl,
		'menu_durum' => $_POST['menu_durum']
		));


	if ($insert) {

		Header("Location:../production/menu.php?durum=ok");

	} else {

		Header("Location:../production/menu.php?durum=no");
	}

}


if (isset($_POST['sliderduzenle'])) {

	$slider_id=$_POST['slider_id'];

	$sliderkaydet=$db->prepare("UPDATE slider SET
		slider_ad=:slider_ad,
		slider_sira=:slider_sira,
		slider_resimyol=:slider_resimyol,
		slider_durum=:slider_durum
		WHERE slider_id={$_POST['slider_id']}");

	$update=$sliderkaydet->execute(array(
		'slider_ad' => $_POST['slider_ad'],
		'slider_sira' => $_POST['slider_sira'],
		'slider_resimyol' => $_POST['slider_resimyol'],
		'slider_durum' => $_POST['slider_durum']
		));


	if ($update) {

		Header("Location:../production/slider.php?slider_id=$slider_id&durum=ok");

	} else {

		Header("Location:../production/slider.php?slider_id=$slider_id&durum=no");
	}

}


if (isset($_POST['kullanicigiris'])) {
		
	
	 $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); 
	 $kullanici_password=md5($_POST['kullanici_password']); 



	$kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_mail=:kullanici_mail and kullanici_yetki=:kullanici_yetki and kullanici_password=:kullanici_password and kullanici_durum=:kullanici_durum");
	$kullanicisor->execute(array(
		'kullanici_mail' => $kullanici_mail,
		'kullanici_yetki' => 1,
		'kullanici_password' => $kullanici_password,
		'kullanici_durum' => 1
		));


	$say=$kullanicisor->rowCount();



	if ($say==1) {

		echo $_SESSION['kullanici_mail']=$kullanici_mail;

		header("Location:../../index.php?durum=basarili");
	

	} else {


		header("Location:../../?durum=basarisizgiris");

	}


		


if (isset($_POST['admingiris'])) {
	$kullanici_mail = $_POST['kullanici_mail'];
	$kullanici_password = ($_POST['kullanici_password']);




$kullanicisor=$db->prepare(" SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki"); 
$kullanicisor->execute(array(
'mail'=> $kullanici_mail,
'password'=> $kullanici_password,
'yetki'=> 5
  
)); 
echo $say=$kullanicisor->rowCount();

if ($say==1) {
	
	$_SESSION['kullanici_mail']= $kullanici_mail;
	$_SESSION['kullanici_password']= $kullanici_password;
	header("location: nedmin/production/index.php");
echo "doğru";

	
}/*else{

header("location:./login.php?durum=no");
exit;

*/


}
	
}


if (isset($_GET['urunsil'])) {
	

	
	$sil=$db->prepare("DELETE from urun where urun_id=:urun_id");
	$kontrol=$sil->execute(array(
		'urun_id' => $_GET['urun_id']
		));

	if ($kontrol) {

		Header("Location:../production/urunler.php?durum=ok");

	} else {

		Header("Location:../production/urunler.php?durum=no");
	}

}


if (isset($_POST['urunduzenle'])) {

	$urun_seourl=seo($_POST['urun_id']);

	$urunkaydet=$db->prepare("UPDATE urun SET
		kategori_id=:kategori_id,
		urun_ad=:urun_ad,
		urun_fiyat=:urun_fiyat,
		urun_durum=:urun_durum
		WHERE urun_id={$_POST['urun_id']}");

	$update=$urunkaydet->execute(array(
		'kategori_id'=> $_POST['kategori_id'],
		'urun_ad' => $_POST['urun_ad'],
		'urun_fiyat' => $_POST['urun_fiyat'],
		'urun_durum' => $_POST['urun_durum']
		));


	if ($update) {

		Header("Location:../production/urunler.php?menu_id=$menu_id&durum=ok");

	} else {

		Header("Location:../production/urun-duzenle.php?menu_id=$menu_id&durum=no");
	}

}


if (isset($_POST['urunekle'])) {
	$urun_seourl=seo($_POST['urun_ad']);

	$kaydet=$db->prepare("INSERT into urun SET 
		kategori_id=:kategori_id,
		urun_ad=:urun_ad,
		urun_detay=:urun_detay,
		urun_fiyat=:urun_fiyat
		");

	$insert=$kaydet->execute(array(

	'kategori_id'=> $_POST['kategori_id'],
	'urun_ad'=> $_POST['urun_ad'],
	'urun_detay'=> $_POST['urun_detay'],
	'urun_fiyat'=> $_POST['urun_fiyat']
		));
	if ($insert) {
	header("location:../production/urunler.php");	
	}else{
		header("location:/production/urun-ekle.php");
	}
	

}

if (isset($_POST['yorumkaydet'])){
	$gelen_url=$_POST['gelen_url'];
	
	$yorumkaydet=$db->prepare("INSERT INTO yorumlar SET 

			kullanici_id=:kullanici_id,
			yorum_detay=:yorum_detay,
			urun_id=:urun_id

			");
			$insert=$yorumkaydet->execute(array(
			
			'kullanici_id'=>$_POST['kullanici_id'],
			'yorum_detay'=>$_POST['yorum_detay'],
			'urun_id'=>$_POST['urun_id']
			));
			if ($insert) {
				header("location:$gelen_url?durum=ok");
			}else{
				header("location:$gelen_url?durum=no"); 
			}

}


if (isset($_POST['yorumduzenle'])) {
	$yorum_id=$_POST['yorum_id'];

	
	$yorumkaydet=$db->prepare("UPDATE yorumlar SET
		yorum_onay=:yorum_onay
		WHERE yorum_id={$_POST['yorum_id']}");

	$update=$yorumkaydet->execute(array(
		'yorum_onay' => $_POST['yorum_onay']
		));


	if ($update) {

		Header("Location:../production/yorumlar.php?yorum_id=$kategori_id&durum=ok");

	} else {

		Header("Location:../production/yorumlar.php?yorum_id=$kategori_id&durum=ok");
	}

}	


if (isset($_POST['yorumsil'])) {
	$yorum_id=$_GET['yorum_id'];

	$yorumsil=$db->prepare("DELETE from yorumlar where yorum_id=:id");
	$yorumbak=$yorumsil->execute(array(
		'id' => $_GET['yorum_id']
		));


	if ($yorumbak) {


		header("location:../production/yorumlar.php?sil=ok");



	} else {

		header("location:../production/yorumlar.php?sil=no");

	}


}


if (isset($_POST['sepeteekle'])){
	$kullanici_id=$_POST['kullanici_id'];
	
	$ayarkaydet=$db->prepare("INSERT INTO sepet SET 

			
			kullanici_id=:kullanici_id,
			urun_adet=:urun_adet,
			urun_id=:urun_id

			");
			$insert=$ayarkaydet->execute(array(
			
			
			'kullanici_id'=>$_POST['kullanici_id'],
			'urun_adet'=>$_POST['urun_adet'],
			'urun_id'=>$_POST['urun_id']
						));
			if ($insert) {
				header("location:../../sepet.php?durum=ok");
			}else{
				header("location:../../sepet.php?durum=ok");
			}

}













	
















 ?>