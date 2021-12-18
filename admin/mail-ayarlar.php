<?php include 'headerr.php';

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

                        </div>
                        <div class="card-body">
                            <form action="adminislem/islem.php" method="POST" class="needs-validation">

                                <div class="form-group row">
                                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Smtp Host</label>
                                    <input class="form-control col-md-8" id="validationCustom0" type="text" value="<?php echo $ayarcek['ayar_smtphost'] ?>" name="ayar_smtphost" required="">
                                </div>

                                <div class="form-group row">
                                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Smtp User</label>
                                    <input class="form-control col-md-8" id="validationCustom0" type="text" value="<?php echo $ayarcek['ayar_smtpuser'] ?>"  name="ayar_smtpuser" required="">
                                </div>

                                <div class="form-group row">
                                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Smtp Password</label>
                                    <input class="form-control col-md-8" id="validationCustom0" type="text" value="<?php echo $ayarcek['ayar_smtppassword'] ?>" name="ayar_smtppassword" required="">
                                </div>

                                  <div class="form-group row">
                                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Smtp Port</label>
                                    <input class="form-control col-md-8" id="validationCustom0" type="text" value="<?php echo $ayarcek['ayar_smtpport'] ?>"  name="ayar_smtpport" required="">
                                </div>





                                <button type="submit" name="mailayarkaydet" class="btn btn-primary d-block">Güncelle</button>
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
