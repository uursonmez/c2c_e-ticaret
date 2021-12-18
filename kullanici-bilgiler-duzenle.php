<?php include 'header.php';

$kullanicisor=$db-> prepare("SELECT * FROM kullanici where kullanici_mail=:id");
$kullanicisor->execute(array(
  'id' => $_SESSION['userkullanici_mail']
));

$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);


 ?>



<!-- section start -->
<section class="section-big-py-space bg-light">
    <div class="container">
        <div class="row">
            <?php include 'kullanici-bilgiler-side-bar.php' ?>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="page-title">
                            <h2>Kullanıcı Bilgilerini Düzenle</h2>

                            <?php

                              if ($_GET['durum']=="ok") { ?>
                                <b style="color:green">İşlem başarılı.</b>
                              <?php }

                              else if ($_GET['durum']=="no") {?>

                                <b style="color:red">İşlem başarısız.</b>
                              <?php }

                               ?>
                    </div>
                        <div class="welcome-msg">
                            <p>Merhaba, <?php echo $kullanicicek['kullanici_ad']." ". $kullanicicek['kullanici_soyad']?> ! </p>
                            <p>Hesabım sayfasından hesabınız ile ilgili bilgilere erişebilir ve düzenleyebilirsiniz.</p>
                        </div>
                        <div class="box-account box-info">
                            <div class="box-head">
                                <h2>Hesap Bilgileri</h2> <br></div>
                            <div class="row">
                                <div class="col-sm-6">
                               <form action="admin/adminislem/islem.php" method="POST" class="needs-validation">

                              <?php

                              $zaman=explode(" ",$kullanicicek['kullanici_zaman']);


                               ?>

                              <div class="form-group row">
                                  <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Kayıt Tarih</label>
                                  <input class="form-control col-md-8" id="validationCustom0" disabled="" type="date" value="<?php echo $zaman[0] ?>" name="kullanici_zaman" required="">
                              </div>

                              <div class="form-group row">
                                  <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Kayıt Saati</label>
                                  <input class="form-control col-md-8" id="validationCustom0" disabled="" type="time" value="<?php echo $zaman[1] ?>" name="kullanici_zaman" required="">
                              </div>

                                <div class="form-group row">
                                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>TC</label>
                                    <input class="form-control col-md-8" id="validationCustom0"  type="text" value="<?php echo $kullanicicek['kullanici_tc'] ?>" name="kullanici_tc" required="">
                                </div>

                                <div class="form-group row">
                                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Telefon</label>
                                    <input class="form-control col-md-8" id="validationCustom0"  type="text" value="<?php echo $kullanicicek['kullanici_gsm'] ?>" name="kullanici_gsm" required="">
                                </div>

                                <div class="form-group row">
                                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Ad</label>
                                    <input class="form-control col-md-8" id="validationCustom0" type="text" value="<?php echo $kullanicicek['kullanici_ad'] ?>" name="kullanici_ad" required="">
                                </div>

                                <div class="form-group row">
                                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Soyad</label>
                                    <input class="form-control col-md-8" id="validationCustom0" type="text" value="<?php echo $kullanicicek['kullanici_soyad'] ?>" name="kullanici_soyad" required="">
                                </div>

                                <div class="form-group row">
                                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Mail</label>
                                    <input class="form-control col-md-8" id="validationCustom0" disabled="" type="text" value="<?php echo $kullanicicek['kullanici_mail'] ?>" name="kullanici_mail" required="">
                                </div>



                                <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">






                                <button type="submit" name="kullanicibilgileriduzenle" class="btn btn-primary d-block">Güncelle</button>
                            </form>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end -->


<?php include 'footer.php'; ?>
