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
                            <h2>Hesabım</h2></div>
                        <div class="welcome-msg">
                            <p>Merhaba, <?php echo $kullanicicek['kullanici_ad']." ". $kullanicicek['kullanici_soyad']?> !</p>
                            <p>Hesabım sayfasından hesabınız ile ilgili bilgilere erişebilir ve düzenleyebilirsiniz.</p>
                        </div>
                        <div class="box-account box-info">
                            <div class="box-head">
                              <!--  <h2>Hesap</h2> <br> </div>-->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box">
                                        <div class="box-title">
                                        <h3>İletişim bilgileri</h3><a href="kullanici-bilgiler-duzenle.php">Düzenle</a></div>
                                        <div class="box-content">
                                            <h6><?php echo $kullanicicek['kullanici_ad']." ". $kullanicicek['kullanici_soyad']?></h6>
                                            <h6><?php echo $kullanicicek['kullanici_mail']?></h6>
                                            <h6><?php echo $kullanicicek['kullanici_gsm']?></h6>
                                            <h6><a href="#">Şifre değiştir</a></h6></div>
                                    </div>
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
