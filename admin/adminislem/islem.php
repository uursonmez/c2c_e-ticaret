<?php
ob_start();
session_start();
include 'baglan.php';
include '../fonksiyon.php';


if (isset($_POST['kullanicigiris'])) {



	echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']);
	echo $kullanici_password=md5($_POST['kullanici_password']);



	$kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki and kullanici_password=:password and kullanici_durum=:durum");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'yetki' => 1,
		'password' => $kullanici_password,
		'durum' => 1
		));


	$say=$kullanicisor->rowCount();



	if ($say==1) {

		echo $_SESSION['userkullanici_mail']=$kullanici_mail;

		header("Location:../../");
		exit;





	} else {


		header("Location:../../login.php?durum=basarisizgiris");

	}


}



if (isset($_POST['kullanicikaydet'])) {


  echo $kullanici_ad=htmlspecialchars($_POST['kullanici_ad']); echo "<br>";
  echo $kullanici_soyad=htmlspecialchars($_POST['kullanici_soyad']); echo "<br>";
  echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); echo "<br>";

  echo $kullanici_passwordone=$_POST['kullanici_passwordone']; echo "<br>";
  echo $kullanici_passwordtwo=$_POST['kullanici_passwordtwo']; echo "<br>";


  if ($kullanici_passwordone==$kullanici_passwordtwo) {


    if ($kullanici_passwordone>=6) {


// Başlangıç

      $kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail");
      $kullanicisor->execute(array(
        'mail' => $kullanici_mail
        ));

      //dönen satır sayısını belirtir
      $say=$kullanicisor->rowCount();



      if ($say==0) {

        //md5 fonksiyonu şifreyi md5 şifreli hale getirir.
        $password=md5($kullanici_passwordone);

        $kullanici_yetki=1;

      //Kullanıcı kayıt işlemi yapılıyor...
        $kullanicikaydet=$db->prepare("INSERT INTO kullanici SET
          kullanici_ad=:kullanici_ad,
          kullanici_soyad=:kullanici_soyad,
          kullanici_mail=:kullanici_mail,
          kullanici_password=:kullanici_password,
          kullanici_yetki=:kullanici_yetki
          ");
        $insert=$kullanicikaydet->execute(array(
          'kullanici_ad' => $kullanici_ad,
          'kullanici_soyad' => $kullanici_soyad,
          'kullanici_mail' => $kullanici_mail,
          'kullanici_password' => $password,
          'kullanici_yetki' => $kullanici_yetki
          ));

        if ($insert) {


          header("Location:../../login.php?durum=kayitbasarili");


        //Header("Location:../production/genel-ayarlar.php?durum=ok");

        } else {


          header("Location:../../register.php?durum=basarisiz");
        }

      } else {

        header("Location:../../register.php?durum=mukerrerkayit");



      }



		// Bitiş



		} else {


			header("Location:../../register.php?durum=eksiksifre");


		}



	} else {



		header("Location:../../register.php?durum=farklisifre");
	}



}




if (isset($_POST['admingiris'])) {

	$kullanici_mail=$_POST['kullanici_mail'];
	$kullanici_password=md5($_POST['kullanici_password']);

	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'password' => $kullanici_password,
		'yetki' => 5
		));

	echo $say=$kullanicisor->rowCount();

	if ($say==1) {

		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("Location:../indexx.php");
		exit;

	} else {

		header("Location:../login.php?durum=no");
		exit;
	}



}



if (isset($_POST['genelayarkaydet'])) {
//Tablo güncelleme işlemleri
$ayarkaydet=$db->prepare("UPDATE ayar SET
  ayar_title=:ayar_title,
  ayar_description=:ayar_description,
  ayar_keywords=:ayar_keywords,
  ayar_author=:ayar_author
  WHERE ayar_id=1");

$update=$ayarkaydet->execute(array(

  'ayar_title'=> $_POST['ayar_title'],
  'ayar_description'=> $_POST['ayar_description'],
  'ayar_keywords'=> $_POST['ayar_keywords'],
  'ayar_author'=> $_POST['ayar_author']

));

if ($update) {
  header ("Location: ../genel-ayarlarr.php?durum=ok");
}
else {
  header ("Location: ../genel-ayarlarr.php?durum=no");
}

}



if (isset($_POST['iletisimayarkaydet'])) {
//Tablo güncelleme işlemleri
$ayarkaydet=$db->prepare("UPDATE ayar SET
  ayar_tel=:ayar_tel,
  ayar_gsm=:ayar_gsm,
  ayar_faks=:ayar_faks,
  ayar_mail=:ayar_mail,
  ayar_ilce=:ayar_ilce,
  ayar_il=:ayar_il,
  ayar_adres=:ayar_adres,
  ayar_mesai=:ayar_mesai
  WHERE ayar_id=1");

$update=$ayarkaydet->execute(array(

  'ayar_tel'=> $_POST['ayar_tel'],
  'ayar_gsm'=> $_POST['ayar_gsm'],
  'ayar_faks'=> $_POST['ayar_faks'],
  'ayar_mail'=> $_POST['ayar_mail'],
  'ayar_ilce'=> $_POST['ayar_ilce'],
  'ayar_il'=> $_POST['ayar_il'],
  'ayar_adres'=> $_POST['ayar_adres'],
  'ayar_mesai'=> $_POST['ayar_mesai']

));

if ($update) {
  header ("Location: ../iletisim-ayarlar.php?durum=ok");
}
else {
  header ("Location: ../iletisim-ayarlarr.php?durum=no");
}

}



if (isset($_POST['apiayarkaydet'])) {
//Tablo güncelleme işlemleri
$ayarkaydet=$db->prepare("UPDATE ayar SET
  ayar_analystic=:ayar_analystic,
  ayar_maps=:ayar_maps,
  ayar_zopim=:ayar_zopim
  WHERE ayar_id=1");

$update=$ayarkaydet->execute(array(

  'ayar_analystic'=> $_POST['ayar_analystic'],
  'ayar_maps'=> $_POST['ayar_maps'],
  'ayar_zopim'=> $_POST['ayar_zopim']

));

if ($update) {
  header ("Location: ../api-ayarlar.php?durum=ok");
}
else {
  header ("Location: ../api-ayarlarr.php?durum=no");
}

}


if (isset($_POST['sosyalayarkaydet'])) {
//Tablo güncelleme işlemleri
$ayarkaydet=$db->prepare("UPDATE ayar SET
  ayar_facebook=:ayar_facebook,
  ayar_twitter=:ayar_twitter,
  ayar_youtube=:ayar_youtube,
  ayar_google=:ayar_google
  WHERE ayar_id=1");

$update=$ayarkaydet->execute(array(

  'ayar_facebook'=> $_POST['ayar_facebook'],
  'ayar_twitter'=> $_POST['ayar_twitter'],
  'ayar_youtube'=> $_POST['ayar_youtube'],
  'ayar_google'=> $_POST['ayar_google']

));

if ($update) {
  header ("Location: ../sosyal-ayarlar.php?durum=ok");
}
else {
  header ("Location: ../sosyal-ayarlarr.php?durum=no");
}

}


if (isset($_POST['mailayarkaydet'])) {
//Tablo güncelleme işlemleri
$ayarkaydet=$db->prepare("UPDATE ayar SET
  ayar_smtphost=:ayar_smtphost,
  ayar_smtpuser=:ayar_smtpuser,
  ayar_smtppassword=:ayar_smtppassword,
  ayar_smtpport=:ayar_smtpport
  WHERE ayar_id=1");

$update=$ayarkaydet->execute(array(

  'ayar_smtphost'=> $_POST['ayar_smtphost'],
  'ayar_smtpuser'=> $_POST['ayar_smtpuser'],
  'ayar_smtppassword'=> $_POST['ayar_smtppassword'],
  'ayar_smtpport'=> $_POST['ayar_smtpport']

));

if ($update) {
  header ("Location: ../mail-ayarlar.php?durum=ok");
}
else {
  header ("Location: ../mail-ayarlar.php?durum=no");
}

}



if (isset($_POST['hakkimizdakaydet'])) {
//hakkimizda tablo güncelleme
$ayarkaydet=$db->prepare("UPDATE hakkimizda SET
  hakkimizda_baslik=:hakkimizda_baslik,
  hakkimizda_icerik=:hakkimizda_icerik,
  hakkimizda_video=:hakkimizda_video,
  hakkimizda_vizyon=:hakkimizda_vizyon,
  hakkimizda_misyon=:hakkimizda_misyon
  WHERE hakkimizda_id=0");

$update=$ayarkaydet->execute(array(

  'hakkimizda_baslik'=> $_POST['hakkimizda_baslik'],
  'hakkimizda_icerik'=> $_POST['hakkimizda_icerik'],
  'hakkimizda_video'=> $_POST['hakkimizda_video'],
  'hakkimizda_vizyon'=> $_POST['hakkimizda_vizyon'],
  'hakkimizda_misyon'=> $_POST['hakkimizda_misyon']

));

if ($update) {
  header ("Location: ../hakkimizda.php?durum=ok");
}
else {
  header ("Location: ../hakkimizda.php?durum=no");
}
}

if (isset($_POST['genelayarkaydet'])) {
//Tablo güncelleme işlemleri
$ayarkaydet=$db->prepare("UPDATE ayar SET
  ayar_title=:ayar_title,
  ayar_description=:ayar_description,
  ayar_keywords=:ayar_keywords,
  ayar_author=:ayar_author
  WHERE ayar_id=1");

$update=$ayarkaydet->execute(array(

  'ayar_title'=> $_POST['ayar_title'],
  'ayar_description'=> $_POST['ayar_description'],
  'ayar_keywords'=> $_POST['ayar_keywords'],
  'ayar_author'=> $_POST['ayar_author']

));

if ($update) {
  header ("Location: ../genel-ayarlarr.php?durum=ok");
}
else {
  header ("Location: ../genel-ayarlarr.php?durum=no");
}

}

if (isset($_POST['kullaniciduzenle'])) {

	$kullanici_id=$_POST['kullanici_id'];

	$ayarkaydet=$db->prepare("UPDATE kullanici SET
		kullanici_tc=:kullanici_tc,
		kullanici_ad=:kullanici_ad,
		kullanici_soyad=:kullanici_soyad,
		kullanici_durum=:kullanici_durum
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$ayarkaydet->execute(array(
		'kullanici_tc' => $_POST['kullanici_tc'],
		'kullanici_ad' => $_POST['kullanici_ad'],
		'kullanici_soyad' => $_POST['kullanici_soyad'],
		'kullanici_durum' => $_POST['kullanici_durum']
		));


	if ($update) {

		Header("Location:../kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");

	} else {

		Header("Location:../kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
	}

}


if ($_GET['kullanicisil']=="ok") {

	$sil=$db->prepare("DELETE from kullanici where kullanici_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['kullanici_id']
		));


	if ($kontrol) {


		header("location:../kullanici.php?sil=ok");


	} else {

		header("location:../kullanici.php?sil=no");

	}


}


if (isset($_POST['menuduzenle'])) {

  $menu_id=$_POST['menu_id'];

  $menu_seourl=seo($_POST['menu_ad']);


  $ayarkaydet=$db->prepare("UPDATE menu SET
    menu_ad=:menu_ad,
    menu_detay=:menu_detay,
    menu_url=:menu_url,
    menu_sira=:menu_sira,
    menu_seourl=:menu_seourl,
    menu_durum=:menu_durum
    WHERE menu_id={$_POST['menu_id']}");

  $update=$ayarkaydet->execute(array(
    'menu_ad' => $_POST['menu_ad'],
    'menu_detay' => $_POST['menu_detay'],
    'menu_url' => $_POST['menu_url'],
    'menu_sira' => $_POST['menu_sira'],
    'menu_seourl' => $menu_seourl,
    'menu_durum' => $_POST['menu_durum']
    ));


  if ($update) {

    Header("Location:../menu-duzenle.php?menu_id=$menu_id&durum=ok");

  } else {

    Header("Location:../menu-duzenle.php?menu_id=$menu_id&durum=no");
  }

}

if ($_GET['menusil']=="ok") {

  $sil=$db->prepare("DELETE from menu where menu_id=:id");
  $kontrol=$sil->execute(array(
    'id' => $_GET['menu_id']
    ));


  if ($kontrol) {


    header("location:../menu.php?sil=ok");


  } else {

    header("location:../menu.php?sil=no");

  }


}


if (isset($_POST['menukaydet'])) {


  $menu_seourl=seo($_POST['menu_ad']);


  $ayarekle=$db->prepare("INSERT INTO menu SET
    menu_ad=:menu_ad,
    menu_detay=:menu_detay,
    menu_url=:menu_url,
    menu_sira=:menu_sira,
    menu_seourl=:menu_seourl,
    menu_durum=:menu_durum
    ");

  $insert=$ayarekle->execute(array(
    'menu_ad' => $_POST['menu_ad'],
    'menu_detay' => $_POST['menu_detay'],
    'menu_url' => $_POST['menu_url'],
    'menu_sira' => $_POST['menu_sira'],
    'menu_seourl' => $menu_seourl,
    'menu_durum' => $_POST['menu_durum']
    ));


  if ($insert) {

    Header("Location:../menu.php?durum=ok");

  } else {

    Header("Location:../menu.php?durum=no");
  }

}

if (isset($_POST['kullanicibilgileriduzenle'])) {

  $kullanici_id=$_POST['kullanici_id'];

  $ayarkaydet=$db->prepare("UPDATE kullanici SET
    kullanici_tc=:kullanici_tc,
		kullanici_gsm=:kullanici_gsm,
    kullanici_ad=:kullanici_ad,
    kullanici_soyad=:kullanici_soyad
    WHERE kullanici_id={$_POST['kullanici_id']}");

  $update=$ayarkaydet->execute(array(
    'kullanici_tc' => $_POST['kullanici_tc'],
		'kullanici_gsm' => $_POST['kullanici_gsm'],
    'kullanici_ad' => $_POST['kullanici_ad'],
    'kullanici_soyad' => $_POST['kullanici_soyad']

    ));


  if ($update) {
/*
    Header("Location:../../kullanici-bilgiler-duzenle.php?kullanici_id=$kullanici_id&durum=ok");
*/
		Header("Location:../../kullanici-bilgiler-duzenle.php?durum=ok");
  } else {

    Header("Location:../../kullanici-bilgiler-duzenle.php?durum=no");
  }

}




if (isset($_POST['kategoriduzenle'])) {

  $kategori_id=$_POST['kategori_id'];
  $kategori_seourl=seo($_POST['kategori_ad']);


  $kaydet=$db->prepare("UPDATE kategori SET
    kategori_ad=:ad,
    kategori_durum=:kategori_durum,
    kategori_seourl=:seourl,
    kategori_sira=:sira
    WHERE kategori_id={$_POST['kategori_id']}");
  $update=$kaydet->execute(array(
    'ad' => $_POST['kategori_ad'],
    'kategori_durum' => $_POST['kategori_durum'],
    'seourl' => $kategori_seourl,
    'sira' => $_POST['kategori_sira']
    ));

  if ($update) {

    Header("Location:../kategori-duzenle.php?durum=ok&kategori_id=$kategori_id");

  } else {

    Header("Location:../kategori-duzenle.php?durum=no&kategori_id=$kategori_id");
  }

}


if (isset($_POST['kategoriekle'])) {


  $kaydet=$db->prepare("INSERT INTO kategori SET
    kategori_ad=:ad,
    kategori_durum=:kategori_durum,
    kategori_sira=:sira
    ");
  $insert=$kaydet->execute(array(
    'ad' => $_POST['kategori_ad'],
    'kategori_durum' => $_POST['kategori_durum'],
    'sira' => $_POST['kategori_sira']
    ));

  if ($insert) {

    Header("Location:../kategori.php?durum=ok");

  } else {

    Header("Location:../kategori.php?durum=no");
  }

}



if ($_GET['kategorisil']=="ok") {

  $sil=$db->prepare("DELETE from kategori where kategori_id=:kategori_id");
  $kontrol=$sil->execute(array(
    'kategori_id' => $_GET['kategori_id']
    ));

  if ($kontrol) {

    Header("Location:../kategori.php?durum=ok");

  } else {

    Header("Location:../kategori.php?durum=no");
  }

}


if ($_GET['urunsil']=="ok") {

  $sil=$db->prepare("DELETE from urun where urun_id=:urun_id");
  $kontrol=$sil->execute(array(
    'urun_id' => $_GET['urun_id']
    ));

  if ($kontrol) {

    Header("Location:../urun.php?durum=ok");

  } else {

    Header("Location:../urun.php?durum=no");
  }

}


if (isset($_POST['urunduzenle'])) {

  $urun_id=$_POST['urun_id'];
  $urun_seourl=seo($_POST['urun_ad']);

  $kaydet=$db->prepare("UPDATE urun SET
    kategori_id=:kategori_id,
    urun_ad=:urun_ad,
    urun_detay=:urun_detay,
    urun_fiyat=:urun_fiyat,
    urun_keyword=:urun_keyword,
    urun_durum=:urun_durum,
    urun_stok=:urun_stok
    WHERE urun_id={$_POST['urun_id']}");
  $update=$kaydet->execute(array(
    'kategori_id' => $_POST['kategori_id'],
    'urun_ad' => $_POST['urun_ad'],
    'urun_detay' => $_POST['urun_detay'],
    'urun_fiyat' => $_POST['urun_fiyat'],
    'urun_keyword' => $_POST['urun_keyword'],
    'urun_durum' => $_POST['urun_durum'],
    'urun_stok' => $_POST['urun_stok']

    ));

  if ($update) {

    Header("Location:../urun.php?durum=ok&urun_id=$urun_id");

  } else {

    Header("Location:../urun-duzenle.php?durum=no&urun_id=$urun_id");
  }

}
/// sillllllllll
if (isset($_POST['urunkaydet'])) {




  $kaydet=$db->prepare("INSERT INTO urun SET
    kategori_id=:kategori_id,
    urun_ad=:urun_ad,
    urun_detay=:urun_detay,
    urun_fiyat=:urun_fiyat,
    urun_keyword=:urun_keyword,
    urun_durum=:urun_durum,
    urun_stok=:urun_stok
    ");
  $insert=$kaydet->execute(array(
    'kategori_id' => $_POST['kategori_id'],
    'urun_ad' => $_POST['urun_ad'],
    'urun_detay' => $_POST['urun_detay'],
    'urun_fiyat' => $_POST['urun_fiyat'],
    'urun_keyword' => $_POST['urun_keyword'],
    'urun_durum' => $_POST['urun_durum'],
    'urun_stok' => $_POST['urun_stok']

    ));

  if ($insert) {

    Header("Location:../urun.php?durum=ok");

  } else {

    Header("Location:../urun-ekle.php?durum=no");
  }

}





if (isset($_POST['ilankaydet'])) {

	$kullanici_id=$_POST['kullanici_id'];

	if (!empty($_FILES)) {
	   $uplourun_dir = 'photos';

	   $uniq=uniqid();

	   $refimgyol=substr($uplourun_dir, 6).$uniq."."."jpeg";

	   move_uploaded_file($_FILES['urun_image']['tmp_name'],"$uplourun_dir/$uniq.jpeg");


	   thumb("photos/".$refimgyol, "thumbnail/".$refimgyol);
	 }





  $urun_seourl=$_POST['urun_ad'];

  $kaydet=$db->prepare("INSERT INTO urun SET
    kategori_id=:kategori_id,
    urun_ad=:urun_ad,
    urun_detay=:urun_detay,
    urun_fiyat=:urun_fiyat,
		urun_sayfasi=:urun_sayfasi,
		urun_baski=:urun_baski,
		urun_keyword=:urun_keyword,
		urun_image=:urun_image,
		kullanici_id=:kullanici_id

    ");
  $insert=$kaydet->execute(array(
    'kategori_id' => $_POST['kategori_id'],
    'urun_ad' => $_POST['urun_ad'],
    'urun_detay' => $_POST['urun_detay'],
    'urun_fiyat' => $_POST['urun_fiyat'],
    'urun_sayfasi' => $_POST['urun_sayfasi'],
    'urun_baski' => $_POST['urun_baski'],
		'urun_keyword' => $_POST['urun_keyword'],
    'urun_image' => $refimgyol,
		'kullanici_id' => $kullanici_id

    ));


		$urun_id=$db->lastInsertId();


		$adreskaydet=$db->prepare("INSERT INTO address SET
			ads_id=:ads_id,
			districts_id=:districts_id,
			neighborhoods_id=:neighborhoods_id,
			city_id=:city_id
			");

		$insertkaydet=$adreskaydet->execute(array(
			'ads_id' =>$urun_id,
			'districts_id' => htmlspecialchars($_POST['district']),
			'neighborhoods_id' => htmlspecialchars($_POST['neighborhood']),
			'city_id' => htmlspecialchars($_POST['city'])

		));

		$address_id=$db->lastInsertId();

			$ilanadreskaydet=$db->prepare("UPDATE urun SET
				address_id=:address_id WHERE urun_id='$urun_id'
				");

			$ilanadres=$ilanadreskaydet->execute(array(
				'address_id' =>$address_id

			));


  if ($insert) {

    Header("Location:../../ilanlarim.php?durum=ok");

  } else {

    Header("Location:../../ilan-ver.php?durum=no");
  }

}


if (isset($_POST['ilanduzenle'])) {

  $urun_id=$_POST['ilan_id'];


  $kaydet=$db->prepare("UPDATE urun SET
    kategori_id=:kategori_id,
    urun_ad=:urun_ad,
    urun_detay=:urun_detay,
    urun_fiyat=:urun_fiyat,
    urun_keyword=:urun_keyword,
		urun_sayfasi=:urun_sayfasi,
		urun_baski=:urun_baski

    WHERE urun_id={$_POST['ilan_id']}");
  $update=$kaydet->execute(array(
    'kategori_id' => $_POST['kategori_id'],
    'urun_ad' => $_POST['urun_ad'],
    'urun_detay' => $_POST['urun_detay'],
		'urun_sayfasi' => $_POST['urun_sayfasi'],
    'urun_baski' => $_POST['urun_baski'],
    'urun_fiyat' => $_POST['urun_fiyat'],
    'urun_keyword' => $_POST['urun_keyword']

    ));

  if ($update) {

    Header("Location:../../yayinda-olmayan-ilanlarim.php?durum=ok&urun_id=$urun_id");

  } else {

    Header("Location:../../ilan-duzenle.php?durum=no&urun_id=$urun_id");
  }

}

if (isset($_POST['urunsil'])) {




	$ilankaldir=$db->prepare("UPDATE urun SET


		urun_durum=:urun_durum




		WHERE urun_id={$_POST['urunsil']}

		");

	$update=$ilankaldir->execute(array(

		'urun_durum'=>2

	));

	if ($update) {
		  Header("Location:../../yayinda-olmayan-ilanlarim.php?durum=ok&urun_id=$urun_id");

	}
	else {

		  Header("Location:../../ilanlarim.php?durum=no&urun_id=$urun_id");
	}

}


if (isset($_POST['ilanyayinla'])) {




	$ilankaldir=$db->prepare("UPDATE urun SET


		urun_durum=:urun_durum




		WHERE urun_id={$_POST['ilanyayinla']}

		");

	$update=$ilankaldir->execute(array(

		'urun_durum'=>0

	));

	if ($update) {
		  Header("Location:../../yayinda-olmayan-ilanlarim.php?durum=ok&urun_id=$urun_id");

	}
	else {

		  Header("Location:../../yayinda-olmayan-ilanlarim.php?durum=no&urun_id=$urun_id");
	}

}

if (isset($_POST['ilan_onay'])) {




	$ilankaldir=$db->prepare("UPDATE urun SET


		urun_durum=:urun_durum




		WHERE urun_id={$_POST['ilan_onay']}

		");

	$update=$ilankaldir->execute(array(

		'urun_durum'=>1

	));

	if ($update) {
		  Header("Location:../onay-ilan.php?durum=ok&urun_id=$urun_id");

	}
	else {

		  Header("Location:../onay-ilan.php?durum=no&urun_id=$urun_id");
	}

}

if (isset($_POST['ilan_kaldir'])) {




	$ilankaldir=$db->prepare("UPDATE urun SET


		urun_durum=:urun_durum




		WHERE urun_id={$_POST['ilan_kaldir']}

		");

	$update=$ilankaldir->execute(array(

		'urun_durum'=>2

	));

	if ($update) {
		  Header("Location:../yayindaki-ilan.php?durum=ok&urun_id=$urun_id");

	}
	else {

		  Header("Location:../yayindaki-ilan.php?durum=no&urun_id=$urun_id");
	}

}




?>
