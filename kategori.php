<?php include 'header.php';

$x=$_SERVER['REQUEST_URI'];
$query_arr =$_GET;
 $tam_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 $sayfada = 24;

if (isset($_GET['kategori_id'])) {



$kategori_id=$_GET['kategori_id'];

  $query="SELECT * FROM urun WHERE kategori_id=:kategori_id  ";

  if(isset($_GET["searchkeyword"]))
  {
    $searchkeyword =$_GET["searchkeyword"];
    $query .= "
    AND (urun.urun_ad LIKE '%$searchkeyword%' or urun.urun_id  LIKE '%$searchkeyword%')
    ";
  }


}  else if (empty($_GET['kategori_id'])) {
    $query="SELECT * FROM urun ";
    if(isset($_GET["searchkeyword"]))
    {
      $searchkeyword =$_GET["searchkeyword"];
      $query .= "
      WHERE (urun.urun_ad LIKE '%$searchkeyword%' or urun.urun_id  LIKE '%$searchkeyword% ')
      ";
    }
}
  $query .= "order by urun.urun_id DESC";






  $saymasorgusu = $db->prepare($query);
  $saymasorgusu->execute(array(

    'kategori_id'=>$_GET['kategori_id']


  ));
  $toplam_icerik=$saymasorgusu->rowCount();
$toplam_sayfa = ceil($toplam_icerik / $sayfada);
                                    
$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

if($sayfa < 1) $sayfa = 1;

if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;
$limit = ($sayfa - 1) * $sayfada;

if ($toplam_icerik > 0) {
 $query .= "
 limit $limit,$sayfada
 ";
}

$urunsor = $db->prepare($query);
$urunsor->execute(array(

  'kategori_id'=>$_GET['kategori_id']


));






 ?>
<!-- section start -->
<section class="section-big-pt-space ratio_asos bg-light">
    <div class="collection-wrapper">
        <div class="custom-container">
            <div class="row">
                <div class="col-sm-3 collection-filter category-page-side">
                  <!-- side-bar start -->
                   <?php
                   include 'kategori-side-bar.php';
                   ?>
                   <!-- side-bar en -->



                </div>
                <div class="collection-content col">
                    <div class="page-main-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="top-banner-wrapper">
                                    <a href="#"><img src="images/kategori.png" class="img-fluid " alt=""></a>

                                </div>
                                <div class="collection-product-wrapper">
                                    <div class="product-top-filter">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="filter-main-btn"><span class="filter-btn  "><i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="product-filter-content">
                                                    <div class="search-count">
                                                        <h5>Ürünler 1-25 arasında gösteriliyor.</h5>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="product-wrapper-grid">
                                        <div class="row">
                                          <?php
                                            while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {
                                           ?>
                                            <div class="col-xl-3 col-md-4 col-6  col-grid-box">
                                                <div class="product">
                                                    <div class="product-box">
                                                        <div class="product-imgbox">
                                                            <div class="product-front">
                                                              <center><a href="ilan-detay.php?ilan_no=<?php echo $uruncek['urun_id']; ?>"> <img src="admin/adminislem/thumbnail/<?php echo $uruncek['urun_image']; ?>" class="img-fluid  " alt="product"></a></center>
                                                            </div>

                                                        </div>
                                                        <div class="product-detail detail-center ">
                                                            <div class="detail-title">
                                                                <div class="detail-left">

                                                                    <a href="">
                                                                        <h6 class="price-title">
                                                                          <?php echo $uruncek['urun_ad']; ?>
                                                                        </h6>

                                                                    </a>
                                                                </div>
                                                                <div class="detail-left">

                                                                    <div  style="color:red;" class="price">
                                                                      <b> <?php echo $uruncek['urun_fiyat'];  ?> TL </b>
                                                                    </div>

                                                                    <div class="price">

                                                                  </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                              <?php } ?>
                                        </div>
                                    </div>
                                     <?php require_once("pagination.php")  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section End -->
<?php include 'footer.php';
 ?>
