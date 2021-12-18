<?php include 'headerr.php';

$kategorisor=$db->prepare("SELECT * FROM kategori order by kategori_sira ASC");
$kategorisor->execute();
 ?>

<!-- Page Body Start-->
<div class="page-body-wrapper">

    <!-- Page Sidebar Start-->
      <?php include 'side-bar.php'; ?>
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
                            <h5>Kategori Listeleme

                              <?php

                              if ($_GET['durum']=="ok") { ?>
                                <b style="color:green">İşlem başarılı.</b>
                              <?php }

                              else if ($_GET['durum']=="no") {?>

                                <b style="color:red">İşlem başarısız.</b>
                              <?php }

                               ?>



                            </h5>
                            <div  align="right">
                          <a href="kategori-ekle.php"><button class="btn btn-success btn-xs">Yeni Ekle</button></a>
                        </div>
                        </div>
                        <div class="card-body">


                          <table class="table">
                            <thead>
                              <th>S. No</th>
                              <th>Kategori Ad</th>

                              <th>Kategori Sıra</th>
                              <th>Kategori Durum</th>
                              <th></th>
                              <th></th>
                            </thead>
                            <tbody>
                              <?php
                              $say=0;

                              while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                                <tr>
                                  <td><?php echo $say ?></td>
                                  <td><?php echo $kategoricek['kategori_ad'] ?></td>

                                  <td><?php echo $kategoricek['kategori_sira'] ?></td>
                                  <td><?php
                                  if ($kategoricek['kategori_durum']==1) {?>
                                    <button class="btn btn-success btn-sm ">Aktif</button>


                                  <?php } else{?>
                                    <button class="btn btn-danger btn-sm ">Pasif</button>

                                  <?php } ?>

                                  </td>

                                  <td><center><a href="kategori-duzenle.php?kategori_id=<?php echo $kategoricek['kategori_id']?>"<button type="button" class="btn btn-primary btn-sm ">Düzenle</button></a></center></td>
                                  <td><center><a href="adminislem/islem.php?kategori_id=<?php echo $kategoricek['kategori_id']?>&kategorisil=ok"><button type="button" class="btn btn-danger btn-sm">Sil</button></a></center></td>
                                </tr>



                              <?php  }

                              ?>

                            </tbody>
                          </table>






                        </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

    </div>

    <?php include 'footerr.php' ?>
