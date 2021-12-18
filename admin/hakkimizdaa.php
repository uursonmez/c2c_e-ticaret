<?php
include 'headerr.php';

//Belirli veriyi seçme işlemi
$hakkimizdasor=$db-> prepare("SELECT * FROM hakkimizda where hakkimizda_id=:id");
$hakkimizdasor->execute(array(
  'id' => 0
));
$hakkimizdacek=$hakkimizdasor ->fetch(PDO::FETCH_ASSOC);

 ?>




<?php include 'headerr.php' ?>


<!-- Page Body Start-->
<div class="page-body-wrapper">

    <!-- Page Sidebar Start-->
    <div class="page-sidebar">
        <div class="sidebar custom-scrollbar">
            <div class="sidebar-user text-center">
                <div><img class="img-60 rounded-circle lazyloaded blur-up" src="../assets/images/dashboard/man.png" alt="#">
                </div>
                <h6 class="mt-3 f-14">GENEL AYARLAR</h6>
                <p>Ux Designer</p>
            </div>
            <ul class="sidebar-menu">
                <li><a class="sidebar-header" href="indexx.php"><i data-feather="home"></i><span>Anasayfa</span></a></li>
                <li><a class="sidebar-header" href=""><i data-feather="settings"></i><span>Ayarlar</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">

                        <li><a href="genel-ayarlarr.php"><i class="fa fa-circle"></i>Genel Ayarlar</a></li>
                        <li><a href="iletisim-ayarlar.php"><i class="fa fa-circle"></i>İletişim Ayarlar</a></li>
                        <li><a href="api-ayarlar.php"><i class="fa fa-circle"></i>API Ayarlar</a></li>
                        <li><a href="sosyal-ayarlar.php"><i class="fa fa-circle"></i>Sosyal Ayarlar</a></li>
                        <li><a href="mail-ayarlar.php"><i class="fa fa-circle"></i>Mail Ayarlar</a></li>
                    </ul>
                </li>
                 <li><a class="sidebar-header" href="hakkimizda.php"><i data-feather="info"></i><span>Hakkımxızda Ayarlar</span></a></li>

                <li>
                    <a class="sidebar-header" href=""><i data-feather="dollar-sign"></i><span>Sales</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="order.html"><i class="fa fa-circle"></i>Orders</a></li>
                        <li><a href="transactions.html"><i class="fa fa-circle"></i>Transactions</a></li>
                    </ul>

                </li>
            </ul>
        </div>
    </div>
    <!-- Page Sidebar Ends-->

<?php include 'side-bar.php' ?>

    <div class="page-body">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Anasayfa
                                <small> Admin paneli</small>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="index.php"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">Anasayfa</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 xl-100">
                    <div class="card btn-months">

                        <div class="card-body">


                        <div class="card-header">
                            <h5>Genel Ayarlar

                              <?php

                              if ($_GET['durum']=="ok") { ?>
                                <b style="color:green">İşlem başarılı.</b>
                              <?php }

                              else if ($_GET['durum']=="no") {?>

                                <b style="color:red">İşlem başarısız.</b>
                              <?php }

                               ?>



                            </h5>






                       <div class="card-body">
                            <form action="adminislem/islem.php" method="POST" class="needs-validation">
<!-- Ck Editör Başlangıç -->

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><b>Hakkımızda Başlık</b><span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">

                  <textarea  class="ckeditor" id="editor1" name="hakkimizda_baslik"><?php echo $hakkimizdacek['hakkimizda_baslik']; ?></textarea>

                </div>
              </div>





              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><b>Hakkımızda İçerik</b> <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">

                  <textarea  class="ckeditor" id="editor1" name="hakkimizda_icerik"><?php echo $hakkimizdacek['hakkimizda_icerik']; ?></textarea>

                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><b>Hakkımızda Video</b> <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">

                  <textarea  class="ckeditor" id="editor1" name="hakkimizda_video"><?php echo $hakkimizdacek['hakkimizda_video']; ?></textarea>

                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><b>Hakkımızda Vizyon </b><span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">

                  <textarea  class="ckeditor" id="editor1" name="hakkimizda_vizyon"><?php echo $hakkimizdacek['hakkimizda_vizyon']; ?></textarea>

                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><b>Hakkımızda Misyon</b><span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">

                  <textarea  class="ckeditor" id="editor1" name="hakkimizda_misyon"><?php echo $hakkimizdacek['hakkimizda_misyon']; ?></textarea>

                </div>
              </div>


              <script type="text/javascript">

               CKEDITOR.replace( 'editor1',

               {

                filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

                filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',

                filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',

                filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                forcePasteAsPlainText: true

              }

              );

            </script>

            <!-- Ck Editör Bitiş -->










                                <button type="submit" name="hakkimizdakaydet" class="btn btn-primary d-block">Güncelle</button>
                            </form>
                        </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

   </div>

    <?php include 'footerr.php' ?>
