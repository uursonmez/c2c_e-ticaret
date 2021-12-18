
<?php
include 'header.php';

 ?>


<!--section start-->
<section class="login-page section-big-py-space bg-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <div class="theme-card">
                    <h3 class="text-center">Kayıt Ol</h3>


                    <?php

                    				if ($_GET['durum']=="farklisifre") {?>

                    				<div class="alert alert-danger">
                    					<strong>Hata!</strong> Girdiğiniz şifreler eşleşmiyor.
                    				</div>

                    				<?php } elseif ($_GET['durum']=="eksiksifre") {?>

                    				<div class="alert alert-danger">
                    					<strong>Hata!</strong> Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
                    				</div>

                    				<?php } elseif ($_GET['durum']=="mukerrerkayit") {?>

                    				<div class="alert alert-danger">
                    					<strong>Hata!</strong> Bu kullanıcı daha önce kayıt edilmiş.
                    				</div>

                    				<?php } elseif ($_GET['durum']=="basarisiz") {?>

                    				<div class="alert alert-danger">
                    					<strong>Hata!</strong> Kayıt Yapılamadı Sistem Yöneticisine Danışınız.
                    				</div>

                    				<?php }
                    				 ?>


                    <form method="POST" action="admin/adminislem/islem.php" class="theme-form">
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label for="email">Ad</label>
                                <input type="text" class="form-control"   id="fname" name="kullanici_ad" placeholder="Ad giriniz" required="">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="review">Soyad</label>
                                <input type="text" class="form-control" id="lname" name="kullanici_soyad" placeholder="Soyadı giriniz" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label for="email">Mail Adresi</label>
                                <input type="text" class="form-control" id="email"  name="kullanici_mail" placeholder="Mail adresi giriniz" required="">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="review">Şifre</label>
                                <input type="password" class="form-control" name="kullanici_passwordone" id="review" placeholder="Şifrenizi giriniz" required="">
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="review">Tekrar Şifre</label>
                                <input type="password" name="kullanici_passwordtwo" class="form-control" id="review" placeholder="Şifrenizi tekrar giriniz" required="">
                            </div>




                            <div class="col-md-12 form-group">
                              <button type="submit" name="kullanicikaydet" class="btn btn-normal">Kayıt İşlemini Yap</button>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 ">
                                <p>
                                  Zaten hesabın var mı?  <a href="login.php" class="txt-default">buraya </a> tıklayın &nbsp;<a href="login.php" class="txt-default">Giriş</a>
                                </p>
                            </div>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->


<?php
include 'footer.php';
 ?>
