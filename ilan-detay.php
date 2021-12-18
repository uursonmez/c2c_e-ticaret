<?php  include 'header.php';?>

<?php
$ilansor=$db->prepare("SELECT * FROM urun INNER JOIN kullanici ON urun.kullanici_id=kullanici.kullanici_id INNER JOIN kategori ON kategori.kategori_id=urun.kategori_id where urun.urun_id=:urun_id");
$ilansor->execute(array(

'urun_id'=>$_GET['ilan_no']


));
$uruncek=$ilansor->fetch(PDO::FETCH_ASSOC);
 ?>

<!-- section start -->
<section class="section-big-pt-space bg-light">
    <div class="collection-wrapper">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-4">
                        <div class="product-slick no-arrow">
                            <div><img src="admin/adminislem/photos/<?php echo $uruncek['urun_image']; ?>" alt="" class="img-fluid  image_zoom_cls-0"></div>

                        </div>

                    </div>
                <div class="col-lg-4">
                        <div class="product-right product-description-box">
                            <h2></h2>


                            <div class="row product-accordion">
                                <div class="col-sm-12">
                                    <div class="accordion theme-accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Ürün Açıklaması</button></h5></div>
                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="card-body">

                                                    <div class="single-product-tables detail-section">
                                                        <table>
                                                            <tbody>
                                                            <tr>
                                                                <td>Kitap Adı:</td>
                                                                <td><?php echo $uruncek['urun_ad']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Kategori:</td>
                                                                <td><?php echo $uruncek['kategori_ad'] ; ?></td>
                                                            </tr>

                                                            <tr>
                                                                <td>Kitap Sayfası:</td>
                                                                <td><?php  echo $uruncek['urun_sayfasi']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Kitap Baskı Yılı:</td>
                                                                <td><?php  echo $uruncek['urun_baski']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Kitap Fiyat:</td>
                                                                <td><?php  echo $uruncek['urun_fiyat']; ?></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-4">
                  <br><br>
                        <div class="product-right product-form-box">
                            <h4>Satıcı Bilgileri</h4>

                            <div class="product-description border-product">
                                <h6 class="product-title"> <?php echo $uruncek['kullanici_ad']  . $uruncek['kullanici_soyad'] ; ?></h6><br>
                                <h4>İletişim Bilgileri</h4>  <h6 class="product-title"><?php echo $uruncek['kullanici_gsm']; ?></h6>
                            </div>
                            <div class="product-buttons"><a href="#" data-toggle="modal" data-target="#addtocart" class="btn btn-normal">Tüm İlanlar</a></div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>

<!-- Section ends -->

<!-- product-tab starts -->
<section class="tab-product tab-exes">
    <div class="custom-container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="creative-card creative-inner">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-toggle="tab" href="#top-home" role="tab" aria-selected="true">İlan Detay</a>
                            <div class="material-border"></div>
                        </li>



                    </ul>
                    <div class="tab-content nav-material" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                            <p><?php echo $uruncek['urun_detay']; ?></p>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product-tab ends -->


<?php  include 'footer.php';?>
