<?php include 'header.php';


$ilansor=$db->prepare("SELECT * FROM urun where kullanici_id=:kullanici_id  and urun_durum=\"1\" order by urun.urun_id desc ");
$ilansor->execute(array(

'kullanici_id'=>$kullanicicek['kullanici_id']


));

setlocale(LC_TIME, "turkish");
setlocale(LC_ALL,'turkish');

?>


<!-- section start -->
<section class="section-big-py-space bg-light">
    <div class="container">
        <div class="row">
            <?php include 'kullanici-bilgiler-side-bar.php' ?>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">


<div class="col-lg-9">
<div class="dashboard-right">
  <div class="dashboard">
    <div class="page-title">
      <h3 class="mb-3"><a href="profile">Hesap bilgileri</a> > İlanlarım</h3>
    </div>
    <div>


      <section class="cart-section order-history section-big-py-space">
        <div class="custom-container">
          <div class="row">
            <div  class="col-sm-12 ">
              <table class="table cart-table table-responsive-xs ">
                <form action="admin/adminislem/islem.php" method="POST">
                  <?php
                  while($ilancek=$ilansor->fetch(PDO::FETCH_ASSOC)) {?>

                    <tbody >
                      <tr>
                        <td  >
                          <a href="product-detail.php?ilan_no=<?php echo $ilancek['urun_id'] ?>"><img  src="admin/adminislem/thumbnail/<?php echo $ilancek['urun_image']  ?>" alt="product" class="img-fluid  "></a>
                        </td>
                        <td class="text-left">

                          <a href="#" style="font-size: 14px;"><?php echo $ilancek['urun_ad']; ?><br></a>


                          <a href="#" style="font-size: 14px;"><span class="dark-data">İlan No: <?php echo $ilancek['urun_id'] ?></span></a><br>
                          <a href="#" style="font-size: 14px;">Yayına Girdiği Tarih: <?php echo iconv('latin5','utf-8',strftime(' %d %B %Y   ',strtotime($ilancek['urun_zaman'])));  ?></a><br>
                      





                        <div class="mobile-cart-content row">
                          <div class="col-xs-3">
                            <div class="qty-box">
                              <div class="input-group">
                                <input type="text" name="quantity" class="form-control input-number" value="1">
                              </div>
                            </div>
                          </div>
                          <div class="col-xs-3">
                            <h4 class="td-color">$63.00</h4></div>
                            <div class="col-xs-3">
                              <h2 class="td-color"><a href="#" class="icon"><i class="ti-close"></i></a></h2></div>
                            </div>
                          </td>

                          <td>




                            <div class="responsive-data text-right">


                              <h4 class="mb-3 text-left "><?php echo $ilancek['urun_ad']; ?></h4>

                              <div ><img style="width: 100%"> align="left" src="admin/adminislem/thumbnail/<?php echo $ilancek['urun_image']  ?>"><br></div>


                              <span class="dark-data ">İlan Tarihi: </span><span><?php echo date("d-m-Y", strtotime($ilancek['urun_time'])) ?></span><br>
                              <div  class="ml-3 text-right">


                              </div>
                            </div>
                            <div align="right" > <span class="dark-data">Fiyat <br></span> <?php echo number_format($ilancek['urun_fiyat'],0, ',', '.' ); ?><span> TL</span>
                            </div>
                             <div align="right"> <li  ><button  onclick="return confirm('Bu ürünü yayından kaldırmak istiyor musunuz?')" name="urunsil" class="btn btn-danger btn-sm mb-2" value="<?php echo $ilancek['urun_id'] ?>" ><i class="fa fa-minus-circle mr-2"></i>İlandan Kaldır</button></a></li>

                               <input type="hidden" name="ilan_id" value="<?php echo $ilancek['urun_id'] ?>">

                               <li class="ml-2" ><a href="ilan-duzenle.php?ilan_id=<?php echo $ilancek['urun_id'] ?>"><button class="btn btn-info btn-sm mb-2" ><i class="fa fa-pencil mr-2"></i>Düzenle</a></li></button></div>
                             </div>


                           </div>
                         </div>



                       </td>
                     </tr>

                   </tbody>
                 <?php } ?>
               </table>
             </div>
           </div>
         </form>
       </div>
     </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end -->


<?php include 'footer.php'; ?>
