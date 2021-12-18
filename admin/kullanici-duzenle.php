<?php include 'headerr.php';

$kullanicisor=$db-> prepare("SELECT * FROM kullanici where kullanici_id=:id");
$kullanicisor->execute(array(
  'id' => $_GET['kullanici_id']
));

$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);


 ?>

<!-- Page Body Start-->
<div class="page-body-wrapper">

    <!-- Page Sidebar Start-->
      <?php include 'side-bar.php' ?>
    <!-- Page Sidebar Ends-->

    <!-- Right sidebar Start-->
    <div class="right-sidebar" id="right_side_bar">
        <div>
            <div class="container p-0">
                <div class="modal-header p-l-20 p-r-20">
                    <div class="col-sm-8 p-0">
                        <h6 class="modal-title font-weight-bold">FRIEND LIST</h6>
                    </div>
                    <div class="col-sm-4 text-right p-0"><i class="mr-2" data-feather="settings"></i></div>
                </div>
            </div>
            <div class="friend-list-search mt-0">
                <input type="text" placeholder="search friend"><i class="fa fa-search"></i>
            </div>
            <div class="p-l-30 p-r-30">
                <div class="chat-box">
                    <div class="people-list friend-list">
                        <ul class="list">
                            <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/user.png" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Vincent Porter</div>
                                    <div class="status"> Online</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/user1.jpg" alt="">
                                <div class="status-circle away"></div>
                                <div class="about">
                                    <div class="name">Ain Chavez</div>
                                    <div class="status"> 28 minutes ago</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/user2.jpg" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Kori Thomas</div>
                                    <div class="status"> Online</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/user3.jpg" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Erica Hughes</div>
                                    <div class="status"> Online</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/man.png" alt="">
                                <div class="status-circle offline"></div>
                                <div class="about">
                                    <div class="name">Ginger Johnston</div>
                                    <div class="status"> 2 minutes ago</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/user5.jpg" alt="">
                                <div class="status-circle away"></div>
                                <div class="about">
                                    <div class="name">Prasanth Anand</div>
                                    <div class="status"> 2 hour ago</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/designer.jpg" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Hileri Jecno</div>
                                    <div class="status"> Online</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Right sidebar Ends-->

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
                            <h5>Kullanıcı Düzenle

                              <?php

                              if ($_GET['durum']=="ok") { ?>
                                <b style="color:green">İşlem başarılı.</b>
                              <?php }

                              else if ($_GET['durum']=="no") {?>

                                <b style="color:red">İşlem başarısız.</b>
                              <?php }

                               ?>



                            </h5>

                        </div>
                        <div class="card-body">
                            <form action="adminislem/islem.php" method="POST" class="needs-validation">

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


                                <div class="form-group row">
                                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Kullanıcı Durum</label>
                                    <div class="form-control col-md-8">
                                     <select id="heard" class="form-control" name="kullanici_durum" required>



                                       <!-- Kısa İf Kulllanımı

                                        <?php echo $kullanicicek['kullanici_durum'] == '1' ? 'selected=""' : ''; ?>

                                      -->




                                      <option value="1" <?php echo $kullanicicek['kullanici_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>



                                      <option value="0" <?php if ($kullanicicek['kullanici_durum']==0) { echo 'selected=""'; } ?>>Pasif</option>
                                      <!-- <?php

                                       if ($kullanicicek['kullanici_durum']==0) {?>


                                       <option value="0">Pasif</option>
                                       <option value="1">Aktif</option>


                                       <?php } else {?>

                                       <option value="1">Aktif</option>
                                       <option value="0">Pasif</option>

                                       <?php  }

                                       ?> -->


                                     </select>
                                   </div>

                                </div>

                                <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">






                                <button type="submit" name="kullaniciduzenle" class="btn btn-primary d-block">Güncelle</button>
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
