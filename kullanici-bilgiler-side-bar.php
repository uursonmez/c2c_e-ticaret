<div class="col-lg-3">
    <div class="account-sidebar"><a class="popup-btn">Hesabım</a></div>
    <div class="dashboard-left">
        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
        <div class="block-content ">
            <ul>

                <li <?php if( basename($_SERVER['PHP_SELF'])=="kullanici-bilgiler.php"){
                  ?> class="active"
                <?php  } ?>><a href="kullanici-bilgiler.php">Hesabım</a></li>
                  <li  <?php if( basename($_SERVER['PHP_SELF'])=="kullanici-bilgiler-duzenle.php"){
                    ?> class="active"
                  <?php  } ?>><a href="kullanici-bilgiler-duzenle.php">Kullanıcı Bilgileri</a></li>

                  <li  <?php if( basename($_SERVER['PHP_SELF'])=="ilanlarim.php"){
                    ?> class="active"
                  <?php  } ?>><a href="ilanlarim.php">İlanlarım</a></li>

                  <li  <?php if( basename($_SERVER['PHP_SELF'])=="yayinda-olmayan-ilanlarim.php"){
                    ?> class="active"
                  <?php  } ?>><a href="yayinda-olmayan-ilanlarim.php"> Yayında Olmayan İlanlarım</a></li>

                <li class="last"><a href="logout.php">Çıkış Yap</a></li>
            </ul>
        </div>
    </div>
</div>
