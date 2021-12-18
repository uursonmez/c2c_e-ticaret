<?php include 'header.php'; ?>


<!--section start-->
<section class="login-page section-big-py-space bg-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-8 offset-xl-4 offset-lg-3 offset-md-2">
                <div class="theme-card">
                    <h3 class="text-center">GİRİŞ</h3>

                            <?php

                            if ($_GET['durum']=="basarisizgiris") {?>

                            <div class="alert alert-danger">
                              <strong>Hata!</strong> Kullanıcı adı ve şifre kayıtlarımızla eşleşmiyor.
                            </div>

                            <?php } elseif ($_GET['durum']=="kayıtbasarili") {?>

                            <div class="alert alert-success">
                              <strong>Başarılı!</strong> Kayıt başarılı bir şeklide gerçekleşti giriş yapabilirsiniz.
                            </div>

                            <?php }
                             ?>


                    <form method="POST" action="admin/adminislem/islem.php" class="theme-form">
                        <div class="form-group">
                            <label for="email">Mail</label>
                            <input type="text" class="form-control" name="kullanici_mail" id="email" placeholder="Mail adresi giriniz" required="">
                        </div>
                        <div class="form-group">
                            <label for="review">Şifre</label>
                            <input type="password" class="form-control" name="kullanici_password" id="review" placeholder="Şifrenizi giriniz" required="">
                        </div>

                        <button type="submit" name="kullanicigiris" class="btn btn-normal">Giriş</button>
                        <a class="float-right txt-default mt-2" href="forget-pwd.html" id="fgpwd">Şifrenizi mi unuttunuz?</a>
                    </form>


                    <p class="mt-3">Mağazamızda ücretsiz bir hesap için kaydolun. Kayıt hızlı ve kolaydır. Mağazamızdan sipariş vermenizi sağlar. Alışverişe başlamak için kaydol'a tıklayın.</p>
                    <a href="register.php" class="txt-default pt-3 d-block">Kayıt ol</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->


<?php include 'footer.php'; ?>
