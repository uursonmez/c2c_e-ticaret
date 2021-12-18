<?php
ob_start();
session_start();
include 'admin/adminislem/baglan.php';
include 'admin/fonksiyon.php';
//Belirli veriyi seçme işlemi
$ayarsor=$db-> prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
  'id' => 1
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);



$kullanicisor=$db-> prepare("SELECT * FROM kullanici where kullanici_mail=:id");
$kullanicisor->execute(array(
  'id' => $_SESSION['userkullanici_mail']
));

$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $ayarcek['ayar_title'];?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="<?php echo $ayarcek['ayar_description'];?>">
    <meta name="keywords" content="<?php echo $ayarcek['ayar_keywords'];?>">
    <meta name="author" content="<?php echo $ayarcek['ayar_author'];?>">
    <link rel="icon" href="assets/images/favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon/favicon.ico" type="image/x-icon">

    <!--ck editör-->
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

    <!--icon css-->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themify.css">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">

    <!--Animate css-->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="assets/css/color2.css" media="screen" id="color">
</head>
<body>

<!-- loader start -->
<div class="loader-wrapper">
    <div>
        <img src="assets/images/loader.gif" alt="loader">
    </div>
</div>
<!-- loader end -->

<!--header start-->
<header>
    <div class="mobile-fix-option"></div>


    <div class="layout-header2">
        <div class="container">
            <div class="col-md-12">
                <div class="main-menu-block">
                    <div class="sm-nav-block">
                        <span class="sm-nav-btn"><i class="fa fa-bars"></i></span>
                        <ul class="nav-slide">
                            <li>
                                <div class="nav-sm-back">
                                    Geri <i class="fa fa-angle-right pl-2"></i>
                                </div>
                            </li>
                            <?php
                            $kategorisor=$db->prepare("SELECT * FROM kategori order by kategori_sira ASC");
                            $kategorisor->execute();
                            ?>
                            <?php while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { $say++?>
                            <li><a href="kategori.php?kategori_id=<?php echo $kategoricek['kategori_id'] ?>"><label  style="color: #6e6867;" class="yazi" for="zara"><?php echo $kategoricek['kategori_ad'] ?></label></a></li>
                             <?php } ?>

                        </ul>
                    </div>
                    <div class="logo-block">
                        <a href="index.php"><img src="images/logo.png" class="img-fluid  " alt="logo"></a>
                    </div>
                    <div class="input-block">
                          <div class="input-box">
                              <form method="GET" action="kategori.php" class="big-deal-form">
                                  <div class="input-group ">

                                  <input type="text" class="form-control" name="searchkeyword" placeholder="Kelime veya ilan no ile ara" >
                                      <span class="search"><button class=" btn btn-xs "><i class="fa fa-search"></i></button></span>

                              </div>
                          </form>
                      </div>
                  </div>


                    <div class="cart-block cart-hover-div " onclick="openCart()">


                <div onclick="openAccount()">

                </div>

            <div>
                <a  class="btn btn-white  btn-xs" href="ilan-ver.php">ÜCRETSİZ İLAN VER</a>
            </div>
        </div>

                    <div class="menu-nav">
              <span class="toggle-nav">
                <i class="fa fa-bars "></i>
              </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="category-header-2">
        <div class="custom-container">
            <div class="row">
                <div class="col">
                    <div class="navbar-menu">
                        <div class="category-left">
                            <div class="nav-block">
                                <div class="nav-left" >
                                    <nav class="navbar" data-toggle="collapse" data-target="#navbarToggleExternalContent">
                                        <button class="navbar-toggler" type="button">
                                            <span class="navbar-icon"><i class="fa fa-arrow-down"></i></span>
                                        </button>
                                        <h5 class="mb-0  text-white title-font">Kategoriler</h5>
                                    </nav>
                                    <div class="collapse  nav-desk" id="navbarToggleExternalContent">
                                        <ul class="nav-cat title-font">
                                          <?php
                                          $kategorisor=$db->prepare("SELECT * FROM kategori order by kategori_sira ASC");
                                          $kategorisor->execute();
                                          ?>
                                          <?php while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { $say++?>
                                            <li> <a href="kategori.php?kategori_id=<?php echo $kategoricek['kategori_id'] ?>"><label  style="color: #6e6867;" class="yazi" ><?php echo $kategoricek['kategori_ad'] ?></label></a></li>
                                          <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-block">
                                <nav id="main-nav">
                                    <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                    <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                        <li>
                                            <div class="mobile-back text-right">Geri<i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                                        </li>
                                        <!--HOME-->
                                        <li>
                                            <a href="index.php" class="dark-menu-item">Anasayfa</a>


                                        </li>

                                        <!--HOME-END-->
                                        <?php

                                        $menusor=$db->prepare("SELECT * FROM menu where menu_durum=:durum order by menu_sira ASC limit 5");
                                        $menusor->execute(array(

                                            'durum'=>1

                                        ));

                                        while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)) {

                                        ?>
                                        <!--MENU URL ÇEKME-->
                                        <li><a href="<?php

                                          if (!empty($menucek['menu_url'])) {

                                            echo $menucek['menu_url'];

                                          } else {

                                            echo "sayfa-".seo($menucek['menu_ad']);

                                          }
                                          ?>" class="dark-menu-item"><?php echo $menucek['menu_ad'] ?></a></li>

                                        <?php } ?>



                                    </ul>
                                </nav>
                            </div>


                            <div class="icon-block">

                              <?php

                              if (!isset($_SESSION['userkullanici_mail'])) {?>
                                <ul>
                                    <li class="mobile-user onhover-dropdown"  >
                                        <a href="login.php"><i class="icon-user"></i>
                                        </a>
                                    </li>
                                  </ul>
                             <?php    }


                               ?>


                              <?php
                              if (isset($_SESSION['userkullanici_mail'])) {?>

                                <ul>
                                  <li class="mobile-user onhover-dropdown"  >
                                      <a href="kullanici-bilgiler.php"><i class="icon-user"></i>
                                      </a>
                                  </li>


                                </ul>

                              <?php }
                              ?>

                            </div>
                        </div>
                        <div class="category-right">
                            <div class="contact-block">
                                <div>
                                    <i class="fa fa-volume-control-phone"></i>
                                    <span>İLETİŞİM<span><?php echo $ayarcek['ayar_tel'] ?></span></span>
                                </div>
                            </div>
                            <div class="btn-group">
                                <div  class="gift-block" data-toggle="dropdown">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--header end-->
