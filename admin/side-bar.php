<div class="page-sidebar">
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <div><img class="img-60 rounded-circle lazyloaded blur-up" src="../assets/images/dashboard/man.png" alt="#">
            </div>
            <h6 class="mt-3 f-14"><?php echo $kullanicicek['kullanici_ad']  ?></h6>
            <p><?php echo $kullanicicek['kullanici_soyad'] ?></p>
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

                </ul></li>

            <li><a class="sidebar-header" href="hakkimizda.php"><i data-feather="info"></i><span>Hakkimizda Ayarlar</span></a></li>
            <li><a class="sidebar-header" href="kullanici.php"><i data-feather="user"></i><span>Kullanıcılar</span></a></li>

             <li><a class="sidebar-header" href=""><i data-feather="check"></i><span>İlanlar</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">

                  <li><a href="yayindaki-ilan.php"><i class="fa fa-circle"></i>Yayındaki İlanlar</a></li>
                  <li><a href="onay-ilan.php"><i class="fa fa-circle"></i>Onay Bekleyen İlanlar</a></li>
                  <li><a href="yayinolmayan-ilan.php"><i class="fa fa-circle"></i>Yayında Olmayan İlanlar</a></li>
                </ul></li>


            <li><a class="sidebar-header" href="kategori.php"><i data-feather="bookmark"></i><span>Kategoriler</span></a></li>
            <li><a class="sidebar-header" href="urun.php"><i data-feather="shopping-cart"></i><span>Ürünler</span></a></li>
            <li><a class="sidebar-header" href="menu.php"><i data-feather="shopping-bag"></i><span>Menüler</span></a></li>
            <li><a class="sidebar-header" href="logout.php"><i data-feather="log-in"></i><span>Çıkış</span></a></li>

        </ul>


    </div>
</div>
