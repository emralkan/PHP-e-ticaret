	<?php
	ob_start();
	session_start();


include'../baglan.php';


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
exit;

	
}/*else{

header("location:./login.php?durum=no");
exit;

*/


}









if (isset($_POST['genelayarkaydet'])) {
	//echo "doğru yere geldi";
$ayarkaydet=$db->prepare("UPDATE ayar SET 


ayar_title=:ayar_title,
ayar_description=:ayar_description,
ayar_keywords=:ayar_keywords,
ayar_author=:ayar_author

WHERE ayar_id=0 "); 

$update=$ayarkaydet->execute(array(
'ayar_title'=> $_POST['ayar_title'],
'ayar_description'=> $_POST['ayar_description'],
'ayar_keywords'=> $_POST['ayar_keywords'],
'ayar_author'=> $_POST['ayar_author'],

));



/*if ($update) {
	echo "güncelleme başarılı";
	}else {
		echo "güncelleme başarısız";
	}
*/	


if ($update) {	
	header("location:genel-ayar.php?durum=ok");
	}else {
		header("location:genel-ayar.php?durum=no");
	}
	




}





















if (isset($_POST['iletisimayarkaydet'])) {
	//echo "doğru yere geldi";
$ayarkaydet=$db->prepare("UPDATE ayar SET 


ayar_tel=:ayar_tel,
ayar_gsm=:ayar_gsm,
ayar_fax=:ayar_fax,
ayar_mail=:ayar_mail,
ayar_il=:ayar_il,
ayar_ilce=:ayar_ilce,
ayar_adres=:ayar_adres,
ayar_mesai=:ayar_mesai

WHERE ayar_id=0 "); 


$update=$ayarkaydet->execute(array(
'ayar_tel'=> $_POST['ayar_tel'],
'ayar_gsm'=> $_POST['ayar_gsm'],
'ayar_fax'=> $_POST['ayar_fax'],
'ayar_mail'=> $_POST['ayar_mail'],
'ayar_il'=> $_POST['ayar_il'],
'ayar_ilce'=> $_POST['ayar_ilce'],
'ayar_adres'=> $_POST['ayar_adres'],
'ayar_mesai'=> $_POST['ayar_mesai'],
));



/*if ($update) {
	echo "güncelleme başarılı";
	}else {
		echo "güncelleme başarısız";
	}
*/	


if ($update) {	
	header("location:iletisim-ayar.php?durum=ok");
	}else {
		header("location:iletisim-ayar.php?durum=no");
	}
	




}




if (isset($_POST['apiayarkaydet'])) {
	//echo "doğru yere geldi";
$ayarkaydet=$db->prepare("UPDATE ayar SET 


ayar_maps=:ayar_maps,
ayar_analystic=:ayar_analystic,
ayar_zopim=:ayar_zopim

WHERE ayar_id=0 "); 

$update=$ayarkaydet->execute(array(
'ayar_maps'=> $_POST['ayar_maps'],
'ayar_analystic'=> $_POST['ayar_analystic'],
'ayar_zopim'=> $_POST['ayar_zopim']

));



/*if ($update) {
	echo "güncelleme başarılı";
	}else {
		echo "güncelleme başarısız";
	}
*/	


if ($update) {	
	header("location:api-ayar.php?durum=ok");
	}else {
		header("location:api-ayar.php?durum=no");
	}


}

















if (isset($_POST['sosyalayarkaydet'])) {
	//echo "doğru yere geldi";
$ayarkaydet=$db->prepare("UPDATE ayar SET 


ayar_facebook=:ayar_facebook,
ayar_twitter=:ayar_twitter,
ayar_youtube=:ayar_youtube


WHERE ayar_id=0 "); 


$update=$ayarkaydet->execute(array(
'ayar_facebook'=> $_POST['ayar_facebook'],
'ayar_twitter'=> $_POST['ayar_twitter'],
'ayar_youtube'=> $_POST['ayar_youtube'],

));



/*if ($update) {
	echo "güncelleme başarılı";
	}else {
		echo "güncelleme başarısız";
	}
*/	


if ($update) {	
	header("location:sosyal-ayar.php?durum=ok");
	}else {
		header("location:sosyal-ayar.php?durum=no");
	}
	




}

















if (isset($_POST['mailayarkaydet'])) {
	//echo "doğru yere geldi";
$ayarkaydet=$db->prepare("UPDATE ayar SET 


ayar_smtphost=:ayar_smtphost,
ayar_smtppassword=:ayar_smtppassword,
ayar_smtpport=:ayar_smtpport


WHERE ayar_id=0 "); 


$update=$ayarkaydet->execute(array(
'ayar_smtphost'=> $_POST['ayar_smtphost'],
'ayar_smtppassword'=> $_POST['ayar_smtppassword'],
'ayar_smtpport'=> $_POST['ayar_smtpport'],

));



/*if ($update) {
	echo "güncelleme başarılı";
	}else {
		echo "güncelleme başarısız";
	}
*/	


if ($update) {	
	header("location:mail-ayar.php?durum=ok");
	}else {
		header("location:mail-ayar.php?durum=no");
	}
	




}






if (isset($_POST['hakkimizdaayarkaydet'])) {
	//echo "doğru yere geldi";

$hakkimizdakaydet=$db->prepare("UPDATE hakkimizda SET 


hakkimizda_baslik=:hakkimizda_baslik,

hakkimizda_icerik=:hakkimizda_icerik,

hakkimizda_video=:hakkimizda_video,

hakkimizda_vizyon=:hakkimizda_vizyon,

hakkimizda_misyon=:hakkimizda_misyon


WHERE hakkimizda_id = 0 "); 


$update=$hakkimizdakaydet->execute(array(

'hakkimizda_baslik'=> $_POST['hakkimizda_baslik'],

'hakkimizda_icerik'=> $_POST['hakkimizda_icerik'],

'hakkimizda_video'=> $_POST['hakkimizda_video'],

'hakkimizda_vizyon'=> $_POST['hakkimizda_vizyon'],

'hakkimizda_misyon'=> $_POST['hakkimizda_misyon'],

));



/*if ($update) {
	echo "güncelleme başarılı";
	}else {
		echo "güncelleme başarısız";
	}
*/	


if ($update) {	
	header("location:hakkimizda-ayar.php?durum=ok");
	}else {
		header("location:hakkimizda-ayar.php?durum=no");
	}
	




}









 
?>
