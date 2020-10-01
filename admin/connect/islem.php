<?php 
ob_start();
session_start();
include 'config.php';



	

if (isset($_POST['loggin'])) {
	

	$kullanici_ad = $_POST['kullanici_ad'];
	$kullanici_password = md5($_POST['kullanici_password']);
	

		if ($kullanici_ad && $kullanici_password) {
			
			$kullanicisor = $conn->prepare("SELECT * FROM kullanici WHERE kullanici_ad=:ad AND kullanici_password=:password");
			$kullanicisor->execute(array(
				'ad' => $kullanici_ad,
				'password' => $kullanici_password));

			echo $say =$kullanicisor->rowCount();

			if ($say > 0) {
				$_SESSION['kullanici_ad'] = $kullanici_ad;

				header('location:../production/index.php');
			} else {
				header('location:../production/login.php?durum=no');
			}
	
		}

}



// Genel ayarlar

if (isset($_POST['genelayarkaydet'])) {

$ayarkaydet =$conn->prepare("UPDATE ayar SET
ayar_siteurl=:siteurl,
ayar_title=:title,
ayar_description=:description,
ayar_keyw=:keyw,
ayar_author=:author
WHERE ayar_id=1");

$guncelle = $ayarkaydet->execute(array(
'siteurl' => $_POST['ayar_siteurl'],
'title' => $_POST['ayar_title'],
'description' => $_POST['ayar_description'],
'keyw' => $_POST['ayar_keyw'],
'author' => $_POST['ayar_author']
));

if ($guncelle) {
	header("location:../production/genel-ayar.php?durum=ok");
} else {
	header("location:../production/genel-ayar.php?durum=no");
}
}

//iletisim ayarlari



if (isset($_POST['iletisimayarkaydet'])) {

$ayarkaydet =$conn->prepare("UPDATE ayar SET
ayar_mail=:mail,
ayar_facebook=:facebook,
ayar_twitter=:twitter,
ayar_youtube=:youtube,
ayar_instagram=:instagram
WHERE ayar_id=1");

$guncelle = $ayarkaydet->execute(array(
'mail' => $_POST['ayar_mail'],
'facebook' => $_POST['ayar_facebook'],
'twitter' => $_POST['ayar_twitter'],
'youtube' => $_POST['ayar_youtube'],
'instagram' => $_POST['ayar_instagram']
));

if ($guncelle) {
	header("location:../production/iletisim-ayar.php?durum=ok");
} else {
	header("location:../production/iletisim-ayar.php?durum=no");
}
}


// Api ayarlar

if (isset($_POST['apiayarkaydet'])) {

$ayarkaydet =$conn->prepare("UPDATE ayar SET
ayar_recapctha=:recapctha,
ayar_googlemap=:googlemap,
ayar_analystic=:analystic
WHERE ayar_id=1");

$guncelle = $ayarkaydet->execute(array(
'recapctha' => $_POST['ayar_recapctha'],
'googlemap' => $_POST['ayar_googlemap'],
'analystic' => $_POST['ayar_analystic']
));

if ($guncelle) {
	header("location:../production/api-ayar.php?durum=ok");
} else {
	header("location:../production/api-ayar.php?durum=no");
}
}


// Smtp ayarlari

if (isset($_POST['smtpayarkaydet'])) {

$ayarkaydet =$conn->prepare("UPDATE ayar SET
ayar_smtphost=:smtphost,
ayar_smtpuser=:smtpuser,
ayar_smtppassword=:smtppassword,
ayar_smtpport=:smtpport
WHERE ayar_id=1");

$guncelle = $ayarkaydet->execute(array(
'smtphost' => $_POST['ayar_smtphost'],
'smtpuser' => $_POST['ayar_smtpuser'],
'smtppassword' => $_POST['ayar_smtppassword'],
'smtpport' => $_POST['ayar_smtpport']
));

if ($guncelle) {
	header("location:../production/smtp-ayar.php?durum=ok");
} else {
	header("location:../production/smtp-ayar.php?durum=no");
}
}


// Hakkimizda bölumu 

if (isset($_POST['hakkimizdakaydet'])) {

$ayarkaydet =$conn->prepare("UPDATE hakkimizda SET
hakkimizda_baslik=:baslik,
hakkimizda_icerik=:icerik,
hakkimizda_video=:video,
hakkimizda_vizyon=:vizyon,
hakkimizda_misyon=:misyon
WHERE hakkimizda_id=0");

$guncelle = $ayarkaydet->execute(array(
'baslik' => $_POST['hakkimizda_baslik'],
'icerik' => $_POST['hakkimizda_icerik'],
'video' => $_POST['hakkimizda_video'],
'vizyon' => $_POST['hakkimizda_vizyon'],
'misyon' => $_POST['hakkimizda_misyon']
));

if ($guncelle) {
	header("location:../production/hakkimizda.php?durum=ok");
} else {
	header("location:../production/hakkimizda.php?durum=no");
}
}

// Slider ekle bölumu 

if (isset($_POST['sliderkaydet'])) {

	$uploads_dir = '../../img/slider/';
	@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
	$name = $_FILES['slider_resimyol']["name"];
	$benzersizsayi1 = rand(20000,32000);
	$benzersizsayi2 = rand(20000,32000);
	$benzersizsayi3 = rand(20000,32000);
	$benzersizsayi4 = rand(20000,32000);
	$benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol = substr($uploads_dir,6)."".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

$kaydet =$conn->prepare("INSERT INTO slider SET
slider_ad=:ad,
slider_link=:link,
slider_sira=:sira,
slider_durum=:durum,
slider_resimyol=:resimyol");

$insert = $kaydet->execute(array(
'ad' => $_POST['slider_ad'],
'link' => $_POST['slider_link'],
'sira' => $_POST['slider_sira'],
'durum' => $_POST['slider_durum'],
'resimyol' => $refimgyol
));

if ($insert) {
	header("location:../production/slider.php?durum=ok");
} else {
	header("location:../production/slider.php?durum=no");
}
}

// Slider sil bolumu


if (@$_GET['slidersil'] == "ok") {
	
	$sil = $conn->prepare("DELETE FROM slider WHERE slider_id =:slider_id");

	$kontrol = $sil->execute(array(
		'slider_id' => $_GET['slider_id']
	));

	if ($kontrol) {

	header("location:../production/slider.php?durum=ok");
} else {
	header("location:../production/slider.php?durum=no");
}
}

// Slider Guncelle 


if (isset($_POST['sliderduzenle'])) {

	if ($_FILES['slider_resimyol']["size"] > 0) {

		$uploads_dir = '../../img/slider/';
	@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
	$name = $_FILES['slider_resimyol']["name"];
	$benzersizsayi1 = rand(20000,32000);
	$benzersizsayi2 = rand(20000,32000);
	$benzersizsayi3 = rand(20000,32000);
	$benzersizsayi4 = rand(20000,32000);
	$benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol = substr($uploads_dir,6)."".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

	$sliderid = $_POST['slider_id'];

$sliderduzenle =$conn->prepare("UPDATE slider SET
slider_ad=:ad,
slider_link=:link,
slider_sira=:sira,
slider_durum=:durum,
slider_resimyol=:resimyol
WHERE slider_id=$sliderid");

$guncelle = $sliderduzenle->execute(array(
'ad' => $_POST['slider_ad'],
'link' => $_POST['slider_link'],
'sira' => $_POST['slider_sira'],
'durum' => $_POST['slider_durum'],
'resimyol' => $refimgyol
));

$resimsilunlink = $_POST['slider_resimyol'];

unlink("../../$resimsilunlink");

if ($guncelle) {
	header("location:../production/slider-duzenle.php?slider_id=$sliderid&durum=ok");
} else {
	header("location:../production/slider-duzenle.php?durum=no");
}
	
	} else {

	$sliderid = $_POST['slider_id'];

$sliderduzenle =$conn->prepare("UPDATE slider SET
slider_ad=:ad,
slider_link=:link,
slider_sira=:sira,
slider_durum=:durum
WHERE slider_id=$sliderid");

$guncelle = $sliderduzenle->execute(array(
'ad' => $_POST['slider_ad'],
'link' => $_POST['slider_link'],
'sira' => $_POST['slider_sira'],
'durum' => $_POST['slider_durum']
));

if ($guncelle) {
	header("location:../production/slider-duzenle.php?slider_id=$sliderid&durum=ok");
} else {
	header("location:../production/slider-duzenle.php?durum=no");
}
}
}

// icerik ekle bölumu 

if (isset($_POST['icerikkaydet'])) {

	$uploads_dir = '../../img/icerik/';
	@$tmp_name = $_FILES['icerik_resimyol']["tmp_name"];
	$name = $_FILES['icerik_resimyol']["name"];
	$benzersizsayi1 = rand(20000,32000);
	$benzersizsayi2 = rand(20000,32000);
	$benzersizsayi3 = rand(20000,32000);
	$benzersizsayi4 = rand(20000,32000);
	$benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol = substr($uploads_dir,6)."".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");


$tarih = $_POST['icerik_tarih'];
$saat = $_POST['icerik_saat'];

$zaman = $tarih." ".$saat;

$kaydet =$conn->prepare("INSERT INTO icerik SET
icerik_ad=:ad,
icerik_detay=:detay,
icerik_keyword=:keyword,
icerik_kaynak=:kaynak,
icerik_durum=:durum,
icerik_resimyol=:resimyol,
icerik_zaman=:zaman");

$insert = $kaydet->execute(array(
'ad' => $_POST['icerik_ad'],
'detay' => $_POST['icerik_detay'],
'keyword' => $_POST['icerik_keyword'],
'kaynak' => $_POST['icerik_kaynak'],
'durum' => $_POST['icerik_durum'],
'resimyol' => $refimgyol,
'zaman' => $zaman
));

if ($insert) {
	header("location:../production/icerik.php?durum=ok");
} else {
	header("location:../production/icerik.php?durum=no");
}
}



// icerik sil bolumu


if (@$_GET['iceriksil'] == "ok") {
	
	$sil = $conn->prepare("DELETE FROM icerik WHERE icerik_id =:icerik_id");

	$kontrol = $sil->execute(array(
		'icerik_id' => $_GET['icerik_id']
	));

	if ($kontrol) {

	header("location:../production/icerik.php?durum=ok");
} else {
	header("location:../production/icerik.php?durum=no");
}
}

// icerik Guncelle 


if (isset($_POST['icerikduzenle'])) {

	if ($_FILES['icerik_resimyol']["size"] > 0) {

		$uploads_dir = '../../img/icerik/';
	@$tmp_name = $_FILES['icerik_resimyol']["tmp_name"];
	$name = $_FILES['icerik_resimyol']["name"];
	$benzersizsayi1 = rand(20000,32000);
	$benzersizsayi2 = rand(20000,32000);
	$benzersizsayi3 = rand(20000,32000);
	$benzersizsayi4 = rand(20000,32000);
	$benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol = substr($uploads_dir,6)."".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

	$icerikid = $_POST['icerik_id'];

	$tarih = $_POST['icerik_tarih'];
	$saat = $_POST['icerik_saat'];

	$zaman = $tarih." ".$saat;

$icerikduzenle =$conn->prepare("UPDATE icerik SET
icerik_ad=:ad,
icerik_detay=:detay,
icerik_keyword=:keyword,
icerik_kaynak=:kaynak,
icerik_durum=:durum,
icerik_resimyol=:resimyol,
icerik_zaman=:zaman
WHERE icerik_id=$icerikid");

$guncelle = $icerikduzenle->execute(array(
'ad' => $_POST['icerik_ad'],
'detay' => $_POST['icerik_detay'],
'keyword' => $_POST['icerik_keyword'],
'kaynak' => $_POST['icerik_kaynak'],
'durum' => $_POST['icerik_durum'],
'resimyol' => $refimgyol,
'zaman' => $zaman
));

$resimsilunlink = $_POST['icerik_resimyol'];

unlink("../../$resimsilunlink");

if ($guncelle) {
	header("location:../production/icerik-duzenle.php?icerik_id=$icerikid&durum=ok");
} else {
	header("location:../production/icerik-duzenle.php?durum=no");
}
	
	} else {

	$icerikid = $_POST['icerik_id'];
	$tarih = $_POST['icerik_tarih'];
	$saat = $_POST['icerik_saat'];

	$zaman = $tarih." ".$saat;

$icerikduzenle =$conn->prepare("UPDATE icerik SET
icerik_ad=:ad,
icerik_detay=:detay,
icerik_keyword=:keyword,
icerik_kaynak=:kaynak,
icerik_durum=:durum,
icerik_zaman=:zaman
WHERE icerik_id=$icerikid");

$guncelle = $icerikduzenle->execute(array(
'ad' => $_POST['icerik_ad'],
'detay' => $_POST['icerik_detay'],
'keyword' => $_POST['icerik_keyword'],
'kaynak' => $_POST['icerik_kaynak'],
'durum' => $_POST['icerik_durum'],
'zaman' => $zaman
));

if ($guncelle) {
	header("location:../production/icerik-duzenle.php?icerik_id=$icerikid&durum=ok");
} else {
	header("location:../production/icerik-duzenle.php?durum=no");
}
}
}



 ?>